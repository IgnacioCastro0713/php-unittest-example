<?php


namespace App\ShoppingCart;


class CartItem
{
    public $id;
    private string $name;
    private int $amount;

    public function __construct($name, $amount)
    {
        $this->id = uniqid();
        $this->name = $name;
        $this->amount = $amount;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getAmount()
    {
        return $this->amount;
    }

}