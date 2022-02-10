const $$=document.querySelectorAll.bind(document)
const btn = $1("#rating-btn");
const post = $1(".rating-post");
const widget = $1(".star-widget");
const editBtn = $1(".rating-edit")
const warning=$1(".rating-message")
var oldRate;
console.log(id_pro);
btn.onclick = (e)=>{
    e.preventDefault();
    let inputArr=$$(".rating-input");
    let rateIndex;
  for (let i=0;i<inputArr.length;i++){
      if(inputArr[i].checked) {
          rateIndex=inputArr[i].value;
          break;
      }
  }
    const text=$1("#rate-comment").value
    console.log(text)
    fetch("./api/product_rating.php",{
        headers: {
                'Accept': 'application/json, text/plain, */*',
                'Content-Type': 'application/x-www-form-urlencoded'
        },
        method: "POST",
        body: `rate=${rateIndex}&text=${text}&product=${id_pro}`
    })
    .then(i=>i.json())
    .then(mess=>{
        console.log(mess);
       if(mess==0) errorMessages(mess);
       else updateReviews({name:mess['name'],text,rateIndex});
       // bad experience, reloading when editing or creating review  
    })
    
}
// handle messages
function errorMessages(mess){
    if (mess==0) warning.textContent="Vui lòng đăng nhập để đánh giá";
     setTimeout(()=>{
        warning.textContent="";
    },3000);
 }

function sucessRating(){
    widget.style.display="none";
    post.style.display="block";
    editBtn.onclick = ()=>{
        widget.style.display="block";
        post.style.display="none";
    }
}
function RateDisplayProduct(index){
    var starArr=$$(".display-rating")
    for(let i=0;i<starArr.length;i++){
        if(i<Math.floor(index)) starArr[i].classList.remove("hidden-star")
        else starArr[i].classList.add("hidden-star")
    }
}
function updateReviews(infor){
        const firstRvName=$1(".user-rv")?.textContent
        const rv=$1(".rv-one")
        console.log(firstRvName)
        if(infor.name==firstRvName){
            var temp=rv.children[0].children[1].children;
            for (let i=0;i<5;i++)
                if (i < infor.rateIndex) temp[i].classList.remove("hidden-star")
                else  temp[i].classList.add("hidden-star")
            rv.children[1].textContent=infor.text
            updateNewRateIndex(1,infor.rateIndex);
        }
        else {
            const newRV=document.createElement("div")
            newRV.classList.add("rv-one")
            newRV.innerHTML=`
            <div class="rv-top">
                <div class="user-rv">${infor.name}</div>
                <div class="rating-rv star-${infor.rateIndex}?>">
                        <label class="fas fa-star  rating-rv-star"></label>
                        <label class="fas fa-star  rating-rv-star"></label>
                        <label class="fas fa-star  rating-rv-star"></label>
                        <label class="fas fa-star  rating-rv-star"></label>
                        <label class="fas fa-star  rating-rv-star"></label>
                </div>
            </div>
            <div class="rv-content">${infor.text}</div>
            `
            var temp=newRV.children[0].children[1].children;
            for (let i=0;i<5;i++)
                if (i < infor.rateIndex) temp[i].classList.remove("hidden-star")
                else  temp[i].classList.add("hidden-star")
            if(rv)
                rv.insertAdjacentElement("beforebegin", newRV);
            else $1(".wrapper-reviews").appendChild(newRV)
                updateNewRateIndex(0,infor.rateIndex);
        
            }
            sucessRating();

}

    // update product rate index in review and product
function updateNewRateIndex(type,rate){

    avgR=Number(avgR)
    countR=Number(countR)
    oldRate=Number(oldRate)
    rate=Number(rate)
    if(type==0){
        countR++;
        avgR=(avgR*countR+rate)/countR
    }
    else{
        avgR=(avgR*countR+rate-oldRate)/countR;
    }
    RateDisplayProduct(avgR)
    console.log(avgR)
    oldRate=rate;
    showRate=Math.round(avgR*Math.pow(10,2))/Math.pow(10,2);
    $1(".total-ratings").textContent=`${showRate}* , ${countR} lượt đánh giá`
}


// set up stars in REVIEWS
function setUpStartReviews(){
    for (let i=1;i<=5;i++){
        let temp=$$(`.star-${i}`);
        //  fill color
        temp.forEach(element => {
           for(let j=0;j<5;j++){
               if(j<i) element.children[j].classList.remove("hidden-star")
               else element.children[j].classList.add("hidden-star")
               
           }
       });
       console.log(temp);
    }
}
setUpStartReviews()
console.log(avgR,countR)