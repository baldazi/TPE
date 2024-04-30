<?php

namespace App\Controllers;

use App\Core\Db;
use App\Core\Form;
use App\Core\IcsParser;
use App\Models\CalendarModel;
use App\Models\ColorPaletteModel;
use App\Models\EventModel;
use App\Models\UserCalendarModel;
use App\Models\UserEventModel;
use App\Models\UserModel;

class CalendarController extends Controller
{
    public function index(): void
    {
        if (Form::validate($_SESSION, ["user"])) {
            //$calendarModel = new CalendarModel;
            //$calendars = $calendarModel->findBy(["userID" => $_SESSION["user"]["id"]]);
            $calendars = $_SESSION["user"]["calendars"];
            $colorPalette = ColorPaletteModel::getColorNames();
            $this->render('calendar/index.tpl', compact("calendars", "colorPalette"));
        } else {
            $this->render('main/index.tpl');
        }
    }

    public function create(): void
    {
        $calendarModel = new CalendarModel;
        $userCalendarModel = new UserCalendarModel;
        $eventModel = new EventModel;
        $userEventModel = new UserEventModel;
        if (Form::validate($_POST, ['file_URL', 'color_id'])) {
            $parser = new IcsParser;
            $url = $_POST['file_URL'];

            if (!(Form::isURL($url))) {
                //todo: add get queries to throw errors
                echo "lien incorrect";
                exit;
            }

            /*if ($parser->isEmpty()) {
                //todo
                echo "lien invalid";
                exit;
            }*/
            $parser->parse("$url");

            $userID = $_SESSION["user"]["id"];
            $colorID = $_POST['color_id'];
            $name = $parser->getName();

            //verifier le calendrier existe deja
            if ($calendar = $calendarModel->findBy(compact("url"))) {
                $calendarID = $calendar[0]->id;
                //verifier si l'utilisateur est deja abonnée à ce calendrier
                if ($userCalendarModel->findBy(compact("userID", "calendarID"))) {
                    echo "deja existant"; //todo
                    exit;
                } else {
                    //ajouté l'utilisateur à la liste des abonnées du calendrier
                    $userCalendarModel->hydrate(compact("userID", "colorID",  "calendarID"));
                    $userCalendarModel->create();
                    //ajouté tous les evenement du calendrié à la liste d'evenement de l'utilisateur
                    $eventList = $calendarModel->findEvent($calendarID);
                    foreach ($eventList as $event) {
                        $eventID = $event->id;
                        $userEventModel->hydrate(compact("userID", "eventID"));
                        $userEventModel->create();
                    }
                }
            } else {
                //creer le calendrier
                $calendarModel->hydrate(compact("name",  "url"));
                $calendarModel->create();
                $calendarID = Db::getInstance()->lastInsertId();
                //ajouté l'utilisateur à la liste des abonnées du calendrier après creation
                $userCalendarModel->hydrate(compact("userID", "colorID", "calendarID"));
                $userCalendarModel->create();
                //ajouter les evenement a la liste globale d'evenement puis celle de l'utilisateur
                $data = $parser->getAllEvent();
                foreach ($data as $event) {
                    $event["calendarID"] = $calendarID;
                    $event["colorID"] = $colorID;
                    $eventModel = $eventModel->hydrate($event);
                    $eventModel->create();
                    //liste de l'utilisateur
                    $eventID = Db::getInstance()->lastInsertId();
                    $userEventModel->hydrate(compact("eventID", "userID"));
                    $userEventModel->create();
                }
            }

            //mettre a jour la session
            $calendars = $calendarModel->findFor($userID);
            $nbCalendar = count($calendars);
            UserModel::updateSession(compact("nbCalendar", "calendars"));
        }
        header("Location:.");
    }
}