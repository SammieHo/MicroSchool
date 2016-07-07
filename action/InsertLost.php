<?php 
/*添加失物*/
require_once('../class/Lost.php');
require_once('../class/User.php');

  session_start();

  $id = $_SESSION['id'];
$lost = new Lost();
$user = new User( $id );

$lost->name = $_POST['name'];
$lost->PickTime = $_POST['PickTime'];
$lost->other = $_POST['message'];
$lost->connect = $id;
$lost->location = $_POST['location']; 
$lost->phone = $user->phone;

$lost->PostLost();
echo "<script>alert('OK!')</script> <script>history.go(-1)</script>";
 ?>