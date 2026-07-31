<?php include_once "header.php"; ?>

<div id="wrapper">

<!----->

<?php if($user_role == 'admin'){ ?>



<?php include_once "admin_sidebar.php"; ?>


<div id="page-wrapper" class="gray-bg dashbard-1">
<div class="content-main">

<div class="content-top">


<div class="col-md-4">
<div class="content-top-1">

<form method="post" action="">



<div class="form-group">

<select class="form-control" required name="cat_id">
<option value="" disabled selected>Choose Service</option>

<?php 

$cate_fetch = "SELECT * FROM categories";
$result_cate = $db->query($cate_fetch);
if($result_cate){

while($rows = $result_cate->fetch_assoc()){

$cat_id 	= $rows['cat_id'];
$cat_title 	= $rows['cat_name'];

?>

<option value="<?php echo $cat_id ?>"><?php echo $cat_title ?></option>


<?php

}
}


?>




</select>

</div>



<div class="form-group">
<input type="text" name="name" class="form-control" placeholder="Your Name" required>
</div>




<div class="form-group">
<input type="email" name="email" class="form-control" placeholder="Your Email"  required>
</div>



<div class="form-group">
<input type="password" name="password"  class="form-control" placeholder="Your Password" required>
</div>						


<div class="form-group">
<input type="number" name="contact" class="form-control" placeholder="Your Mobile" required>
</div>


<div class="form-group">
<input type="text" name="cnic" class="form-control" placeholder="Your Cnic" required>
</div>



<div class="form-group">

<input class="btn btn-primary" type="submit" name="register" value="Add Worker">

</div>
</form>


<?php 



if(isset($_POST['register'])){



$email    = $_POST['email'];
$check    = "SELECT email FROM users WHERE email = '{$email}'";
$result   = $db->query($check);
$rows     = $result->num_rows;


if($rows > 0){

echo "<p class='alert text-center alert-info'>This Email already Taken.</p>";

}else{




$cat_id   = $_POST['cat_id'];
$name     = $_POST['name'];
$password = $_POST['password'];
$phone    = $_POST['contact'];
$cnic     = $_POST['cnic'];




$query = "INSERT INTO users (name,email,password,contact,cnic, service_id, role, status) VALUES ('{$name}','{$email}','{$password}','{$phone}','{$cnic}', '$cat_id', 'worker', 1)";


$exe = $db->query($query);

if($exe){

echo "<p class='alert text-center alert-success'>Worker Account has been created.</p>";

}









} 



}



?>


</div>
</div>



<div class="col-md-8 ">
<div class="content-top-1">






<table class="table table-striped table-responsive">
<thead>
<tr>
<th class="text-center">No</th>
<th class="text-center">Name</th>
<th class="text-center">Email</th>
<th class="text-center">Phone</th>
<th class="text-center">cnic</th>


<th class="text-center">Edit</th>
<th class="text-center">Delete</th>


</tr>
</thead>

<tbody>
<?php

$usersfetch = "SELECT * FROM users WHERE role = 'worker' AND status = 1 ORDER BY id DESC";
$execute 	= $db->query($usersfetch);
$numrows 	= $execute->num_rows;
if($numrows == 0){

	echo '<tr><td>No Record.</td></tr>';

}else{
$counter = 0;
while($row = $execute->fetch_assoc()){


$id 		= $row['id'];
$name 		= $row['name'];
$email 		= $row['email'];
$phone 		= $row['contact'];
$cnic 		= $row['cnic'];

$counter 	= $counter + 1;
?>

<tr class="text-center">

<td><?php echo $counter ?></td>
<td><?php echo $name ?></td>
<td><?php echo $email ?></td>
<td><?php echo $phone ?></td>
<td><?php echo $cnic ?></td>



<td><a  class="btn btn-warning btn-sm" href="member_edit.php?edit=<?php echo $id ?>">Edit</a></td>

<td><a  class="btn btn-danger btn-sm" href="add_workers.php?del=<?php echo $id ?>">Delete</a></td>


</tr>


<?php
}
}

?>


</tbody>
</table>




<?php 

if(isset($_GET['del'])){

$del_id = $_GET['del'];

$del_cat = "DELETE FROM users WHERE id = '{$del_id}' ";
$result_del = $db->query($del_cat);
if($result_del){

header("Location: add_workers.php");

}else{

die($db->error);

}





}


?>


</div>
</div>




<div class="clearfix"> </div>
</div>


<?php }else{header("Location: logout.php"); } ?>





<?php include_once "footer.php"; ?>

