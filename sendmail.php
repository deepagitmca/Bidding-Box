<?php
$to = 'deepa.kulkarni0607@gmail.com';
$subject = 'Hello from XAMPP!';
$message = 'This is a test';
$headers = "From: demomail2009@gmail.com\r\n";
if (mail($to, $subject, $message, $headers)) {
   echo "SUCCESS";
} else {
   echo "ERROR";
}