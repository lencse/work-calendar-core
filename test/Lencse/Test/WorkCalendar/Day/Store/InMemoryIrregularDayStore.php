<?php

namespace Lencse\Test\WorkCalendar\Day\Store;

use Lencse\Date\Date;
use Lencse\WorkCalendar\Day\DayType;
use Lencse\WorkCalendar\Day\IrregularDay;
use Lencse\WorkCalendar\Day\Store\IrregularDayStore;

class InMemoryIrregularDayStore implements IrregularDayStore
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
    public function getAllIrregularDays()
    {
        return [
            '20170315' => new IrregularDay(
                \DateTime::createFromFormat('Y-m-d', '2017-03-15'),
                DayType::get(DayType::NON_WORKING_DAY)
            )
        ];
    }
}
