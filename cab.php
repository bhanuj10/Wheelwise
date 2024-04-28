<?php include 'includes/header.php'; ?>

<div class="container my-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Book a Cab</h1>
            <p class="text-center">Enjoy hassle-free rides with our taxi feature, offering quick and reliable transportation at your fingertips.</p>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Book Your Cab</h5>
                    <form>
                        <div class="mb-3">
                            <label for="pickup" class="form-label">Pickup Location</label>
                            <input type="text" class="form-control" id="pickup" placeholder="Enter pickup location">
                        </div>
                        <div class="mb-3">
                            <label for="destination" class="form-label">Destination</label>
                            <input type="text" class="form-control" id="destination" placeholder="Enter destination">
                        </div>
                        <button type="submit" class="btn btn-primary">Book Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>