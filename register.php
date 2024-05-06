<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $server = "localhost";
        $user = "root";
        $pass = "";
        $db = "cars";

        $conn = new mysqli($server, $user, $pass, $db);
        if ($conn->connect_error) {
            die("Connection error: " . $conn->connect_error);
        }

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $address = $_POST['address'];

        $sql_check = "SELECT * FROM users WHERE user=? OR email=?";
        $stmt_check = $conn->prepare($sql_check);
        $stmt_check->bind_param("ss", $username, $email);
        $stmt_check->execute();
        $result_check = $stmt_check->get_result();

        if ($result_check->num_rows > 0) {
            $stmt_check->close();
            $conn->close();
            echo "<script>alert('Email or username already exists')</script>";
            echo '<script>
                setTimeout(function() {
                    window.location.href = "register.php";
                }, 500);
              </script>';
            exit();
        }

        $stmt_check->close();

        $sql_insert = "INSERT INTO users(fn, ln, user, pass, phone, email, address) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt_insert = $conn->prepare($sql_insert);
        $stmt_insert->bind_param("sssssss", $firstname, $lastname, $username, $password, $phone, $email, $address);
        $result_insert = $stmt_insert->execute();
        $stmt_insert->close();
        $conn->close();

        if ($result_insert) {
            echo "<script>alert('Registered successfully.  Redirecting...')</script>";
            echo '<script>
                setTimeout(function() {
                    window.location.href = "signin.php";
                }, 500); 
              </script>';
        } else {
            echo "<script>alert('Invalid request...')</script>";
            echo '<script>
                setTimeout(function() {
                    window.location.href = "signin.php";
                }, 500); 
              </script>';
        }
        exit();
    }
?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wheelwise - Signin</title>
    <link rel="icon" href="images/favicon.png" type="image/png">
    <link rel="stylesheet" href="css/styles_register.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!--<link rel="stylesheet" href="css/styles_register.css">-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!--<script src="js/scripts_signin.js"></script>-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php include 'includes/sidenav.php'; ?>
    <div class="container main">
        <div class="card">
            <h1>Register</h1>
            <form action="register.php" method="POST">
                <div class="form-group">
                    <label for="firstname">First Name</label>
                    <input type="text" id="firstname" name="firstname" minlength="4" maxlength="25" placeholder="Enter your first name" required>
                </div>
                <div class="form-group">
                    <label for="lastname">Last Name (Optional)</label>
                    <input type="text" id="lastname" name="lastname" maxlength="25" placeholder="Enter your last name">
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" minlength="8" maxlength="16" placeholder="Choose a username" required>
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