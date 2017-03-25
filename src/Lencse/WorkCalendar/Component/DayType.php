<?php

namespace Lencse\WorkCalendar\Component;


class DayType
{

    const NON_WORKING_DAY = 'non-working-day';
    const RELOCATED_REST_DAY = 'relocated-rest-day';
    const RELOCATED_WORKING_DAY = 'relocated-working-day';
    const WORKING_DAY = 'working-day';
    const WEEKEND = 'weekend';

    /**
     * @var string
     */
    private $type;

    /**
     * @var string[]
     */
    private static $types = [
        self::NON_WORKING_DAY,
        self::RELOCATED_REST_DAY,
        self::RELOCATED_WORKING_DAY,
        self::WORKING_DAY,
        self::WEEKEND,
    ];

    /**
     * @param string $type
     */
    public function __construct($type)
    {
        if (!in_array($type, self::$types)) {
            throw new \InvalidArgumentException(sprintf('Valid day types are: %s', implode(', ', self::$types)));
        }

        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return bool
     */
    public function isRestDay()
    {
        return $this->type == self::NON_WORKING_DAY
            || $this->type == self::RELOCATED_REST_DAY
            || $this->type == self::WEEKEND;
    }

}
