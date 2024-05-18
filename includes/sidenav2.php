<?php
    ob_start(); // Start output buffering
    // Your PHP code here
    if (($_SERVER["REQUEST_METHOD"] == "POST" || $_SERVER["REQUEST_METHOD"] == "GET") && !isset($_COOKIE['phpuserid'])) {
        header("Location: index.php");
        exit;
    }
    ob_end_flush(); // Flush output
?>
<link rel="stylesheet" href="includes/sidenav.css">

<div class="container-fluid bg-secondary">
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <script src="includes/sidenav_scripts.js"></script>
        <div></div>
        <a href="index2.php">Home</a>
        <a class="nav-link" id="profile" href="profilepage.php">Profile</a>
        
        <a class="nav-link" id="logout" href="includes/logout.php" >Logout</a>
        <a class="nav-link helpnav" href="help_feedback.php" >Help?</a>
    </div>

    <nav class="navbar navbar-light ">

    <span onclick="openNav()">
        <svg class="bg-white svg-icon" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"></path>
        </svg>
    </span>

    <span class="navbar-brand" ><a class="title" href="index2.php" >Wheelwise</a></span>
    <span id="signin" onclick="window.location.href='signin.php'" style='visibility:<?php if(isset($_COOKIE["phpuserid"])||$_SERVER["PHP_SELF"]!="/Wheelwise/index.php"){echo "hidden";}else{echo "visible";} ?>' class="btn signin">Sign in</span>

    </nav>
</div>
<!--style='visibility:<--?php if(isset($_COOKIE["phpuserid"])||$_SERVER["PHP_SELF"]!="index.php"){echo "hidden";}else{echo "visible";} ?>' class="btn signin" onload="signin()"-->