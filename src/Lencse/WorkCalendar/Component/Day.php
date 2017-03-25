<?php

namespace Lencse\WorkCalendar\Component ;


class Day
{

    /**
     * @var string
     */
    private $description;

    /**
     * @param string $description
     */
    public function __construct($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

}