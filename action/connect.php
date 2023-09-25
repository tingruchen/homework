<?php
  $link = array(
    "host" => "localhost",
    "port" => "80",
    "account" => "root",
    "password" => "12345678",
    "dbname" => "db"
    );
  $dbconnect =  "mysql:host=".$link["host"].";port=".$link["port"].";dbname=".$link["dbname"];

  try {
    $connect = new PDO($dbconnect,$link["account"],$link["password"]);
    $connect -> query("SET NAMES 'utf8'");
    $connect -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (Exception $e) {
    echo "Connection failed: ".$e->getMessage();
      exit();
  }
?>