<link rel="stylesheet" href="../css//signup.css">

<div class="main">

     <form action="" method="POST" class="form" id="form-1">
          <h3 class="heading">Đăng kí </h3>


          <div class="spacer"></div>

          <div class="form-group">
               <label for="fullname" class="form-label">Tên đầy đủ</label>
               <input id="fullname" name="fullname" type="text" placeholder="VD: Sơn Đặng" class="form-control">
               <span class="form-message"></span>
          </div>

          <div class="form-group">
               <label for="email" class="form-label">Email</label>
               <input id="email" name="email" type="text" placeholder="VD: email@domain.com" class="form-control">
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
     </form>

</div>

<script src="../js//signup.js"></script>
<script src="../js//main.js"></script>