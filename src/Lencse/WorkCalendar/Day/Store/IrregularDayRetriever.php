<?php

namespace Lencse\WorkCalendar\Day\Store;

use Lencse\WorkCalendar\Day\IrregularDay;

interface IrregularDayRetriever
{

    /**
     * @param \DateTime $date
     * @return bool
     */
    public function hasIrregularDayForDate(\DateTime $date);

    /**
     * @param \DateTime $date
     * @return IrregularDay
     */
    public function getIrregularDayForDate(\DateTime $date);
}
