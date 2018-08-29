<?php
	include('connect_db.php');
	$id=$_GET['id'];
	$result = $dbh->prepare("DELETE FROM customer WHERE customer_id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
?>