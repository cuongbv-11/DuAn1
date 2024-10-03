<?php
session_start();

if (isset($_POST['id']) && isset($_POST['quantity'])) {
    $productId = $_POST['id'];
    $newQuantity = $_POST['quantity'];

    foreach ($_SESSION['cart'] as &$item) {
        if ($item['id'] == $productId) {
            $item['quantity'] = $newQuantity;
            break;
        }
    }

    $sum_total = 0;
    foreach ($_SESSION['cart'] as $item) {
        $sum_total += $item['price'] * $item['quantity'];
    }

    $_SESSION['resultTotal'] = $sum_total;

    echo number_format($sum_total, 0, ",", ".");
}
?>