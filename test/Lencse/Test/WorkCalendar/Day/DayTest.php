<?php

namespace Lencse\Test\WorkCalendar\Day;

use Lencse\Date\DateHelper;
use Lencse\WorkCalendar\Day\Day;
use Lencse\WorkCalendar\Day\DayType;

class DayTest extends \PHPUnit_Framework_TestCase
{

    public function testDayCreation()
    {
        $day = new Day(
            DateHelper::dateTime('2017-03-15'),
            DayType::get(DayType::NON_WORKING_DAY),
            'Az 1848-as forradalom ünnepe'
        );
        $this->assertEquals(\DateTime::createFromFormat('Y-m-d', '2017-03-15'), $day->getDate());
        $this->assertEquals('Az 1848-as forradalom ünnepe', $day->getDescription());
        $this->assertEquals(DayType::get(DayType::NON_WORKING_DAY), $day->getType());
    }

    public function testDayCreationWithEmptyDescription()
    {
        $day = new Day(
            DateHelper::dateTime('2017-03-18'),
            DayType::get(DayType::RELOCATED_WORKING_DAY)
        );
        $this->assertEquals(\DateTime::createFromFormat('Y-m-d', '2017-03-18'), $day->getDate());
        $this->assertEquals('', $day->getDescription());
    }
}
