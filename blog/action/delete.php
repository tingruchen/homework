<?php
if (!$_POST) {
  header("location: /");
}

include "../../action/connect.php";

$sql = "DELETE FROM blog WHERE blog_id = '".$_POST['id']."'";
$stmt = $connect -> prepare($sql);
$stmt -> execute();

header("location: /");

unset($connect);
?>