<?php 
    require_once('Exchange.php');
    require_once('Task.php');

    require_once('Lost.php');

    $lost = new Lost();

    $lost->name = "123";
    $lost->PostLost();

    #$task->InsertTask('000','001','Im',"TWO THREE");
    $ex = new Exchange();
    $ex->name="123";
    $ex->PostExchange();
 ?>