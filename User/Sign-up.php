<?php
include_once ("../connection.php");

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $name = $_POST['name'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];

  // Validate and sanitize input if necessary
  // Check for duplicate username
  $check_duplicate = "SELECT * FROM taikhoan WHERE username = '$username'";
  $result_duplicate = mysqli_query($mysqli, $check_duplicate);
  if (mysqli_num_rows($result_duplicate) > 0) {
      echo "Tên tài khoản đã tồn tại.";
      exit(); // Stop execution if username already exists
  }

  $insert = "INSERT INTO taikhoan (username, password, name, address, phone, email, isadmin, status)
        VALUES ('$username', '$password', '$name','$address' ,'$phone', '$email', false, true) ";

  $query = mysqli_query($mysqli, $insert);

  if ($query) {
    header('Location: Sign-in.php');
    exit(); // Ensure script stops execution after redirection
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

  <form action="Sign-up.php" method="post" style="border:1px solid #ccc">
    <div class="container">
      <h1>Đăng ký</h1>
      <hr>

      <div>
        <label for="username"><b>Tên tài khoản</b></label>
        <input type="text" placeholder="Tên tài khoản" name="username" required>
      </div>


      <div>
        <label for="password"><b>Mật khẩu</b></label>
        <input type="password" placeholder="Mật khẩu" name="password" required>
      </div>


      <div>
        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Email" name="email" required>
      </div>

      <div>
        <label for="name"><b>Tên</b></label>
        <input type="text" placeholder="Tên" name="name" required>
      </div>

      <div>
        <label for="phone"><b>Số điện thoại</b></label>
        <input type="text" placeholder="Số điện thoại" name="phone" required>
      </div>

      <div>
        <label for="address"><b>Địa chỉ</b></label>
        <input type="text" placeholder="Địa chỉ" name="address" required>
      </div>

      <div class="clearfix">
        <a href="index.php">
          <button type="button" class="cancelbtn">Hủy</button>
        </a>
        <button type="submit" name="submit" class="signupbtn">Đăng ký</button>
      </div>
    </div>
  </form>

</body>

</html>