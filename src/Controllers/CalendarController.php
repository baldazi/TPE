<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Core\Form;
use App\Core\IcsParser;
use App\Models\CalendarModel;
use App\Models\EventModel;

class CalendarController extends Controller
{
    public function create()
    {
        $model = new CalendarModel;
        $eventModel = new EventModel;
        if(Form::validate($_POST,['file_URL'])){
            $parser = new IcsParser;
            $url = $_POST['file_URL'];
            $userID = $_SESSION["user"]["id"];
            $parser->parse("$url");
            $name = $parser->getName();
            $data = $parser->getAllEvent();
            $model->hydrate(compact("name", "userID", "url"));
            if ($model->findBy(compact("name", "userID", "url"))){
                echo "deja existant";
                exit;
            }
            $model->create();
            foreach($data as $event){

                $event["userID"] = $userID;
                $eventModel = $eventModel->hydrate($event);
                $eventModel->create();

            }
        }
        header("Location:/");
    }
}