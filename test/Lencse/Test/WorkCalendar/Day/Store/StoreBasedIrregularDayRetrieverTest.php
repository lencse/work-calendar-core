<?php

namespace Lencse\Test\WorkCalendar\Day\Store;

use Lencse\Date\Date;
use Lencse\WorkCalendar\Day\Store\StoreBasedIrregularDayRetriever;

class StoreBasedIrregularDayRetrieverTest extends \PHPUnit_Framework_TestCase
{

    public function testException()
    {
        $store = new InMemoryIrregularDayStore();
        $retriever = new StoreBasedIrregularDayRetriever($store);
        try {
            $retriever->getIrregularDayForDate(\DateTime::createFromFormat('Y-m-d', '2017-02-01'));
        } catch (\LogicException $e) {
            return;
        }

        $this->fail('Exception not thrown');
    }
}
