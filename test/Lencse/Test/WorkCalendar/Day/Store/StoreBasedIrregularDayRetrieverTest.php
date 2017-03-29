<?php

namespace Lencse\Test\WorkCalendar\Day\Store;

use Lencse\WorkCalendar\Day\Date;
use Lencse\WorkCalendar\Day\Store\StoreBasedIrregularDayRetriever;

class StoreBasedIrregularDayRetrieverTest extends \PHPUnit_Framework_TestCase
{

    public function testException()
    {
        $store = new InMemoryIrregularDayStore();
        $retriever = new StoreBasedIrregularDayRetriever($store);
        try {
            $retriever->getIrregularDayForDate(new Date(2017, 2, 1));
        } catch (\LogicException $e) {
            return;
        }
        $this->fail('Exception not thrown');
    }
}
