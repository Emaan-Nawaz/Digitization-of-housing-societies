<?php include_once "header.php"; ?>

<div id="wrapper">

<!----->

<?php if($user_role == 'user'){ ?>



<?php include_once "sidebar.php"; ?>


<div id="page-wrapper" class="gray-bg dashbard-1">
<div class="content-main">

<div class="content-top">




<div class="col-md-12">
<div class="content-top-1">
	


<form action="" method="post">
    <div class="form-group">
        <input type="search" name="search" id="search" class="form-control" placeholder="Search Services">
    </div>
</form>


<table class="table table-hover table-striped">
<thead>
<tr>
<th class="text-center">Id</th>
<th class="text-center">Service</th>
<th class="text-center">Price</th>
<th class="text-center">View Details</th>

</tr> 

</thead>

<tbody>


<?php 


if(isset($_POST['search'])){
    $search = $_POST['search'];
    $cat_fetch = "SELECT * FROM categories WHERE cat_name LIKE '%$search%' ";
}else{
    $cat_fetch = "SELECT * FROM categories";
}



$result_fetch = $db->query($cat_fetch);

$num_rows = $result_fetch->num_rows;
if($num_rows == 0){

echo "<td>No Service Found.</td>";
}else{

$count = 0;
while($rows = $result_fetch->fetch_assoc()){

$id 		= $rows['cat_id'];
$name 		= $rows['cat_name'];
$price 		= $rows['cat_price'];



$count++;


?>
<tr class="text-center">
<td><?php echo $count ?></td>
<td><?php echo $name ?></td>
<td><?php echo $price ?></td>
<td width="1">
    <a href="uservice_view.php?service_id=<?php echo $rows['cat_id']; ?>" class="btn btn-primary">Click to View</a>
</td>


</tr>

<?php



}



}


?>



</tbody>    

</table>








</div>
</div>




<div class="clearfix"> </div>
</div>


<?php }else{header("Location: logout.php"); } ?>





<?php include_once "footer.php"; ?>

