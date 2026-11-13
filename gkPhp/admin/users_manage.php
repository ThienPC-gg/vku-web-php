<?php

/** @var mysqli $connect */
require_once __DIR__ . '/../connect.php';

$sql = "SELECT * FROM Users ORDER BY admin_id ASC";
$result = mysqli_query($connect, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f3f2f2;
            font-family: -apple-system, BlinkMacSystemFont, "San Francisco", Helvetica, Arial, sans-serif;
            color: #222;
        }

        .table-avatar {
            width: 48px;
            height: 48px;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid #a17fe0;
        }

        .btn-purple {
            background-color: #a17fe0;
            color: #fff;
            border-radius: 24px;
            padding: 10px 24px;
            font-weight: 500;
            border: none;
            box-shadow: 0 4px 10px rgba(161, 127, 224, 0.35);
            transition: all 0.25s ease;
        }

        .btn-purple:hover {
            background-color: #8c65d3;
            color: #fff;
            transform: translateY(-2px);
        }

        .btn-outline-purple {
            background-color: #fff;
            color: #7b52c7;
            border: 1.5px solid #a17fe0;
            border-radius: 24px;
            padding: 10px 24px;
            font-weight: 500;
            transition: all 0.25s ease;
        }

        .btn-outline-purple:hover {
            background-color: #a17fe0;
            color: #fff;
            transform: translateY(-2px);
        }

        .btn-edit {
            background-color: #a17fe0;
            color: #fff;
            border-radius: 20px;
            padding: 5px 16px;
            font-size: 13.5px;
            font-weight: 500;
            border: none;
            transition: all 0.2s ease;
        }

        .btn-edit:hover {
            background-color: #8c65d3;
            color: #fff;
            transform: translateY(-1px);
        }

        .btn-delete {
            background-color: #fff;
            color: #e74c3c;
            border: 1.5px solid #e74c3c;
            border-radius: 20px;
            padding: 5px 16px;
            font-size: 13.5px;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .btn-delete:hover {
            background-color: #e74c3c;
            color: #fff;
            transform: translateY(-1px);
        }
    </style>
</head>

<body>
    <div class="container py-5">
        <!-- Tiêu đề chính -->
        <div class="mb-4">
            <h3 class="fw-bold mb-1">Quản Trị Người Dùng</h3>
        </div>

        <!-- 2 nút điều hướng căn phải đặt phía trên bảng giống index.php -->
        <div class="d-flex flex-wrap justify-content-end gap-3 mb-3">
            <a href="user_gd.php" class="btn btn-purple">+ Thêm người dùng mới</a>
            <a href="../index.php" class="btn btn-outline-purple">← Về trang danh sách</a>
        </div>

        <!-- Bảng quản trị chi tiết -->
        <div class="card shadow-sm border-0 rounded-4 mb-4 overflow-hidden">
            <div class="card-header bg-white py-3 px-4 border-bottom-0">
                <h5 class="mb-0 fw-bold">Bảng Dữ Liệu Chi Tiết</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-4">ID</th>
                                <th>Hình ảnh</th>
                                <th>Email</th>
                                <th>Mật khẩu</th>
                                <th class="text-center">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($result && mysqli_num_rows($result) > 0): ?>
                                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                    <?php
                                    $imgPath = "../imgs/" . $row['images'];
                                    if (empty($row['images']) || !file_exists(__DIR__ . "/" . $imgPath)) {
                                        $imgPath = "../imgs/220x440.svg";
                                    }
                                    ?>
                                    <tr>
                                        <td class="ps-4 fw-bold">#<?php echo $row['admin_id']; ?></td>
                                        <td>
                                            <img src="<?php echo htmlspecialchars($imgPath); ?>" alt="Avatar" class="table-avatar">
                                            <span class="ms-2 text-muted small"><?php echo htmlspecialchars($row['images']); ?></span>
                                        </td>
                                        <td><?php echo htmlspecialchars($row['admin_email']); ?></td>
                                        <td><code><?php echo htmlspecialchars($row['admin_password']); ?></code></td>
                                        <td class="text-center">
                                            <a href="edit_user.php?id=<?php echo $row['admin_id']; ?>" class="btn btn-edit me-1">
                                                Sửa
                                            </a>
                                            <a href="delete_user.php?id=<?php echo $row['admin_id']; ?>"
                                                class="btn btn-delete"
                                                onclick="return confirm('Bạn có chắc chắn muốn xóa người dùng này không?');">
                                                Xóa
                                            </a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-muted">Chưa có người dùng nào trong CSDL.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>