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
                                <a type="submit" href="index.php?detail" class="btn btn-primary">Details</a>
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
