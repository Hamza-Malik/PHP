<?php
    /*
     This PHP code provides a payment form for the Adyen Hosted Payment Pages
     */
    
    /*
     account details
     $skinCode:        the skin to be used
     $merchantAccount: the merchant account we want to process this payment with.
     $sharedSecret:    the shared HMAC key.
     */
    
    $skinCode       	 = $_POST['skinCode'];
    $merchantAccount 	 = $_POST['merchantAccount'];
    $hmacKey        	 = $_POST['hmacKey'];
    $merchantReference	 = $_POST['merchantReference'];
	$merchantaccount 	 = $_POST['merchantAccount'];
	$currencyCode 		 = $_POST['currencyCode'];
	$paymentAmount 		 = $_POST['paymentAmount'];
	$sessionValidity 	 = $_POST['sessionValidity'];
	$shipBeforeDate 	 = $_POST['shipBeforeDate'];
	$shopperLocale         = $_POST['shopperLocale'];
	$shopperEmail        = $_POST['shopperEmail'];
	$shopperReference    = $_POST['shopperReference'];	
			       
    /*
   
     */

      
 
    $params = array(
                    "merchantReference" 				 => $merchantReference,
                    "merchantAccount"   				 => $merchantAccount,
                    "currencyCode"      				 => $currencyCode,
                    "paymentAmount"    					 => $paymentAmount,				
                    "sessionValidity"  					 => $sessionValidity,
                    "shipBeforeDate"    				 => $shipBeforeDate,
                    "shopperLocale"    					 => $shopperLocale,
                    "skinCode"         					 => $skinCode,
                    "shopperEmail"     					 => $shopperEmail,
                    "shopperReference" 					 => $shopperReference,
				

);
    
   $escapeval = function($val) {
return str_replace(':','\\:',str_replace('\\','\\\\',$val));
};

// Sort the array by key using SORT_STRING order
ksort($params, SORT_STRING);

// Generate the signing data string
$signData = implode(":",array_map($escapeval,array_merge(array_keys($params), array_values($params))));

// base64-encode the binary result of the HMAC computation
$merchantSig = base64_encode(hash_hmac('sha256',$signData,pack("H*" , $hmacKey),true));
$params["merchantSig"] = $merchantSig;

?>


<!-- Complete submission form -->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Adyen Payment</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
</head>
<body>
<form name="adyenForm" action="https://test.adyen.com/hpp/select.shtml" method="post">
<!-- <form name="adyenForm" action="https://test.adyen.com/hpp/tokenonepage.shtml" method="post"> -->

<?php
foreach ($params as $key => $value){
echo ' <input type="hidden" name="' .htmlspecialchars($key, ENT_COMPAT,'UTF-8').
'" value="' .htmlspecialchars($value, ENT_COMPAT,'UTF-8') . '" />' ."\n" ;
}
?>
<input type="submit" value="Submit" />
</form>
</body>
</html>
