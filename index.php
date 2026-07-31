<?php include_once "header.php"; ?>

<style>
/* ==== Global Reset ==== */
body {
    font-family: 'Open Sans', sans-serif;
    background: #f8f9fc;
    margin: 0;
}

/* ===== Header Background ===== */
.header_bg {
    background: linear-gradient(135deg, #6e8efb, #a777e3);
    padding: 15px 0;
    color: white;
}

/* ===== Main Form Container ===== */
.registration {
    display: flex;
    flex-wrap: wrap;
    gap: 30px;
    justify-content: center;
    padding: 30px 0;
}

/* ===== Each Side (Register / Login) ===== */
.registration_left {
    background: white;
    border-radius: 12px;
    padding: 25px;
    width: 100%;
    max-width: 400px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.08);
}

.registration_left h2 {
    font-size: 1.5em;
    margin-bottom: 15px;
    color: #444;
    text-align: center;
}

/* ===== Form Styles ===== */
.registration_form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.registration_form input[type="text"],
.registration_form input[type="email"],
.registration_form input[type="password"],
.registration_form input[type="number"] {
    padding: 12px 15px;
    border-radius: 8px;
    border: 1px solid #ddd;
    font-size: 0.95em;
    outline: none;
    transition: border 0.3s ease, box-shadow 0.3s ease;
}

.registration_form input:focus {
    border-color: #6e8efb;
    box-shadow: 0 0 6px rgba(110, 142, 251, 0.4);
}

/* ===== Submit Button ===== */
.registration_form input[type="submit"] {
    background: linear-gradient(135deg, #6e8efb, #a777e3);
    color: white;
    padding: 12px 15px;
    border-radius: 8px;
    border: none;
    font-weight: bold;
    cursor: pointer;
    transition: all 0.3s ease;
}

.registration_form input[type="submit"]:hover {
    background: rgb(105, 209, 166);
    color: black;
}

/* ===== Alerts ===== */
.alert {
    border-radius: 6px;
    padding: 10px 15px;
    margin-top: 10px;
    font-size: 0.9em;
}

/* ===== Responsive ===== */
@media (max-width: 768px) {
    .registration {
        padding: 20px;
    }
    .registration_left {
        max-width: 100%;
    }
}
</style>

<div class="header_bg">
    <div class="container">
        <div class="header">
            <?php include_once "searchbar.php"; ?>
        </div>
    </div>
</div>

<!-- content -->
<div class="container">
<div class="main">

<div class="registration">

<!-- Register Form -->
<div class="registration_left">
<h2>Register Form:</h2>
<div class="registration_form">
<form id="registration_form" action="" method="post">

<div>
<input type="text" name="name" placeholder="Your Name" required autofocus>
</div>

<div>
<input type="email" name="email" placeholder="Your Email"  required>
</div>

<div>
<input type="password" name="password"  placeholder="Your Password" required>
</div>						

<div>
<input type="number" name="contact" placeholder="Your Mobile" required>
</div>

<div>
<input type="text" name="cnic" placeholder="Your Cnic" required>
</div>

<div>
<input type="submit" name="register" value="Register" id="register-submit">
</div>
</form>
</div>

<?php 
if(isset($_POST['register'])){
    $email    = $_POST['email'];
    $check    = "SELECT email FROM users WHERE email = '{$email}'";
    $result   = $db->query($check);
    $rows     = $result->num_rows;

    if($rows > 0){
        echo "<p class='alert text-center alert-info'>This Email already Taken.</p>";
    } else {
        $name  = $_POST['name'];
        $password = $_POST['password'];
        $phone = $_POST['contact'];
        $cnic  = $_POST['cnic'];

        $query = "INSERT INTO users (name,email,password,contact,cnic) VALUES ('{$name}','{$email}','{$password}','{$phone}','{$cnic}')";
        $exe = $db->query($query);

        if($exe){
            echo "<p class='alert text-center alert-success'>Your Account has been created.</p>";
        }
    } 
}
?>
</div>

<!-- Login Form -->
<div class="registration_left">
<h2>Login Form:</h2>
<div class="registration_form">
<form id="registration_form" method="post">
<div>
<input placeholder="Your Email" name="email" type="email" required>
</div>
<div>
<input placeholder="Your Password" name="password" type="password" required>
</div>						
<div>
<input type="submit" value="Login" name="login" id="register-submit">
</div>
</form>
</div>

<?php 
if(isset($_POST['login'])){
  $email     = $_POST['email'];
  $password  = $_POST['password'];

  $loginQuery   = "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'";
  $loginResult  = $db->query($loginQuery);
  $loginNums    = $loginResult->num_rows;
  $row = $loginResult->fetch_assoc();

  if($loginNums == 0){
    echo "<p class='alert alert-danger'>Incorrect Email or Password.</p>";
  } elseif($loginNums == 1 AND $row['status'] == 1) {
    session_start();
    $_SESSION['id']   = $row['id'];
    $_SESSION['role'] = $row['role'];
    header("Location: backend/index.php");
    exit;
  } else {
    echo "<p class='alert alert-warning'>Please wait for Admin Approval.</p>";
  }
}
?>
</div>

<div class="clearfix"></div>
</div>
</div>
</div>

