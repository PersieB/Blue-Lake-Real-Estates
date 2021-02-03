/*
* Program Validates agent profile input
*/

// first name validation
function validateFirstName(inputTxt){
    const first = document.getElementById("first");
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
        first.focus();
    }
}

// last name validation
function validateLastName(inputTxt){
    const surname = document.getElementById("last");
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
        surname.focus();
    }
}

// email validation
function validateEmail(inputTxt){
    const email = document.getElementById("email");
    const message = document.getElementById("p3");
    var email_regex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    if(inputTxt.value !=""){
        if(inputTxt.value.match(email_regex)){
            message.textContent = ""; //green
        }
        else{
            message.textContent = "Invalid input!"; //red
            email.focus();
        }
    }
    else{
        message.textContent = "required!";
        email.focus();
    }
}

//phone number validation
function validatePhone(inputTxt){
    const phone = document.getElementById("phone");
    const message = document.getElementById("p4");
    var phone_regex = /^\+?([0-9]{1,3})\)?([0-9 ]{9,14})$/;
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
        phone.focus();
    }   
}

//Address location
function validateLocation(inputTxt){
    const location = document.getElementById("loc");
    const message = document.getElementById("p5");
    var address_regex = /^[a-zA-Z0-9\s,.'-]{2,}$/;
    if(inputTxt.value !=""){
        if(inputTxt.value.match(address_regex)){
            message.textContent = ""; //green
        }
        else{
            message.textContent = "Invalid input!"; //red
            location.focus();
        }
    }
    else{
        message.textContent = "required!";
        location.focus();
    }
}

//linkedin validation
function validateLinkedin(inputTxt){
    const location = document.getElementById("linkedin");
    const message = document.getElementById("p7");
    var address_regex = /http(s)?:\/\/([\w]+\.)?linkedin\.com\/in\/[A-z0-9_-]+\/?/;
    if(inputTxt.value !=""){
        if(inputTxt.value.match(address_regex)){
            message.textContent = ""; //green
        }
        else{
            message.textContent = "Invalid input!"; //red
            location.focus();
        }
    }
    else{
        message.textContent = "required!";
        location.focus();
    }
}

function fileValidation() { 
    var fileInput =  
        document.getElementById('file'); 
      
    var filePath = fileInput.value; 
  
    // Allowing file type 
    var allowedExtensions =   /(\.jpg|\.jpeg|\.png)$/i; 
      
    if (!allowedExtensions.exec(filePath)) { 
        alert('Invalid file type'); 
        fileInput.value = ''; 
        return false; 
    }  

} 

