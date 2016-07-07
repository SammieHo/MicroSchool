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
    <title>生活管理</title>
</head>
<?php 
/*

    班费情况页面


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
                <!-- 后退 -->
                <a href="javascript:history.go(-1);"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span></a> 生活管理
                <!-- 发布班费情况 -->
                <a data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
            </p>
            <!-- 发布弹出框 -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content text-left">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">班费管理</h4>
                        </div>
                        <div class="modal-body color333">
                            
                                <div>
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">登记班费缴纳情况</a></li>
                                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">发布费用支出情况</a></li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <!-- 缴纳 -->
                                        <div role="tabpanel" class="tab-pane active" id="home">
                                        <form action="PostExp.php?op=1" method="post">
                                            <p>日期：</p>
                                            <!-- 以后会用一个日期组件 -->
                                            <input class="form-control" type="date" value="2016-04-26">
                                            <p>缴纳金额：</p>
                                            <div class="input-group">
                                                <div class="input-group-addon">¥</div>
                                                <input type="text" class="form-control" id="exampleInputAmount" placeholder="20" name="sum">
                                            </div>
                                            <p>每人缴纳：</p>
                                            <div class="input-group">
                                                <!-- <div class="input-group-addon">¥</div> -->
                                                <input type="text" class="form-control" id="exampleInputAmount" placeholder="20" name="per">
                                                <div class="input-group-addon">元</div>
                                            </div>
                                            <p>备注情况：</p>
                                            <input type="text" class="form-control" value="收齐" name="other">
                                            <div cla/ss="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                                                <input type="submit" class="btn btn-primary" value="发布">
                                             </div>
                                        </form>
                                        </div>

                                        <!-- 支出 -->
                                        <div role="tabpanel" class="tab-pane" id="profile">
                                        <form action="PostExp.php?op=0" method="post">
                                            <p>日期：</p>
                                            <!-- 以后会用一个日期组件 -->
                                            <input type="text" class="form-control" placeholder="2016/03/10">
                                            <p>支出项目：</p>
                                            <input type="text" class="form-control" placeholder="团日活动" name="other">
                                            <p>支出金额：</p>
                                            <div class="input-group">
                                                <div class="input-group-addon">¥</div>
                                                <input type="text" class="form-control" id="exampleInputAmount" placeholder="20" name="sum">
                                            </div>
                                            <div cla/ss="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                                                <input type="submit" class="btn btn-primary" value="发布">
                                             </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <!-- 操作btn -->
                        <!-- <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                            <button type="button" class="btn btn-primary">发布</button>
                        </div> -->
                    </div>
                </div>
            </div>
            <ol class="breadcrumb text-left classphone">
                <li><a href="#"><?php echo $user->ClassGrade; ?>级</a></li>
                <li><a href="#"><?php echo $user->ClassCollege; ?></a></li>
                <li class="active"><?php echo $user->ClassMajor; ?></li>
            </ol>
            <!-- 班费支出情况 -->
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      班费结余情况
                    </a>
                  </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                        <table class="table">
                            <thead>
                                <th>日期</th>
                                <th>上次结余</th>
                                <th>缴纳/支出</th>
                                <th>结余</th>
                            </thead>
                            <tbody>
                            <?php 
                            /*打印所有班费情况，并对其结余*/
                                $user->ClassExpense->GetAllExpense();
                                $sum=0;
                                $prev=0;
                                for( $i=1 ; $i<=$user->ClassExpense->ExpenseNum ; $i++ )
                                {
                                    echo "
                                            <tr>
                                                <td>{$user->ClassExpense->ExpenseResult[$i]['e_time']}</td>
                                                <td>$prev</td>";

                                                if ($user->ClassExpense->ExpenseResult[$i]['e_flag']==1) 
                                                {
                                                    echo "<td>+{$user->ClassExpense->ExpenseResult[$i]['e_sum']}</td>";
                                                    $prev = $pre+$user->ClassExpense->ExpenseResult[$i]['e_sum'];
                                                }
                                                else
                                                {
                                                    echo "<td>-{$user->ClassExpense->ExpenseResult[$i]['e_sum']}</td>";
                                                    $prev = $prev-$user->ClassExpense->ExpenseResult[$i]['e_sum'];
                                                }
                                    echo "
                                            <td>$prev</td>
                                            </tr>";
                                }
                             ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- 班费缴纳情况 -->
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      班费缴纳情况
                    </a>
                  </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                        <!-- Table -->
                        <table class="table">
                            <thead>
                                <th>日期</th>
                                <th>每人</th>
                                <th>总额</th>
                                <th>备注情况</th>
                            </thead>
                            <tbody>
                            <?php 
                                $user->ClassExpense->GetInExpense();

                                for( $i=1 ; $i<=$user->ClassExpense->ExpenseNum ; $i++ )
                                {
                                    echo "
                                            <tr>
                                                <td>{$user->ClassExpense->ExpenseResult[$i]['e_time']}</td>
                                                <td>{$user->ClassExpense->ExpenseResult[$i]['e_per']}</td>
                                                <td>{$user->ClassExpense->ExpenseResult[$i]['e_sum']}</td>
                                                <td>{$user->ClassExpense->ExpenseResult[$i]['e_other']}</td>
                                            </tr>";
                                }
                             ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- 班费结余情况 -->
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingThree">
                        <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      班费支出情况
                    </a>
                  </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                        <!-- Table -->
                        <table class="table">
                            <thead>
                                <th>日期</th>
                                <th>支出项目</th>
                                <th>支出金额</th>
                            </thead>
                            <tbody>
                            <?php 
                                $user->ClassExpense->GetOutExpense();

                                for( $i=1 ; $i<=$user->ClassExpense->ExpenseNum ; $i++ )
                                {
                                    echo "
                                            <tr>
                                                <td>{$user->ClassExpense->ExpenseResult[$i]['e_time']}</td>
                                                
                                                <td>{$user->ClassExpense->ExpenseResult[$i]['e_other']}</td>
                                                <td>{$user->ClassExpense->ExpenseResult[$i]['e_sum']}</td>
                                            </tr>";
                                }
                             ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>
