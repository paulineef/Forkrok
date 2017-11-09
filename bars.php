<head>
	<title>Förkrök - Bars &amp; Clubs</title>
	<link rel="stylesheet" type="text/css" href="forkrok.css">
	<script src="https://use.fontawesome.com/6f2a9fca0c.js"></script>
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>

</head>
<body>
<?php include ("sidebar.php") ?>

<div class="content">

	<div class="placement">

		<h2>Bars &amp; Clubs<i class="fa fa-beer" aria-hidden="true"></i></h2>
</div>
	<?php 
	# Open the database
@ $db = new mysqli('localhost', 'user', 'user', 'forkrok');



	//IF the database can't connect
if ($db->connect_error) {
    echo "could not connect: " . $db->connect_error;
    printf("<br><a href=index.php>Return to home page </a>");
    exit();
}
	$query = "SELECT barID, header, picture FROM bars";
	
	# Here's the query using bound result parameters
    // echo "we are now using bound result parameters <br/>";
    $stmt = $db->prepare($query);
	//takes the result of the search and create variables from it
    $stmt->bind_result($barID, $header, $picture);
    $stmt->execute();
?>
   <?php
    echo '<ul id="listBar">';
	$test = 1;
    while ($stmt->fetch()) {
	echo "<a href='barBase.php?barID=$barID'<li id='$test' class='pic'><img src=\"img/" .
		$picture . "\"> <h3 class='header'> $header </h3></li></a>";
		$test ++;
    }
	echo "</ul>";

	?>
	
</div>

<?php include ("footer.php") ?>