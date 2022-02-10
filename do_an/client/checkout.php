<?php
include "./api/authenticate.php";
if(!Authenticate() ||!$_SESSION['cart'] ){
    header("Location: ./");
    exit;
}
$products=$_SESSION['cart'];
$sum=0;
$deli_fee=20000;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check-out</title>
    <link rel="stylesheet" href="asset/payment.css">
    <link rel="icon" href="https://img.icons8.com/external-icongeek26-linear-colour-icongeek26/40/000000/external-cart-essentials-icongeek26-linear-colour-icongeek26.png" type="image/.jpg">
</head>
<body>
    <div class="payment_container">
        <div class="payment_wrap-left">
            <div class="payment_con-left">
                <div class="payment_infor">
                    <div class="image-title linked">
                        <a href="./"></a>
                    </div>
                    <h5> CODES AND SHOES</h5>
                    <a href="./cart.php">Giỏ hàng</a>
                    <h3>Thông tin giao hàng</h3>
                    <div class="error">
                        <?php
                             if(isset($_SESSION['error_pay'])){
                                 $temp=$_SESSION['error_pay'];
                                 echo " <script> 
                                          window.onload=()=>{error(\"$temp\")}
                                      </script> ";
                                unset($_SESSION['error_pay']);
                             }
                        ?>
                    </div>
                    <form action="#" method="POST">
                        <input placeholder="Họ và tên " id="name" autocapitalize="off" spellcheck="false" class="field-input" size="50" type="text" >                      
                        <input placeholder="Số điện thoại"id="phone" class="no-spinners field-input"  type="number" >
                        <input placeholder="Địa chỉ" id="address" autocapitalize="off" spellcheck="false" class="field-input" size="50" type="text" >
                        <div class="select_address_container">
                            <div class="select_address">
                                <label class="field-label" for="select_pro"> Tỉnh / thành  </label>
                                <select name="shipping_province" id="select_pro">
                                    <option data-code="null" value="null"> Chọn tỉnh / thành </option>
                                </select>
                            </div>
                            

                           
                            <div class="select_address">
                                <label class="field-label" for="select_dis"> Quận / huyện  </label>
                                <select name="shipping_districts" id="select_dis">
                                    <option data-code="null" value="null"> Chọn quận / huyện </option>
                                </select>
                            </div>

                            <div class="select_address">
                                <label class="field-label" for="select_town"> Phường / xã  </label>
                                <select name="shipping_town" id="select_town">
                                    <option data-code="null" value="null">Chọn phường / xã </option>

                                </select>
                            </div>
                        </div>
                        <div class="form_bot">
                            <button id="sumbit_form" type="submit"> Hoàn tất thanh toán</button>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
        <div class="payment_wrap-right">
            <div class=" payment_con-right">
                <div class="payment_product">

              <?php    foreach($products as $item ) {    ?>
                   <div class="product">
                        <div class="product_left">
                            <div class="product_quan"><?php echo $item['quantity']?></div>
                            <img src="<?php echo $item['photo'];?>" alt="">
                        </div>
                        <div class="product_mid">
                          <?php echo $item['name'];?>
                        </div>
                        <div class="money product_right"><?php echo ($item['price']*$item['quantity']);?></div>

                   </div>
    
            <?php $sum+=$item['price']*$item['quantity']; }  ?>
                    <div class="border_pro"></div>
                    <div class="fx temp-price">
                        <div class="temp-price-text">Tạm tính</div>
                        <div class="money temp-price_pr"><?php echo $sum?></div>
                    </div>
                    <div class=" fx delivery_fee">
                        <div class="delivery_fee-text">Phí vận chuyển</div>
                        <div class="money delivery_fee_pr"><?php echo $deli_fee?></div>
                    </div>
                    <div class="border_pro"></div>
                    <div class=" fx sumprice">
                        <div class="sumprice-text">Tổng Tiền:</div>
                        <div class="money sumprice-pr"><?php echo $sum+$deli_fee?></div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <div class="payment_sucess_wrap hidden">
        <div class="payment_sucess">
            <h2>Thanh toán thành công!</h2>
            <h4 >
            <a href="./">Về trang chủ</a>
              </h4>
           
            <h4 >
            <a href="./account.php?view=list-order">Xem đơn hàng</a>
              </h4>
           

        </div>
    </div>
    <script src="./js/payment.js"></script>
</body>
</html>