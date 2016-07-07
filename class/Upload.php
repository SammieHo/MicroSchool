<?php 

header("Content-type:text/html;charset=utf-8");
/*

class Upload

文件上传类

*/
class Upload
{
    private $FileDir;/*文件目录*/

    private $filename;/*文件名*/
    private $tmp_name;/*临时文件名*/
    private $errorCode;/*文件上传响应码*/

    function __construct( $dir )
    {
        $this->FileDir = $dir;
    }

    function MakeFileName()/*构造文件名，日期+时间+随机数*/
    {
        $CurTime = getdate();
        $ext = pathinfo( $filename , PATHINFO_EXTENSION );

        $name = $CurTime['year'].$CurTime['mon'].$CurTime['mday'].$CurTime['hours'].$CurTime['minutes'].$CurTime['seconds'].mt_rand().'.'.$ext;

        return $name;
    }

    function UploadFile( $fn , $tn , $ec )/*把临时文件移到服务器目录下*/
    {
        $this->filename = $ec;
        $this->tmp_name = $tn;
        $this->errorCode = $ec;

        if( $this->errorCode==0 )
        {
            $NewFileName = MakeFileName();

            if( move_uploaded_file($tmp_name, "$FileDir"."$NewFileName") )
            {
                return $NewFileName;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }
}
 ?>
