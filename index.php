
<?php
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
 
window.location.href = "pharmacist.php";
</script>
<?php
 
}else{
?>
<script type="text/javascript">
 
window.location.href = "sales.php";
</script>
<?php
}
 
}else{
echo 'no result';
}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>
Pharmcare
</title>
    <link rel="shortcut icon" href="admin/images/pos.jpg">

  <link href="admin/css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="admin/css/DT_bootstrap.css">
  
  <link rel="stylesheet" href="admin/css/font-awesome.min.css">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="admin/css/bootstrap-responsive.css" rel="stylesheet">

<link href="style.css" media="screen" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="container-fluid">
      <div class="row-fluid">
		<div class="span4">
		</div>
	
</div>
<div id="login">

<form action=" " method="post">

			<font style=" font:bold 44px 'Aleo'; text-shadow:1px 1px 15px #000; color:#fff;"><center>Pharmcare</center></font><br>
		
<div class="input-prepend">
		<span style="height:30px; width:25px;" class="add-on"><i class="icon-user icon-2x"></i></span><input style="height:30px;" type="text" name="username" Placeholder="Username" required/><br>
</div>
<div class="input-prepend">
	<span style="height:30px; width:25px;" class="add-on"><i class="icon-lock icon-2x"></i></span><input type="password" style="height:30px;" name="password" Placeholder="Password" required/><br>
		</div>
    <div class="input-prepend">
    <span style="height:30px; width:25px;" class="add-on"><i class="icon-user icon-2x"></i></span>
<select name="position" style="height:40px;" >
<option value="pharmacist" >pharmacist</option>
<option value="cashier">cashier</option>
 
</select>


    </div>
		<div class="qwe">
		 <button class="btn btn-large btn-primary btn-block pull-right"  type="submit" value="login" name="submit" ><i class="icon-signin icon-large"></i> Login</button>
</div>
		 </form>
</div>
</div>
</div>
</div>
</body>
</html>

