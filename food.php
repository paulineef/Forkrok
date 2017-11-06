<?php include ("sidebar.php") ?>
<head>
	<title>Förkrök - Food</title>
</head>

<body>

<div class="content">

	<div class="placement">

		<h2>Food<i class="fa fa-trophy" aria-hidden="true"></i></h2>

		<form action="food.php" method="POST">
			<input class="searchField" type="text" name="searchgame" placeholder="ex. McDonalds"/>
			<div class="searchCat">
			Category :
			<select name="searchcategory" class="dropDown">
				<option value="">All</option>
				<option value="hamburger">Hamburger</option>
				<option value="pasta">Pasta</option>
				<option value="pizza">Pizza</option>
			</select>
		</div>
			<input class="submit" type="submit" name="search" value="Search">
		</form>
	
		<?php
			$searchcategory = "";

			@ $db = new mysqli('localhost', 'user', 'user', 'forkrok');

			if (isset($_POST) && !empty($_POST)) {

				$searchcategory = trim($_POST['searchcategory']);

				$searchcategory = mysqli_real_escape_string($db, $searchcategory);
				$searchcategory = htmlentities($searchcategory);

				$searchcategory = addslashes ($searchcategory);
			}

			if ($db->connect_error) {
						echo "could not connect: " . $db->connect_error;
						printf("<br><a href=index.php>Return to home page </a>");
						exit();
					}

			$query = "SELECT food.foodID, food.header, foodCat.categoryID, foodCat.term FROM food 
			JOIN foodCat ON food.categoryID = foodCat.categoryID";

			if ($searchcategory == true) {
				$query = $query . " where term like '%" . $searchcategory . "%'";
			}

			$stmt = $db->prepare($query);
			$stmt->bind_result($foodID, $header, $catID, $term);
			$stmt->execute();

			echo '<table id="gameTable">';
   			echo '<tr><b><td class="headList">Restaurant</td> <td class="headList" id="cat">Category</td> </b> </tr>';
			while ($stmt->fetch()) {
				echo "<tr>";
				echo " <td class='listStyle'><a href='foodBase.php?foodID=$foodID'> $header</a></td> <td class='category'> $term </td>";
				echo "</tr>";
			}
		?>
	</div>
	
</div>
</body>
<?php include ("footer.php") ?>
