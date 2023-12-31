<!DOCTYPE html>
<html>
  <head>
    <link href="./style/style.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <?php
      session_start();
      if (!empty($_SESSION["member"])) { ?>
        <a href="./user?id=<?php echo $_SESSION['member']['user_id']?>" class="btn">會員中心</a>
        <form action="./action/logout.php" method="post" class="hidden">
          <button type="submit" class="btn">登出</button>
        </form>
        <hr />
        <h1><?php echo "歡迎~". $_SESSION["member"]["user_firstName"]; ?></h1>
      <?php } else { ?>
          <h3>立即登入</h3>
        <form action="./action/login.php" method="post">
          <label for="user_name">* 帳號:</label>
          <input type="text" id="user_name" name="user_name" placeholder="ex: ooo@104.com.tw"><br>
          <label for="user_password">* 密碼:</label>
          <input type="password" id="user_password" name="user_password"><br><br>
          <button type="submit" class="submit">登入</button>
        </form>
      <?php } 
    ?>
    <?php if (!empty($_SESSION["member"])) { ?>
      <h3>新增文章</h3>
      <form action="./blog/action/create.php?id=<?php echo $_SESSION['member']['user_id']?>" method="post">
        <label for="blog_title">* 標題:</label>
        <input type="text" id="blog_title" name="blog_title"><br>
        <label for="blog_content">* 內容:</label>
        <textarea id="blog_content" name="blog_content"></textarea><br><br>
        <button type="submit" class="submit">新增</button>
      </form>
    <?php } ?>
    <div class="blog-list">
      <?php
        include "./action/connect.php";
        $sql = "SELECT user.user_id, user.user_firstName, user.user_lastName, blog.blog_id, blog.blog_title, blog.blog_content, blog_modifyDate, blog.blog_fk
        FROM user
        INNER JOIN blog
        ON user.user_id = blog.blog_fk
        ORDER BY blog_modifyDate DESC";
        $stmt = $connect -> prepare($sql);
        $stmt -> execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($result)) {
          foreach ($result as $blog_key => $blog) { ?>
           <a href="./blog/index.php?id=<?php echo $blog["blog_id"] ?>">
            <div class="blog-card">
              <h3><?php echo $blog["blog_title"] ?></h3>
              <p><?php echo $blog["blog_content"] ?></p>
              <p><?php echo $blog["blog_modifyDate"]?>，<?php echo $blog["user_lastName"] ?><?php echo $blog["user_firstName"] ?></p>
              <?php if (!empty($_SESSION["member"]) && $_SESSION["member"]['user_id'] == $blog["blog_fk"]) { ?>
                <a href="./blog/edit.php?id=<?php echo $blog["blog_id"] ?>" class="btn edit">編輯</a>
                <form action="./blog/action/delete.php" method="post" class="hidden">
                  <input type="hidden" id="id" name="id" value="<?php echo $blog["blog_id"] ?>">
                  <button type="submit" class="btn delete">刪除</button>
                </form>
              <?php } ?>
            </div>
            </a>
          <?php }
        } 
        unset($connect);
      ?>
    </div>
  </body>
</html>