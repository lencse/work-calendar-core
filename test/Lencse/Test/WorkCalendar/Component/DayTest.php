<?php

namespace Lencse\Test\WorkCalendar\Component;


use Lencse\WorkCalendar\Component\Day;

class DayTest extends \PHPUnit_Framework_TestCase
{

    public function testDayCreation()
    {
        $day = new Day('test');
        $this->assertEquals('test', $day->getDescription());
    }

}