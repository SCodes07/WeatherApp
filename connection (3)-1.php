<?php
$serverName = "sql202.infinityfree.com";
$userName = "if0_39030746";
$password = "QxWk4HLQDyWTEe";
$dbName = "if0_39030746_sapanaweather";

// Connect to MySQL
$conn = mysqli_connect($serverName, $userName, $password);

if (!$conn) {
    die(json_encode(["error" => "Connection failed: " . mysqli_connect_error()]));
}

// Create DB and table
//mysqli_query($conn, "CREATE DATABASE IF NOT EXISTS $dbName");
mysqli_select_db($conn, $dbName);

$createTable = "CREATE TABLE IF NOT EXISTS weather (
    id INT AUTO_INCREMENT PRIMARY KEY,
    city VARCHAR(100) NOT NULL,
    temp FLOAT,
    humidity FLOAT,
    pressure FLOAT,
    wind_speed FLOAT,
    wind_deg FLOAT,
    description VARCHAR(255),
    icon VARCHAR(10),
    timezone INT,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
mysqli_query($conn, $createTable);

// Get city from query
$cityName = isset($_GET['q']) ? mysqli_real_escape_string($conn, $_GET['q']) : "Dhankuta";

// Check for recent data (within 30 minutes)
$query = "SELECT * FROM weather WHERE city = '$cityName' AND timestamp > NOW() - INTERVAL 30 MINUTE ORDER BY timestamp DESC LIMIT 1";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    // Return cached data
    $row = mysqli_fetch_assoc($result);
    $weatherData = [
        "name" => $row['city'],
        "main" => ["temp" => $row['temp'], "humidity" => $row['humidity'], "pressure" => $row['pressure']],
        "wind" => ["speed" => $row['wind_speed'], "deg" => $row['wind_deg']],
        "weather" => [["description" => $row['description'], "icon" => $row['icon']]],
        "timezone" => $row['timezone'],
        "cod" => 200
    ];
} else {
    // Fetch from API
    $apiKey = "a53ee006f886bb43dc4dc6777fe68d2c";
    $url = "https://api.openweathermap.org/data/2.5/weather?q=$cityName&appid=$apiKey&units=metric";
    $response = file_get_contents($url);
    $data = json_decode($response, true);

    if (!$data || $data['cod'] != 200) {
        http_response_code(404);
        echo json_encode(["error" => "City not found"]);
        exit;
    }

    // Extract data
    $temp = $data['main']['temp'];
    $humidity = $data['main']['humidity'];
    $pressure = $data['main']['pressure'];
    $wind_speed = $data['wind']['speed'];
    $wind_deg = $data['wind']['deg'];
    $description = $data['weather'][0]['description'];
    $icon = $data['weather'][0]['icon'];
    $timezone = $data['timezone'];

    // Insert into DB
    $insert = "INSERT INTO weather (city, temp, humidity, pressure, wind_speed, wind_deg, description, icon, timezone)
               VALUES ('$cityName', '$temp', '$humidity', '$pressure', '$wind_speed', '$wind_deg', '$description', '$icon', '$timezone')";
    mysqli_query($conn, $insert);

    // Prepare response
    $weatherData = [
        "name" => $cityName,
        "main" => ["temp" => $temp, "humidity" => $humidity, "pressure" => $pressure],
        "wind" => ["speed" => $wind_speed, "deg" => $wind_deg],
        "weather" => [["description" => $description, "icon" => $icon]],
        "timezone" => $timezone,
        "cod" => 200
    ];
}

// Output JSON
header('Content-Type: application/json');
echo json_encode($weatherData);
?>
