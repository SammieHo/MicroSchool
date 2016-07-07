<?php

require_once('Setting.php');

/*

class SqlConnect 
数据库连接类
*/
class SqlConnect
{
    private $Sql_Db_Host;/**主机/
    private $Sql_Db_U_Id;/*数据库账号*/
    private $Sql_Db_Psd;/*数据库密码*/
    private $Sql_Db_Name;/*数据库名称*/
    private $Sql_Conn;/*数据库连接*/
    private $Sql_Result;/*结果集*/
    private $Sql_Row;/*未分的结果集*/
    private $Sql_Str;/*SQL语句*/
    private $Sql_Coding;/*编码*/

    
    function __construct()/*构造函数*/
    {
        $this->Sql_Db_Host = "localhost";
        $this->Sql_Db_U_Id = "root";
        $this->Sql_Db_Psd = "root";
        $this->Sql_Db_Name = "db_school";
        $this->Sql_Coding="utf8" ;

        $this->Connect();
    }

    public function __destruct()/*析构函数*/
    {
        if (!empty($this->Sql_Result)) {
            // mysql_free_result($this->Sql_Result);
        }
        #mysql_close( $this->Sql_Conn);
    }

    public function Connect()/*连接到数据库*/
    {
        $this->Sql_Conn = mysql_connect($this->Sql_Db_Host,$this->Sql_Db_U_Id,$this->Sql_Db_Psd);

        mysql_select_db($this->Sql_Db_Name,$this->Sql_Conn);

        mysql_query("SET NAMES $this->Sql_Coding");
    }

    public function Query( $str )/*执行SQL语句*/
    {
        if( $str=="")
        {
            #string is empty for error;
        }

        $this->Sql_Str = $str;

        $result = mysql_query( $this->Sql_Str , $this->Sql_Conn );

        if( !$result )
        {
            echo mysql_error();
            return;
        }
        else
        {
            $this->Sql_Result = $result;
        }

        return $this->Sql_Result;
    }

    public function Fetch_Assoc()/*按字段名划分结果*/
    {
        return mysql_fetch_assoc($this->Sql_Result);
    }

    public function Fetch_Row()/*按列划分结果*/
    {
        return mysql_fetch_row($this->Sql_Result);
    }
}
?>