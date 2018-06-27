<?php
require '../twilio-php-master/Twilio/autoload.php';

use Twilio\Rest\Client;

// Your Account SID and Auth Token from twilio.com/console
$sid = 'sidsidsid';
$token = 'tokentokentoken';
$client = new Client($sid, $token);

echo "Trying to send txt... <br><br>";

$fullname = 'Richard Thompson';
$mobile = '07956885577';
$txtpassword ='zzzzzz';
$txtmsg = 'the WPHCC Silent Auction June 23nd 2018, just as a reminder your password is: ';
$txtto = '+44' . ltrim($mobile, '0');

$nameParts = explode(' ', $fullname);
$txtfirstname = $nameParts[0];

try {
    $client->messages->create(
        $txtto,
        [
            "body" => 'Thank you ' . $txtfirstname . ' for registering for ' . $txtmsg . $txtpassword . '',
            "from" => '+441143031136'
        ]
    );
    echo 'Message sent to ' + $txtto;
} catch (TwilioException $e) {
    echo  $e;
}
?>
