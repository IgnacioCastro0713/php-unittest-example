<?php


namespace Test\Unit;


use App\Connection;
use App\ShoppingCart\Cart;
use PHPUnit\Framework\TestCase;

class CartWithConnectionTest extends TestCase
{
    private Connection $conn;
    private Cart $cart;

    protected function setUp(): void
    {
        $this->cart = new Cart();
        $this->conn = new Connection();
        $this->conn->createSchema();
    }

    protected function tearDown(): void
    {
        $this->conn->dropTable();
    }

    public function testItStoresAnCart()
    {
        $this->conn->insert($this->cart);
        $cart = $this->conn->get($this->cart->id);
        $this->assertEquals($cart->id, $this->cart->id);
    }

}