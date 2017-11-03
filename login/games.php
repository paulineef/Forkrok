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
			<div class="searchCat">
			Category :
			<select name="searchcategory" class="dropDown">
				<option value="">All</option>
				<option value="card">Card</option>
				<option value="classic">Classic</option>
				<option value="new">New</option>
			</select>
			</div>
			<input class="submit" type="submit" name="search" value="Search">
		</form>

		<style type="text/css">

		@media (min-width: 928px) {
		.content {
			width: 100%;
		}
	}

		.searchCat {
			font-family: lato; 
			font-weight: 300; 
		}

		.gameBox {
			width: 30%;
			float: left; 
			background: red; 
			margin-right: 10px;
			margin-bottom: 10px; 
			text-align: center;
		}

		.gameBox h3 {
			margin-top: 10px;
			margin-bottom: 2px; 
		}

		.gameBox h6 {
			margin-top: 0px;
			margin-bottom: 10px;
		}

		</style>
	
		<?php
			$searchgame = "";
			$searchcategory = "";

			@ $db = new mysqli('localhost', 'user', 'user', 'forkrok');


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

			if ($db->connect_error) {
						echo "could not connect: " . $db->connect_error;
						printf("<br><a href=index.php>Return to home page </a>");
						exit();
					}

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
			

			echo '<table id="gameTable">';
   			echo '<tr><b><td class="headList">Name of game</td> <td class="headList" id="cat">Category</td> </b> </tr>';
			while ($stmt->fetch()) {
				echo "<tr>";
				echo " <td class='listStyle'><a href='gameBase.php'> $name</a></td> <td class='category'> $term </td>";
				echo "</tr>";
			}
		?>
	</div>
	
</div>
</body>
<?php include ("footer.php") ?>