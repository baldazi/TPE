<?php

namespace App\Controllers;

use App\Models\CalendarModel;
use App\Models\EventModel;


class ApiController extends Controller{

    public function index(): void
    {
        $model = new EventModel;
        $events = $model->findAllXUser();
        $this->json(data: $events);
    }

    public function calendars()
    {
        $model = new CalendarModel;
        $calendars = $model->findAll();
        $this->json(data: $calendars);
    }
}