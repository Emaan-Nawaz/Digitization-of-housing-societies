<?php include_once "header.php"; ?>

<div id="wrapper">

<!----->

<?php if($user_role == 'user'){ ?>



<?php include_once "sidebar.php"; ?>


<div id="page-wrapper" class="gray-bg dashbard-1">
<div class="content-main">

<div class="content-top">


<div class="col-md-3">
<div class="content-top-1">


<p>Give Your Feedback</p>

</div>
</div>



<div class="col-md-9">
<div class="content-top-1">
	






<form method="post" action=""> 


<div class="form-group">
	
	<textarea rows="3" required name="feedback" placeholder="Your Feedback" class="form-control"></textarea>


</div>

<div class="form-group">
	<input class="btn btn-warning" type="submit" name="submit" value="Send">
</div>


</form>

<?php 



if(isset($_POST['submit'])){

$feedback = $_POST['feedback'];
$feedback = $db->real_escape_string($feedback);



$query = "INSERT INTO feedback (user_id, feedback) VALUES ('{$user_id}','{$feedback}')";


$result = $db->query($query);

if($result){

echo "<p class='alert alert-warning'>Thanks for your Precious Feedback.</p>";

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

