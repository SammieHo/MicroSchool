<?php 

require_once('SqlConnect.php');

/*

    class Exchange

    商品交易类

*/
class Exchange
{
    public $name;
    public $ID;
    public $other;
    public $photo;
    public $flag;
    public $money;
    public $time;

    public $user;
    public $UserName;
    public $UserPhoto;
    public $UserPhone;

    public $AllExchangeNum;/*所有商品数量*/
    public $AllExchangeResult;/*商品结果集数组*/

    public $ExchangeCommentNum;/*商品评论数量*/
    public $ExchangeCommentResult;/*商品评论结果集*/

    private $DB_Connect;/*数据库连接类*/

    function __construct()/*构造函数*/
    {
        $this->DB_Connect = new SqlConnect();
        $this->GetAllExchange();
    }

    function GetAllExchange()/*获取所有商品的信息*/
    {
        $str = "SELECT * FROM tb_exchange , tb_student WHERE e_user=s_id ORDER BY e_time ";

        $this->DB_Connect->Query( $str );

        $this->AllExchangeNum=0;

        while ($tmp = $this->DB_Connect->Fetch_Assoc()) 
        {
            $this->AllExchangeResult[++$this->AllExchangeNum] = $tmp;
        }
    }

    function GetExchangeItem( $id )/*获取单个商品的详细信息，包括评论，以商品编号为参数*/
    {
        $str = "SELECT * FROM tb_exchange , tb_student WHERE e_id='$id' AND e_user=s_id ";

        $this->DB_Connect->Query( $str);
        $res = $this->DB_Connect->Fetch_Assoc();

        $this->ID = $res['e_id'];
        $this->Name = $res['e_name'];
        $this->other = $res['e_other'];
        $this->photo = $res['e_photo'];
        $this->flag = $res['e_flag'];
        $this->money = $res['e_money'];
        $this->time = $res['e_time'];

        $this->user = $res['e_user'];
        $this->UserName = $res['s_name'];
        $this->UserPhoto = $res['s_photo'];
        $this->UserPhone = $res['s_phone'];

        $this->GetAllExchangeComment($id);
    }

    function GetAllExchangeComment( $id )/*获取商品的评论，以商品号为参数*/
    {
        $str = " SELECT * FROM tb_exchangecomment , tb_student WHERE e_id='$id' AND ec_user=s_id ";

        $this->DB_Connect->Query( $str );

        $this->ExchangeCommentNum=0;

        while( $res = $this->DB_Connect->Fetch_Assoc() )
        {
            $this->ExchangeCommentResult[++$this->ExchangeCommentNum] = $res;
        }
    }

    function InsertExchangeComment( $u_id , $e_id , $content )/*添加商品评论*/
    {
            $str="INSERT INTO tb_exchangecomment( e_id , ec_user , ec_other , ec_flag , ec_time ) VALUES('$e_id','$u_id','$content' , 1 , now() )";

            if( $this->DB_Connect->Query($str) )
            {
                return true;
            }
            else
            {
                return false;
            }
    }

    function PostExchange( )/*发布商品*/
    {
        $str = "INSERT INTO tb_exchange( e_name , e_money , e_flag , e_other , e_photo ,  e_user , e_time ) VALUES( '$this->name' , '$this->money' , 1 , '$this->other' , '$this->photo' , '$this->user' , now())";

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
