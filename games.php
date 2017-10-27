<?php include ("sidebar.php") ?>
<head>
	<title>Förkrök - Games</title>
</head>

<body>

<div class="content">

	<div class="placement">

		<h2>Games<i class="fa fa-trophy" aria-hidden="true"></i></h2>

		<form>
			<input class="searchField" type="text" name="" placeholder="ex. Kings Cup"/>
			<input class="submit" type="submit" name="search" value="Search">
		</form>

		<div class="games">
			<ul>
				<li>
					<div class="game">
						Kings Cup
					</div>
				</li>
				<li>
					<div class="game">
						Fuzzy Duck
					</div>
				</li>
				<li>
					<div class="game">
						Never Have I Ever
					</div>
				</li>
			</ul>
		</div>
	</div>
	
</div>

	<style type="text/css">

		.games {
			margin-top: 20px;
		}

		.games ul {
			float: left;
			margin: 0px;
			margin-left: -10px; 
			padding: 0px; 
		}

		.games li {
			list-style-type: none; 
			margin: 0px; 
			padding: 0px; 
			cursor: pointer;
		}

		.games li:hover {
			background: #D34E24;
			border-radius: 8px; 
			color: #fff;
		}

		.game {
			font-family: lato, sans-serif; 
			text-align: center;
			font-weight: 300;
			font-size: 12px;
			border: 1px solid #D34E24;
			border-radius: 10px;
			margin: 10px;
			padding: 4px; 
		}

	</style>
</body>
<?php include ("footer.php") ?>
