<?php
if (!$_POST) {
  header("location: /");
}

include "../../action/connect.php";

$sql = "UPDATE user
  SET user_firstName = '".$_POST["user_firstName"]."', user_lastName='".$_POST["user_lastName"]."'
  WHERE user_id = '".$_POST['id']."'";
$stmt = $connect -> prepare($sql);
$stmt -> execute();

session_start();
$_SESSION["member"]['user_firstName'] = $_POST["user_firstName"];
$_SESSION["member"]['user_lastName'] = $_POST["user_lastName"];
header("location: ../index.php?id=".$_POST['id']);

unset($connect);
?>