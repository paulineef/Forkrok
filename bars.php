<!DOCTYPE html>
<html>
<head>
	<title>Förkrök - Bars & Clubs</title>
	<link rel="stylesheet" type="text/css" href="forkrok.css">
</head>
<body>
<?php include ("sidebar.php") ?>

<div class="content">

	<h2>Bars & Clubs<i class="fa fa-beer" aria-hidden="true"></i></h2>
	
	<ul id="majs">
		<a href="bongo.php"><li>
			<img src="img/bar.png"/>
			<h3>Bongo Bar</h3>
			<p>majsmajs</p>
			</li></a>
		<li>
			<img src="img/cooperfields.png"/>
			<h3>MAJS</h3>
			<p>majsmajs</p>
		</li>
		<li>
			<img src="img/nightclub.png"/>
			<h3>MAJS</h3>
			<p>majsmajs</p>
		</li>
		<li>
			<img src="img/restaurant.png"/>
			<h3>MAJS</h3>
			<p>majsmajs</p>
		</li>
		<li>
			<img src="img/sportsbar.png"/>
			<h3>MAJS</h3>
			<p>majsmajs</p>
		</li>
		<li>
			<img src="img/shooters.png"/>
			<h3>MAJS</h3>
			<p>majsmajs</p>
		</li>
		
	</ul>
	
	
	
	
	
<!--	<ul id="listBars">
		<li>
			<h4>
				Bongo Bar
			</h4>
			<p>
				Small and nice place for both a chill night out and more energized with mixed hip-hop and reggae music. Entrance for 60:- and you get the first glass for free. 
			</p>
		</li>
		<li>
			<h4>
				Cooperfield's
			</h4>
			<p>
				With an industrial atmosphere you can enjoy great drinks and a chill night out. 
			</p>
		</li>
		<li>
			<h4>
				Glädje
			</h4>
			<p>
				At Glädje you can enjoy a chill night out with both food, drinks and nice people.  
			</p>
		</li>
		<li>
			<h4>
				Harrys
			</h4>
			<p>
				Enjoy a good dinner or a bottle of beer with friends.
			</p>
		</li>
		<li>
			<h4>
				Klubb & Co.
			</h4>
			<p>
				A newly opened night club with house dancefloor and bar. 
			</p>
		</li>
		<li>
			<h4>
				O'Learys
			</h4>
			<p>
				Enjoy a hamburger dinner at this sportbar while watching your favourite team play.
			</p>
		</li>
		<li>
			<h4>
				Pipes
			</h4>
			<p>
				Enjoy a beer with a couple of friends for a chill night out.
			</p>
		</li>
		<li>
			<h4>
				Pitchers food and sportbar
			</h4>
			<p>
				Enjoy a nice dinner at this sportbar while watching your favourite team play.
			</p>
		</li>
		<li>
			<h4>
				Shooters
			</h4>
			<p>
				The best place to play pool with your friends while enjoing a nice glass of wine or bottle of beer.
			</p>
		</li>
		<li>
			<h4>
				Sofiehof kitchen and bar
			</h4>
			<p>
				Enjoy a nice dinner or something from the bar with a couple of friends.
			</p>
		</li>
	</ul>-->
	
	
	
</div>

<?php include ("footer.php") ?>
<style type="text/css">

	.content {
		float:left; 
		margin-right: 100px;
		max-width: 100% !important;
		margin: 0 auto;
	}

	.content div {
		max-width: 600px;
	}
	#majs {
		padding-top: 32px;
	}
	#majs li {
		width: 50%;
		float: left;
		position: relative;
		text-align: center;
		padding: 0;
		box-sizing: border-box;
		padding: 12px 0;
	}
	.colour {
		background: rgba(0,0,0, 0.5);
		width: 100%;
		height: 100%;
		position: absolute;
		top: 0px;
		margin: 0px;
	}
	#majs li img {
		max-width: 100%;
		position: relative;
	}
	#majs h3 {
		font-size: 26pt;
	}
	li h3, li p {
		position: absolute;
		bottom: 40px;
		left: 10px;
		width: 100%;
		text-align: center !important;
		color: white;
	}
	#majs {
		max-width: 80%;
		margin: 0 auto;
	}
	#listBars {
		max-width: 400px;
		margin: 0 auto;
		text-align: center;
	}
	li p {
		text-align: left;
	}
	@media (max-width: 928px){
		
	}
	
</style>


</body>
</html>



