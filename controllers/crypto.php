<?php
require_once 'helpers/paybear/PayBear.php';
require_once 'helpers/randomgenerator.php';
require_once 'configs/blockchain.php';
require_once 'helpers/utility.php';
require_once 'helpers/crypto/lib/cryptobox.class.php';


class crypto extends controller{
    private $paybear;
	public function __construct(){
        parent::__construct();
        
    }
    
    public function callback(){
        if(!defined("CRYPTOBOX_WORDPRESS")) define("CRYPTOBOX_WORDPRESS", false);

        if (!CRYPTOBOX_WORDPRESS) require_once( "helpers/crypto/lib/cryptobox.class.php" );
        elseif (!defined('ABSPATH')) exit; // Exit if accessed directly in wordpress


        // a. check if private key valid
        $valid_key = false;
        if (isset($_POST["private_key_hash"]) && strlen($_POST["private_key_hash"]) == 128 && preg_replace('/[^A-Za-z0-9]/', '', $_POST["private_key_hash"]) == $_POST["private_key_hash"])
        {
            $keyshash = array();
            $arr = explode("^", CRYPTOBOX_PRIVATE_KEYS);
            foreach ($arr as $v) $keyshash[] = strtolower(hash("sha512", $v));
            if (in_array(strtolower($_POST["private_key_hash"]), $keyshash)) $valid_key = true;
        }


        // b. alternative - ajax script send gourl.io json data
        if (!$valid_key && isset($_POST["json"]) && $_POST["json"] == "1")
        {
            $data_hash = $boxID = "";
            if (isset($_POST["data_hash"]) && strlen($_POST["data_hash"]) == 128 && preg_replace('/[^A-Za-z0-9]/', '', $_POST["data_hash"]) == $_POST["data_hash"]) { $data_hash = strtolower($_POST["data_hash"]); unset($_POST["data_hash"]); }
            if (isset($_POST["box"]) && is_numeric($_POST["box"]) && $_POST["box"] > 0) $boxID = intval($_POST["box"]);

            if ($data_hash && $boxID)
            {
                $private_key = "";
                $arr = explode("^", CRYPTOBOX_PRIVATE_KEYS);
                foreach ($arr as $v) if (strpos($v, $boxID."AA") === 0) $private_key = $v;

                if ($private_key)
                {
                    $data_hash2 = strtolower(hash("sha512", $private_key.json_encode($_POST).$private_key));
                    if ($data_hash == $data_hash2) $valid_key = true;
                }
                unset($private_key);
            }

            if (!$valid_key) die("Error! Invalid Json Data sha512 Hash!");

        }


        // c.
        if ($_POST) foreach ($_POST as $k => $v) if (is_string($v)) $_POST[$k] = trim($v);



        // d.
        if (isset($_POST["plugin_ver"]) && !isset($_POST["status"]) && $valid_key)
        {
            echo "cryptoboxver_" . (CRYPTOBOX_WORDPRESS ? "wordpress_" . GOURL_VERSION : "php_" . CRYPTOBOX_VERSION);
            die;
        }

         // e.
        if (isset($_POST["status"]) && in_array($_POST["status"], array("payment_received", "payment_received_unrecognised")) &&
        $_POST["box"] && is_numeric($_POST["box"]) && $_POST["box"] > 0 && $_POST["amount"] && is_numeric($_POST["amount"]) && $_POST["amount"] > 0 && $valid_key)
        {

        foreach ($_POST as $k => $v)
        {
        if ($k == "datetime") 						$mask = '/[^0-9\ \-\:]/';
        elseif (in_array($k, array("err", "date", "period")))		$mask = '/[^A-Za-z0-9\.\_\-\@\ ]/';
        else								$mask = '/[^A-Za-z0-9\.\_\-\@]/';
        if ($v && preg_replace($mask, '', $v) != $v) 	$_POST[$k] = "";
        }

        if (!$_POST["amountusd"] || !is_numeric($_POST["amountusd"]))	$_POST["amountusd"] = 0;
        if (!$_POST["confirmed"] || !is_numeric($_POST["confirmed"]))	$_POST["confirmed"] = 0;


        $dt			= gmdate('Y-m-d H:i:s');
        $obj 		= run_sql("select paymentID, txConfirmed from crypto_payments where boxID = ".intval($_POST["box"])." && orderID = '".addslashes($_POST["order"])."' && userID = '".addslashes($_POST["user"])."' && txID = '".addslashes($_POST["tx"])."' && amount = ".floatval($_POST["amount"])." && addr = '".addslashes($_POST["addr"])."' limit 1");


        $paymentID		= ($obj) ? $obj->paymentID : 0;
        $txConfirmed	= ($obj) ? $obj->txConfirmed : 0;

        // Save new payment details in local database
        if (!$paymentID)
        {
        $sql = "INSERT INTO crypto_payments (boxID, boxType, orderID, userID, countryID, coinLabel, amount, amountUSD, unrecognised, addr, txID, txDate, txConfirmed, txCheckDate, recordCreated)
                VALUES (".intval($_POST["box"]).", '".addslashes($_POST["boxtype"])."', '".addslashes($_POST["order"])."', '".addslashes($_POST["user"])."', '".addslashes($_POST["usercountry"])."', '".addslashes($_POST["coinlabel"])."', ".floatval($_POST["amount"]).", ".floatval($_POST["amountusd"]).", ".($_POST["status"]=="payment_received_unrecognised"?1:0).", '".addslashes($_POST["addr"])."', '".addslashes($_POST["tx"])."', '".addslashes($_POST["datetime"])."', ".intval($_POST["confirmed"]).", '$dt', '$dt')";

        $paymentID = run_sql($sql);

        $box_status = "cryptobox_newrecord";
        }
        // Update transaction status to confirmed
        elseif ($_POST["confirmed"] && !$txConfirmed)
        {
        $sql = "UPDATE crypto_payments SET txConfirmed = 1, txCheckDate = '$dt' WHERE paymentID = ".intval($paymentID)." LIMIT 1";
        run_sql($sql);

        $box_status = "cryptobox_updated";
        }
        else
        {
        $box_status = "cryptobox_nochanges";
        }


        /**
        *  User-defined function for new payment - cryptobox_new_payment(...)
        *  For example, send confirmation email, update database, update user membership, etc.
        *  You need to modify file - cryptobox.newpayment.php
        *  Read more - https://gourl.io/api-php.html#ipn
        */

        if (in_array($box_status, array("cryptobox_newrecord", "cryptobox_updated")) && function_exists('cryptobox_new_payment')) cryptobox_new_payment($paymentID, $_POST, $box_status);
        }

        else
        $box_status = "Only POST Data Allowed";


        echo $box_status; // don't delete it     

    }
    
    public function createInvoiceURL(){
        $dataObj = json_decode(file_get_contents('php://input'));
       
        $userID 		= $dataObj->userId;				// place your registered userID or md5(userID) here (user1, user7, uo43DC, etc).
     
        $userFormat		= "COOKIE";			// save userID in cookies (or you can use IPADDRESS, SESSION)
        $orderID 		= "invoice000383";	// invoice number - 000383
        $amountUSD		= $dataObj->amount;				// invoice amount - 2.21 USD
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
        $coinBox = new Cryptobox($options);
        echo $coinBox->cryptobox_json_url();
    }

    public function createFakeInvoiceURL(){
 
        $dataObj = json_decode(file_get_contents('php://input'));
        
        $data['crypto'] = $dataObj->crypto;
        $data['amount'] = $dataObj->amount;
        $data['btc'] = $dataObj->btc; 
        $data['userId'] = $dataObj->userId;
        
        $response = $this->model->createFakeInvoiceURL($data);
        echo json_encode($response);
    }
    
}