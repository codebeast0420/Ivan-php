<?php
if (isset($_REQUEST['type']) && $_REQUEST['type'] == "mail") {

    $to = "materials@docwattselectric.com, grivera@docwattselectric.com, jrivera@docwattselectric.com"; // this is your Email address
    $from = "ivan@docwattselectric.com"; // this is the sender's Email address
    $subject = "Order Form";
    $message = file_get_contents("template.html");
    $message = str_replace('{{work_num}}', $_REQUEST['work_num'], $message);
    $message = str_replace('{{requested_by}}', $_REQUEST['requested_by'], $message);
    $message = str_replace('{{item_list}}', $_REQUEST['item_list'], $message);
    $message = str_replace('{{vehicle_num}}', $_REQUEST['vehicle_num'], $message);
    $headers = "From: " . $from . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=utf-8";
    if (mail($to, $subject, $message, $headers)) {
        echo "Mail sent successfully!";
    } else {
        echo "Email sending failed!";
    }
}
