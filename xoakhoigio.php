<?php
session_start();

// Kiểm tra xem ID sản phẩm cần xóa có được truyền qua không
if(isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Kiểm tra xem giỏ hàng đã tồn tại chưa
    if(isset($_SESSION['cart'])) {
        // Nếu giỏ hàng đã tồn tại, loại bỏ sản phẩm khỏi giỏ hàng
        unset($_SESSION['cart'][$product_id]);

        header("Location: giohang.php");
        exit;
    } else {
        // Xử lý lỗi nếu giỏ hàng không tồn tại
        echo "Lỗi: Giỏ hàng không tồn tại.";
    }
} else {
    // Xử lý lỗi nếu không có ID sản phẩm được truyền qua
    echo "Lỗi: Không có ID sản phẩm được truyền.";
}
?>