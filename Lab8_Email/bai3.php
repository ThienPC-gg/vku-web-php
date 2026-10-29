<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require "PHPMailer-master/src/PHPMailer.php";
require "PHPMailer-master/src/SMTP.php";
require "PHPMailer-master/src/Exception.php";

if (file_exists(__DIR__ . '/config.php')) {
    require_once __DIR__ . '/config.php';
}

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->CharSet = "utf-8";
    $mail->Host = defined('SMTP_HOST') ? SMTP_HOST : 'smtp.gmail.com';
    $mail->SMTPAuth = true;

    $nguoigui = defined('SMTP_USERNAME') ? SMTP_USERNAME : 'domixxue09@gmail.com';
    $matkhau = defined('SMTP_PASSWORD') ? SMTP_PASSWORD : 'YOUR_APP_PASSWORD_HERE';
    $tennguoigui = defined('SMTP_FROM_NAME') ? SMTP_FROM_NAME : 'test bài 3';

    $mail->Username = $nguoigui;
    $mail->Password = $matkhau;
    $mail->SMTPSecure = defined('SMTP_SECURE') ? SMTP_SECURE : 'ssl';
    $mail->Port = defined('SMTP_PORT') ? SMTP_PORT : 465;
    $mail->setFrom($nguoigui, $tennguoigui);

    $recipients = "phchithien1231@gmail.com,phamchithien1231@gmail.com";
    $email_array = explode(",", $recipients);

    foreach ($email_array as $email) {
        $email = trim($email);
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $mail->addAddress($email, "Thành viên");
        }
    }

    $mail->isHTML(true);
    $mail->Subject = 'test bài 3';
    $mail->Body    = 'alo alo xin chao tat ca moi nguoi da quay tro lai voi channel cua minh';

    $mail->smtpConnect([
        "ssl" => [
            "verify_peer" => false,
            "verify_peer_name" => false,
            "allow_self_signed" => true
        ]
    ]);

    $mail->send();
    echo "<h2 style='color:green;'>Đã gửi email thành công cho danh sách: " . htmlspecialchars($recipients) . "</h2>";

} catch (\Throwable $e) {
    echo "<h2 style='color:red;'>Gửi mail thất bại: " . (!empty($mail->ErrorInfo) ? $mail->ErrorInfo : $e->getMessage()) . "</h2>";
}
?>
