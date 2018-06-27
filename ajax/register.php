<?php

	// Allow the config
	define('__TREGG__', true);

	// Require the config
	require_once "../inc/config.php";

	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		// Always return JSON format
		// header('Content-Type: application/json');

		$return = [];

		//$email = Filter::String( $_POST['email'] );
		$fullname = Filter::String( $_POST['fullname'] );

		$user_found = User::Find($fullname);

		if($user_found) {
			// User exists
			// We can also check to see if they are able to log in.
			$return['error'] = "You already have an account";
			$return['is_logged_in'] = false;
		} else {
			// User does not exist, add them now.

		  $mobile = Filter::String( $_POST['mobile'] );
			$table_no = Filter::String( $_POST['tableno'] );

			$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
			$txtpassword = $_POST['password'];

			$addUser = $con->prepare("INSERT INTO users(password, fullname, mobile_tel, table_no) VALUES( :password, LOWER(:fullname), :mobile, :table_no)");
			//$addUser->bindParam(':email', $email, PDO::PARAM_STR);
			$addUser->bindParam(':password', $password, PDO::PARAM_STR);
			$addUser->bindParam(':fullname', $fullname, PDO::PARAM_STR);
			$addUser->bindParam(':mobile', $mobile, PDO::PARAM_STR);
			$addUser->bindParam(':table_no', $table_no, PDO::PARAM_STR);
			$addUser->execute();

			$user_id = $con->lastInsertId();

			$_SESSION['user_id'] = (int) $user_id;
// need to validate mobile number
// txt user
//      $txtto = '+44' . ltrim($mobile, '0');
//			$nameParts = explode(' ', $fullname);
//			$txtfirstname = $nameParts[0];
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

// end txt user

			$therefpage = (string) $_POST['refpage'];
//				$therefpage = '/catalogue.php';
			$return['redirect'] = $therefpage;
			//$return['redirect'] = '/index.php?message=welcome';
			//$return['is_logged_in'] = true;
		}

		echo json_encode($return, JSON_PRETTY_PRINT); exit;
	} else {
		// Die. Kill the script. Redirect the user. Do something regardless.
		exit('Invalid URL');
	}
?>
