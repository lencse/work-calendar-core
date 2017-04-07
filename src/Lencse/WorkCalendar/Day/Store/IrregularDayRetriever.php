<?php

namespace Lencse\WorkCalendar\Day\Store;

use Lencse\Date\Date;
use Lencse\WorkCalendar\Day\IrregularDay;

interface IrregularDayRetriever
{

    /**
     * @param Date $date
     * @return bool
     */
    public function hasIrregularDayForDate(Date $date);

    /**
     * @param Date $date
     * @return IrregularDay
     */
    public function getIrregularDayForDate(Date $date);
}
