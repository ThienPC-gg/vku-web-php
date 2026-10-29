<?php
require "PHPMailer-master/src/PHPMailer.php";
require "PHPMailer-master/src/SMTP.php";
require 'PHPMailer-master/src/Exception.php';

if (file_exists(__DIR__ . '/config.php')) {
    require_once __DIR__ . '/config.php';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->CharSet = "utf-8";
        $mail->Host = defined('SMTP_HOST') ? SMTP_HOST : 'smtp.gmail.com';
        $mail->SMTPAuth = true;

        $nguoigui = defined('SMTP_USERNAME') ? SMTP_USERNAME : 'domixxue09@gmail.com';
        $matkhau = defined('SMTP_PASSWORD') ? SMTP_PASSWORD : 'YOUR_APP_PASSWORD_HERE';
        $tennguoigui = defined('SMTP_FROM_NAME') ? SMTP_FROM_NAME : 'Độ Mixi';

        $mail->Username = $nguoigui;
        $mail->Password = $matkhau;
        $mail->SMTPSecure = defined('SMTP_SECURE') ? SMTP_SECURE : 'ssl';
        $mail->Port = defined('SMTP_PORT') ? SMTP_PORT : 465;
        $mail->setFrom($nguoigui, $tennguoigui);

        $to = trim($_POST['email']);
        $to_name = "Bạn";
        $tieude = trim($_POST['tieude'] ?? 'Không có tiêu đề');
        $content = $_POST['content'] ?? '';

        $mail->addAddress($to, $to_name);

        $mail->isHTML(true);
        $mail->Subject = $tieude;

        $noidungthu = '
        <div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; border: 1px solid #e0e0e0; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
            <div style="background-color: #0d6efd; color: white; padding: 15px 20px;">
                <h3 style="margin: 0;">Xin chào ' . htmlspecialchars($to_name) . '!</h3>
            </div>
            <div style="padding: 20px; background-color: #ffffff; color: #333333; line-height: 1.6;">
                ' . $content . '
            </div>
            <div style="background-color: #f8f9fa; padding: 10px 20px; font-size: 12px; color: #888; border-top: 1px solid #eeeeee;">
                Thư được gửi tự động từ hệ thống PHP Mailer - Lab 8.
            </div>
        </div>';

        $mail->Body = $noidungthu;
        $mail->AltBody = strip_tags($content);

        if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
            $fileName = $_FILES['file']['name'];
            $fileTmp = $_FILES['file']['tmp_name'];
            
            $uploadfile = tempnam(sys_get_temp_dir(), sha1($fileName));
            if (move_uploaded_file($fileTmp, $uploadfile)) {
                $mail->addAttachment($uploadfile, $fileName);
            } else {
                $mail->addAttachment($fileTmp, $fileName);
            }
        }

        $mail->smtpConnect([
            "ssl" => [
                "verify_peer" => false,
                "verify_peer_name" => false,
                "allow_self_signed" => true
            ]
        ]);

        if ($mail->send()) {
            header("Location: index.php?status=success");
            exit;
        }

    } catch (\Throwable $e) {
        $errorMsg = urlencode(!empty($mail->ErrorInfo) ? $mail->ErrorInfo : $e->getMessage());
        header("Location: index.php?status=error&msg=" . $errorMsg);
        exit;
    }
} else {
    header("Location: index.php");
    exit;
}
?>
