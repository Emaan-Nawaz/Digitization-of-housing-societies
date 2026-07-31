<?php include_once "header.php"; ?>

<div id="wrapper">

<!----->

<?php if($user_role == 'admin'){ ?>



<?php include_once "admin_sidebar.php"; ?>


<div id="page-wrapper" class="gray-bg dashbard-1">
<div class="content-main">

<div class="content-top">






<div class="col-md-12">
<div class="content-top-1">


<p>All Users</p>
<br>




<table class="table table-striped table-responsive">
<thead>
<tr>
<th class="text-center">No</th>
<th class="text-center">Name</th>
<th class="text-center">Email</th>
<th class="text-center">Contact</th>
<th class="text-center">cnic</th>




<th class="text-center">Edit</th>
<th class="text-center">Delete</th>

</tr>
</thead>

<tbody>





<?php

$counter = 0;
$result = $db->query("SELECT * FROM users WHERE role = 'user' AND status = 0 ");
if($result->num_rows){
    

while($row = $result->fetch_assoc()){


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








<td><a  class="btn btn-warning btn-sm" href="members_requests.php?approve=<?php echo $id ?>">Approve</a></td>


<td><a  class="btn btn-danger btn-sm" href="members_requests.php?del=<?php echo $id ?>">Delete</a></td>


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
$del_query = "DELETE FROM users WHERE id = '{$del_id}'";
$result_del = $db->query($del_query);

if($result_del){

header("Location: members_requests.php");

}else{
	die($db->error);
}


}




if(isset($_GET['approve'])){

$approve_id = $_GET['approve'];
$approve_query = "UPDATE users SET status = 1 WHERE id = '{$approve_id}'";
$result_approve = $db->query($approve_query);

if($result_approve){

header("Location: members_requests.php");

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

