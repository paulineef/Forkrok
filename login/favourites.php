<?php include ("sidebar.php") ?>
<head>
	<title>Förkrök - Favourites</title>
</head>
<body>
<?php 
		$userID = trim($_GET["userID"]);
	
		@ $db = new mysqli('localhost', 'user', 'user', 'forkrok');

	$query = "SELECT users.userID, drinks.drinkID, drinks.name, drinks.picture FROM users
	JOIN favourites ON users.userID = favourites.userID 
	JOIN drinks ON drinks.drinkID = favourites.drinkID
	WHERE favourites.userID = $userID";

 	$stmt = $db->prepare($query);
    $stmt->bind_result($userID, $drinkID, $name, $picture);
    $stmt->execute();
	$favArr = array();

	while($stmt->fetch()) {
		array_push($favArr, $name);
		 echo "<img src=\"../uploadedfiles/" . $picture . "\">"; 
	}
echo("$userID");
?>
	 
<div class="content">

	<div class="placement">

		<h2>Favourites<i class="fa fa-star" aria-hidden="true"></i></h2>
	</div>	
	<ul>
		<?php foreach($favArr as $var) { //same as [i];
								echo "<li>" . $var . "</li>";
							}
		
						?>
		
	</ul>
</div>

</body>
<?php include ("footer.php")?>



