<?php include_once "header.php"; ?>

<div id="wrapper">
<?php if($user_role == 'user'){ ?>
<?php include_once "sidebar.php"; ?>


<?php 

if(isset($_GET['service_id'])){




    $service_id = $_GET['service_id'];
    $get_service = $db->query("SELECT * FROM categories WHERE cat_id = '$service_id' ");
    if($get_service->num_rows){

        $fetch         = $get_service->fetch_assoc();
        $service_name  = $fetch['cat_name'];
        $service_price = $fetch['cat_price'];

    }else{
        header("Location: uservice.php");
    }





    ?>




<div id="page-wrapper" class="gray-bg dashbard-1">
<div class="content-main">
<div class="content-top">
<div class="col-md-12">
<div class="content-top-1">
	


<h3 class="text-uppercase">Service Details</h3><br>



<table class="table table-bordered table-striped">
    <tr>
        <th>Name</th>
        <td><?php echo $service_name; ?></td>
    </tr>
    <tr>
        <th>Price</th>
        <td><?php echo $service_price; ?></td>
    </tr>
</table>


<br>


<form action="" method="post">
    <div class="form-group">
        <select name="worker_id" id="worker_id" class="form-control" required>
            <option value disabled selected>Choose Worker</option>
            <?php 
            
            $select_workers = $db->query("SELECT * FROM users WHERE role = 'worker' ");
            if($select_workers->num_rows){
                while($q = $select_workers->fetch_assoc()){

                    ?>
                    <option value="<?php echo $q['id']; ?>"><?php echo $q['name']; ?></option>
                    <?php

                }
            }
            
            ?>
        </select>
    </div>
    <?php 
    
        $month = date('M Y');
        $check = $db->query("SELECT * FROM months WHERE month = '$month' AND user_id = '$user_id' ");
        if($check->num_rows == 0){
            $type = "Not Subscribed";

    ?>
    <div class="form-group">
    <p>You have to Pay : <?php echo $service_price; ?></p>
    </div>
    <div class="form-group">
        <input type="text" name="bank" id="bank" class="form-control" placeholder="Enter Bank Name" required>
    </div>
    <div class="form-group">
        <input type="text" name="account" id="account" class="form-control" placeholder="Enter Bank Account" required>
    </div>

    <?php

        }else{
            $type = "Subscribed";
        }

    ?>
    <input type="hidden" name="type" value="<?php echo $type ?>">
    <div class="form-group">
        <input type="date" name="date" id="date" class="form-control" required title="Choose Date">
    </div>
    <div class="form-group">
        <input type="time" name="time" id="time" class="form-control" required title="Choose Time">
    </div>
    <div class="form-group">
        <input type="text" name="address" id="address" class="form-control" placeholder="Enter Address" required>
    </div>
    <div class="form-group">
        <input type="submit" value="Submit" class="btn btn-primary" name="submit">
    </div>
</form>

<?php 


if(isset($_POST['submit'])){


    $worker_id = $_POST['worker_id'];
    
    $date      = $_POST['date'];
    $time      = $_POST['time'];
    $type      = $_POST['type'];
    $address   = $_POST['address'];

    if($type == 'Subscribed'){
        $bank = "-";
        $account = "-";
    }else{
        $bank      = $_POST['bank'];
        $account   = $_POST['account'];
    }

    $check = $db->query("SELECT * FROM requests WHERE user_id = '$user_id' AND service_id = '$service_id' AND status = 0 ");
    if($check->num_rows){
        echo "<p class='alert alert-warning'>Please wait for Worker/Admin Response.</p>";
    }else{

        $insert = $db->query("INSERT INTO requests(user_id, service_id, worker_id, price, type, status, date, time, address) VALUES('$user_id', '$service_id', '$worker_id', '$service_price', '$type', '0', '$date', '$time', '$address') ");

        if($insert){
            echo "<p class='alert alert-success'>Successfully Sent.</p>";
        }else{
            echo $db->error;
        }

    }


}


?>





</div>
</div>
<div class="clearfix"> </div>
</div>





<div class="content-top">
<div class="col-md-12">
<div class="content-top-1">
	


<h3 class="text-uppercase">Rattings</h3><br>


<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>User</th>
            <th>Ratting</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        
        $ratting_1 = $db->query("SELECT * FROM ratting WHERE service_id = '$service_id' ");
        if($ratting_1->num_rows){

            $count = 0;
            while($wq = $ratting_1->fetch_assoc()){

                $member_id = $wq['user_id'];
                $get_member = $db->query("SELECT * FROM users WHERE id = '$member_id' ");
                if($get_member->num_rows){

                    $data_1 = $get_member->fetch_assoc();
                    $member_name = $data_1['name'];

                }else{
                    $member_name = "-";
                }
                $ratting = $wq['ratting'];
                $count++;
                ?>
                <tr>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $member_name; ?></td>
                    <td><?php echo $ratting; ?></td>
                </tr>
                <?php

            }

        }else{
            echo "<td>No Ratting Found.</td>";
        }
        
        ?>
    </tbody>
</table>





</div>
</div>
<div class="clearfix"> </div>
</div>



<?php
}

?>




<?php }else{header("Location: logout.php"); } ?>





<?php include_once "footer.php"; ?>

