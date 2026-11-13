<?php
$connect = mysqli_connect('localhost', 'root', '', 'QLNhanSu');

if (mysqli_connect_errno() !== 0) {
    die("Lỗi kết nối CSDL: " . mysqli_connect_error());
}

mysqli_set_charset($connect, 'utf8mb4');
