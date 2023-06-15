<?php
// Establish a connection to the database
$servername = "localhost";
$dbname = "PMU";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve query results
if (isset($_POST['query1'])) {
    $weekday = $_POST['weekday'];
    $sql = "SELECT * FROM registrations WHERE weekdays LIKE '%$weekday%'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $output = "";
        while ($row = $result->fetch_assoc()) {
            $output .= "ID: " . $row['id'] . "\n";
            $output .= "Address: " . $row['address'] . "\n";
            // Include other fields as needed
            $output .= "\n";
        }
        echo $output;
    } else {
        echo "No users found.";
    }
} elseif (isset($_POST['query2'])) {
    $sql = "SELECT * FROM registrations WHERE qualification = 'Graduate' AND scholarship = 'No'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $output = "";
        while ($row = $result->fetch_assoc()) {
            $output .= "ID: " . $row['id'] . "\n";
            $output .= "Address: " . $row['address'] . "\n";
            // Include other fields as needed
            $output .= "\n";
        }
        echo $output;
    } else {
        echo "No users found.";
    }
} elseif (isset($_POST['query3'])) {
    $sql = "SELECT * FROM registrations WHERE gender = 'Female' AND qualification = 'Undergraduate' AND scholarship = 'No'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $output = "";
        while ($row = $result->fetch_assoc()) {
            $output .= "ID: " . $row['id'] . "\n";
            $output .= "Address: " . $row['address'] . "\n";
            // Include other fields as needed
            $output .= "\n";
        }
        echo $output;
    } else {
        echo "No users found.";
    }
}

$conn->close();
?>
