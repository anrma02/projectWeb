<?php
include 'header.php';
$config_name = "product";
$config_title = "đơn hàng";
if (!empty($_SESSION['current_user'])) {
    if (!empty($_GET['action']) && $_GET['action'] == 'search' && !empty($_POST)) {
        $_SESSION[$config_name . '_filter'] = $_POST;
        header('Location: ' . $config_name . '_listing.php');
        exit;
    }

    $item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 10;
    $current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
    $offset = ($current_page - 1) * $item_per_page;
    if (!empty($where)) {
        $totalRecords = mysqli_query($con, "SELECT * FROM `orders` where (" . $where . ")");
    } else {
        $totalRecords = mysqli_query($con, "SELECT * FROM `orders`");
    }
    $totalRecords = $totalRecords->num_rows;
    $totalPages = ceil($totalRecords / $item_per_page);
    if (!empty($where)) {
        $orders = mysqli_query($con, "SELECT * FROM `orders` where (" . $where . ") ORDER BY `id` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
    } else {
        $orders = mysqli_query($con, "SELECT * FROM `orders` ORDER BY `id` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
    }
    mysqli_close($con);
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css//order_list.css">
        <title>Đơn hàng</title>
    </head>

    <body>
        <div class="main-content">
            <h1>Danh sách <?= $config_title ?></h1>
            <div class="listing-items">


                <div class="total-items">
                    <?php /*
                  <span>Có tất cả <strong><?=$totalRecords?></strong> <?=$config_title?> trên <strong><?=$totalPages?></strong> trang</span> */ ?>
                </div>
                <ul>
                    <li class="listing-item-heading">

                        <table>
                            <thead>
                                <tr>
                                    <th class="id prop  ">ID</th>
                                    <th class="prop  name  ">Tên người nhận</th>
                                    <th class="prop  adress">Địa chỉ</th>
                                    <th class="prop phone ">Số điện thoại</th>
                                    <th class="prop  date">Ngày tạo</th>
                                    <th class="prop print ">In</th>
                                </tr>
                            </thead>
                        </table>
                        <style>

                        </style>
                    </li>
                    <?php while ($row = mysqli_fetch_array($orders)) { ?>
                        <table>
                            <tbody>
                                <tr>
                                    <th class=" lisProp  id1"><?= $row['id'] ?></th>
                                    <th class="lisProp   name1"><?= $row['name'] ?></th>
                                    <th class="lisProp   address1"><?= $row['address'] ?></th>
                                    <th class=" lisProp  phone1"><?= $row['phone'] ?></th>
                                    <th class="lisProp   date1"><?= date('d/m/Y H:i', $row['created_time']) ?></th>
                                    <th class=" lisProp  print1"> <a href="order_printing.php?id=<?= $row['id'] ?>" target="_blank">In</a> </th>
                                </tr>
                            </tbody>
                        </table>
                        <li>
                            <!-- <div class="listing-prop listing-id"><?= $row['id'] ?></div> -->
                            <!-- <div class="listing-prop listing-name"><?= $row['name'] ?></div>
                        <div class="listing-prop listing-address"><?= $row['address'] ?></div>
                        <div class="listing-prop listing-phone"><?= $row['phone'] ?></div>
                        <div class="listing-prop listing-button">
                            <a href="order_printing.php?id=<?= $row['id'] ?>" target="_blank">In</a>
                        </div>
                        <div class="listing-prop listing-time"><?= date('d/m/Y H:i', $row['created_time']) ?></div>
                        <div class="clear-both"></div> -->
                        </li>
                    <?php  } ?>
                </ul>
                <?php
                include './page.php';
                ?>
                <div class="clear-both"></div>
            </div>
        </div>
    </body>

    </html>
<?php
}
