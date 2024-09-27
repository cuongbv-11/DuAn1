<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['selectedProducts'])) {
        $_SESSION['selectedProducts'] = $_POST['selectedProducts'];
        echo 'Success'; // Respond to the AJAX request
        exit;
    }
}

// ... (other code)



// Display the overall order information as before
if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
    $dataDb = $_SESSION['cart'];
    // ... (rest of your code)
}
?>
