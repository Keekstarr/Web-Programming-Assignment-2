let fnameInput = document.querySelector("#fname");
let lnameInput = document.querySelector("#lname");
let emailInput = document.querySelector("#email");
let passwordInput = document.querySelector('#pass');
let retypePasswordInput = document.querySelector('#pass2');


//First name error paraghaph
let fnameError = document.createElement('p');
fnameError.style.color = "red";
document.querySelectorAll(".textfield")[0].append(fnameError);
fnameError.style.marginTop = "8px";
//Last name error paraghaph
let lnameError = document.createElement('p');
lnameError.style.color = "red";
document.querySelectorAll(".textfield")[1].append(lnameError);
lnameError.style.marginTop = "8px";
//email error paraghaph
let emailError = document.createElement('p');
emailError.style.color = "red";
document.querySelectorAll(".textfield")[2].append(emailError);
emailError.style.marginTop = "8px";
//password error paraghaph
let passwordError = document.createElement('p');
passwordError.style.color = "red";
document.querySelectorAll(".textfield")[3].append(passwordError);
passwordError.style.marginTop = "8px";
//retype-password error paraghaph
let retypePasswordError = document.createElement('p');
retypePasswordError.style.color = "red";
document.querySelectorAll(".textfield")[4].append(retypePasswordError);
retypePasswordError.style.marginTop = "8px";



//define a global variables
let defaultMSg = "";

//method to validate email
let emailErrorMsg = "X Email format should be xyz@xyz.xyz.";
let emailEmpty = 
    "X Email address should be non-empty";
function vaildateEmail(){
    let email = emailInput.value; 
    let regexp = /^\S+@\S+\.\S+$/; 
    if(regexp.test(email)) { 
        emailInput.style.border = "1px solid gainsboro";
        emailInput.style.borderRadius = "4px";
        error = defaultMSg;
    }
    else if (email == "") {
        emailInput.style.border = "2px solid red";
        error = emailEmpty;
    }
    else {
        emailInput.style.border = "2px solid red";
        error = emailErrorMsg;
    }
        return error;
}

//method to validate First name
let nameErrorMsg = "X You should fill in this field";

function vaildateFname(){
    let fname = fnameInput.value; 

    if (fname == "") {
        fnameInput.style.border = "2px solid red";
        error = nameErrorMsg;
    } else {
        fnameInput.style.border = "1px solid gainsboro";
        error = defaultMSg;
    }
        return error;
}

//method to validate Last name
function vaildateLname(){
    let lname = lnameInput.value; 

    if (lname == "") {
        lnameInput.style.border = "2px solid red";
        error = nameErrorMsg;
    } else {
        lnameInput.style.border = "1px solid gainsboro";
        error = defaultMSg;
    }
        return error;
}

//method to validate password
let passwordEmpty = "X Password should not be empty."
let passwordErrorMsg = 
    "X Password should be at least 8 characters."
function validatePassword() {
    let password = passwordInput.value;
    let regexp = /^.{8,}$/;
    if (regexp.test(password)) {
        passwordInput.style.border = "2px solid gainsboro";
        passwordInput.style.borderRadius = "4px";
        error = defaultMSg;
    }
    else if(password == "") {
        passwordInput.style.border = "2px solid red";
        error = passwordEmpty;
    }
    else {
        passwordInput.style.border = "2px solid red";
        error = passwordErrorMsg;
    }
    return error;
}

//method to validate retype-password
let retypePasswordEmpty = "X Please retype password."
let retypePasswordErrorMsg = "X Password does not match."
function validateRetypePassword() {
    let passwordRetype = retypePasswordInput.value;
    let password = passwordInput.value;

    if (password === "" && passwordRetype === "") {
        retypePasswordInput.style.border = "2px solid red";
        error = retypePasswordEmpty; 
    } 
    else if (passwordRetype === "") {
        retypePasswordInput.style.border = "2px solid red";
        error = retypePasswordEmpty; 
    } 
    else if (passwordRetype !== password) {
        retypePasswordInput.style.border = "2px solid red";
        error = retypePasswordErrorMsg;
    } 
    else {
        retypePasswordInput.style.border = "2px solid gainsboro";
        retypePasswordInput.style.borderRadius = "4px";
        error = ""; // Passwords match
    }
    return error;
}





