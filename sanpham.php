<?php  include_once("./db/Database.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sanpham | MinhAn</title>
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
<section>
<?php 
									
							
									$kt=false;
									if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
											$kt=true;
											
									} 
?>


<!-- ---------------------------------------------------------------------------------- -->
<div id="wrapper-collection">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 pull-right">

                <!-- Begin collection info -->
                <!-- Content-->
                <div class="row main-content">

                    <div class="col-md-12">
                        <div class="toolbar-inner clearfix">
                            <div class="tool-sortby pull-left">
                                <h2>Danh Sách Sản Phẩm</h2>
                            </div>

                        </div>

                    </div>

                    <div class="col-md-12 product-list">
                        <div class="content-product-list products-resize">
                            <div class="product-list-view row  grid  products-grid">
									  
						
						<?php
						// Khởi tạo biến để kiểm tra xem đã có điều kiện lọc nào được thêm vào câu truy vấn chưa
						$hasFilter = false;
						
						// Kiểm tra xem có dữ liệu từ form được gửi đi không
						if (isset($_POST['filter'])) {
							// Khởi tạo biến chuỗi để chứa điều kiện SQL
							$str_where = '';
						
							// Xử lý lọc sản phẩm dựa trên danh mục
							if (isset($_POST['category'])) {
								// Chuyển mảng các giá trị từ checkbox thành một chuỗi, các giá trị cách nhau bằng dấu phẩy
								$str_implode_category = implode(',', $_POST['category']);
							
								// Thêm điều kiện lọc theo danh mục vào chuỗi điều kiện SQL
								$str_where .= " category_id IN ($str_implode_category)";
							
								// Đánh dấu rằng đã thêm điều kiện lọc vào
								$hasFilter = true;
							}
							
							// Kiểm tra xem có dữ liệu từ ô checkbox nhà cung cấp được gửi đi không
							if (isset($_POST['suppliers'])) {
								// Chuyển mảng các giá trị từ checkbox thành một chuỗi, các giá trị cách nhau bằng dấu phẩy
								$str_implode_suppliers = implode(',', $_POST['suppliers']);
							
								// Thêm điều kiện lọc theo nhà cung cấp vào chuỗi điều kiện SQL
								// Sử dụng OR vì có thể có nhiều nhà cung cấp được chọn
								$str_where .= ($hasFilter ? " OR" : "") . " id_supplier IN ($str_implode_suppliers)";
							
								// Đánh dấu rằng đã thêm điều kiện lọc vào
								$hasFilter = true;
							}
							// Xử lý lọc sản phẩm dựa trên mức giá
							if (isset($_POST['price'])) {
								$str_price = '';
								foreach ($_POST['price'] as $price) {
									switch ($price) {
										case 1:
											$str_price .= " OR price < 500000";
											break;
										case 2:
											$str_price .= " OR (price >= 500000 AND price <= 1000000)";
											break;
										case 3:
											$str_price .= " OR (price >= 1000000 AND price <= 5000000)";
											break;
										case 4:
											$str_price .= " OR (price >= 5000000 AND price <= 10000000)";
											break;
										case 5:
											$str_price .= " OR price > 10000000";
											break;
									}
								}
								// Cắt bỏ từ "OR" ở đầu chuỗi
								$str_price = ltrim($str_price, " OR");
						
								// Thêm điều kiện lọc giá vào chuỗi điều kiện SQL
								$str_where .= ($hasFilter ? " AND" : "") . " ($str_price)";
								$hasFilter = true;
							}
						}
						$sql = "SELECT `products`.*, supplier FROM `products` INNER JOIN suppliers ON products.id_supplier = suppliers.id";
						// Nếu không có điều kiện lọc nào được thêm vào, truy vấn lấy tất cả sản phẩm từ bảng "products"
						if(isset($_POST["keyword"])) {
							$keyword = $_POST["keyword"];
							$sql = "SELECT `products`.*, supplier FROM `products` INNER JOIN suppliers ON products.id_supplier = suppliers.id WHERE title LIKE '%$keyword%' or price LIKE '%$keyword%' or supplier LIKE '%$keyword%'";
						} else {
							if(isset($_GET['id']) && !$hasFilter) {
								$id = $_GET['id'];   
								$sql = "SELECT `products`.*, supplier FROM `products` INNER JOIN suppliers ON products.id_supplier = suppliers.id WHERE category_id = $id";
							}
						}
						
						

						if ($hasFilter) {
							$sql .= " WHERE $str_where";
						}
						
						$result = $conn->query($sql);
						$kt=false;
                
						if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
								$kt=true;
						} 
						
						if ($result->num_rows > 0) {
							while ($row = $result->fetch_assoc()) {
								$link_gio="themvaogio.php?id=".$row['id'];
								// Hiển thị thông tin sản phẩm
							?>

								<div class="col-md-4 col-sm-6 col-xs-12 wow fadeInUp animation rainbow_0"
									style="visibility: visible; animation-name: fadeInUp;">
									<div class="product-item product-resize">
										<div class="product-img image-resize">
											<a href="./xemchitietsanpham.php?title=<?php echo $row['title']; ?>" title="<?php echo $row['title']; ?>">
												<img alt=" <?php echo $row['title']; ?> "
													src="./admin/assets/uploads/<?php echo $row['avatar']; ?>" height="200px" width="200px" />
											</a>
											<a href="./xemchitietsanpham.php?title=<?php echo $row['title']; ?>" class="mask-brg"></a>
											<div class="hover-mask">
												<div class="inner-mask">
												
											
												
													<a class="add-view-cart btn-cart add-cart " data-variant="1007783439"
														href="<?php echo $link_gio; ?>&quantity=1" title="Thêm vào giỏ">
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
            </div>
        
			<form action="" method="post" >
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 pull-left">
                <!-- Sidebar menu-->

                <div class="news-menu list-group" id="list-group-l">

                    <div class="menu-left-title">
                        <strong>Nhóm danh mục</strong>
                    </div>

                    <ul class="nav navs sidebar menu" id='cssmenu'>
                        <!--                        Danh muc san pham de loc-->

                        <?php 
						$sql = "SELECT * FROM categories"; 
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
							while ($row = $result->fetch_assoc()) {
                            // xử lý đổ lại dữ liệu ra phần lọc theo category để user biết đã tích vào
                            // checkbox nào sau khi filter dựa vào thuộc tính checked của checkbox/radio
                            // với thẻ select opption -> selected
                            $checked = '';
                            // nếu user đã submit form kiểm tra nếu id của category hiện tại nằm trong mảng
                            //$_POST[category] thì chắc chắn category hiện tại đang đc checked
                            if (isset($_POST['category'])) {
                                if (in_array($row['id'], $_POST['category'])) {
                                    $checked = 'checked';
                                }
                            }
                        ?>

                            <li class="item  first">
                                <a>
                                    <input type="checkbox" name="category[]" <?php echo $checked; ?> value="<?php echo $row['id']; ?>" />

                                    <span><?php echo $row['name']; ?></span>
                                </a>

                            </li>
                        <?php }} ?>
                    </ul>
                </div>
				<div class="news-menu list-group" id="list-group-l">

			<div class="menu-left-title">
				<strong>Nhà cung cấp</strong>
			</div>

			<ul class="nav navs sidebar menu" id='cssmenu'>
				<!--                        Danh muc san pham de loc-->

				<?php 
				$sql = "SELECT * FROM suppliers"; 
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {
					// xử lý đổ lại dữ liệu ra phần lọc theo category để user biết đã tích vào
					// checkbox nào sau khi filter dựa vào thuộc tính checked của checkbox/radio
					// với thẻ select opption -> selected
					$checked = '';
					// nếu user đã submit form kiểm tra nếu id của category hiện tại nằm trong mảng
					//$_POST[category] thì chắc chắn category hiện tại đang đc checked
					if (isset($_POST['suppliers'])) {
						if (in_array($row['id'], $_POST['suppliers'])) {
							$checked = 'checked';
						}
					}
				?>

					<li class="item  first">
						<a>
							<input type="checkbox" name="suppliers[]" <?php echo $checked; ?> value="<?php echo $row['id']; ?>" />

							<span><?php echo $row['supplier']; ?></span>
						</a>

					</li>
				<?php }} ?>
			</ul>
			</div>

                <div class="sidebar_price list-group">
                    <div class="menu-left-title">
                        <strong>Lọc theo giá</strong>
                    </div>

                    <?php
                    $checked_price1 = '';
                    $checked_price2 = '';
                    $checked_price3 = '';
                    $checked_price4 = '';
                    $checked_price5 = '';
                    //nếu user submit form Filter thì xử lý đổ lại dữ liệu
                    if (isset($_POST['price'])) {
                        if (in_array(1, $_POST['price'])) {
                            $checked_price1 = 'checked';
                        }
                        if (in_array(2, $_POST['price'])) {
                            $checked_price2 = 'checked';
                        }
                        if (in_array(3, $_POST['price'])) {
                            $checked_price3 = 'checked';
                        }
                        if (in_array(4, $_POST['price'])) {
                            $checked_price4 = 'checked';
                        }
                        if (in_array(5, $_POST['price'])) {
                            $checked_price5 = 'checked';
                        }
                    }
                    ?>
                    <ul class="nav navs sidebar menu" id='cssmenu'>

                        <li class="item  first">
                            <a>
                                <input type="checkbox" name="price[]" value="1" <?php echo $checked_price1; ?>> Dưới 500,000
                            </a>
                        </li>
                        <li class="item">
                            <a>
                                <input type="checkbox" name="price[]" value="2" <?php echo $checked_price2; ?>> 500,000 - 1,000,000
                            </a>
                        </li>
                        <li class="item">
                            <a>
                                <input type="checkbox" name="price[]" value="3" <?php echo $checked_price3; ?>> 1,000,000 - 5,000,000
                            </a>
                        </li>
                        <li class="item ">
                            <a>
                                <input type="checkbox" name="price[]" value="4" <?php echo $checked_price4; ?>> 5,000,000 - 10,000,000
                            </a>
                        </li>
                        <li class="item  last">
                            <a>
                                <input type="checkbox" name="price[]" value="5" <?php echo $checked_price5; ?>> Trên 10,000,000
                            </a>
                        </li>
                    </ul>

                </div>
                <div class="form-group">
                    <input type="submit" name="filter" value="   Lọc   " class="btn btn-primary">
                    <a href="./sanpham.php" class="btn btn-primary" name="del">   Xóa   </a>
                </div>
        </div>
        </form>


    </div>
    <!-- End collection info -->
    <!-- Begin no products -->


    <!-- End no products -->
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