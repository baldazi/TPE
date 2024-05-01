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
                Event.startDate,
                Event.startTime,
                Event.endDate,
                Event.endTime,
                Event.title,
                Event.location,
                Event.description,
                User.id AS UserID,
                User.pseudo,
                User.email
            FROM Event
            LEFT JOIN UserEvent ON Event.id = UserEvent.eventID
            LEFT JOIN User ON UserEvent.userID = User.id;
            ";
        $tab = $this->q($req);
        return $tab->fetchAll();
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
}
