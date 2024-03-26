<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="./Ảnh logo/372986215_692178822950132_2957802616111635882_n (1).jpg">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Sign-up.css">
    <title>Wheystore - Đăng ký</title>
</head>
    
<body>

    <form action="./Sign-in.php" style="border:1px solid #ccc">
      <div class="container">
        <h1>Đăng ký</h1>
        <hr>
    
        <label for="name"><b>Tên</b></label>
        <input type="text" placeholder="Họ tên" name="name" required>
    
        <label for="name"><b>Tên tài khoản</b></label>
        <input type="text" placeholder="Tên tài khoản" name="name" required>
    
        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Email" name="email" required>
    
        <label for="number"><b>Số điện thoại</b></label>
        <input type="text" placeholder="Số điện thoại" name="number" required>
    
        <label for="text"><b>Địa chỉ</b></label>
        <input type="text" placeholder="Địa chỉ" name="text" required>
    
        <label for="psw"><b>Mật khẩu</b></label>
        <input type="password" placeholder="Mật khẩu" name="psw" required>
    
        <label for="psw-repeat"><b>Repeat Password</b></label>
        <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
        
        <label>
          <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
        </label>
    
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