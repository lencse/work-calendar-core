<?php

namespace Lencse\Test\WorkCalendar\Day\Factory;


use Lencse\Test\WorkCalendar\Day\Store\InMemoryIrregularDayStore;
use Lencse\WorkCalendar\Day\Date;
use Lencse\WorkCalendar\Day\DayType;
use Lencse\WorkCalendar\Day\Factory\DayFactory;
use Lencse\WorkCalendar\Day\Store\StoreBasedIrregularDayRetriever;

class DayFactoryTest extends \PHPUnit_Framework_TestCase
{

    public function testNormalDay()
    {
        $store = new InMemoryIrregularDayStore();
        $factory = new DayFactory(new StoreBasedIrregularDayRetriever($store));
        $day = $factory->createDayForDate(new Date(2017, 3, 27));
        $this->assertEquals(DayType::get(DayType::WORKING_DAY), $day->getType());
    }
    public function testNonWorkingDay()
    {
        $store = new InMemoryIrregularDayStore();
        $factory = new DayFactory(new StoreBasedIrregularDayRetriever($store));
        $day = $factory->createDayForDate(new Date(2017, 3, 15));
        $this->assertEquals(DayType::get(DayType::NON_WORKING_DAY), $day->getType());
    }

}
