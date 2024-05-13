<?php  include_once("./db/Database.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Dangky | MinhAn</title>
	
    
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">

	<link href='css/font-awesome.min.css' rel='stylesheet' type='text/css' media='all' />

    <link href='css/flexslider.css' rel='stylesheet' type='text/css' media='all' />
    <link href='css/style4c33.css?v=32' rel='stylesheet' type='text/css' media='all' />
    <link href='css/style-grow4c33.css?v=32' rel='stylesheet' type='text/css' media='all' />
    <link href='css/responsive4c33.css?v=32' rel='stylesheet' type='text/css' media='all' />

    <link href='css/css1.css?v=32' rel='stylesheet' type='text/css' media='all' />
	
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
	<link rel="shortcut icon" href="images/logo-dien-thoai-icon.png" type="image/png" />
<meta charset="utf-8" />
<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1' /><![endif]-->


<meta content='width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=0' name='viewport' />
<link rel="canonical" href="index.html" />


<script src="js/jquery.min.1.11.0.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src='js/option_selection.js' type='text/javascript'></script>
<script src='js/api.jquery.js' type='text/javascript'></script>

<script>
    var formatMoney = '{{amount}}₫';
</script>

<script src='js/scripts4c33.js?v=32' type='text/javascript'></script>

<script src="js/html5shiv.js"></script>
<script src="js/jquery-migrate-1.2.0.min.js"></script>
<script src='js/jquery.touchSwipe.min.js' type='text/javascript'></script>
<script data-target=".product-resize" data-parent=".products-resize" data-img-box=".image-resize" src="js/fixheightproductv2.js"></script>
<script src="js/haravan.plugin.1.0.js"></script>



<script src='js/jquery.flexslider.js' type='text/javascript'></script>
<script src='js/owl.carousel.js' type='text/javascript'></script>
<link href='css/owl.carousel.css' rel='stylesheet' type='text/css' media='all' />


<script src='js/jquery.fancybox.js' type='text/javascript'></script>
<link href='css/jquery.fancybox.css' rel='stylesheet' type='text/css' media='all' />
<script src='js/jquery.fancybox-media4c33.js?v=32' type='text/javascript'></script>




<script src='js/15-jquery.total-storage.min4c33.js?v=32' type='text/javascript'></script>
<script src='js/loadimage4c33.js?v=32' type='text/javascript'></script>
<script src='js/jquery-ui.min4c33.js?v=32' type='text/javascript'></script>
<script src='js/jquery.ui.touch-punch.min4c33.js?v=32' type='text/javascript'></script>

<script type="text/javascript" src="js/addthis_widget.js#pubid=ra-54aa0592190a1461" async="async"></script>
<!--------------CSS----------->
<link href='css/page-contact-form.css' rel='stylesheet' type='text/css' media='all' />








<meta property="og:type" content="website" />
<meta property="og:title" content="ThanhCanh" />
<meta property="og:image" content="http://theme.hstatic.net/1000098760/1000382909/14/share_fb_home.png?v=32" />
<meta property="og:image:secure_url" content="https://theme.hstatic.net/1000098760/1000382909/14/share_fb_home.png?v=32" />



<meta property="og:url" content="https://growmax.myharavan.com/" />
<meta property="og:site_name" content="GrowMax" />


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="css/bootstrap.3.3.1.css">
<link href='css/bootstrap-theme4c33.css?v=32' rel='stylesheet' type='text/css' media='all' />
<!-- Theme haravan-->

<!-- Latest compiled and minified JavaScript -->
<link href='css/font-awesome.min.css' rel='stylesheet' type='text/css' media='all' />

<link href='css/flexslider.css' rel='stylesheet' type='text/css' media='all' />
<link href='css/style4c33.css?v=32' rel='stylesheet' type='text/css' media='all' />
<link href='css/style-grow4c33.css?v=32' rel='stylesheet' type='text/css' media='all' />
<link href='css/responsive4c33.css?v=32' rel='stylesheet' type='text/css' media='all' />
<link href='css/css1.css?v=32' rel='stylesheet' type='text/css' media='all' />
</head><!--/head-->

<body>
<?php require_once __DIR__ . '/layout/header.php'; ?>

<section class="page-banner">
    <div class="auto-container text-center clearfix">
        <h1>Tạo tài khoản</h1>
    </div>
</section>
<div class="container">
    <div class="row">
        <div id="layout-account"  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="userbox">
                <div class="header-account clearfix">
                    <i class="fa fa-key"></i><h2>Tạo tài khoản</h2>
                </div>

                <form action="" id='create_customer' method='post'>

                    <div class="clearfix large_form">
                        <label for="username" class="icon-field">Tài khoản</label>
                        <input required type="text" value="" name="username" id="username" placeholder="Username" class="text" />
                    </div>


                    <div class="clearfix large_form">
                        <label for="password" class="icon-field">Mật khẩu</label>
                        <input required type="password" name="password" id="password" placeholder="Password" class="text" size="16" />
                    </div>

                    <div class="clearfix large_form">
                        <label for="phone" class="icon-field">Số điện thoại</label>
                        <input required type="text" name="phone" id="phone" placeholder="Phone" class="text" />
                    </div>
                    <div class="clearfix large_form">
                        <label for="address" class="icon-field">Địa chỉ</label>
                        <input required type="text" name="address" id="address" placeholder="Address" class="text" />
                    </div>

                    <div id="email" class="clearfix large_form">
                        <label for="email" class="label icon-field">Đia chỉ email</label>
                        <input required type="email" value="" placeholder="Email" name="email" class="text" size="30" />
                    </div>



                    <div class="action_bottom">
                        <input class="btn" type="submit" name="submit" value="Đăng ký" />
                    </div>
                    <div class="req_pass">
                        <a class="come-back" href="index.php">Quay về trang chủ</a>
                    </div>



            </div>

        </div><!-- #register -->

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
<?php
    // Kiểm tra xem người dùng đã nhấn nút "Đăng ký" chưa
    if (isset($_POST['submit'])) {
        // Lấy dữ liệu từ form và gán vào các biến
   
        $username = $_POST['username'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        if (!$username || !$password) {
            echo "<script>alert('Vui lòng nhập đầy đủ tên tài khoản và mật khẩu.');</script>";
        } else {

            
            $sql = "INSERT INTO users (username, password, mobile, email, address) VALUES ('$username', '$password', '$phone', '$email', '$address')";

            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Tạo tài khoản thành công.');</script>";
                echo "<script>window.location.href = 'dangnhap.php';</script>";
            } else {
                echo "Lỗi: " . $sql . "<br>" . $conn->error;
            }
        }
    
    }
?>