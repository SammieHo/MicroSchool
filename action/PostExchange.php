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
    <title>闲置发布</title>
</head>

<body>
    <main id="panel" class="panel bgef">
        <!-- 内容 -->
        <section class="text-left" id="abcsssss">
            <p class="header-box-title text-center">
                <!-- 后退 -->
                <a href="javascript:history.go(-1);"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span></a> 闲置发布
                <!-- <a data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a> -->
            </p>
            <!-- 发布闲置信息-->
            <form action="InsertExchange.php" method="post">
                <div class="modal-body">
                    <article class="send-fabu">
                        <p>
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                            <span>商品描述：
                                <span class="wordage">（剩余字数：<span id="syxsta"> 100</span>）</span>
                            </span>
                        </p>
                        <textarea name="message" class="form-control" onkeyup="checkLength(this,'100','syxsta');" rows="3"  placeholder="客官，请写下您对物品的描述，100个字以内噢~谢谢O(∩_∩)O"></textarea>

                        <p>
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                            <span>转让价¥：</span>
                        </p>
                        <div class="input-group">
                         
                          <input type="text" class="form-control" placeholder="120" name="money">
                          <span class="input-group-btn">
                            <button class="btn btn-default" type="button">元</button>
                          </span>
                        </div>

                        <p>
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                            <span>原价¥：</span>
                        </p>
                        <div class="input-group">
                         
                          <input type="text" class="form-control" placeholder="120">
                          <span class="input-group-btn">
                            <button class="btn btn-default" type="button">元</button>
                          </span>
                        </div>

                        <!-- 上传文件在zyUpload.js  -->

                        <p>
                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                            <span>图片上传：</span>
                        </p>
                        <div id="demo" class="demo"></div> 
                        
                        <!-- 引用控制层插件样式 -->
                        <link rel="stylesheet" href="assets/css/fabu/zyUpload.css" type="text/css">
                        
                        <script type="text/javascript" src="assets/js/jquery.min.js"></script>
                        <!-- 引用核心层插件 -->
                        <script type="text/javascript" src="assets/js/fabu/core/zyFile.js"></script>
                        <!-- 引用控制层插件 -->
                        <script type="text/javascript" src="assets/js/fabu/zyUpload.js"></script>
                        <!-- 引用初始化JS -->
                        <script type="text/javascript" src="assets/js/fabu/uploaddemo.js"></script>

                    </article>
                </div>
                
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="发布">
                </div>
            </form>
        </section>
    </main><!-- 
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script> -->


</body>

</html>
