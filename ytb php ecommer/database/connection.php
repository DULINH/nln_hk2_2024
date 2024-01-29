<?php
$host = 'localhost'; 
$dbname = 'nln_hk2_2024'; 
$username = 'root'; 
$password = ''; 

try {
    // Tạo kết nối PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Đã kết nối thành công tới cơ sở dữ liệu!!";
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>