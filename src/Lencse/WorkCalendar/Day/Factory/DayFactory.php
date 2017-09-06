<?php

namespace Lencse\WorkCalendar\Day\Factory;

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
     * @param \DateTime $date
     * @return Day
     */
    public function createDayForDate(\DateTime $date)
    {
        if ($this->retriever->hasIrregularDayForDate($date)) {
            return Day::createFromIrregularDay($this->retriever->getIrregularDayForDate($date));
        }
        $type = $this->isWeekend($date) ? DayType::WEEKEND : DayType::WORKING_DAY;

        return new Day($date, DayType::get($type));
    }

    private function isWeekend(\DateTime $date)
    {
        $dayOfWeek = (int) $date->format('N');

        return 6 === $dayOfWeek || 7 === $dayOfWeek;
    }
}
