<?php

namespace Lencse\WorkCalendar\Day;

trait DayTrait
{

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var DayType
     */
    private $type;

    /**
     * @var string
     */
    private $description;

    /**
     * @param \DateTime $date
     * @param DayType $type
     * @param $description
     */
    public function __construct(\DateTime $date, DayType $type, $description = '')
    {
        $this->date = $date;
        $this->type = $type;
        $this->description = $description;
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return clone $this->date;
    }

    /**
     * @return DayType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}
