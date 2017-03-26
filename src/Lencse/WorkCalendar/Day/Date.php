<?php

namespace Lencse\WorkCalendar\Day;


class Date
{

    /**
     * @var int
     */
    private $year;

    /**
     * @var int
     */
    private $month;

    /**
     * @var int
     */
    private $day;

    /**
     * @param int $year
     * @param int $month
     * @param int $day
     */
    public function __construct($year, $month, $day)
    {
        if (!checkdate($month, $day, $year)) {
            throw new \InvalidArgumentException(sprintf('Invalid date: %d.%d.%d.', $year, $month, $day));
        }

        $this->year = $year;
        $this->month = $month;
        $this->day = $day;
    }

    /**
     * @return int
     */
    public function getYear()
    {
        return $this->year;
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

}