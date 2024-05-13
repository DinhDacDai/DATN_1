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

<div class="clear"></div>
<img src="./images/1654850675-banner-6.jpg" alt="">
<div class="clear"></div>				
	
<div class="wapper">

		<div class="wap1">
			<div class="container">
				<div class="row">

					<?php
					$sql = "SELECT * FROM slides";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
						while ($row = $result->fetch_assoc()) {
					?>
					<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 page-item wow fadeInUp item_1"
						style="visibility: visible; animation-name: fadeInUp;">
						<div class="banner_home">
							<div class="banner-img-home">
								<a href="#">
                                
                                <div class="img_banner_home" style="background-image: url(./admin/assets/uploads//<?php echo $row["store_img"]; ?>)"> </div>
								</a>
							</div>
							<div class="content_banner_home">
								<div class="title_banner_home text-center">
									<a href="#">
										<h2>
											<span><?php echo $row['title_component'] ?></span>
										</h2>
									</a>
								</div>
								<div class="detail_banner_home text-center">
									<p> <?php echo $row['title_detail'] ?></p>
								</div>
							</div>
						</div>
					</div>

					<?php }} ?>

				</div>
			</div>
		</div>
</div>
				

	
	</section>
<div class="col-sm-12 padding-right">
		<div class="wap-list-product">
        <div class="container">
            <div class="top-line"></div>
            <div class="heading-title">
                <h3>
                    Sản phẩm nổi bật
                </h3>
                <p class="text-center">
                    Sản phẩm công nghệ chính hãng
                </p>
            </div>
            <div class="row content-product-list products-resize">
                <!--                START ITEM-->
                
                <?php
               
		
                $kt=false;
                
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                        $kt=true;
                } 
                
            
                 $sql = "SELECT `products`.*, supplier FROM `products` INNER JOIN suppliers ON products.id_supplier = suppliers.id LIMIT 8"; 
				   $result = $conn->query($sql);

				   if ($result->num_rows > 0) {
					   while ($row = $result->fetch_assoc()) {
                        $link_gio="themvaogio.php?id=".$row['id'];
				   ?>


                <div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp animation rainbow_0"
                    style="visibility: visible; animation-name: fadeInUp;">
                    <div class="product-item product-resize">
                        <div class="product-img image-resize">
                            <a href="./xemchitietsanpham.php?id=<?php echo $row['id']; ?>" title="<?php echo $row['title']; ?>">
                                <img alt=" <?php echo $row['title']; ?> "
                                    src="./admin/assets/uploads//<?php echo $row['avatar']; ?>" height="200px" width="200px" />
                            </a>
                            <a href="./xemchitietsanpham.php?title=<?php echo $row['title']; ?>" class="mask-brg"></a>
                            <div class="hover-mask">
                                <div class="inner-mask">
                                    <a class="add-view-cart btn-cart add-cart " data-variant="1007783439"
                                        href="<?php if($kt) echo $link_gio; ?>&quantity=1" title="Thêm vào giỏ">
                                        <i class="fa fa-bars"></i>
                                        Thêm vào giỏ
                                    </a>
                                    <ul class="add-to-links">
                                        
                                        <li><a href="./xemchitietsanpham.php?title=<?php echo $row['title']; ?>" class="" title="Xem chi tiết"><i
                                                    class="fa fa-search"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="product-detail">
                            <h3 class="pro-name"><a href="./xemchitietsanpham.php?id=<?php echo $row['id']; ?>"
                                    title="<?php echo $row['title']; ?>"><?php echo $row['title']; ?><?php ?> </a>
                            </h3>
                            <p class="pro-vendor">
                                Nhà cung cấp: <span><?php echo $row['supplier']; ?></span>
                            </p>
                            <div class="box-price">
                                <p class="pro-price"><?php echo number_format($row['price']); ?></p>
                            </div>
                            <p class="pro-price-del">

                            </p>
                        </div>
                    </div>
                </div>
				<?php }}?>
				</div>
            </div>
        </div>
</div>
	 <div class="wap2">

        <div class="heading-title">
            <h3>HÌNH ẢNH CÁC SẢN PHẨM CÔNG NGHỆ</h3>
        </div>
        <div class="gallery-image">
            <ul class="list-gallery  ">



               <?php
                   $sql = "SELECT * FROM slides LIMIT 8"; 
				   $result = $conn->query($sql);

				   if ($result->num_rows > 0) {
					   while ($row = $result->fetch_assoc()) {
				   ?>

                <li class="col-lg-3 col-md-3 col-sm-6 col-xs-6 img_1 wow slideInLeft">
                    <a class="fancybox" rel="group"
                        href="./admin/assets/uploads/<?php echo $row['store_img'] ?>">
                        <div class="bkg-fancybox"
                            style="background-image:url(./admin/assets/uploads/<?php echo $row['store_img'] ?>);background-size:cover;cursor: pointer;">
                        </div>
                    </a>
                </li>
                <?php }} ?>




            </ul>
        </div>
        <script type="text/javascript">
        $(document).ready(function() {
            $(".fancybox").fancybox();
        });
        </script>

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