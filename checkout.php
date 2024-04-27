<?php

require __DIR__ . "/vendor/autoload.php";

$stripe_secret_key = "sk_test_51P8e7Q2LPdfCRwvh8sa4dZGkz01iZxh4zVz2SICR75FFDWiTao8xg4brkS4IskcQq1Pj9jBGkBlXMh8xlRnZ0xMy00n30ybP2x";
\Stripe\Stripe::setApiKey($stripe_secret_key);

$product_names = $_POST['product_name'];
$quantities = $_POST['quantity'];
$unit_prices = $_POST['unit_price'];

$line_items = [];
for ($i = 0; $i < count($product_names); $i++) {
    $line_items[] = [
        'quantity' => $quantities[$i],
        'price_data' => [
            'currency' => 'php',
            'unit_amount' => $unit_prices[$i] * 100, 
            'product_data' => [
                'name' => $product_names[$i],
            ],
        ],
    ];
}

$checkout_session = \Stripe\Checkout\Session::create([
    "mode" => "payment",
    "success_url" => "http://handmadegoods.online/success.php",
    "cancel_url" => "http://localhost/E_commerce/index.php",
    "locale" => "auto",
    "line_items" => $line_items,
]);

http_response_code(303);
header("Location: " . $checkout_session->url);


?>
