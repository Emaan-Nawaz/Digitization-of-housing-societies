<?php include_once "header.php"; ?>

<div id="wrapper">

<!----->

<?php if($user_role == 'admin'){ ?>



<?php include_once "admin_sidebar.php"; ?>


<div id="page-wrapper" class="gray-bg dashbard-1">
<div class="content-main">

<div class="content-top">


<div class="col-md-3">
<div class="content-top-1">


<p>All Feedbacks</p>

</div>
</div>



<div class="col-md-9">
<div class="content-top-1">
	



<table class="table table-striped">
<thead>
<tr>
<th class="text-center">No</th>
<th class="text-center">Name</th>
<th class="text-center">Feedback</th>
<th class="text-center">Delete</th>
</tr> 

</thead>

<tbody>


<?php 

$query = "SELECT * FROM feedback";
$result = $db->query($query);

$num_rows = $result->num_rows;

if($num_rows == 0){

echo "<td>Nothing Found.</td>";


}else{

$count = 0;
while($rows = $result->fetch_assoc()){

  $id = $rows['id'];
  $u_id = $rows['user_id'];

	$u_query = "SELECT name from users where id = '{$u_id}' ";
	$result_u = $db->query($u_query);
	$u_row = $result_u->fetch_assoc();
	$u_name = $u_row['name'];


  
  $feed = $rows['feedback'];
 

  $count++;

?>
<tr class="text-center">
  <td><?php echo $count ?></td>
  <td><?php echo $u_name ?></td>
  <td><?php echo $feed; ?></td>
  


<td><a class="btn btn-danger btn-sm" href="allfeedbacks.php?delete=<?php echo $id ?>">X</a></td>

</tr>

<?php



}



}


?>



</tbody>    

</table>


<?php 

if(isset($_GET['delete'])){

$del_id = $_GET['delete'];

$query = "DELETE FROM feedback WHERE id = '{$del_id}' ";
$result = $db->query($query);
if($result){

header("Location: allfeedbacks.php");

}





}




?>





</div>
</div>




<div class="clearfix"> </div>
</div>


<?php }else{header("Location: logout.php"); } ?>





<?php include_once "footer.php"; ?>

