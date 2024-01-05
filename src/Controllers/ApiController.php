<?php

namespace App\Controllers;

use App\Models\EventModel;


class ApiController extends Controller{

    public function index(){

        $model = new EventModel;
        $events = $model->findAllXUser();
        $this->json($events);
    }
}