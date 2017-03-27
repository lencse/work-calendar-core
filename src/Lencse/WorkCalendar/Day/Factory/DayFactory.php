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
    private $retriever;

    /**
     * @param IrregularDayRetriever $irregularDayRetriever
     */
    public function __construct(IrregularDayRetriever $irregularDayRetriever)
    {
        $this->retriever = $irregularDayRetriever;
    }

    /**
     * @param Date $date
     * @return Day
     */
    public function createDayForDate(Date $date)
    {
        if ($this->retriever->hasIrregularDayForDate($date)) {
            return Day::createFromIrregularDay($this->retriever->getIrregularDayForDate($date));
        }
        $type = $date->isWeekend() ? DayType::WEEKEND : DayType::WORKING_DAY;

        return new Day($date, DayType::get($type));
    }

}
