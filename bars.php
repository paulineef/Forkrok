<head>
	<title>Förkrök - Bars &amp; Clubs</title>
	<link rel="stylesheet" type="text/css" href="forkrok.css">
</head>

<?php //iclude sidebar
include ("sidebar.php") ?>

<div class="content">
	<div class="placement">
		<h2>Bars &amp; Clubs<i class="fa fa-beer" aria-hidden="true"></i></h2>
</div>
	
	<?php 
	// Open the database with the login we chose
	@ $db = new mysqli('localhost', 'user', 'user', 'forkrok');

	//IF the database can't connect
	if ($db->connect_error) {
		echo "could not connect: " . $db->connect_error;
		//get the option to return to home page
		printf("<br><a href=index.php>Return to home page </a>");
		exit();
	}
	$query = "SELECT barID, header, picture FROM bars";
	
    //using the query to bind the result to parameters
    $stmt = $db->prepare($query);
	
	//takes the result of the search and put it into variables
    $stmt->bind_result($barID, $header, $picture);
    $stmt->execute();

	//make a list out of the objects in the database
    echo '<ul id="listBar">';
	//as long as there are objects, echo out the header and picture of them
    while ($stmt->fetch()) {
	//include the clicked barID in the url
	echo "<a href='barBase.php?barID=$barID'<li class='pic'><img src=\"img/" .
		$picture . "\"> <h3 class='header'> $header </h3></li></a>";
    }
	echo "</ul>";

	?>
</div>

<?php include ("footer.php") ?>