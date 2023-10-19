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

// Initialize variables
$cityId = $_GET['city_id']; // Assuming you pass the city ID in the URL

// Fetch city details from the database
$sql = "SELECT * FROM cities WHERE cityid = $cityId";
$result = $conn->query($sql);



$folderPath = './Places/';
$allowedExtensions = array('jpg', 'jpeg', 'png', 'gif');
$imageArray = array();

// Retrieve image files from the folder
$files = scandir($folderPath);

foreach ($files as $file) {
    $fileInfo = pathinfo($file);
    $extension = strtolower($fileInfo['extension']);

    if (in_array($extension, $allowedExtensions)) {
        // It's an image file, so add it to the array
        $imageArray[] = $folderPath . $file;
    }
}

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $city = $row['city'];
    $region = $row['region'];
    $season = $row['season'];
    $days = $row['days'];
    $cost = $row['cost'];
} else {
    echo "City not found.";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="./css/viewjourney.css">
    <title><?php echo $city; ?> Details</title>
</head>
<body> 
    <div class="navbar">
    <span class="logo">Travelscapes</span>
</div>
<div class="content-container">
    <h1>>> <?php echo $city; ?> << </h1>
    
    <div class="city-card">
    <div class="city-images">
    <img src="<?php echo $imageArray[$cityId-1]; ?>" alt="Image Alt Text">
</div>

        <div class="city-details">
            <p><strong>City:</strong> <?php echo $city; ?></p>
            <p><strong>Region:</strong> <?php echo $region; ?></p>
            <p><strong>Season:</strong> <?php echo $season; ?></p>
            <p><strong>Days:</strong> <?php echo $days; ?></p>
            <p><strong>Cost:</strong> Rs <?php echo $cost; ?></p>
        </div>
        <div class="view-hotels-button">
            <a href="view_hotels.php?city_id=<?php echo $cityId; ?>" class="view-button">View Hotels</a>
        </div>
    </div>

    <?php
    $conn->close();
    ?>
    </div>
    <footer>
    <p>&copy; 2023 Travelscapes. All rights reserved.</p>
</footer>

</body>
</html>
