
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Location</title>
    <title>Locations</title>
    <link rel="icon" href="images/favicon.png" type="image/png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!--<link rel="stylesheet" href="css/styles_home.css">-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
      

        .container{
            margin-top: 50px;
        }
        .container{
            justify-content: center;
        }
        .car{
            height: auto;
            display: flex;
            border-radius: 10px;         
        }
        img{
           border-radius: 10px; 
        }
        .coltext{
            font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            font-weight: 500;
            text-align: center;
        }
        h1{
            text-align: center;
        }
        span{
            font-size: larger;
            font-weight: bolder;
        }
        .btn{
            background-color: grey;
            margin-right: 10px;
        }
        .btn:hover{
            background-color: white;
        }

    </style>
</head>
<body>
    <?php include 'includes/sidenav2.php'; ?>
    <div class="container-fluid">
        <div class="container">
        <h1>CAB FOR RIDE</h1><br>
        <?php include 'includes/cab.php' ?>       

        </div>
        
    </div>
    
</body>
</html>
