
let usernameErr = document.getElementById("usernameErr");
let submit = document.getElementById("submit");

document.getElementById("userName").addEventListener("keyup",function(){
    validateUserName();
    // console.log(form.userName.value);
});

document.getElementById("conPw").addEventListener("keyup",function(){
    validatePw();
});

function validateUserName(){
    let userName = document.getElementById("userName").value;
    if(userName.trim() === ""){
        usernameErr.innerHTML = "Please enter your Username";
        submit.disabled = true;
    }else if(userName.trim().length < 3){
        usernameErr.innerHTML = "Username should be atleaset 3 characters";
        submit.disabled = true;
    }else{
        usernameErr.innerHTML = "";
        success();
    }
}

function validatePw(){
    let pw1 = document.getElementById("pw").value;
    let pw2 = document.getElementById("conPw").value;

    if(pw1 !== pw2){
        pwErr.innerHTML = "Password does not match.";
        submit.disabled = true;
    }else if( pw1.length < 8){
        pwErr.innerHTML = "Password must be atleast 8 characters.";
        submit.disabled = true;
    }else if(pw1.trim() == "" || pw2.trim() == ""){
        pwErr.innerHTML = "Spaces only are not allowed as password";
        submit.disabled = true;
    }else{
        pwErr.innerHTML = "";
        success();
    }
}

function success(){
    submit.disabled = false;
}
