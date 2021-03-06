<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="forkrok.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
		<script src="https://use.fontawesome.com/6f2a9fca0c.js"></script>
		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script type="text/javascript" charset="utf-8">
			//run the function when the document object model has been loaded, when the page load is finished
			$(document).ready(function() {
				//when clicking on the nav-icon = the hamburger menu, start the function 
				$("#nav-icon3").click(function(e){
					//prevent default values and functions to appear
					e.preventDefault();
					//give the header ul the class open during the function
					$("#header").toggleClass('open');
					//give the hamburgermenu the class open during the function
					$("#nav-icon3").toggleClass('open');
				});
			});
		</script>
	</head>
	<header>
		<!--navigation hamburger menu-->
		<div id="nav-icon3">
	  		<span></span>
	 		<span></span>
	  		<span></span>
	  		<span></span>
		</div>
		<ul id="header" class="ulli">
			<div class="imgCont">
				<!-- Logo icon -->
				<a href="index.php"><img id="logoSide" src="img/logo_icon.svg"/><a/>
				<a href="index.php"><img id="forkrok" src="img/logo.svg"/><a/>
			</div>
			<!-- Create the objects in the menu -->
			<li id="first">
				<a href=" games.php"><i class="fa fa-trophy" aria-hidden="true"></i>Games</a>
			</li>			
			<li>
				<a href="drinks.php"><i class="fa fa-glass" aria-hidden="true"></i>Drinks</a>
			</li>			
			<li>
				<a href="food.php"><i class="fa fa-cutlery" aria-hidden="true"></i>Food</a>
			</li>				
			<li>
				<a href="bars.php"><i class="fa fa-beer" aria-hidden="true"></i>Bars &amp; Clubs</a>
			</li>
			<li>
				<a href="favourites.php"><i class="fa fa-star" aria-hidden="true"></i>Favourites</a>
			</li>
		</ul>		
	</header>