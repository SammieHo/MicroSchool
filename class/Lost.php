<?php 
    
    require_once('SqlConnect.php');

/*

    class Lost

    失物认领类

*/
class Lost
{
    public $ID;
    public $name;
    public $location;
    public $other;
    public $connect;
    public $phone;
    public $flag;
    public $photo;
    public $PickTime;
    public $time;

    public $ConnectID;
    public $ConnectName;
    public $ConnectPhoto;
    public $ConnectPhone;

    public $LostNum;/*结果集数量*/
    public $LostResult;/*结果集数组*/
/**/
    private $DB_Connect;/*数据库连接类*/

    function __construct()
    {
        $this->DB_Connect = new SqlConnect();
        $this->GetAllLost();
    }

    function GetAllLost( )/*获取所有失物列表*/
    {
        $str = "SELECT * FROM tb_lost , tb_student WHERE s_id=l_connect ";

        $this->LostNum=0;

        $this->DB_Connect->Query($str);
        while( $res=$this->DB_Connect->Fetch_Assoc() )
        {
            $this->LostResult[++$this->LostNum] = $res;
        }
    }

    function PostLost()/*添加失物信息*/
    {
        $str = "INSERT INTO tb_lost( l_name , l_location , l_others , l_connect , l_phone , l_flag , l_photo , l_PickTime , l_time ) VALUES( '$this->name' ,'$this->location' , '$this->other' , '$this->connect' , '$this->phone' , 1,'$this->photo' , '$this->PickTime' , now() )";

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
