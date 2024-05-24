<?php

namespace App\Controllers;

use App\Core\IcsParser;
use App\Models\CalendarModel;
use App\Models\EventModel;
use App\Models\NewsletterModel;


class ApiController extends Controller
{

    public function index(): void
    {
        $model = new EventModel;
        $events = $model->findAllXUser();
        $this->json(data: $events);
    }

    public function incoming()
    {
        $model = new EventModel;
        $events = $model->findAllXUserNextWeek();
        $this->json(data: $events);
    }

    public function calendars()
    {
        $model = new CalendarModel;
        $calendars = $model->findAll();
        $this->json(data: $calendars);
    }

    public function cal($id): void
    {
        $model = new CalendarModel;
        $cal = $model->find($id);
        $parser = new IcsParser;
        $parser->parse($cal->url);
        $data = $parser->getAllEvent();
        $this->json($data);
    }

    public function calb($id): void
    {
        $model = new CalendarModel;
        $cal = $model->find($id);
        $data = ["url" => $cal->url, "data" => file_get_contents($cal->url)];
        $this->json($data);
    }

    public function saveMail(): void
    {
        $newsletterModel = new NewsletterModel;
        $mailData = $this->getPost();
        $newsletterModel->hydrate($mailData);
        $newsletterModel->create();
        $this->json($mailData);
    }

    public function take()
    {
        $parser = new IcsParser;
        $parser->parse("https://agenda.litislab.fr/remote.php/dav/public-calendars/4yPWJq2CkeAadCwz?export");
        $this->json($parser->getEventList());
    }

    public function checkCalendar(){
        $parser = new IcsParser;
        $getData = $this->getPost();
        $parser->parse($getData["url"]);
        $getData["events"] = $parser->getEventList();
        $this->json($getData);
    }
}