<?php

namespace Lencse\WorkCalendar\Component ;


class Day
{

    /**
     * @var int
     */
    private $month;

    /**
     * @var int
     */
    private $day;

    /**
     * @var string
     */
    private $description;

    /**
     * @param int $month
     * @param int $day
     * @param string $description
     */
    public function __construct($month, $day, $description)
    {
        $this->month = $month;
        $this->day = $day;
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getMonth()
    {
        return $this->month;
    }

    /**
     * @return int
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

}