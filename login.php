<?php
session_start();
$servername="localhost";
$username="root";
$password="tomkin254";
$dbname="sales";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if(isset($_POST['submit'])){
$username=$_POST['username'];
$password=md5($_POST['password']);
$position=$_POST['position'];
$query="SELECT * FROM user WHERE username='".$username."' and password='".$password."' and position='".$position."'";
$result = mysqli_query($conn, $query);
if($result){
while($row = mysqli_fetch_array($result)){
echo '<script type="text/javascript">alert("you are logined successfully and you are logined as '. $row['position'] . '")</script>';
}
$_SESSION['alogin']=$_POST['username'];
if($position=="pharmacist"){
?>
<script type="text/javascript">
 
window.location.href = "customer.php";
</script>
<?php
 
}else{
    if($position=="cashier"){
?>
<script type="text/javascript">
 
window.location.href = "cash_sales.php";
</script>
<?php
}
}
}else{
echo 'no result';
}
}
?>