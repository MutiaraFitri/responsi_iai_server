<?php
$servername = 'sql12.freemysqlhosting.net';
$username = 'sql12289798';
$password = 'URvWd29UwW';
$db = 'sql12289798';

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

$kelinci = "
(SELECT COUNT(kode_admin) as nilai FROM restoran where kode_admin='Kelinci')
union
(SELECT COUNT(kode_admin) as nilai FROM restoran where kode_admin='Marmut')
union
(SELECT COUNT(kode_admin) as nilai FROM restoran where kode_admin='Beruang')
union
(SELECT COUNT(kode_admin) as nilai FROM restoran where kode_admin='Panda')";
$kelinci_r = $conn->query($kelinci);

$row_k = array();
while($s = mysqli_fetch_assoc($kelinci_r)){
    $rows_k[] = $s;
}
// print_r($sql);
$code = 200;

$base_api = array(
    "nama" => "Total Input",
    "jumlah" => $rows_k
);

$rows = json_encode($base_api);
print_r($rows);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
// echo "Connected successfully";
// return $rows;
?>