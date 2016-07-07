
<?php
    session_start();
    session_unset();
    session_destroy();

    if( isset($_POST['login']))
    {
        require_once('../../class/SqlConnect.php');

        $name = $_POST['username'];
        $psd = $_POST['password'];

        if (empty($name)|| empty($psd)) {
             echo "<script>alert('The ID And Password Can not empty')</script> <script>history.go(-1)</script>";
        }
        $str = "SELECT * FROM tb_login where l_id='$name'";

        $conn = new SqlConnect();

        $conn->Query($str);

        $row=$conn->Fetch_Assoc();

        if( empty($row) )
        {
            echo "<script>alert('The ID is not exists!')</script> <script>history.go(-1)</script>";
        }
        else
        {
            if( $row['l_pasw']==$psd)
            {
                session_start();
                $_SESSION['id']=$row['l_id'];
                $_SESSION['pasw']=$row['l_pasw'];
                $_SESSION['role']=$row['l_role'];

                // echo "<script>alert('OK')</script> <script>history.go(-1)</script>";
                 header('location:../Nav.php');//
                
            }
            else
            {
                echo "<script>alert('Password Error!')</script> <script>history.go(-1)</script>";
            }
        }
    }
    else if( isset($_POST['sign-in']))
    {
        header('location:SignIn.php');
    }
    else
    {
         echo "<script>alert('Invalid Login!')</script> <script>history.go(-1)</script>";
    }   

?>

