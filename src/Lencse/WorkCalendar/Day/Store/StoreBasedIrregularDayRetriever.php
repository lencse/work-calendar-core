<?php

namespace Lencse\WorkCalendar\Day\Store;

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
     * @param \DateTime $date
     * @return bool
     */
    public function hasIrregularDayForDate(\DateTime $date)
    {
        return array_key_exists($date->format('Ymd'), $this->irregularDays);
    }

    /**
     * @param \DateTime $date
     * @return IrregularDay
     */
    public function getIrregularDayForDate(\DateTime $date)
    {
        if (!$this->hasIrregularDayForDate($date)) {
            throw new \LogicException(sprintf('Day %s is not irregular', $date->format('Ymd')));
        }

        return $this->irregularDays[$date->format('Ymd')];
    }
}
