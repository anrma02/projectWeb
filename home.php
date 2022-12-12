<!DOCTYPE html>

<html>

<head>
    <title> Danh sách sản phẩm</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css//home.css    ">
</head>

<body>
    <?php
    include './connect_db.php';
    $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 4;
    $current_page = !empty($_GET['page']) ? $_GET['page'] : 1; //Trang hiện tại
    $offset = ($current_page - 1) * $item_per_page;
    $products = mysqli_query($con, "SELECT * FROM `product` ORDER BY `id` ASC  LIMIT " . $item_per_page . " OFFSET " . $offset);
    $totalRecords = mysqli_query($con, "SELECT * FROM `product`");
    $totalRecords = $totalRecords->num_rows;
    $totalPages = ceil($totalRecords / $item_per_page);
    ?>
    <div class="container">
        <div class="footer">

            <div class="list">
                <?php
                while ($row = mysqli_fetch_array($products)) {
                ?>
                    <div class="item">
                        <div class="img">
                            <a href="detail.php?id=<?= $row['id'] ?>"><img src="<?= $row['image'] ?>" title="<?= $row['name'] ?>" /></a>
                        </div>
                        <strong><a href="detail.php?id=<?= $row['id'] ?>"><?= $row['name'] ?></a></strong><br />
                        <label>Giá: </label><span class="product-price"><?= number_format($row['price'], 0, ",", ".") ?> đ</span><br />
                        <p><?= $row['content'] ?></p>
                        <div class="buy-button">
                            <a href="./add_cart.php">Mua sản phẩm</a>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
        <ul class="listPage"></ul>
    </div>

    <script src="./js//listPage.js"></script>
</body>

</html>