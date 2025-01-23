<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Collect the form data
  $name = htmlspecialchars($_POST['name']);  // Sanitize input to prevent XSS attacks
  $email = htmlspecialchars($_POST['email']);
  $subject = htmlspecialchars($_POST['subject']);
  $message = htmlspecialchars($_POST['message']);
  
  // Email where you want to receive the messages
  $to = "parthpatel04003@gmail.com";  // Replace with your email address

  // Email Subject
  $email_subject = "New Contact Form Submission: $subject";
  
  // Email Body
  $email_body = "
  Name: $name
  Email: $email
  Subject: $subject
  Message: $message
  ";

  // Email Headers
  $headers = "From: $email\r\n";
  $headers .= "Reply-To: $email\r\n";
  $headers .= "Content-type: text/plain; charset=UTF-8\r\n";

  // Send the email
  if (mail($to, $email_subject, $email_body, $headers)) {
    echo "Message sent successfully!";
  } else {
    echo "Error sending message.";
  }
} else {
  echo "Form not submitted correctly.";
}
?>
