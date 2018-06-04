
<?php
// database-config.php
$servername = "localhost";
$username = "root";
$password = "";
$database = "QuanLyCauThu";
 
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
 $conn->query("SET NAMES 'utf8'");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";
 ?>