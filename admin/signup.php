<link rel="stylesheet" href="../css//signup.css">

<?php
session_start();
include "./connect_db.php";
if (
     isset($_POST['username']) && isset($_POST['password'])
     && isset($_POST['fullname']) && isset($_POST['password_confirmation'])
) {
     function validate($data)
     {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
     }
     $username = validate($_POST['username']);
     $password = validate($_POST['password']);
     $re_pass = validate($_POST['password_confirmation']);
     $fullname = validate($_POST['fullname']);
     $user_data = 'username=' . $username . '&fullname=' . $name;
     if (empty($username)) {
          header("Location: signup.php?error=User Name is required&$user_data");
          exit();
     } else if (empty($password)) {
          header("Location: signup.php?error=Password is required&$user_data");
          exit();
     } else if (empty($re_pass)) {
          header("Location: signup.php?error=Re Password is required&$user_data");
          exit();
     } else if (empty($name)) {
          header("Location: signup.php?error=Name is required&$user_data");
          exit();
     } else if ($pass !== $re_pass) {
          header("Location: signup.php?error=The confirmation password  does not match&$user_data");
          exit();
     } else {
          $pass = md5($pass);
          $sql = "SELECT * FROM `user` WHERE `username`='$username' ";
          $result = mysqli_query($con, $sql);
          if (mysqli_num_rows($result) > 0) {
               header("Location: signup.php?error=The username is taken try another&$user_data");
               exit();
          } else {
               $sql2 = "INSERT INTO user(username, password, name) VALUES('$username', '$password', '$fullname')";
               $result2 = mysqli_query($con, $sql2);
               if ($result2) {
                    header("Location: signup.php?success=Your account has been created successfully");
                    exit();
               } else {
                    header("Location:signup.php?error=unknown error occurred&$user_data");
                    exit();
               }
          }
     }
} else {
     header("Location: signup.php");
     exit();
} ?>


<div class="main">

     <form action="" method="POST" class="form" id="form-1">
          <?php if (isset($_GET['error'])) { ?>
               <p class="error"><?php echo $_GET['error']; ?></p>
          <?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

          <h3 class="heading">Đăng kí </h3>

          <div class="spacer"></div>
          <div class="form-group">
               <label for="fullname" class="form-label">Tên đầy đủ</label>
               <?php if (isset($_GET['username'])) { ?>
                    <input id="fullname" name="username" type="text" placeholder="Tên đăng nhập" class="form-control" value="<?php echo $_GET['username']; ?>"><?php } else { ?>
                    <input id="fullname" name="username" type="text" placeholder="Tên đăng nhập" class="form-control"> <?php } ?>
               <span class="form-message"></span>
          </div>

          <div class="form-group">
               <label for="text " class="form-label">Tên</label>

               <?php if (isset($_GET['fullname'])) { ?>
                    <input id="text " name="fullname" type="text" placeholder="tên" class="form-control" value="<?php echo $_GET['fullname']; ?>"><?php } else { ?>
                    <input id="text " name="fullname" type="text" placeholder="tên" class="form-control"><?php } ?>
               <span class="form-message"></span>
          </div>

          <div class="form-group">
               <label for="password" class="form-label">Mật khẩu</label>
               <input id="password" name="password" type="password" placeholder="Nhập mật khẩu" class="form-control">
               <span class="form-message"></span>
          </div>

          <div class="form-group">
               <label for="password_confirmation" class="form-label">Nhập lại mật khẩu</label>
               <input id="password_confirmation" name="password_confirmation" placeholder="Nhập lại mật khẩu" type="password" class="form-control">
               <span class="form-message"></span>
          </div>

          <button class="form-submit">Đăng ký</button>
          <div class="form-submit"><a href="./index.php">Đã có tài khoản</a></div>
     </form>

</div>

<script src="../js//signup.js"></script>
<script src="../js//main.js"></script>