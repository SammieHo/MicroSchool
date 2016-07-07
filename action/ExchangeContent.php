<!DOCTYPE html>
<!--[if IE 8]><html class="ie8 lt-ie10"><![endif]-->
<!--[if IE 9]><html class="ie9 lt-ie10"><![endif]-->
<!--[if gt IE 9]><![endif]-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="cleartype" content="on">
    <meta name="MobileOptimized" content="320">
    <meta name="HandheldFriendly" content="True">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <script src="assets/js/flexible.js"></script>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <title>校园二手市场</title>
</head>
<?php 

/*

    商品评论页面


*/
    require_once('../class/User.php');
    require_once('../class/Exchange.php');
    require_once('Setting.php');

      session_start();

  $id = $_SESSION['id'];
    $eid = $_GET['eid'];

    $user = new User( $id );
    $exchange = new Exchange( );

    $exchange->GetExchangeItem( $eid );/*加载所有商品评论*/

 ?>
<body>
    <main id="panel" class="panel bgef">
        <!-- 内容 -->
        <section class="text-left" id="abcsssss">
            <p class="header-box-title text-center">
                <a href="javascript:history.go(-1);" class="pull-left"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span></a>
                <!-- 把这个换成商品的名字 -->
                <?php echo $exchange->Name; ?>
            </p>
            <!-- 内容 -->
            <section class="content secondhand">
                <!-- <a href="secondhandContent.html"> -->
                <div class="container media content-mb">
                    <div class="media-left">
                        <img class="media-object img-circle" src="<?php echo $USER_PHOTO_DIR.$exchange->UserPhoto ; ?>">
                    </div>
                    <div class="media-body text-left">
                        <div class="media-heading ">
                            <?php echo $exchange->UserName; ?>
                        </div>
                        <span><?php echo $exchange->time; ?></span>
                    </div>
                    <div class="media-right">
                        <div class="pull-right redprice"><?php echo $exchange->money; ?></div>
                        <div class="pull-right oldprice"><?php echo $exchange->money; ?></div>
                    </div>
                </div>
                <!-- 描述内容 -->
                <div class="text-left">
                    <p><?php echo $exchange->other; ?></p>
                </div>
                <!-- 图片 展示区 -->
                <div class="liuyan-photo">
                    <p>
                        <img class="img-responsive" src="<?php echo $USER_PHOTO_DIR.$exchange->photo; ?>" alt="">
                    </p>
                </div>
                <!-- 操作区 -->
                <div class="btn-group btn-group-justified" role="group" aria-label="...">
                    <div class="btn-group" role="group">
                        <button id="liuyan" type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal"><i class="iconfont">&#xe60f;</i>评论</button>
                    </div>
                    <div class="btn-group" role="group">
                        <!-- 跳转到对话框 -->
                        <button type="button" class="btn btn-danger"><i class="iconfont">&#xe614;</i>我想要</button>
                    </div>
                </div>
                <!-- 留言区 -->
                <ol class="breadcrumb text-left">
                    <li><i class="iconfont">&#xe60f;</i>评论 <span><?php echo $exchange->ExchangeCommentNum; ?></span> 条</li>
                </ol>
                <!-- 留言信息 -->
            <?php 
                /*打印商品评论*/
                for( $i=1 ; $i<=$exchange->ExchangeCommentNum ; $i++ )
                {
                    $UserPhoto = $USER_PHOTO_DIR.$exchange->ExchangeCommentResult[$i]['s_photo'];

print<<<EOT
                <div class="container media content-mb comment">
                    <div class="media-left media-top">
                        <img class="media-object img-circle" src="{$UserPhoto}">
                    </div>
                    <div class="media-body text-left">
                        <div class="media-heading ">
                            {$exchange->ExchangeCommentResult[$i]['s_name']}
                        </div>
                        <span>{$exchange->ExchangeCommentResult[$i]['ec_time']}</span>
                        <h6>{$exchange->ExchangeCommentResult[$i]['ec_other']}</h6>
                    </div>
                </div>

EOT;
                }

             ?>
            </section>
            <!-- 留言发布框 -->
            <div class="modal fade" id="myModal" tabindex="1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <!-- 发布的求购信息 -->
                        <form action="PostExchangeComment.php?uid=<?php echo $id; ?>&eid=<?php echo $eid; ?>" method="post" >
                            <div class="modal-body">
                                <article class="send-fabu">
                                    <p>
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                        <span>留言：
                                        <span class="wordage">（剩余字数：<span id="syqiusta"> 100</span>）</span>
                                        </span>
                                    </p>
                                    <textarea name="message" class="form-control" onkeyup="checkLength(this,'100','syqiusta');" rows="3" placeholder="客官，可以写下您对需求物品有什么要求，100个字以内噢~例如：要黑色/8成新/可联系QQ：8888等，谢谢O(∩_∩)O"></textarea>
                                </article>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                                <input type="submit" name="PostComment" class="btn btn-primary"></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>
