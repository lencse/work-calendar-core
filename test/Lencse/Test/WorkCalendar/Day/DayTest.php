<?php

namespace Lencse\Test\WorkCalendar\Component;


use Lencse\WorkCalendar\Day\Date;
use Lencse\WorkCalendar\Day\Day;
use Lencse\WorkCalendar\Day\DayType;

class DayTest extends \PHPUnit_Framework_TestCase
{

    public function testDayCreation()
    {
        $day = new Day(new Date(2017, 3, 5), DayType::get(DayType::NON_WORKING_DAY), 'Az 1848-as forradalom ünnepe');
        $this->assertEquals(new Date(2017, 3, 5), $day->getDate());
        $this->assertEquals('Az 1848-as forradalom ünnepe', $day->getDescription());
        $this->assertEquals(DayType::get(DayType::NON_WORKING_DAY), $day->getType());
    }

}