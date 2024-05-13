<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <title>VNPAY RESPONSE</title>
        <!-- Bootstrap core CSS -->
        <link href="/vnpay_php/assets/bootstrap.min.css" rel="stylesheet"/>
        <!-- Custom styles for this template -->
        <link href="/vnpay_php/assets/jumbotron-narrow.css" rel="stylesheet">         
        <script src="/vnpay_php/assets/jquery-1.11.3.min.js"></script>
    </head>
    <body>
        <?php
        require_once("./config.php");
        $vnp_SecureHash = $_GET['vnp_SecureHash'];
        $inputData = array();
        foreach ($_GET as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }
        
        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }

        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
        ?>
        <!--Begin display -->
        <div class="container">
            <div class="header clearfix">
                <h3 class="text-muted">VNPAY RESPONSE</h3>
            </div>
            <div class="table-responsive">
                <div class="form-group">
                    <label >Mã đơn hàng:</label>

                    <label><?php echo $_GET['vnp_TxnRef'] ?></label>
                </div>    
                <div class="form-group">

                    <label >Số tiền:</label>
                    <label><?php echo $_GET['vnp_Amount'] ?></label>
                </div>  
                <div class="form-group">
                    <label >Nội dung thanh toán:</label>
                    <label><?php echo $_GET['vnp_OrderInfo'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Mã phản hồi (vnp_ResponseCode):</label>
                    <label><?php echo $_GET['vnp_ResponseCode'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Mã GD Tại VNPAY:</label>
                    <label><?php echo $_GET['vnp_TransactionNo'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Mã Ngân hàng:</label>
                    <label><?php echo $_GET['vnp_BankCode'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Thời gian thanh toán:</label>
                    <label><?php echo $_GET['vnp_PayDate'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Kết quả:</label>
                    <label>
                        <?php
                        if ($secureHash == $vnp_SecureHash) {
                            if ($_GET['vnp_ResponseCode'] == '00') {
                                echo "<span style='color:blue'>GD Thanh cong</span>";
                                include_once("../db/Database.php"); 

                                  function getProductDetails($conn, $product_id) {
                                    // Truy vấn cơ sở dữ liệu để lấy thông tin chi tiết về sản phẩm
                                    $sql = "SELECT * FROM products WHERE id = $product_id";
                                    $result = $conn->query($sql);
                                    
                                    // Kiểm tra và trả về thông tin chi tiết sản phẩm
                                    if ($result && $result->num_rows > 0) {
                                        return $result->fetch_assoc();
                                    } else {
                                        return false;
                                    }
                                 } 
                                 if(isset($_SESSION['cart']) && !empty($_SESSION['cart']))
                                 {
                                        $id_tk=$_SESSION['id_tk'];
                                        $fullname = $_SESSION['fullname'];
                                        $address = $_SESSION['address'];
                                        $mobile = $_SESSION['mobile'];
                                        $email = $_SESSION['email'];
                                        $note = $_SESSION['note']; 
                                        $total=$_SESSION['total'];
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
                                        
                                     
                                
                                    } else {
                                        echo "Lỗi: " . $sql . "<br>" . $conn->error;
                                    }}
                            } else {
                                echo "<span style='color:red'>GD Khong thanh cong</span>";
                            }
                        } else {
                            echo "<span style='color:red'>Chu ky khong hop le</span>";
                        }
                        ?>

                    </label>
                </div> 
                <a href="../index.php">Về trang chủ</a>
            </div>
            <p>
                &nbsp;
            </p>
            <footer class="footer">
                   <p>&copy; VNPAY <?php echo date('Y')?></p>
            </footer>
        </div>  
    </body>
</html>
