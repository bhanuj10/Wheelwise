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

if ($_SERVER["REQUEST_METHOD"] == "GET") {
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
    
    $sql = "SELECT * FROM users WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $row['id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    
    $free = 'checked';
    $premium = 'unchecked';
    if($row['premium']){
        $free = 'unchecked';
        $premium = 'checked';
    }

// fn ln username phone address premium
    echo '<div class="col-md-7">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Change name" value="'.$row['fn'].' '.$row['ln'].'" disabled>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="username" class="form-control" id="user" placeholder="Change username" value="'.$row['user'].'"disabled>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Change email" value="'.$row['email'].'"disabled>
            </div>
            <div class="form-group">
                <label for="Phone">Phone Number</label>
                <input type="tel" class="form-control" id="number" placeholder="Change Phone number" value="'.$row['phone'].'" disabled>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea class="form-control" id="address" rows="3" placeholder="Change address" disabled>'.$row["address"].'</textarea>
            </div>
            
            <!--
            <div class="form-group">
                <label for="accountType">Account Type</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="accountType" id="freeAccount" value="free" '.$free.'>
                    <label class="form-check-label" for="freeAccount">Free</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="accountType" id="premiumAccount" value="premium" '.$premium.'>
                    <label class="form-check-label" for="premiumAccount">Premium 👑</label>
                </div>
            </div>
            -->

        </div>';
}

?>