<?php


namespace Test\Unit;

use App\ShoppingCart\Cart;
use PHPUnit\Framework\TestCase;

class CartTest extends TestCase
{
    private Cart $cart;

    protected function setUp(): void
    {
        $this->cart = new Cart();
    }

    public function testItCreateACart()
    {
        $item = createCartItem("Mouse", 30);

        $this->assertEquals(0, $this->cart->count());

        $this->cart->add($item);

        $this->assertEquals(1, $this->cart->count());
    }

    public function testItAddMultipleItems()
    {
        $items = [];
        $this->assertEquals(0, $this->cart->count());

        for ($i = 1; $i <= 5; $i++) array_push($items, createCartItem("Mouse", 20));

        $this->cart->addItems($items);
        $this->assertEquals(count($items), $this->cart->count());
    }

    public function testIsEmptyCart()
    {
        $this->assertTrue($this->cart->isEmpty());
    }

    public function testItRemoveCartItem()
    {
        $mouse = createCartItem("Mouse", 30);
        $keyboard = createCartItem("Keyboard", 20);

        $this->cart->add($mouse);
        $this->cart->add($keyboard);

        $this->assertEquals(2, $this->cart->count());

        $this->cart->remove($mouse->id);

        $this->assertEquals(1, $this->cart->count());
    }
}