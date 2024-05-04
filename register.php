<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST['firstname']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['address'])) {

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
            $firstname = $_POST['firstname'];

            $lastname = $_POST['lastname'];

            $username = $_POST['username'];
            $username = strip_tags($username);
            $username = stripslashes($username);
            
            $password = $_POST['password'];
            
            $phone = $_POST['phone'];

            $email = $_POST['email'];
            
            $address = $_POST['address'];

            function username(){         /// user filter in php inbuilt
                return; /// test username
            }
            function password(){
                return; /// password test
            }
            unset($_POST['firstname']);
            unset($_POST['lastname']);
            unset($_POST['username']);
            unset($_POST['password']); 
            unset($_POST['phone']); 
            unset($_POST['email']);  
            unset($_POST['address']); 

            // Prepare SQL query with parameterized query to prevent SQL injection
            $sql = "INSERT INTO users(firstname,lastname,user,pass,phone,email,address) VALUES(?,?,?,?,?,?,?);";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssss",$firstname,$lastname,$username,$password,$phone,$email,$address);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result==TRUE) {
                echo "Account created...<br>Will be redirected automatically";
                sleep(5);
                header('Location: signin.php');
            } 
            else {
                echo "Account not created ".$stmt->error;
            }
            
            $stmt->close();
            $conn->close();
            exit();
        }

        else {
            header('Location: index.php');
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
    <!--<link rel="stylesheet" href="css/styles_register.css">-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!--<script src="js/scripts_signin.js"></script>-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php include 'includes/sidenav.php'; ?>
    <link rel="stylesheet" href="css/styles_register.css">
    <div class="container main">
        <div class="card">
            <h1>Register</h1>
            <form action="register.php" method="POST">
                <div class="form-group">
                    <label for="firstname">First Name</label>
                    <input type="text" id="firstname" name="firstname" placeholder="Enter your first name" required>
                </div>
                <div class="form-group">
                    <label for="lastname">Last Name (Optional)</label>
                    <input type="text" id="lastname" name="lastname" placeholder="Enter your last name">
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Choose a username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter a password" minlength="8" maxlength="16" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" minlength="10" maxlength="10" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email address" required>
                </div>
                <div class="form-group address">
                
                    <label for="address">Address</label>
                    <textarea id="address" name="address" placeholder="Enter your address" minlength="10" maxlength="120" required></textarea>
                
                </div>
                <div class="form-group">
                    <button type="submit">Register</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>