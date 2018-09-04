<?php
session_start();
include('connect_db.php');
$a = $_POST['name'];
$b = $_POST['address'];
$c = $_POST['contact'];
$d = $_POST['cperson'];
$e = $_POST['note'];
// query
$sql = "INSERT INTO supliers (manufact_name,manufact_address,manufact_contact,contact_person,note) VALUES (:a,:b,:c,:d,:e)";
$q = $dbh->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e));
header("location: supplier.php");


?>