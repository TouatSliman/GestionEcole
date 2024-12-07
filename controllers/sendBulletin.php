
<?php
//sans php mailer
if (isset($_GET['send'])) {
    $to = "0MjQ2@example.com";
    $subject = "Contact Form Submission";
    $message = "Name: " . $_GET['nom'] . "\n";
    $headers = "From: 0MjQ2@example.com" . "\r\n" .
        "CC: 6Hk6G@example.com";
    $mail = mail($to, $subject, $message, $headers);
    if ($mail) {
        echo "Email sent successfully";
    } else {
        echo "Email sending failed";
    }
}
?>
<?php
//sans php mailer
if (isset($_GET['send_message'])) {
    $destinataire = "destinataire@example.com";
    $sujet = "Test d'envoi d'e-mail depuis PHP";
    $message = "Ceci est un e-mail de test envoyé depuis PHP.";
    // Envoi de l'e-mail
    $mail_envoye = mail($destinataire, $sujet, $message);
    // Vérification du succès de l'envoi
    if ($mail_envoye) {
        echo "L'e-mail a été envoyé avec succès.";
    } else {
        echo "L'envoi de l'e-mail a échoué.";
    }
}
?>
<?php
//paw spxn sbqr omln uazp 
//php mailer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_GET['mailer'])) {

    require './PHPMailer-master/src/Exception.php';
    require './PHPMailer-master/src/PHPMailer.php';
    require './PHPMailer-master/src/SMTP.php';

    $mail = new PHPMailer();
    $mail->CharSet = 'UTF-8';

    $body = 'This is the message';

    $mail->IsSMTP();
    $mail->Host       = 'smtp.gmail.com';

    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;
    $mail->SMTPDebug  = 1;
    $mail->SMTPAuth   = true;

    $mail->Username   = 'ssoverlord04@gmail.com';
    $mail->Password   = 'spxnsbqromlnuazp';

    $mail->SetFrom('ssoverlord04@gmail.com', $name);
    $mail->AddReplyTo('no-reply@mycomp.com', 'no-reply');
    $mail->Subject    = 'subject';
    $mail->MsgHTML($body);

    $mail->AddAddress('abc1@gmail.com', 'title1');
    $mail->AddAddress('abc2@gmail.com', 'title2'); /* ... */

    $mail->AddAttachment($fileName);
    $mail->send();

    if (!$mail->Send()) {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message sent!';
    }
}

if (isset($_GET['bulletin'])) {

    require './PHPMailer-master/src/Exception.php';
    require './PHPMailer-master/src/PHPMailer.php';
    require './PHPMailer-master/src/SMTP.php';

    $mail = new PHPMailer();
    $mail->CharSet = 'UTF-8';

    $htmlBody = '<html><body><h1>bulletin</h1><p>nom : ' . $_GET['nom'] . '</p>';
    $htmlBody .= '<p>message : ' . $_GET['bodyMail'] . '</p>';
    $htmlBody .= '</body></html>';

    $mailer = new PHPMailer();
    $mailer->CharSet = 'UTF-8';
    $mailer->IsSMTP();
    $mailer->Host = 'smtp.gmail.com';
    $mailer->SMTPSecure = 'tls';
    $mailer->Port = 587;
    $mailer->SMTPAuth = true;
    $mailer->Username = 'ssoverlord04@gmail.com';
    $mailer->Password = 'spxnsbqromlnuazp';

    $mailer->SetFrom('ssoverlord04@gmail.com', $name);
    $mailer->AddReplyTo('no-reply@mycomp.com', 'no-reply');
    $mailer->Subject = 'subject';
    $mailer->MsgHTML($htmlBody);

    $mailer->AddAddress('ssoverlord04@gmail.com', 'paw');

    if (!$mailer->Send()) {
        echo 'Mailer Error: ' . $mailer->ErrorInfo;
    } else {
        echo 'Message sent!';
    }
}
?>