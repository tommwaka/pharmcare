<?php
// configuration
include('connect_db.php');

// new data
$id = $_POST['memi'];
$a = $_POST['name'];
$b = $_POST['address'];
$c = $_POST['contact'];
$d = $_POST['cperson'];
$e = $_POST['note'];
// query
$sql = "UPDATE supliers 
        SET manufact_name=?, manufact_address=?, manufact_contact=?, contact_person=?, note=?
		WHERE manufact_id=?";
$q = $dbh->prepare($sql);
$q->execute(array($a,$b,$c,$d,$e,$id));
header("location: supplier.php");

?>