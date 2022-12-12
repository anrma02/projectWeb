<?php session_start(); ?>
<!DOCTYPE html>

<html>

<head>
    <title> Chức năng giỏ hàng PHP </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <?php
    include './connect_db.php';
    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = array();
    }
    if (isset($_GET['action'])) {

        function update_cart($add = false)
        {
            foreach ($_POST['quantity'] as $id => $quantity) {
                if ($quantity == 0) {
                    unset($_SESSION["cart"][$id]);
                } else {
                    if ($add) {
                        $_SESSION["cart"][$id] += $quantity;
                    } else {
                        $_SESSION["cart"][$id] = $quantity;
                    }
                }
            }
        }
        switch ($_GET['action']) {
            case "add":
                update_cart(true);
                header('Location: ./cart.php');
                break;
            case "delete":
                if (isset($_GET['id'])) {
                    unset($_SESSION["cart"][$_GET['id']]);
                }
                header('Location: ./cart.php');
                break;
            case "submit":
                if (isset($_POST['update_click'])) { //Cập nhật số lượng sản phẩm
                    update_cart();
                    header('Location: ./cart.php');
                } elseif ($_POST['order_click']) { //Đặt hàng sản phẩm
                    echo "Đặt hàng";
                    exit;
                }
                break;
        }
    }
    if (!empty($_SESSION["cart"])) {
        $products = mysqli_query($con, "SELECT * FROM `product` WHERE `id` IN (" . implode(",", array_keys($_SESSION["cart"])) . ")");
    }
    //        $result = mysqli_query($con, "SELECT * FROM `product` WHERE `id` = ".$_GET['id']);
    //        $product = mysqli_fetch_assoc($result);
    //        $imgLibrary = mysqli_query($con, "SELECT * FROM `image_library` WHERE `product_id` = ".$_GET['id']);
    //        $product['images'] = mysqli_fetch_all($imgLibrary, MYSQLI_ASSOC);
    ?>
    <div class="container">
        <a href="home.php">Trang chủ</a>
        <h1>Giỏ hàng</h1>
        <form id="cart-form" action="cart.php?action=submit" method="POST">
            <table>
                <tr>
                    <th class="product-number">STT</th>
                    <th class="product-name">Tên sản phẩm</th>
                    <th class="product-img">Ảnh sản phẩm</th>
                    <th class="product-price">Đơn giá</th>
                    <th class="product-quantity">Số lượng</th>
                    <th class="total-money">Thành tiền</th>
                    <th class="product-delete">Xóa</th>
                </tr>
                <?php
                $num = 1;
                while ($row = mysqli_fetch_array($products)) {
                ?>
                    <tr>
                        <td class="product-number"><?= $num++; ?></td>
                        <td class="product-name"><?= $row['name'] ?></td>
                        <td class="product-img"><img src="<?= $row['image'] ?>" /></td>
                        <td class="product-price"><?= number_format($row['price'], 0, ",", ".") ?></td>
                        <td class="product-quantity"><input type="text" value="<?= $_SESSION["cart"][$row['id']] ?>" name="quantity[<?= $row['id'] ?>]" /></td>
                        <td class="total-money"><?= number_format($row['price'], 0, ",", ".") ?></td>
                        <td class="product-delete"><a href="cart.php?action=delete&id=<?= $row['id'] ?>">Xóa</a></td>
                    </tr>
                <?php
                    $num++;
                }
                ?>
                <tr id="row-total">
                    <td class="product-number">&nbsp;</td>
                    <td class="product-name">Tổng tiền</td>
                    <td class="product-img">&nbsp;</td>
                    <td class="product-price">&nbsp;</td>
                    <td class="product-quantity">&nbsp;</td>
                    <td class="total-money">2.500.000</td>
                    <td class="product-delete">Xóa</td>
                </tr>
            </table>
            <div id="form-button">
                <input type="submit" name="update_click" value="Cập nhật" />
            </div>
            <hr>
            <div><label>Người nhận: </label><input type="text" value="" name="name" required /></div>
            <div><label>Điện thoại: </label><input type="text" value="" name="phone" required /></div>
            <div><label>Địa chỉ: </label><input type="text" value="" name="address" required /></div>
            <div><label>Ghi chú: </label><textarea name="note" cols="50" rows="7"></textarea></div>
            <input type="submit" name="order_click" value="Đặt hàng" />
        </form>
    </div>
</body>

</html>