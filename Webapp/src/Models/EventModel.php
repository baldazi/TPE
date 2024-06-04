<?php

namespace App\Models;

class EventModel extends Model
{
    use ModelBase;

    //queries
    public function findAllXUser()
    {
        $req = "
        SELECT 
            Event.id AS eventID,
            Event.startDateTime,
            Event.endDateTime,
            Event.title,
            Event.location,
            Event.description,
            User.id AS userID,
            User.pseudo,
            User.email
        FROM Event
        LEFT JOIN UserEvent ON Event.id = UserEvent.eventID
        LEFT JOIN User ON UserEvent.userID = User.id;
        ";

        $tab = $this->q($req);
        return $tab->fetchAll();
    }

    public function findAllXUserNextWeek()
    {
        $req = "
        SELECT 
            Event.id AS eventID,
            Event.startDateTime,
            Event.endDateTime,
            Event.title,
            Event.location,
            Event.description,
            User.id AS userID,
            User.pseudo,
            User.email
        FROM Event
        LEFT JOIN UserEvent ON Event.id = UserEvent.eventID
        LEFT JOIN User ON UserEvent.userID = User.id
        WHERE 
            (substr(Event.startDateTime, 1, 10) >= DATE('now', '+1 day') 
            AND substr(Event.startDateTime, 1, 10) < DATE('now', '+8 days'))
        OR
            (substr(Event.startDateTime, 1, 8) >= strftime('%Y%m%d', DATE('now', '+1 day')) 
            AND substr(Event.startDateTime, 1, 8) < strftime('%Y%m%d', DATE('now', '+8 days')))
        ORDER BY Event.startDateTime ASC;
    ";
        $tab = $this->q($req);
        // Récupération des résultats
        $results = $tab->fetchAll();

        // Fonction pour séparer date et heure avec formatage
        function formatDateTime($dateTime)
        {
            $date = substr($dateTime, 0, 8);
            $time = strlen($dateTime) > 8 ? substr($dateTime, 9) : '';

            // Reformater la date
            $formattedDate = substr($date, 0, 4) . '-' . substr($date, 4, 2) . '-' . substr($date, 6, 2);

            // Reformater l'heure si présente
            if ($time !== '') {
                $formattedTime = substr($time, 0, 2) . ':' . substr($time, 2, 2) . ':' . substr($time, 4, 2);
            } else {
                $formattedTime = '';
            }

            return [$formattedDate, $formattedTime];
        }

        // Traitement pour structurer les événements par utilisateur
        $usersEvents = [];

        foreach ($results as $result) {
            $userID = $result->userID;
            if (!isset($usersEvents[$userID])) {
                $usersEvents[$userID] = (object)[
                    'id' => $userID,
                    'email' => $result->email,
                    'count' => 0,
                    'events' => []
                ];
            }

            list($startDate, $startTime) = formatDateTime($result->startDateTime);
            list($endDate, $endTime) = formatDateTime($result->endDateTime);

            $usersEvents[$userID]->events[] = (object)[
                'title' => $result->title,
                'startDate' => $startDate,
                'startTime' => $startTime,
                'endDate' => $endDate,
                'endTime' => $endTime,
                'location' => $result->location,
                'description' => $result->description
            ];

            $usersEvents[$userID]->count++;
        }

        // Convertir les résultats en une liste
        return array_values($usersEvents);
    }


    /**
     * Méthode pour récupérer les événements avec le nom du calendrier de provenance
     * pour un utilisateur passé en paramètre $userId.
     *
     * @param int $userId L'identifiant de l'utilisateur
     * @return false|\PDOStatement Les événements avec le nom du calendrier de provenance
     */
    public function findFor($userId)

    {
        $query = "SELECT Event.*, UserEvent.colorID, Calendar.name AS calendar
              FROM {$this->table}
              JOIN Calendar ON Event.calendarID = Calendar.id
              JOIN UserEvent ON Event.id = UserEvent.eventID
              WHERE UserEvent.userID = ?";

        return $this->q($query, [$userId])->fetchAll();
    }

    public function countFor($userId)
    {
        $query =  "SELECT 
                SUM(CASE WHEN SUBSTR(e.startDateTime, 1, 8) || CASE WHEN LENGTH(e.startDateTime) = 8 THEN 'T000000' ELSE SUBSTR(e.startDateTime, 9) END > ? THEN 1 ELSE 0 END) AS upcoming,
                SUM(CASE WHEN SUBSTR(e.endDateTime, 1, 8) || CASE WHEN LENGTH(e.endDateTime) = 8 THEN 'T000000' ELSE SUBSTR(e.endDateTime, 9) END <= ? THEN 1 ELSE 0 END) AS previous,
                COUNT(*) AS total
            FROM 
                User u
            JOIN 
                UserEvent ue ON u.id = ue.userID
            JOIN 
                Event e ON ue.eventID = e.id
            WHERE 
                u.id = ?";

        // Récupérer la date et l'heure actuelles au format approprié
        $now = date('Ymd\THis');

        // Exécution de la requête avec les paramètres
        return $this->q($query, [$now, $now, $userId])->fetch();
    }

}
