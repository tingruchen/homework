<?php
if (!$_POST) {
  header("location: /");
}

session_start();
unset($_SESSION["member"]);
header("location: /");
?>

