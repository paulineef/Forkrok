<!doctype html>
<html>
	<head>
		<?php include('config.php')?>
		<script src="https://use.fontawesome.com/6f2a9fca0c.js"></script>
	</head>
	<header>
		<ul>
		<img id="logoSide" src="logo.svg"/>
		<img id="forkrok" src="forkrok.svg"/>
			<li id="first">
				<a href=" games.php"><i class="fa fa-trophy" aria-hidden="true"></i>GAMES</a>
			</li>
			<li>
				<a href="drinks.php"><i class="fa fa-glass" aria-hidden="true"></i>DRINKS</a>
			</li>
			<li>
				<a href="food.php"><i class="fa fa-cutlery" aria-hidden="true"></i>FOOD</a>
			</li>
			<li>
				<a href="favourite.php"><i class="fa fa-star" aria-hidden="true"></i>FAVOURITES</a>
			</li>
		</ul>
		
	</header>
	<body>
		
	</body>
</html>


<style>
	ul {
		padding-top: 29px;
		box-sizing: border-box;
		margin-top: 0;
	}
	ul li {
		list-style-type: none;
		padding-top: 38px;
		color: #F7E431;
		font-family: "lato";
		padding-left: 29px;
		box-sizing: border-box;
		font-weight: 900;
		
	}
	#first {
		padding-top: 38px;
	}
	ul li a {
		text-decoration: none;
		color: #F7E431;
		font-weight: 700;
		font-size: 19px;
	}
	#logoSide {
		max-width: 100%;
	}
	#forkrok {
		max-width: 100%;
		padding-top: 24px;
		margin: 0 auto;
		box-sizing: border-box;
	}
	i {
		padding-right: 9px;
	}
	header {
		max-width: 230px;
		z-index: 9999999;
		position: fixed;
		left: 0;
		margin-left: 38px;
		margin-top: 38px;
		background: white;
		padding-right: 35px;
	}
</style>