<!DOCTYPE html>
<html>
  <head>
    <link href="../style/style.css" rel="stylesheet" type="text/css">
  </head>
  <body>
  <?php
    session_start();
    if (!empty($_SESSION["member"])) { ?>
      <a href="/" class="btn">首頁</a>
      <a href="../user?id=<?php echo $_SESSION['member']['user_id']?>" class="btn">會員中心</a>
      <a href="./action/logout.php" class="btn">登出</a>
      <hr />
    <?php } else { ?>
      <a href="/" class="btn">首頁</a>
      <hr />
    <?php } ?>
  <?php
    if (!$_GET) {
      include "../error/404.php";
    } else {
      include "../action/connect.php";
    
      $sql = "SELECT user.user_firstName, user.user_lastName, blog.blog_title, blog.blog_content, blog_modifyDate
        FROM user
        INNER JOIN blog
        ON user.user_id = blog.blog_fk
        WHERE blog.blog_id = '".$_GET["id"]."'";
      $stmt = $connect -> prepare($sql);
      $stmt -> execute();
      $result = $stmt -> fetch(PDO::FETCH_ASSOC);
    
      unset($connect);
    }
  ?>
  <h1><?php echo $result["blog_title"]?></h1>
  <p><?php echo $result["blog_content"]?></p>
  <p>作者：<?php echo $result["user_firstName"]?> <?php echo $result["user_lastName"]?></p>
  <p>更新時間：<?php echo $result["blog_modifyDate"]?></p>
  <?php if (!empty($_SESSION["member"])) { ?>
    <a href="./edit.php?id=<?php echo $_GET['id']?>" class="btn edit">編輯</a>
  <?php } ?>
  </body>
</html>