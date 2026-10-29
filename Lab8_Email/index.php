<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email tới bạn - Bài 2 Lab 8</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <style>
        body {
            background-color: #f4f6f9;
            padding-top: 40px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .mail-card {
            max-width: 750px;
            margin: 0 auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            padding: 30px;
        }
        .form-label {
            font-weight: 600;
            color: #495057;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="mail-card">
        <h3 class="mb-4 text-center text-primary">Email tới bạn</h3>

        <?php if (isset($_GET['status'])): ?>
            <?php if ($_GET['status'] === 'success'): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Thành công!</strong> Đã gửi email xong. Bạn hãy kiểm tra hòm thư đến (hoặc thư rác).
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php elseif ($_GET['status'] === 'error'): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Thất bại!</strong> <?php echo !empty($_GET['msg']) ? htmlspecialchars($_GET['msg']) : 'Không thể gửi email. Vui lòng kiểm tra lại cấu hình tài khoản hoặc kết nối mạng.'; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <form action="mail.php" enctype="multipart/form-data" method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">Email người nhận:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Nhập địa chỉ email người nhận" required>
            </div>

            <div class="mb-3">
                <label for="tieude" class="form-label">Subject (Tiêu đề):</label>
                <input type="text" class="form-control" id="tieude" name="tieude" placeholder="Nhập tiêu đề thư" required>
            </div>

            <div class="mb-3">
                <label for="editor" class="form-label">Nội dung:</label>
                <textarea name="content" id="editor" class="form-control" rows="8"></textarea>
            </div>

            <div class="mb-4">
                <label for="file" class="form-label">File đính kèm:</label>
                <input type="file" class="form-control" id="file" name="file">
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-lg">Gửi Email</button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    CKEDITOR.replace('editor', {
        versionCheck: false
    });
</script>
</body>
</html>
