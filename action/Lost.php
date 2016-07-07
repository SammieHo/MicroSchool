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
    <title>失物招领</title>
</head>
<?php 
/*失物认领页面*/
  require_once('../class/Lost.php');
  require_once('Setting.php');
  $lost = new Lost();
 ?>
<body>
    <main id="panel" class="panel bgef">
        <!-- 内容 -->
        <section class="text-left" id="abcsssss">
            <p class="header-box-title text-center">
            <a href="javascript:history.go(-1);" class="pull-left"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span></a>
            失物招领
            </p>

            <!-- 一个section为一组内容 -->
            <?php 
            /*打印失物列表*/
            for( $i=1 ; $i<=$lost->LostNum ; $i++ )
            {
                $UserPhoto = $USER_PHOTO_DIR.$lost->LostResult[$i]['s_photo'];
                $LostPhoto = $USER_PHOTO_DIR.$lost->LostResult[$i]['l_photo'];
print<<<EOT
              <section class="content lost">
                <div class="container media content-mb">
                    <div class="media-left">
                        <a href="#">
                            <img class="media-object img-circle" src="$UserPhoto">
                        </a>
                    </div>
                    <div class="media-body text-left">
                        <div class="media-heading ">
                            {$lost->LostResult[$i]['s_name']}
                        </div>
                        <span>{$lost->LostResult[$i]['l_time']}</span>
                    </div>
                    <div class="media-right">
                      <span class="label label-warning">失物</span>
                    </div>
                </div>

                <div class="row">
                    <div class="container text-left mess">
                      <p><i class="iconfont">&#xe618;</i>拾获物品：<span>{$lost->LostResult[$i]['l_name']}</span></p>
                      <p><i class="iconfont">&#xe615;</i>拾获时间：<span>{$lost->LostResult[$i]['l_PickTime']}</span></p>
                      <p><i class="iconfont">&#xe617;</i>拾获地点：<span>{$lost->LostResult[$i]['l_location']}</span></p>
                      <!-- <p>联系电话：<a href="tel://{$lost->LostResult[$i]['l_phone']}" class="texthidden">{$lost->LostResult[$i]['l_phone']}</a></p> -->
                      <p><i class="iconfont">&#xe606;</i>{$lost->LostResult[$i]['l_other']}</p>
                    </div>
                </div>

                <!-- photo -->
                <div class="row photo content-mb">
                    <div class="container">
                        <ul class="clearfix">
                            <li>
                                <a href="#">
                                    <img class="img-responsive" src="$LostPhoto" alt="">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="btn-group btn-group-justified" role="group" aria-label="...">
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default">
                          <a href="wtai://wp//mc;18218522262" class="texthidden"><i class="iconfont">&#xe619;</i>致电</a></button>
                    </div>
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default"><i class="iconfont">&#xe61a;</i>分享</button>
                    </div>
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default"><i class="iconfont">&#xe60f;</i>评论</button>
                    </div>
                </div>
              </section>
EOT;
            }
             ?>
            <!-- 发布的按钮 -->
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
