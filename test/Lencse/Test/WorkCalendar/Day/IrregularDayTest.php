<?php

namespace Lencse\Test\WorkCalendar\Day;

use Lencse\Date\DateHelper;
use Lencse\WorkCalendar\Day\IrregularDay;
use Lencse\WorkCalendar\Day\DayType;

class IrregularDayTest extends \PHPUnit_Framework_TestCase
{

    public function testDayCreation()
    {
        $day = new IrregularDay(
            DateHelper::dateTime('2017-03-15'),
            DayType::get(DayType::NON_WORKING_DAY),
            'Az 1848-as forradalom ünnepe'
        );
        $this->assertEquals(DateHelper::dateTime('2017-03-15'), $day->getDate());
        $this->assertEquals('Az 1848-as forradalom ünnepe', $day->getDescription());
        $this->assertEquals(DayType::get(DayType::NON_WORKING_DAY), $day->getType());
    }

    public function testDayCreationWithEmptyDescription()
    {
        $day = new IrregularDay(
            DateHelper::dateTime('2017-03-18'),
            DayType::get(DayType::RELOCATED_WORKING_DAY)
        );
        $this->assertEquals(DateHelper::dateTime('2017-03-18'), $day->getDate());
        $this->assertEquals('', $day->getDescription());
    }
}
