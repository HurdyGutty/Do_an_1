<?php
    require "authenticate.php";
    if(!Authenticate()){
        echo json_encode(0);
        exit;
    }
    if(empty($_POST['rate']) || !isset($_POST['text']) || empty($_POST['product']) || intval($_POST['rate'])>5 || intval($_POST['rate'])<1  ) exit;
    $rate=addslashes($_POST['rate']);
    $text=addslashes($_POST['text']);
    $id_pro=addslashes($_POST['product']);
    $id_cli=$_SESSION['id'];
    require "connect.php";
    $sql="INSERT INTO `products_rating` (`id_product`, `id_customer`, `rating`, `comment`) 
        VALUES ('$id_pro', '$id_cli', '$rate','$text')
        ON DUPLICATE KEY UPDATE `comment` = '$text',`rating`='$rate'";
     //   die($sql);
    $temp=mysqli_query($connect,$sql);
    if(mysqli_error($connect)) exit;
    $sql="SELECT cli_list.name FROM `cli_list` WHERE `id`='$id_cli' ";
    $res=mysqli_query($connect,$sql);
    $res=$res->fetch_assoc();
    echo json_encode($res);
    mysqli_close($connect);
?>