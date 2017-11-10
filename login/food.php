<?php 
	include ("sidebar.php"); 
	//get the value userID from the URL, trim it = reduce shit and put it into a new variable
	$userID = $_GET["userID"];
?><head>
	<title>Förkrök - Food</title>
	<link rel="stylesheet" type="text/css" href="../forkrok.css">
</head>
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
			//create an empty variable 'searchcategory'
			$searchcategory = "";
			//connect to the database with the server = localhost, username = user, password = user and database name = forkork and put it into a variable 'db'
			@ $db = new mysqli('localhost', 'user', 'user', 'forkrok');
			
			//IF the form is filled and not empty
			if (isset($_POST) && !empty($_POST)) {
				//take what the user filled into the form field with the name searchcategory and put it into the variable 'searchcategory'	
				$searchcategory = trim($_POST['searchcategory']);
	
				//makes the typed value to a string, "" '' will therefore don't work if filled in the form field
				//FUNCTION = connect to the database via the variable and access the value in the variable 'searchcategory'
				//put the value filled in the form field into variables
				$searchcategory = mysqli_real_escape_string($db, $searchcategory);
				
				//make it impossible to write html in the form field
				$searchcategory = htmlentities($searchcategory);
				
				//add slashes before characters to aviod hacking 
				$searchcategory = addslashes ($searchcategory);
			}
			//IF the database could not connect, print out a link to move back to home page
			if ($db->connect_error) {
						echo "could not connect: " . $db->connect_error;
						printf("<br><a href=index.php>Return to home page </a>");
						exit();
					}
			//SELECT foodID, header from food AND categoryID, term from foocCat 
			//JOIN foodcat with food in the columns categoryID
			$query = "SELECT food.foodID, food.header, foodCat.categoryID, foodCat.term FROM food 
			JOIN foodCat ON food.categoryID = foodCat.categoryID";
			//IF the user has filled out the form field with the name searchcategory
			if ($searchcategory == true) {
				//Put the value from 'searchcategory', the thing that the user filled in, in the column term in the query
				$query = $query . " where term like '%" . $searchcategory . "%'";
			}
			//connect to database and prepare the query to be used in the variable stmt
			$stmt = $db->prepare($query);
			//put the result from the query into these variables below
			$stmt->bind_result($foodID, $header, $catID, $term);
			//execute the FUNCTION inside stmt
			$stmt->execute();

			//echo out a table with the headlines restaurant and category
			echo '<table id="gameTable">';
   			echo '<tr><b><td class="headList">Restaurant</td> <td class="headList" id="cat">Category</td> </b> </tr>';
			//loop through the statement and collect the values within it. 
			while ($stmt->fetch()) {
				echo "<tr>";
				//echo out the values within header and term in a list
				echo " <td class='listStyle'><a href='foodBase.php?foodID=$foodID'> $header</a></td> <td class='category'> $term </td>";
				echo "</tr>";
			}
		?>
	</div>
</div>
<?php include ("../footer.php") ?>
