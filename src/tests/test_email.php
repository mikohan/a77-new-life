<?PHP
$sender = 'angara77@gmail.com';
$recipient = 'angara99@gmail.com';

$subject = "Test message from test script angara77.com";
$message = "php test message";
$headers = 'From:' . $sender;

if (mail($recipient, $subject, $message, $headers)) {
  echo "Message accepted";
} else {
  echo "Error: Message not accepted";
}
