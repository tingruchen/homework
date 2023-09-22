<?php
if (!$_POST) {
  header("location: /");
}

include "../../action/connect.php";

date_default_timezone_set("Asia/Taipei");

$sql = "UPDATE blog
  SET blog_title = '".$_POST["blog_title"]."', blog_content = '".$_POST["blog_content"]."', blog_modifyDate = '".date("Y-m-d H:i:s")."'
  WHERE blog_id = '".$_POST['id']."'";
$stmt = $connect -> prepare($sql);
$stmt -> execute();

header("location: ../index.php?id=".$_POST['id']);

unset($connect);
?>