<?php
    session_start();
    ?>
<html>

	<head>
		<title>Easy Bus Managment System</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!--Oswald Font -->
		<link href='css/fonts.css' rel='stylesheet' type='text/css'>
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
							<li><a href="index.php">Home</a></li>
							<li><a href="grantUsers.php">Grant Users</a></li>
							<li><a href="addDriver.php">Add Driver</a></li>
							<li><a href="specifyHolidays.php">School</a></li>
                            <li><a href="viewUsers.php">View Users</a></li>
                            <li><a href="viewDrivers.php">View Drivers</a></li>
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
							<form action="grantUsers.php" method="post">
							<?php
								require_once('connect.php');
								$code="";
								$bool=0;
								if(isset($_POST['code']))
								{
									$code=$_POST['code'];
								}
								if(isset($_POST['grant']))
								{
									$code=$_SESSION['code'];
									$firstname=$_SESSION['firstname'];
									$lastname=$_SESSION['lastname'];
									$phone=$_SESSION['phone'];
									$lat=$_SESSION['latitude'];
									$long=$_SESSION['longtitude'];
									$driver=$_POST['driver'];
									$queryGetDriverId="select driverId from driver where fullName='$driver'";
									$row=mysqli_fetch_array(mysqli_query($conn,$queryGetDriverId));
									$driverId=$row[0];
									
									$query="delete from addedusers where code=$code";
									if(!mysqli_query($conn,$query))
										echo mysqli_error($conn);
									$query="insert into user values(NULL,'$firstname','$lastname','$phone',$driverId)";
									
									if(!mysqli_query($conn,$query))
										echo mysqli_error($conn);
									$query1="select userId from user where phoneNumber='$phone'";
									
									if(!$res=mysqli_query($conn,$query1))
										echo mysqli_error($conn);
									else
									{
										$row=mysqli_fetch_array($res);
										$userId=$row[0];
									}
									
									$query2="insert into location values($userId,$lat,$long,500)";
                                    
									if(!$res=mysqli_query($conn,$query2))
										echo mysqli_error($conn);
									
									$query3="insert into userAbsence values($userId,1,1)";
									
									if(!$res=mysqli_query($conn,$query3))
										echo mysqli_error($conn);
									$query4="insert into orderedTrack values($userId)";
									
									if(!$res=mysqli_query($conn,$query4))
										echo mysqli_error($conn);
										
									echo "<script>alert('User granteded')</script>";
									$bool=1;
								}
								if($code)
								{
									$_SESSION['code']=$code;
									$query="select * from addedusers where code=$code";
									$queryDrivers="select fullName from driver";
									if($res=mysqli_query($conn,$queryDrivers))
									{
										while($row=mysqli_fetch_array($res))
										{
											$drivers[]=$row[0];
										}
									}
									else
										echo mysqli_error($conn);
									$query="select * from addedusers where code=$code";
									if(!($r=mysqli_query($conn,$query)))
									{
										echo mysqli_error($conn);
									}
									else
									{
										if(mysqli_num_rows($r)>0)
										{
											$row=mysqli_fetch_assoc($r);
											$_SESSION['firstname']=$row['fName'];
											$_SESSION['lastname']=$row['lName'];
											$_SESSION['phone']=$row['phoneNb'];
											$_SESSION['latitude']=$row['latitude'];
											$_SESSION['longtitude']=$row['longtitude'];
											$result ="<table>
													<tr><td><p>First Name:</p></td><td><input type=text id=firstname class=wpcf7-text value='".$row['fName']."' name=firstname disabled /></td>
												  <tr><td><p>Last Name:</p></td><td><input type=text id=lastname class=wpcf7-text value='".$row['lName']."' name=lastname disabled /></td>
												  <tr><td><p>Phone Number:</p></td><td><input type=text id=phone class=wpcf7-text value='".$row['phoneNb']."' name=phone disabled /></td>
													<td>Driver:</td>
													<td><select name=driver >";
											foreach($drivers as $driver)
											{
												$result.="<option>$driver</option>";
											}
											$result .="</select>
												</td>
											</tr>
											<tr>
												<td><input type=Submit class=wpcf7-submit value=Grant User name=grant /></td>
											</tr>
											</table>";
											echo $result;
										}
										else
										{
											if($bool==0)
												echo "No such code !";
											echo "<h1>Search New Users</h1>
											<p><input type=number class=wpcf7-text placeholder=code* name=code /></p>
											<p><input type=Submit class=wpcf7-submit value=Search name=submit /></p>";
								
										}
									}
								}
								else
								{
										echo "<h1>Search New Users</h1>
											<p><input type=number class=wpcf7-text placeholder=code* name=code /></p>
											<p><input type=Submit class=wpcf7-submit value=Search name=submit /></p>";
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
		<script type="text/javascript">
		function enableTextBox()
		{
			    document.getElementById("firstname").disabled=false;
			    document.getElementById("lastname").disabled=false;
			    document.getElementById("phone").disabled=false;
			    document.getElementById("edit").value="Save";
		        document.getElementById("bool").value=1;
		}
		</script>

	</body>
</html>
