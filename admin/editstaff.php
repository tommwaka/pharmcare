<?php
	include('connect_db.php');
	$id=$_GET['id'];
	$result = $dbh->prepare("SELECT * FROM user WHERE staff_id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="saveeditedstaff.php" method="post">
<center><h4><i class="icon-edit icon-large"></i> Edit Staff</h4></center>
<hr>
<div id="ac">
<input type="hidden" name="memi" value="<?php echo $id; ?>" />
<span>Username : </span><input type="text" style="width:265px; height:30px;" name="username" value="<?php echo $row['username']; ?>"/><br>
<span>Password : </span><input type="password" style="width:265px; height:30px;" name="password" value="<?php echo $row['password']; ?>" /><br>
<span>Contact : </span><input type="number" style="width:265px; height:30px;" name="contact" value="<?php echo $row['contact']; ?>"  /><br>
<span>Full Name : </span><input type="text" style="height:30px; width:265px;" name="name" value="<?php echo $row['name']; ?>" /><br>
<span>Staff Number: </span><input type="text" style="width:265px; height:30px;" name="membership_number" value="<?php echo $row['membership_number']; ?>"/><br>
<span>Position: </span><input type="text" style="width:265px; height:30px;" name="position" value="<?php echo $row['position']; ?>" /><br>
<div style="float:right; margin-right:10px;">

<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save Changes</button>
</div>
</div>
</form>
<?php
}
?>