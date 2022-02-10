const $$=document.querySelectorAll.bind(document)
const btn = $1("#rating-btn");
const post = $1(".rating-post");
const widget = $1(".star-widget");
const editBtn = $1(".rating-edit")
const warning=$1(".rating-message")
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
    console.log(rateIndex)
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
       if(mess!=1) errorMessages(mess);
       else location.reload();
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
        if(i<index) starArr[i].classList.remove("hidden-star")
        else starArr[i].classList.add("hidden-star")
    }
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