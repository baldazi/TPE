<?php

namespace App\Core;

use DateTime;

class IcsParser
{
    private $fileText;
    private $calendar;
    private $eventCount;
    private $todoCount;
    private $lastKey;

    public function readFile($file)
    {
        $this->file = $file;
        $this->fileText = file_get_contents($file);
        $this->fileText = preg_replace("/[\r\n]{1,} ([:;])/", "\\1", $this->fileText);
        return $this->fileText;
    }

    public function isEmpty()
    {
        return empty($this->calendar);
    }

    public function parse($uri)
    {
        $this->calendar = [];
        $this->eventCount = -1;
        $this->fileText = $this->readFile($uri);
        $lines = preg_split("/[\n]/", $this->fileText);

        if (stripos($lines[0], 'BEGIN:VCALENDAR') === false) {
            return false;
        }

        $type = '';

        foreach ($lines as $line) {
            $line = trim($line);

            if (!empty($line)) {
                list($key, $value) = $this->returnKeyValue($line);

                switch ($line) {
                    case "BEGIN:VTODO":
                        $this->todoCount++;
                        $type = "VTODO";
                        break;

                    case "BEGIN:VEVENT":
                        $this->eventCount++;
                        $type = "VEVENT";
                        break;

                    case "BEGIN:VCALENDAR":
                    case "BEGIN:DAYLIGHT":
                    case "BEGIN:VTIMEZONE":
                    case "BEGIN:STANDARD":
                        $type = $value;
                        break;

                    case "END:VTODO":
                    case "END:VEVENT":
                    case "END:VCALENDAR":
                    case "END:DAYLIGHT":
                    case "END:VTIMEZONE":
                    case "END:STANDARD":
                        $type = "VCALENDAR";
                        break;

                    default:
                        $this->addToCalendar($type, $key, $value);
                        break;
                }
            }
        }

        return $this->calendar;
    }

    private function addToCalendar($type, $key, $value)
    {
        if ($key === false) {
            $key = $this->lastKey;

            switch ($type) {
                case 'VEVENT':
                    $value = $this->calendar[$type][$this->eventCount][$key] . $value;
                    break;
                case 'VTODO':
                    $value = $this->calendar[$type][$this->todoCount][$key] . $value;
                    break;
            }
        }

        if (in_array($key, ["DTSTAMP", "LAST-MODIFIED", "CREATED"])) {
            $value = $this->icalDateToUnix($value);
        }

        if ($key === "RRULE") {
            $value = $this->icalRrule($value);
        }

        if (stristr($key, "DTSTART") || stristr($key, "DTEND")) {
            list($key, $cdate) = $this->icalDtDate($key, $this->getDateTimeFromIcal($value));
        }

        switch ($type) {
            case "VTODO":
                $this->calendar[$type][$this->todoCount][$key] = $value;
                break;

            case "VEVENT":
                $this->calendar[$type][$this->eventCount][$key] = $value;
                break;

            default:
                $this->calendar[$type][$key] = $value;
                break;
        }

        $this->lastKey = $key;
    }

    private function returnKeyValue($line)
    {
        preg_match("/([^:]+)[:]([\w\W]+)/", $line, $matches);

        if (empty($matches)) {
            return [false, $line];
        } else {
            return array_splice($matches, 1, 2);
        }
    }

    private function icalRrule($value)
    {
        $rrule = explode(';', $value);
        $result = [];

        foreach ($rrule as $line) {
            $rcontent = explode('=', $line);
            $result[$rcontent[0]] = $rcontent[1];
        }

        return $result;
    }

    private function icalDateToUnix($icalDate)
    {
        if ($icalDate instanceof DateTime) {
            $icalDate = $icalDate->format('YmdHis');
        }
        $icalDate = str_replace(['T', 'Z'], '', $icalDate);

        preg_match('/(\d{4})(\d{2})(\d{2})(\d{0,2})(\d{0,2})(\d{0,2})/', $icalDate, $date);

        if (isset($data) && $date[1] <= 1970) {
            $date[1] = 1971;
        }

        return mktime((int)($date[4] ?? 0), (int)($date[5] ?? 0), (int)($date[6] ?? 0), (int)($date[2] ?? 0), (int)($date[3] ?? 0), (int)($date[1] ?? 0));
    }

    private function icalDtDate($key, $value)
    {
        $value = $this->icalDateToUnix($value);

        $temp = explode(";", $key);

        if (empty($temp[1])) {
            return [$key, $value];
        }

        $key = $temp[0];
        $temp = explode("=", $temp[1]);
        $return_value[$temp[0]] = $temp[1];
        $return_value['unixtime'] = $value;

        return [$key, $return_value];
    }

    private function getDateTimeFromIcal($icalDate)
    {
        return DateTime::createFromFormat('Ymd?His', $icalDate);
    }

    public function splitDateTime($dateTimeString, $dateFormat = 'Y-m-d', $timeFormat = 'H:i:s') {
        $dateTime = DateTime::createFromFormat('Ymd\THis', $dateTimeString);
    
        if ($dateTime instanceof DateTime) {
            $formattedDate = $dateTime->format($dateFormat);
            $formattedTime = $dateTime->format($timeFormat);
    
            return ['date' => $formattedDate, 'time' => $formattedTime];
        } else {
            return null;
        }
    }

    public function getSortEventList()
    {
        $temp = $this->getEventList();
        if (!empty($temp)) {
            usort($temp, array($this, "icalDtstartCompare"));
            return $temp;
        } else {
            return false;
        }
    }

    public function icalDtstartCompare($a, $b)
    {
        return strnatcasecmp($a['DTSTART']['unixtime'], $b['DTSTART']['unixtime']);
    }

    public function getEventList()
    {
        return $this->calendar['VEVENT'];
    }

    public function getTodoList()
    {
        return $this->calendar['VTODO'];
    }

    public function getCalendarData()
    {
        return $this->calendar['VCALENDAR'];
    }

    public function getName(){
        $calendar = $this->getCalendarData();
        $name = $calendar["X-WR-CALNAME"];
        return trim(preg_replace('/^([^(]+)\s*\(.*/', '$1', $name));
    }

    public function getAllData()
    {
        return $this->calendar;
    }

    public function getAllEvent(){
        $eventArray = [];
        foreach($this->calendar["VEVENT"] as $event){
            $e["uid"] = $event["UID"];
            $e["startDateTime"] = $event["DTSTART"]??"";
            $e["endDateTime"] = $event["DTEND"]??"";
            $e["title"] = $event["SUMMARY"];
            $e["location"] = $event["LOCATION"]??"";
            $e["status"] = $event["STATUS"];
            $e["description"] = $event["DESCRIPTION"]??"";
            $e["created"] = $event["CREATED"];
            $e["lastModified"] = $event["LAST-MODIFIED"];
            $eventArray[] = $e;
        }
        return $eventArray;
    }
}

