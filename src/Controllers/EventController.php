<?php

namespace App\Controllers;

use App\Core\Form;
use App\Core\IcsParser;
use App\Models\EventModel;
use App\Models\UserModel;

class EventController extends Controller{

    public function index(){

        $model = new EventModel;
        $model->migrate();
        $events = $model->findAll();
        $this->render('event/index.tpl', compact('events'));
    }


    public function create(){
        $model = new EventModel;
        $events = $model->findAll();
        if(Form::validate($_FILES,['file_data']) || Form::validate($_POST,['file_URL'])){
            $parser = new IcsParser;
            $filename = $_FILES['file_data']['tmp_name']??$_POST['file_URL'];
            $parser->parse("$filename");
            $data = $parser->getAllEvent();
            foreach($data as $event){

                $event["userID"] = $_SESSION["user"]["id"];
          
                $model = $model->hydrate($event);
                $model->create();

            }
        }
        header("Location:/");
       $this->render('event/index.tpl', compact('events'));
    }

    public function user(){
        $model = new UserModel;
        $pseudo = "admin_yop";
        $email = "userr@yopmail.com";
        $password = md5("admin");
        $user = $model->hydrate(compact("pseudo", "email", "password"));
        $user->register();
        header("Location: /");
    }
}