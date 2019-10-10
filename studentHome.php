<?php
			session_start();
			?>
<html>

	<head>
		<title>Easy Bus Managment System</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!--Oswald Font -->
		<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="css/tooltipster.css" />
		<!-- home slider-->
		<link href="css/pgwslider.css" rel="stylesheet">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link href="style.css" rel="stylesheet" media="screen">
		<link href="responsive.css" rel="stylesheet" media="screen">
	</head>

	<body>
		
		<section id="header_area">
			<div class="wrapper header">
				<div class="clearfix header_top">
					<div class="clearfix logo floatleft">
						<a href=""><h1><span>Easy</span>Bus</h1></a>
					</div>
					<div class="clearfix search floatright">
						<form>
							<input type="text" placeholder="Search"/>
							<input type="submit" />
						</form>
					</div>
				</div>
				<div class="header_bottom">
					<nav>
						<ul id="nav">
							<li><a href="studentHome.php">Home</a></li>
							<li><a href="profile.php">Profile</a></li>
							<li><a href="viewSchedule.php">View Schedule</a></li>
							<li><a href="logout.php">Logout</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</section>
		<section id="content_area">
			<div class="clearfix wrapper main_content_area">

				<div class="clearfix main_content floatleft">

					<div class="clearfix slider">
						<ul class="pgwSlider">
							<li><img src="images/thumbs/bus1.png" alt="Old is Gold" data-description="Old is Gold" data-large-src="images/slides/bus1.png"/></li>
							<li><img src="images/thumbs/bus2.gif" alt="Best Buses" data-large-src="images/slides/bus2.gif" data-description="Best Buses"/></li>
							<li>
								<img src="images/thumbs/bus3.jpg" alt="Comfort" data-large-src="images/slides/bus3.jpg" data-description="Be our guest">
							</li>


						</ul>
					</div>
				</div>
				<div class="clearfix sidebar_container floatright">
					<div class="clearfix sidebar">
						<div class="clearfix single_sidebar">
							<div class="popular_post">
								<div class="sidebar_title"><h2>Most Popular</h2></div>
								<ul>
									<li><a href="">I don't even think about staying at the univeristy to wait for a bus. </a></li>
									<li><a href="">Its so comfortable it always fits my schedule i don't wait. </a></li>
									<li><a href="">After we registered in the system it have been so easy to come and go to the campus. </a></li>
								</ul>
							</div>
							</div>
						</div>
				</div>
			</div>
		</section>
		<section id="footer_top_area">
			<div class="clearfix wrapper footer_top">
				<div class="clearfix footer_top_container">
					<div class="clearfix single_footer_top floatleft">
						<h2>About EasyBus</h2>
						<p>Our Goal to serve the Students the best bus service in order to let them reach thier homes safely and at the best time</p>
					</div>
				</div>
			</div>
		</section>

		<section id="footer_bottom_area">
			<div class="clearfix wrapper footer_bottom">
				<div class="clearfix copyright floatleft">
					<p> Copyright &copy; All rights reserved by <span>EasyBus.com</span></p>
				</div>
				<div class="clearfix social floatright">
					<ul>
						<li><a class="tooltip" title="Facebook" href=""><i class="fa fa-facebook-square"></i></a></li>
						<li><a class="tooltip" title="Twitter" href=""><i class="fa fa-twitter-square"></i></a></li>
						<li><a class="tooltip" title="Google+" href=""><i class="fa fa-google-plus-square"></i></a></li>
						<li><a class="tooltip" title="LinkedIn" href=""><i class="fa fa-linkedin-square"></i></a></li>
						<li><a class="tooltip" title="tumblr" href=""><i class="fa fa-tumblr-square"></i></a></li>
						<li><a class="tooltip" title="Pinterest" href=""><i class="fa fa-pinterest-square"></i></a></li>
						<li><a class="tooltip" title="RSS Feed" href=""><i class="fa fa-rss-square"></i></a></li>
						<li><a class="tooltip" title="Sitemap" href=""><i class="fa fa-sitemap"></i> </a></li>
					</ul>
				</div>
			</div>
		</section>

		<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.0.min.js"></script>
		<script type="text/javascript" src="js/jquery.tooltipster.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$('.tooltip').tooltipster();
			});
		</script>
		 <script type="text/javascript" src="js/selectnav.min.js"></script>
		<script type="text/javascript">
			selectnav('nav', {
			  label: '-Navigation-',
			  nested: true,
			  indent: '-'
			});
		</script>
		<script src="js/pgwslider.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$('.pgwSlider').pgwSlider({

					intervalDuration: 5000

				});
			});
		</script>
		<script type="text/javascript" src="js/placeholder_support_IE.js"></script>

<!--
---- Clean html template by http://WpFreeware.com
---- This is the main file (index.html).
---- You are allowed to change anything you like. Find out more Awesome Templates @ wpfreeware.com
---- Read License-readme.txt file to learn more.
-->

	</body>
</html>
