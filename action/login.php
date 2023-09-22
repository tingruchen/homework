<?php
if (!$_POST) {
  header("location: /");
}

include "./connect.php";

$sql = "SELECT * FROM user WHERE user_name = '".$_POST["user_name"]."'";
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

