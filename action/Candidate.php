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
    <title>班委换届</title>
</head>
<?php 

/*

    班级选举页面


*/


require_once('../class/User.php');
session_start();

$id = $_SESSION['id'];
$user = new User($id);

 ?>
<body>
    <main id="panel" class="panel bgef">
        <!-- 内容 -->
        <section class="text-left" id="abcsssss">
            <p class="header-box-title text-center">
                <a href="javascript:history.go(-1);" class="pull-left"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span></a>
                班委换届
                <!-- 添加班委 -->
                <?php 

                if( $user->role==1 )
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
                            <h4 class="modal-title" id="myModalLabel">添加班委信息</h4>
                        </div>
                        <form action="ModifyCand.php?op=1" method="post">
                        <div class="modal-body color333">
                            <div role="tabpanel" class="tab-pane active" id="home">
                                <p>学号：</p>
                                <input class="form-control" type="text" name="id" placeholder="13115022018">
                                <p>职位：</p>
                                <input type="text" name="job" class="form-control" placeholder="副团支书">
                            </div>
                        </div>
                        <!-- 操作btn -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                            <!-- <button type="button" >发布</button> -->
                            <input type="submit" class="btn btn-primary" value="添加">
                        </div>
                         </form>
                    </div>
                </div>
            </div>

            <ol class="breadcrumb text-left classphone">
              <li><a href="#"><?php echo $user->ClassGrade; ?>级</a></li>
              <li><a href="#"><?php echo $user->ClassCollege; ?></a></li>
              <li class="active"><?php echo $user->ClassMajor; ?></li>
            </ol>

            <div class="table-responsive change classphone">
                <table class="table table-hover table-bordered table-striped table-condensed text-left">
                    <thead class="">
                        <th>学号</th>
                        <th>姓名</th>
                        <th>职位</th>
                        <?php 
                        /*若果该用户的标记为1即班长，就有权对候选人进行操作*/
                            if( $user->role==1 )
                            {
                                echo "<th>编辑</th>";
                            }
                         ?>
                    </thead>
                    <tbody>
                    <?php
                         for($i=1;$i<=$user->ClassCandidate->CandidateNum ; $i++ )
                        {
                            /*打印候选人信息*/
                        echo "
                             <tr>
                                <td>{$user->ClassCandidate->CandidateResult[$i]['s_id']}</td>
                                <td>{$user->ClassCandidate->CandidateResult[$i]['s_name']}</td>
                                <td>{$user->ClassCandidate->CandidateResult[$i]['ca_job']}</td>";
                            /*对候选人的操作*/
                            if( $user->role==1 )
                            {
                                echo "<td><form action=\"ModifyCand.php?op=0&caid={$user->ClassCandidate->CandidateResult[$i]['ca_id']}\" method=\"post\" ><input type=\"submit\" value=\"删除\"></form></td>";
                            }

                            echo " </tr>
                             ";
                        }
                     ?>
                    </tbody>
                  
                </table>
            </div>

            <!-- 页码 -->
            <!-- <nav>
              <ul class="pagination pagination-sm">
                <li class="disabled">
                  <a href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li>
                  <a href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              </ul>
            </nav> -->


        </section>
    </main>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>
