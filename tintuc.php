<?php  include_once("./db/Database.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Tintuc | MinhAn</title>
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
		<div class="container">
			<div class="row">
				
				<div class="col-sm-9">
					<div class="blog-post-area">
						<h2 class="title text-center">TIN TỨC</h2>
						<div class="single-blog-post">
                        <?php
								$sql = "SELECT * FROM news";
								$result = $conn->query($sql);
								$firstItem = true; // Khởi tạo biến $firstItem trước vòng lặp

								if ($result->num_rows > 0) {
									while ($row = $result->fetch_assoc()) {
										?>
							<h3><?php echo $row["title"]; ?></h3>
							<div class="post-meta">
								<ul>
									<li><i class="fa fa-calendar"></i> <?php echo $row["created_at"]; ?></li>
								</ul>
								<span>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half-o"></i>
								</span>
							</div>
							<a href="">
								<img src="./admin/assets/uploads/<?php echo $row["avatar"]; ?>" alt="">
							</a>
							<p><?php echo $row["summary"]; ?></p>
							<a  class="btn btn-primary" href="./xemchitiettintuc.php?id=<?php echo $row["id"]?>">Xem thêm</a>
                            <?php }}?>
						</div>
						
						
						<div class="pagination-area">
							<ul class="pagination">
								<li><a href="" class="active">1</a></li>
								<li><a href="">2</a></li>
								<li><a href="">3</a></li>
								<li><a href=""><i class="fa fa-angle-double-right"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
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