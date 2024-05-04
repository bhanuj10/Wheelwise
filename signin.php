<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST['username']) && isset($_POST['password'])) {
            $server = "localhost";
            $user = "root";
            $pass = "";
            $db = "cars";

            try {
                $conn = new mysqli($server, $user, $pass, $db);
            } catch (Exception $e) {
                die("Connection error -> " . $e->getMessage());
            }

            // Sanitize input
            $username = $_POST['username'];
            $username = strip_tags($username);
            $username = stripslashes($username);
            
            $password = $_POST['password'];
            
            function username(){  /// user filter in php inbuilt
                return; /// test username
            }
            function password(){
                return; /// password test
            }
            
            unset($_POST['username']);
            unset($_POST['password']);  

            // Prepare SQL query with parameterized query to prevent SQL injection
            $sql = "SELECT * FROM users WHERE user=? AND pass=? LIMIT 1;";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $username,$password);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows==0) {

                echo "alert(Invalid username or password)";
                header("location: signin.php");
            } 
            else {
                $row = $result->fetch_assoc();
                echo $row['id']; // Replace 'column_name' with actual column names
            }
            header('Location: index.php');
            $stmt->close();
            $conn->close();
            exit();
        }

        else {
            header('Location: signin.php');
            exit(); // Exit after redirect
        }
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wheelwise - Signin</title>
    <link rel="icon" href="images/favicon.png" type="image/png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!--<link rel="stylesheet" href="css/styles_signin.css">-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!--<script src="js/scripts_signin.js"></script>-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php include 'includes/sidenav.php'; ?>
    <link rel="stylesheet" href="css/styles_signin.css">
    
    <div class="container main">
        <div class="card">
            <h1>Sign in</h1>
            <form action="signin.php" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="text" name="username" maxlength="16" minlength="8" placeholder="Enter the username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" maxlength="16" minlength="8" placeholder="Enter the password" required>
                </div>
                <span class="">
                    <button type="submit">Sign In</button>
                </span>
                
            </form>
            <span class="register">Not having an account? <a href="register.php">Register Now</a></span>
        </div>
    </div>
</body>
</html>