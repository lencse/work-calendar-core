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
    private $key;

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
            foreach (self::getTypeKeys() as $key) {
                self::$instances[$key] = new self($key);
            }
        }

        return self::$instances;
    }

    /**
     * @return DayType[]
     */
    public static function getIrregulars()
    {
        $result = [];
        foreach (self::getAllTypes() as $type) {
            if (!$type->isRegular()) {
                $result[$type->getKey()] = $type;
            }
        }

        return $result;
    }

    /**
     * @param $key
     * @return DayType
     */
    public static function get($key)
    {
        self::validateKey($key);
        $all = self::getAllTypes();

        return $all[$key];
    }

    /**
     * @param string $key
     */
    private function __construct($key)
    {
        self::validateKey($key);
        $this->key = $key;
    }

    /**
     * @return string[]
     */
    private static function getTypeKeys()
    {
        return array_keys(self::$names);
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @return bool
     */
    public function isRestDay()
    {
        return $this->key == self::NON_WORKING_DAY
            || $this->key == self::RELOCATED_REST_DAY
            || $this->key == self::WEEKEND;
    }


    /**
     * @return bool
     */
    public function isRegular()
    {
        return $this->key == self::WORKING_DAY
            || $this->key == self::WEEKEND;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return self::$names[$this->key];
    }

    /**
     * @param string $key
     */
    private static function validateKey($key)
    {
        $keys = self::getTypeKeys();
        if (!in_array($key, $keys)) {
            throw new \InvalidArgumentException(sprintf('Valid day keys are: %s', implode(', ', $keys)));
        }
    }
}
