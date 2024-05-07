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
    

// fn ln username phone address premium
    echo '<div class="col-md-7">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter your name" value="'.$row['fn'].' '.$row['ln'].'" disabled>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Enter your email" value="'.$row['email'].'"disabled>
            </div>
            <div class="form-group">
                <label for="Phone">Phone Number</label>
                <input type="tel" class="form-control" id="number" placeholder="Enter your Phone number" value="'.$row['phone'].'" disabled>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea class="form-control" id="address" rows="3" placeholder="Enter your address" disabled></textarea>
            </div>

            <div class="form-group">
                <label for="accountType">Account Type</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="accountType" id="freeAccount" value="free">
                    <label class="form-check-label" for="freeAccount">Free</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="accountType" id="premiumAccount" value="premium">
                    <label class="form-check-label" for="premiumAccount">Premium 👑</label>
                </div>
            </div>

        </div>';
}

?>