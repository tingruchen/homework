<?php
if (!$_POST) {
  header("location: /");
}

include "../../action/connect.php";

$sql = "UPDATE blog
  SET blog_title = '".$_POST["blog_title"]."', blog_content = '".$_POST["blog_content"]."'
  WHERE blog_id = '".$_POST['id']."'";
$stmt = $connect -> prepare($sql);
$stmt -> execute();

header("location: ../index.php?id=".$_POST['id']);

unset($connect);
?>