function validate(){
    let valid = true;//global validation 

    //email onsubmit
    if(vaildateEmail() !== defaultMSg) {
        emailError.textContent = vaildateEmail();
        valid = false;
    } 

    //First name onsubmit
    if(vaildateFname() !== defaultMSg) {
        fnameError.textContent = vaildateFname();
        valid = false;
    } 

    //Last name onsubmit
    if(vaildateLname() !== defaultMSg) {
        lnameError.textContent = vaildateLname();
        valid = false;
    } 

    //password onsubmit
    if(validatePassword() !== defaultMSg) {
        passwordError.textContent = validatePassword();
        valid = false;
    }

    //retype-password onsubmit
    if(validateRetypePassword() !== defaultMSg) {
        retypePasswordError.textContent = validateRetypePassword();
        valid = false;
    }

    return valid;
};

// event listner to empty the text input
const inputs = document.querySelectorAll("input");
function reserFormError() {
    emailError.textContent = defaultMSg;
    fnameError.textContent = defaultMSg;
    lnameError.textContent = defaultMSg;
    passwordError.textContent = defaultMSg;
    retypePasswordError.textContent = defaultMSg;
    for (let i = 0; i < inputs.length; i++) {
        inputs[i].style.border = "1px solid gainsboro";
        inputs[i].style.borderRadius = "4px";
    }
}
document.querySelector('form').addEventListener("reset",reserFormError);

//add event listner to the email 
emailInput.addEventListener("blur",()=>{ // arrow function
    let error = vaildateEmail();
    if(error == defaultMSg) {
        emailError.textContent = "";
    }
    else if(error == emailEmpty) {
        emailError.textContent = emailEmpty;
    }
    else {
        emailError.textContent = emailErrorMsg;
    }
    });

emailInput.addEventListener("input",()=>{ 
        emailError.textContent = defaultMSg;
    });

//add event listner to the First Name 
fnameInput.addEventListener("blur",()=>{ // arrow function
    let error = vaildateFname();

    if(error == defaultMSg) {
        fnameError.textContent = "";
    }
    else if (error == nameErrorMsg) {
        fnameError.textContent = nameErrorMsg;
    }

    });
    
fnameInput.addEventListener("input",()=>{ 
        fnameError.textContent = defaultMSg;
    });

    //add event listner to the Last Name 
lnameInput.addEventListener("blur",()=>{ // arrow function
    let error = vaildateLname();

    if(error == defaultMSg) {
        lnameError.textContent = "";
    }
    else if (error == nameErrorMsg) {
        lnameError.textContent = nameErrorMsg;
    }

    });
    
lnameInput.addEventListener("input",()=>{ 
        lnameError.textContent = defaultMSg;
    });

    //add event listner to the password
passwordInput.addEventListener("blur",()=>{ // arrow function
    let error = validatePassword();
    if(error == defaultMSg) {
        passwordError.textContent = "";
    }
    else if(error == passwordEmpty ) {
        passwordError.textContent = passwordEmpty;
    }
    else {
        passwordError.textContent = passwordErrorMsg;
    }
    });
passwordInput.addEventListener("input",()=>{ 
        passwordError.textContent = defaultMSg;
    });

//add event listner to the retype-password
retypePasswordInput.addEventListener("blur",()=>{ // arrow function
    let error = validateRetypePassword();
    if (error === defaultMSg){
        retypePasswordError.textContent = "";
    }
    else if(error === retypePasswordErrorMsg) {
        retypePasswordError.textContent = retypePasswordErrorMsg;
    }
    else if(error === retypePasswordEmpty ) {
        retypePasswordError.textContent = retypePasswordEmpty;
    }
    })

    retypePasswordInput.addEventListener("input",() => { 
        retypePasswordError.textContent = defaultMSg;
    })

    