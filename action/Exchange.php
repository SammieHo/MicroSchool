<!doctype html>
<!--[if IE 8]><html class="ie8 lt-ie10"><![endif]-->
<!--[if IE 9]><html class="ie9 lt-ie10"><![endif]-->
<!--[if gt IE 9]><!-->
<html lang="en">
<!--<![endif]-->

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
    <link rel="stylesheet" href="assets/css/container/sechand.css">
    <title>校园二手市场</title>
</head>
<?php 

/*

    商品交易页面


*/
    require_once('../class/User.php');
    require_once('../class/Exchange.php');
    require_once('Setting.php');

      session_start();

  $id = $_SESSION['id'];
    $user = new User( $id );
    $exchange = new Exchange();
 ?>
<body>
    <main id="panel" class="panel bgef">
        <!-- 内容 -->
        <section class="text-left" id="abcsssss">
            <p class="header-box-title text-center">
                <a href="javascript:history.go(-1);" class="pull-left"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span></a>
                校园二手市场
            </p>

            <!-- 内容 -->
<?php 
/*打印所有商品信息*/
for( $i=1 ; $i<=$exchange->AllExchangeNum ; $i++ )
{
    $UserPhoto = $USER_PHOTO_DIR.$exchange->AllExchangeResult[$i]['s_photo'];
    $ExchangePhoto = $USER_PHOTO_DIR.$exchange->AllExchangeResult[$i]['e_photo'];
    $EID = $exchange->AllExchangeResult[$i]['e_id'];

print<<<EOT
            <section class="content secondhand">
                <a href="ExchangeContent.php?eid=$EID">
                    <div class="container media content-mb">
                        <div class="media-left">
                            <img class="media-object img-circle" src="$UserPhoto">
                        </div>
                        <div class="media-body text-left">
                            <div class="media-heading ">
                                {$exchange->AllExchangeResult[$i]['s_name']}
                            </div>
                            <span>{$exchange->AllExchangeResult[$i]['e_time']}</span>
                        </div>
                        <div class="media-right">
                            <div class="pull-right redprice">{$exchange->AllExchangeResult[$i]['e_money']}</div>
                            <div class="pull-right oldprice">{$exchange->AllExchangeResult[$i]['e_money']}</div>
                        </div>
                    </div>
                    <!-- photo -->
                    <div class="photo content-mb">
                        <ul class="clearfix">
                            <li>
                                <img class="img-responsive" src="$ExchangePhoto" alt="">
                            </li>
                        </ul>
                    </div>
                    <div class="text-left">
                        <p>{$exchange->AllExchangeResult[$i]['e_other']}</p>
                    </div>
                </a>
                <div class="btn-group btn-group-justified" role="group" aria-label="...">
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default"><i class="iconfont">&#xe616;</i>喜欢</button>
                    </div>
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default"><i class="iconfont">&#xe61a;</i>分享</button>
                    </div>
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default"><i class="iconfont">&#xe60f;</i>评论</button>
                    </div>
                </div>
EOT;

             /*商品是否已经出售*/   
            if( $exchange->AllExchangeResult[$i]['e_flag']==0 )
            {
print<<<EOT
                <div id="saleOut">
                    <span>已出售</span>
                </div>
EOT;
            }    
            echo "</section>";
}
?>
            <!-- 内容 -->


            <ul id="navs" data-open="×" data-close="发布">
              <li><a href="#">闲置</a></li>
              <li><a href="#">失物</a></li>
              <li><a href="#">分享</a></li>
              <li><a href="#">联谊</a></li>
            </ul>
            <!-- 悬浮 发布 btn -->
            <script type="text/javascript">
            (function(){
              var ul=$("#navs"),li=$("#navs li"),i=li.length,n=i-1,r=120;
              ul.click(function(){
                $(this).toggleClass('active');
                if($(this).hasClass('active')){
                  for(var a=0;a<i;a++){
                    li.eq(a).css({
                      'transition-delay':""+(50*a)+"ms",
                      '-webkit-transition-delay':""+(50*a)+"ms",
                      '-o-transition-delay':""+(50*a)+"ms",
                      'transform':"translate("+(r*Math.cos(90/n*a*(Math.PI/180)))+"px,"+(-r*Math.sin(90/n*a*(Math.PI/180)))+"px",
                      '-webkit-transform':"translate("+(r*Math.cos(90/n*a*(Math.PI/180)))+"px,"+(-r*Math.sin(90/n*a*(Math.PI/180)))+"px",
                      '-o-transform':"translate("+(r*Math.cos(90/n*a*(Math.PI/180)))+"px,"+(-r*Math.sin(90/n*a*(Math.PI/180)))+"px",
                      '-ms-transform':"translate("+(r*Math.cos(90/n*a*(Math.PI/180)))+"px,"+(-r*Math.sin(90/n*a*(Math.PI/180)))+"px"
                    });
                  }
                }else{
                  li.removeAttr('style');
                }
              });
            })($);
            </script>

        </section>
    </main>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>
