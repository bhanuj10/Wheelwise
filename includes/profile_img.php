<?php
    ob_start(); // Start output buffering
    // Your PHP code here
    if (($_SERVER["REQUEST_METHOD"] == "POST" || $_SERVER["REQUEST_METHOD"] == "GET") && !isset($_COOKIE['phpuserid'])) {
        header("Location: index.php");
        exit;
    }
    ob_end_flush(); // Flush output
?>
<?php
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "cars";

    try {
        $conn = new mysqli($server, $user, $pass, $db);
    } catch (Exception $e) {
        die("Connection error -> " . $e->getMessage());
    }

    $sql = "SELECT id FROM cookie_table WHERE value=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_COOKIE['phpuserid']);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $uid = $row['id'];

    $sql2 = "SELECT user_img FROM users WHERE id=?";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->bind_param("s", $uid);
    $stmt2->execute();
    $result2 = $stmt2->get_result();
    $row2 = $result2->fetch_assoc();
    
    $path = $row2['user_img'];
    if($path==null){
        echo '<img id="profilePic" src="profile_img/placeholder.jpg" alt="Profile Picture">';
    }
    else{
        echo '<img id="profilePic" src="profile_img/'.$path.'" alt="Profile Picture">';        
    }
    
?>

