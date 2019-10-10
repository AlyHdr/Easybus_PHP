<html>


	<head>
		<title>Easy Bus Managment System</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href='css/fonts.css' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="css/tooltipster.css" />
		<link href="css/pgwslider.css" rel="stylesheet">
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link href="style.css" rel="stylesheet" media="screen">	
		<link href="responsive.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="css/style2.css">
			<style>
       /* Set the size of the div element that contains the map */
      #map {
        height: 400px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }
    </style>
	</head>

	<body>
		<?php
		require_once('connect.php');
			if(!empty($_POST['submit']))
			{
				$days=array("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday");
				$count=1;
				foreach($days as $day)
				{
					if(isset($_POST["$day"]))
					{
						$query="update school set day$count='$day'";
						if(!mysqli_query($conn,$query))
							echo mysqli_error($conn)."<br/>";
						$count++;
					}
				}
			}
			?>
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
					</nav>
				</div>
			</div>
		</section>
		
		<section id="content_area">
			<div class="clearfix wrapper main_content_area">
						<div class="contact_us">
							<h1>Shool Location</h1>
			                <div id="map"></div>
							<br/>
							<h1>School Holidays</h1>
							<form action="specifyHolidays.php" method="post">
							<?php
							echo "<div class=tbl-header>";
							echo "<table><th>Day</th><th>Check</th>";
							echo "</table></div>";
							$days=array("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday");
							echo "<div class=tbl-content><table>";
							foreach($days as $element)
							{
								echo "<tr>";
								echo"<td>$element</td>
								<td><input type=checkbox name=$element </td>";
								echo "</tr>";
							}
							echo "</table></div><br/>";
							?>
							<p><input type="Submit" class="wpcf7-submit" value="Submit" name="submit"/></p>
							</form>
						</div>
			</div>
		</section><section id="footer_top_area">
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
					<p> Copyright &copy; All rights reserved by <span>Wpfreeware.com</span></p>
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