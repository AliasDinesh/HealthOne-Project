<?php

class OpeningTime
{
    public $id;
    public $day;
    public $time;

    public function __construct()
    {
        settype($this->id, 'integer');
    }
}