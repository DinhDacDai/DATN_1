<?php
// Thông tin kết nối MySQL
$servername = "localhost"; // Tên máy chủ MySQL
$username = "root"; // Tên người dùng MySQL
$password = ""; // Mật khẩu MySQL
$database = "project"; // Tên cơ sở dữ liệu MySQL
session_start();
// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $database);



// Kiểm tra kết nối
if ($conn->connect_error) 
    die("Kết nối thất bại: " . $conn->connect_error);
?>