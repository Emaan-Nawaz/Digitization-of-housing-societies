<style>
/* ===== Navbar Header ===== */
.navbar-default {
    background: linear-gradient(135deg, #6e8efb, #a777e3);
    border: none;
    border-radius: 0;
    margin-bottom: 0;
    box-shadow: 0 4px 10px rgba(0,0,0,0.15);
}
.navbar-header h1 a.navbar-brand {
    color: white;
    font-weight: bold;
    font-size: 1.6em;
    text-decoration: none;
}
.navbar-header h1 a.navbar-brand:hover {
    color: #ffd700;
}

/* ===== Welcome Text ===== */
.border-bottom p {
    margin: 0;
    font-size: 1.1em;
    color: white;
    background: rgba(0,0,0,0.1);
    border-radius: 4px;
}

/* ===== Sidebar Styling ===== */
.sidebar {
    background: #2c3e50;
    min-height: 100vh;
    padding-top: 20px;
    position: fixed;
    width: 220px;
    top: 0;
    left: 0;
}
.sidebar .nav > li > a {
    color: white;
    padding: 12px 20px;
    display: flex;
    align-items: center;
    gap: 10px;
    text-decoration: none;
    font-size: 0.95em;
    transition: all 0.3s ease;
    border-radius: 4px;
    margin: 5px 10px;
}
.sidebar .nav > li > a i {
    font-size: 1.1em;
}
.sidebar .nav > li > a:hover {
    background: linear-gradient(135deg, #6e8efb, #a777e3);
    color: white;
    transform: translateX(5px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
}

/* ===== Active Menu Item ===== */
.sidebar .nav > li.active > a {
    background: linear-gradient(135deg, #6e8efb, #a777e3);
    color: white;
    font-weight: bold;
}

/* ===== Responsive ===== */
@media (max-width: 768px) {
    .sidebar {
        position: relative;
        width: 100%;
        min-height: auto;
    }
    .sidebar .nav > li > a {
        justify-content: center;
    }
}
</style>

<nav class="navbar-default navbar-static-top" role="navigation">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<h1><a class="navbar-brand" href="index.php">User</a></h1>         
</div>
<div class="border-bottom">
    <p style="text-align: center; padding: 15px;">Welcome To Digitization Of Housing Society</p>
</div>

<div class="navbar-default sidebar" role="navigation">
<div class="sidebar-nav navbar-collapse">
<ul class="nav" id="side-menu">
    <li><a href="index.php" class="hvr-bounce-to-right"><i class="fa fa-dashboard nav_icon"></i><span class="nav-label">Your Info</span></a></li>
    <li><a href="uservice.php" class="hvr-bounce-to-right"><i class="fa fa-search nav_icon"></i><span class="nav-label">Find Services</span></a></li>
    <li><a href="uservice_requests.php" class="hvr-bounce-to-right"><i class="fa fa-tasks nav_icon"></i><span class="nav-label">Service Requests</span></a></li>
    <li><a href="ufeedback.php" class="hvr-bounce-to-right"><i class="fa fa-comments nav_icon"></i><span class="nav-label">Feedback</span></a></li>
    <li><a href="settings.php" class="hvr-bounce-to-right"><i class="fa fa-cog nav_icon"></i><span class="nav-label">Settings</span></a></li>
    <li><a href="logout.php" class="hvr-bounce-to-right"><i class="fa fa-sign-out nav_icon"></i><span class="nav-label">Logout</span></a></li>
</ul>
</div>
</div>
</nav>
