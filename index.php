<?php

session_start();



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>responsive ecommerce website design</title>
	<link rel="stylesheet" type="text/css" href="CSS/style.css">

	<link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

</head>
<body>
	<!----header--->
	<header>
		<a href="#" class="logo">Classix</a>

		<ul class="navlist">
			<li><a href="#home">Home</a></li>
			<li><a href="#featured">Featured</a></li>
			<li><a href="#new">New</a></li>
			<!-- <li><a href="#contact">Contact</a></li> -->
		</ul>

		<div class="header-icons">
			<a href="PHP/cart.php"><i class='bx bx-shopping-bag'></i></a>
			<a href="PHP/account.php"><i class='bx bx-user'></i></a>
			<div class="bx bx-menu" id="menu-icon"></div>
		</div>
	</header>

	<!----home--->
	<section class="home" id="home">
		<div class="home-text">
			<h1>Men's New <br><span>Arrivals</span></h1>
			<p>New colors, now also available in men's sizing</p>
			<a href="PHP/search_products.php" class="btn">View Collection</a>
		</div>
	</section>

	<!----featured--->
	<section class="featured" id="featured">
		<div class="center-text">
			<h2>Featured Categories</h2>
		</div>

		<div class="featured-content">
			<div class="row">
				<img src="img/fea1.jpg">
				<div class="fea-text">
					<h5>Mens</h5>
					<p>10 items</p>
				</div>
				<div class="arrow">
					<a href="PHP/search_products.php?category=shirts"><i class='bx bx-right-arrow-alt' ></i></a>
				</div>
			</div>

			<div class="row">
				<img src="img/fea2.jpg">
				<div class="fea-text">
					<h5>Mens</h5>
					<p>10 items</p>
				</div>
				<div class="arrow">
				<a href="PHP/search_products.php?category=pants"><i class='bx bx-right-arrow-alt' ></i></a>
				</div>
			</div>

			<div class="row">
				<img src="img/fea3.jpg">
				<div class="fea-text">
					<h5>Mens</h5>
					<p>10 items</p>
				</div>
				<div class="arrow">
				<a href="PHP/search_products.php?category=t_shirts"><i class='bx bx-right-arrow-alt' ></i></a>
				</div>
			</div>

			<div class="row">
				<img src="img/fea5.jpg">
				<div class="fea-text">
					<h5>Mens</h5>
					<p>10 items</p>
				</div>
				<div class="arrow">
				<a href="PHP/search_products.php?category=shorts"><i class='bx bx-right-arrow-alt' ></i></a>
				</div>
			</div>

			<div class="row">
				<img src="img/shoe1.jpg">
				<div class="fea-text">
					<h5>Mens</h5>
					<p>10 items</p>
				</div>
				<div class="arrow">
				<a href="PHP/search_products.php?category=shoes"><i class='bx bx-right-arrow-alt' ></i></a>
				</div>
			</div>

			<div class="row">
				<img src="img/accessories.jpg">
				<div class="fea-text">
					<h5>Accessories</h5>
					<p>10 items</p>
				</div>
				<div class="arrow">
				<a href="PHP/search_products.php?category=accessories"><i class='bx bx-right-arrow-alt' ></i></a>
				</div>
			</div>

		</div>
	</section>

	<!----cta--->
	<section class="cta">
		<div class="cta-text">
			<h6>SUMMER ON SALE</h6>
			<h4>20% OFF <br> NEW ARRIVAL</h4>
			<a href="#" class="btn">Shop Now</a>
		</div>
	</section>

	<!----new--->
	<section class="new" id="new">
		<div class="center-text">
			<h2>New Arrivals</h2>
		</div>

		<div class="new-content">
			<div class="box">
				<img src="img/tren1.jpg">
				<h5>Lorem Ipsum dizgi</h5>
				<h6>$188</h6>
				<div class="sale">
					<h4>Sale</h4>
				</div>
			</div>

			<div class="box">
				<img src="img/tren2.jpg">
				<h5>Lorem Ipsum dizgi</h5>
				<h6>$188</h6>
				<div class="sale">
					<h4>Sale</h4>
				</div>
			</div>

			<div class="box">
				<img src="img/tren3.jpg">
				<h5>Lorem Ipsum dizgi</h5>
				<h6>$188</h6>
				<div class="sale">
					<h4>Sale</h4>
				</div>
			</div>

			<div class="box">
				<img src="img/tren4.jpg">
				<h5>Lorem Ipsum dizgi</h5>
				<h6>$188</h6>
				<div class="sale">
					<h4>Sale</h4>
				</div>
			</div>

		</div>
	</section>


	<!----brand--->
	<!-- <section class="brand">
		<div class="brand-content">
			<div class="main">
				<img src="img/brand1.png">
			</div>

			<div class="main">
				<img src="img/brand2.png">
			</div>

			<div class="main">
				<img src="img/brand3.png">
			</div>

			<div class="main">
				<img src="img/brand4.png">
			</div>

			<div class="main">
				<img src="img/brand5.png">
			</div>

			<div class="main">
				<img src="img/brand6.png">
			</div>

		</div>
	</section> -->

	<!----contact--->
	<section class="contact" id="contact">
		<div class="main-contact">
			<h3>Classix</h3>
			<h5>Let's Connect With Us</h5>
			<div class="icons">
				<a href="#"><i class='bx bxl-facebook-square' ></i></a>
				<a href="#"><i class='bx bxl-instagram-alt' ></i></a>
				<a href="#"><i class='bx bxl-twitter' ></i></a>
			</div>
		</div>

		<div class="main-contact">
			<h3>Explore</h3>
			<li><a href="#home">Home</a></li>
			<li><a href="#featured">Featured</a></li>
			<li><a href="#new">New</a></li>
			<li><a href="#contact">Contact</a></li>
		</div>

		<div class="main-contact">
			<h3>Our Services</h3>
			<li><a href="#">Pricing</a></li>
			<li><a href="#">Free Shipping</a></li>
			<li><a href="#">Gift Cards</a></li>
		</div>

		<div class="main-contact">
			<h3>Shopping</h3>
			<li><a href="#">Clothing Store</a></li>
			<li><a href="#">Trending Shoes</a></li>
			<li><a href="#">Accessories</a></li>
			<li><a href="#">Sale</a></li>
		</div>

	</section>

	<div class="last-text">
		<p>Copyright © 2022 All rights reserved | This template is made with  by Tahmid Ahmed</p>
	</div>

	<!----scroll top--->
	<a href="#" class="top"><i class='bx bx-up-arrow-alt' ></i></a>


	<script src="https://unpkg.com/scrollreveal"></script>

	<!----custom js link--->
	<script src="js/script.js"></script>

	<?php

?>
	
</body>
</html>