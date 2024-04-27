<?php

namespace App\Controllers;

use App\Core\Form;
use App\Core\IcsParser;
use App\Models\CalendarModel;
use App\Models\EventModel;

class CalendarController extends Controller
{
    public function index(): void
    {
        if (Form::validate($_SESSION, ["user"])) {
            $calendarModel = new CalendarModel;
            $calendars = $calendarModel->findBy(["userID" => $_SESSION["user"]["id"]]);
            $this->render('calendar/index.tpl', compact( "calendars"));
        }else{
            $this->render('main/index.tpl' );
        }
    }
    public function create(): void
    {
        $model = new CalendarModel;
        $eventModel = new EventModel;
        if(Form::validate($_POST,['file_URL']) ){
            $parser = new IcsParser;
            $url = $_POST['file_URL'];
            if (!(Form::isURL($url))){
                //todo: add get queries to throw errors
                echo "lien incorrect";
                exit;
            }
            $userID = $_SESSION["user"]["id"];
            $parser->parse("$url");
            if($parser->isEmpty()){
                //todo
                echo "lien invalid";
                exit;
            }
            $name = $parser->getName();
            $data = $parser->getAllEvent();
            $color = "#".substr(md5(rand()), 0, 6);
            $model->hydrate(compact("name", "userID", "color", "url"));
            if ($model->findBy(compact("name", "userID", "url"))){
                echo "deja existant";
                exit;
            }
            $model->create();
            foreach($data as $event){

                $event["userID"] = $userID;
                $event["color"] = $color;
                $eventModel = $eventModel->hydrate($event);
                $eventModel->create();

            }
        }
        header("Location:/");
    }
}