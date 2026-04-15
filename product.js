let price=500;
// console.log(price);
let quan=document.getElementById("quantity")
let total=document.getElementById("total")

quan.addEventListener("input",function(){
    let productQuantity=quan.value 

    if(productQuantity<0){
        productQuantity=0
        quan.value=0
    }

    let result=price*productQuantity
    total.value=result

    if(result>1000){
        alert("Ypu are now eligible for a gift cupon")
    }

})



