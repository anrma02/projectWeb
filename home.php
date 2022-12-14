<!DOCTYPE html>

<html>

<head>
    <title> Danh sách sản phẩm</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet" />
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="./css/reset.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="./css//home.css    ">
</head>

<body style="padding: 0;">
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
        <?php include './head.php' ?>

        <div class="nav">
            <?php include './slide.php' ?>

            <div class="footer">
                <div class="na"><b>Hôm nay mua gì</b> </div>
                <div class="list">
                    <?php
                    while ($row = mysqli_fetch_array($products)) {
                    ?>

                        <div class="item">
                            <div class="img">
                                <a href="detail.php?id=<?= $row['id'] ?>"><img src="<?= $row['image'] ?>" title="<?= $row['name'] ?>" /></a>
                            </div>
                            <div class="thong">
                                <strong><a class="a" href="detail.php?id=<?= $row['id'] ?>"><?= $row['name'] ?></a></strong>

                                <p class="p"><?= $row['content'] ?></p>
                                <div class="lab">
                                    <li class="c1"> <label> <small>đ </small></label><span class="product-price"><?= number_format($row['price'], 0, ",", ".") ?> </span></li>
                                    <li class="c2">Đã bán: 1.1k</li>
                                </div>

                                <button class="buy-button">
                                    <a class="a" href="detail.php?id=<?= $row['id'] ?>"> Mua sản phẩm</a>
                                </button>
                            </div>
                        </div>
                    <?php } ?>

                </div>
                <div class="clear-both"></div>
                <?php
                include './pagination.php';
                ?>
                <div class="clear-both"></div>
            </div>

        </div>


    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>


</body>

</html>