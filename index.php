<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "uas";

$conn=new mysqli($server,$username,$password,$dbname);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>