/*
Program validates user signup details
*/
/* First name validation - Required */
function validateFirstName(inputTxt){
    const first = document.getElementById("firstname");
    var fname_regex = /^[A-Za-z][A-Za-z\'\-]+([\ A-Za-z][A-Za-z\'\-]+)*/;
    const message = document.getElementById("p1");
    if(inputTxt.value !=""){
        if(inputTxt.value.match(fname_regex)){
            message.textContent = ""; //green
        }
        else{
            message.textContent = "Invalid input!"; //red
            first.focus();
        }
    }
    else{
        message.textContent = "required!";
    }
}

/* Last name - required */
function validateLastName(inputTxt){
    const surname = document.getElementById("surname");
    var sname_regex = /^[A-Za-z][A-Za-z\'\-]+([\ A-Za-z][A-Za-z\'\-]+)*/;
    const message = document.getElementById("p2");
    if(inputTxt.value !=""){
        if(inputTxt.value.match(sname_regex)){
            message.textContent = ""; //green
        }
        else{
            message.textContent = "Invalid input!"; //red
            surname.focus();
        }
    }
    else{
        message.textContent = "required!";
    }
}

/* User name - required */
function validateUserrName(inputTxt){
    const username = document.getElementById("username");
    var uname_regex = /^[a-z0-9_-]{5,15}$/;
    const message = document.getElementById("p3");
    if(inputTxt.value !=""){
        if(inputTxt.value.match(uname_regex)){
            message.textContent = ""; //green
        }
        else{
            message.textContent = "invalid output"; //red
            username.focus();
        }
    }
    else{
        message.textContent = "required!";
    }
}

/* email validation */
function validateEmail(inputTxt){
    const email = document.getElementById("email");
    const message = document.getElementById("p4");
    //var email_regex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    var email_regex = /([a-zA-Z0-9]+)([\.{1}])?([a-zA-Z0-9]+)\@gmail([\.])com/;
    // for gmail only /^[\w-\.]+@(gmail.com)$/
    if(inputTxt.value !=""){
        if(inputTxt.value.match(email_regex)){
            message.textContent = ""; //green
        }
        else{
            message.textContent = "not a valid gmail!"; //red
            email.focus();
        }
    }
    else{
        message.textContent = "required!";
    }
}
/* Phone number validation */
function validatePhone(inputTxt){
    const phone = document.getElementById("phone");
    const message = document.getElementById("p5");
    var phone_regex = /^\+?([0-9]{1,3})\)?([\d ]{9,15})$/;
    if(inputTxt.value !=""){
        if(inputTxt.value.match(phone_regex)){
            message.textContent = ""; //green
        }
        else{
            message.textContent = "Invalid input!"; //red
            phone.focus();
        }
    }
    else{
        message.textContent = "required!";
    }
    
}
/* Password validation */
function validatePassword(inputTxt){
    const password = document.getElementById("password");
    const message = document.getElementById("p6");
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
    }
    
}

/* Repeat Password validation */
function validatePassword1(inputTxt){
    const password = document.getElementById("password");
    const password1 = document.getElementById("password1");
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


