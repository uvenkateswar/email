<?php
/**
 * Created by PhpStorm.
 * User: Troy
 * Date: Nov 7, 2012
 * Time: 1:53:29 PM
 * To change this template use File | Settings | File Templates.
 */
include_once ('config.php');
include_once ('Email/class.Email.php');
$mail_obj = EMail::getObj();
$mail_obj.AddAttachment("c:\test.txt");
if ($mail_obj->sendSampleMail("Laxman", "esumca.u@gmail.com")) {
    echo "Email sent successfully";
} else {
    echo "Failed to sent email";
}
?>