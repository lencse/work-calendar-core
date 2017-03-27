<?php

namespace Lencse\WorkCalendar\Day\Store;


use Lencse\WorkCalendar\Day\IrregularDay;

interface IrregularDayStore
{

    /**
     * All irregular days indexed by date string.
     *
     * array(
     *     '20170315' => IrregularDay(...),
     *     '20170318' => IrregularDay(...),
     *     ...
     * )
     *
     * @return IrregularDay[]
     */
    public function getAllIrregularDays();

}
