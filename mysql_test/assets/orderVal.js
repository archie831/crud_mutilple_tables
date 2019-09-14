let ordernoErr = document.getElementById("ordernoErr");
let quanErr = document.getElementById("quanErr");
let submit = document.getElementById("submit");

document.getElementById("oNo").addEventListener("keyup",function(){
    validateOrderNo();
});

document.getElementById("oQuantity").addEventListener("keyup",function(){
    validateQuantity();
});

function validateOrderNo(){
    let order = document.getElementById("oNo").value;

    if(order.length > 4 || order < 1001){
        ordernoErr.innerHTML = "Please enter 4 digit numbers only from 1001 - 9999.";
        submit.disabled = true;
    }else{
        ordernoErr.innerHTML = "";
        success();
    }
}

function validateQuantity(){
    let order = document.getElementById("oQuantity").value;

    if(order > 999){
        quanErr.innerHTML = "Order quantity is only limited to 999.";
        submit.disabled = true;
    }else{
        quanErr.innerHTML = "";
        success();
    }
}

function success(){
    submit.disabled = false;
}