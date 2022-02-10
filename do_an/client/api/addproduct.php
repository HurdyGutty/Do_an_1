<?php

    include "start.php";
    if(empty($_GET['id'])){
        header("location:javascript://history.go(-1)");
        exit;
    }
    $id=addslashes($_GET['id']);
    if(isset($_SESSION['cart'][$id]['quantity'])){
        if($_SESSION['cart'][$id]['quantity'] >= 10)  {
            echo json_encode(0);
            exit;
        }
        $_SESSION['cart'][$id]['quantity']+=1;
    }
    else {
      
        include "connect.php";
        $sql="select * from products_list
        where id='$id' 
        limit 1";
        $res=mysqli_query($connect,$sql);
        $item=mysqli_fetch_assoc($res);
        if(empty($item['name'])) exit;
        $_SESSION['cart'][$id]['quantity']=1;
        $_SESSION['cart'][$id]['price']=$item['price'];
        $_SESSION['cart'][$id]['photo']=$item['photo'];
        $_SESSION['cart'][$id]['name']=$item['name'];
    }
    if (!isset( $_SESSION['quantity'])){
        $_SESSION['quantity']=1;
    }
    else {
        $_SESSION['quantity']+=1;
    }
    echo json_encode(1);
?>