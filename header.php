<?php include_once "database.php"; ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Housing Society</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<script type='text/javascript' src="js/jquery-1.11.1.min.js"></script>
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<link rel="stylesheet" href="css/fwslider.css" media="all">
<script src="js/jquery-ui.min.js"></script>
<script src="js/fwslider.js"></script>
<script src="js/menu_jquery.js"></script>
<link rel="stylesheet" href="css/etalage.css">
<script src="js/jquery.etalage.min.js"></script>
<script>
jQuery(document).ready(function($){
    $('#etalage').etalage({
        thumb_image_width: 300,
        thumb_image_height: 400,
        source_image_width: 900,
        source_image_height: 1200
    });
});
</script>
<script type="text/javascript" src="js/jquery.jscrollpane.min.js"></script>
<script>
$(function() {
    $('.scroll-pane').jScrollPane();
});
</script> 

<style>
/* ==== General Styles ==== */
body {
    font-family: 'Open Sans', sans-serif;
    margin: 0;
    background-color: #f5f7fa;
}

/* Logo Styling */
.customlogo {
    font-weight: bold;
    font-size: 2em;
    background: linear-gradient(135deg, #6e8efb, #a777e3);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

/* Buttons */
.create_btn a, 
.registration_form input[type="submit"], 
.btn_form input {
    color: white;
    background: linear-gradient(135deg, #6e8efb, #a777e3);
    border: none;
    border-radius: 50px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    cursor: pointer;
    transition: all 0.4s ease;
    padding: 10px 20px;
    display: inline-block;
}

.create_btn a:hover, 
.registration_form input[type="submit"]:hover, 
.btn_form input:hover {
    background: rgb(105, 209, 166);
    color: black;
}

/* Links Hover */
.skyblue li a.color6:hover,
.shoping_left a.btn1:hover {
    background: black;
    color: white;
}

/* Footer Styling */
.footer {
    background: linear-gradient(135deg, #2c3e50, #4ca1af);
    padding: 15px 0;
    color: white;
    text-align: center;
    box-shadow: 0 -3px 8px rgba(0,0,0,0.2);
}
.footer p {
    margin: 0;
    font-size: 14px;
}

/* Product Descriptions */
.desc1 p {
    margin-top: 2%;
    font-size: 1.8em;
    color: black;
    line-height: 1.8em;
    letter-spacing: 1px;
    text-shadow: 0 1px 0 #fff;
}

/* Borders */
.look {
    border: 3px solid white;
    box-shadow: 0 0 5px black;
}

/* ==== Responsive Design ==== */
@media (max-width: 768px) {
    .customlogo {
        font-size: 1.5em;
    }
    .create_btn a {
        padding: 8px 15px;
        font-size: 0.9em;
    }
    .desc1 p {
        font-size: 1.2em;
    }
}

@media (max-width: 480px) {
    .customlogo {
        font-size: 1.3em;
        text-align: center;
    }
    .footer p {
        font-size: 12px;
    }
}
</style>

<script>
// Mobile-friendly menu toggle
$(document).ready(function(){
    $(".menu-toggle").click(function(){
        $(".megamenu").slideToggle();
    });
});
</script>
</head>
<body>

<!-- Example Header -->
<header style="background: #fff; padding: 10px 20px; display: flex; align-items: center; justify-content: space-between;">
    <div class="customlogo">Housing Society</div>
    <div class="menu-toggle" style="cursor:pointer; font-size:20px; display:none;">&#9776;</div>
</header>

<!-- Example Content -->
<script>
// Show mobile menu toggle only when needed
$(window).resize(function(){
    if($(window).width() <= 768){
        $(".menu-toggle").show();
    } else {
        $(".menu-toggle").hide();
        $(".megamenu").show();
    }
}).trigger('resize');
</script>

</body>
</html>
