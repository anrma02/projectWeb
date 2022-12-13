<!DOCTYPE html>

<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/admin_style.css">
    <script src="../resources/ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

</head>

<body>
    <?php
    session_start();
    include '../connect_db.php';
    include '../function.php';
    if (!empty($_SESSION['current_user'])) { //Kiểm tra xem đã đăng nhập chưa?
    ?>
        <div id="admin-heading-panel">

            <div class="container">

                <div class="left-panel">
                    Xin chào <span>Admin</span>
                </div>
                <div class="right-panel">
                    <img height="24" src="../image//icon//iconhome.png" />
                    <a href="../home.php">Trang chủ</a>
                    <img height="26" src="../image/icon//logout.png" />

                    <a href="logout.php">Đăng xuất</a>
                </div>
            </div>
        </div>
        </div>
        <div id="content-wrapper">
            <div class="container">
                <div class="left-menu">
                    <div class="menu-heading">Admin Menu</div>
                    <div class="menu-items">
                        <ul>
                            <li><a href="#">Cấu hình</a></li>
                            <li><a href="menu_listing.php">Danh mục</a></li>
                            <li><a href="#">Tin tức</a></li>
                            <li><a href="product_listing.php">Sản phẩm</a></li>
                            <li><a href="./order_listing.php">Đơn hàng</a></li>
                        </ul>
                    </div>
                </div>
            <?php } ?>