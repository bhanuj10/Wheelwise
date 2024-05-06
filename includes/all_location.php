<?php
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['city'])) {
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
        $location = $_GET['city'];
        $location = strip_tags($location);
        $location = stripslashes($location);
        unset($_GET['city']);
        
        // Prepare SQL query with parameterized query to prevent SQL injection
        $sql = "SELECT * FROM city WHERE place = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $location);
        $stmt->execute();
        $result = $stmt->get_result();
        

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                
                if ($row['iscab']){
                    echo "<div class='row card'>
                    <span>".$row['car_model']."</span>
                    <span>".$row['car_no']."</span>
                    <span>".$row['booked']."</span>
                    </div>";
                }
                else{
                    echo "";
                }

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
