<?php

namespace Lencse\Test\WorkCalendar\Day\Factory\Store;


use Lencse\WorkCalendar\Day\Date;
use Lencse\WorkCalendar\Day\DayType;
use Lencse\WorkCalendar\Day\SpecialDay;
use Lencse\WorkCalendar\Day\Store\SpecialDayRetriever;

class InMemorySpecialDayRetriever implements SpecialDayRetriever
{

    /**
     * @param Date $date
     * @return bool
     */
    public function hasSpecialDayForDate(Date $date)
    {
        return $date == new Date(2017, 3, 15);
    }

    /**
     * @param Date $date
     * @return SpecialDay
     */
    public function getSpecialDayForDate(Date $date)
    {
        if ($date == new Date(2017, 3, 15)) {
            return new SpecialDay($date, DayType::get(DayType::NON_WORKING_DAY));
        }

        throw new \LogicException('No special day found.');
    }

}
