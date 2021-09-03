<?php
class crypto_model extends model{
    public function __construct(){
        parent::__construct();
    }

    public function createFakeInvoiceURL($data){
        $userId = $data['userId'];
        $amount = $data['amount'];
        $crypto = $data['crypto'];

        $selectedPlan = $this->getPlanByAmount($amount);
        $user = $this->getUserById($userId);

        // $query = "SELECT * FROM tbl_funds WHERE "
        $planName = $selectedPlan['plan_name'];
        $planId = $selectedPlan['plan_id'];
        $email = $user['email'];
        
        $query = $this->db->getItem("SELECT * FROM tbl_fund WHERE user_id='$userId' AND payment_confirmation=0 ");
        if($query){
            $response['status'] = 400;
            $response['message'] = "unsettle payment instance already available";
        }else{
            $db_data = [
                "user_id" => $userId,
                "plan_id" => $planId,
                "plan_amount" => $amount,
                "email" => $email,
                "billing_method" => 'btc',
                "payment_confirmation" => 0,
                "trans_id" => "TR/$userId",
                "date_time_pledged" => (new DateTime('NOW'))->format('Y-m-d h:i:s')
            ];
            $this->db->insert('tbl_fund', $db_data);
            $response['status']= 200;
            $response['message'] = 'new payment recorded';
        }

        
        return $response;
    }

    private function getUserById($id){
        $result = $this->db->getItem("SELECT * FROM tbl_users WHERE id='$id'");
        return $result;
    }

    private function getPlanByAmount($amount){
        $plans = $this->db->getAssoc( "SELECT * FROM tbl_plans" );
        $selectedPlan;
        foreach($plans as $key => $value) {
            $from = $value['plan_from'];
            $to = $value['plan_to'];

            if($amount <= $to && $amount >= $from){
                $selectedPlan = $value;
                break;
            }
        }
        return $selectedPlan;
    }

    public function callback($data){
        // e.
        if (isset($data["status"]) && in_array($data["status"], array("payment_received", "payment_received_unrecognised")) &&
                $data["box"] && is_numeric($data["box"]) && $data["box"] > 0 && $data["amount"] && is_numeric($data["amount"]) && $data["amount"] > 0 && $valid_key)
        {

            foreach ($data as $k => $v)
            {
                if ($k == "datetime") 						$mask = '/[^0-9\ \-\:]/';
                elseif (in_array($k, array("err", "date", "period")))		$mask = '/[^A-Za-z0-9\.\_\-\@\ ]/';
                else								$mask = '/[^A-Za-z0-9\.\_\-\@]/';
                if ($v && preg_replace($mask, '', $v) != $v) 	$data[$k] = "";
            }

            if (!$data["amountusd"] || !is_numeric($data["amountusd"]))	$data["amountusd"] = 0;
            if (!$data["confirmed"] || !is_numeric($data["confirmed"]))	$data["confirmed"] = 0;


            $dt			= gmdate('Y-m-d H:i:s');
            $obj 		= run_sql("select paymentID, txConfirmed from crypto_payments where boxID = ".intval($data["box"])." && orderID = '".addslashes($data["order"])."' && userID = '".addslashes($data["user"])."' && txID = '".addslashes($data["tx"])."' && amount = ".floatval($data["amount"])." && addr = '".addslashes($data["addr"])."' limit 1");


            $paymentID		= ($obj) ? $obj->paymentID : 0;
            $txConfirmed	= ($obj) ? $obj->txConfirmed : 0;

            // Save new payment details in local database
            if (!$paymentID)
            {
                $sql = "INSERT INTO crypto_payments (boxID, boxType, orderID, userID, countryID, coinLabel, amount, amountUSD, unrecognised, addr, txID, txDate, txConfirmed, txCheckDate, recordCreated)
                        VALUES (".intval($data["box"]).", '".addslashes($data["boxtype"])."', '".addslashes($data["order"])."', '".addslashes($data["user"])."', '".addslashes($data["usercountry"])."', '".addslashes($data["coinlabel"])."', ".floatval($data["amount"]).", ".floatval($data["amountusd"]).", ".($data["status"]=="payment_received_unrecognised"?1:0).", '".addslashes($data["addr"])."', '".addslashes($data["tx"])."', '".addslashes($data["datetime"])."', ".intval($data["confirmed"]).", '$dt', '$dt')";

                $paymentID = run_sql($sql);

                /**save to tbl_fund to fund the user's wallet */
                // $userInfo = $this->getUserInfo($data["user"]);

                // $db_data = [
                //     "user_id" => $data["user"],
                //     ""
                // ];

                $box_status = "cryptobox_newrecord";
            }
            // Update transaction status to confirmed
            elseif ($data["confirmed"] && !$txConfirmed)
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

            if (in_array($box_status, array("cryptobox_newrecord", "cryptobox_updated")) && function_exists('cryptobox_new_payment')) cryptobox_new_payment($paymentID, $data, $box_status);
        }

        else
            $box_status = "Only POST Data Allowed";


        $response['box_status'] = $box_status;
        return $response; // don't delete it     
    }

    private function getUserInfo($id){
        $result = $this->db->getItem("SELECT * FROM tbl_users WHERE id=$id");
        return $result;
    }
}