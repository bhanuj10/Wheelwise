<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>WheelWise - Car Rental</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles_home.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts_home.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body >
        <div class="container-fluid bg-secondary">

            <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <a href="#">Home</a>
                <a class="nav-link" href="#" >Profile</a>
                <a class="nav-link" href="#" >Settings</a>
                <a class="nav-link" href="#" >Logout</a>
                <a class="nav-link helpnav" href="#" >Help?</a>
            </div>

            <nav class="navbar navbar-light ">

                <span onclick="openNav()">
                    <svg class="bg-white svg-icon" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"></path>
                    </svg>
                </span>

                <span class="navbar-brand" ><a class="title" href="index.php" >Wheelwise</a></span>
                <span onclick="window.location.href='signin.php'" class="btn signin">Sign in</span>

            </nav>

        </div>

        <div id="main" class="">
            <div class="row mainopts container-fluid">
                <div class="col menucol col1" onclick="document.location.href='car_rental.php'">Car Rental</div>
                <div class="col menucol" onclick="document.location.href='instant_cab.php'">Instant Cab</div>
            </div>
        

            <form action="location.php" method="GET" class="f1">
                <p class="content1">See how many vehicles are available in your city...</p>

                <div class="citysearch">

                    <span class="citydrop">
                        <select class="form-select" name="city">
                            <option value="PY">Puducherry</option>
                            <option value="CU">Cuddalore</option>
                            <option value="VI">Villupuram</option>
                            <option value="KA">Karaikal</option>
                        </select>
                    </span>

                    <span>
                        <button type="submit" class="search">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>

                </div>

            </form>
            <div class="container-fluid bg-secondary footercp ">
                <span class="footercp1">Created by team <a href="team.php" class="teams">FIGHTERS</a> with care😇</span>
            </div> 
        </div>
    </body>
</html>