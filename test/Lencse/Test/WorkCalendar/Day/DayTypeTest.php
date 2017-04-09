<?php

namespace Lencse\Test\WorkCalendar\Day;

use Lencse\WorkCalendar\Day\DayType;

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
            $dayType = DayType::get($type);
            $this->assertEquals($type, $dayType->getKey());
            $this->assertEquals($restDay, $dayType->isRestDay());
        }
    }

    public function testArgument()
    {
        try {
            $type = DayType::get('invalid');
        } catch (\InvalidArgumentException $e) {
            return;
        }
        $this->fail('Exception should be thrown');
    }

    public function testName()
    {
        $names = [
            DayType::NON_WORKING_DAY => 'Munkaszüneti nap',
            DayType::RELOCATED_REST_DAY => 'Áthelyezett pihenőnap',
            DayType::RELOCATED_WORKING_DAY => 'Áthelyezett munkanap',
            DayType::WORKING_DAY => 'Munkanap',
            DayType::WEEKEND => 'Heti pihenőnap'
        ];
        foreach ($names as $type => $name) {
            $dayType = DayType::get($type);
            $this->assertEquals($name, $dayType->getName());
        }
    }
}
