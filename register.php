<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['username'] != "" && $_POST['password'] != "" && $_POST['phone'] !="" && $_POST['email']!="" && $_POST['address']!="") {
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
        
        $phone = $_POST['phone'];

        $email = $_POST['email'];
        
        $address = $_POST['address'];

        function username(){         /// user filter in php inbuilt
            return; /// test username
        }
        function password(){
            return; /// password test
        }
        
        unset($_POST['username']);
        unset($_POST['password']); 
        unset($_POST['phone']); 
        unset($_POST['email']);  
        unset($_POST['address']); 

        // Prepare SQL query with parameterized query to prevent SQL injection
        $sql = "INSERT INTO users(user,pass,phone,email,address) VALUES(?,?,?,?,?);";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $username,$password,$phone,$email,$address);
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
?>
