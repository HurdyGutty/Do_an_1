var input=document.querySelectorAll("#quantity")
var dltButton=document.querySelectorAll("#delete")
var tagQuantity=document.querySelector(".cart_text");

dltButton.forEach(button=>{
    button.onclick=(e)=>{
        updateProductCart(e.target.attributes.key.value,0);
        document.querySelector(`input[key="${e.target.attributes.key.value}"]`).value=0;
        
    }
})

for (let i=0;i<input.length;i++){
    input[i].onchange=(e)=>{
        let key=e.target.attributes.key.value;
        e.target.value=Math.floor(e.target.value);
        let quantity=e.target.value;
        if(quantity > 10|| quantity.length > 3 ) {
            console.log(quantity)
            e.target.value=10;
            return;
        }
        if(quantity < 0){
            e.target.value=0;
            quantity=0;
        }
        updateProductCart(key,quantity);
        console.log(key);
        console.log(e.target);
    }
}
//console.log(input)


async function updateProductCart(key,quantity){
    await fetch("./api/updateproduct.php",{
                headers: {
                        'Accept': 'application/json, text/plain, */*',
                        'Content-Type': 'application/x-www-form-urlencoded'
                },
                method: "POST",
                body: `id=${key}&quantity=${quantity}`
        })
        .then(()=>{
            var par=document.getElementById(key);
            var length=par.childElementCount;
            let price=formattonumber(par.children[length-3].textContent);
            par.children[length-2].textContent=new Intl.NumberFormat().format(price*quantity)+" ₫";
            if(quantity==0){
                par.style.display="none";
            }
            updatesumMoney();
        })
    updateCartHeader();
}



function formattonumber(str){
    str=str.split(" ")[0];
    let res=0;
    var a=str.split(",");
    a.forEach(element => {
        res=res*1000+Number(element);
    });
    let res2=0;
    a=str.split(".");
    a.forEach(element => {
        res2=res2*1000+Number(element);
    });
    if(isNaN(res2)) 
        return res;
    return res2;
}


function updatesumMoney(){
    var summoney=document.querySelector("#sum-money")
    let res=0;
    var sumprice=document.querySelectorAll(".sum-price")
    sumprice.forEach(i=>{
       res+= formattonumber(i.textContent);
    })
    if(res==0) location.reload();
    summoney.textContent=new Intl.NumberFormat().format(res)+" ₫";
}

function updateCartHeader(){
    let res=0;
    input.forEach(e=>{

        console.log(e.style.display)
        res+=Number(e.value);
    })
    tagQuantity.textContent=res;
    console.log(input,"");
}