<?php

namespace App\Controllers;

use App\Core\Form;
use App\Models\CalendarModel;
use App\Models\EventModel;
use App\Models\UserModel;
use App\Models\UserThemeModel;

class MainController extends Controller
{
    public function index()
    {
        if (Form::validate($_POST, ['login_user_pass', 'login_user_login'])) {
            $usersModel = new UserModel;
            $calendarModel = new CalendarModel;

            $login = strip_tags($_POST['login_user_login']);
            $password = strip_tags($_POST['login_user_pass']);
            $userArray = $usersModel->findSomeOne($login);

            if (!$userArray) {
                $_SESSION['error'] = 'identifient invalide';
                header('Location:/');
                exit;
            }
            $user = $usersModel->hydrate($userArray);

            if (md5($password) === $user->password) {
                unset($_SESSION['error']);
                $calendars = $calendarModel->findFor($user->id);
                $nbCalendar = count($calendars);
                $skin = UserThemeModel::getThemes()[$user->skin];
                $user->setSession(compact("skin","nbCalendar", "calendars"));
                //var_dump($_SESSION["user"]);exit;
                header('Location:/');
                exit;
            } else {
                $_SESSION['error'] = 'mot de passe incorrecte';
                header('Location:.');
                exit;
            }
        }

        if (Form::validate($_SESSION, ["user"])) {
            $eventModel = new EventModel;
            $events = $eventModel->findFor($_SESSION["user"]["id"]);
        }

        $this->render('main/index.tpl', isset($events) ? compact("events") : []);
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

    public function apropos()
    {
        $this->render("main/apropos.tpl");
    }
}
