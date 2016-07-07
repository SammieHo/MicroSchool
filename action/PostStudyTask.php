<?php 
    require_once('../class/Task.php');

    $cid=$_GET['cid'];
    $uid=$_GET['uid'];

    $task = new Task( $cid );

    $task->InsertTask( $uid , $cid , $title , $_POST['content']);
    header('location:StudyTask.php');
 ?>