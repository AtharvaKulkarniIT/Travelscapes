<?php
// Database connection parameters
$servername = "localhost"; // Change this to your database server name
$username = "root";        // Change this to your database username
$password = "";            // Change this to your database password
$dbname = "travelscapes";  // Change this to your database name

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve hotel details
$hotelId = 1; // You should replace this with the actual hotel ID
$hotelDetails = [];

// Fetch hotel details from the "hotels" table
$hotelSql = "SELECT * FROM hotels WHERE hotelid = $hotelId";
$hotelResult = $conn->query($hotelSql);

if ($hotelResult->num_rows > 0) {
    $row = $hotelResult->fetch_assoc();
    $hotelDetails['hotelName'] = $row['hotel'];
    $hotelDetails['hotelCost'] = $row['cost'];
    // Add more fields as needed
}

// Fetch city name from the "cities" table
$cityId = 1; // You should replace this with the actual city ID
$cityName = "";

$citySql = "SELECT city FROM cities WHERE cityid = $cityId";
$cityResult = $conn->query($citySql);

if ($cityResult->num_rows > 0) {
    $row = $cityResult->fetch_assoc();
    $cityName = $row['city'];
}

// Calculate initial cost (without tourists and date)
$initialCost = $hotelDetails['hotelCost'] * 5; // Replace 5 with actual journey days

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/booking.css">
    <title>Booking Page</title>
</head>
<body>
    <div class="card-container">
        <div class="booking-details">
            <h2>Booking Details</h2>
            <p>City Name: <?php echo $cityName; ?></p>
            <p>Hotel Name: <?php echo $hotelDetails['hotelName']; ?></p>
        </div>

        <form method="post" action="payment.php">
            <h2>Booking Form</h2>
            <input type="text" name="name" placeholder="Name" required><br>
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="number" name="tourists" id="touristsInput" placeholder="Number of Tourists" required><br>
            <label for="dob">Date of Birth:</label>
            <input type="date" name="dob" id="dob" required><br>
            <input type="tel" name="contact" placeholder="Contact Number" required><br>

            <p>Cost: Rs. <span id="calculatedCost"><?php echo $initialCost; ?></span></p>

            <button type="submit" name="proceed" value="Proceed">Proceed for Payment</button>
        </form>
    </div>

    <script>
        // JavaScript to calculate cost based on tourists and days
        const touristsInput = document.getElementById("touristsInput");
        const calculatedCost = document.getElementById("calculatedCost");

        // Initial cost fetched from the server
        let initialCost = <?php echo $initialCost; ?>;
        calculatedCost.textContent = initialCost;

        touristsInput.addEventListener("input", calculateCost);

        function calculateCost() {
            const tourists = parseInt(touristsInput.value) || 0;
            const days = <?php echo $journeyDays; ?>; // Replace with actual journey days from the database

            const totalCost = initialCost * tourists * days;
            calculatedCost.textContent = totalCost;
        }
    </script>
</body>
</html>
