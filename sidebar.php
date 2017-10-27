<!doctype html>
<html>
	<head>
		<?php include('config.php')?>
		<script src="https://use.fontawesome.com/6f2a9fca0c.js"></script>
		<link rel="stylesheet" type="text/css" href="forkrok.css">
		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {	
				
			$("#nav-icon3").click(function(){
				event.preventDefault();	
				$("#header").toggleClass('open');
				$("#nav-icon3").toggleClass('open');
			});
			});
		</script>
	</head>
	<header>
	
	
	<div id="nav-icon3">
  				<span></span>
 				<span></span>
  				<span></span>
  				<span></span>
			</div>
	
	
		<ul id="header" class="ulli">
			<div id="imgCont">
				<a href="index.php"><img id="logoSide" src="img/logo_icon.svg"/><a/>
				<a href="index.php"><img id="forkrok" src="img/logo.svg"/><a/>
			</div>
				<li id="first">
					<a href=" games.php"><i class="fa fa-trophy" aria-hidden="true"></i>Games</a>
				</li>
				<li>
					<a href="drinks.php"><i class="fa fa-glass" aria-hidden="true"></i>Drinks</a>
				</li>
				<li>
					<a href="food.php"><i class="fa fa-cutlery" aria-hidden="true"></i>Food</a>
				</li>
				<li><a href="bars.php"><i class="fa fa-beer" aria-hidden="true"></i>Bars &amp; Clubs</a>
				<li>
					<a href="favourites.php"><i class="fa fa-star" aria-hidden="true"></i>Favourites</a>
				</li>
		</ul>
		
	</header>
	<body>
		
	</body>
</html>

<style>
	
	#header.open {
		display: block;
	}
	#header {
		display: none;
	}
	#nav-icon3{
		overflow: hidden;
  		position: absolute;
  		right: 25px;
  		top: 20px;
  		-webkit-transform: rotate(0deg);
  		-moz-transform: rotate(0deg);
  		-o-transform: rotate(0deg);
  		transform: rotate(0deg);
  		-webkit-transition: .5s ease-in-out;
  		-moz-transition: .5s ease-in-out;
 		-o-transition: .5s ease-in-out;
  		transition: .5s ease-in-out;
		padding: 0px;
		width: 60px;
		height: 60px;
		
	}
	#nav-icon3 span{	
  		display: block;
  		position: absolute;
 		height: 6px;
  		width: 55px;
  		background: #d34e24;
  		opacity: 1;
  		left: 0;
  		-webkit-transform: rotate(0deg);
  		-moz-transform: rotate(0deg);
  		-o-transform: rotate(0deg);
  		transform: rotate(0deg);
  		-webkit-transition: .25s ease-in-out;
 		-moz-transition: .25s ease-in-out;
  		-o-transition: .25s ease-in-out;
  		transition: .25s ease-in-out;
	}
	#nav-icon3 span:nth-child(1) {
  		top: 1px;
	}
	#nav-icon3 span:nth-child(2),#nav-icon3 span:nth-child(3) {
  		top: 16px;
	}
	#nav-icon3 span:nth-child(4) {
  		top: 32px;
	}
	#nav-icon3.open span:nth-child(1) {
  		top: 18px;
  		width: 0%;
  		left: 50%;
	}
	#nav-icon3.open span:nth-child(2) {
  		-webkit-transform: rotate(45deg);
  		-moz-transform: rotate(45deg);
  		-o-transform: rotate(45deg);
  		transform: rotate(45deg);
	}
	#nav-icon3.open span:nth-child(3) {
  		-webkit-transform: rotate(-45deg);
  		-moz-transform: rotate(-45deg);
  		-o-transform: rotate(-45deg);
  		transform: rotate(-45deg);
	}
	#nav-icon3.open span:nth-child(4) {
  		top: 18px;
  		width: 0%;
  		left: 50%;
	}	
	#forkrok {
		padding-top: 22px;
	}
	i {
		padding-right: 20px;
	}
		header {
		width: 100%;
		z-index: 9999;
		position: fixed;
		left: 0;
	}
	#imgCont {
		width: 100%;
		text-align: center;
		overflow: hidden;
		width: 200px;
		margin: 0 auto;
		padding-top: 156px;
	}
	#imgCont img {
		max-width: 200px;
	}
	.ulli {
		text-align: center;
		background: white;
		height: 100vh;
		padding: 0;
		margin: 0;
	}
	.ulli li {
		list-style-type: none;
		color: #F7E431;
		font-family: "lato";
		box-sizing: border-box;
		padding: 36px 0;	
	}
	#header ul li:first-child {
		margin-top: 32px;
	}
	#first {
		padding-top: 100px;
	}
	.ulli li a {
		text-decoration: none;
		color: #FDCD01;
		font-weight: 500;
		font-size: 25pt;
	}
	
	
	
	/** ------------------------ MEDIA ------------------------- **/
	

	@media (min-width: 928px) {
		#imgCont {
			padding-top: 24px;
		}
		#nav-icon3 {
			display: none;
		}
		#header {
			display: block;
		}
		.ulli {
			padding: 0px;
			box-sizing: border-box;
			margin-top: 0;
		}
		#first {
			margin-top: 10px;
		}
		.ulli li {
			padding-top: 10px;
			color: #F7E431;
			font-family: "lato";
			box-sizing: border-box;
			font-weight: 900;
			text-transform: uppercase; 		
		}
		#first {
			padding-top: 38px;
		}
		.ulli li a {
			color: #FDCD01;
			font-weight: 700;
			font-size: 19px;
		}

		.ulli li a:hover {
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
			background: white;
			padding-right: 50px;
			height: 100vh;
			border-right: solid 1px #f3f3f3; 
			float: left; 
			padding: 1%;
		}
		header img {
			display: block;
		}
}

</style>