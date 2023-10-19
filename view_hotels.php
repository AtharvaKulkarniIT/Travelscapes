<?php
// Database connection parameters
$servername = "localhost"; 
$username = "root";        
$password = "";            
$dbname = "travelscapes";  

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables
$cityId = $_GET['city_id']; // Assuming you pass the city ID in the URL

// Fetch the city name
$cityName = '';
$citySql = "SELECT city FROM cities WHERE cityid = $cityId";
$cityResult = $conn->query($citySql);

if ($cityResult->num_rows > 0) {
    $row = $cityResult->fetch_assoc();
    $cityName = $row['city'];
}

// Fetch hotels in the specified city by name from the database
$sql = "SELECT * FROM hotels WHERE cityid = $cityId";
$result = $conn->query($sql);

// Filter variables
$selectedCost = isset($_POST["cost"]) ? $_POST["cost"] : "All";
$selectedRatings = isset($_POST["ratings"]) ? $_POST["ratings"] : "All";

// Filter SQL conditions
$costCondition = "";
$ratingsCondition = "";

if ($selectedCost !== "All") {
    switch ($selectedCost) {
        case "less":
            $costCondition = "cost < 3000";
            break;
        case "between":
            $costCondition = "cost >= 3000 AND cost <= 6000";
            break;
        case "above":
            $costCondition = "cost > 6000";
            break;
    }
}

if ($selectedRatings !== "All") {
    switch ($selectedRatings) {
        case "below":
            $ratingsCondition = "ratings < 3";
            break;
        case "above":
            $ratingsCondition = "ratings >= 3";
            break;
    }
}

// Add filters to the SQL query
if ($costCondition || $ratingsCondition) {
    $sql = "SELECT * FROM hotels WHERE cityid = $cityId";
    if ($costCondition) {
        $sql .= " AND " . $costCondition;
    }
    if ($ratingsCondition) {
        $sql .= " AND " . $ratingsCondition;
    }

    $result = $conn->query($sql);
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="./css/hotels.css"> 
    <title>Travelscapes</title>
</head>
<body>
<div class="navbar">
    <span class="logo">Travelscapes</span>
</div>
<div class="content-container">
Hotels in <?php echo $cityName; ?>
    <h1>Hotels in <?php echo $cityName; ?></h1>
    
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'] . "?city_id=$cityId"; ?>">
        <h3>Filters</h3>
        <div class="filter-container">
            <div class="filter-select">
                <label>Cost:
                    <select name="cost">
                        <option value="All" <?php if ($selectedCost === "All") echo "selected"; ?>>All</option>
                        <option value="less" <?php if ($selectedCost === "less") echo "selected"; ?>>Less than 3000</option>
                        <option value="between" <?php if ($selectedCost === "between") echo "selected"; ?>>3000 - 6000</option>
                        <option value="above" <?php if ($selectedCost === "above") echo "selected"; ?>>Above 6000</option>
                    </select>
                </label>
            </div>

            <div class="filter-select">
                <label>Ratings:
                    <select name="ratings">
                        <option value="All" <?php if ($selectedRatings === "All") echo "selected"; ?>>All</option>
                        <option value="below" <?php if ($selectedRatings === "below") echo "selected"; ?>>Below 3</option>
                        <option value="above" <?php if ($selectedRatings === "above") echo "selected"; ?>>3 and Above</option>
                    </select>
                </label>
            </div>

            <div class="filter-select">
                <input type="submit" value="Apply Filters">
            </div>
        </div>
    </form>

    <?php
    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>Hotel ID</th>";
        echo "<th>Hotel Name</th>";
        echo "<th>City ID</th>";
        echo "<th class='amenities-column'>Amenities</th>";
        echo "<th>Cost</th>";
        echo "<th>Ratings</th>";
        echo "<th>Action</th>";
        echo "</tr>";

        // Loop through the hotel data and display it in the table
        while ($row = $result->fetch_assoc()) {
            $amenities = explode(',', $row['amenities']); // Split multiple amenities into an array

            echo "<tr>";
            echo "<td>" . $row['hotelid'] . "</td>";
            echo "<td>" . $row['hotel'] . "</td>";
            echo "<td>" . $row['cityid'] . "</td>";
            echo "<td class='amenities-column'>" . 
                 "<div class='amenities-list'>" . 
                 join("<br>", array_map(function ($index, $amenity) {
                     return "<span class='amenity-item'>{$index}. {$amenity}</span>";
                 }, range(1, count($amenities)), $amenities)) . 
                 "</div>" .
                 "Hover here"; 
            echo "</td>";
            echo "<td>" . $row['cost'] . "</td>";
            echo "<td>" . $row['ratings'] . "</td>";
            echo "<td><a href='booking.php?hotel_id=" . $row['hotelid'] . "' class='book-button'>Book Now</a></td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No hotels found in " . $cityName;
    }
    ?>

    <?php
    // Close the database connection
    $conn->close();
    ?>
    </div>
    <footer>
    <p>&copy; 2023 Travelscapes. All rights reserved.</p>
</footer>
</body>
</html>

