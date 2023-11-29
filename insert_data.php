<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "itu";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$data = json_decode(file_get_contents('php://input'), true);

$ID = $data['ID'];
$Name = $data['Name'];
$Description = $data['Description'];

$sql = "INSERT INTO product_information (ID, Name, Description) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $ID, $Name, $Description);

if ($stmt->execute()) {
    echo "Data inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
?>
