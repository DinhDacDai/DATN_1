<?php  include_once("./db/Database.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Hoadon | MinhAn</title>
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
    <div class="container">
    <div class="row">
        <div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="layout-account">
        <h1 class="text-center" >Hóa đơn đặt hàng</h1>
  
<table class="table table-bordered">
    <tr class=" text-center">

        <th>Customer_fullname</th>
        <th>Address</th>
        <th>Mobile</th>
        <th>Email</th>
        <th>Price_total</th>
        <th>Payment_Status</th>
     
       
    </tr>
    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
        $id_tk=$_SESSION["id_tk"];
        $sql="SELECT `fullname`, `address`, `mobile`, `email`, `note`, `price_total`, `payment_status` FROM `orders` WHERE `user_id`=$id_tk";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {?>
            <tr class="text-center">
                <td ><?php echo $row['fullname'] ?></td>
                <td><?php echo $row['address'] ?></td>
                <td><?php echo $row['mobile'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['price_total'] ?></td>
                <td><?php if($row['payment_status']) echo '<p style="color: green;">Đã thanh toán</p>'; else echo '<p style="color: red;">Chưa thanh toán</p>';  ?></td>
            </tr>
        <?php
            }
        }
    } else
    echo "<script>alert('Chức năng này yêu cầu đăng nhập!');</script>";
    ?>
</table>
</div>
</div>
</div>
<?php require_once __DIR__ . '/layout/footer.php'; ?>


  
<script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>