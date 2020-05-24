<?php


use App\ShoppingCart\CartItem;

function createCartItem($name, $amount): CartItem
{
    return new CartItem($name, $amount);
}
