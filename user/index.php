<?php session_start(); ?>
<?php if (!$_GET || $_GET["id"] != $_SESSION["member"]["user_id"]) { 
  include "../error/404.php";
} else { ?>
  <a href="/">首頁</a><br />
  <a href="/action/logout.php">登出</a>
  <hr />
  <h1>會員中心</h1>
  <form action="./action/update.php?id=<?php echo $_GET['id']?>" method="post">
    <label for="user_firstName">*名字:</label><br>
    <input type="text" id="user_firstName" name="user_firstName" value="<?php echo $_SESSION['member']['user_firstName']?>"><br>
    <label for="user_lastName">*姓氏:</label><br>
    <input type="text" id="user_lastName" name="user_lastName" value="<?php echo $_SESSION['member']['user_lastName']?>"><br><br>
    <input type="submit" value="修改">
  </form> 
<?php } ?>

