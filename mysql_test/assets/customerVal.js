let custErrr = document.getElementById("custErr");
let addressErr = document.getElementById("addressErr");
let submit = document.getElementById("submit");

document.getElementById("cName").addEventListener("keyup",function(){
    validateCust();
});

document.getElementById("address").addEventListener("keyup",function(){
    validateAddress();
});

function validateCust(){
    if(form.cName.value.trim() == "" ){
        custErr.innerHTML = "Please enter customer name";
        submit.disabled = true;
    }else{
        custErr.innerHTML = "";
        success();
    }
}

function validateAddress(){
    if(form.address.value.trim() == "" ){
        addressErr.innerHTML = "Please enter your User name";
        submit.disabled = true;
    }else{
        addressErr.innerHTML = "";
        success();
    }
}

function success(){
    submit.disabled = false;
}