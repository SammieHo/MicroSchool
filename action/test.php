<?php 

require_once('../class/User.php');
require_once('../class/Setting.php');

$user = new User('000');

$res = $user->GetStudentContacts( $num);

for( $i=1 ; $i<=$num ; $i++ )
{
print<<<EOT
    {$res[$i]['s_name']}
     {$res[$i]['s_phone']}
EOT;
}
 ?>
