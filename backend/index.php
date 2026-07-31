<?php include_once "header.php"; ?>

<div id="wrapper">



<?php if($user_role == 'admin'){ ?>



<?php include_once "admin_sidebar.php"; ?>


<div id="page-wrapper" class="gray-bg dashbard-1">
<div class="content-main">

<div class="content-top">


<div class="col-md-3">
<div class="content-top-1">


<p>Your Info</p>

</div>
</div>



<div class="col-md-9">
<div class="content-top-1">




<table class="table table-bordered">
	
<?php 

$profile = "SELECT * from users WHERE id = '{$user_id}' ";
$result  = $db->query($profile);
$row 	 = $result->fetch_assoc();

$name 	 = $row['name'];
$email   = $row['email'];
$contact = $row['contact'];
$cnic 	 = $row['cnic'];
$role    = $row['role'];



?>
	<tr>
		<th>Name</th>
		<td><?php echo ucfirst($name); ?></td>
	</tr>

<tr>
		<th>Email</th>
		<td><?php echo $email; ?></td>

</tr>


<tr>
		<th>Mobile</th>
		<td><?php echo $contact; ?></td>
</tr>


<tr>
		<th>cnic</th>
		<td><?php echo $cnic; ?></td>
</tr>


<tr>

		<th>Role</th>
		<td><?php echo ucfirst($role); ?></td>

</tr>




</table>




</div>
</div>




<div class="clearfix"> </div>
</div>


<?php }elseif($user_role == 'user'){ ?>





<?php include_once "sidebar.php"; ?>


<div id="page-wrapper" class="gray-bg dashbard-1">
<div class="content-main">

<div class="content-top">


<div class="col-md-4">
<div class="content-top-1">


<?php 

$month = date('M Y');
$check = $db->query("SELECT * FROM months WHERE month = '$month' AND user_id = '$user_id' ");
if($check->num_rows == 0){

	?>



<form action="" method="post">
	<p>Purchase to Avail all the Services in this Month:</p><br>
	<form action="" method="post">
		<div class="form-group">
			<input type="text" name="bank" id="bank" class="form-control" placeholder="Enter Bank Name" required>
		</div>
		<div class="form-group">
			<input type="text" name="account" id="account" class="form-control" placeholder="Enter Bank Account" required>
		</div>
		<div class="form-group">
			<input type="submit" value="Submit" class="btn btn-primary" name="submit">
		</div>
	</form>
</form>
<?php 

if(isset($_POST['submit'])){

	$insert = $db->query("INSERT INTO months (user_id, month) VALUES ('$user_id', '$month')");
	if($insert){
		header("Location: index.php");
	}else{
		echo $db->error;
	}

}

?>




	<?php

}else{
	echo "<p class='alert alert-success' style='margin-bottom: 0px;'>You have Purchased this month of Subscription <strong>Thanks</strong></p>";
}

?>




</div>
</div>



<div class="col-md-8 ">
<div class="content-top-1">


<table class="table table-bordered">
	
<?php 

$profile = "SELECT * from users WHERE id = '{$user_id}' ";
$result  = $db->query($profile);
$row 	 = $result->fetch_assoc();

$name 	 = $row['name'];
$email   = $row['email'];
$contact = $row['contact'];
$cnic 	 = $row['cnic'];
$role    = $row['role'];



?>
	<tr>
		<th>Name</th>
		<td><?php echo ucfirst($name); ?></td>
	</tr>

<tr>
		<th>Email</th>
		<td><?php echo $email; ?></td>

</tr>


<tr>
		<th>Mobile</th>
		<td><?php echo $contact; ?></td>
</tr>


<tr>
		<th>cnic</th>
		<td><?php echo $cnic; ?></td>
</tr>


<tr>

		<th>Role</th>
		<td><?php echo ucfirst($role); ?></td>

</tr>




</table>


</div>
</div>




<div class="clearfix"> </div>
</div>



<?php }elseif($user_role == 'worker'){ ?>





<?php include_once "worker_sidebar.php"; ?>


<div id="page-wrapper" class="gray-bg dashbard-1">
<div class="content-main">

<div class="content-top">


<div class="col-md-4">
<div class="content-top-1">

Worker Profile


</div>
</div>



<div class="col-md-8 ">
<div class="content-top-1">


<table class="table table-bordered">
	
<?php 

$profile = "SELECT * from users WHERE id = '{$user_id}' ";
$result  = $db->query($profile);
$row 	 = $result->fetch_assoc();

$name 	 = $row['name'];
$email   = $row['email'];
$contact = $row['contact'];
$cnic 	 = $row['cnic'];
$role    = $row['role'];



?>
	<tr>
		<th>Name</th>
		<td><?php echo ucfirst($name); ?></td>
	</tr>

<tr>
		<th>Email</th>
		<td><?php echo $email; ?></td>

</tr>


<tr>
		<th>Mobile</th>
		<td><?php echo $contact; ?></td>
</tr>


<tr>
		<th>cnic</th>
		<td><?php echo $cnic; ?></td>
</tr>


<tr>

		<th>Role</th>
		<td><?php echo ucfirst($role); ?></td>

</tr>




</table>


</div>
</div>




<div class="clearfix"> </div>
</div>



<?php }else{header("Location: logout.php"); } ?>





<?php include_once "footer.php"; ?>

