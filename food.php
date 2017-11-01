<?php include ("sidebar.php") ?>
<head>
	<title>Förkrök - Food</title>
</head>

<body>

<div class="content">
	<div class="placement">
		<h2>Food<i class="fa fa-trophy" aria-hidden="true"></i></h2>
		
		<form action="food.php" method="POST">
			<input class="searchField" type="text" name="searchfood" placeholder="ex. Kings Cup"/>
			<label class="headForm"> Category: </label> 
			<select name="searchCategory" class="dropDown">
				<option value="">All</option>
				<option value="hamburger">Hambuger</option>
				<option value="pasta">Pasta</option>
				<option value="pizza">Pizza</option>
			</select>
			<input class="submit" type="submit" name="search" value="Search">
		</form>
		
		<?php

			$searchfood = "";
			$searchCategory = "";

			@ $db = new mysqli('localhost', 'user', 'user', 'forkrok');

			if (isset($_POST) && !empty($_POST)) {

				$searchfood = trim($_POST['searchfood']);
				$searchCategory = trim($_POST['searchCategory']);

				$searchfood = mysqli_real_escape_string($db, $searchfood);
				$searchfood = htmlentities($searchfood);
				
				$searchCategory = mysqli_real_escape_string($db, $searchCategory);
				$searchCategory = htmlentities($searchCategory);

				$searchfood = addslashes ($searchfood);
				$searchCategory = addslashes ($searchCategory);
			}

			if ($db->connect_error) {
						echo "could not connect: " . $db->connect_error;
						printf("<br><a href=index.php>Return to home page </a>");
						exit();
			}

			$query = "SELECT food.foodID, food.name, foodCat.categoryID, foodCat.term FROM food 
			JOIN foodCat ON food.categoryID = foodCat.categoryID";
			
			if ($searchfood && !$searchCategory) {
				$query = $query . " where name like '%" . $searchfood . "%'";
			}
			if (!$searchfood && $searchCategory) {
				$query = $query . " where term like '%" . $searchCategory . "%'";
			}
			if ($searchfood && $searchCategory) { 
				$query = $query . " where name like '%" . $searchfood . "%' and term like '%" . $searchCategory . "%'";
			}

			$stmt = $db->prepare($query);
			$stmt->bind_result($foodID, $nameF, $foodcatID, $termF);
			$stmt->execute();

			echo '<table id="gameTable" cellpadding="6">';
   			echo '<tr><b><td class="headList">Name of game</td> <td class="headList">Category</td> </b> </tr>';
			while ($stmt->fetch()) {
				echo "<tr>";
				echo " <td class='listStyle'> $nameF </a></td> <td class='category'> $termF </td>";
				echo "</tr>";
			}
		?>
	</div>
	
</div>
</body>
<?php include ("footer.php") ?>
