<?php  include_once("./db/Database.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Bando | MinhAn</title>
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
</head><!--/head-->

<body>
<?php require_once __DIR__ . '/layout/header.php'; ?>
<section>
		<div class="container">
			<div class="row">

                <div class="col-sm-9">
<div class="blog-post-area">
<?php
                                if (isset($_GET['id']))
                                {
                                    $id=$_GET['id'];
                                    $sql = "SELECT * FROM maps where id=$id";
                                    $result = $conn->query($sql);
                                  
    
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {		?>			
						<div class="single-blog-post">
							<h2 class="title text-center"><?php echo $row["title"]; ?></h2>
							<div class="post-meta">
								<ul>
								</ul>
								
							</div>
                            <p><?php echo $row["summary"] ; ?></p>
                            <a href=""><img src="./admin/assets/uploads/<?php echo $row["map_url"]; ?>" alt="">
                        </a>
						</div>
                    </div>
          </div>
 </div>                            
                                            
<?php
								 }}}?>

<?php require_once __DIR__ . '/layout/footer.php'; ?>
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>