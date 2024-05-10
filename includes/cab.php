

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
        
        $sql = "SELECT * FROM city WHERE iscab = 1";
        $stmt = $conn->prepare($sql);
               
        $stmt->execute();
        $result = $stmt->get_result();

        $sql2 = "SELECT id FROM cookie_table WHERE value=?";
        $stmt2 = $conn->prepare($sql2);
        $stmt2->bind_param("s",$_COOKIE['phpuserid']);
        $stmt2->execute();
        $result2 = $stmt2->get_result();
        $row2 = $result->fetch_assoc();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $booked = "Booked";
                if (!$row['booked']){
                    $booked="Not Booked Yet";
                }
                $iscab = "CAB";

                echo "<div class='car row' style='background-color: lightgrey;align-items: center;'>
                        <span class='col image' style='padding: 15px;text-align:center;'><img src='images/".$row['car_image'].".jpg' alt='pic' style='max-width:250px;max-height:180px;' /></span>
                        <span class='col coltext'>".$row['car_model']."</span>
                        <span class='col coltext'>".$row['car_no']."</span>
                        <span class='col coltext'>".$booked."</span>
                        <span class='col coltext'>".$iscab."</span>
                        <span class='col coltext'>".$row['driver_phone']."</span>
                        <span class='col coltext' style='color:green;'>COST : ".$row['cost']."</span>";
                if($row['booked_user']){
                    if($row['booked_user']==$row2['id']){
                        echo "<span class='col coltext btn' id='unbook' value=".$row['car_id']." onclick='".''."'><h4 style='width:180px;'>You Booked</h4></span>";
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
    } else {
        header('Location: index.php');
        exit(); // Exit after redirect
    }
?>

<?php
    if($_SERVER['REQUEST_POST']=='POST'){
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
        $stmt2->bind_param("s",$_COOKIE['phpuserid']);
        $stmt2->execute();
        $result2 = $stmt2->get_result();
        $row2 = $result->fetch_assoc();
        
        $uid = $row2['id'];


        if(($_POST['task']=="book")&&(isset($_POST['id']))){
            $sql="UPDATE city SET booked=?,booked_user=?,booked_period=? WHERE car_id=? AND iscab=1 AND booked_user";
            $stmt2 = $conn->prepare($sql2);
            $stmt2->bind_param("ssss",'1',$uid,time(),$_POST['id']);
            $res = $stmt2->execute();
            if($res){
                return "success";
            }
            else{
                return "failed";
            }
                        
        }
        elseif(($_POST['task']=="unbook")&&(isset($_POST['id']))){
            $sql="UPDATE city SET booked=?,booked_user=?,booked_period=? WHERE car_id=? AND iscab=1 AND ;";
            $stmt2 = $conn->prepare($sql2);
            $stmt2->bind_param("ssss",'1',$uid,time(),$_POST['id']);
            $res = $stmt2->execute();
            if($res){
                return "success";
            }
            else{
                return "failed";
            }
        }
    }
?>
