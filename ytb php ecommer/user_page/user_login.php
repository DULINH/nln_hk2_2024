<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nln_hk2_2024";
$user = null;

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['submitted'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $stmt = $conn->prepare("SELECT * FROM users 
                                         WHERE users_name = :username 
                                         AND users_pwd = :userpwd");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':userpwd', $password); 
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Sau khi xử lý đăng nhập thành công
        if ($user) {
          $_SESSION['users_id'] = $user['users_id'];
          $_SESSION['users_name'] = $user['users_name'];
          $_SESSION['users_email'] = $user['users_email'];
          $_SESSION['users_pwd'] = $user['users_pwd'];

            // Kiểm tra xem người dùng đã đăng nhập hay chưa
            if (isset($_SESSION['users_id'])) {
                // Nếu đã đăng nhập, chuyển hướng đến trang cuahang
                header("Location: index.php?homepage");
                exit;
            }
        } else {
          // Xử lý khi đăng nhập không thành công
              if (!isset($_SESSION['users_id'])) {
                // Nếu đã đăng nhập, chuyển hướng đến trang cuahang
                header("Location: index.php?404");
                exit;
            }
        }
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

if ($user) {
    $_SESSION['users_id'] = $user['users_id'];
    $_SESSION['users_name'] = $user['users_name'];
    $_SESSION['users_email'] = $user['users_email'];
    $_SESSION['users_pwd'] = $user['users_pwd'];
}

// Fetch products from the database
$stmtProductE = $conn->prepare("SELECT * FROM store WHERE product_type = 'eng'");
$stmtProductC = $conn->prepare("SELECT * FROM store WHERE product_type = 'chinese'");
$stmtProductK = $conn->prepare("SELECT * FROM store WHERE product_type = 'korean'");
$stmtProductI = $conn->prepare("SELECT * FROM store WHERE product_type = 'items'");
$stmtProductE->execute();
$stmtProductC->execute();
$stmtProductK->execute();
$stmtProductI->execute();
$productsE = $stmtProductE->fetchAll(PDO::FETCH_ASSOC);
$productsC = $stmtProductC->fetchAll(PDO::FETCH_ASSOC);
$productsK = $stmtProductK->fetchAll(PDO::FETCH_ASSOC);
$productsI = $stmtProductI->fetchAll(PDO::FETCH_ASSOC);

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['productId']) && isset($_POST['quantity'])) {
  $userId = $_SESSION['users_id'];
  $productId = $_POST['productId'];
  $quantity = $_POST['quantity'];
  $action = isset($_POST['action']) ? $_POST['action'] : '';

  if (!empty($productId) && !empty($quantity) && !empty($action)) {
      if ($action === 'addToCart') {
          // Insert into cart table
          $stmtAdd = $conn->prepare("INSERT INTO cart (users_id, product_id, quantity) VALUES (:userId, :productId, :quantity)");
          $stmtAdd->bindParam(':userId', $userId);
          $stmtAdd->bindParam(':productId', $productId);
          $stmtAdd->bindParam(':quantity', $quantity);

          if ($stmtAdd->execute()) {
              $successMessage = 'Product added to the cart successfully.';
          } else {
              $errorMessage = 'Error adding product to the cart: ' . implode(" ", $stmtAdd->errorInfo());
          }
      } elseif ($action === 'addToDetail') {
          // Insert into order_details table
          $stmtAddDetail = $conn->prepare("INSERT INTO order_details (users_id, product_id, quantity) VALUES (:userId, :productId, :quantity)");
          $stmtAddDetail->bindParam(':userId', $userId);
          $stmtAddDetail->bindParam(':productId', $productId);
          $stmtAddDetail->bindParam(':quantity', $quantity);

          if ($stmtAddDetail->execute()) {
              $successMessage = 'Product added to details successfully.';
          } else {
              $errorMessage = 'Error adding product to details: ' . implode(" ", $stmtAddDetail->errorInfo());
          }
      } else {
          $errorMessage = 'Invalid action.';
      }
  } else {
      $errorMessage = 'Invalid product ID, quantity, or action.';
  }
}

// Function to fetch cart data for a specific user
function getCartData($userId, $conn)
{
    $stmt = $conn->prepare("SELECT cart.cart_id, store.product_name, store.product_price, cart.quantity
                           FROM cart
                           INNER JOIN store ON cart.product_id = store.product_id
                           WHERE cart.users_id = :userId");
    $stmt->bindParam(':userId', $userId);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Get user ID from the session
$userId = isset($_SESSION['users_id']) ? $_SESSION['users_id'] : null;

// Fetch cart data for the logged-in user
$cartData = $userId ? getCartData($userId, $conn) : [];

// Function to fetch order details for a specific user
function getOrderDetails($userId, $conn)
{
    $stmt = $conn->prepare("SELECT order_details.order_id, store.product_name, store.product_price, order_details.quantity, store.product_info, order_details.order_date
                           FROM order_details
                           INNER JOIN store ON order_details.product_id = store.product_id
                           WHERE order_details.users_id = :userId");
    $stmt->bindParam(':userId', $userId);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Get user ID from the session
$userId = isset($_SESSION['users_id']) ? $_SESSION['users_id'] : null;

// Fetch order details for the logged-in user
$orderDetails = $userId ? getOrderDetails($userId, $conn) : [];


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
        header("Location: index.php?giohang");
        exit;
    } else {
        // Update quantity in the cart
        $stmtUpdateQuantity = $conn->prepare("UPDATE cart SET quantity = :newQuantity WHERE cart_id = :cartId");
        $stmtUpdateQuantity->bindParam(':newQuantity', $newQuantity);
        $stmtUpdateQuantity->bindParam(':cartId', $productId);
        $stmtUpdateQuantity->execute();
        header("Location: index.php?giohang");
        exit;
    }
}

$totalPrice = 0;
if ($cartData) {
    foreach ($cartData as $item) {
        $totalPrice += $item['product_price'] * $item['quantity'];
    }
}


// Kiểm tra khi nhấn nút "Detail"
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['detailsProductId'])) {
  $detailsProductId = $_POST['detailsProductId'];

  // Truy vấn để lấy thông tin chi tiết đơn hàng
  $stmtDetails = $conn->prepare("
      SELECT
          order_details.*,
          store.product_name,
          store.product_price,
          users.users_name,
          users.users_email
      FROM
          order_details
      INNER JOIN store ON order_details.product_id = store.product_id
      INNER JOIN cart ON order_details.cart_id = cart.cart_id
      INNER JOIN users ON order_details.users_id = users.users_id
      WHERE
          order_details.order_id = :orderDetailsId
  ");
  $stmtDetails->bindParam(':orderDetailsId', $detailsProductId);
  $stmtDetails->execute();

  $orderDetails = $stmtDetails->fetch(PDO::FETCH_ASSOC);
}