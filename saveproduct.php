<?php
session_start();
include('connect_db.php');
$a = $_POST['code'];
$b = $_POST['name'];
$c = $_POST['exdate'];
$d = $_POST['price'];
$e = $_POST['manufact'];
$l = $_POST['grams'];
$f = $_POST['qty'];
$g = $_POST['o_price'];
$h = $_POST['profit'];
$i = $_POST['gen'];
$j = $_POST['date_arrival'];
$k = $_POST['qty_sold'];
$l = $_POST['grams'];
// query
$sql = "INSERT INTO products (product_code,product_name,expiry_date,price,manufact,grams,qty,o_price,profit,chem_name,date_arrival,qty_sold) VALUES (:a,:b,:c,:d,:e,:l,:f,:g,:h,:i,:j,:k)";
$q = $dbh->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,'l'=>$l,':f'=>$f,':g'=>$g,':h'=>$h,':i'=>$i,':j'=>$j,':k'=>$k));
header("location: products.php");


?>