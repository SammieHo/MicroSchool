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
    <title>学习事务</title>
</head>
<?php 
/*学习事务页面*/
    require_once('../class/User.php');

      session_start();

  $id = $_SESSION['id'];

    $user = new User( $id );
 ?>
<body>
    <main id="panel" class="panel bgef">
        <!-- 内容 -->
        <section class="text-left" id="abcsssss">
            <p class="header-box-title text-center">
                <!-- 后退 -->
                <a href="javascript:history.go(-1);"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span></a> 学习事务
                <?php

                if( $user->role>0 )
                {    
                echo "
                <a data-toggle=\"modal\" data-target=\"#myModal\"><span class=\"glyphicon glyphicon-plus\" aria-hidden=\"true\"></span>
                </a>";      
                }
                 ?>
            </p>
            <!-- 发布弹出框 -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content text-left">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">学习任务发布</h4>
                        </div>
                        <form method="post" action="PostStudyTask.php?uid=<?php echo $user->id; ?>&cid=<?php echo $user->class; ?>">
                            <div class="modal-body color333">
                                    <p>标题</p>
                                    <input type="text" class="form-control" placeholder="信管作业">
                                    <p>test</p>
                                    <input type="datetime" class="form-control" placeholder="2016-12-1">
                                    <p>内容</p>
                                    <textarea class="form-control" rows="3" name="content"></textarea>
                                
                            </div>
                            <!-- 操作btn -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                                <input type="submit" class="btn btn-primary" value="发布">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- 班级 -->
            <ol class="breadcrumb text-left classphone">
                <li><a href="#"><?php echo $user->ClassGrade; ?>级</a></li>
                <li><a href="#"><?php echo $user->ClassCollege; ?></a></li>
                <li class="active"><?php echo $user->ClassMajor; ?></li>
            </ol>
            <!-- 通告显示的地方 -->

            <?php 
/*打印所有学习事务*/
            for( $i=1 ; $i<=$user->StudyTask->TaskNum ; $i++ )
            {
print<<<EOT
            <div class="panel panel-default studyinfo">
                <!-- Default panel contents -->
                <div class="panel-heading">{$user->StudyTask->TaskResult[$i]['t_time']}   {$user->StudyTask->TaskResult[$i]['t_title']}</div>
                <div class="panel-body">
                    {$user->StudyTask->TaskResult[$i]['t_other']}
                </div>
            </div>
EOT;
            }
             ?>
        </section>
    </main>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>
