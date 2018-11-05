<?php
/**
 * Created by PhpStorm.
 * User: luana
 * Date: 03/11/18
 * Time: 19:43
 */

class TimeTravel
{
    private $start;

    private $end;

    public function __construct(DateTime $start, DateTime $end)
    {
        $this->start = $start;
        $this->end = $end;
    }

    public function getTravelInfo(DateTime $start, DateTime $end)
    {
        $diff = $start->diff($end)->format('Il y a %y années, %m mois, %d jours, %h heures, %i minutes et %s secondes entre les deux dates.');
        return $diff;
    }

    public function findDate(DateInterval $interval)
    {
        $date = $this->start->sub($interval)->format('Y-m-d');
        return "Doc est retourné au $date";
    }

    public function backToFutureStepByStep(DateInterval $step)
    {
        $result = [];
        $dates = new DatePeriod($this->start, $step, $this->end);
        foreach ($dates as $date) {
            $result[] .= $date->format('M d Y A h:i');
        }
        return $result;
    }
}
