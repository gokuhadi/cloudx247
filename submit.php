<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fullName = htmlspecialchars($_POST['fullName']);
    $company = htmlspecialchars($_POST['company']);
    $email = htmlspecialchars($_POST['email']);
    $notificationEmails = htmlspecialchars($_POST['notificationEmails']);
    $endpoints = htmlspecialchars($_POST['endpoints']);
    $threshold = htmlspecialchars($_POST['threshold']);
    $frequency = htmlspecialchars($_POST['frequency']);
    $budget = htmlspecialchars($_POST['budget']);
    $notes = htmlspecialchars($_POST['notes']);

    $regions = "";
    if(isset($_POST['regions'])) {
        $regions = implode(", ", $_POST['regions']);
    }

    $to = "hello@cloudx247.com";

    $subject = "New Cloudx247 Monitoring Request";

    $message = "
    New Monitoring Request

    Full Name: $fullName
    Company: $company
    Email: $email

    Notification Emails:
    $notificationEmails

    Endpoints:
    $endpoints

    Threshold:
    $threshold

    Frequency:
    $frequency

    Regions:
    $regions

    Budget:
    $budget

    Notes:
    $notes
    ";

    $headers = "From: hello@cloudx247.com\r\n";
    $headers .= "Reply-To: $email\r\n";

    if(mail($to, $subject, $message, $headers)) {
        echo "success";
    } else {
        echo "error";
    }
}
?>
