<?php  include_once("./db/Database.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | MinhAn</title>
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
<?php
      if(isset($_SESSION['cart']) && !empty($_SESSION['cart']))
      {
        
        ?>
        
<div class="container">
    <h2>Thanh toán</h2>
    <form action="xuly_thanhtoan.php" method="POST">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <h3 class="center-align">Thông tin khách hàng</h3>
                <div class="form-group">
                    <label>Họ tên khách hàng</label>
                    <input type="text" name="fullname" value="" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label>Địa chỉ</label>
                    <input type="text" name="address" value="" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label>SĐT</label>
                    <input type="number" min="0" name="mobile" value="" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" min="0" name="email" value="" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label>Ghi chú thêm</label>
                    <textarea name="note" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label>Chọn phương thức thanh toán</label> <br />
                    <input type="radio" name="method" value="0" /> Thanh toán trực tuyến <br />
                    <input type="radio" name="method" checked value="1" /> COD (dựa vào địa chỉ của bạn) <br />
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <h3 class="center-align">Thông tin đơn hàng của bạn</h3>
                <?php
                //biến lưu tổng giá trị đơn hàng
                $total = 0;
                
                ?>
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th width="40%" style="padding-left: 10px;">Tên sản phẩm</th>
                                <th width="12%">Số lượng</th>
                                <th>Giá</th>
                                <th>Thành tiền</th>
                            </tr>

                            <?php
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
                            foreach($cart as $product_id => $quantity) {
                                        $product  = getProductDetails($conn, $product_id);
                                        if ($product) {
                                           
                            ?>
                                <tr>
                                    <td style="padding-left: 10px;">
                                        <?php if (!empty($product['avatar'])) : ?>
                                            <img class="product-avatar img-responsive" src="./admin/assets/uploads/<?php echo $product['avatar']; ?>" width="60" />
                                        <?php endif; ?>
                                        <div class="content-product">
                                            <a href="<?php echo $product_link; ?>" class="content-product-a">
                                                <?php echo $product['title']; ?>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="product-amount">
                                            <?php echo $quantity; ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="product-price-payment">
                                            <?php echo number_format($product['price'], 0, '.', '.') ?> đ
                                        </span>
                                    </td>
                                    <td>
                                        <span class="product-price-payment">
                                            <?php
                                            $price_total = $product['price'] * $quantity;
                                            $total += $price_total;
                                            ?>
                                            <?php echo number_format($price_total, 0, '.', '.') ?> đ
                                        </span>
                                    </td>
                                </tr>
                            <?php }}?>
                            <tr>
                                <td colspan="5" class="product-total" style="padding-left: 10px;">
                                    Tổng giá trị đơn hàng:
                                    <span class="product-price">
                                        <?php 
                                            $_SESSION['total']=$total;
                                        echo number_format($total, 0, '.', '.') ?> đ
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                

            </div>
        </div>
      
        <input type="submit" name="submit" value="Thanh toán" class="btn btn-primary">
        <a href="giohang.php" class="btn btn-secondary">Về trang giỏ hàng</a>
    </form>
</div>
    <?php 
      }
      else{
        echo "<script>alert('Chưa có sản phẩm nào cần thanh toán!');</script>";
        echo "<script>window.location.href = 'sanpham.php';</script>";
      }

?>

<?php require_once __DIR__ . '/layout/footer.php'; ?>
  
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.scrollUp.min.js"></script>
  <script src="js/price-range.js"></script>
  <script src="js/jquery.prettyPhoto.js"></script>
  <script src="js/main.js"></script>
</body>
</html>