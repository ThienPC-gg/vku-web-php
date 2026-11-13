<?php

/** @var mysqli $connect */
require_once __DIR__ . '/../connect.php';

if (!isset($_GET['id'])) {
    header('Location: users_manage.php');
    exit;
}

$id = (int)$_GET['id'];

$sql = "SELECT * FROM Users WHERE admin_id = $id";
$result = mysqli_query($connect, $sql);
$user = mysqli_fetch_assoc($result);

if (!$user) {
    echo "<script>alert('Không tìm thấy người dùng!'); location.href='users_manage.php';</script>";
    exit;
}

if (isset($_POST['Sua'])) {
    $email = $_POST['admin_email'];
    $password = $_POST['admin_password'];
    $images = $_POST['ten_anh_cu'];

    if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != "") {
        $images = $_FILES['image']['name'];
        $anh_tmp = $_FILES['image']['tmp_name'];
        move_uploaded_file($anh_tmp, "../imgs/" . $images);
    }

    $update_sql = "UPDATE Users 
                   SET admin_email = '$email', 
                       admin_password = '$password', 
                       images = '$images' 
                   WHERE admin_id = $id";

    if (mysqli_query($connect, $update_sql)) {
        echo "<script>
                alert('Cập nhật người dùng thành công!');
                location.href = 'users_manage.php';
              </script>";
        exit;
    } else {
        echo "Lỗi cập nhật: " . mysqli_error($connect);
    }
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Người Dùng - QLNhanSu</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="session">
        <div class="left">
            <svg enable-background="new 0 0 300 302.5" version="1.1" viewBox="0 0 300 302.5" xml:space="preserve"
                xmlns="http://www.w3.org/2000/svg">
                <style type="text/css">
                    .st0 {
                        fill: #fff;
                    }
                </style>
                <path class="st0"
                    d="m126 302.2c-2.3 0.7-5.7 0.2-7.7-1.2l-105-71.6c-2-1.3-3.7-4.4-3.9-6.7l-9.4-126.7c-0.2-2.4 1.1-5.6 2.8-7.2l93.2-86.4c1.7-1.6 5.1-2.6 7.4-2.3l125.6 18.9c2.3 0.4 5.2 2.3 6.4 4.4l63.5 110.1c1.2 2 1.4 5.5 0.6 7.7l-46.4 118.3c-0.9 2.2-3.4 4.6-5.7 5.3l-121.4 37.4zm63.4-102.7c2.3-0.7 4.8-3.1 5.7-5.3l19.9-50.8c0.9-2.2 0.6-5.7-0.6-7.7l-27.3-47.3c-1.2-2-4.1-4-6.4-4.4l-53.9-8c-2.3-0.4-5.7 0.7-7.4 2.3l-40 37.1c-1.7 1.6-3 4.9-2.8 7.2l4.1 54.4c0.2 2.4 1.9 5.4 3.9 6.7l45.1 30.8c2 1.3 5.4 1.9 7.7 1.2l52-16.2z" />
            </svg>
        </div>
        <form action="" method="post" enctype="multipart/form-data" class="log-in" autocomplete="off">
            <h4>SỬA <span>USER #<?php echo $user['admin_id']; ?></span></h4>
            <p style="margin-bottom: 15px;">Chỉnh sửa thông tin người dùng:</p>

            <div class="floating-label">
                <input placeholder="Email" type="email" name="admin_email" id="email"
                    value="<?php echo htmlspecialchars($user['admin_email']); ?>" required>
                <label for="email">Email:</label>
            </div>

            <div class="floating-label">
                <input placeholder="Password" type="text" name="admin_password" id="password"
                    value="<?php echo htmlspecialchars($user['admin_password']); ?>" required>
                <label for="password">Password:</label>
            </div>

            <div style="margin: 10px 0;">
                <span style="font-size: 12.5px; color: #555;">Ảnh hiện tại:</span><br>
                <img src="../imgs/<?php echo htmlspecialchars($user['images']); ?>"
                    alt="Current Image" style="width: 60px; height: 60px; object-fit: cover; border-radius: 6px; margin-top: 5px; border: 1px solid #ddd;">
                <input type="hidden" name="ten_anh_cu" value="<?php echo htmlspecialchars($user['images']); ?>">
            </div>

            <div class="floating-label">
                <input type="file" name="image" id="image" accept="image/*">
                <label for="image">Chọn ảnh mới (nếu đổi):</label>
            </div>

            <button type="submit" name="Sua">Lưu thay đổi</button>
            <a href="users_manage.php" class="discrete">← Quay lại danh sách</a>
        </form>
    </div>
</body>

</html>