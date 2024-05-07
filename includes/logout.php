<?php
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "cars";

    $conn = new mysqli($server, $user, $pass, $db);
    if ($conn->connect_error) {
        die("Connection error: " . $conn->connect_error);
    }
    
    $sql = "DELETE FROM cookie_table WHERE value=?;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s",$_COOKIE['phpuserid']);
    $stmt->execute();
    $result = $stmt->get_result();


    setcookie("phpuserid", '',0,'/');
    
    unset($_COOKIE['phpuserid']);
    session_unset();
    
    echo '<script>
    alert("Logging out...");
    setTimeout(function() {
        window.location.href = "index.php";
    }, 500);
    </script>';

    
    exit();
?>