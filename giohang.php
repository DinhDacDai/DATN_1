<?php  include_once("./db/Database.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Giohang | MinhAn</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <?php require_once __DIR__ . '/layout/main.php'; ?>
</head><!--/head-->

<body>
<?php require_once __DIR__ . '/layout/header.php'; ?>

<section id="cart_items">
		<div class="container">
			
			<div class="table-responsive cart_info">
            <form action="" method="post">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Sản phẩm</td>
							<td class="description"></td>
							<td class="price">Giá</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Tổng cộng</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
                    <?php
                    $total_cart = 0;
						
						                               
                                if (isset($_POST['delete_gio'])) {
                                   unset($_SESSION['cart']);
                               }

                                if(isset($_SESSION['cart']) && !empty($_SESSION['cart']))
                                {
                                    $cart = $_SESSION['cart'];
                                    
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

                                if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                                    $cart = $_SESSION['cart'];

                                    foreach($cart as $product_id => $quantity) {
                                        $product  = getProductDetails($conn, $product_id);
                                        if ($product) {
                                ?>
                                <tr>
                                    <td class="cart_product">
                                        <img src="./admin/assets/uploads/<?php echo $product["avatar"];?>" alt="" width="110" height="110">
                                    </td>
                                    <td class="cart_description">
                                        <h4><a href=""><?php echo $product["title"];?></a></h4>
                                    </td>
                                    <td class="cart_price">
                                        <p><?php echo $product["price"];?></p>
                                    </td>
                                    <td class="cart_quantity">
                                    <?php
                                             if (isset($_POST['submit'])) {
                                                $cart[$product_id]=$_POST[$product_id];
                                                
                                                $total_item = (int)$product['price'] * (int)$cart[$product_id];
                                                
                                                $_SESSION['cart'][$product_id]=    $cart[$product_id];       
                                                $total_cart+=  $total_item;               
                                            }
                                             
                                                else
                                                {
                                                    $total_item = (int)$product['price'] * (int)$cart[$product_id];
                                                    $total_cart+=  $total_item;  
                                                  
                                                }
                                            ?>
                                        <input type="number" min="0" id="Quantity" name="<?php echo $product_id; ?>" value="<?php echo  $cart[$product_id]; ?>">
                                    </td>
                                    <td class="cart_total">
                                        <p class="cart_total_price">
                                            <?php
                                                    echo number_format($total_item);
                                                
                                            ?>
                                        </p>
                                    </td>
                                    <td class="cart_delete" width="60px">
                                        <a class="cart_quantity_delete" href="xoakhoigio.php?id=<?php echo $product_id; ?>"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                                <?php 
                                
                                        }}
                                    }
                                } else {
                                    echo "<script>alert('Giỏ hàng trống!');</script>";
                                    echo "<script>window.location.href = 'sanpham.php';</script>";
                                }
                                ?>
                            <tr>
                            <td colspan="3" class="product-payment" style="padding-left: 10px;">
                                <input type="submit" name="submit" value="Cập nhật lại số lượng" class="btn btn-primary">
                                <a href="thanhtoan.php" class=".login-form form button, .signup-form form button btn btn-primary">Đến trang thanh toán</a>
                                <input type="submit" name="delete_gio" value="Xóa hết" class="btn btn-primary">
                              
                            </td>
                            <td colspan="5" style="text-align: right">
                                        Tổng giá trị đơn hàng:
                                        <span class="product-price">
                                                <?php
                                                echo number_format($total_cart);
                                                ?>
                                                </span>
                                                </td>
                        </tr>
                        
					</tbody>
				</table>
            </form>
			</div>
		</div>
	</section> <!--/#cart_items-->

<?php require_once __DIR__ . '/layout/footer.php'; ?>


  
<script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>