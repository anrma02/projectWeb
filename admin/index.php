<!DOCTYPE html>

<html>

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/signup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <title>Đăng Nhập</title>
</head>

<body>
    <?php
    session_start();
    include '../connect_db.php';
    $error = false;

    if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) {
        // function validata($data)
        // {
        //     $data = trim($data);
        //     $data = htmlspecialchars($data);
        //     $data = stripslashes($data);
        //     return $data;
        // }

        // $usern = validata($_POST['username']);
        // $password = validata($_POST['password']);

        $result = mysqli_query($con, "Select `id`,`username`,`fullname` from `user` WHERE (`username` ='" . $_POST['username'] . "' AND `password` = ('" . $_POST['password'] . "'))");

        // $sql = 'SELECT*FROM `user` WHERE `username`=$user AND `password`= $password';
        // $result = mysqli_query($con, $sql);

        if (!$result) {
            $error = mysqli_error($con);
        } else {
            $user = mysqli_fetch_assoc($result);
            $_SESSION['current_user'] = $user;
        }
        mysqli_close($con);


        if ($error !== false || $result->num_rows == 0) {
    ?>
            <div id="login-notify" class="box-content">
                <h1>Thông báo</h1>
                <h4><?= !empty($error) ? $error : "Thông tin đăng nhập không chính xác" ?></h4>
                <a href="./index.php">Quay lại</a>
            </div>
        <?php
            exit;
        }
        ?>
    <?php } ?>
    <?php if (empty($_SESSION['current_user'])) { ?>


        <div class="main">
            <form action="./index.php" method="Post" autocomplete="off" class="form" id="form-2">
                <h3 class="heading">Đăng nhập</h3>
                <div class="spacer"></div>
                <div class="form-group">
                    <!-- <label for="text " class="form-label">Username</label> -->
                    <input name="username" type="text" placeholder="Tên Đăng Nhập" class="form-control">
                    <span class="form-message"></span>
                </div>

                <div class="form-group">
                    <!-- <label for="password" class="form-label">Mật khẩu</label> -->
                    <input name="password" type="password" placeholder="Nhập mật khẩu" class="form-control">
                    <span class="form-message"></span>
                </div>

                <button class="form-submit">Đăng nhập</button>
                <button class="form-submit"> <a href="./signup.php"> Tạo Tài khoản</a></button>
            </form>

        </div>

        <script src="../js//main.js"></script>



    <?php
    } else {
        $currentUser = $_SESSION['current_user'];

    ?>
        <style>
            .box-container {
                transform: translate(479px, 41px);
                padding: 10px;
                width: 500px;
                display: grid;
                margin: 1;
                height: 350px;
                border: 1px solid black;
                justify-content: center;
            }

            p {
                font-size: 20px;
                text-align: center;
            }

            .clo {
                background: #4395e0;
                width: 200px;
                height: 40px;
                text-align: center;
                display: flex;
                justify-content: center;
                align-items: center;
                border-radius: 15px;
            }

            .clo:hover {
                background: #1f71bd;
            }
        </style>

        <div class="box-container">
            <p>Xin chào: <?= $currentUser['fullname'] ?> </p>
            <div class="clo"><a href="./product_listing.php">Quản lý sản phẩm</a><br /></div>
            <div class="clo"> <a href="../home.php">Trang chủ</a><br /> </div>
            <div class="clo"> <a href="./edit.php">Đổi mật khẩu</a><br /> </div>
            <div class="clo"> <a href="./logout.php">Đăng xuất</a> </div>
        </div>
    <?php
    }
    ?>
</body>

</html>