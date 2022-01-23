<?php

class Review
{
    public $id;
    public $name;
    public $date;
    public $description;
    public $stars;
    public $product_id;

    public function __construct() {
        settype($this->id, 'integer');
        settype($this->product_id, 'integer');
    }
}