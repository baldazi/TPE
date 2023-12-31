<?php

namespace App\Controllers;

use App\Core\Form;
use App\Core\IcsParser;
use App\Models\EventModel;
use App\Models\UserModel;

class MainController extends Controller
{
    public function index()
    {
        $usersModel = new UserModel;
        $usersModel->migrate();
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

            if (md5($pass) === $user->getPassword()) {
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

        if(Form::validate($_FILES,['file1']) || Form::validate($_POST,['file_URL'])){
            $parser = new IcsParser;
            $eventModel = new EventModel;

            $filename = $_FILES['file1']['tmp_name']??$_POST['file_URL'];
            $parser->parse("$filename");
            $data = $parser->get_all_data();

            foreach($data["VEVENT"] as $event){

                $startDateTime = explode("T",$event["DTSTART"]);
                $endDateTime = explode("T", $event["DTEND"]);

                $title = $event["SUMMARY"]??"";
                $startDate = $startDateTime["0"];
                $endDate = $endDateTime["0"];
                $startTime = $startDateTime["1"];
                $endTime = $endDateTime["1"];
                $location = $event["LOCATION"]??"";
                $description = $event["DESCRIPTION"]??"";
                $userID = $_SESSION["user"]["id"];
          
                $model = $eventModel->hydrate(compact("title", "startDate", "endDate", "startTime", "endTime", "location", "description"));
                
                $model->create();

            }
        }
        
        if(Form::validate($_SESSION, ["user"])){
            $eventModel = new EventModel;
            $events = $eventModel->findAll();
        }

        $this->render('main/index.tpl', isset($events)?compact("events"):[]);
    }
}
