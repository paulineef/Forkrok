<?php include ("sidebar.php") ?>
<head>
	<title>Förkrök - Games</title>
	<link rel="stylesheet" type="text/css" href="forkrok.css">
</head>
<body>

<div class="content">

	<h2>Drinks<i class="fa fa-glass" aria-hidden="true"></i></h2>

	<!-- Searchfield -->
	<form action ="drinks.php" method="POST" id="drinksearch">
		<input type="text" name="searchdrink" placeholder="Search by drink" class="searchField">
		<input type="text" name="searchingredients" placeholder="or by ingrediens" class="searchField">
		<input type="submit" value="Submit" id="drinksubmit">
	</form>

	<?php
	$searchdrink = "";
	$searchingredients = "";
	
	@ $db = new mysqli('localhost', 'root', '', 'forkrok');

	if (isset($_POST) && !empty($_POST)) {
		
		$searchdrink = trim($_POST['searchdrink']);
		$searchingredients = trim ($_POST['searchingredients']);
		
		$searchdrink = mysqli_real_escape_string($db, $searchdrink);
		$searchdrink = htmlentities($searchdrink);

		$searchingredients = mysqli_real_escape_string($db, $searchingredients);
		$searchingredients = htmlentities($searchingredients);

		$searchdrink = addslashes ($searchdrink);
		$searchingredients = addslashes($searchingredients);
	}

           /* if ($db->connect_error) {
                echo "could not connect: " . $db->connect_error;
                printf("<br><a href=index.php>Return to home page </a>");
                exit();
            }*/

	$query = "SELECT drinks.drinkID, drinks.name FROM drinks
	JOIN drinks_ingredients ON drinks.drinkID = drinks_ingredients.drinkID
	JOIN ingredients ON ingredients.ingredientID = drinks_ingredients.ingredientID";
	//$query = "SELECT drinkID, name FROM drinks";

	
	if ($searchdrink && !$searchingredients) {
		$query = $query . " where name like '%" . $searchdrink . "%'";
	}
	if (!$searchdrink && $searchingredients) {
        $query = $query . " where name like '%" . $searchingredients . "%'";
    }
    if ($searchdrink && $searchingredients) { 
        $query = $query . " where name like '%" . $searchdrink . "%' and name like '%" . $searchingredients . "%'";
    }

    $stmt = $db->prepare($query);
    $stmt->bind_result($drinkID, $name);
    $stmt->execute();

    echo '<table bgcolor="#fff" cellpadding="6">';
    echo '<tr><td>drinkID</td> <b> <td>name</td></b> </tr>';
	while ($stmt->fetch()) {
        echo "<tr>";
        echo "<td> $drinkID </td><td> $name </td>";
        echo "</tr>";
    }
?>





<!-- Gallery -->

	<div id="gallerycontent">

		<?php
		//https://stackoverflow.com/questions/11903289/pull-all-images-from-a-specified-directory-and-then-display-them

		//the code for creating a simple gallery is inspired by the link above

		$files = glob("uploadedfiles/*.*");

		for ($i=0; $i<count($files); $i++) {
			$image = $files[$i];
			echo '<img src="'.$image .'" alt="Random image" class="imagebox" />'."<br /><br />";
		}
		?>	
	</div>
	
</div>

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

	.searchField {
	margin: 0 0;
	padding: 5px 10px;
	font-size: 12px;
	font-family: lato, sans-serif; 
	text-align: center;
	font-weight: 300;
}


	#drinksubmit {
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

	#gallerycontent {
	    column-count: 3;
	    column-gap: 0;
	    line-height: 0;
	}

	.imagebox {
		width: 100%;
	}

	h3 {
		font-family: lato, sans-serif;
		font-size: 15pt;
		font-weight: 300;
	}

</style>
</body>

<?php include ("footer.php") ?>