<?php
session_start();
include('connect_db.php');
$a = $_POST['username'];
$b =md5($_POST['password']);
$c = $_POST['contact'];
$d = $_POST['name'];
$e = $_POST['membership_number'];
$f = $_POST['position'];

// query
$sql = "INSERT INTO user (username,password,contact,name,membership_number,position) VALUES (:a,:b,:c,:d,:e,:f)";
$q = $dbh->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,':f'=>$f));
header("location: staff.php");


?>