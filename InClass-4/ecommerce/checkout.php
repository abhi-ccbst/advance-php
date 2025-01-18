<?php
include 'includes/header.php';
include 'includes/db.php';

// Ensure the user is logged in
if (!isset($_COOKIE['user_id'])) {
    echo "<p>Please <a href='login.php'>login</a> to proceed with checkout.</p>";
    include 'includes/footer.php';
    exit();
}

$user_id = $_COOKIE['user_id'];

// Process the order
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $conn->prepare("SELECT c.product_id, c.quantity, p.price 
        FROM cart c 
        JOIN products p ON c.product_id = p.id 
        WHERE c.user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $total_price = 0;
        $order_items = [];

        while ($row = $result->fetch_assoc()) {
            $total_price += $row['price'] * $row['quantity'];
            $order_items[] = [
                'product_id' => $row['product_id'],
                'quantity' => $row['quantity']
            ];
        }

        // Insert order into the orders table
        $order_stmt = $conn->prepare("INSERT INTO orders (user_id, total_price, order_date) VALUES (?, ?, NOW())");
        $order_stmt->bind_param("id", $user_id, $total_price);
        $order_stmt->execute();
        $order_id = $order_stmt->insert_id;

        // Insert order items into order_items table
        $item_stmt = $conn->prepare("INSERT INTO order_items (order_id, product_id, quantity) VALUES (?, ?, ?)");
        foreach ($order_items as $item) {
            $item_stmt->bind_param("iii", $order_id, $item['product_id'], $item['quantity']);
            $item_stmt->execute();
        }

        // Clear the cart
        $clear_stmt = $conn->prepare("DELETE FROM cart WHERE user_id = ?");
        $clear_stmt->bind_param("i", $user_id);
        $clear_stmt->execute();

        // Redirect to the order success page
        header("Location: order_success.php?order_id=$order_id");
        exit();
    } else {
        echo "<p>Your cart is empty. <a href='products.php'>Shop now</a>.</p>";
    }
}

// Display the checkout form
echo "<h1>Checkout</h1>";
echo "<form method='POST' action='checkout.php'>";
echo "<p>Click the button below to confirm your order.</p>";
echo "<button type='submit'>Confirm Order</button>";
echo "</form>";

include 'includes/footer.php';
?>
