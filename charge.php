<?php
    require_once('vendor/autoload.php');
    require_once('config/db.php');
    require_once('lib/pdo_db.php');
    require_once('models/Customer.php');
    require_once('models/Transaction.php');
    
    \Stripe\Stripe::setApiKey('sk_test_LgQue9zAPQ05UkFHjoAnxSE4');

    //Sanitize Post array
    $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
    $first_name = $POST['first_name'];
    $last_name = $POST['last_name'];
    $email = $POST['email'];
    $token = $POST['stripeToken'];

    //Create customer in stripe
    $customer = \Stripe\Customer::create(array(
        "email" => $email,
        "source" => $token
    ));

    //Charge customer
    $charge = \Stripe\Charge::create(array(
        "amount" => 5000,
        "currency" => "usd",
        "description" => "Into to React course",
        "customer" => $customer->id
    ));

    //Instantiate Customer
    $customerData = [
        'id' => $charge->customer,
        'first_name' => $first_name,
        'last_name' => $last_name,
        'email' => $email
    ];

    $customer = new Customer();
    $customer->addCustomer($customerData);

    //Instantiate Transaction
    $transactionData = [
        'id' => $charge->id,
        'customer_id' => $charge->customer,
        'product' => $charge->description,
        'amount' => $charge->amount,
        'status' => $charge->status,
        'currency' => $charge->currency,
    ];

    $transaction = new Transaction();
    $transaction->addTransaction($transactionData);

    //Redirect to success
    header('Location: success.php?tid='.$charge->id.'&product='.$charge->description.'');
?>