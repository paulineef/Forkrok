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
			<label class="headForm"> Category: </label> 
			<select name="searchcategory" class="dropDown">
				<option value="">All</option>
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

			echo '<table id="gameTable" cellpadding="6">';
   			echo '<tr><b><td class="headList">Name of game</td> <td class="headList">Category</td> </b> </tr>';
			while ($stmt->fetch()) {
				echo "<tr>";
				echo " <td class='listStyle'><a href='games/gameBase.php'> $name</a></td> <td class='category'> $term </td>";
				echo "</tr>";
			}
		?>
	</div>
	
</div>
</body>
<?php include ("footer.php") ?>
