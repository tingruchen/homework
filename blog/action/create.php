<?php
if (!$_POST) {
  header("location: /");
}

include "../../action/connect.php";

$sql = "INSERT INTO blog (blog_title, blog_content, blog_fk) VALUES ('".$_POST['blog_title']."', '".$_POST['blog_content']."', '".$_GET['id']."')";
$stmt = $connect -> prepare($sql);
$stmt -> execute();

$stmt = $connect -> prepare("SELECT @@IDENTITY AS 'id'");
$stmt -> execute();
$result = $stmt -> fetch(PDO::FETCH_ASSOC);

header("location: ../index.php?id=".$result["id"]);

unset($connect);
?>