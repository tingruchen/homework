<?php
session_start();

include "./connect.php";

$sql = "INSERT INTO blog (blog_fk) VALUES ('".$_SESSION["member"]["user_id"]."')";
$stmt = $connect -> prepare($sql);
$stmt -> execute();
$result = $stmt -> fetch(PDO::FETCH_ASSOC);

if (!empty($result) && password_verify($_POST["user_password"], $result["user_password"])) {
  session_start();
  $_SESSION["member"] = $result;
  header("location: /");
} else {
  echo "密碼錯誤";
}

unset($connect);
?>