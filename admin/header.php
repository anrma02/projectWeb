<!DOCTYPE html>

<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/admin_style.css">
    <script src="../resources/ckeditor/ckeditor.js"></script>
    <!-- <link rel="stylesheet" href="../css//home.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="../css/avatar-hover.css">
    <style>
        .menu {
            position: absolute;
            width: 40px;
            position: relative;
        }

        .ho {
            font-size: large;
            transform: translate(1033px, -110px);
        }

        .image2 {
            height: 100px;
        }

        .menu img {

            transform: translate(40px, 0px);
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        li {
            list-style: none;
        }

        .menu-child {
            padding: 5px;
            text-align: center;
            position: absolute;
            background: black;
            top: 65%;
            width: 100px;
            height: 80px;
            border-radius: 5px;
            transform: translate(10px, -17px);
            opacity: 1;
            visibility: hidden;
            transition: 0, 2s linear;
            z-index: 1;
        }

        .menu:hover .menu-child {
            opacity: 1;
            visibility: visible;
        }

        a {
            text-decoration: none;
        }

        .heade ul li img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        .menu-child ul {
            padding: 0;
            margin: 0;
        }

        .menu-child ul li {
            height: 30px;
            padding: 0;
            margin: 0;
        }

        .menu-child::after {
            content: '';
            display: block;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: black;
            width: 10px;
            height: 10px;
            position: absolute;

        }

        .menu {
            position: relative;

        }
    </style>
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
                    <img class="image2" src="../image//lg2.jpg" alt="">
                    <div class="ho">

                        <a href="../home.php">Trang chủ</a>
                    </div>
                </div>
                <div class="right-panel">

                    <div class="menu">

                        <div class="avatar-user">
                            <img class="avt-img" src="../image//avt.jpg">
                        </div>

                        <div class="menu-child">

                            <ul>
                                <li> <a href="./logout.php">Đăng xuất</a> </li>
                                <li><a href="./edit.php">Đổi mật khẩu</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="menu-items">
                    <ul class="ul">
                        <li><a href="#">Cấu hình</a></li>
                        <li><a href="menu_listing.php">Danh mục</a></li>
                        <li><a href="#">Tin tức</a></li>
                        <li><a href="product_listing.php">Sản phẩm</a></li>
                        <li><a href="./order_listing.php">Đơn hàng</a></li>
                    </ul>
                </div>
            </div>
        </div>


    <?php } ?>