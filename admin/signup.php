<link rel="stylesheet" href="../css//signup.css">



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