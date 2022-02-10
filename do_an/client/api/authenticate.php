<?php
require "start.php";
//header("location:javascript://history.go(-1)");
function Authenticate(){
    if(isset($_SESSION['id']) && !isset($_SESSION['access'])) return true;
    if(isset($_SESSION['access'])) unset($_SESSION['access']);
    if(isset($_SESSION['id'])) unset($_SESSION['id']);
    if (isset($_COOKIE['token'])){
        require "connect.php";
        $sql="select * from cli_list
        where token='$_COOKIE[token]'
        limit 1";
        $result=mysqli_query($connect, $sql);
        //die($sql);
        if(mysqli_num_rows($result)===1) {
            $row = $result->fetch_assoc();
            $_SESSION['id']=$row['id'];
            mysqli_close($connect);
            return 1;
        }
        mysqli_close($connect);
    }
    return 0;
}