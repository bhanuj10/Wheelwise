<?php include 'includes/header.php'; ?>

<div class="container my-5">
    <div class="row">
        <div class="col-md-8">
            <h1>Your Ultimate Car Rental Companion</h1>
            <p>Welcome to WheelWise, the premier car rental management application designed to streamline your rental experience like never before.</p>
            <p>Whether you're a seasoned traveler, a business professional, or simply in need of wheels for a weekend getaway, WheelWise has you covered with a seamless and intuitive platform.</p>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Sign In / Login</h5>
                    <form>
                        <!-- Add sign-in/login form fields here -->
                        <button type="submit" class="btn btn-primary">Sign In</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-4">
            <div class="card">
                <img src="images/suv.jpg" class="card-img-top" alt="SUV">
                <div class="card-body">
                    <h5 class="card-title">SUV</h5>
                    <p class="card-text">Powerful, versatile, and spacious, SUVs to conquer every ride with comfort and style.</p>
                    <a href="suv.php" class="btn btn-primary">Rent SUV</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="images/premium_cars.jpg" class="card-img-top" alt="Premium Cars">
                <div class="card-body">
                    <h5 class="card-title">Premium Cars</h5>
                    <p class="card-text">Experience unparalleled elegance and performance with our luxury car collection, where every ride is a statement of sophistication.</p>
                    <a href="premium_cars.php" class="btn btn-primary">Rent Premium Car</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="images/cab.jpg" class="card-img-top" alt="Cab">
                <div class="card-body">
                    <h5 class="card-title">Go for a Cab</h5>
                    <p class="card-text">Enjoy hassle-free rides with our taxi feature, offering quick and reliable transportation at your fingertips.</p>
                    <a href="cab.php" class="btn btn-primary">Book a Cab</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>