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



// Kiểm tra xem người dùng đã đăng nhập chưa
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        header("location: dangnhap.php");
    exit;
}


// Xử lý khi người dùng gửi biểu mẫu cập nhật
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xác thực và lấy ID tài khoản
    $id = $_SESSION['id_tk'];

    // Lấy dữ liệu từ biểu mẫu POST
    $password = $_POST['password'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];

    // Cập nhật thông tin tài khoản trong CSDL
    $sql = "UPDATE users SET password='$password', address='$address', email='$email', mobile='$mobile' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Thông tin tài khoản đã được cập nhật thành công!');</script>";
        
    } else {
        echo "<script>alert('Lỗi:  . $conn->error');</script>";
      
    }
}

// Lấy thông tin tài khoản hiện tại từ CSDL
$id = $_SESSION['id_tk'];
$sql = "SELECT * FROM users WHERE id=$id";
$result = $conn->query($sql);

// Hiển thị biểu mẫu cập nhật thông tin
?>
<div class="container">
    <div class="row">
        <div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="layout-account">
        <h1 class="text-center">Cập nhật thông tin tài khoản</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

    <div class="form-group">
        <?php
        if ($result->num_rows == 1) {
            while ($row = $result->fetch_assoc()) {
                echo "<h3>Tên tài khoản : " . $row["username"] . "<br></h3>";
                ?>
               
                Mật khẩu: <input type="password"  class="form-control" name="password" value=" <?php echo isset($_POST['password']) ? $_POST['password'] : $row["password"] ?>"><br>
                Địa chỉ: <input type="text"  class="form-control" name="address" value=" <?php echo isset($_POST['address']) ? $_POST['address'] : $row["address"] ?>"><br>
                Email: <input type="email"  class="form-control" name="email" value=" <?php echo isset($_POST['email']) ? $_POST['email'] : $row["email"] ?>"><br>
                Số điện thoại: <input type="tel"  class="form-control" name="mobile" value=" <?php echo isset($_POST['mobile']) ? $_POST['mobile'] : $row["mobile"] ?>"><br>
        <?php
            }
        }
        ?>
        
        </div>
        <div class="form-group text-center">
                <button type="submit" class="btn btn-primary"><p  style="font-size: 20px;">Cập nhật</p></button>
                </div>
            </form>
        </div>
        </div>    
</div>
	
<?php require_once __DIR__ . '/layout/footer.php'; ?>
  
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.scrollUp.min.js"></script>
  <script src="js/price-range.js"></script>
  <script src="js/jquery.prettyPhoto.js"></script>
  <script src="js/main.js"></script>
</body>
</html>