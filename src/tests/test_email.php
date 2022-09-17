<?PHP
$sender = 'angara77@gmail.com';
$recipient = 'angara99@gmail.com';

// $subject = "Test message from test script angara77.com";
// $message = "php test message";
// $headers = 'From:' . $sender;

$template = "<h1>Test HTML Email</h1>";


function send_email($to, $template)
{
  $subject = 'Заказ запчастей в Ангара';
  $headers = "From: Ангара запчасти <angara77@angara77.com>" . "\r\n";
  $headers .= "Reply-To: angara77@gmail.com" . "\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
  if (mail($to, $subject, $template, $headers)) {
    return true;
  }
  return false;
}

if (send_email("angara99@gmail.com", $template)) {
  echo ("Message accepted");
} else {
  "Error: Messate not accepted";
}


// if (mail($recipient, $subject, $message, $headers)) {
//   echo "Message accepted";
// } else {
//   echo "Error: Message not accepted";
// }
