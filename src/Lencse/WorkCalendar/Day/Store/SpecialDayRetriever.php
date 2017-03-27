<?php

namespace Lencse\WorkCalendar\Day\Store;


use Lencse\WorkCalendar\Day\Date;
use Lencse\WorkCalendar\Day\SpecialDay;

interface SpecialDayRetriever
{

    /**
     * @param Date $date
     * @return bool
     */
    public function hasSpecialDayForDate(Date $date);

    /**
     * @param Date $date
     * @return SpecialDay
     */
    public function getSpecialDayForDate(Date $date);

}
