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
	



<?php if(isset($_GET['ratting'])){ ?>
    

    <form action="" method="post">
    <div class="form-group">
        <input type="number" name="ratting" min="0" max="10" class="form-control" placeholder="Enter Ratting <= 10" required>
    </div>
    <div class="form-group">
        <input type="submit" value="Give Ratting" class="btn btn-primary" name="give">
        <a href="uservice_requests.php" class="btn btn-warning">Close</a>
    </div>
    </form>
    <?php 
    
    if(isset($_POST['give'])){
        $service_id = $_GET['ratting'];
        $ratting = $_POST['ratting'];
        $add = $db->query("INSERT INTO ratting(ratting, service_id, user_id) VALUES('$ratting', '$service_id', '$user_id') ");
        if($add){
            echo "<script>alert('Ratting has been Added.')</script>";
            header("refresh: 0 uservice_requests.php");
        }

    }
    
    ?>


    
    
<?php } ?>






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
        <th>Ratting</th>
    </tr>
</thead>
<tbody>
    <?php 
    
    $select = $db->query("SELECT * FROM requests WHERE user_id = '$user_id' ");
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
                    <?php if($status == 0){ echo "Wait"; }else{ ?>
                        <a href="uservice_requests.php?ratting=<?php echo $service_id ?>" class="btn btn-primary">Give</a>    
                    <?php } ?>
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

