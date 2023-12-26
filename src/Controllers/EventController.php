<?php

namespace App\Controllers;

use App\Core\Form;
use App\Core\IcsParser;
use App\Models\EventModel;

class EventController extends Controller{
    public function index(){

        $model = new EventModel;
        $model->migrate();
        $events = $model->findAll();
        $this->render('event/index.tpl', compact('events'));
    }

    public function create(){
        $model = new EventModel;
        if(Form::validate($_FILES,['file1'])){
            $parser = new IcsParser;
            $filename = $_FILES['file1']['tmp_name'];
            echo "<p>$filename</p>";
            $parser->parse("$filename");
            $data = $parser->get_all_data();

            foreach($data["VEVENT"] as $event){

                $startDateTime = explode("T",$event["DTSTART"]);
                $endDateTime = explode("T", $event["DTEND"]);

                $title = $event["SUMMARY"];
                $startDate = $startDateTime["0"];
                $endDate = $endDateTime["0"];
                $startTime = $startDateTime["1"];
                $endTime = $endDateTime["1"];
                $location = $event["LOCATION"];
                $description = $event["DESCRIPTION"];

                var_dump(compact("title", "startDate", "endDate", "startTime", "endTime", "location", "description"));
                // die;
                $model = $model->hydrate(compact("title", "startDate", "endDate", "startTime", "endTime", "location", "description"));
                var_dump($model);
                $model->create();

            }
        }
       $this->render('event/index.tpl', $data??[]);
    }
}