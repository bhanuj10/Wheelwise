
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Help & Feedback</title>
    <style>
        /* Add your CSS styles here */
        /* This is just a basic example, you can style it according to your website's design */
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        h2 {
            margin-top: 0;
        }
        form {
            margin-top: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        textarea {
            height: 150px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Help & Feedback</h2>
        <p>Thank you for using our Wheelwise service. Please use the form below to send us your feedback or to ask for assistance.</p>
        <form action="help_feedback.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Your name (optional)" value="" maxlength="20">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Your email address" maxlength="20" required>
            <label for="subject">Subject:</label>
            <input type="text" id="subject" name="subject" placeholder="Subject" maxlength="100" required>
            <label for="message">Message:</label>
            <textarea id="message" name="message" placeholder="Your message" maxlength="1000" required></textarea>
            <input type="submit" value="Submit">
        </form>
        <p>If you prefer to contact us via email directly, please send your message to <a href="mailto:bhanuj@wheelwise.com">info@wheelwise.com</a>.</p>
    </div>
</body>
</html>
<?php 
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $server = "localhost";
        $user = "root";
        $pass = "";
        $db = "cars";

        $conn = new mysqli($server, $user, $pass, $db);
        if ($conn->connect_error) {
            die("Connection error: " . $conn->connect_error);
        }
        $name = $_POST['name'];
        $email = $_POST['email'];

        $subject = $_POST['subject'];
        $message = $_POST['message'];


        $sql = "INSERT INTO feedback(name,email,subject,message) VALUES(?,?,?,?);";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $name,$email,$subject,$message);
        $stmt->execute();
        
        
        if(isset($_COOKIE['phpuserid'])){    
            echo '<script>
            alert("Submitted Succesfully!");
            setTimeout(function() {
                window.location.href = "index2.php";
            }, 500);
            </script>';
        }
        else{
            
            echo '<script>
            alert("Submitted Succesfully!");
            setTimeout(function() {
                window.location.href = "index.php";
            }, 500);
            </script>';
        }

    }
?>