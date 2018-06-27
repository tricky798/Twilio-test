<?php

	// Allow the config
	define('__TREGG__', true);
	// Require the config
	require_once "inc/config.php";

	Page::ForceIndexPage();

	if(isset($_SERVER['HTTP_REFERER'])) {
		 $refpage = (string) $_SERVER['HTTP_REFERER'];
	//	 $refpage = $_SERVER['PHP_SELF'];
		 //echo "<br> $calling_page <br>";  $_SERVER['PHP_SELF']
	} else { $refpage = 'index.php'; }

?>

<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, user-scalable=no,
		shrink-to-fit=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0" />
    <meta http-equiv="Content-Security-Policy" content="default-src * 'unsafe-inline'; style-src 'self' 'unsafe-inline'; media-src *" />
		<meta name="robots" content="noindex nofollow">

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/fontawesome-all.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/index.css" />

	<title>IFR Auction App</title>

</head>

	<body ontouchstart=""><!-- ontouchstart="" enables low-delay CSS transitions. -->

	    <div class="container text-center">
	        <!-- <p class="charitytitletext">Weston Park Hospital Cancer Charity</p> -->
	        <img class="img-responsive centerimg" src="img/wpcc-logo.png">
	        <p class="">sponsored by ABC insurance Ltd</p>
					<h3 class="menutext">Auction User Registration</h3>
	        <p class="">Enter your details below to allow bidding / pledge</p>

	        <div class="row text-left">

						  <div class="col-md-2">
						  </div>

	            <div class="col-md-8">
	               <div class="well">
									   <form class="form-group js-register">

										 <div class="">
 					 			        <label class="label label-default formlabel" for="fullname">Full name</label>
 					 			        <div class="">
 					 			            <input class="form-control" id="fullname" type="text" name="fullname" required='required' placeholder="Your login name">
														<input id="refpage" name="refpage" type="hidden" value="<?php echo $refpage; ?>">
 					 			        </div>
 					 			    </div>
                     <br>
 					 			    <div class="">
 					 			        <label class="label label-default formlabel" for="passwd">Password</label>
 					 			        <div class="">
 					 			            <input class="form-control" id="passwd" type="password" required='required' placeholder="Your password">
 					 			        </div>
 					 			    </div>
										<br>
										<div class="">
											 <label class="label label-default formlabel" for="mobile">Mobile telephone</label>
											 <div class="">
													 <input class="form-control" id="mobile" type="text" name="mobile" required='required' placeholder="Your mobile number">
													 <p class="forminfo"> (only used to contact you for the auction)</p>
											 </div>
									 </div>
									 <br>
									 <div class="">
											<label class="label label-default formlabel" for="tablesel">Table No.</label>
											<div class="">
													<select class="form-control" id="tablesel" name="tablesel">
														<option value="1">Table 1 - Dr No</option>
														<option value="2">Table 2 - Goldfinger</option>
														<option value="3">Table 3 - You Only Live Twice</option>
														<option value="4">Table 4 - Live and Let Die</option>
														<option value="5">Table 5 - A View to a Kill</option>
														<option value="6">Table 6 - Moonraker</option>
														<option value="7">Table 7 - The Living Daylights</option>
														<option value="8">Table 8 - Goldeneye</option>
														<option value="9">Table 9 - Tomorrow Never Dies</option>
														<option value="10">Table 10 - Casino Royale</option>
														<option value="11">Table 11 - Skyfall</option>
														<option value="12">Table 12 - Spectre</option>
														<option value="0">Not attending event</option>
													</select>
													<p class="forminfo">(or choose - Not attending event)</p>
											</div>
									 </div>
									 <br>

			              <div class="uk-margin uk-alert uk-alert-danger js-error" style='display: none;'></div>

			              <div class="uk-margin">
			                  <button class="uk-button uk-button-default" type="submit">Register</button>
			              </div>

			       </form>
  		       </div>
  	      </div>
				</div>
			</div>

    <p class="text-center">Please note: After the event all user data will be removed from auction system.</p>
		<footer><p class="text-center">Copyright &copy; 2018, iFrames.</p></footer>

		<script src="jquery-3.3.1.min.js"></script>
		<script src="main.js"></script>

  </body>
</html>
