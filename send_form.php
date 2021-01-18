<?php
    
$visitor_name = "";
$visitor_email = "";
$course = "";
$commitment = "";

if(isset($_POST['name'])) {
    $visitor_name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
}

if(isset($_POST['course'])) {
    $visitor_message = "New Sign Up: $visitor_name" ."\n Course: " .wordwrap(htmlspecialchars($_POST['course']), 70);
}

if(isset($_POST['commitment'])) {
    $visitor_message =  $visitor_message ."\n Time Commitment: ".wordwrap(htmlspecialchars($_POST['commitment']), 70);
}

if(isset($_POST['email'])) {
    $visitor_email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['email']);
    $visitor_email = filter_var($visitor_email, FILTER_VALIDATE_EMAIL);
    $visitor_message = $visitor_message . "\n $visitor_email";
}
$mailTo = "javier.e.glz@gmail.com";

$headers  = 'MIME-Version: 1.0' . "\r\n"
.'Content-type: text/html; charset=utf-8' . "\r\n"
.'From: ' . $visitor_email . "\r\n";

if(mail($mailTo, "new signup for course", $visitor_message, $headers)){
    echo json_encode(["ok" => 1]);
    } else {
      echo json_encode(["ok" => 0]);
    }
?>