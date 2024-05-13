<?php 
 include_once("./db/Database.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Methods</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
        }

        .button-container {
            display: flex;
            flex-direction: column; /* Xếp các phần tử theo chiều dọc */
            align-items: center; /* Căn giữa các phần tử theo chiều ngang */
            margin-top: 20px;
        }

        .button {
            padding: 15px 30px;
            font-size: 18px;
            font-weight: bold;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin: 10px 0; /* Khoảng cách giữa các nút */
            text-decoration: none;
            color: white;
            display: inline-block;
        }

        .button1 {
            background-color: #4CAF50;
        }

        .button2 {
            background-color: #008CBA;
        }

        .button3 {
            background-color: #f44336; /* Màu đỏ */
        }
        /* Thêm hover effect */
        .button:hover {
            background-color: #45a049; /* Màu sắc mới khi hover */
        }

        /* Ẩn phần option mặc định */
        .option-container {
            display: block;
            margin-top: 20px;
        }
        /* CSS cho dropdown */
            #bank-options {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            width: 200px;
            background-color: #fff;
            color: #333;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            }

            #bank-options option {
            padding: 10px;
            background-color: #fff;
            color: #333;
            }

            /* CSS cho dropdown khi hover */
            #bank-options:hover {
            background-color: #f4f4f4;
            cursor: pointer;
            }
        /* Hiển thị phần option khi nút được bấm */
      
    </style>
</head>
<body>
    <div class="container">
        <h2>Choose Your Payment Method</h2>
        <div class="button-container">
            <a href="./php/atm/atm_momo.php" class="button button1">ATM Payment</a>
            <a href="./php/PayMoMo/init_payment.php" class="button button2">MoMo QR Code Payment</a>
            <form action="./vnpay_php/vnpay_create_payment.php" method="post">
            <button type="submit" class="button button3">VNPay QR Code Payment</button>
            <div class="option-container">
                <!-- Phần option chọn ngân hàng thanh toán -->
                <label for="bank_code">Ngân hàng</label>
                        <select name="bank_code" id="bank-options" class="form-control">
                            <option value="">Không chọn</option>
                            <option value="NCB"> Ngan hang NCB</option>
                            <option value="AGRIBANK"> Ngan hang Agribank</option>
                            <option value="SCB"> Ngan hang SCB</option>
                            <option value="SACOMBANK">Ngan hang SacomBank</option>
                            <option value="EXIMBANK"> Ngan hang EximBank</option>
                            <option value="MSBANK"> Ngan hang MSBANK</option>
                            <option value="NAMABANK"> Ngan hang NamABank</option>
                            <option value="VNMART"> Vi dien tu VnMart</option>
                            <option value="VIETINBANK">Ngan hang Vietinbank</option>
                            <option value="VIETCOMBANK"> Ngan hang VCB</option>
                            <option value="HDBANK">Ngan hang HDBank</option>
                            <option value="DONGABANK"> Ngan hang Dong A</option>
                            <option value="TPBANK"> Ngân hàng TPBank</option>
                            <option value="OJB"> Ngân hàng OceanBank</option>
                            <option value="BIDV"> Ngân hàng BIDV</option>
                            <option value="TECHCOMBANK"> Ngân hàng Techcombank</option>
                            <option value="VPBANK"> Ngan hang VPBank</option>
                            <option value="MBBANK"> Ngan hang MBBank</option>
                            <option value="ACB"> Ngan hang ACB</option>
                            <option value="OCB"> Ngan hang OCB</option>
                            <option value="IVB"> Ngan hang IVB</option>
                            <option value="VISA"> Thanh toan qua VISA/MASTER</option>
                    <!-- Thêm các ngân hàng khác cần chọn -->
                </select>
                <!-- Button xác nhận -->
            </div>
            </form>
        </div>
    </div>
</body>
</html>
<?php 
 

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
        $id_tk=$_SESSION['id_tk'];
        $fullname = $_POST['fullname'];
        $address = $_POST['address'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $note = $_POST['note']; 
        $total=$_SESSION['total'];
  if (empty($fullname) || empty($address) || empty($mobile)) {
        echo "<script>alert('Fullname, address, mobile không được để trống!');</script>";
        echo "<script>window.location.href = 'thanhtoan.php';</script>";
        exit();
    }
    else{
        if ($_POST['method']==1)      
        {
   
        

        $cart = $_SESSION['cart'];
        
        $sql = "INSERT INTO `orders`(`user_id`, `fullname`, `address`, `mobile`, `email`, `note`, `price_total`, `payment_status`) 
        VALUES ('$id_tk', '$fullname', '$address', '$mobile', '$email', '$note', ' $total', '0')";
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
    
        }else
        {
           
                $id_tk=$_SESSION['id_tk'];
                $_SESSION['fullname'] = $_POST['fullname'];
                $_SESSION['address'] = $_POST['address'];
                $_SESSION['mobile']  = $_POST['mobile'];
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['note'] = $_POST['note']; 
                 
    
           
           
        }

                        
}

?>