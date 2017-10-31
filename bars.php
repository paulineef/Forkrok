<head>
	<title>Förkrök - Bars &amp; Clubs</title>
	<link rel="stylesheet" type="text/css" href="forkrok.css">
	<script src="https://use.fontawesome.com/6f2a9fca0c.js"></script>
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {	
				$(".pic").click(function(){
				event.preventDefault();	
				window.location.href='barBase.php';
				});
				
			});
				
		</script>
</head>
<body>
<?php include ("sidebar.php") ?>

<div class="content">

	<div class="placement">

		<h2>Bars &amp; Clubs<i class="fa fa-beer" aria-hidden="true"></i></h2>
</div>
	<div id="indexBongo">
			<h2 class="place">Bongo Bar</h2>
		
			<div class="map">
				<iframe frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJqf_BLehtWkYRn8yFbMIzcqk&key=AIzaSyCmCQXDN3el8D7bvNcoj7-5hnGf9C3gzw0" allowfullscreen></iframe>
			</div>
			<p>
				Small and nice place for both a chill night out and more energized with mixed hip-hop and reggae music. Entrance for 60:- and you get the first glass for free.<br><br>
			</p>
			<div class="social">
				<a href="https://www.facebook.com/bongojkpg/" target="_blank"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
				<a href="http://bongobar.se/jonkoping/" target="_blank"><i class="fa fa-internet-explorer" aria-hidden="true"></i></a>
			</div>
			<div class="back">
				<i class="fa fa-times" aria-hidden="true"></i>
			</div>
		</div>
	<?php 
	# Open the database
@ $db = new mysqli('localhost', 'user', 'user', 'Forkrok');



	//IF the database can't connect
if ($db->connect_error) {
    echo "could not connect: " . $db->connect_error;
    printf("<br><a href=index.php>Return to home page </a>");
    exit();
}
	
	$query = "SELECT barID, header, picture FROM bars";
	
	
	# Here's the query using bound result parameters
    // echo "we are now using bound result parameters <br/>";
    $stmt = $db->prepare($query);
//takes the result of the search and create variables from it
    $stmt->bind_result($barID, $header, $picture);
    $stmt->execute();
?>
   <?php
    echo '<ul id="listBar">';
	$test = 1;
    while ($stmt->fetch()) {
		
	echo "<li id='$test' class='pic'><img src=\"img/" .
		$picture . "\"> <h3 class='header'> $header </li></li>";
		echo($test);
		$test ++;
    }
	echo "</ul>";

	?>
	
</div>

<?php include ("footer.php") ?>
<style type="text/css">	
	.b {
		display: inline;
		float: right;
	}
	.place {
		display: inline;
	}
	
	#listBar {
		bottom: 50px;
		font-family: 'lato';
		width: 100%;
		padding: 0;
		text-align: center;
		overflow: hidden;
		list-style-type: none;
		left: 0px;
		
		/*transition-property: all;
	transition-duration: .5s;
	transition-timing-function: cubic-bezier(0, 1, 0.5, 1);*/
	}
	.pic {
		float: left;
		max-width: 50%;
		padding: 6px;
		box-sizing: border-box;
		margin-bottom: 15px;
		min-height: 147px;
		overflow: hidden;
	}
	.pic img {
		max-width: 100%;
	}
	.header {
		color: white;
		z-index: 9999;
		font-size: 15pt;
		margin: 0;
		margin-top: -75px;
	}
	iframe {
		width: 100%;
		min-height: 180px;
		margin: 0 auto;
	}
	#indexBongo, #indexNEO, #indexAqua, #indexHarrys, #indexID, #indexEnkelt, #indexRetro, #indexMurphys, #indexKlubb, #indexLegends, #indexGladje, #indexPitchers {
		position: absolute;
		margin: 0 auto;
		width: 100%;
		z-index: 999;
		background: white;
		padding: 12px;
		height: 100vh;
		padding: 0;
		top: 0px;
		left: 500px;
		padding-top: 32px;
		padding: 48px 18px;
		box-sizing: border-box;
		overflow: hidden;

	}
	#indexBongo.open, #indexNEO.open, #indexAqua.open, #indexHarrys.open, #indexID.open, #indexEnkelt.open, #indexGladje.open, #indexMurphys.open, #indexRetro.open, #indexKlubb.open, #indexLegends.open, #indexPitchers.open {
		display: block !important;
		width: 100%;
		left: 0px;
		
	}
	#listBar #indexNEO.open{
		cursor: pointer;
		display: none;
	}
	#indexBongo p {
		max-width: 90%;
		margin: 0 auto;
		padding: 24px 0 0px 0;
	}
	.map {
		max-width: 100%;
		margin: 0 auto;
		padding: 10px 0 0px 0;
	}
	.back {
		bottom: 26px;
		left: -500px;
		width: 100%;
		background: white;
		width: 1px;

	}
	.back.open {
		width: 100%;
		left: 0;
		

	}
	.social {
		text-align: center;
		color: black;
		padding-top: 32px;
	}
	.social i {
		font-size: 25px !important;
		text-align: center;
		margin: 0 auto;
		padding: 0 4px;
	}
	.social .fa {
		color: black !important;
	}
	.content {
		position: relative;
	}
	
	.content {
		float:left; 
		margin-right: 100px;
		width: 100%;
		box-sizing: border-box;
		margin: 0 auto;
	}
	.colour {
		background: rgba(0,0,0, 0.5);
		width: 100%;
		height: 100%;
		position: absolute;
		top: 0px;
		margin: 0px;
	}
	#listBar {
		max-width: 400px;
		margin: 0 auto;
		text-align: center;
	}
	#listBar.open {
		width: 1px;
		left: -500px;
		height: 1px;
		
		transition-property: all;
	transition-duration: .5s;
	transition-timing-function: cubic-bezier(0, 1, 0.5, 1);
	}
	#listBar:last-child {
		padding-bottom: 24px;
	}
	#listBar li p {
		text-align: left;
	}	
	
	@media (min-width: 375px){
		.header {
			margin-top: -90px;
		}
	}
	@media (min-width: 768px){
		#listBar {
			max-width: 600px;
		}
		.pic {
			max-width: 33%;
		}
		#indexBongo, #indexNEO, #indexAqua, #indexHarrys, #indexID, #indexEnkelt, #indexRetro, #indexMurphys, #indexKlubb, #indexLegends, #indexGladje, #indexPitchers {
			max-width: 650px;
			margin: 0 auto !important;
			padding-left: 150px;
			padding-top: 100px;
		}
		iframe {
			min-height: 250px;
			padding-bottom: 32px;
		}
	}
	@media (min-width: 928px){
		.content {
			margin-left: 400px;
			padding-left: 0;
		}
		#listBar {
			padding-left: 0;
		}
		#indexBongo, #indexNEO, #indexAqua, #indexHarrys, #indexID, #indexEnkelt, #indexRetro, #indexMurphys, #indexKlubb, #indexLegends, #indexGladje, #indexPitchers {
			max-width: 600px;
			padding-left: 50px;
		}
	}
	@media (min-width: 1200px){
		.content {
			margin-left: 500px;
		}
	}
</style>



