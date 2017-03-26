<?php

namespace Lencse\WorkCalendar\Day;


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
    private static $names = [
        self::NON_WORKING_DAY => 'Munkaszüneti nap',
        self::RELOCATED_REST_DAY => 'Áthelyezett pihenőnap',
        self::RELOCATED_WORKING_DAY => 'Áthelyezett munkanap',
        self::WORKING_DAY => 'Munkanap',
        self::WEEKEND => 'Heti pihenőnap'
    ];

    /**
     * @var DayType[]
     */
    private static $instances = null;

    /**
     * @return DayType[]
     */
    public static function getAllTypes()
    {
        if (is_null(self::$instances)) {
            self::$instances = [];
            foreach (self::getTypes() as $type) {
                self::$instances[$type] = new self($type);
            }
        }

        return self::$instances;
    }

    /**
     * @param $type
     * @return DayType
     */
    public static function get($type)
    {
        self::validateType($type);
        $all = self::getAllTypes();

        return $all[$type];
    }

    /**
     * @param string $type
     */
    private function __construct($type)
    {
        self::validateType($type);
        $this->type = $type;
    }

    /**
     * @return string[]
     */
    private static function getTypes()
    {
        return array_keys(self::$names);
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

    /**
     * @return string
     */
    public function getName()
    {
        return self::$names[$this->type];
    }

    /**
     * @param string $type
     */
    private static function validateType($type)
    {
        $types = self::getTypes();
        if (!in_array($type, $types)) {
            throw new \InvalidArgumentException(sprintf('Valid day types are: %s', implode(', ', $types)));
        }
    }

}
