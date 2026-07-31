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

<form method="post" action="" enctype="multipart/form-data">


<div class="form-group">

<input type="text" class="form-control" id="cat-title" placeholder="Service Name" name="cat_name" required>

</div>



<div class="form-group">

<input type="number" class="form-control" id="cat-price" placeholder="Service Price" name="cat_price" required>

</div>








<div class="form-group">

<input class="btn btn-primary" type="submit" name="submit" value="Add Service">

</div>
</form>




<?php 


if(isset($_POST['submit'])){

$cat_name = $_POST['cat_name'];
$cat_name = $db->real_escape_string($cat_name);


$cat_price = $_POST['cat_price'];
$cat_price = $db->real_escape_string($cat_price);



$cat_insert = "INSERT INTO categories (cat_name, cat_price) VALUES ('{$cat_name}', '{$cat_price}') ";
$result_cat = $db->query($cat_insert);

if(!$result_cat){

die($db->error);

}else{
header("Location: admin_cat.php");
}



}



?>




</div>
</div>



<div class="col-md-8 ">
<div class="content-top-1">






<table class="table table-bordered table-hover">
<thead>
<tr>
<th class="text-center">Id</th>
<th class="text-center">Service</th>
<th class="text-center">Price</th>

<th class="text-center">Edit</th>
<th class="text-center">Delete</th>
</tr> 

</thead>

<tbody>


<?php 

$cat_fetch = "SELECT * FROM categories";
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


<td><a class="btn btn-warning" href="admin_cat.php?edit=<?php echo $id ?>">Edit</a></td>
<td><a class="btn btn-danger" href="admin_cat.php?delete=<?php echo $id ?>">Delete</a></td>

</tr>

<?php



}



}


?>



</tbody>    

</table>



<?php 


if(isset($_GET['edit'])){
$edit_id = $_GET['edit'];
$edit_query = "SELECT * FROM categories WHERE cat_id = '{$edit_id}' ";
$result_edit = $db->query($edit_query);
$row = $result_edit->fetch_assoc();

$edit_title = $row['cat_name'];
$edit_price = $row['cat_price'];



?>





<br>
<form method="post" action="" enctype="multipart/form-data">


<div class="form-group">

<input type="text" class="form-control" id="cat-title" value="<?php if(isset($edit_title)){echo $edit_title; } ?>" name="cat_name" required>

</div>





<div class="form-group">

<input type="number" class="form-control" id="cat-price" value="<?php if(isset($edit_price)){echo $edit_price; } ?>" name="cat_price" required>

</div>






<div class="form-group">

<input class="btn btn-danger btn-block" type="submit" name="update" value="Update Service">

</div>
</form>


<?php 

if(isset($_POST['update'])){

$e_name = $_POST['cat_name'];
$e_price = $_POST['cat_price'];




$update_query = "UPDATE categories SET cat_name = \"$e_name\", cat_price = \"$e_price\" WHERE cat_id = '{$edit_id}' ";

$result_update = $db->query($update_query);
if($result_update){

header("Location: admin_cat.php");

}else{

die($db->error);
}


}



?>







<?php

}


?>




<?php 

if(isset($_GET['delete'])){

$del_id = $_GET['delete'];

$del_cat = "DELETE FROM categories WHERE cat_id = '{$del_id}' ";
$result_del = $db->query($del_cat);
if($result_del){

header("Location: admin_cat.php");

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

