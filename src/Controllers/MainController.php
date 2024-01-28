<?php

namespace App\Controllers;

use App\Core\Form;
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
        
        if(Form::validate($_SESSION, ["user"])){
            $eventModel = new EventModel;
            $events = $eventModel->findBy(["userID"=>$_SESSION["user"]["id"]]);;
        }

        $this->render('main/index.tpl', isset($events)?compact("events"):[]);
    }

    public function migrate()
    {
        $model = new EventModel;
        $sql = file_get_contents("../src/Core/db.sql");
        var_dump($sql);
        $model->execute($sql);
    }
}
