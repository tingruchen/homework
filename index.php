<!DOCTYPE html>
<html>
  <head>
    <link href="./style/style.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <?php
      session_start();
      if (!empty($_SESSION["member"])) { ?>
        <a href="./user?id=<?php echo $_SESSION['member']['user_id']?>" class="btn">會員頁面</a>
        <a href="./action/logout.php" class="btn">登出</a>
        <hr />
        <h1><?php echo "歡迎~". $_SESSION["member"]["user_firstName"]; ?></h1>
      <?php } else { ?>
        <h1>立即登入</h1>
        <form action="./action/login.php" method="post">
          <label for="user_name">* 帳號:</label><br>
          <input type="text" id="user_name" name="user_name" placeholder="ex: ooo@104.com.tw"><br>
          <label for="user_password">* 密碼:</label><br>
          <input type="password" id="user_password" name="user_password"><br><br>
          <button type="submit" class="submit">登入</button>
        </form>
      <?php } 
    ?>
    <?php
      include "./action/connect.php";

      $sql = "SELECT * FROM blog LIMIT 12";
      $stmt = $connect -> prepare($sql);
      $stmt -> execute();
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

      if (!empty($result)) {
        foreach ($result as $blog_key => $blog) {?>
          <div class="blog-card">
            <h3><?php echo $blog["blog_title"] ?></h3>
            <p><?php echo $blog["blog_content"] ?></p>
          </div>
        <?php }
      } 
      unset($connect);
    ?>
  </body>
</html>