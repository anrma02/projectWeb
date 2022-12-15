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
         <?php include './head.php' ?>

         <div class="nav">
             <div class="image-slider">
                 <div class="image-item">
                     <div class="image">
                         <img src="https://bizweb.dktcdn.net/100/108/842/products/18101914.jpg?v=1663062225000" alt="">
                         <div class="depen">
                             <div class="names"> Giày Đá Bóng Nike</div>
                             <span class="desp"> Giày đá bóng NIKE MERCURIAL SUPERFLY 7 ELITE </span>
                             <div class="flex">
                                 <li class="c1"> <small>đ</small> 600.000</li>
                                 <li class="c2"> Đã bán: 1,1k đơn </li>
                             </div>
                         </div>

                     </div>

                 </div>
                 <div class="image-item">
                     <div class="image">
                         <img src="https://www.sport9.vn/images/uploaded/Adidas/x19.3%20blue/98319588_663806391128778_9052270783279136768_o.jpg" alt="" />
                         <div class="depen">
                             <div class="names"> Giày Đá Bóng Adidas</div>
                             <span class="desp"> Giày Bóng Đá TQ Adidas X Speed Portal.1 Xanh Lá Vạch Đen TF </span>
                             <div class="flex">
                                 <li class="c1"> <small>đ</small> 450.000</li>
                                 <li class="c2"> Đã bán: 450 đơn </li>
                             </div>
                         </div>
                     </div>

                 </div>
                 <div class="image-item">
                     <div class="image">
                         <img src="https://cf.shopee.vn/file/6abc55f9c19a813d45934b1261633b1f" alt="" />
                         <div class="depen">
                             <div class="names"> Giày Đá Bóng Adidas</div>
                             <span class="desp">Giày đá bóng Nam sân cỏ nhân tạo cổ cao Adidas Predator</span>
                             <div class="flex">
                                 <li class="c1"> <small>đ</small> 900.000</li>
                                 <li class="c2"> Đã bán: 800 đơn </li>
                             </div>
                         </div>
                     </div>

                 </div>
                 <div class="image-item">
                     <div class="image">
                         <img src="https://cdn-img.thethao247.vn/upload/thanhtung/2020/07/25/bitis-co-them-giay-da-bong-cao-co1595649188.png" alt="" />
                         <div class="depen">
                             <div class="names"> Giày Đá Bóng Biti's</div>
                             <span class="desp"> Giày Bóng Đá Nam Biti's Hunter Football DSMH09600DOO (Đỏ)</span>
                             <div class="flex">
                                 <li class="c1"> <small>đ</small> 716.000</li>
                                 <li class="c2"> Đã bán: 550 đơn </li>
                             </div>
                         </div>
                     </div>

                 </div>
                 <div class="image-item">
                     <div class="image">
                         <img src="https://zocker.vn/photo/san-pham/giay-da-bong-zocker-space-trang-4.jpg" alt="" />
                         <div class="depen">
                             <div class="names"> Giày Đá Bóng Zocker</div>
                             <span class="desp">Giày bóng đá sân cỏ nhân tạo Zocker, Giày đá banh chính hãng khâu đế </span>
                             <div class="flex">
                                 <li class="c1"> <small>đ</small> 320.000</li>
                                 <li class="c2"> Đã bán: 50 đơn </li>
                             </div>
                         </div>
                     </div>

                 </div>
             </div>

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
             </div>
             <ul class="listPage">

             </ul>
         </div>


     </div>


     <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
     <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
     <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

     <script src="./js//slide.js"></script>
     <script src="./js//listPage.js"></script>
 </body>

 </html>