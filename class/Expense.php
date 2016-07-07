<?php 
require_once('SqlConnect.php');

/*

    class Expense 

    班费使用情况类

*/

class Expense
{
    public $class;
    public $id;

    public $ExpenseNum;
    public $ExpenseResult;

    private $DB_Connect;/*数据库连接类*/

    function __construct( $cid )/*构造函数，以班级编号为参数*/
    {
        $this->class = $cid;
        $this->DB_Connect = new SqlConnect();
    }

    function GetInExpense()/*获取班费收如情况*/
    {
        $str = "SELECT * FROM tb_expense WHERE  e_class='$this->class' AND e_flag=1 ";

        $this->ExpenseNum=0;

        $this->DB_Connect->Query( $str );

        while( $res = $this->DB_Connect->Fetch_Assoc() )
        {
            $this->ExpenseResult[++$this->ExpenseNum] = $res;
        }
    }

    function GetOutExpense()/*获取班费支出情况*/
    {
        $str = "SELECT * FROM tb_expense WHERE  e_class='$this->class' AND e_flag=0 ";

        $this->ExpenseNum=0;

        $this->DB_Connect->Query( $str );

        while( $res = $this->DB_Connect->Fetch_Assoc() )
        {
            $this->ExpenseResult[++$this->ExpenseNum] = $res;
        }
    }

    function GetALLExpense()/*获取所有情况*/
    {
        $str = "SELECT * FROM tb_expense WHERE  e_class='$this->class' ORDER BY e_time ASC";

        $this->ExpenseNum=0;

        $this->DB_Connect->Query( $str );

        while( $res = $this->DB_Connect->Fetch_Assoc() )
        {
            $this->ExpenseResult[++$this->ExpenseNum] = $res;
        }
    }

    function PostExpense( $class , $flag , $sum , $per , $other )/*添加班费信息*/
    {
        if( $flag==1 )
        {
            $str = "INSERT INTO tb_expense( e_class , e_flag , e_per , e_sum , e_other , e_time ) VALUES( '$class' , 1 , $per , $sum , '$other' , now() )";

        }
        else
        {
            $str = "INSERT INTO tb_expense( e_class , e_flag , e_sum , e_other , e_time ) VALUES('$class' , 0 , $other,$sum , now() )";
        }

        if( $this->DB_Connect->Query($str ) )
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
