<?php


namespace classes;


class Cart
{
    public function __construct()
    {

    }

    public static function addToCart($product_id , $user_id, $quantity)
    {
        return $sql = "INSERT INTO cart (product_id , user_id ,quantity) VALUES (".$product_id." , ".$user_id.", ".$quantity.")";
    }

    public static function showCart()
    {
        return $sql = "SELECT c.id , product.id as product_id , product.name, product.price , c.quantity FROM product
    RIGHT JOIN cart c on product.id = c.product_id
    RIGHT JOIN users u on u.id = c.user_id WHERE session='".session_id()."'";
    }

    public static function issetInCart($productId , $userId)
    {
        return $sql = "SELECT id , quantity FROM cart WHERE product_id=".$productId." AND user_id=".$userId."";
    }

    public static function updateCart($cartId ,  $quantity)
    {
        return $sql = "UPDATE cart SET quantity=".$quantity." WHERE id=".$cartId."";
    }

}