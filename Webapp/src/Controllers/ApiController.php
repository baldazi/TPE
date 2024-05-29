<?php

namespace App\Controllers;

use App\Core\Db;
use App\Core\IcsParser;
use App\Models\CalendarModel;
use App\Models\EventModel;
use App\Models\NewsletterModel;
use App\Models\UserCalendarModel;
use App\Models\UserEventModel;


class ApiController extends Controller
{

    public function index(): void
    {
        $model = new EventModel;
        $events = $model->findAllXUser();
        $this->json(data: $events);
    }

    public function getEvent($uid)
    {
        $model = new EventModel;
        $events = $model->findBy(compact('uid'), true);
        $this->json(data: $events);
    }

    public function setEvent()
    {
        $eventModel = new EventModel;
        $userEventModel = new UserEventModel;
        $calendarModel = new CalendarModel;
        $userCalendarModel = new UserCalendarModel;
        $getData = $this->getPost();
        //var_dump($getData);exit;
        $eventModel->hydrate($getData);

        $eventModel->create();
        $eventID = Db::getInstance()->lastInsertId();
        //ajouter à la liste des utilisateur abonnées au calendrier
        //liste de l'utilisateur
        $userList = $userCalendarModel->findBy(["calendarID" => $getData["calendarID"]]);
        foreach ($userList as $user) {
            $userID = $user->userID;
            $colorID = $user->colorID;
            $userEventModel->hydrate(compact("eventID", "userID", "colorID"));
            $userEventModel->create();
        }
    }

    public function updateEvent($id)
    {
        $model = new EventModel;
        $getData = $this->getPost();
        $model->update($id, $getData);
    }

    public function incoming()
    {
        $model = new EventModel;
        $events = $model->findAllXUserNextWeek();
        $this->json(data: $events);
    }

    public function getSubscribers($id)
    {
        $model = new UserCalendarModel;
        $subscribers = $model->Subscribers($id);
        $this->json(data: $subscribers);
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

    public function checkCalendar()
    {
        $parser = new IcsParser;
        $getData = $this->getPost();
        $parser->parse($getData["url"]);
        $events = $parser->getEventList();
        $eventList = [];
        foreach ($events as $event) {
            $event["calendarID"] = $getData["id"];
            $eventList[] = $event;
        }
        $this->json($eventList);
    }
}