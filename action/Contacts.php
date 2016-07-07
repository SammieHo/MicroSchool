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
    <title>班级通讯</title>
</head>
<?php 

/*

    班级通讯录页面


*/

    require_once('../class/User.php');
      session_start();

  $id = $_SESSION['id'];

    $user = new User( $id);
    $res = $user->GetStudentContacts( $num );/*获取所有学生信息*/

 ?>
<body>
    <main id="panel" class="panel bgef">
        <!-- 内容 -->
        <section class="text-left" id="abcsssss">
            <p class="header-box-title text-center">
            <a href="javascript:history.go(-1);" class="pull-left"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span></a>
            班级通讯
            </p>

            <ol class="breadcrumb text-left classphone">
              <li><a href="#"><?php echo $user->ClassGrade; ?>级</a></li>
              <li><a href="#"><?php echo $user->ClassCollege; ?></a></li>
              <li class="active"><?php echo $user->ClassMajor; ?></li>
            </ol>

            <div class="table-responsive">
                <table class="table table-hover table-bordered table-striped table-condensed text-left">
                    <thead class="">
                        <th>学号</th>
                        <th>姓名</th>
                        <th>电话</th>
                        <th>宿舍</th>
                    </thead>
                    <tbody>
                        <?php 
                            /*打印所有学生的联系方式*/
                            for( $i=1 ; $i<=$num ; $i++ )
                            {
                                    echo"
                                    <tr>
                                        <td>{$res[$i]['s_id']}</td>
                                        <td>{$res[$i]['s_name']}</td>
                                        <td>{$res[$i]['s_phone']}</td>
                                        <td>{$res[$i]['s_live']}</td>
                                    </tr>";
          
                                
                            }
                         ?>

                    </tbody>
                  
                </table>
            </div>


        </section>
    </main>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>
