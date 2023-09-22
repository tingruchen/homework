<!DOCTYPE html>
<html>
<body>
<?php
  session_start();
  if (!empty($_SESSION["member"])) { ?>
    <a href="./user?id=<?php echo $_SESSION['member']['user_id']?>">會員頁面</a><br />
    <a href="./action/logout.php">登出</a>
    <hr />
    <h1><?php echo "歡迎~". $_SESSION["member"]["user_firstName"]; ?></h1>
  <?php } else { ?>
    <h1>立即登入</h1>
    <form action="./action/login.php" method="post">
      <label for="user_name">*帳號:</label><br>
      <input type="text" id="user_name" name="user_name" placeholder="ex: ooo@104.com.tw"><br>
      <label for="user_password">*密碼:</label><br>
      <input type="password" id="user_password" name="user_password"><br><br>
      <input type="submit" value="登入">
    </form>
  <?php } 
?>

</body>
</html>