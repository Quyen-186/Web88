<?php
session_start();
include_once ("../connection.php");

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  // Prepare the SQL statement
  $stmt = $mysqli->prepare("SELECT name FROM taikhoan WHERE username = ?");
  $stmt->bind_param("s", $username);

  // Execute the statement
  $stmt->execute();

  // Store the result
  $stmt->store_result();

  // Check if a row was returned
  if ($stmt->num_rows > 0) {
    // Bind the result to a variable
    $stmt->bind_result($name);

    // Fetch the result
    $stmt->fetch();

    // Store the name in the session
    $_SESSION['name'] = $name;
  }

  $_SESSION['username'] = $username;




  $sql_taikhoan = "SELECT * FROM taikhoan WHERE username = '$username' and password = '$password'";
  $result_getTaikhoan = mysqli_query($mysqli, $sql_taikhoan);
  $count = mysqli_num_rows($result_getTaikhoan);

  if ($count == 1) {
    $row = mysqli_fetch_assoc($result_getTaikhoan);
    if ($row['isadmin'] == 1) {
      header("location: ../Admin/admin.php");
      exit();
    } elseif ($row['status'] == 0) {
      echo "Tài khoản bị khóa";
    } else {
      header("location: user.php");
      exit();
    }
  } else {
    echo 'Vui lòng kiểm tra lại tài khoản hoặc mật khẩu';
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
  <form action="Sign-in.php" method="post" style="border:1px solid #ccc">
    <div class="container">
      <h1>Đăng nhập</h1>
      <hr>

      <label for="username"><b>Tên đăng nhập</b></label>
      <input type="text" placeholder="Tên đăng nhập" name="username" required>

      <label for="password"><b>Mật khẩu</b></label>
      <input type="password" placeholder="Mật khẩu" name="password" required>

      <p>Bạn mới biết đến Roid Supplement? <a href="Sign-up.php" style="color:dodgerblue">Đăng ký</a>.</p>

      <div class="clearfix">
        <a href="index.php">
          <button type="button" class="cancelbtn">Hủy</button>
        </a>

        <button type="submit" name="submit" class="signupbtn">Đăng nhập</button>

      </div>
    </div>
  </form>
</body>

</html>