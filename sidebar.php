<!doctype html>
<html>
	<head>
		<!--<?php include('config.php')?>-->
		<script src="https://use.fontawesome.com/6f2a9fca0c.js"></script>
		<link rel="stylesheet" type="text/css" href="forkrok.css">
	</head>
	<header>
		<ul>
		<a href="index.php"><img id="logoSide" src="img/logo_icon.svg"/>
		<img id="forkrok" src="img/logo.svg"/><a/>
			<li id="first">
				<a href=" games.php"><i class="fa fa-trophy" aria-hidden="true"></i>Games</a>
			</li>
			<li>
				<a href="drinks.php"><i class="fa fa-glass" aria-hidden="true"></i>Drinks</a>
			</li>
			<li>
				<a href="food.php"><i class="fa fa-cutlery" aria-hidden="true"></i>Food</a>
			</li>
			<li><a href="bars.php"><i class="fa fa-beer" aria-hidden="true"></i>Bars & Clubs</a>
			<li>
				<a href="favourites.php"><i class="fa fa-star" aria-hidden="true"></i>Favourites</a>
			</li>
		</ul>
		
	</header>
	<body>
		
	</body>
</html>


<style>
	ul {
		padding: 0px;
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
		text-transform: uppercase; 
		cursor: pointer:
		
	}
	#first {
		padding-top: 38px;
	}
	ul li a {
		text-decoration: none;
		color: #FDCD01;
		font-weight: 700;
		font-size: 19px;
	}

	ul li a:hover {
		color: #efc100;
	}
	#logoSide {
		max-width: 100%;
	}
	#forkrok {
		max-width: 100%;
		padding-top: 30px;
		margin: 0 auto;
		box-sizing: border-box;
	}
	i {
		padding-right: 9px;
	}
	header {
		max-width: 320px;
		z-index: 9999;
		position: fixed;
		left: 0;
		padding-left: 56px;
		padding-top: 56px;
		background: white;
		padding-right: 45px;
		height: 100vh;
		border-right: solid 1px #f3f3f3; 
		float: left; 
	}
	body {
		margin: 0;
	}
</style>