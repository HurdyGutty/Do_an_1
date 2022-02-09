<?php 
echo "<script> const id_pro=$_GET[id];</script>";
$sql="SELECT AVG(rating) as avgR,COUNT(rating) as countR
FROM `products_rating`
WHERE id_product='$idQuery'";
$resRating=mysqli_query($connect,$sql);
$resRating=mysqli_fetch_assoc($resRating);
echo "<script> window.onload=()=>{
    RateDisplayProduct($resRating[avgR])
}</script>";

$sql="SELECT products_rating.*,cli_list.name,cli_list.id
FROM `products_rating`
JOIN cli_list ON cli_list.id=products_rating.id_customer
WHERE id_product='$idQuery'";
$resReviews=mysqli_query($connect,$sql);
$resReviews=mysqli_fetch_all($resReviews,MYSQLI_ASSOC);
foreach($resReviews as $key=>$item){
    if($item['id']==$id_customer){
        $temp=$resReviews[0];
        $resReviews[0]=$item;
        $resReviews[$key]=$temp;
        echo"<script> window.onload=()=>{
                sucessRating();
                RateDisplayProduct($resRating[avgR]);
                }</script>"; 
    }
}
?>
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Star Rating</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
        <link rel="stylesheet" href="./asset/prodoct_rating.css">
    </head>
    <body>
        <div class="avr_rating">
                    <label class="fas fa-star  display-rating"></label>
                    <label class="fas fa-star  display-rating"></label>
                    <label class="fas fa-star  display-rating"></label>
                    <label class="fas fa-star  display-rating"></label>
                    <label class="fas fa-star  display-rating"></label>
        </div>
        <div class="total-ratings"><?php echo round($resRating['avgR'],2).'* , '.$resRating['countR']?> lượt đánh giá</div>
      <div class="rating-message"></div>
      <div class="rating__wrapper">
        <div class="rating__container">
            <div class="rating-post">
                <div class="rating-text">Thanks for rating us!</div>
                <div class="rating-edit">EDIT</div>
            </div>
            <div class="star-widget">
                <input class="rating-input"  type="radio" value="5" name="rate" id="rate-5">
                <label for="rate-5" class="fas fa-star"></label>
                <input class="rating-input" type="radio"  value="4" name="rate" id="rate-4">
                <label for="rate-4" class="fas fa-star"></label>
                <input class="rating-input" type="radio"  value="3"name="rate" id="rate-3">
                <label for="rate-3" class="fas fa-star"></label>
                <input class="rating-input" type="radio"  value="2"name="rate" id="rate-2">
                <label for="rate-2" class="fas fa-star"></label>
                <input class="rating-input" type="radio"  value="1"name="rate" id="rate-1">
                <label for="rate-1" class="fas fa-star"></label>
                <form id="rating-form" action="#">
                    <header class="rating-header"></header>
                    <div class="textarea">
                        <textarea cols="30" id="rate-comment" placeholder="Describe your experience....." maxlength="500"></textarea>
                    </div>
                    <div class="rating-btn">
                        <button id="rating-btn"type="submit">Post</button>
                    </div> 
                </form>
            </div>
        </div>
      </div>
      <div class="reviews">REVIEWS</div>
      <div class="border-rv"></div>
      <div class="wrapper-reviews">
          <?php foreach($resReviews as $item){?>
                <div class="rv-one">
                      <div class="rv-top">

                            <div class="user-rv"><?php echo $item['name']?></div>
                            <div class="rating-rv star-<?php echo $item['rating']?>">
                                  <label class="fas fa-star  rating-rv-star"></label>
                                  <label class="fas fa-star  rating-rv-star"></label>
                                  <label class="fas fa-star  rating-rv-star"></label>
                                  <label class="fas fa-star  rating-rv-star"></label>
                                  <label class="fas fa-star  rating-rv-star"></label>
                            </div>
                      </div>
                      <div class="rv-content"><?php echo $item['comment']?></div>
                </div>
                
            <?php } ?>
          
      </div>
        <script src="./js/product_rating.js"></script>
    </body>