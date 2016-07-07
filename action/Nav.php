<!DOCTYPE html>
<!--[if IE 8]><html class="ie8 lt-ie10"><![endif]-->
<!--[if IE 9]><html class="ie9 lt-ie10"><![endif]-->
<!--[if gt IE 9]><!--><html lang="en"><!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="cleartype" content="on">
    <meta name="MobileOptimized" content="320">
    <meta name="HandheldFriendly" content="True">
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0,user-scalable=no">
    <meta name="screen-orientation" content="portrait">
    <script src="assets/js/flexible.js"></script>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/test.css">
    <link rel="stylesheet" href="assets/css/leftSlidedemo.css">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/chatstyle.css">
    <style>
   
      .box { height: 100%;     overflow-y: auto;/*background: #000;*/}

    </style>

    <title>Slideout Demo</title>
  </head>
  <?php  
  /*用户信息，左侧导航栏与下方导航栏*/
  require_once('../class/User.php');
  require_once('Setting.php');

  session_start();

  $id = $_SESSION['id'];
  $user = new User( $id );
  
  ?>
  <body class="menu" style="background-image: linear-gradient(187deg,#232527, #3F4247 );">
    
    <!-- 左边侧栏 -->
    <nav id="menu" class="menu">
      <a href="#" target="_blank">
        <header class="menu-header">
          <div class="media">
            <div class="media-left">
             
              <a href="#">
                <!-- 头像 -->
                <img class="media-img-4rem img-circle" src="<?php echo $USER_PHOTO_DIR.$user->photo ?>">
              </a>
            </div>
            <div class="media-body colorf media-middle">
              <!-- 用户名 -->
              <h4><?php echo "$user->name"; ?></h4>
              <!-- 账号 -->
              <h6><?php echo "$user->id"; ?></h6>
            </div>
          </div>
        </header>
      </a>

      <section class="menu-section">
        <form action="" class="search-form">
          <!-- 搜索框 -->
          <input type="text" placeholder="Search" class="search-input-text">
          <span class="glyphicon glyphicon-search search-icon" aria-hidden="true"></span>
        </form>
        
        <ul class="menu-section-list">
          <li>
            <a href="#">
              <i class="iconfont">&#xe60c;</i>个人档案
              <!-- 红色提示原点 -->
              <span class="badge pull-right">2</span>
            </a>
          </li>
          <li><a href="#"><i class="iconfont">&#xe603;</i>我的作业</a></li>
          <li><a href="#"><i class="iconfont">&#xe602;</i>我的文件</a></li>
          <li><a href="#"><i class="iconfont">&#xe600;</i>鸽子箱</a></li>
          <li><a href="#"><i class="iconfont">&#xe60e;</i>课程表</a></li>
          <li><a href="#"><i class="iconfont">&#xe609;</i>公告栏</a></li>
          <li><a href="#"><i class="iconfont">&#xe60d;</i>投票</a></li>
          <li><a href="#"><i class="iconfont">&#xe608;</i>设置</a></li>
        </ul>
      </section>
    </nav>
    
    <!-- 主要内容 -->
    <main id="panel" class="panel">
      <div class="main" style="background: #fff;height: 100%;">
        
        <!-- id ="main" 里写内容-->
        <section class="box" id="main">
          <img class="img-responsive img-circle" src="assets/images/head/head2.jpg" style="width:3rem;height:3rem;margin:20px auto" alt="">
          <div class="" style="font-size:16px;padding:0 40px;text-align:left !important;">
          <p>姓名&nbsp;&nbsp;何BB</p>
          <p>学号&nbsp;&nbsp;13115022xxxx</p>
          <p>学校&nbsp;&nbsp;韶关学院</p>
          <p>学院&nbsp;&nbsp;信息科学与工程学院</p>
          <p>班级&nbsp;&nbsp;信息管理与信息系统02</p>
          </div>
         
          <!-- <p>学号&nbsp;&nbsp;</p> -->

        </section>
      
        
        <!-- 底部导航栏 -->
        <footer class="panel-footer" id="footerNav">
          <nav>
            <ul class="clearfix" id="alink" >
                <li id="footHome" class="footBlock">
                    <a href="class.html" onclick="changeBg(this)" class="active">
                        <i class="iconfont">&#xe604;</i>
                        <span>班级事务</span>
                    </a>
                </li>
                <li id="footDisc" class="footBlock text-center">
                    <a href="chat.html" onclick="changeBg(this)">
                        <i class="iconfont">&#xe60b;</i>
                        <span>童鞋班</span>
                    </a>
                </li>
                <li id="footFabu" class="footBlock">
                    <a href="school.html" onclick="changeBg(this)">
                        <i class="iconfont">&#xe601;</i>
                        <span>校园圈</span>
                    </a>
                </li>
                <li id="footFabu" class="footBlock js-slideout-toggle">
                    <a onclick="changeBg(this)">
                        <i class="iconfont">&#xe60a;</i>
                        <span>我的</span>
                    </a>
                </li>
            </ul>
          </nav>
        </footer>

      

      </div>
    </main>
    

    

    <script src="assets/js/slideout.min.js"></script>
    <script>
      window.onload = function() {
        var slideout = new Slideout({
          'panel': document.getElementById('panel'),
          'menu': document.getElementById('menu'),
          // 'padding': 230,
          'tolerance': 50,
          'duration':2      //speed
        });

        document.querySelector('.js-slideout-toggle').addEventListener('click', function() {
          slideout.toggle();
        });
        document.querySelector('.menu').addEventListener('click', function(eve) {
          if (eve.target.nodeName === 'A') { slideout.close(); }
        });

        var panelHeight = document.getElementById("panel");
        panelHeight.style.height = document.body.clientHeight - 5 + 'px';

        var nav = document.getElementById("footerNav");
        var docCW = document.body.clientWidth ;
        if (docCW <= 320) {
            nav.style.top = document.body.clientHeight - 50 + 'px';
        }else if(docCW > 320 && docCW <= 375){
            nav.style.top = document.body.clientHeight - 60 + 'px';
        }else if(docCW > 411){
            nav.style.top = document.body.clientHeight - 80 + 'px';
        }

        // send
        $("#liuyan").click(function() {
            // $("#footerNav").style.zIndex
            $("#footerNav").hide();
            $("#liuyan_footer").show(200);
        });
        $("#fasong").click(function() {
            $("#liuyan_footer").hide();
            $("#footerNav").show(200);
        });
        

        // var vsfgdf = document.getElementById("vsfgdf");
        // vsfgdf.style.height = nav.style.top;
      };
    </script>

    <script>
       function changeBg(link) {
           var alllinks = document.getElementById("alink").getElementsByTagName("a");
           // alert(alllinks.length);

           for (var i = 0; i < alllinks.length; i++) {
               alllinks[i].className = " "; //默认未点击时引用的样式  
           }
           link.className = "active"; //点击切换样式  
       }

       // 限制字数，
       // which=this：当前onkey 输入的字数
       // maxChars：最大长度
       // xianzhiname：显示现还有多少字的模块id
           function checkLength(which,maxChars,xianzhiname) {

               if (which.value.length > maxChars) {
                   alert("您出入的字数超多限制!");
                   // 超过限制的字数了就将 文本框中的内容按规定的字数 截取
                   which.value = which.value.substring(0, maxChars);
                   return false;
               } else {
                   var curr = maxChars - which.value.length; //maxChars 减去 当前输入的
                   var aabb = document.getElementById(  xianzhiname ).innerHTML= curr.toString();
                   return true;
               }
           }
    </script>
    
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.pjax.js"></script>
    <script>
      $(document).pjax('a', '#main', {  //写demo的内容块id
          fragment: '#abcsssss',//写a标签链接里的内容块
          timeout: 8000
          // 将 a[href]#container 内容 放到 (模板页)demo.html#main
      });
    </script>



  </body>
</html>