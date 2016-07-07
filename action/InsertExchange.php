<?php 
/*添加商品*/
require_once('../class/Exchange.php');
  session_start();

  $id = $_SESSION['id'];
$ex = new Exchange();

$ex->money = $_POST['money'];
$ex->other = $_POST['message'];
$ex->user = $id;

$ex->PostExchange();

echo "<script>alert('OK!')</script> <script>history.go(-1)</script>";

 ?>