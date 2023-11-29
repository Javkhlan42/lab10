<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "itu";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$ID = $_POST['ID'];

$sql = "SELECT * FROM product_information WHERE ID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $ID);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    echo "0 results";
}

$stmt->close();
$conn->close();
?>
