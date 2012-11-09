<?php
/**
 * Created by PhpStorm.
 * User: Troy
 * Date: Jun 15, 2012
 * Time: 12:12:03 AM
 * To change this template use File | Settings | File Templates.
 */
require("class.phpmailer.php");

class EMail {

    private $reply_mail = "info@sample.com";
    private static $instance;

    private function EMail() {
    }

    public static function getObj() {
        if (!isset(self::$instance)) {
            $c = __CLASS__;
            self::$instance = new $c;
        }
        return self::$instance;
    }

    public function sendSampleMail($name, $email) {
        $webmaster_email = $this->reply_mail; //Reply to this email ID
        $subject = "Sample Subject";
        $message = "Sample  Messsage";
        if (SMTP_MAIL) {
            $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->SMTPAuth = true;
            $mail->Username = "www.lax@gmail.com"; // SMTP username
            $mail->Password = "disney1224"; // SMTP password
            $mail->From = $webmaster_email;
            $mail->FromName = "SampleCorp.com";
            $mail->AddAddress($email, $name);
            $mail->AddReplyTo($webmaster_email, "Webmaster");
            $mail->WordWrap = 50; // set word wrap
            $mail->IsHTML(true); // send as HTML
            $mail->Subject = $subject;
            $mail->Body = $message;
            $mail->AltBody = "This is the body when user views in plain text format"; //Text Body
            //echo $str;
            return $mail->Send();
        } else {
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
            $headers .= 'From: ' . $webmaster_email . "\r\n";
            mail($email, $subject, $message, $headers);
        }
    }
}

?>