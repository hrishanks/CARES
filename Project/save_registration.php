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

// Retrieve form data
$name= $_POST['name'];
$address = $_POST['address'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$birthdate = $_POST['birthdate'];
$gender = $_POST['gender'];
$qualification = $_POST['qualification'];
$weekdays = implode(", ", $_POST['weekdays']);
$scholarship = $_POST['scholarship'];
$comments = $_POST['comments'];
$photo = $_FILES['photo']['name'];

$sql = "INSERT INTO registrations (name, address, email, phone, birthdate, gender, qualification, weekdays, scholarship, comments, photo)
        VALUES ('$name','$address', '$email', '$phone', '$birthdate', '$gender', '$qualification', '$weekdays', '$scholarship', '$comments', '$photo')";

if ($conn->query($sql) === TRUE) {
    echo "Data saved successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
