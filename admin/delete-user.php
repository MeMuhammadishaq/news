<?php
include "config.php";
$userid = $_GET['id'];
$sql = "DELETE FROM `user` WHERE user_id=".$userid;
if($conn->query($sql)){
  header("location:users.php");
}

?>
