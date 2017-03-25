<?php

namespace Lencse\Test\WorkCalendar\Component;


use Lencse\WorkCalendar\Component\Day;

class DayTest extends \PHPUnit_Framework_TestCase
{

    public function testDayCreation()
    {
        $day = new Day(11, 27, 'test');
        $this->assertEquals(11, $day->getMonth());
        $this->assertEquals(27, $day->getDay());
        $this->assertEquals('test', $day->getDescription());
    }

}