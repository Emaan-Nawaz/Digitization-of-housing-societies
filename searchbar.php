<style>
/* ===== Logo Styling ===== */
.customlogo {
    font-weight: bold;
    font-size: 1.8em;
    text-align: center;
    margin: 0;
    padding: 10px 0;
    background: linear-gradient(135deg, #6e8efb, #a777e3);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

/* ===== Create Button Styling ===== */
.create_btn a {
    display: inline-block;
    padding: 10px 18px;
    font-size: 0.95em;
    font-weight: bold;
    color: white;
    background: linear-gradient(135deg, #6e8efb, #a777e3);
    border-radius: 50px;
    text-decoration: none;
    box-shadow: 0 4px 10px rgba(0,0,0,0.15);
    transition: all 0.3s ease;
}

.create_btn a:hover {
    background: rgb(105, 209, 166);
    color: black;
    transform: translateY(-2px);
}

/* ===== Layout ===== */
.logo {
    text-align: center;
    margin-bottom: 15px;
}

.header_right {
    text-align: center;
}

/* ===== Responsive ===== */
@media (max-width: 768px) {
    .customlogo {
        font-size: 1.4em;
    }
    .create_btn a {
        padding: 8px 14px;
        font-size: 0.9em;
    }
}
</style>

<div class="logo">
    <h3 class="alert customlogo">Digitization Of Housing Society</h3>
</div>

<div class="row">
    <!-- start header_right -->
    <div class="header_right">
        <div class="create_btn">
            <?php if(isset($user_id)){ ?>
                <a class="arrow" href="backend/index.php">Your Account</a>
            <?php }else{ ?>
                <a class="arrow" href="index.php">Register | Login </a>
            <?php } ?>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
