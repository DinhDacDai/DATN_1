<?php ob_start();?>
<body>
	
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i>1800.6321</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> mac@minhancomputer.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.php"><img src="./images/logo.png" alt="" /></a>
						</div>
					
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<?php 
		
									$kt=false;
									if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
											$kt=true;
									} 
								?>
							
								<li><a href="<?php if($kt)   echo "taikhoan.php";?>"><i class="fa fa-user"></i><b>Tài khoản</b></a></li>
								<li><a href="<?php if($kt)   echo "thanhtoan.php";?>"><i class="fa fa-crosshairs"></i><b> Thanh toán</b></a></li>
								<li><a href="<?php  if($kt)  echo "giohang.php";?>"><i class="fa fa-shopping-cart"></i><b> Giỏ</b></a></li>
								<?php 
									if(!$kt)
									{	
										unset($_SESSION['user_id']);
										echo '<li><a href="./dangnhap.php"><i class="fa fa-unlock"></i><b> Đăng nhập</b></a></li>';
										echo '<li><a href="./dangky.php"><i class="fa fa-lock"></i><b> Đăng ký</b></a></li>';
										unset($_SESSION['loggedin']);
									}  
									else
									{
										
										echo '<li><a href="./dangxuat.php"><i class="fa fa-lock"></i><b> Đăng xuất</b></a></li>';
										
									}
									
								?>
								
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php" class="active"><b>Trang chủ</b></a></li>
								<li class="dropdown"><a href="sanpham.php"><b>Sản phẩm</b></a>
                                <li class="dropdown"><a href="#"><b>Danh mục</b></i></a>
									<ul role="menu" class="sub-menu text-left">
											<?php
													$sql = "SELECT * FROM categories";
													$result = $conn->query($sql);
													$firstItem = true; // Khởi tạo biến $firstItem trước vòng lặp
					
													if ($result->num_rows > 0) {
														while ($row = $result->fetch_assoc()) {
															?>
															<li ><a href="sanpham.php?id=<?php echo $row["id"]; ?>"><b><?php echo $row["name"]; ?> </b></a></li>
					
															<?php }}?>
																
									</ul>
								</li> 
                                <li class="dropdown"><a href="tintuc.php"><b>Tin tức</b></a>
                                
                                </li> 
								<li class="dropdown"><a href="Hoadon.php"><b>Hóa đơn</b></a>
                                
                                </li> 
								<li><a href="lienhe.php"><b>Liên hệ</b></a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
					<div class="search pull-right" style="border: 1px solid #000000; border-radius: 10px;">
						<form action="./sanpham.php" method="post">
							<input type="text" style="border: 0; border-radius: 10px 0 0 10px; margin-right: 5px;" placeholder="Search..." name="keyword"/>
							<button type="submit" name="search" style="border: 0; background: none; border-radius: 0 10px 10px 0;" ><img height="15px" width="15px" src="./images/icon_search.png" alt=""></button>
						</form>
					</div>
				</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
    <script src="js/jquery.js"></script>
	
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>