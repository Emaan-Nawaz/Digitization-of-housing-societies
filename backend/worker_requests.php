<?php include_once "header.php"; ?>

<div id="wrapper">
<?php if($user_role == 'worker'){ ?>
<?php include_once "worker_sidebar.php"; ?>
<div id="page-wrapper" class="gray-bg dashbard-1">
<div class="content-main">
<div class="content-top">
<div class="col-md-12">
<div class="content-top-1">
	

	

<table class="table table-bordered table-striped">
<thead>
    <tr>
        <th>No</th>
        <th>Service</th>
        <th>Price</th>
        <th>Worker</th>
        <th>Date</th>
        <th>Time</th>
        <th>Status</th>
        <th>Address</th>
        <th>Done</th>
    </tr>
</thead>
<tbody>
    <?php 
    
    $select = $db->query("SELECT * FROM requests WHERE worker_id = '$user_id' ");
    if($select->num_rows){

        $count = 0;
        while($row = $select->fetch_assoc()){

            $service_id = $row['service_id'];
            $get_service = $db->query("SELECT * FROM categories WHERE cat_id = '$service_id' ");
            if($get_service->num_rows){
                $we = $get_service->fetch_assoc();
                $service_name = $we['cat_name'];
            }
            $worker_id  = $row['worker_id'];
            $get_worker = $db->query("SELECT * FROM users WHERE id = '$worker_id' ");
            if($get_worker->num_rows){
                $we = $get_worker->fetch_assoc();
                $worker = $we['name'];
            }
            $price      = $row['price'];
            $type       = $row['type'];
            $status     = $row['status'];
            $date       = $row['date'];
            $time       = $row['time'];
            $address    = $row['address'];

            $count++;
            ?>
            <tr>
                <td><?php echo $count; ?></td>
                <td><?php echo $service_name; ?></td>
                <td><?php echo $price; ?> .RS</td>
                <td><?php echo $worker; ?></td>
                <td><?php echo $date; ?></td>
                <td><?php echo $time; ?></td>
                <td><?php if($status == 0){ echo "Pending"; }else{ echo "Completed"; }; ?></td>
                <td><?php echo $address; ?></td>
                <td>
                    <?php if($status == 0){ ?>
                        <a href="worker_requests.php?done=<?php echo $row['id']; ?>" class="btn btn-primary">Work Done</a>
                    <?php }else{ echo "Done"; } ?>
                </td>
            </tr>
            <?php

        }

    }
    
    ?>
</tbody>
</table>
<?php 


if(isset($_GET['done'])){

    $done_id = $_GET['done'];
    $update = $db->query("UPDATE requests SET status = 1 WHERE id = '$done_id' ");
    if($update){
        header("Location: worker_requests.php");
    }

}




?>




</div>
</div>
<div class="clearfix"> </div>
</div>
<?php }else{header("Location: logout.php"); } ?>





<?php include_once "footer.php"; ?>

