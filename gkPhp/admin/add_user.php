<?php
/** @var mysqli $connect */
require_once __DIR__ . '/../connect.php';

if (isset($_POST['Them'])) {
    $email = $_POST['admin_email'];
    $password = $_POST['admin_password'];

    $images = $_FILES['image']['name'];
    $anh_tmp = $_FILES['image']['tmp_name'];

    move_uploaded_file($anh_tmp, "../imgs/" . $images);

    $sql = "INSERT INTO Users (admin_email, admin_password, images) 
            VALUES ('$email', '$password', '$images')";

    if (mysqli_query($connect, $sql)) {
        echo "<script>
                alert('Thêm người dùng thành công!');
                location.href = '../index.php';
              </script>";
    } else {
        echo "Lỗi: " . mysqli_error($connect);
    }
}
?>

