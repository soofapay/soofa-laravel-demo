<?php
namespace App;

class Cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if($oldCart){
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($item, $name)
    {
        $storedItem = ['quantity' => 0, 'price' => $item->price, 'product' => $item];

        if($this->items){
            if(array_key_exists($name, $this->items)){
                $storedItem = $this->items[$name];
            }
        }
        $storedItem['quantity']++;
        $storedItem['price'] = $item->price * $storedItem['quantity'];
        $this->items[$name] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item->price;
    }
}
