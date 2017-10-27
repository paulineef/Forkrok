<!DOCTYPE html>
<html>
<head>
	<title>Förkrök - Games</title>
	<link rel="stylesheet" type="text/css" href="forkrok.css">
</head>
<body>
<?php include ("sidebar.php") ?>

<div class="content">

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

<?php include ("footer.php") ?>
<style type="text/css">

	.content {
		float:left;
		margin-left: 400px;
		margin-top: 70px; 
		margin-right: 100px;
	}

	.content div {
		max-width: 600px;
	}

	.submit {
	border: solid;
    border-color: #ddd;
    background-color: #fff;
    border-width: 1px;
    border-radius: 1px;
    padding: 5px 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 12px;
    font-weight: 300;
    font-family: lato, sans-serif; 
	}

	.searchField {
	margin: 0 0;
	padding: 5px 10px;
	font-size: 12px;
	font-family: lato, sans-serif; 
	text-align: center;
	font-weight: 300;
	}

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

	.game {

	}

</style>

</body>
</html>
