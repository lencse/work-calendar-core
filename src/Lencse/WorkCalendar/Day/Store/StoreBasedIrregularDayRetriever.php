<?php

namespace Lencse\WorkCalendar\Day\Store;


use Lencse\WorkCalendar\Day\Date;
use Lencse\WorkCalendar\Day\IrregularDay;

class StoreBasedIrregularDayRetriever implements IrregularDayRetriever
{

    /**
     * @var IrregularDay[]
     */
    private $irregularDays;

    /**
     * @param IrregularDayStore $store
     */
    public function __construct(IrregularDayStore $store)
    {
        $this->irregularDays = $store->getAllIrregularDays();
    }

    /**
     * @param Date $date
     * @return bool
     */
    public function hasIrregularDayForDate(Date $date)
    {
        return array_key_exists((string) $date, $this->irregularDays);
    }

    /**
     * @param Date $date
     * @return IrregularDay
     */
    public function getIrregularDayForDate(Date $date)
    {
        if (!$this->hasIrregularDayForDate($date)) {
            throw new \LogicException(sprintf('Day %s is not irregular', $date));
        }

        return $this->irregularDays[(string) $date];
    }

}
