<?php
session_start();

if(isset($_GET['id']) && isset($_GET['quantity'])) {
    $product_id = $_GET['id'];
    $quantity = $_GET['quantity'];

    if(isset($_SESSION['cart'])) {
        $cart = $_SESSION['cart'];
        if(array_key_exists($product_id, $cart)) {
            $cart[$product_id] += $quantity;
        } else {
            $cart[$product_id] = $quantity;
        }
    } else {
        $cart = [$product_id => $quantity];
    }

    $_SESSION['cart'] = $cart;

    header("Location: giohang.php");
    exit;
} else 
{
    // Nếu không có ID sản phẩm được truyền, xử lý lỗi hoặc thông báo không hợp lệ
    echo "Lỗi: Không có ID sản phẩm được truyền.";
}