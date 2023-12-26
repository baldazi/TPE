<?php

namespace App\Controllers;

use App\Core\Form;
use App\Core\IcsParser;
use App\Models\EventModel;

class EventController extends Controller{
    public function index(){
        $event = new EventModel;
        $event->migrate();
        $parser = new IcsParser;
        if(Form::validate($_FILES,['file1'])){
            $filename = $_FILES['file1']['tmp_name'];
            $parser->parse("$filename");
            $data = $parser->get_all_data();
    }
       $this->render('event/index.tpl', $data??[]);
    }
}