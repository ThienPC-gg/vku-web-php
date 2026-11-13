<?php

/** @var mysqli $connect */
require_once __DIR__ . '/connect.php';

$sql = "SELECT * FROM Users ORDER BY admin_id ASC LIMIT 10";
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

        .user-card {
            border: none;
            border-radius: 14px;
            transition: transform 0.25s ease, box-shadow 0.25s ease;
            overflow: hidden;
            background: #ffffff;
        }

        .user-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 24px rgba(161, 127, 224, 0.22) !important;
        }

        .avatar-img {
            width: 96px;
            height: 96px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid #a17fe0;
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

        .action-bar {
            background: #ffffff;
            border-radius: 14px;
            padding: 20px 28px;
        }
    </style>
</head>

<body>
    <div class="container py-5">
        <div class="mb-4">
            <h3 class="fw-bold page-title mb-1">Danh Sách <span>Người Dùng</span></h3>
        </div>

        <div class="row g-4 mb-4">
            <?php if ($result && mysqli_num_rows($result) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="card user-card shadow-sm h-100 text-center p-3">
                            <div class="mt-2 mb-3">
                                <?php
                                $imgPath = "imgs/" . $row['images'];
                                if (empty($row['images']) || !file_exists(__DIR__ . "/" . $imgPath)) {
                                    $imgPath = "imgs/220x440.svg";
                                }
                                ?>
                                <img src="<?php echo htmlspecialchars($imgPath); ?>" alt="Avatar" class="avatar-img shadow-sm">
                            </div>
                            <div class="card-body p-2">
                                <span class="badge bg-secondary mb-2">ID: #<?php echo $row['admin_id']; ?></span>
                                <h6 class="card-title fw-bold text-truncate" title="<?php echo htmlspecialchars($row['admin_email']); ?>">
                                    <?php echo htmlspecialchars($row['admin_email']); ?>
                                </h6>
                                <p class="card-text text-muted small mb-2">
                                    Mật khẩu: <code><?php echo htmlspecialchars($row['admin_password']); ?></code>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        Chưa có người dùng nào trong bảng Users.
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <div class="d-flex flex-wrap justify-content-end gap-3 mb-3">
            <a href="admin/user_gd.php" class="btn btn-purple">+ Thêm người dùng mới</a>
            <a href="admin/users_manage.php" class="btn btn-outline-purple">Quản trị (Sửa / Xóa)</a>
        </div>

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
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($result && mysqli_num_rows($result) > 0):
                                mysqli_data_seek($result, 0);
                                while ($row = mysqli_fetch_assoc($result)):
                                    $imgPath = "imgs/" . $row['images'];
                                    if (empty($row['images']) || !file_exists(__DIR__ . "/" . $imgPath)) {
                                        $imgPath = "imgs/220x440.svg";
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
                                    </tr>
                                <?php
                                endwhile;
                            else:
                                ?>
                                <tr>
                                    <td colspan="4" class="text-center py-4 text-muted">Chưa có dữ liệu</td>
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