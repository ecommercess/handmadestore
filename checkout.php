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



include('Config.php');


if(isset($_POST['qty_id']) && is_array($_POST['qty_id']) && !empty($_POST['qty_id'])) {
    foreach ($_POST['qty_id'] as $key => $quantity_id) {
        $name = $_POST['product_name'][$key];
        $cost = $_POST['price'][$key];
        $qty = $_POST['quantity'][$key];
        $uid = $_POST['uid'];
        $id = $quantity_id;


        $sql = "INSERT INTO tbl_orders (product_name, product_price, product_qty, uid) VALUES (?, ?, ?, ?)";


        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssii", $name, $cost, $qty, $uid);

        if ($stmt->execute()) {
                echo "<script>
                alert('Order Placed!');
                window.location.href='dashboard.php';
                </script>";
        } else {
            echo "Error updating record: " . $stmt->error;
        }

        $stmt->close();
    }
} else {
    echo "No data received or invalid data format.";
}

// Close connection
$conn->close();

?>


?>
