<?php include_once "header.php"; ?>

<div id="wrapper">

<!----->

<?php if($user_role == 'user'){ ?>



<?php include_once "sidebar.php"; ?>


<div id="page-wrapper" class="gray-bg dashbard-1">
<div class="content-main">

<div class="content-top">


<div class="col-md-4">
<div class="content-top-1">


<p class="alert">Update Your Info</p>

</div>
</div>



<div class="col-md-8 ">
<div class="content-top-1">





<?php



$query  = "SELECT * FROM users WHERE id = '{$user_id}'";

$result = $db->query($query);
$row 	= $result->fetch_assoc();

$name 		= $row['name'];
$email 		= $row['email'];
$password 	= $row['password'];
$phone 		= $row['contact'];
$cnic 		= $row['cnic'];


?>




<form class="form-horizontal" method="post" enctype="multipart/form-data">

<div class="form-group">
<input type="text" name="username" placeholder="Your Name" value="<?php if(isset($name)){echo $name; } ?>" class="form-first-name form-control" id="username" autofocus>
</div>


<div class="form-group">
<input type="email" name="email" placeholder="Your Email" class="form-email form-control" value="<?php if(isset($email)){echo $email; } ?>" id="form-email" >
</div>


<div class="form-group">
<input type="password" name="password" placeholder="Your Password" class="form-email form-control" value="<?php if(isset($password)){echo $password; } ?>" id="form-email" >
</div>

<div class="form-group">
<input type="text" name="phone" placeholder="Your Number" class="form-number form-control" value="<?php if(isset($phone)){echo $phone; } ?>" id="form-email" >
</div>


<div class="form-group">
<input type="text" name="cnic" placeholder="Your cnic" class="form-number form-control" value="<?php if(isset($cnic)){echo $cnic; } ?>" id="form-email" >
</div>





<div class="form-group">
<button type="submit" name="update" class="btn btn-info">Update</button>
</div>
</form>



<?php

if(isset($_POST['update'])){

$username 	= $_POST['username'];
$email 		= $_POST['email'];
$password 	= $_POST['password'];
$phone 		= $_POST['phone'];
$cnic 		= $_POST['cnic'];







$updatequery = "UPDATE users SET name = \"$username\", email = \"$email\", password = \"$password\", contact = \"$phone\", cnic = \"$cnic\" WHERE id = \"$user_id\"  ";

$result = $db->query($updatequery);
if($result){
echo "<p class='alert alert-warning'>Profile Info is Updated</p>";
}


}




?>








</div>
</div>




<div class="clearfix"> </div>
</div>


<?php }else{header("Location: logout.php"); } ?>





<?php include_once "footer.php"; ?>

