<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && $_GET['username'] != "" && $_GET['password'] != "") {
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
        
        function username(){
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
            echo "Invalid username or password";
            header('Location: index.php');
            exit(); // Exit after redirect
        } 
        else {
            $row = $result->fetch_assoc();
            echo $row['column_name']; // Replace 'column_name' with actual column names
        }
        
        $stmt->close();
        $conn->close();
    }

    else {
        header('Location: index.php');
        exit(); // Exit after redirect
    }
?>
