<?php 
require_once('SqlConnect.php');

/*

    class Cand

    班级选举类


*/
class Cand
{
    public $CAID;
    public $user;
    public $class;
    public $job;

    public $CandidateNum;/*班级选举候选人数量*/
    public $CandidateResult;/*班级候选人结果集*/

    private $DB_Connect;/*数据库连接类*/

    function __construct( $cid )/*构造函数，以班级号为参数获取候选人信息*/
    {
        $this->class = $cid;
        $this->DB_Connect = new SqlConnect();

        $this->GetAllCandidate();
    }

    function GetAllCandidate()/*获取所有候选人信息*/
    {
        $str = "SELECT * FROM tb_candidate , tb_student WHERE ca_class='$this->class' AND ca_user=s_id";

        $this->CandidateNum=0;

        $this->DB_Connect->Query( $str );

        while( $res = $this->DB_Connect->Fetch_Assoc() )
        {
            $this->CandidateResult[++$this->CandidateNum] = $res;
        }
    }

    function DeleteCandidate( $caid )/*删除候选人，以候选人id为参数*/
    {
        $str = "DELETE FROM tb_candidate WHERE ca_id='$caid' ";

        if( $this->DB_Connect->Query($str) )
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function InsertCandidate( $uid , $cid , $job )/*添加候选人*/
    {
        $str = "INSERT INTO tb_candidate( ca_user , ca_class , ca_job ) VALUES('$uid' , '$cid' , '$job')";

        if($this->DB_Connect->Query($str))
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
