<?php

namespace Lencse\Test\WorkCalendar\Component;


use Lencse\WorkCalendar\Day\Date;

class DateTest extends \PHPUnit_Framework_TestCase
{

    public function testDateCreation()
    {
        $date = new Date(2017, 3, 15);
        $this->assertEquals(2017, $date->getYear());
        $this->assertEquals(3, $date->getMonth());
        $this->assertEquals(15, $date->getDay());
    }

    public function testInvalid()
    {
        try {
            $date = new Date(2017, 100, 100);
        }
        catch (\InvalidArgumentException $e) {
            return;
        }
        $this->fail('Exception should be thrown');
    }

}