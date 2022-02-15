const MaxProductsOnePage=8;
if($(".result_section").children.length <  MaxProductsOnePage) 
    $(".load-more").style.display="none";
const displayingListProducts=$(".result_section");
$(".load-more").onclick=()=>{
    fetch("./api/loadmore/search.php",{
        headers: {
                'Accept': 'application/json, text/plain, */*',
                'Content-Type': 'application/x-www-form-urlencoded'
        },
        method: "POST",
        body: `search=${search}&offset=${displayingListProducts.children.length}`
    })
    .then(i=>i.json())
    .then(data=>{
     console.log(data)
     var html=``;
     var Nowindex=displayingListProducts.children.length;
     for (let i=0;i<data.length;i++){
        html+=`
        <div class="section-box">
                <a href="./product.php?id=${data[i].id}"class="search-link">
                    <span class="number"> ${Nowindex+i+1} </span>
                    <div class="item_search">
                        <div class="item-pic">
                            <img src="${data[i].photo}" alt="">
                        </div>
                        <div class="item-text">${data[i].name}</div>
                    </div>
                </a>
            </div>
        `
     }
     $(".result_section").innerHTML+=html;
    if(data.length<MaxProductsOnePage) $(".load-more").style.display="none";
    })
}
