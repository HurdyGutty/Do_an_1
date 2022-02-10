var item=document.querySelector("#add-to-cart")
var tagQuantity=document.querySelector(".cart_text");
var countQuantity=Number(tagQuantity.textContent);
item.onclick= async (e)=>{
    e.preventDefault();
    await fetch(item.attributes.datalink.value)
    .then(response => response.json())
    .then(data => {
        if(data==0){
            $.notify.defaults({ className: "error" });
            $.notify("Vui lòng đặt số lượng ít hơn 10 mỗi sản phẩm",{position:"right bottom" });
        }
        else{
            countQuantity++;
            tagQuantity.textContent=countQuantity;
            $.notify.defaults({ className: "success" });
            $.notify("Đã thêm vào giỏ hàng",{position:"right bottom" });
        }
        
    });
    
}
