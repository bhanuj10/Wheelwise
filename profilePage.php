<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .profile {
            background-color: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .profile h2 {
            color: #333;
            margin-bottom: 30px;
            text-align: center;
        }

        .form-group label {
            font-weight: bold;
            color: #555;
        }

        #profilePicContainer {
            position: relative;
            text-align: center;
        }

        #profilePic {
            display: inline-block;
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            border: 5px solid #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        #profilePicInput {
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }

        .btn-primary,
        .btn-secondary {
            width: 120px;
        }

        .btn-primary:hover,
        .btn-secondary:hover {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 profile">
                <h2>User Profile</h2>
                <form id="profileForm">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group" id="profilePicContainer">
                                <label for="profilePic">Profile Picture</label>
                                <img id="profilePic" src="placeholder.jpg" alt="Profile Picture">
                                <input type="file" class="form-control-file" id="profilePicInput" accept="image/*" onchange="displayProfilePic(event)">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter your name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
                            </div>
                            <div class="form-group">
                                <label for="whatsapp">WhatsApp Number</label>
                                <input type="tel" class="form-control" id="whatsapp" placeholder="Enter your WhatsApp number" required>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea class="form-control" id="address" rows="3" placeholder="Enter your address" required></textarea>
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
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary ml-2" id="editProfileBtn">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function displayProfilePic(event) {
            const input = event.target;
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('profilePic').src = e.target.result;
                    document.getElementById('profilePicInput').style.display = 'none'; // Hide file input
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
