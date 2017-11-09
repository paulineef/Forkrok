<!DOCTYPE html>
<html>
	<head>	
		<link rel="stylesheet" type="text/css" href="../forkrok.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
		<script src="https://use.fontawesome.com/6f2a9fca0c.js"></script>
		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script type="text/javascript" charset="utf-8">
			
			$(document).ready(function() {
					
			$("#nav-icon3").click(function(e){
				e.preventDefault();	
				$("#header").toggleClass('open');
				$("#nav-icon3").toggleClass('open');
				});
			});
		</script>
	</head>
	<?php $userID = trim($_GET["userID"]); ?>
	<header>
		
		<!--navigation menu-->
		<div id="nav-icon3">
	  		<span></span>
	 		<span></span>
	  		<span></span>
	  		<span></span>
		</div>
		
		<ul id="header" class="ulli">

			<div class="imgCont">
				<a href="index.php"><img id="logoSide" src="../img/logo_icon.svg"/><a/>
				<a href="index.php"><img id="forkrok" src="../img/logo.svg"/><a/>
			</div>

				<li id="first">
					<?php echo("<a href=games.php?userID=$userID><i class='fa fa-trophy' aria-hidden='true'></i>Games</a>")?>
				</li>
				
				<li>
					<?php echo("<a href=drinks.php?userID=$userID><i class='fa fa-glass' aria-hidden='true'></i>Drinks</a>")?>
				</li>
				
				<li>
					<?php echo("<a href=food.php?userID=$userID><i class='fa fa-cutlery' aria-hidden='true'></i>Food</a>")?>
				</li>
					
				<li>
					<?php echo("<a href=bars.php?userID=$userID><i class='fa fa-beer' aria-hidden='true'></i>Bars &amp; Clubs</a>")?>
				</li>

				<li>
					<?php echo("<a href=favourites.php?userID=$userID><i class='fa fa-star' aria-hidden='true'></i>Favourites</a>")?>
				</li>
					<li>
					<?php echo("<a href=logout.php><i class='fa fa-lock' aria-hidden='true'></i>Log out</a>")?>
				</li>

		</ul>
			
	</header>