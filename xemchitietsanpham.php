<?php  include_once("./db/Database.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Chitietsanpham | MinhAn</title>
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

<section id="wrapper-product-detail">
    <div class="container">
        <div class="row">

                <div  id="wrapper-detail">
				<?php
    				if (isset($_GET['title'])) {
       
                                $title = $_GET['title'];
								$sql = "SELECT `products`.*, supplier FROM `products` INNER JOIN suppliers ON products.id_supplier = suppliers.id where title='$title'";
								$result = $conn->query($sql);
							
                                $kt="#";
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                    $kt="themvaogio.php";
                } 

								if ($result->num_rows > 0) {
									while ($row = $result->fetch_assoc()) {
										?>
                    <div class="row">					
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="product-title">
                                <h1><?php echo $row['title']; ?> - <?php echo $row['weight']; ?></h1>
                                <div class="product_vendor"><?php echo $row['supplier']; ?> </div>
                                <div class="product_sku">
                                    <span id="pro_sku"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div id="surround">
                                <div class="white-product">


                                    <a class="slide-prev slide-nav" href="javascript:">
                                        <i class="fa fa-arrow-circle-o-left fa-2"></i>
                                    </a>
                                    <a class="slide-next slide-nav" href="javascript:">
                                        <i class="fa fa-arrow-circle-o-right fa-2"></i>
                                    </a>

                                    <img class="product-image-feature" src="./images/<?php echo $row['avatar']; ?>" >
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="short_description">
                                <h4>
                                    Mô tả ngắn:
                                </h4>
                                <p>
                                    <?php echo $row['summary']; ?>	</p>
                            </div>
                            <div class="product-price" id="price-preview">
                                <span><?php echo number_format($row['price']); ?>đ</span>
                            </div>



                            <form id="add-item-form" action="<?php echo $kt; ?>" method="get" class="variants clearfix">
                                <div class="select clearfix" style="display:none">
                                    <select id="product-select" name="id" style="display:none">
                                        <option value="<?php echo $row['id']; ?>">Default Title - 16,000₫</option>

                                    </select>
                                </div>
                                <div class="pd40 clearfix">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-12 col-sm-6 col-xs-12">
                                            <div class="quantity-box clearfix">
                                                <div class="quantity-bgr">

                                                    <input type="number" id="Quantity" name="quantity" value="1" min="1" class="quantity-selector">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-md-12 col-sm-6 col-xs-12">
                                            <div class="box-add-cart">
											
                                                <button type="submit" id="add-to-cart" class=" btn-detail addtocart btn-color-add btn-min-width btn-mgt" name="add">
                                                    Thêm vào giỏ
                                                </button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:20px;">
                            <div role="tabpanel" class="product-comment">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" id="page-product" role="tablist">
                                    <li role="presentation" ><a  href="#mota" aria-controls="mota" role="tab" data-toggle="tab">Mô tả sản phẩm</a></li>

                                    

                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane" id="mota">
                                        <div class="container-fluid product-description-wrapper">

                                            <div>
                                                <?php echo $row['summary']." ".$row['content'];?>
                                            </div>

                                        </div>
                                    </div>

                                  

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
			<?php }}}?>
        </div>
    </div>
</section>                               
<?php require_once __DIR__ . '/layout/footer.php'; ?>
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>