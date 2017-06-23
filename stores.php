<?php require_once('header.php'); ?>

<?php
	if (isset($_GET['cityID'])) {
		$cityID = $_GET['cityID'];
		$query = "SELECT * FROM stores WHERE cityID = :id"; 
		$statement = $db->prepare($query); 
		$statement->bindValue(':id', $cityID);
		$statement->execute(); 
		$stores = $statement->fetchAll(); 
		$statement->closeCursor();

	}	
?>

<?php require_once('footer.php'); ?>