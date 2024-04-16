<?php
include_once ("..\connection.php");
$mysqli = new mysqli('localhost', 'root', '', 'admin');

if (isset($_POST['submit'])) {
  $user_name = $_POST['kh_tendangnhap'];
  $password = $_POST['kh_matkhau'];
  $name = $_POST['kh_ten'];
  $address = $_POST['kh_diachi'];
  $phone = $_POST['kh_dienthoai'];
  $email = $_POST['kh_email'];

  $insert = "INSERT INTO taikhoan (username, password, name, address, phone, email, status)
        VALUES ('$user_name', '$password', '$name','$address' ,'$phone', '$email', '$cmnd', true) ";

  $query = mysqli_query($mysqli, $insert);

  if ($query) {
    header('Location: login.php');
  } else {
    echo "Lỗi!";
  }

}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="shortcut icon" href="./Ảnh logo/372986215_692178822950132_2957802616111635882_n (1).jpg">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="Sign-upcss.php">
  <title>Roid Supplement - Cung cấp dược phẩm kích thích tăng cơ kém chất lượng</title>
</head>

<body>

  <form action="./Sign-in.php" style="border:1px solid #ccc">
    <div class="container">
      <h1>Đăng ký</h1>
      <hr>

      <div>
        <label for="name"><b>Tên tài khoản</b></label>
        <input type="text" placeholder="Tên tài khoản" name="kh_tendangnhap" required>
      </div>


      <div>
        <label for="name"><b>Mật khẩu</b></label>
        <input type="text" placeholder="Mật khẩu" name="kh_matkhau" required>
      </div>


      <div>
        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Email" name="kh_email" required>
      </div>

      <div>
        <label for="email"><b>Tên</b></label>
        <input type="text" placeholder="Tên" name="kh_ten" required>
      </div>

      <div>
        <label for="number"><b>Số điện thoại</b></label>
        <input type="text" placeholder="Số điện thoại" name="kh_dienthoai" required>
      </div>

      <div>
        <label for="text"><b>Địa chỉ</b></label>
        <input type="text" placeholder="Địa chỉ" name="text" required>
      </div>

      <div>
        <label for="psw"><b>Mật khẩu</b></label>
        <input type="password" placeholder="Mật khẩu" name="psw" required>
      </div>

      <div>
        <label for="psw-repeat"><b>Nhập lại mật khẩu</b></label>
        <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
      </div>

      <label>
        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Nhớ mật khẩu
      </label>
      <br>

      <div class="clearfix">
        <button type="button" class="cancelbtn">Hủy</button>
        <button type="submit" class="signupbtn">
          <a href="./Sign-in.php">Đăng ký</a>
        </button>
      </div>
    </div>
  </form>

</body>

</html>