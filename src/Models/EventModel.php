<?php

namespace App\Models;

class EventModel extends Model{
    use ModelBase;
    //queries
    public function findAllXUser(){
      $req = "
        SELECT 
            Event.ID AS EventID,
            Event.StartDate,
            Event.StartTime,
            Event.EndDate,
            Event.EndTime,
            Event.Title,
            Event.Location,
            Event.Description,
            User.id AS UserID,
            User.pseudo,
            User.email
        FROM Event
        LEFT JOIN User ON Event.UserID = User.id;
        ";
      $tab = $this->q($req);
      return $tab->fetchAll();
  }
}
