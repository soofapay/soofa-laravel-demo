<?php
namespace App;

class Product
{
    public $price = 0;
    public $product = '';

    public function __construct($name, $pr)
    {
        $this->product = $name;
        $this->price = $pr;
    }

}
