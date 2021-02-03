/* 
Validate apartment details via inputs
*/

//price validation
function validatePrice(inputTxt){
    const price = document.getElementById("price");
    const message = document.getElementById("p1");
    var price_regex = /^\d+(,\d{3})*(\.\d{1,2})?$/;
    if(inputTxt.value !=""){
        if(inputTxt.value.match(price_regex)){
            message.textContent = ""; //green
        }
        else{
            message.textContent = "Invalid input!"; //red
            price.focus();
        }
    }
    else{
        message.textContent = "required!";
        price.focus();
    }
}

//validate address
function validateLocation(inputTxt){
    const location = document.getElementById("loc");
    const message = document.getElementById("p2");
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

//brief description validation
function validateBrief(inputTxt){
    const brief = document.getElementById("desc");
    const message = document.getElementById("p3");
    if(inputTxt.value ==""){
        message.textContent = "required!";
        brief.focus();
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


