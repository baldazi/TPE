<?php

namespace App\Models;

use App\Core\Db;

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
    CREATE TABLE IF NOT EXISTS `events` (
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
        // Query to retrieve table information
        // $query = Db::getInstance()->query("SELECT * FROM sqlite_master WHERE type='table'");
        // $tables = $query->fetchAll();

        // // Dump the result using var_dump
        // var_dump($tables);
    }

    public function migrate(){
      $this->execute($this->sql);
    }
}
