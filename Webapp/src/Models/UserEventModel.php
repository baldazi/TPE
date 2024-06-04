<?php

namespace App\Models;

class UserEventModel extends Model
{
    use ModelBase;

    public function findFor($id)
    {
        $req = " SELECT 
                    e.id AS eventID,
                    e.uid AS eventUID,
                    e.startDateTime,
                    e.endDateTime,
                    e.title,
                    e.location,
                    e.description,
                    e.created,
                    e.lastModified,
                    e.status,
                    e.calendarID,
                    e.createdAt AS eventCreatedAt,
                    ue.colorID,
                    cp.name AS colorName,
                    cp.hexValue AS colorHexValue
                FROM 
                    User u
                JOIN 
                    UserEvent ue ON u.id = ue.userID
                JOIN 
                    Event e ON ue.eventID = e.id
                JOIN 
                    ColorPalette cp ON ue.colorID = cp.id
                WHERE 
                    u.id = ?;";

        return $this->q($req, [$id])->fetchAll();

    }

}