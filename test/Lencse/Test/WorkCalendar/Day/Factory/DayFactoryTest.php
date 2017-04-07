<?php

namespace Lencse\Test\WorkCalendar\Day\Factory;

use Lencse\Date\Date;
use Lencse\Test\WorkCalendar\Day\Store\InMemoryIrregularDayStore;
use Lencse\WorkCalendar\Day\DayType;
use Lencse\WorkCalendar\Day\Factory\DayFactory;
use Lencse\WorkCalendar\Day\Store\StoreBasedIrregularDayRetriever;

class DayFactoryTest extends \PHPUnit_Framework_TestCase
{

    public function testNormalDay()
    {
        $day = $this->getFactory()->createDayForDate(new Date(2017, 3, 27));
        $this->assertEquals(DayType::get(DayType::WORKING_DAY), $day->getType());
    }

    public function testNonWorkingDay()
    {
        $day = $this->getFactory()->createDayForDate(new Date(2017, 3, 15));
        $this->assertEquals(DayType::get(DayType::NON_WORKING_DAY), $day->getType());
    }

    /**
     * @return DayFactory
     */
    private function getFactory()
    {
        $store = new InMemoryIrregularDayStore();
        $retriever = new StoreBasedIrregularDayRetriever($store);
        $factory = new DayFactory($retriever);
        
        return $factory;
    }
}
