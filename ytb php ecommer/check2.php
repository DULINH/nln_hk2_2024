<?php
session_start();

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "flashcard";

// Create connection
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Fetch products from the database
$stmt = $conn->prepare("SELECT * FROM products");
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_SESSION['user_id'];
    $productId = $_POST['productId'];
    $quantity = $_POST['quantity'];

    // Insert into cart table
    $stmt = $conn->prepare("INSERT INTO cart (user_id, product_id, quantity) VALUES (:userId, :productId, :quantity)");
    $stmt->bindParam(':userId', $userId);
    $stmt->bindParam(':productId', $productId);
    $stmt->bindParam(':quantity', $quantity);

    if ($stmt->execute()) {
        $successMessage = 'Product added to the cart successfully.';
    } else {
        $errorMessage = 'Error adding product to the cart.';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <h2>Product List</h2>

        <?php if (isset($successMessage)): ?>
            <div class="alert alert-success" role="alert">
                <?php echo $successMessage; ?>
            </div>
        <?php elseif (isset($errorMessage)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $errorMessage; ?>
            </div>
        <?php endif; ?>

        <p>User ID: <?php echo $_SESSION['user_id']; ?></p>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Price</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <th scope="row"><?php echo $product['product_id']; ?></th>
                        <td><?php echo $product['product_name']; ?></td>
                        <td><?php echo number_format($product['product_price'], 2); ?></td>
                        <td>
                            <form action="check2.php" method="post">
                                <input type="hidden" name="productId" value="<?php echo $product['product_id']; ?>">
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class="btn btn-success">Add to Cart</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Hiển thị số lượng sản phẩm trong giỏ hàng -->
        <p>Items in Cart: <?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?></p>
    </div>
    <!-- Nút quay về check1.php -->
<a href="check1.php" class="btn btn-secondary">Back to Check 1</a>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
