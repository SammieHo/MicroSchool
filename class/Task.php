<?php 

require_once('SqlConnect.php');

class Task
{
    public $ID;
    public $class;
    public $user;
    public $other;
    public $time;
    public $title;

    public $TaskNum;/*结果数量*/
    public $TaskResult;/*结果集合数组*/

    private $DB_Connect;/*数据库连接类*/

    function __construct( $cid )
    {
        $this->class = $cid;

        $this->DB_Connect = new SqlConnect( );
        
        $this->GetAllTask();
    }

    function GetAllTask( )/*获取所有学习计划*/
    {
        $str = "SELECT * FROM tb_task WHERE t_class='$this->class' ORDER BY  t_time ";

        $this->TaskNum = 0;

        $this->DB_Connect->Query( $str );

        while( $res = $this->DB_Connect->Fetch_Assoc() )
        {
            $this->TaskResult[++$this->TaskNum] = $res;
        }
    }

    function InsertTask( $uid , $cid , $title ,$content )/*添加学习计划*/
    {
        $str = "INSERT INTO tb_task( t_user , t_class , t_title , t_other , t_time ) VALUES( '$uid' , '$cid' , '$title' , '$content' , now() )";

        if( $this->DB_Connect->Query($str) )
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
 ?>
