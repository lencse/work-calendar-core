<?php

namespace Lencse\Test\WorkCalendar\Day\Store;

use Lencse\Date\DateHelper;
use Lencse\WorkCalendar\Day\Store\StoreBasedIrregularDayRetriever;

class StoreBasedIrregularDayRetrieverTest extends \PHPUnit_Framework_TestCase
{

    public function testException()
    {
        $store = new InMemoryIrregularDayStore();
        $retriever = new StoreBasedIrregularDayRetriever($store);
        try {
            $retriever->getIrregularDayForDate(DateHelper::dateTime('2017-02-01'));
        } catch (\LogicException $e) {
            return;
        }

        $this->fail('Exception not thrown');
    }
}
