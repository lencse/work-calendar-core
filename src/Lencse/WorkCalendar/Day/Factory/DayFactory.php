<?php

namespace Lencse\WorkCalendar\Day\Factory;


use Lencse\WorkCalendar\Day\Date;
use Lencse\WorkCalendar\Day\Day;
use Lencse\WorkCalendar\Day\DayType;
use Lencse\WorkCalendar\Day\Store\IrregularDayRetriever;

class DayFactory
{

    /**
     * @var IrregularDayRetriever
     */
    private $store;

    /**
     * @param IrregularDayRetriever $specialDayRetriever
     */
    public function __construct(IrregularDayRetriever $specialDayRetriever)
    {
        $this->store = $specialDayRetriever;
    }

    /**
     * @param Date $date
     * @return Day
     */
    public function createDayForDate(Date $date)
    {
        if ($this->store->hasIrregularDayForDate($date)) {
            return Day::createFromIrregularDay($this->store->getIrregularDayForDate($date));
        }
        $type = $date->isWeekend() ? DayType::WEEKEND : DayType::WORKING_DAY;

        return new Day($date, DayType::get($type));
    }

}
