<?php

$dsn = 'mysql:host=aws.computerstudi.es;dbname=gc200361569';
$userName = 'gc200361569';
$password = 'EgeB_nlnCg';

try {
	$db = new PDO($dsn, $userName, $password);
}
catch(PDOException $e) {
	$message = $e->getMessage();
	echo "An error occurred: " . $message;
}

$query = "SELECT * FROM cities"; 
$statement = $db->prepare($query); 
$statement->execute(); 
$cities = $statement->fetchAll(); 
$statement->closeCursor();

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<title>Canadian Tire</title>

	<style>
	.navbar {
		border-radius: 0;
	}
	</style>
</head>
<body>

<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		<a class="navbar-brand" href="#">Canadian Tire</a>
	</div>

	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav">
			<?php

				foreach ($cities as $city) {
					$cityID = $city['cityID'];
					?>
						<li><a href="stores.php?cityID=<?=$cityID?>"><?=$city['city']?></a>
					<?php
				}

			?>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>

