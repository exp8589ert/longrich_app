<?php
$enckey = '734172cd705438f7ef1e95e0afb6bef28b28d51c0a9a27efb63159ae1d462191';

spl_autoload_register('autoloadclasses');
function autoloadclasses($classname) {
	$path = 'class/';
	$extension = '.class.php';
	$fullpath = $path . $classname . $extension;
	if(!$path) {
		return false;
	} 
	else {
		require $fullpath;
	}
}

function genhash($len) {
	$h_len = $len;
	$cstrong = TRUE;
	$sslkey = openssl_random_pseudo_bytes($h_len, $cstrong);
	return bin2hex($sslkey);
}

function encFunc($encdata, $enckey) {
	$cipher = 'aes-256-cbc';
	$cipherlen = openssl_cipher_iv_length($cipher);
	$ranbytes = openssl_random_pseudo_bytes($cipherlen);
	$rawcipher = openssl_encrypt($encdata, $cipher, $enckey, $options = OPENSSL_RAW_DATA, $ranbytes);
	$hmac = hash_hmac('sha256', $rawcipher, $enckey, $asbinary = true);
	$ciphertext = base64_encode( $ranbytes.$hmac.$rawcipher );
	return $ciphertext;
}

function decFunc($encrydata, $enckey) {
	$endata = base64_decode($encrydata);
	$cipher = 'aes-256-cbc';
	$cipherlen = openssl_cipher_iv_length($cipher);
	$ivstring = substr($endata, 0, $cipherlen);
	$hmac = substr($endata, $cipherlen, $sha2len = 32);
	$rawtext = substr($endata, $cipherlen + $sha2len);
	$decrypted = openssl_decrypt($rawtext, $cipher, $enckey, $options = OPENSSL_RAW_DATA, $ivstring);
	$calcmac = hash_hmac('sha256', $rawtext, $enckey, $asbinary = TRUE);
		if (hash_equals($hmac, $calcmac)) {
		    return $decrypted;
		}
}

?>