<?php 
	include ("sidebar.php");
	//Gets the ID for variable
	$userID = ($_GET["userID"]); 
?>
<head>
	<title>Förkrök - Games</title>
</head>
<body>
<div class="content">
	<div class="placement">

		<h2>Games<i class="fa fa-trophy" aria-hidden="true"></i></h2>	
		<!-- Echos out the start of the form with the right userID -->
		<?php echo("<form action='games.php?userID=$userID'' method='POST'>") ?>
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
		
	
		<?php
			//Clarifies variables
			$searchgame = "";
			$searchcategory = "";


			//Open database
			@ $db = new mysqli('localhost', 'user', 'user', 'forkrok');

			//if the submit button is pushed, and the form is active and not empty
			if (isset($_POST) && !empty($_POST)) {

				//trim will erase whitespaces in the searchfield, put the users search-values into the variable
				$searchgame = trim($_POST['searchgame']);
				$searchcategory = trim($_POST['searchcategory']);
				//makes the fields SQL Injection-proof, or '1=1
				$searchgame = mysqli_real_escape_string($db, $searchgame);
				//htmlentities, won't accept html-code into field
				$searchgame = htmlentities($searchgame);
				
				//same as above
				$searchcategory = mysqli_real_escape_string($db, $searchcategory);
				$searchcategory = htmlentities($searchcategory);

				//adds slashes before charaters that need to be escaped in the fields like '', "", \
				$searchgame = addslashes ($searchgame);
				$searchcategory = addslashes ($searchcategory);
			}
			//If connection to the db can not be estabished a error message is displayed and
			if ($db->connect_error) {
						echo "could not connect: " . $db->connect_error;
						printf("<br><a href=index.php>Return to home page </a>");
						exit();
					}

			//Select the right tables and their contents to be able to display the contents, also joins with the categories		

			$query = "SELECT games.gameID, games.name, gameCat.categoryID, gameCat.term FROM games 
			JOIN gameCat ON games.categoryID = gameCat.categoryID";

			//if the field searchgame is active and the field searchcategory is empty, echo out the search-value
			//group by, so we only echo out one game id and not the amount of game id connected to each category
			if ($searchgame && !$searchcategory) {
				$query = $query . " where name like '%" . $searchgame . "%'";
			}
			if (!$searchgame && $searchcategory) {
				$query = $query . " where term like '%" . $searchcategory . "%'";
			}
			if ($searchgame && $searchcategory) { 
				$query = $query . " where name like '%" . $searchgame . "%' and term like '%" . $searchcategory . "%'";
			}

			//acess the database and prepare for the query to be used in the stmt-variable 
			$stmt = $db->prepare($query);
			//takes the result from the query and put in the variables below
			$stmt->bind_result($gameID, $name, $catID, $term);
			//execute the function in the stmt
			$stmt->execute();
			

			//echos out the information so it can be accessed
			echo '<table id="gameTable">';
   			echo '<tr><b><td class="headList">Name of game</td> <td class="headList" id="cat">Category</td> </b> </tr>';
   			//fetches the prepared content and adds it to the varibles in a loop so it displays all of the rows in the table. 
			while ($stmt->fetch()) {
				echo "<tr>";
				echo " <td class='listStyle'><a href='gameBase.php?gameID=$gameID'> $name</a></td> <td class='category'> $term </td>";
				echo "</tr>";
			}
		?>
	</div>
</div>
	
</div>
</body>
<?php include ("../footer.php") ?>
