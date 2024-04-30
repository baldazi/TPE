<?php

namespace App\Models;

class CalendarModel extends Model
{
    use ModelBase;

    /**
     * Méthode pour récupérer tous les calendriers d'un utilisateur avec le nombre d'événements associés à chaque calendrier.
     *
     * @param int $userId L'identifiant de l'utilisateur
     * @return array Les calendriers avec le nombre d'événements associés
     */
    public function findFor($userId)
    {
        $query = "SELECT Calendar.*, COUNT(Event.id) AS nbEvenements
              FROM {$this->table}
              LEFT JOIN Event ON Calendar.id = Event.calendarID
              JOIN UserCalendar ON Calendar.id = UserCalendar.calendarID
              WHERE UserCalendar.userID = ?
              GROUP BY Calendar.id";
        return $this->q($query, [$userId])->fetchAll() ?: [];
    }

    /**
     * Trouver tous les événements d'un calendrier.
     *
     * @param int $id L'identifiant du calendrier
     * @return array|false Un tableau contenant tous les événements du calendrier ou false en cas d'échec
     */
    public function findEvent($id)
    {
        $query = "SELECT * FROM Event WHERE calendarID = ?";
        return $this->q($query, [$id])->fetchAll();
    }


    /**
     * Méthode pour trouver le nombre de calendriers pour un utilisateur donné.
     *
     * @param int $userId L'identifiant de l'utilisateur
     * @return int Le nombre de calendriers pour l'utilisateur
     */
    public function size($userId)
    {
        $query = "SELECT COUNT(id) AS nb_calendriers
              FROM {$this->table}
              JOIN UserCalendar ON Calendar.id = UserCalendar.calendarID
              WHERE UserCalendar.userID = ?";
        $result = $this->q($query, [$userId])->fetchAll();
        return $result['nb_calendriers'];
    }
}