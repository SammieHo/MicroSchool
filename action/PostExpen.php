<?php 
require_once('../class/User.php');

  session_start();

  $id = $_SESSION['id'];
$user = new User($id);

$op=$_GET['op'];

if( $op==1 )
{
    $user->ClassExpense->PostExpense( $user->class , 1 , $_POST['sum'] , $_POST['per'] , $_POST['other'] );
}
else
{
    $user->ClassExpense->PostExpense( $user->class , 0 , $_POST['sum'] , "" , $_POST['other'] );
}
echo "<script>alert('OK!')</script> <script>history.go(-1)</script>";
 ?>

