<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "travelscapes";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables for journey data
$city = $region = $season = $days = $cost = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve journey data from the form if available
    $city = isset($_POST["city"]) ? $_POST["city"] : "";
    $region = isset($_POST["region"]) ? $_POST["region"] : "";
    $season = isset($_POST["season"]) ? $_POST["season"] : "";
    $days = isset($_POST["days"]) ? $_POST["days"] : "";
    $cost = isset($_POST["cost"]) ? $_POST["cost"] : "";

    // Prepare a SQL statement to insert the journey
    $sql = "INSERT INTO cities (city, region, season, days, cost) VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("sssid", $city, $region, $season, $days, $cost);

        if ($stmt->execute()) {
            // Insertion was successful
            echo "Journey added successfully. <a href='adminviewjourneys.php'>Back to journeys</a>";
            header("location: adminviewjourneys.php");
        } else {
            // Error occurred during insertion
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error in the prepared statement: " . $conn->error;
    }
} else {
    echo "Form not submitted.";
}

$conn->close();
?>

