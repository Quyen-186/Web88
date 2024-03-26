<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="./Ảnh logo/372986215_692178822950132_2957802616111635882_n (1).jpg">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Sign-up.css">
    <title>Wheystore - Đăng nhập</title>
</head>
<body>
    <form action="./user.php" style="border:1px solid #ccc">
      <div class="container">
        <h1>Đăng nhập</h1>
        <hr>
    
        <label for="email"><b>Email/ Số điện thoại/ Tên đăng nhập</b></label>
        <input type="text" type="number" placeholder="Email/ Số điện thoại/ Tên đăng nhập" name="email" name="number" name="name" required>
    
        <label for="psw"><b>Mật khẩu</b></label>
        <input type="password" placeholder="Mật khẩu" name="psw" required>
    
        <label>
          <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
        </label>
        
        <p>Bạn mới biết đến WheyStore ? <a href="./Sign-up.php" style="color:dodgerblue">Đăng ký</a>.</p>
    
        <div class="clearfix">
          <button type="button" class="cancelbtn">Hủy</button>
          <a href="./user.php">
            <button type="submit" class="signupbtn">
              Đăng nhập
            </button>
          </a>
        </div>
      </div>
    </form>
</body>
</html>