<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>WheelWise</title>
        <!--<link rel="icon" href="favicon.ico" type="image/x-icon">-->
        <!-- For modern browsers -->
        <link rel="icon" href="images/favicon.png" type="image/png">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
        <!--<link rel="stylesheet" href="css/styles_home.css">-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts_home.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body >
        
        <?php include 'includes/sidenav.php'; ?>
        <link rel="stylesheet" href="css/styles_home.css">

        <div id="main" class="container-fluid">
            <div class="row mainopts container-fluid">
                <div class="col menucol col1 card" onclick="document.location.href='car_rental.php'">
                    <img class="card-img-top" src="images/Audi.jpg" alt="Car rental" />
                    <div class="card-body" >CAR RENTAL</div>
                </div>
                <div class="col menucol col1 card" onclick="document.location.href='cab_taxi.php'">
                    <img class="card-img-top" src="images/taxi.jpg" alt="Taxi / Cab" />
                    <div class="card-body" >CALL A CAB</div>
                </div>
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
                <span class="footercp1">Created by team <a href="teams_page/teams.php" class="teams">FIGHTERS</a> with care😇</span>
            </div> 
        </div>
    </body>
</html>