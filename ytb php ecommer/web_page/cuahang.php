<main class="mt-2 container" id="index_home_page">
<div class="container mt-5">
    <div class="row">
        <!-- Vertical Tabs -->
        <div class="col-md-2">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <button class="nav-link active" id="v-pills-english-tab" data-bs-toggle="pill" data-bs-target="#v-pills-english" type="button" role="tab" aria-controls="v-pills-english" aria-selected="true">Tiếng Anh</button>
                <button class="nav-link" id="v-pills-chinese-tab" data-bs-toggle="pill" data-bs-target="#v-pills-chinese" type="button" role="tab" aria-controls="v-pills-chinese" aria-selected="false">Tiếng Trung</button>
                <button class="nav-link" id="v-pills-korean-tab" data-bs-toggle="pill" data-bs-target="#v-pills-korean" type="button" role="tab" aria-controls="v-pills-korean" aria-selected="false">Tiếng Hàn</button>
                <button class="nav-link" id="v-pills-stationery-tab" data-bs-toggle="pill" data-bs-target="#v-pills-stationery" type="button" role="tab" aria-controls="v-pills-stationery" aria-selected="false">Đồ dùng học tập</button>
            </div>
        </div>

        <!-- Tab Content -->
        <div class="col-md-9">
            <div class="tab-content" id="v-pills-tabContent">
                <!-- Giáo Trình Tiếng Anh -->
                <div class="tab-pane fade show active" id="v-pills-english" role="tabpanel" aria-labelledby="v-pills-english-tab">
                    <h2>Giáo Trình Tiếng Anh</h2>
                    <div class="row">
                        <!-- English Book Cards -->
                        <?php foreach ($productsE as $product): ?>
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    <img src="english_book1.jpg" class="card-img-top" alt="English Book 1">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $product['product_name']; ?></h5>
                                        <p class="card-text"><?php echo number_format($product['product_price'], 2); ?></p>

                                        <!-- Form for Add to Cart -->
                                        <form action="index.php?cuahang" method="post">
                                            <input type="hidden" name="action" value="addToCart">
                                            <input type="hidden" name="productId" value="<?php echo $product['product_id']; ?>">
                                            <input type="hidden" name="quantity" value="1">
                                            <button type="submit" class="btn btn-success">Add to Cart</button>
                                        </form>

                                        <!-- Form for Add to Detail -->
                                        <form action="index.php?cuahang" method="post">
                                            <input type="hidden" name="action" value="addToDetail">
                                            <input type="hidden" name="productId" value="<?php echo $product['product_id']; ?>">
                                            <input type="hidden" name="quantity" value="1">
                                            <button type="submit" class="btn btn-success">Add to Detail</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                        <!-- Add more book cards as needed -->
                    </div>
                </div>

                <!-- Giáo Trình Tiếng Trung -->
                <div class="tab-pane fade" id="v-pills-chinese" role="tabpanel" aria-labelledby="v-pills-chinese-tab">
                    <h2>Giáo Trình Tiếng Trung</h2>
                    <div class="row">
                        <!-- Chinese Book Cards -->
                        <?php foreach ($productsC as $product): ?>
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    <img src="english_book1.jpg" class="card-img-top" alt="English Book 1">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $product['product_name']; ?></h5>
                                        <p class="card-text"><?php echo number_format($product['product_price'], 2); ?></p>
                                        <form action="index.php?cuahang" method="post">
                                            <input type="hidden" name="productId" value="<?php echo $product['product_id']; ?>">
                                            <input type="hidden" name="quantity" value="1">
                                            <button type="submit" class="btn btn-success">Add to Cart</button>
                                        </form>
                                        <button>Detail</button>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <!-- Add more book cards as needed -->
                    </div>
                </div>

                <!-- Giáo Trình Tiếng Hàn -->
                <div class="tab-pane fade" id="v-pills-korean" role="tabpanel" aria-labelledby="v-pills-korean-tab">
                    <h2>Giáo Trình Tiếng Hàn</h2>
                    <div class="row">
                        <!-- Korean Book Cards -->
                        <?php foreach ($productsK as $product): ?>
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    <img src="english_book1.jpg" class="card-img-top" alt="English Book 1">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $product['product_name']; ?></h5>
                                        <p class="card-text"><?php echo number_format($product['product_price'], 2); ?></p>
                                        <form action="index.php?cuahang" method="post">
                                            <input type="hidden" name="productId" value="<?php echo $product['product_id']; ?>">
                                            <input type="hidden" name="quantity" value="1">
                                            <button type="submit" class="btn btn-success">Add to Cart</button>
                                        </form>
                                        <button>Detail</button>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <!-- Add more book cards as needed -->
                    </div>
                </div>

                <!-- Đồ dùng học tập -->
                <div class="tab-pane fade" id="v-pills-stationery" role="tabpanel" aria-labelledby="v-pills-stationery-tab">
                    <h2>Đồ dùng học tập</h2>
                    <div class="row">
                        <!-- Stationery Product Cards -->
                        <?php foreach ($productsI as $product): ?>
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    <img src="english_book1.jpg" class="card-img-top" alt="English Book 1">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $product['product_name']; ?></h5>
                                        <p class="card-text"><?php echo number_format($product['product_price'], 2); ?></p>
                                        <form action="index.php?cuahang" method="post">
                                            <input type="hidden" name="productId" value="<?php echo $product['product_id']; ?>">
                                            <input type="hidden" name="quantity" value="1">
                                            <button type="submit" class="btn btn-success">Add to Cart</button>
                                        </form>
                                        <button>Detail</button>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</main>