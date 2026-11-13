<?php

/** @var mysqli $connect */
require_once __DIR__ . '/../connect.php';

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];

    $sql = "DELETE FROM Users WHERE admin_id = $id";

    if (mysqli_query($connect, $sql)) {
        mysqli_query($connect, "SET @count = 0");
        mysqli_query($connect, "UPDATE Users SET admin_id = (@count := @count + 1) ORDER BY admin_id ASC");
        mysqli_query($connect, "ALTER TABLE Users AUTO_INCREMENT = 1");

        echo "<script>
                alert('Xóa người dùng thành công!');
                location.href = 'users_manage.php';
              </script>";
    } else {
        echo "Lỗi khi xóa: " . mysqli_error($connect);
    }
} else {
    header('Location: users_manage.php');
}
