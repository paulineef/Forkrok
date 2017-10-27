<?php include ("sidebar.php") ?>
<head>
	<title>Förkrök - Games</title>
</head>

<body>

<div class="content">

	<div class="placement">

		<h2>Games<i class="fa fa-trophy" aria-hidden="true"></i></h2>

		<form action="games.php" method="POST">
			<input class="searchField" type="text" name="searchgame" placeholder="ex. Kings Cup"/>
			<select name="searchcategory">
				<option value="">None</option>
				<option value="card">Card</option>
				<option value="classic">Classic</option>
				<option value="new">New</option>
			</select>
			<input class="submit" type="submit" name="search" value="Search">
		</form>
	
		<?php
			$searchgame = "";
			$searchcategory = "";

			@ $db = new mysqli('localhost', 'root', '', 'forkrok');

			if (isset($_POST) && !empty($_POST)) {

				$searchgame = trim($_POST['searchgame']);
				$searchcategory = trim($_POST['searchcategory']);

				$searchgame = mysqli_real_escape_string($db, $searchgame);
				$searchgame = htmlentities($searchgame);
				
				$searchcategory = mysqli_real_escape_string($db, $searchcategory);
				$searchcategory = htmlentities($searchcategory);

				$searchgame = addslashes ($searchgame);
				$searchcategory = addslashes ($searchcategory);
			}

				   /* if ($db->connect_error) {
						echo "could not connect: " . $db->connect_error;
						printf("<br><a href=index.php>Return to home page </a>");
						exit();
					}*/

			$query = "SELECT games.gameID, games.name, gameCat.categoryID, gameCat.term FROM games 
			JOIN gameCat ON games.categoryID = gameCat.categoryID";

			if ($searchgame && !$searchcategory) {
				$query = $query . " where name like '%" . $searchgame . "%'";
			}
			if (!$searchgame && $searchcategory) {
				$query = $query . " where term like '%" . $searchcategory . "%'";
			}
			if ($searchgame && $searchcategory) { 
				$query = $query . " where name like '%" . $searchgame . "%' and term like '%" . $searchcategory . "%'";
			}

			$stmt = $db->prepare($query);
			$stmt->bind_result($gameID, $name, $catID, $term);
			$stmt->execute();

			echo '<table bgcolor="#fff" cellpadding="6">';
			while ($stmt->fetch()) {
				echo "<tr>";
				echo " <td class='game'> $name </td> <td class='category'> $term </td>";
				echo "</tr>";
			}
		?>
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
		.category {
			font-family: lato, sans-serif; 
			text-align: center;
			font-weight: 300;
			font-size: 12px;
			margin: 10px;
			padding: 4px;
		}
	</style>
</body>
<?php include ("footer.php") ?>
