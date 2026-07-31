<?php include_once "header.php"; ?>

<div id="wrapper">
<?php if($user_role == 'user'){ ?>
<?php include_once "sidebar.php"; ?>
<div id="page-wrapper" class="gray-bg dashbard-1">
<div class="content-main">
<div class="content-top">
<div class="col-md-12">
<div class="content-top-1">
	









</div>
</div>
<div class="clearfix"> </div>
</div>
<?php }else{header("Location: logout.php"); } ?>





<?php include_once "footer.php"; ?>

