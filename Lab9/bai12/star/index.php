<?php 
session_start();
include('inc/header.php');
?>
<title>coderszine.com : Demo Advance Star Rating System with Ajax, PHP and MySQL</title>
<script src="js/rating.js"></script>
<link rel="stylesheet" href="css/style.css">
<?php include('inc/container.php');?>
<div class="container">		
	<h2>Example: Advance Star Rating System with Ajax, PHP and MySQL</h2>
	<?php
	include 'inc/menu.php';
	include 'class/Rating.php';
	$rating = new Rating();
	$productList = $rating->getProductList();
	foreach($productList as $product){
		$average = $rating->getRatingAverage($product["id"]);
	?>	
	<div class="row">
		<div class="col-sm-4">
			<img class="product_image" src="image/<?php echo $product["image"]; ?>" style="width:350px;height:250px;padding-top:10px;">
		</div>
		<div class="col-sm-4">
		<h4 style="margin-top:10px;"><?php echo $product["name"]; ?></h4>
		<div><span class="average"><?php printf('%.1f', $average); ?> <small>/ 5</small></span> <span class="rating-reviews"><a href="rating.php?item_id=<?php echo $product["id"]; ?>">Rating & Reviews</a></span></div>
		<?php echo $product["description"]; ?>		
		</div>		
	</div>
	<?php } ?>	
</div>	
</div>	
<?php include('inc/footer.php');?>