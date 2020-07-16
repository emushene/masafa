<?php
use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST['emailername']) && isset($_POST['emaileremail'])) {
    $emailername = $_POST['emailername'];
    $emailername = $_POST['emaileremail'];
    $emailermessage = $_POST['emailermessage'];

    require_once "PHPMailer/PHPMailer.php";
    require_once "PHPMailer/SMTP.php";
    require_once "PHPMailer/Exception.php";

    $mail = new PHPMailer();

    //smtp Settings to connect to google mail

    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "e.mushene@gmail.com";
    $mail->Password = 'G@tonye77';
    $mail->Port = 465;
    $mail->SMTPSecure = "ssl";

    //Email setting (how the email looks like)

    $mail->isHTML(true);
    $mail->SetFrom($emaileremail, $emailername);
    $mail->addAddress("e.mushene@gmail.com");
    $mail->Subject = ("$emailername From web Quote Request");
    $mail->Body = $emailermessage;

    if ($mail-> send()) {
        $status = "Quote Sent Successfully";
        $response = "Quote Sent Successfully";
    }
    else {
        $status = "Failed";
        $response = "Somethign is not right here: <br>" . $mail->ErrorInfo;
    }

    exit(json_encode(array("status" => $status, "response" => $response)));



}