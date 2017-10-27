<head>
	<title>Förkrök - Bars &amp; Clubs</title>
	<link rel="stylesheet" type="text/css" href="forkrok.css">
	<script src="https://use.fontawesome.com/6f2a9fca0c.js"></script>
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {	
				
			$("#1").click(function(){
				event.preventDefault();	
				$("#indexBongo").toggleClass('open');
			});
				$(".back").click(function(){
				event.preventDefault();	
				$("#indexBongo").toggleClass('open');
			});
				$("#10").click(function(){
				event.preventDefault();	
				$("#indexBongo").toggleClass('open');
			});
				$(".backNEO").click(function(){
				event.preventDefault();	
				$("#indexNEO").toggleClass('open');
			});
				
			});
		</script>
</head>
<body>
<?php include ("sidebar.php") ?>

<div class="content">

	<h2>Bars &amp; Clubs<i class="fa fa-beer" aria-hidden="true"></i></h2>
	
	<div id="indexBongo">
			<h2>Bongo Bar</h2>
		
		<div class="map">
			<iframe frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJqf_BLehtWkYRn8yFbMIzcqk&key=AIzaSyCmCQXDN3el8D7bvNcoj7-5hnGf9C3gzw0" allowfullscreen></iframe>
		</div>
		<p>
			Small and nice place for both a chill night out and more energized with mixed hip-hop and reggae music. Entrance for 60:- and you get the first glass for free.<br><br>
		</p>
		<div class="social">
			<a href="https://www.facebook.com/bongojkpg/"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
			<a href="http://bongobar.se/jonkoping/"><i class="fa fa-internet-explorer" aria-hidden="true"></i></a>
		</div>
		<div class="back">
			<i class="fa fa-arrow-left" aria-hidden="true"></i>
		</div>
	</div>
	<div id="indexNEO">
			<h2>N.E.O</h2>
		
		<div class="map">
			<iframe frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJqf_BLehtWkYRn8yFbMIzcqk&key=AIzaSyCmCQXDN3el8D7bvNcoj7-5hnGf9C3gzw0" allowfullscreen></iframe>
		</div>
		<p>
			Small and nice place for both a chill night out and more energized with mixed hip-hop and reggae music. Entrance for 60:- and you get the first glass for free.<br><br>
		</p>
		<div class="social">
			<a href="https://www.facebook.com/bongojkpg/"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
			<a href="http://bongobar.se/jonkoping/"><i class="fa fa-internet-explorer" aria-hidden="true"></i></a>
		</div>
		<div class="backNEO">
			<i class="fa fa-arrow-left" aria-hidden="true"></i>
		</div>
	</div>
	
	<?php 
	# Open the database
@ $db = new mysqli('localhost', 'root', '', 'bars');

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

    echo '<ul id="listBar">';
	$test = 1;
    while ($stmt->fetch()) {

		
		echo "<li class='pic'><img id='$test' src=\"img/" . $picture . "\"> <h3 class='header'> $header </li></li>";
		$test ++;
    }
	echo "</ul>";

	?>
	
</div>



<?php include ("footer.php") ?>
<style type="text/css">	
	#listBar {
		bottom: 50px;
		font-family: 'lato';
		width: 100%;
		padding: 0;
		text-align: center;
		overflow: hidden;
	}
	.pic {
		float: left;
		max-width: 50%;
	}
	#listBar li {
		padding: 0;
	}
	.pic img {
		padding: 6px;
	}
	.header {
		color: white;
		z-index: 9999;
		font-size: 25px;
		font-size: 21pt;
		margin: 0;
		margin-top: -60px;
		padding-bottom: 40px;
	}
	iframe {
		width: 100%;
		height: 450px;
		margin: 0 auto;
	}
	#indexBongo, #indexNEO {
		position: absolute;
		margin: 0 auto;
		width: 1px;
		z-index: 999;
		background: white;
		padding: 12px;
		height: 100vh;
		padding: 0;
		top: 0px;
		left: -500px;
		padding-top: 32px;
		padding: 48px 18px;
		box-sizing: border-box;
		overflow: hidden;
		
		transition-property: all;
	transition-duration: .5s;
	transition-timing-function: cubic-bezier(0, 1, 0.5, 1);
	}
	#indexBongo.open, #indexNEO.open {
		display: block !important;
		width: 100%;
		left: 0px;
		
	}
	#listBar #indexNEO.open{
		display: none;
	}
	#indexBongo p {
		max-width: 75%;
		margin: 0 auto;
		padding: 24px 0;
	}
	.map {
		max-width: 80%;
		margin: 0 auto;
		padding: 88px 0 66px 0;
	}
	.back {
		position: fixed;
		bottom: 50px;
		left: 20px;
	}
	.back i {
		color: black;
		font-size: 25pt !important;
		padding: 0;
		padding: 18px;
	}
	
	.social {
		text-align: center;
		color: black;
		padding-top: 48px;
	}
	.social i {
		font-size: 80px !important;
		text-align: center;
		margin: 0 auto;
		padding: 0;
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
		max-width: 100% !important;
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
	#listBar li p {
		text-align: left;
	}
	@media (min-width: 928px){
		.back i{
			display: none !important;
		}
	}
	
	
	@-webkit-keyframes slide {
    100% { left: 0; }
}

	@keyframes slide {
    0% { left: -1000; }
}
@keyframes slide {
    100% { left: 0; }
}
	@-webkit-keyframes backSlide {
    100% { left: -1000; }
}

	@keyframes backSlide {
    0% { left: 0; }
}
@keyframes backSlide {
    100% { left: -1000; }
}

	
</style>



