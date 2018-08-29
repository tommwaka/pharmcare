<?php
session_start();
include('connect_db.php');
if(isset($_POST['submit']))
{
$uname=$_POST['username'];
$password=md5($_POST['password']);
$sql ="SELECT username,password FROM user WHERE username=:uname and password=:password and position='admin'";
$query= $dbh -> prepare($sql);
$query-> bindParam(':uname', $uname, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);

$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
$_SESSION['alogin']=$_POST['username'];
echo "<script type='text/javascript'> document.location = 'admin.php'; </script>";
} else{

    echo "<script>alert('Invalid Details');</script>";
    echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
    

}

}

?>