<?php
session_start();
function generateRandomColor() {
    // Tạo một màu ngẫu nhiên
    $color = sprintf('#%06X', mt_rand(0, 0xFFFFFF));

    return $color;
}

// Sử dụng hàm generateRandomColor() để tạo order_id ngẫu nhiên dưới dạng hex color
$order_id = generateRandomColor();
echo $order_id;

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "flashcard";

// Create connection
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Function to fetch cart data for a specific user
function getCartData($userId, $conn)
{
    $stmt = $conn->prepare("SELECT cart.cart_id, products.product_name, products.product_price, cart.quantity
                           FROM cart
                           INNER JOIN products ON cart.product_id = products.product_id
                           WHERE cart.user_id = :userId");
    $stmt->bindParam(':userId', $userId);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Get user ID from the session
$userId = $_SESSION['user_id'];

// Fetch cart data for the logged-in user
$cartData = getCartData($userId, $conn);

// Check if the form is submitted (for updating quantity)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = $_POST['productId'];
    $quantityChange = (int)$_POST['quantityChange']; // Tăng (+1) hoặc giảm (-1) số lượng

    // Fetch current quantity
    $stmtCurrentQuantity = $conn->prepare("SELECT quantity FROM cart WHERE cart_id = :cartId");
    $stmtCurrentQuantity->bindParam(':cartId', $productId);
    $stmtCurrentQuantity->execute();
    $currentQuantity = $stmtCurrentQuantity->fetchColumn();

    // Calculate new quantity
    $newQuantity = max(0, $currentQuantity + $quantityChange);

    if ($newQuantity === 0) {
        // Remove item from cart
        $stmtRemoveItem = $conn->prepare("DELETE FROM cart WHERE cart_id = :cartId");
        $stmtRemoveItem->bindParam(':cartId', $productId);
        $stmtRemoveItem->execute();
    } else {
        // Update quantity in the cart
        $stmtUpdateQuantity = $conn->prepare("UPDATE cart SET quantity = :newQuantity WHERE cart_id = :cartId");
        $stmtUpdateQuantity->bindParam(':newQuantity', $newQuantity);
        $stmtUpdateQuantity->bindParam(':cartId', $productId);
        $stmtUpdateQuantity->execute();
    }

    // Fetch updated cart data
    $cartData = getCartData($userId, $conn);
    // Sau khi xử lý POST
    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
}
$totalPrice = 0;
foreach ($cartData as $item) {
    $totalPrice += $item['product_price'] * $item['quantity'];
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Cart</h2>

    <?php if (empty($cartData)): ?>
        <p>Your cart is empty.</p>
    <?php else: ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                    <th scope="col">Actions</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cartData as $item): ?>
                    <tr>
                        <td><?php echo $item['product_name']; ?></td>
                        <td><?php echo $item['product_price']; ?></td>
                        <td><?php echo $item['quantity']; ?></td>
                        <td><?php echo $item['product_price'] * $item['quantity']; ?></td>
                        <td>
                            <!-- Form to update quantity -->
                            <form action="check3.php" method="post">
                                <input type="hidden" name="productId" value="<?php echo $item['cart_id']; ?>">
                                <input type="hidden" name="quantityChange" value="1">
                                <button type="submit" class="btn btn-primary">+</button>
                            </form>
                        </td>
                        <td>
                            <!-- Form to decrease quantity -->
                            <form action="check3.php" method="post">
                                <input type="hidden" name="productId" value="<?php echo $item['cart_id']; ?>">
                                <input type="hidden" name="quantityChange" value="-1">
                                <button type="submit" class="btn btn-warning">-</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

       <!-- Hiển thị tổng giá tiền -->
       <div class="row mt-3">
            <div class="col-md-6">
                <p>Total Price: $<?php echo number_format($totalPrice, 2); ?></p>
            </div>
        </div>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <button type="submit" name="detail" class="btn btn-success">Chi tiết đơn hàng</button>
        </form>
    <?php endif; ?>

    <!-- Nút quay về check2.php -->
<a href="check2.php" class="btn btn-secondary">Back to Check 2</a>

<!-- Nút quay về check1.php -->
<a href="check1.php" class="btn btn-secondary">Back to Check 1</a>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
