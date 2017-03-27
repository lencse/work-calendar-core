<?php

namespace Lencse\WorkCalendar\Day\Factory;


use Lencse\WorkCalendar\Day\Date;
use Lencse\WorkCalendar\Day\Day;
use Lencse\WorkCalendar\Day\DayType;
use Lencse\WorkCalendar\Day\Store\SpecialDayRetriever;

class DayFactory
{

    /**
     * @var SpecialDayRetriever
     */
    private $store;

    /**
     * @param SpecialDayRetriever $specialDayRetriever
     */
    public function __construct(SpecialDayRetriever $specialDayRetriever)
    {
        $this->store = $specialDayRetriever;
    }

    /**
     * @param Date $date
     * @return Day
     */
    public function createDayForDate(Date $date)
    {
        if ($this->store->hasSpecialDayForDate($date)) {
            return Day::createFromSpecialDay($this->store->getSpecialDayForDate($date));
        }
        $type = $date->isWeekend() ? DayType::WEEKEND : DayType::WORKING_DAY;

        return new Day($date, DayType::get($type));
    }

}
