<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Car</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        #driver_phone_group {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Add a New Car</h2>
        <form action="add_car.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="car_no">Car Number:</label>
                <input type="text" class="form-control" id="car_no" name="car_no" required maxlength="10">
            </div>
            <div class="form-group">
                <label for="car_model">Car Model:</label>
                <input type="text" class="form-control" id="car_model" name="car_model" required maxlength="30">
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="is_cab" name="is_cab" onchange="toggleDriverPhone()">
                <label class="form-check-label" for="is_cab">Is Cab</label>
            </div>
            <div class="form-group" id="driver_phone_group">
                <label for="driver_phone">Driver Phone:</label>
                <input type="text" class="form-control" id="driver_phone" name="driver_phone" pattern="\d{10}" title="Please enter a valid 10-digit phone number">
            </div>
            <div class="form-group">
                <label for="cost">Cost:</label>
                <input type="number" class="form-control" id="cost" name="cost" required min="0" max="9999999999">
            </div>
            <div class="form-group">
                <label for="place">Place:</label>
                <select class="form-control" id="place" name="place" required>
                    <option value="">Select Place</option>
                    <option value="PY">Puducherry</option>
                    <option value="VI">Villupuram</option>
                    <option value="CU">Cuddalore</option>
                    <option value="KA">Karaikal</option>
                </select>
            </div>

            <div class="form-group">
                <label for="car_image">Car Image:</label>
                <input type="file" class="form-control-file" id="car_image" name="car_image" required accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary">Add Car</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function toggleDriverPhone() {
            var isCabChecked = document.getElementById('is_cab').checked;
            var driverPhoneGroup = document.getElementById('driver_phone_group');
            if (isCabChecked) {
                driverPhoneGroup.style.display = 'block';
            } else {
                driverPhoneGroup.style.display = 'none';
            }
        }
    </script>
</body>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cars";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $car_no = $_POST['car_no'];
    $car_model = $_POST['car_model'];
    $is_cab = isset($_POST['is_cab']) ? 1 : 0;
    $cost = $_POST['cost'];
    $driver_phone = $_POST['driver_phone'];
    $place = $_POST['place'];

    // Handle file upload
    $target_dir = "images/";
    $file_extension = pathinfo($_FILES["car_image"]["name"], PATHINFO_EXTENSION);
    $random_number = rand(100000, 999999);
    $new_file_name = "{$car_no}_{$car_model}_{$random_number}.{$file_extension}";
    $target_file = $target_dir . $new_file_name;

    if (move_uploaded_file($_FILES["car_image"]["tmp_name"], $target_file)) {
        $car_image = $new_file_name;
    } else {
        echo "Sorry, there was an error uploading your file.";
        exit;
    }

    $sql = "INSERT INTO city (car_no, car_model, iscab, cost, driver_phone, car_image,place)
            VALUES ('$car_no', '$car_model', '$is_cab', '$cost', '$driver_phone', '$car_image', '$place')";

    if ($conn->query($sql) === TRUE) {
        echo "New car added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

