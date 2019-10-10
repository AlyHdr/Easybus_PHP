<html>

	<head>
		<title>Easy Bus Managment System</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!--Oswald Font -->
		<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="css/tooltipster.css" />
		<link href="css/pgwslider.css" rel="stylesheet">
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link href="style.css" rel="stylesheet" media="screen">
		<link href="select.css" rel="stylesheet">

		<link href="responsive.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="css/style2.css">
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
						    	<li><a href="index.php">Home</a></li>
							<li><a href="grantUsers.php">Grant Users</a></li>
							<li><a href="addDriver.php">Add Driver</a></li>
							<li><a href="specifyHolidays.php">School</a></li>
                            <li><a href="viewUsers.php">View Users</a></li>
                            <li><a href="viewDrivers.php">View Drivers</a></li></ul>
					
						</ul>
					</nav>
				</div>
			</div>
		</section>
		<section id="content_area">
			<div class="clearfix wrapper main_content_area">
				<div class="clearfix main_content floatleft">
					<div class="clearfix content">
						
						<div class="contact_us">
                        <form action="viewUsers.php" method="post">
						<?php
							require_once('connect.php');

			                if(isset($_GET['id']))
                            {
                                $id=$_GET['id'];
                                $query="delete from user where userId=$id";
                                if(!mysqli_query($conn,$query))
							        echo mysqli_error($conn);
							     $query="delete from orderedTrack where userId=$id";
                                if(!mysqli_query($conn,$query))
							        echo mysqli_error($conn);
                            }
							echo "<h1>Choose Driver</h1>";
							$query="select fullName from driver";
							if($res=mysqli_query($conn,$query))
							{
							    echo '<select class="styled-select yellow rounded" >';
							    while($row=mysqli_fetch_array($res))
							    {
							        echo "<option>".$row[0]."</option>";
							    }
							    echo "</select>";
							}
							
						    echo "<br><p><input type=Submit class=wpcf7-submit value=Search name=submit /></p>";
							$querySelectStudent="select * from user";
							if(!($res=mysqli_query($conn,$querySelectStudent)))
								echo mysqli_error($conn);
							else
							{
								if(mysqli_num_rows($res)>0)
								{
									echo "<div class=tbl-header>";
									echo "<table><th>Name</th><th>Phone Number</th><th>Remove</th>";
									echo "</table></div>";
									echo "<div class=tbl-content><table>";
									while($row=mysqli_fetch_assoc($res))
									{
										echo "<tr>";
										echo "<td>".$row['fName']." ".$row['lName']."</td><td>".$row['phoneNumber']."</td>
										<td><a href=viewUsers.php?id=".$row['userId']." class=button >remove</a></td>";
										echo "</tr>";
									} 
									echo "</table></div><br/>";
								}
							}
							?>
							</form>
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
