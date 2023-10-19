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


$selectedRegions = [];
$selectedSeasons = [];
$selectedDays = [];

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve filter values from the form
    $selectedRegions = isset($_POST["region"]) ? $_POST["region"] : [];
    $selectedSeasons = isset($_POST["season"]) ? $_POST["season"] : [];
    $selectedDays = isset($_POST["days"]) ? $_POST["days"] : [];
}

// Build the SQL query based on selected filters
$sql = "SELECT * FROM cities WHERE 1"; 


if (!empty($selectedRegions)) {
    if (!in_array("All", $selectedRegions)) {
        $sql .= " AND region IN ('" . implode("','", $selectedRegions) . "')";
    }
} else {
    $selectedRegions = ["All"]; 
}


if (!empty($selectedSeasons)) {
    if (!in_array("All", $selectedSeasons)) {
        $sql .= " AND season IN ('" . implode("','", $selectedSeasons) . "')";
    }
} else {
    $selectedSeasons = ["All"]; 
}

if (!empty($selectedDays)) {
    if (!in_array("All", $selectedDays)) {
        $sql .= " AND days IN ('" . implode("','", $selectedDays) . "')";
    }
} else {
    $selectedDays = ["All"]; 
}

// Execute the SQL query
$result = $conn->query($sql);

// Create an array to store the data
$data = [];

// Loop through the results and add them to the array
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="./css/cities.css">
    <script>
        function toggleDropdown(filterName) {
            var dropdownContent = document.getElementById(filterName + "Dropdown");
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block";
            }
        }
    </script>
</head>
<body>
    <div class="navbar">
    <span class="logo">Travelscapes</span>
</div>
<div class="content-container">

    <h1>Travel Packages</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="filter-box">
            <div class="custom-dropdown">
                <span onclick="toggleDropdown('region')">Region</span>
                <div id="regionDropdown" class="custom-dropdown-content">
                    <label><input type="checkbox" name="region[]" value="All" <?php if (in_array("All", $selectedRegions)) echo "checked"; ?>>All</label>
                    <label><input type="checkbox" name="region[]" value="North" <?php if (in_array("North", $selectedRegions)) echo "checked"; ?>>North</label>
                    <label><input type="checkbox" name="region[]" value="South" <?php if (in_array("South", $selectedRegions)) echo "checked"; ?>>South</label>
                    <label><input type="checkbox" name="region[]" value="East" <?php if (in_array("East", $selectedRegions)) echo "checked"; ?>>East</label>
                    <label><input type="checkbox" name="region[]" value="West" <?php if (in_array("West", $selectedRegions)) echo "checked"; ?>>West</label>
                    <label><input type="checkbox" name="region[]" value="Central" <?php if (in_array("Central", $selectedRegions)) echo "checked"; ?>>Central</label>
                    <label><input type="checkbox" name="region[]" value="North-East" <?php if (in_array("North-East", $selectedRegions)) echo "checked"; ?>>North-East</label>

                </div>
            </div>
        
            <div class="custom-dropdown">
                <span onclick="toggleDropdown('season')">Season</span>
                <div id="seasonDropdown" class=" custom-dropdown-content">
                    <label><input type="checkbox" name="season[]" value="All" <?php if (in_array("All", $selectedSeasons)) echo "checked"; ?>>All</label>
                    <label><input type="checkbox" name="season[]" value="Winter" <?php if (in_array("Winter", $selectedSeasons)) echo "checked"; ?>>Winter</label>
                    <label><input type="checkbox" name="season[]" value="Summer" <?php if (in_array("Summer", $selectedSeasons)) echo "checked"; ?>>Summer</label>
                    <label><input type="checkbox" name="season[]" value="Monsoon" <?php if (in_array("Monsoon", $selectedSeasons)) echo "checked"; ?>>Monsoon</label>
                    <label><input type="checkbox" name="season[]" value="Spring" <?php if (in_array("Spring", $selectedSeasons)) echo "checked"; ?>>Spring</label>
                    <label><input type="checkbox" name="season[]" value="Autumn" <?php if (in_array("Autumn", $selectedSeasons)) echo "checked"; ?>>Autumn</label>

                </div>
            </div>

            <div class="custom-dropdown">
                <span onclick="toggleDropdown('days')">Days</span>
                <div id="daysDropdown" class="custom-dropdown-content">
                    <label><input type="checkbox" name="days[]" value="All" <?php if (in_array("All", $selectedDays)) echo "checked"; ?>>All</label>
                    <label><input type="checkbox" name="days[]" value="3" <?php if (in_array("3", $selectedDays)) echo "checked"; ?>>3</label>
                    <label><input type="checkbox" name="days[]" value="5" <?php if (in_array("5", $selectedDays)) echo "checked"; ?>>5</label>
                    <label><input type="checkbox" name="days[]" value="7" <?php if (in_array("7", $selectedDays)) echo "checked"; ?>>7</label>

                </div>
            </div>
        </div>
        
        <input type="submit" value="Apply">
    </form>

    <?php
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>City ID</th>"; 
    echo "<th>City</th>";
    echo "<th>Region</th>";
    echo "<th>Season</th>";
    echo "<th>Days</th>";
    echo "<th>Cost</th>";
    echo "<th>Action</th>";
    echo "</tr>";

 
    foreach ($data as $row) {
        echo "<tr>";
        echo "<td>" . $row["cityid"] . "</td>"; 
        echo "<td>" . $row["city"] . "</td>"; 
        echo "<td>" . $row["region"] . "</td>";
        echo "<td>" . $row["season"] . "</td>";
        echo "<td>" . $row["days"] . "</td>";
        echo "<td>Rs " . $row["cost"] . "</td>";
        echo "<td><a href='viewjourney.php?city_id=" . $row["cityid"] . "' class='view-button'>View Journey</a></td>"; 
        echo "</tr>";
    }

    echo "</table>";
    $conn->close();
    ?>
    </div>
    <footer>
    <p>&copy; 2023 Travelscapes. All rights reserved.</p>
</footer>


</body>

</html>
