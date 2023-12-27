<?php

namespace App\Models;

class EventModel extends Model{
    protected $id;
    protected $title;
    protected $startDate;
    protected $endDate;
    protected $startTime;
    protected $endTime;
    protected $location;
    protected $description;

    private $sql = "

    -- Table structure for table `events`
    CREATE TABLE IF NOT EXISTS `Event` (
      `ID` INTEGER PRIMARY KEY AUTOINCREMENT,
      `StartDate` DATE NOT NULL DEFAULT '0000-00-00',
      `StartTime` TIME NOT NULL DEFAULT '00:00:00',
      `EndDate` DATE NOT NULL DEFAULT '0000-00-00',
      `EndTime` TIME NOT NULL DEFAULT '00:00:00',
      `Title` TEXT NOT NULL DEFAULT '',
      `Location` TEXT DEFAULT NULL,
      `Description` TEXT,
      UNIQUE (`ID`)
    );
    ";
    public function __construct(){
        $this->table = str_replace('Model', '', str_replace(__NAMESPACE__.'\\','',__CLASS__));
    }

    // Setters
    public function setTitle($title) {
      $this->title = $title;
    }

    public function setStartDate($startDate) {
      $this->startDate = $startDate;
    }

    public function setEndDate($endDate) {
        $this->endDate = $endDate;
    }

    public function setStartTime($startTime) {
        $this->startTime = $startTime;
    }

    public function setEndTime($endTime) {
        $this->endTime = $endTime;
    }

    public function setLocation($location) {
        $this->location = $location;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function migrate(){
      $this->execute($this->sql);
    }
}
