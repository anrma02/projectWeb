 <?php
    include 'header.php';
    $config_name = "product";
    $config_price = "price";
    $config_title = "sản phẩm";

    if (!empty($_SESSION['current_user'])) {
        if (!empty($_GET['action']) && $_GET['action'] == 'search' && !empty($_POST)) {
            $_SESSION[$config_name . '_filter'] = $_POST;
            header('Location: ' . $config_name . '_listing.php');
            exit;
        }
        if (!empty($_SESSION[$config_name . 'filter'])) {
            $where = "";
            foreach ($_SESSION[$config_name . 'filter'] as $field => $value) {
                if (!empty($value)) {
                    switch ($field) {
                        case 'name':
                            $where .= (!empty($where)) ? " AND " . "`" . $field . "` LIKE '%" . $value . "%'" : "`" . $field . "` LIKE '%" . $value . "%'";
                            break;
                        default:
                            $where .= (!empty($where)) ? " AND " . "`" . $field . "` = " . $value . "" : "`" . $field . "` = " . $value . "";
                            break;
                    }
                }
            }
            extract($_SESSION[$config_name . 'filter']);
        }
        $item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 10;
        $current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
        $offset = ($current_page - 1) * $item_per_page;
        if (!empty($where)) {
            $totalRecords = mysqli_query($con, "SELECT * FROM `product` where (" . $where . ")");
        } else {
            $totalRecords = mysqli_query($con, "SELECT * FROM `product`");
        }
        $totalRecords = $totalRecords->num_rows;
        $totalPages = ceil($totalRecords / $item_per_page);
        if (!empty($where)) {
            $products = mysqli_query($con, "SELECT * FROM `product` where (" . $where . ") ORDER BY `id` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
        } else {
            $products = mysqli_query($con, "SELECT * FROM `product` ORDER BY `id` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
        }
        mysqli_close($con);
    ?>

     <div class="main-content">
         <h1>Danh sách <?= $config_title ?></h1>
         <div class="listing-items">
             <div class="buttons">
                 <a href="./<?= $config_name ?>_editing.php">Thêm <?= $config_title ?></a>
             </div>
             <div class="listing-search">
                 <form id="<?= $config_name ?>-search-form" action="<?= $config_name ?>_listing.php?action=search" method="POST">
                     <fieldset>
                         <legend>Tìm kiếm <?= $config_title ?>:</legend>
                         ID: <input class="search" type="text" name="id" value="<?= !empty($id) ? $id : "" ?>" placeholder="Nhập ID" />&emsp; &emsp;
                         Tên <?= $config_title ?>: <input class="search" type="text" name="name" placeholder="Nhập tên sản phẩm" value="<?= !empty($name) ? $name : "" ?>" />
                         <button class="iconsearch "> <i class="fa-solid fa-magnifying-glass"></i></button>
                         <!-- <input type="submit" class="iconsearch" value="Tìm" />  -->
                     </fieldset>
                 </form>
             </div>
             <div class="total-items">

             </div>
             <ul>
                 <li class="listing-item-heading">
                     <div class="listing-prop listing-img">Ảnh</div>
                     <div class="listing-prop listing-name">Tên <?= $config_title ?></div>
                     <div class="listing-prop listing-price">Tên <?= $config_price ?></div>
                     <div class="listing-prop listing-button">
                         Xóa
                     </div>
                     <div class="listing-prop listing-button">
                         Sửa
                     </div>

                     <div class="listing-prop listing-time">Ngày tạo</div>
                     <div class="listing-prop listing-time">Ngày cập nhật</div>
                     <div class="clear-both"></div>
                 </li>
                 <?php
                    while ($row = mysqli_fetch_array($products)) {
                    ?>
                     <li>
                         <div class="listing-prop listing-img"><img src="../<?= $row['image'] ?>" alt="<?= $row['name'] ?>" title="<?= $row['name'] ?>" /></div>
                         <div class="listing-prop listing-name"><?= $row['name'] ?></div>
                         <div class="listing-prop listing-price"><?= number_format($row['price'], 0, ",", ".") ?></div>
                         <div class="listing-prop listing-button">
                             <a onclick="return del(<?php echo $rows['name'] ?>)" href="./<?= $config_name ?>_delete.php?id=<?= $row['id'] ?>">Xóa</a>
                         </div>
                         <div class="listing-prop listing-button">
                             <a href="./<?= $config_name ?>_editing.php?id=<?= $row['id'] ?>">Sửa</a>
                         </div>
                         <div class="listing-prop listing-time"><?= date('d/m/Y H:i:s', $row['last_updated']) ?></div>
                         <div class="listing-prop listing-time"><?= date('d/m/Y H:i:s', $row['created_time']) ?></div>

                         <div class="clear-both"></div>
                     </li>
                 <?php } ?>
             </ul>
             <?php
                include './page.php';
                ?>
             <div class="clear-both"></div>
         </div>
     </div>


     <script>
         function del(name) {
             return confirm('Bạn có chắc chắn xóa sản phẩm này không: ' + name + " ?")
         }
     </script>

 <?php
    }
