<!DOCTYPE html>
<html>
  <head>
    <link href="../style/style.css" rel="stylesheet" type="text/css">
  </head>
  <body>
  <?php session_start(); ?>
  <?php if (!$_GET || $_GET["id"] != $_SESSION["member"]["user_id"]) { 
    include "../error/404.php";
  } else { ?>
    <a href="/" class="btn">首頁</a>
    <a href="../action/logout.php" class="btn">登出</a>
    <hr />
    <h1>會員中心</h1>
    <form action="./action/update.php" method="post">
      <input type="hidden" id="id" name="id" value="<?php echo $_GET['id'] ?>">
      <label for="user_firstName">* 名字:</label><br>
      <input type="text" id="user_firstName" name="user_firstName" value="<?php echo $_SESSION['member']['user_firstName']?>"><br>
      <label for="user_lastName">* 姓氏:</label><br>
      <input type="text" id="user_lastName" name="user_lastName" value="<?php echo $_SESSION['member']['user_lastName']?>"><br><br>
      <button type="submit" class="submit">修改</button>
    </form>
  <?php } ?>
  </body>
</html>