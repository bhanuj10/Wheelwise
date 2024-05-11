
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
    <script src="includes/cab_rent.js"></script>    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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
    <script>
       function book(a) {
            var formData = new FormData();
            formData.append('task', 'book'); // Corrected task name for booking
            formData.append('id', a);

            fetch('includes/cab.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                if (data.trim() == 'success') {
                    alert("Car Booked");
                } else {
                    alert("Failed to book car");
                }
                window.location.reload();

            })
            .catch(error => {
                console.error('Error:', error);
            });
        }

        function unbook(a) {
            var formData = new FormData();
            formData.append('task', 'unbook');
            formData.append('id', a);
            
            fetch('includes/cab.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                if (data.trim() == 'success') {
                    alert("Car Unbooked");
                } else {
                    alert("Failed to unbook car");
                }
                window.location.reload();
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }

    </script>
</head>
<body>
    <?php include 'includes/sidenav2.php'; ?>
    <div class="container-fluid">
        <div class="container">
            <h1>CAR RENTAL</h1><br>
        <?php include 'includes/rental.php' ?>       

        </div>
        
    </div>
    
</body>
</html>
