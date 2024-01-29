<?php 
// Check if the form is submitted for "Details"
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['detailsProductId'])) {
  $detailsProductId = $_POST['detailsProductId'];

  // Fetch product details from the store table
  $stmtProductDetails = $conn->prepare("SELECT * FROM store WHERE product_id = :productId");
  $stmtProductDetails->bindParam(':productId', $detailsProductId);
  $stmtProductDetails->execute();
  $productDetails = $stmtProductDetails->fetch(PDO::FETCH_ASSOC);

  // Insert data into order_details table
  $stmtInsertOrderDetails = $conn->prepare("INSERT INTO order_details (users_id, product_id, quantity, order_date, cart_id) VALUES (:userId, :productId, :quantity, CURRENT_TIMESTAMP, :cartId)");
  $stmtInsertOrderDetails->bindParam(':userId', $userId);
  $stmtInsertOrderDetails->bindParam(':productId', $productDetails['product_id']);
  $stmtInsertOrderDetails->bindParam(':quantity', $productDetails['quantity']);
  $stmtInsertOrderDetails->bindParam(':cartId', $productDetails['cart_id']); // Assuming you have cart_id in your product details

  if ($stmtInsertOrderDetails->execute()) {
      // Insert successful, you can now redirect or perform any other action
      header("Location: index.php?detail");
      exit;
  } else {
      // Insert failed, handle the error
      header("Location: index.php?error");
      exit;
  }
}
?>
<main class="mt-2 container" id="index_home_page">
    <div class="container mt-5">
        <h2>Giỏ hàng của bạn</h2>
        <?php if (empty($cartData)): ?>
            <p>Your cart is empty.</p>
        <?php else: ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Sản phẩm</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Tổng cộng</th>
                        <th scope="col">Thao tác</th>
                        <th scope="col">Chi tiết</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cartData as $item): ?>
                        <tr>
                            <th scope="row">1</th>
                            <td><?php echo $item['product_name']; ?></td>
                            <td><?php echo $item['product_price']; ?></td>
                            <td><?php echo $item['quantity']; ?></td>
                            <td><?php echo $item['product_price'] * $item['quantity']; ?></td>
                            <td>
                                <form action="index.php" method="post">
                                    <input type="hidden" name="productId" value="<?php echo $item['cart_id']; ?>">
                                    <input type="hidden" name="quantityChange" value="1">
                                    <button type="submit" class="btn btn-primary">+</button>
                                </form>
                                <form action="index.php" method="post">
                                    <input type="hidden" name="productId" value="<?php echo $item['cart_id']; ?>">
                                    <input type="hidden" name="quantityChange" value="-1">
                                    <button type="submit" class="btn btn-warning">-</button>
                                </form>
                            </td>
                            <td>
                                <form action="index.php" method="post">
                                    <input type="hidden" name="detailsProductId" value="<?php echo $item['product_id']; ?>">
                                    <button type="submit" class="btn btn-primary">Details</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="row justify-content-end">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Tổng cộng</h5>
                            <p class="card-text total-amount"><?php echo number_format($totalPrice, 2); ?></p>
                            <p class="card-text">Thuế: 0đ</p>
                            <p class="card-text total-amount"><?php echo number_format($totalPrice, 2); ?></p>
                            <button class="btn btn-primary">Thanh toán</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</main>
