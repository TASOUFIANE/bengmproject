<?php
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;

require 'config.php';

if (empty($_GET['paymentId']) || empty($_GET['PayerID'])) {
    throw new Exception('The response is missing the paymentId and PayerID');
}

$paymentId = $_GET['paymentId'];
$payment = Payment::get($paymentId, $apiContext);

$execution = new PaymentExecution();
$execution->setPayerId($_GET['PayerID']);

try {
    // Take the payment
    $payment->execute($execution, $apiContext);

    try {
        $con = new PDO($dbConfig['host'], $dbConfig['username'], $dbConfig['password'], $dbConfig['option']);

        $payment = Payment::get($paymentId, $apiContext);

        $data = [
            'name'=>$payment->transactions[0]->item_list->items[0]->name,
            'transaction_id' => $payment->getId(),
            'payment_amount' => $payment->transactions[0]->amount->total,
            'currency_code' => $payment->transactions[0]->amount->currency,
            'payment_status' => $payment->getState(),
            'invoice_id' => $payment->transactions[0]->invoice_number,
          
	     'description' => $payment->transactions[0]->description,
        ];
        if (addPayment($data) !== false && $data['payment_status'] === 'approved') {
            // Payment successfully added, redirect to the payment complete page.
			$inserids =$con->lastInsertId();
            header("location:http://localhost/project/index.php");
            exit(1);
        } else {
            // Payment failed
			header("location:http://localhost/project/index.php");
             exit(1);
        }

    } catch (Exception $e) {
        // Failed to retrieve payment from PayPal

    }

} catch (Exception $e) {
    // Failed to take payment

}

/**
 * Add payment to database
 *
 * @param array $data Payment data
 * @return int|bool ID of new payment or false if failed
 */
function addPayment($data)
{
    global $con;

    if (is_array($data)) {
		//'isdsssss' --- i - integer, d - double, s - string, b - BLOB
      /*  $stmt = $db->prepare('INSERT INTO `payments` (transaction_id, payment_amount,currency_code, payment_status, invoice_id, createdtime) VALUES(?, ?, ?, ?, ?,?)');
        $stmt->bind_param(
            'isdsssss',
            
            
            date('Y-m-d H:i:s')*/
             $tr=$data['transaction_id'];
             $pym= $data['payment_amount'];
             $curr= $data['currency_code'];
             $payment_s=$data['payment_status'];
             $inv= $data['invoice_id'];
             $name=$data['name'];
            
            $stmt=$con->prepare("INSERT into payments (transaction_id, payment_amount,currency_code, payment_status, invoice_id, name,createdtime) VALUES (:ztrn,:zpyn,:zcurr,:zpaysts,:zid,:zname,now())");
             $stmt->execute(array(':ztrn'=>$tr,':zpyn'=>$pym,':zcurr'=>$curr,':zpaysts'=>$payment_s,':zid'=>$inv,':zname'=>$name));  
      
        
		
        return $con->lastInsertId();
    }

    return false;
}
