<?php 

require_once('SqlConnect.php');
require_once('Upload.php');
require_once('Setting.php');
require_once('Task.php');
require_once('Cand.php');
require_once('Expense.php');

/*

class User

用户类

*/
class User
{
    public $id;
    public $name;
    public $pasw;
    public $role;
    public $sex;
    public $phone;
    public $class;
    public $live;
    public $photo;

    public $ClassMajor;
    public $ClassCollege;
    public $ClassGrade;

    public $StudyTask;/*学习计划类*/
    public $ClassCandidate;/*班级选举类*/
    public $ClassExpense;/*班费情况类*/

    private $PhotoDir;
 
    private $DB_Connect;/*数据库连接类*/
    private $Upload_Photo;/*文件上传类*/

    function __construct( $u_id )/*构造函数，账号为参数*/
    {
        $this->id = $u_id;
        $this->PhotoDir = $PHOTO_DIR;
        
        $this->Upload_Photo = new Upload( $PhotoDir );

        $this->DB_Connect = new SqlConnect();
        $this->GetStudentInformation();

        $this->StudyTask = new Task( $this->class );

        $this->ClassCandidate = new Cand( $this->class );

        $this->ClassExpense = new Expense( $this->class );
    }

    function GetStudentInformation()/*获取学生的所有信息*/
    {
        $str = " SELECT * FROM tb_student WHERE s_id='$this->id' ";

        $this->DB_Connect->Query( $str );

        $result = $this->DB_Connect->Fetch_Assoc();

        $this->name= $result['s_name'];
        $this->role = $result['s_role'];
        $this->sex = $result['s_sex'];
        $this->phone = $result['s_phone'];
        $this->class = $result['s_class'];
        $this->live = $result['s_live'];
        $this->photo = $result['s_photo'];

        $str = " SELECT * FROM tb_class  WHERE c_id='$this->class'";

        $this->DB_Connect->Query( $str );

        $result = $this->DB_Connect->Fetch_Assoc();

        $this->ClassCollege = $result['c_college'];
        $this->ClassGrade = $result['c_grade'];
        $this->ClassMajor = $result['c_major'];

    }

    function UploadPhoto( $fn , $tn , $ec )/*上传图片*/
    {
        $result = $this->Upload_Photo->UploadFile( $fn , $tn , $ec );

        if( $result==false )
        {
            return false;
        }
        else
        {
            $this->photo = $result;

            if (UpdateStudentInfomation()) 
            {
                return true;    
            }
            else
            {
                return false;
            }
        }
    }

    function UpdateStudentInfomation( )/*更新用户信息*/
    {
        $str = "UPDATE tb_student SET s_name='$this->name' , s_photo='$this->photo' , s_phone = '$this->phone' , s_sex = '$this->sex' , s_role=$this->role , s_class = '$this->class' , s_live = '$this->live' WHERE s_id='$this->id' ";

        if( $this->DB_Connect->Query($str) )
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function GetStudentContacts( &$num )/*获取班级信息*/
    {
        $str = " SELECT * FROM tb_student WHERE s_class='$this->class' ORDER BY s_id";

        $num=0;

        $this->DB_Connect->Query($str);

        while( $tmp=$this->DB_Connect->Fetch_Assoc() )
        {
            $res[++$num] = $tmp; 
        }

        return $res;
    }

}
 ?>
