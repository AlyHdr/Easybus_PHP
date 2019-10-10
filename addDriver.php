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
		<style>
       /* Set the size of the div element that contains the map */
      #map {
        height: 400px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }
    </style>
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
						<div class="contact_us">
							<form action="addDriver.php" method="post">
							<?php
								require_once('connect.php');
								$bool=0;
								$foo=0;
								echo "<h1>Fill Driver Information</h1>";
								if(isset($_POST['addDriver']))
								{
									$bool=1;
									$name=$_POST['name'];
									$phoneNb=$_POST['phone'];
									$lat=$_POST['lat'];
									$lng=$_POST['lng'];
									if(!$lat || $lng)
									{
									    echo "Choose a location for driver's house<br/>";
									}
									if($name && $phoneNb)
									{
										$query="insert into driver values(NULL,'$name','$phoneNb',$lat,$lng)";
										if(!mysqli_query($conn,$query))
											echo mysqli_error($conn);
										else
										{
										    $querySelectId="select * from driver where phoneNb=$phoneNb";
										    if($rrr=mysqli_query($conn,$querySelectId))
										    {
										        $row=mysqli_fetch_array($rrr);
										        if(mysqli_num_rows($rrr)==0)
										            echo "Emptyyyy";
										        $driverId=$row[0];
										        $query1="insert into tracktype values($driverId,'sortedStudents')";
										        if(!mysqli_query($conn,$query1))
										            echo mysqli_error($conn);
										    }
										    else
										        echo mysqli_error($conn);
										}
										
										echo "<script>alert('Added Successfully!')</script>";
									}
									else
									{
										echo "Fill all the feilds!";
									}
								}
								echo '<input type="hidden" id="lat" name="lat"></input>';
								echo '<input type="hidden" id="lng" name="lng"></input>';
							
								echo '<p><input type="text" class="wpcf7-text" placeholder="Full Name*" name="name"/></p>
									 <p><input type="text" class="wpcf7-email" placeholder="Phone Number*" name="phone"/></p>';
							    echo "<h3>Pick Driver's House</h3>";
							    echo '<div id="map"></div>';
								echo '<p><input type="Submit" class="wpcf7-submit" value="Add Driver" name="addDriver"/></p>';
								?>
							</form>
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
			document.getElementById("username").disabled=false;
			document.getElementById("fullname").disabled=false;
			document.getElementById("phone").disabled=false;
			document.getElementById("address").disabled=false;
		}
		</script>
            <script>
            
// Initialize and add the map
function initMap() {
  // The location of Uluru
  var uluru = {lat: 33.8547, lng: 35.8623};
  // The map, centered at Uluru
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 10, center: uluru});
  // The marker, positioned at Uluru
  var marker = new google.maps.Marker({position: uluru, map: map});
  


    
  map.addListener('click', function(event) {
          marker.setPosition(event.latLng);
            var myLatLng = event.latLng;
            var lat = myLatLng.lat();
            var lng = myLatLng.lng();
              document.getElementById("lat").value = lat;
              document.getElementById("lng").value = lng;
          });
}
    </script>
    <!--Load the API from the specified URL
    * The async attribute allows the browser to render the page while the API loads
    * The key parameter will contain your own API key (which is not needed for this tutorial)
    * The callback parameter executes the initMap() function
    -->
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap">
    </script>
	</body>
</html>
