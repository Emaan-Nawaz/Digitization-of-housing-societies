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



<form class="w3-container" method="post">

<div class="form-group">

<input class="form-control" type="text" name="search" id="search" placeholder="Search User" autocomplete="off" required>
</div>

<button style="display:none" type="submit" name="submit"></button>


</form>




<?php

if(!isset($_POST['submit'])){

?>




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

$usersfetch = "SELECT * FROM users WHERE role != 'admin' AND status = 1 ORDER BY id DESC";
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

<td><a  class="btn btn-danger btn-sm" href="members.php?del=<?php echo $id ?>">Delete</a></td>


</tr>


<?php
}
}

?>


</tbody>
</table>


<?php }elseif(isset($_POST['submit'])){

$search = $_POST['search'];
$search = $db->real_escape_string($search);



$query = "SELECT * FROM users WHERE (email = '{$search}' OR name LIKE '%$search%' OR cnic = '{$search}') AND role != 'admin' AND status = 1 ";

$result 		= $db->query($query);
$num_rows 		= $result->num_rows;

if($num_rows <= 0){

echo "<tr><td>No Record.</td></tr>";

}else{ ?>


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








<td><a  class="btn btn-warning btn-sm" href="member_edit.php?edit=<?php echo $id ?>">Edit</a></td>


<td><a  class="btn btn-danger btn-sm" href="members.php?del=<?php echo $id ?>">Delete</a></td>


</tr>


<?php
}


?>


</tbody>
</table>





<?php } // else of line 167



}


?>



<?php

if(isset($_GET['del'])){

$del_id = $_GET['del'];
$del_query = "DELETE FROM users WHERE id = '{$del_id}'";
$result_del = $db->query($del_query);

if($result_del){

header("Location: members.php");

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

