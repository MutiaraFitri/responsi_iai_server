<?php
$servername = 'sql12.freemysqlhosting.net';
$username = 'sql12289798';
$password = 'URvWd29UwW';
$db = 'sql12289798';

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

$sql = "SELECT * FROM restoran";
$result = $conn->query($sql);

// print_r($sql);

$rows = array();
while($r = mysqli_fetch_assoc($result)){
    $rows[] = $r;
}

$base_api = array(
    "nama_api" => "Mahdojan Restoran API",
    "author" => "Mutiara Fitri Tasir",
    "restoran" => $rows);

$rows = json_encode($base_api);
print_r($rows);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
// echo "Connected successfully";
// return $rows;
?>