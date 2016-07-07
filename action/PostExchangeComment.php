<?php 

    require_once('../class/Exchange.php');
/*发布商品评论*/
    $exchange = new Exchange( );

    $uid = $_GET['uid'];
    $eid = $_GET['eid'];

    $exchange->InsertExchangeComment( $uid , $eid , $_POST['message']);
    echo "<script>alert('OK!')</script> <script>history.go(-1)</script>";
 ?>