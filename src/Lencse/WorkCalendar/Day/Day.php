<?php

namespace Lencse\WorkCalendar\Day;


class Day
{

   use DayTrait;

    /**
     * @param SpecialDay $specialDay
     * @return Day
     */
    public static function createFromSpecialDay(SpecialDay $specialDay)
    {
        return new self($specialDay->getDate(), $specialDay->getType(), $specialDay->getDescription());
    }

}
