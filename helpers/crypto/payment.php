<?php 
    require_once( "lib/cryptobox.class.php" );
        
        
    /**** CONFIGURATION VARIABLES ****/ 
    
    $userID 		= "90";				// place your registered userID or md5(userID) here (user1, user7, uo43DC, etc).
                                        // you don't need to use userID for unregistered website visitors
                                        // if userID is empty, system will autogenerate userID and save in cookies
    $userFormat		= "COOKIE";			// save userID in cookies (or you can use IPADDRESS, SESSION)
    $orderID 		= "invoice000383";	// invoice number - 000383
    $amountUSD		= 27.9;				// invoice amount - 2.21 USD
    $period			= "NOEXPIRY";		// one time payment, not expiry
    $def_language	= "en";				// default Payment Box Language
    $public_key		= "55739AAWafomBitcoin77BTCPUBngTTQTGKGLcULrHH69levLy"; // from gourl.io
    $private_key	= "55739AAWafomBitcoin77BTCPRVWW6r70HE0JHQMBf3yHVBHFQ";// from gourl.io

    /** PAYMENT BOX **/
    $options = array(
        "public_key"  => $public_key, 	// your public key from gourl.io
        "private_key" => $private_key, 	// your private key from gourl.io
        "webdev_key"  => "", 		// optional, gourl affiliate key
        "orderID"     => $orderID, 		// order id or product name
        "userID"      => $userID, 		// unique identifier for every user
        "userFormat"  => $userFormat, 	// save userID in COOKIE, IPADDRESS or SESSION
        "amount"   	  => 0,				// product price in coins OR in USD below
        "amountUSD"   => $amountUSD,	// we use product price in USD
        "period"      => $period, 		// payment valid period
        "language"	  => $def_language  // text on EN - english, FR - french, etc
    );

    // Initialise Payment Class
    $box = new Cryptobox ($options);
    
    // coin name
    $coinName = $box->coin_name(); 

    // Successful Cryptocoin Payment received
    if ($box->is_paid()) 
    {
        if (!$box->is_confirmed()) {
            $message =  "Thank you for order (order #".$orderID.", payment #".$box->payment_id()."). Awaiting transaction/payment confirmation";
        }											
        else 
        { // payment confirmed (6+ confirmations)

            // one time action
            if (!$box->is_processed())
            {
                // One time action after payment has been made/confirmed
                // !!For update db records, please use function cryptobox_new_payment()!!
                
                $message = "Thank you for order (order #".$orderID.", payment #".$box->payment_id()."). Payment Confirmed. <br>(User will see this message one time after payment has been made)"; 
                
                // Set Payment Status to Processed
                $box->set_status_processed();  
            }
            else $message = "Thank you for order (order #".$orderID.", payment #".$box->payment_id()."). Payment Confirmed. <br>(User will see this message during ".$period." period after payment has been made)"; // General message
        }
    }
    else $message = "This invoice has not been paid yet";


    // Optional - Language selection list for payment box (html code)
    $languages_list = display_language_box($def_language);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
<html><head>
<title><?php echo $coinName; ?>  Payment Processor</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv='cache-control' content='no-cache'>
<meta http-equiv='Expires' content='-1'>
<meta name='robots' content='all'>
<script src='http://localhost/tradinary/api/helpers/crypto/js/cryptobox.min.js' type='text/javascript'></script>
</head>
<body style='font-family:Arial,Helvetica,sans-serif;font-size:13px;color:#666;margin:0'>
<div align='center'>

<br/>
<?php if (!$box->is_paid()) echo "<h2>Pay Invoice Now - </h2>"; else echo "<br><br>";  ?>
<div style='margin:30px 0 5px 300px'>Language: &#160; <?php echo $languages_list; ?></div>
<?php echo $box->display_cryptobox(true, 580, 230); ?>
<br><br><br>
<h3>Message :</h3>
<h2 style='color:#999'><?php echo $message; ?></h2>


</div><br><br><br><br><br><br>
<div style='position:absolute;left:0;'><a target="_blank" href="http://validator.w3.org/check?uri=<?php echo "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>"><img src="https://gourl.io/images/w3c.png" alt="Valid HTML 4.01 Transitional"></a></div>
</body>
</html>