/*
* Program validates admin profile details
*/

// old username validation
function validateOldUserrName(inputTxt){
    const username = document.getElementById("username");
    var uname_regex = /^[a-z0-9_-]{2,}$/;
    const message = document.getElementById("p1");
    if(inputTxt.value !=""){
        if(inputTxt.value.match(uname_regex)){
            message.textContent = ""; //green
        }
        else{
            message.textContent = "Invalid input!"; //red
            username.focus();
        }
    }
    else{
        message.textContent = "required!";
        username.focus();
    }
}

// new username validation
function validateNewUserrName(inputTxt){
    const username1 = document.getElementById("username1");
    var uname_regex = /^[a-z0-9_-]{2,}$/;
    const message = document.getElementById("p2");
    if(inputTxt.value !=""){
        if(inputTxt.value.match(uname_regex)){
            message.textContent = ""; //green
        }
        else{
            message.textContent = "Invalid input!"; //red
            username1.focus();
        }
    }
    else{
        message.textContent = "required!";
        username1.focus();
    }
}

// old password validation
function validateOldPassword(inputTxt){
    const password = document.getElementById("pass");
    const message = document.getElementById("p3");
    var pass_regex  = /^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%&]).*$/;
    if(inputTxt.value !=""){
        if(inputTxt.value.match(pass_regex)){
            message.textContent = ""; //green
        }
        else{
            message.textContent = "Invalid input!"; //red
            password.focus();
        }
    }
    else{
        message.textContent = "required!";
        password.focus();
    }
    
}

//new password validation
function validateNewPassword(inputTxt){
    const password1 = document.getElementById("pass1");
    const message = document.getElementById("p4");
    var pass_regex  = /^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%&]).*$/;
    if(inputTxt.value !=""){
        if(inputTxt.value.match(pass_regex)){
            message.textContent = ""; //green
        }
        else{
            message.textContent = "Invalid input!"; //red
            password1.focus();
        }
    }
    else{
        message.textContent = "required!";
        password1.focus();
    }
    
}

// repeat new password validation
function validateConfirmPassword(inputTxt){
    const password = document.getElementById("pass1");
    const password1 = document.getElementById("pass2");
    if(inputTxt.value !=""){
        if(password1.value!=password.value){
            //red
            password1.setCustomValidity("Passwords do not match");
        }
        else{
            password1.setCustomValidity("");
        }
    }
    
}