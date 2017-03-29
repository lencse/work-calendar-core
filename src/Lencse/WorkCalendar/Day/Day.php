<?php

namespace Lencse\WorkCalendar\Day;

class Day
{

    use DayTrait;

    /**
     * @param IrregularDay $specialDay
     * @return Day
     */
    public static function createFromIrregularDay(IrregularDay $specialDay)
    {
        return new self($specialDay->getDate(), $specialDay->getType(), $specialDay->getDescription());
    }
}
