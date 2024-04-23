<?php

require __DIR__ . "/vendor/autoload.php";

$stripe_secret_key = "sk_test_51P8PzK08anq2t9DjoR5llvPnQyZcUIIe4JWlHg1A8ZBjVX8iVzgks7oAdK3ijPjqYntqHiI294ZR2f3oULT5ADaa003gye55Bl";
\Stripe\Stripe::setApiKey($stripe_secret_key);

$product_names = $_POST['product_name'];
$quantities = $_POST['quantity'];
$unit_prices = $_POST['unit_price'];

$line_items = [];
for ($i = 0; $i < count($product_names); $i++) {
    $line_items[] = [
        'quantity' => $quantities[$i],
        'price_data' => [
            'currency' => 'usd',
            'unit_amount' => $unit_prices[$i] * 100, // Stripe expects cents
            'product_data' => [
                'name' => $product_names[$i],
            ],
        ],
    ];
}

$checkout_session = \Stripe\Checkout\Session::create([
    "mode" => "payment",
    "success_url" => "http://localhost/success.php",
    "cancel_url" => "http://localhost/E_commerce/index.php",
    "locale" => "auto",
    "line_items" => $line_items,
]);

http_response_code(303);
header("Location: " . $checkout_session->url);

?>
