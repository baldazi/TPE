<?php

namespace App\Controllers;

use App\Core\Form;
use App\Models\CalendarModel;
use App\Models\EventModel;
use App\Models\UserModel;

class MainController extends Controller
{
    public function index()
    {
        $usersModel = new UserModel;
        if (Form::validate($_POST, ['login_user_pass', 'login_user_login'])) {
            $log = strip_tags($_POST['login_user_login']);
            $pass = strip_tags($_POST['login_user_pass']);
            $userArray = $usersModel->findSomeOne($log);

            if (!$userArray) {
                $_SESSION['error'] = 'identifient invalide';
                header('Location:.');
                exit;
            }
            $user = $usersModel->hydrate($userArray);

            if (md5($pass) === $user->password) {
                $user->setSession();
                unset($_SESSION['error']);
                header('Location:.');
                exit;
            } else {
                $_SESSION['error'] = 'mot de passe incorrecte';
                header('Location:.');
                exit;
            }
        }

        if (Form::validate($_SESSION, ["user"])) {
            $eventModel = new EventModel;
            $calendarModel = new CalendarModel;
            $events = $eventModel->findBy(["userID" => $_SESSION["user"]["id"]]);
            $calendars = $calendarModel->findBy(["userID" => $_SESSION["user"]["id"]]);
        }

        $this->render('main/index.tpl', isset($events) ? compact("events", "calendars") : []);
    }

    public function register()
    {
        //verifier si l'utilisateur est deja connecté
        if (isset($_SESSION["user"])) {
            header("location:.");
            exit;
        }

        $userModel = new UserModel;

        if (Form::validate($_POST, ['lastname', 'firstname', 'email', 'password', 'passconf'])) {
            $email = strip_tags($_POST['email']);
            $firstname = strip_tags($_POST['firstname']);
            $lastname = strip_tags($_POST['lastname']);
            $pseudo = strip_tags($_POST['userid']);
            $password = strip_tags($_POST['password']);
            $confirm_pwd = strip_tags($_POST['passconf']);
            //verifier si l'email est correct
            if (!Form::isEmail($email)) {
                $_SESSION['error'] = 'email incorrect';
                header('Location:register');
                exit;
            }
            // verifier si un compte existe pour l'email
            $user = $userModel->findSomeOne($email);

            if ($user) {
                $_SESSION['error'] = 'vous avez un compte';
                header('Location:.');
                exit;
            }

            if (strlen($password) < 6 || $password !== $confirm_pwd) {
                $_SESSION['error'] = 'mot de passe incorrect';
                header('Location:register');
                exit;
            }

            $user = $userModel->hydrate(compact("firstname", "lastname", "pseudo", "email", "password"));
            $user->register();
            unset($_SESSION['error']);
            header('Location:.');
        }

        $this->render('main/register.tpl');

    }

    public function logout()
    {
        UserModel::disconnect();
        header("location:.");
    }
}
