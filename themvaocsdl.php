$cart = $_SESSION['cart'];
        
        $sql = "INSERT INTO `orders`(`user_id`, `fullname`, `address`, `mobile`, `email`, `note`, `price_total`, `payment_status`) 
        VALUES ('$id_tk', '$fullname', '$address', '$mobile', '$email', '$note', ' $total', '1')";
            if ($conn->query($sql) === TRUE) {
                // Lấy order_id sau khi thêm đơn hàng thành công
                $order_id = $conn->insert_id;
                $_SESSION['order_id']=$order_id;
                // Tiếp tục thêm chi tiết đơn hàng vào bảng order_details
                foreach ($cart as $product_id => $quantity) {
                    $product = getProductDetails($conn, $product_id);
                    if ($product) {
                        // Thêm dữ liệu vào bảng order_details với order_id mới tạo
                        $sql = "INSERT INTO `order_details` (`order_id`, `product_id`, `quantity`, `created_at`, `updated_at`) 
                                VALUES ('$order_id', '$product_id', '$quantity', current_timestamp(), current_timestamp())";
                        if ($conn->query($sql) === TRUE) {
                            echo "<script>alert('Thanh toán thành công!');</script>";
                            unset($_SESSION['cart']);

                        } else {
                            echo "Lỗi: " . $sql . "<br>" . $conn->error;
                        }
                    }
                }
                
                // Chuyển hướng người dùng sau khi thêm đơn hàng và chi tiết đơn hàng thành công
                
                echo "<script>window.location.href = 'index.php';</script>";
                
                exit();
            } else {
                echo "Lỗi: " . $sql . "<br>" . $conn->error;
            }