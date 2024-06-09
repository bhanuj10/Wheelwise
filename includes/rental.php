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

        // Sanitize input
        
        $sql = "SELECT * FROM city WHERE iscab = 0";
        $stmt = $conn->prepare($sql);
               
        $stmt->execute();
        $result = $stmt->get_result();
        $row1 = $result->fetch_assoc();
        
        $sql2 = "SELECT id FROM cookie_table WHERE value=?";
        $stmt2 = $conn->prepare($sql2);
        $stmt2->bind_param("s",$_COOKIE['phpuserid']);
        $stmt2->execute();
        $result2 = $stmt2->get_result();
        $row2 = $result2->fetch_assoc();

        

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $booked = "Booked";
                if (!$row['booked']){
                    $booked="Not Booked Yet";
                }
                $iscab = "CAB";

                echo "<div class='car row' style='background-color: lightgrey;align-items: center;'>
                        <span class='col image' style='padding: 15px;text-align:center;'><img src='images/".$row['car_image']."' alt='pic' style='max-width:250px;max-height:180px;' /></span>
                        <span class='col coltext'>".$row['car_model']."</span>
                        <span class='col coltext'>".$row['car_no']."</span>
                        <span class='col coltext'>".$booked."</span>
                        <span class='col coltext'>".$iscab."</span>
                        <span class='col coltext' >COST : 
                        <span style='color:green;'>".$row['cost']."</span></span>";
                if($row['booked_user']){
                    if($row['booked_user']==$row2['id']){
                        echo "<span class='col coltext btn' id='unbook' value=".$row['car_id']." onclick='".'unbook('.$row['car_id'].")"."'><h4 style='width:180px;'>You Booked</h4></span>";
                    }
                    else{
                        echo "<span class='col coltext btn' onclick='".'alert("Car unavailable right now")'."'><h4 style='width:180px;'>Car Unavailable</h4></span>";
                    }
                }
                else{
                    echo "<span class='col coltext btn book' onclick='".'book('.$row['car_id'].")"."'><h4>Book it now </h4></span>";
                }
                echo"             
                    </div><br>";
                /*echo "<div class='card'>
                <span>".$row['car_model']."</span>
                <span>".$row['car_no']."</span>
                <span>".$row['booked']."</span>
                <span>".$row['cost']."</span>
                <span>".$row['iscab']."</span>
                </div><br>";*/
            }
        } else {
            echo "No cars available :(";
        }
        
        $stmt->close();
        $conn->close();
        exit();
    }
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "cars";

    try {
        $conn = new mysqli($server, $user, $pass, $db);
    } catch (Exception $e) {
        die("Connection error -> " . $e->getMessage());
    }

    $sql2 = "SELECT id FROM cookie_table WHERE value=?";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->bind_param("s", $_COOKIE['phpuserid']);
    $stmt2->execute();
    $result2 = $stmt2->get_result();
    $row2 = $result2->fetch_assoc();

    $uid = $row2['id'];
        
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    header('Content-Type');
    

    if ($_POST['task'] == "book" && isset($_POST['id'])) {
        $sql = "UPDATE city SET booked=?, booked_user=?, booked_period=? WHERE car_id=? AND iscab=0 AND booked_user=0";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iisi", $booked, $uid, $booked_period, $_POST['id']);

        // Set the values for $booked and $booked_period based on your logic
        $booked = 1; // Assuming 1 means booked, adjust as needed
        $booked_period = time(); // Use the current time for booked_period

        $res = $stmt->execute();

        if ($res) {
            echo "success";
        } else {
            echo "failed";
        }
    } elseif ($_POST['task'] == "unbook" && isset($_POST['id'])) {
        $sql = "UPDATE city SET booked=0, booked_user=0, booked_period=null WHERE car_id=? AND iscab=0 AND booked_user=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $_POST['id'], $uid);
        $res = $stmt->execute();
    
        if ($res) {
            echo "success";
        } else {
            echo "failed";
        }
    }
    
    // Close database connection
    $conn->close();
    exit; // Stop further execution
}
?>
