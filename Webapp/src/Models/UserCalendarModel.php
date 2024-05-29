<?php
namespace App\Models;

class UserCalendarModel extends Model {
    use ModelBase;

    public function Subscribers($calId)
    {
        // Préparation de la requête SQL
        $req = "
        SELECT 
            User.id AS userID,
            User.firstname,
            User.lastname,
            User.pseudo,
            User.email
        FROM User
        JOIN UserCalendar ON User.id = UserCalendar.userID
        WHERE UserCalendar.calendarID = ?;
    ";

        return $this->q($req, [$calId])->fetchAll();
    }

}