<?php
//check whether stripe token is not empty
if(!empty($_POST['stripeToken'])){
    include_once 'dbConfig.php';
    //get token, card and user info from the form
    $token  = $_POST['stripeToken'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $card_num = $_POST['card_num'];
    $card_cvc = $_POST['cvc'];
    $card_exp_month = $_POST['exp_month'];
    $card_exp_year = $_POST['exp_year'];
    
    $itemPrice = $_POST['total'];
    $currency = "usd";
    $orderID = $_POST['orderid'];

    //include Stripe PHP library
    require_once('stripe-php/init.php');
    
    //set api key
    $stripe = array(
      "secret_key"      => "sk_test_0Okq1MpjgKCopOeUixq6HiMc00R4pc0qlB",
      "publishable_key" => "pk_test_RCflAU9Cvn4JGZjh35ak1w2100FrTTGEdm"
    );
    
    \Stripe\Stripe::setApiKey($stripe['secret_key']);
    
    //add customer to stripe
    $customer = \Stripe\Customer::create(array(
        'email' => $email,
        'source'  => $token
    ));
    
    
    //charge a credit or a debit card
    $charge = \Stripe\Charge::create(array(
        'customer' => $customer->id,
        'amount'   => $itemPrice,
        'currency' => $currency,
        'metadata' => array(
            'order_id' => $orderID
        )
    ));
    
    //retrieve charge details
    $chargeJson = $charge->jsonSerialize();

    //check whether the charge is successful
    if($chargeJson['amount_refunded'] == 0 && empty($chargeJson
['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1){
        //order details 
        $amount = $chargeJson['amount'];
        $balance_transaction = $chargeJson['balance_transaction'];
        $currency = $chargeJson['currency'];
        $status = $chargeJson['status'];
        $date = date("Y-m-d H:i:s");
        
        //include database config file
        
        //insert tansaction data into the database
        $sql = "UPDATE orders_customers SET status = 'Paid' WHERE orderid = '".$_POST['orderid']."'";
        $insert = $db->query($sql);
        $last_insert_id = $_POST['orderid'];
        
        //if order inserted successfully
        if($last_insert_id && $status == 'succeeded'){
            $statusMsg = "<h2>The transaction was successful.</h2>
<h4>Order ID: {$last_insert_id}</h4>";
        }else{
            $statusMsg = "Transaction has been failed";
        }
    }else{
        $statusMsg = "Transaction has been failed";
    }
}else{
    $statusMsg = "Form submission error.......";
}

//show success or error message
echo $statusMsg;
?>