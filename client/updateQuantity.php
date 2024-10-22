<?php
session_start();

$id = $_POST['id'];
$quantity = $_POST['quantity'];

// Update the session data
foreach ($_SESSION['cart'] as $key => $item) {
    if ($item['id'] == $id) {
        $_SESSION['cart'][$key]['quantity'] = $quantity;
        break;
    }
}

// Calculate the new total price
$sum_total = 0;
foreach ($_SESSION['cart'] as $item) {
    $sum_total += $item['price'] * $item['quantity'];
}

echo $sum_total;
?>