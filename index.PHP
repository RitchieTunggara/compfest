<?php
	session_start();
?>
<!DOCTYPE HTML>
<!--
	Stellar by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>SEA Salon</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		

		<!-- Wrapper -->
			<div id="wrapper">
				<div class="top-left-buttons">
					<?php if (isset($_SESSION['username'])): ?>
						<a href="PHP/logout.php">Logout</a>
					<?php else: ?>
						<a href="login.php">Login</a>
						<a href="register.php">Register</a>
					<?php endif; ?>
				</div>

				<!-- Header -->
					<header id="header" class="alt">
						<span class="logo"><img src="images/SeaSalonLogoRounded.png" width = "150" height="150" alt="" /></span>
						<h1>SEA Salon</h1>
					</header>

				<!-- Nav -->
					<nav id="nav">
						<ul>
							<li><a href="#intro" class="active">Introduction</a></li>
							<li><a href="#first">Services</a></li>
							<li><a href="#second">Branch</a></li>
							<li><a href="#third">Review</a></li>
							<li><a href="#cta">Contact Details</a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">

						<!-- Introduction -->
							<section id="intro" class="main">
								<div class="spotlight">
									<div class="content">
										<header class="major">
											<h2>“Beauty and Elegance Redefined”</h2>
										</header>
										<p>Welcome to SEA Salon, where elegance meets expertise. Our talented team offers a range of premium services, 
											including haircuts, styling, facial treatments, manicures, and pedicures, all tailored to enhance your 
											natural beauty and provide a luxurious experience. Discover the perfect blend of relaxation and style 
											at SEA Salon.</p>
										<ul class="actions">
											<li><a href="generic.html" class="button">Learn More</a></li>
										</ul>
									</div>
									<span class="image"><img src="images/SalonImageRounded.png" alt="" /></span>
								</div>
							</section>

						<!-- First Section -->
							<section id="first" class="main special">
								<header class="major">
									<h2>Our Signature Services</h2>
								</header>
								<ul class="features">
									<li>
										<span class="image"><img src="images/HairTreatmentRounded.png" width = "150" height="150" alt="" /></span>
										<h3>Haircuts and Styling</h3>
										<p>Involve cutting, trimming, and shaping hair, followed by techniques such as blow-drying, curling, 
											or straightening to create a desired look and enhance the overall appearance.</p>
									</li>
									<li>
										<span class="image"><img src="images/MenipediRounded.png" width = "150" height="150" alt="" /></span>
										<h3>Manicure and Pedicure</h3>
										<p>Beauty treatments for the hands and feet, involving nail trimming, shaping, cuticle care, exfoliation, 
											and polish application to enhance the appearance and health of nails and skin.</p>
									</li>
									<li>
										<span class="image"><img src="images/FaceTreatmentRounded.png" width = "150" height="150" alt="" /></span>	
										<h3>Facial Treatments</h3>
										<p>Skincare procedures designed to cleanse, exfoliate, and nourish the skin, promoting a clear, well-hydrated 
											complexion..</p>
									</li>
								</ul>
								<footer class="major">
									<ul class="actions special">
										<li><a href="generic.html" class="button">Learn More</a></li>
									</ul>
								</footer>
							</section>

						<!-- Second Section -->
							<section id="second" class="main special">
								<header class="major">
									<h2>Our Branchs</h2>
									<p>We have so many branchs around the world! <br>With the newest technology and best with following advantages as:</p>
								</header>
								<ul class="statistics">
									<li class="style1">
										<span>
											<img src="images/ExteriorSalon3.png" width = "150" height="150" alt="Salon">
										</span>
										<!-- <span class="icon solid fa-code-branch"></span> -->
										<strong>Fancy</strong>
									</li>
									<li class="style2">
										<span>
											<img src="images/ExteriorSalon2.png" width = "150" height="150" alt="Salon">
										</span>
										<strong>Fabulous</strong>
									</li>
									<li class="style3">
										<span>
											<img src="images/ExteriorSalon1.png" width = "150" height="150" alt="Salon">
										</span>
										<strong>Stylish</strong>
									</li>
									<li class="style4">
										<span>
											<img src="images/InteriorSalon1.png" width = "150" height="150" alt="Salon">
										</span>
										<strong>Aesthetic</strong>
									</li>
									<li class="style5">
										<span>
											<img src="images/InteriorSalon2.png" width = "150" height="150" alt="Salon">
										</span>
										<strong>Modern</strong>
									</li>
								</ul>
								<p class="content">Nam elementum nisl et mi a commodo porttitor. Morbi sit amet nisl eu arcu faucibus hendrerit vel a risus. Nam a orci mi, elementum ac arcu sit amet, fermentum pellentesque et purus. Integer maximus varius lorem, sed convallis diam accumsan sed. Etiam porttitor placerat sapien, sed eleifend a enim pulvinar faucibus semper quis ut arcu. Ut non nisl a mollis est efficitur vestibulum. Integer eget purus nec nulla mattis et accumsan ut magna libero. Morbi auctor iaculis porttitor. Sed ut magna ac risus et hendrerit scelerisque. Praesent eleifend lacus in lectus aliquam porta. Cras eu ornare dui curabitur lacinia.</p>
								<footer class="major">
									<ul class="actions special">
										<?php if (isset($_SESSION['username'])): ?>
											<li><a href="reservation.php" class="button">Reservation</a></li>
										<?php else: ?>
											<p>You need to <a href="login.php">Login</a> first to give to do a Reservation</p>
										<?php endif; ?>
									</ul>
								</footer>
							</section>

						<!-- Get Started -->
							<section id="third" class="main special">
								<header class="major">
									<h2>Review</h2>
									<fieldset>
										<legend>Form</legend>
										<form method="post" action="PHP/submitReview.PHP">
											<p>
												<label for="message">Message</label>
												<textarea name="txtMessage" id="txtMessage" required></textarea>
											</p>
											<p>
												<label for="rating">Rating</label>
											</p>
											<div class="star">
												<span onclick="setRating(5)"style="font-size: 250%" class="fa fa-star"></span>
												<span onclick="setRating(4)" style="font-size: 250%" class="fa fa-star"></span>
												<span onclick="setRating(3)" style="font-size: 250%" class="fa fa-star"></span>
												<span onclick="setRating(2)" style="font-size: 250%" class="fa fa-star"></span>
												<span onclick="setRating(1)" style="font-size: 250%" class="fa fa-star"></span>
												<input type="hidden" name="rating" id="rating" value="0" required>
											</div>
											<p>&nbsp;</p>
											<p>
											<?php if (isset($_SESSION['username'])): ?>
												<input onclick="button1()" type="submit" name="rateButton" id="Submit" value="Submit">
											<?php else: ?>
												<p>You need to <a href="login.php">Login</a> first to give a rating!</p>
											<?php endif; ?>
											</p>
										</form>
										</fieldset>
								</header>
								<script>
									function setRating(rating) {
										document.getElementById('rating').value = rating;
										// alert(rating + ' Star');
										$_SESSION['rating'] = rating;
									}
									
								</script>
								<script>
									function setRating(rating) {
										document.getElementById('rating').value = rating;
										var stars = document.getElementsByClassName('fa-star');
										for (var i = 0; i < stars.length; i++) {
											stars[i].classList.remove('checked');
										}
										for (var i = 0; i < rating; i++) {
											stars[4-i].classList.add('checked');
										}
									}
								</script>

								<footer class="major">
									<ul class="actions special">
										<li><a href="generic.html" class="button primary">Get Started</a></li>
										<li><a href="generic.html" class="button">Learn More</a></li>
									</ul>
								</footer>
							</section>

					</div>

					<section id="cta" class="main special">
						<h2><br>Contact Details</h2>
					</section>

				<!-- Footer -->
					<footer id="footer">
						<section>
							<h2>Thomas</h2>
							<dl class="alt">
								<dt>Phone</dt>
								<dd>08123456789</dd>
							</dl>
						</section>
						<section>
							<h2>Sekar</h2>
							<dl class="alt">
								<dt>Phone</dt>
								<dd>08164829372</dd>
							</dl>
						</section>
						
						<p class="copyright">&copy; Untitled. Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>