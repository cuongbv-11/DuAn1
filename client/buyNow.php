<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['buy_now'])) {
    $productId = $_POST['id'];
    $productName = $_POST['name'];
    $productPrice = $_POST['price'];
    $product = [
        'id' => $productId,
        'name' => $productName,
        'price' => $productPrice,
        'quantity' => 1
    ];
    if (!isset($_SESSION['buy'])) {
        $_SESSION['buy'] = [];
    }

    $_SESSION['buy'][] = $product;

    // Calculate total value of the order
    $totalValue = calculateTotalValue($_SESSION['buy']);

    // Store the total value in the session
    $_SESSION['resultTotal'] = $totalValue;

    echo 'Đặt hàng thành công!';
} else {
    echo 'Yêu cầu không hợp lệ';
}

// Function to calculate total value of the order
function calculateTotalValue($buyItems)
{
    $totalValue = 0;
    foreach ($buyItems as $item) {
        $totalValue += $item['price'] * $item['quantity'];
    }
    return $totalValue;
}
