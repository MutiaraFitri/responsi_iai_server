<?php
$servername = "sql12.freemysqlhosting.net";
$username = "sql12289798";
$password = "URvWd29UwW";
$db = 'sql12289798';

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

$code = 404;
$message = "data not found";
$rows = array();
$key = "unknown";

if(isset($_GET['key'])){
    $key = $_GET['key'];
    $cari = "SELECT * FROM users WHERE key_api='".$_GET['key']."'";
    $isAda = $conn->query($cari);

    if(mysqli_num_rows($isAda)==1){
        $sql = "SELECT * FROM restoran";
        $result = $conn->query($sql);
        $code = 200;
        $message = "success";
        // print_r($sql);

        while($r = mysqli_fetch_assoc($result)){
            $rows[] = $r;
        }
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        // echo "Connected successfully";
        // return $rows;
    }
    else {
        // key kosong
        $code = 402;
        $message = "Invalid key.";
    }
}
else {
    // key kosong
    $code = 402;
    $message = "Invalid key.";
}
$base_api = array(
    "name" => "Mahdojan Restoran API",
    "code" => $code,
    "message" => $message,
    "results" => $rows);

$rows = json_encode($base_api);
print_r($rows);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
// echo "Connected successfully";
// return $rows;

$request = "3 : Search by Name";

$offset=7*60*60; //converting 5 hours to seconds.
$dateFormat="d-m-Y H:i:s";
$time=gmdate($dateFormat, time()+$offset);
$request = "1. Get All data";
$ip = $_SERVER['REMOTE_ADDR'];
$conn = new mysqli($servername, $username, $password, $db);

$sqlku = "INSERT INTO logs (
    id, key_api, time_req, request,kode_response, response, ip
    )
VALUES (
    null,'$key','$time','$request','$code','$message','$ip'
    )";
$resultkus = $conn->query($sqlku);
?>