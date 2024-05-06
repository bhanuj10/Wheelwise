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

        $username = $_POST['username'];        
        $password = $_POST['password'];
        
        $sql = "SELECT * FROM users WHERE user=? AND pass=? LIMIT 1;";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        

        if (!$result || $result->num_rows == 0) {
            echo '<script>
                alert("Invalid username or password");
                setTimeout(function() {
                    window.location.href = "signin.php";
                }, 500);
                </script>';
            
        } else {
            
            $v1 = base64_encode(str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT));
            $v2 = base64_encode(time());
            $v3 = time();

            $value = base64_encode($v1 . $v2 . $v3);

            $sql_insert = "INSERT INTO cookie_table VALUES(?,?,?)";
            $stmt_insert = $conn->prepare($sql_insert);
            $stmt_insert->bind_param("ssi",$result->fetch_assoc()['id'],$value,$v3);
            $result_insert = $stmt_insert->execute();

            setcookie("phpuserid", $value, $v3 + 86000, '/');
            echo '<script>
                alert("Login Successful!");
                setTimeout(function() {
                    window.location.href = "index.php?features=true";
                }, 500);
                </script>';
            
        }
        $stmt->close();
        $conn->close();
        exit();
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wheelwise - Signin</title>
    <link rel="icon" href="images/favicon.png" type="image/png">
    <link rel="stylesheet" href="css/styles_signin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!--<link rel="stylesheet" href="css/styles_signin.css">-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!--<script src="js/scripts_signin.js"></script>-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php include 'includes/sidenav.php'; ?>
    
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
                <span class="form-group">
                    <button type="submit">Sign In</button>
                </span>
                
            </form>
            <span class="register">Not having an account? <a href="register.php">Register Now</a></span>
        </div>
    </div>
</body>
</html>