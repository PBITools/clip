<?php

$uid   = number(4);
echo "Input Phone Number : ";
$phone = trim(fgets(STDIN));

$otp = file_get_contents('https://clipclaps.000webhostapp.com/otp.php?no='.$phone.'&id='.$uid);

if(preg_match('/Success/i', $otp)){
    echo 'Input OTP Code : ';
    $otpSMS = trim(fgets(STDIN));
    echo 'Input Refferal Code : ';
    $reff = trim(fgets(STDIN));

    $redeem = file_get_contents('https://clipclaps.000webhostapp.com/reff.php?no='.$phone.'&otp='.$otpSMS.'&id='.$uid.'&reff='.$reff)."\n";
    echo $redeem;
} else if (preg_match('/Server is busy, please try again later./i', $otp)){
    echo "Server is busy, please try again later.";
    exit;
} else {
    echo "$otp \n";
    exit;
}
function number($length) {
	$characters = '0123456789';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
}
?>