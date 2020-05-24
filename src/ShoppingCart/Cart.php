<?php


namespace App\ShoppingCart;

class Cart
{
    public $id;
    private array $cart;

    public function __construct()
    {
        $this->id = uniqid();
        $this->cart = array();
    }

    public function add(CartItem $item): void
    {
        array_push($this->cart, $item);
    }

    public function addItems(array $items): void
    {
        $this->cart = array_merge($this->cart, $items);
    }

    public function getFirstItem(): CartItem
    {
        return reset($this->cart);
    }

    public function count(): int
    {
        return count($this->cart);
    }

    public function isEmpty(): bool
    {
        return empty($this->cart);
    }

    public function remove(string $id): void
    {
        $this->cart = array_filter($this->cart, fn($cart) => $cart->id !== $id);
    }
}