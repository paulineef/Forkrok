<?php 
	include ("sidebar.php"); 
	$userID = trim($_GET["userID"]);
?>
<head>
	<title>Förkrök - Food</title>
	<link rel="stylesheet" type="text/css" href="../forkrok.css">
</head>
<body>

<div class="content">

	<div class="placement">

		<h2>Food<i class="fa fa-trophy" aria-hidden="true"></i></h2>
<!-- Echo out the form tag to be able to send the userID value through the URL -->
<!-- We use POST as a method to aviod the user to be able to change the action in the URL -->
		<?php echo("<form action='food.php?userID=$userID' method='POST'>") ?>
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
				echo " <td class='listStyle'><a href='foodBase.php?foodID=$foodID&userID=$userID'> $header</a></td> <td class='category'> $term </td>";
				echo "</tr>";
			}
		?>
	</div>
	
</div>
</body>
<?php include ("../footer.php") ?>
