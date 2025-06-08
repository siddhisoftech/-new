<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form values and sanitize
    $first_name = htmlspecialchars(trim($_POST["first-name"]));
    $last_name = htmlspecialchars(trim($_POST["last-name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $city = htmlspecialchars(trim($_POST["city"]));
    $zip = htmlspecialchars(trim($_POST["zip"]));
    $phone = htmlspecialchars(trim($_POST["tel-884"]));
    $linkedin = htmlspecialchars(trim($_POST["LinkedIn"]));

    // Compose the message
    $to = "rajuaprs@gmail.com"; // Change to your email
    $subject = "New Contact Form Submission";
    $message = "
        Name: $first_name $last_name\n
        Email: $email\n
        Phone: $phone\n
        City: $city\n
        Zip Code: $zip\n
        LinkedIn: $linkedin
    ";
    $headers = "From: $email\r\nReply-To: $email\r\n";

    // Send the email
    if (mail($to, $subject, $message, $headers)) {
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "invalid";
}
?>
