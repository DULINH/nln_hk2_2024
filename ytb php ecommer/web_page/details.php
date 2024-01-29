<main class="mt-2 container" id="index_home_page">
    <?php if (empty($orderDetails)): ?>
    <h2>Your order details are empty.</h2>
    <?php else: ?>
    <?php foreach ($orderDetails as $item): ?>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title mb-4">Thông tin sản phẩm</h5>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <h6 class="text-muted">Customer Information</h6>
                        <p><strong>Name: </strong><?php echo "{$_SESSION['users_name']}" ?></p>
                        <p><strong>Email: </strong><?php echo "{$_SESSION['users_email']}" ?></p>
                        <p><strong>Phone: </strong> <?php echo "{$_SESSION['users_email']}" ?></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3 text-end">
                        <h6 class="text-muted">Order Information</h6>
                        <p><strong>Order ID: </strong> <?php echo $item['order_id']; ?></p>
                        <p><strong>Order Date: </strong><?php echo $item['order_date']; ?></p>
                        <p><strong>Cart ID:</strong> #1123456</p>
                    </div>
                </div>
            </div>
            <hr class="my-4">
            <h6 class="text-muted mb-4">Order Items</h6>
            <div class="table-responsive">
                <table class="table align-middle table-nowrap table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 50px;">No.</th>
                            <th>Item</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th class="text-end">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>
                                <h6 class="mb-0"><?php echo $item['product_name']; ?></h6>
                                <small class="text-muted"><?php echo $item['product_info']; ?></small>
                            </td>
                            <td><?php echo $item['product_price']; ?></td>
                            <td><?php echo $item['quantity']; ?></td>
                            <td class="text-end">$245.50</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="4" class="text-end">Sub Total</th>
                            <td class="text-end">$736.50</td>
                        </tr>
                        <tr>
                            <th colspan="4" class="text-end">Discount</th>
                            <td class="text-end">-$25.50</td>
                        </tr>
                        <tr>
                            <th colspan="4" class="text-end">Shipping Charge</th>
                            <td class="text-end">$20.00</td>
                        </tr>
                        <tr>
                            <th colspan="4" class="text-end">Tax</th>
                            <td class="text-end">$12.00</td>
                        </tr>
                        <tr>
                            <th colspan="4" class="text-end">Total</th>
                            <td class="text-end">$743.00</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="mt-4 text-end">
                <a href="javascript:window.print()" class="btn btn-success"><i class="fa fa-print"></i> Print</a>
                <button class="btn btn-primary">Send</button>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
    <?php endif; ?>


