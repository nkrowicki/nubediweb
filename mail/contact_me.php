<?php
// Check for empty fields
// if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
if(empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

// $name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));

// Create the email and send the message
$to = "info@nubedi.com"; // Add your email address inbetween the "" replacing yourname@yourdomain.com - This is where the form will send a message to.
$subject = "Nuevo mensaje en NUBEDI: $email";
// $subject = "NUBEDI: $name";
// $body = "Ha llegado un nuevo correo!\n\n"."Datos:\n\nNombre: $name\n\nEmail: $email\n\nTel: $phone\n\nMensaje:\n$message";
$body = "Ha llegado un nuevo correo!\n\n"."Datos:\nEmail: $email\nTel: $phone\n\nMensaje:\n$message";
$header = "From: noreply@nubedi.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$header .= "Reply-To: $email";	

if(!mail($to, $subject, $body, $header))
  http_response_code(500);
?>
