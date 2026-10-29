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
    $tennguoigui = defined('SMTP_FROM_NAME') ? SMTP_FROM_NAME : 'Độ Mixi';

    $mail->Username = $nguoigui;
    $mail->Password = $matkhau;
    $mail->SMTPSecure = defined('SMTP_SECURE') ? SMTP_SECURE : 'ssl';
    $mail->Port = defined('SMTP_PORT') ? SMTP_PORT : 465;
    $mail->setFrom($nguoigui, $tennguoigui);

    $to = "phchithien1231@gmail.com";
    $to_name = "abc";
    $mail->addAddress($to, $to_name);

    $mail->isHTML(true);
    $mail->Subject = 'test php bài 1';
    $mail->Body = 'test aaaa';

    if (file_exists("4.jpg")) {
        $mail->addAttachment("4.jpg");
    }

    $mail->smtpConnect([
        "ssl" => [
            "verify_peer" => false,
            "verify_peer_name" => false,
            "allow_self_signed" => true
        ]
    ]);

    $mail->send();
    echo "<h2 style='color:green;'>Đã gửi mail xong thành công!</h2>";
} catch (\Throwable $e) {
    echo "<h2 style='color:red;'>Mail không gửi được. Lỗi: " . (!empty($mail->ErrorInfo) ? $mail->ErrorInfo : $e->getMessage()) . "</h2>";
}
?>
