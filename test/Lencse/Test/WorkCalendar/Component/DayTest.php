<?php

namespace Lencse\Test\WorkCalendar\Component;


use Lencse\WorkCalendar\Component\Day;
use Lencse\WorkCalendar\Component\DayType;

class DayTest extends \PHPUnit_Framework_TestCase
{

    public function testDayCreation()
    {
        $date = \DateTime::createFromFormat('Y-m-d', '2017-03-15');
        $day = new Day($date, new DayType(DayType::NON_WORKING_DAY), 'Az 1848-as forradalom ünnepe');
        $this->assertEquals($date, $day->getDate());
        $this->assertEquals('Az 1848-as forradalom ünnepe', $day->getDescription());
        $this->assertEquals(new DayType(DayType::NON_WORKING_DAY), $day->getType());
    }

}