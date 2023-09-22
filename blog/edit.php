<!DOCTYPE html>
<html>
  <head>
    <link href="../style/style.css" rel="stylesheet" type="text/css">
  </head>
  <body>
  <?php session_start(); ?>
    <a href="/" class="btn">首頁</a>
    <a href="../user?id=<?php echo $_SESSION['member']['user_id']?>" class="btn">會員中心</a>
    <form action="../action/logout.php" method="post" class="hidden">
      <button type="submit" class="btn">登出</button>
    </form>
    <hr />
  <?php
    if (!$_GET) {
      include "../error/404.php";
    } else {
      include "../action/connect.php";
    
      $sql = "SELECT * FROM blog WHERE blog_id = '".$_GET["id"]."'";
      $stmt = $connect -> prepare($sql);
      $stmt -> execute();
      $result = $stmt -> fetch(PDO::FETCH_ASSOC);
    
      unset($connect);
    }
  ?>
  <?php if (!$result) {
    include "../error/404.php";
  } else { ?>
    <h1>編輯文章</h1>
    <form action="./action/update.php" method="post">
      <input type="hidden" id="id" name="id" value="<?php echo $_GET['id'] ?>">
      <label for="blog_title">* 標題:</label>
      <input type="text" id="blog_title" name="blog_title" value="<?php echo $result["blog_title"]?>"><br>
      <label for="blog_content">* 內容:</label>
      <textarea id="blog_content" name="blog_content"><?php echo $result["blog_content"]?></textarea><br><br>
      <button type="submit" class="submit">修改</button>
    </form>
    <?php } ?>
  </body>
</html>