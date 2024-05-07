

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

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $booked = "Booked";
                if (!$row['booked']){
                    $booked="Not Booked Yet";
                }
                $iscab = "Only Rental";
                echo "<div class='car row' style='background-color: lightgrey;align-items: center;'>
                        <span class='col image' style='padding: 15px;text-align:center;'><img src='images/".$row['car_image'].".jpg' alt='pic' style='max-width:250px;max-height:180px;' /></span>
                        <span class='col coltext'>".$row['car_model']."</span>
                        <span class='col coltext'>".$row['car_no']."</span>
                        <span class='col coltext'>".$booked."</span>
                        <span class='col coltext'>".$iscab."</span>
                        <span class='col coltext'>COST : ".$row['cost']."</span>                
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
    } else {
        header('Location: index.php');
        exit(); // Exit after redirect
    }
?>
