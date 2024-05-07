<?php
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

    
    setcookie("phpuserid", '', time()-1000);
    unset($_COOKIE['phpuserid']);
    echo "<script>alert('Logging out...')";
    header('location:../index.php');
?>