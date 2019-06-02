<?php
$servername = 'sql12.freemysqlhosting.net';
$username = 'sql12289798';
$password = 'URvWd29UwW';
$db = 'sql12289798';

// Create connection
$conn = new mysqli($servername, $username, $password, $db);
$message = "";
$id = null;
$rows = array();
$code = 200;
if(isset($_GET['key'])){
    $key = $_GET['key'];
    $cari = "SELECT * FROM users WHERE key_api='".$_GET['key']."'";
    $isAda = $conn->query($cari);

    if(mysqli_num_rows($isAda)==1){
        if(!isset($_GET['id_restoran'])){
            $message = "id restoran kosong atau tidak diisi";
            $code = 402;
        }
        else {
            $id = $_GET['id_restoran'];
            $sql = "SELECT * FROM restoran WHERE id_restoran=$id";
            $result = $conn->query($sql);
            
            if($result!=null){
                while($r = mysqli_fetch_assoc($result)){
                    $rows[] = $r;
                }
                $message = "success";
            }
            
            else {
                $message = "Data not Found";
                $code = 404;
            }
        }
    }else {
        $message = "Key invalid.";
        $code = 402;
    }
}else{
    $message = "Key invalid.";
    $code = 402;
}


$base_api = array(
    "nama_api" => "Mahdojan Restoran API",
    "author" => "Mutiara Fitri Tasir",
    "code" => $code,
    "message" => $message,
    "restoran" => $rows);

$rows = json_encode($base_api);
print_r($rows);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
// echo "Connected successfully";
// return $rows;

$request = "4 : Search by ID";

$offset=7*60*60; //converting 5 hours to seconds.
$dateFormat="d-m-Y H:i:s";
$time=gmdate($dateFormat, time()+$offset);

$ip = $_SERVER['REMOTE_ADDR'];
$conn = new mysqli($servername, $username, $password, $db);

$sqlku = "INSERT INTO logs (
    id, key_api, time_req, request,kode_response, response, ip
    )
VALUES (
    null,'$key','$time','$request','$code','$message','$ip'
    )";
$resultkus = $conn->query($sqlku);
// echo "Connected successfully";
// return $rows;
?>