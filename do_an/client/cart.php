
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CART</title>
    <link rel="stylesheet" href="asset/cart.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="asset/grid.css">
    <link rel="stylesheet"  href="asset/footer.css">
    <link rel="icon" href="https://img.icons8.com/external-icongeek26-linear-colour-icongeek26/40/000000/external-cart-essentials-icongeek26-linear-colour-icongeek26.png" type="image/.jpg">
</head>
<body>
    <?php 
    require "./api/start.php";
    $_SESSION['page']="cart";
    require "api/authenticate.php";
    if(!Authenticate()){
        $_SESSION['error']="Vui lòng đăng nhập để vào giỏ hàng";
        header("Location: ./login.php");
        exit;
    }   
    include "header.php";
    ?>
    <div class="container-cart grid wide">
         <h2 class="header-text">
             GIỎ HÀNG CỦA BẠN
         </h2>
    <?php if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0){ ?>
        <div class="row name-table-container ">
            <div class="tb-name-product c-4 m-4 l-4 l-o-2 col"> TÊN SẢN PHẨM</div>
            <div class="l-2 c-2 m-2 col" >SỐ LƯỢNG</div>
            <div class="l-2 c-2 m-2 col">GIÁ</div>
            <div class="l-2 c-2 m-2 col" >THÀNH TIỀN</div>
        </div>



        <?php $sum=0; foreach ($_SESSION['cart'] as $key=> $item) {
                ?>
        <div class="row" id="<?php echo $key?>">
            <div class="product-img c-2 m-2 l-2">
                <img src="<?php echo $item['photo'] ?> "alt="">
            </div>
            <div class="c-4 m-4 l-4 col">
                <div class="product-name linked">
                <?php echo $item['name'] ?>
                <a href="./product.php?id=<?php echo $key?>"></a>
                </div>
                <div class="product-co-size-del">
                        <div class="color">Màu: Đen</div>
                        <div class="size">Size: 39</div>
                        <div key="<?php echo $key?>" id="delete" class="delete-button "> Xóa</div>
                </div>

            </div>
            <div class="quantity c-2 m-2 l-2 col">
                <input key="<?php echo $key?>" id="quantity" autocomplete="off"  type="number" min="0" max="10"  value="<?php echo $item['quantity'] ?>" step="1">
            </div>
            <div class="one-price c-2 m-2 l-2 col"><?php echo number_format($item['price']) ?> ₫</div>
            <div class="sum-price c-2 m-2 l-2 col"><?php echo number_format($item['price']*$item['quantity']); $sum+=$item['price']*$item['quantity'] ?> ₫</div>
            <div class="barrier"> </div>
        </div>
       
        <?php } ?>
        


        <div class="sum-money"> 
            Tạm Tính: <span id="sum-money"><?php echo number_format($sum) ?> ₫</span>
        </div>
        <div class="payment"> 
            <div class="payment-item payment-item-inter">ĐẶT HÀNG QUỐC TẾ<br>(áp dụng cho quốc gia khác)</div>
            <div class="linked payment-item ">
                THANH TOÁN NGAY<br>(áp dụng cho Việt Nam)
                <a href="./checkout.php"></a>
            </div>
        </div>
        <?php }
        else {
            echo "<h1> Mua hàng đi nào bạn yêu !!! <333 </h1>";
        }
         ?>
    </div>
    
    <div class="list-img-ht">HASHTAG <SPAN>H&N</SPAN> ĐỂ CÓ CƠ HỘI XUẤT HIỆN CÙNG CHÚNG TÔI</div>
    <div class="list-img">
      <div class="list-img-item"> <img src="https://file.hstatic.net/1000230642/file/bitis-hashtag-1_dd55885fdc8947988d056ac6fa96c970.jpg" alt=""></div>
      <div class="list-img-item"> <img src="https://file.hstatic.net/1000230642/file/bitis-hashtag-2_1e0e40c09bdc48dfabaa83b6933f1595.jpg" alt=""></div>
      <div class="list-img-item"> <img src="https://file.hstatic.net/1000230642/file/bitis-hashtag-3_8fd12e162f104728a7dfaf537e199f19.jpg" alt=""></div>
      <div class="list-img-item"> <img src="https://file.hstatic.net/1000230642/file/bitis-hashtag-4_893a397f4ab5447a8ec48532f68e7c3e.jpg" alt=""></div>
      <div class="list-img-item"> <img src="https://file.hstatic.net/1000230642/file/bitis-hashtag-5_75a4043ef4174ff2a9e93f2fdfa69acd.jpg" alt=""></div>
      <div class="list-img-item"> <img src="https://file.hstatic.net/1000230642/file/bitis-hashtag-8_ff76dcac33fc48cc86b81bdc96032085.jpg" alt=""></div>
      <div class="list-img-item"> <img src="https://file.hstatic.net/1000230642/file/bitis-hashtag-6_127786003ab84450b6cbfbe4d73d85ea.jpg" alt=""></div>
      <div class="list-img-item"> <img src="https://file.hstatic.net/1000230642/file/bitis-hashtag-7_d1c84d44fdef4846adcc74e17a5526ad.jpg" alt=""></div>
    </div>
    <?php require "footer.php"?>
    <script src="js/cart.js"></script>
</body>
</html>