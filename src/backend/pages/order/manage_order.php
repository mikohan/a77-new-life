<?php
require_once(__DIR__ . '/../../lib/init.php');

//Customer
$data = $_POST['data'];
$email = $data['customer']['email'];
$phone = $data['customer']['phone'];

$lastname = isset($data['customer']['lastname']) ? $data['customer']['lastname'] : '';
$firstname = isset($data['customer']['firstname']) ? $data['customer']['firstname'] : '';



if (!$firstname) {
  $firstname = 'Клиент';
}
echo $firstname;
$city = $data['customer']['city'];
$street = $data['customer']['street'];
$comment = $data['customer']['comment'];

// Company
$total_sum = $data['total_sum'];
$total_count = count($data['cart']);
$company_phone = TELEPHONE_FREE;
$company_site = ANG_MAP;

require_once('./email.client.tpl.html.php');
require_once('./email.company.tpl.html.php');

$row = '';
foreach ($data['cart'] as $cart) {
  $sku = $cart['sku'];
  $name = $cart['name'];
  $count = $cart['count'];
  $price = $cart['price'];
  $total = $cart['total'];
  $row .= "
																	<tr style='border-bottom: 1px solid #c0c5ca; line-height: 24px; font-size: 12px;'>
																		<td>
																			{$sku}
																		</td>
																		<td style='padding-left: 10px;'>
																			{$name}
																		</td>
																		<td>
																			&#8381; {$price}
																		</td>
																		<td>
																			{$count}
																		</td>
																		<td>
																			&#8381; {$total}
																		</td>
																	</tr>
";
}

$customer_tpl = $tpl_head . $row . $tpl_end;

$company_tpl = $tpl_head_company . $row . $tpl_end_company;
// Some comment for gh
function send_email($to, $template)
{
  $subject = 'Заказ запчастей в Ангара';
  $headers = "From: Ангара запчасти <angara77@gmail.com>" . "\r\n";
  $headers .= "Reply-To: angara77@gmail.com" . "\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
  if (mail($to, $subject, $template, $headers)) {
    return true;
  }
  return false;
}
$manages_emails = implode(', ', MANAGERS_EMAILS);
echo send_email($manages_emails, $company_tpl);
$customer_email = strip_tags($email);

if ($customer_email) {

  echo send_email($customer_email, $customer_tpl);
}
