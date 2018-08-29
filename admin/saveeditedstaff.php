<?php 
session_start();
include('connect_db.php');
$id = $_POST['memi'];
$a = $_POST['username'];
$b = md5($_POST['password']);
$c = $_POST['contact'];
$d = $_POST['name'];
$e = $_POST['membership_number'];
$f = $_POST['position'];
//query

$sql= "UPDATE user SET username=?, password=?, contact=?, name=?, membership_number=?, position=? WHERE staff_id=? ";
$query =$dbh ->prepare($sql);
$query->execute(array($a,$b,$c,$d,$e,$f,$id));
header ("location: staff.php");
?>