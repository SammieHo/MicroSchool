<?php 
require_once('../class/User.php');
/*修改候选人信息*/
$id='000';
$op = $_GET['op'];
$user = new User($id);

if( $op==0 )
{
    $caid = $_GET['caid'];
    
    if($user->ClassCandidate->DeleteCandidate($caid))
    {
        ;
    }
}
else
{
    $user->ClassCandidate->InsertCandidate( $_POST['id'] , $user->class , $_POST['job']);

}

echo "<script>alert('OK!')</script> <script>history.go(-1)</script>";
 ?>