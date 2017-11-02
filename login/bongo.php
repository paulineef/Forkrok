<!DOCTYPE html>
<html>
<head>
	<title>Förkrök - Complete Pre-Party Tool</title>
	<link rel="stylesheet" type="text/css" href="forkrok.css">
</head>
<body>
<?php include ("sidebar.php") ?>

<div class="content" id="s">

	<div class="index">
			<h2>Bongo Bar</h2>
		<p>
			Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
		</p>
		<div class="map">
			<iframe frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJqf_BLehtWkYRn8yFbMIzcqk&key=AIzaSyCmCQXDN3el8D7bvNcoj7-5hnGf9C3gzw0" allowfullscreen></iframe>
		</div>
		<div class="back">
			<a href="bars.php"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
		</div>
	</div>
</div>

<?php include ("footer.php") ?>
<style type="text/css">
	iframe {
		width: 100%;
		height: 450px;
		margin: 0 auto;
	}
	.map {
		max-width: 80%;
		margin: 0 auto;
	}
	.back i {
		color: black;
		position: fixed;
		bottom: 50px;
		left: 20px;
		font-size: 25pt !important;
	}
	.index p {
		max-width: 90%;
		margin: 0 auto;
		padding-bottom: 32px;
	}
	@media (min-width: 928px){
		.back i{
			display: none !important;
		}
	}
</style>

</body>
</html>
