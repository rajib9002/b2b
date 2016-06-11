<?php
$dateTime = date("Y:m:d-H:i:s");
function getDateTime() {
global $dateTime;
return $dateTime;
}
function createHash($chargetotal, $currency) {

$dateTime = date("Y:m:d-H:i:s");

$storeId = "13011606149";
$sharedSecret = "3cGYESseT9";
$stringToHash = $storeId . $dateTime . $chargetotal .
$currency . $sharedSecret;
$ascii = bin2hex($stringToHash);
return sha1($ascii);
}
?>
