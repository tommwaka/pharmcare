<?php
session_start();
include('connect_db.php');
if(isset($_POST['submit'])){
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
function formatMoney($number, $fractional=false) {
    if ($fractional) {
        $number = sprintf('%.2f', $number);
    }
    while (true) {
        $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
        if ($replaced != $number) {
            $number = $replaced;
        } else {
            break;
        }
    }
    return $number;
}
$qry = $dbh->prepare("SELECT * FROM products WHERE chem_name = :chem_name ");
$qry->bindParam(':chem_name', $i);
$qry->execute();
				
$row = $qry->fetch();

if ($qry->rowCount() > 0){
    echo "<script type= 'text/javascript'>alert('Product exist Update the Existing Product');</script>";
	echo "<script type='text/javascript'> document.location = 'products.php'; </script>";
 }else { 

            
 
    // Do Something If name Doesn't Exist
    $sql = "INSERT INTO products (product_code,product_name,expiry_date,price,manufact,grams,qty,o_price,profit,chem_name,date_arrival,qty_sold) VALUES (:a,:b,:c,:d,:e,:l,:f,:g,:h,:i,:j,:k)";
$q = $dbh->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,'l'=>$l,':f'=>$f,':g'=>$g,':h'=>$h,':i'=>$i,':j'=>$j,':k'=>$k));
header("location: products.php");
}
}
?>