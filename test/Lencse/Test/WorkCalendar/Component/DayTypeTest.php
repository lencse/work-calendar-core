<?php

namespace Lencse\Test\WorkCalendar\Component;


use Lencse\WorkCalendar\Component\DayType;

class DayTypeTest extends \PHPUnit_Framework_TestCase
{

    public function testRestDay()
    {
        $types = [
            DayType::NON_WORKING_DAY => true,
            DayType::RELOCATED_REST_DAY => true,
            DayType::RELOCATED_WORKING_DAY => false,
            DayType::WORKING_DAY => false,
            DayType::WEEKEND => true
        ];
        foreach ($types as $type => $restDay) {
            $dayType = new DayType($type);
            $this->assertEquals($type, $dayType->getType());
            $this->assertEquals($restDay, $dayType->isRestDay());
        }
    }

    public function testArgument()
    {
        try {
            $type = new DayType('invalid');
        }
        catch (\InvalidArgumentException $e) {
            return;
        }
        $this->fail('Exception should be thrown');
    }

}
