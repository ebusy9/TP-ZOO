window.addEventListener("DOMContentLoaded", () => {

    const usernameInput = document.querySelector("input[name=createUsername]")
    const loginInput = document.querySelector("input[name=createLogin]")
    const passwordInput = document.querySelector("input[name=createPassword]")
    const passwordConfirmationInput = document.querySelector("input[name=confirmPassword]")
    
    const listOfReqUsername = document.querySelector('#usernameRequirements');
    const listOfReqLogin = document.querySelector('#loginRequirements');
    const listOfReqPassword = document.querySelector('#pwdRequirements');
    
    
    
    const usernameRequirements = [
        {regex: /^.{2,12}$/, index: 0},
        {regex: /^[a-zA-Z0-9]+$/, index: 1}
    ]
    
    const loginRequirements = [
        {regex: /^.{6,12}$/, index: 0},
        {regex: /^[a-zA-Z0-9]+$/, index: 1}
    ]
    
    const passwordRequirements = [
        {regex: /^.{6,12}$/, index: 0},
        {regex: /[a-zA-Z]/, index: 1},
        {regex: /\d/, index: 2},
        {regex: /[!@#$%]/, index: 3}
    ]
    
    
    
    usernameInput.addEventListener("keyup", (event)=>{
        usernameRequirements.forEach(item => {
            let isValid = item.regex.test(event.target.value);
    
            if(isValid){
    
            } else {
    
            }
        })
    })
    
    
    
    
    usernameInput.addEventListener("focus", ()=>{
        console.log("success")
        listOfReqUsername.hidden = false;
    })
    
    
    usernameInput.addEventListener("blur", ()=>{
        listOfReqUsername.hidden = true;
    })
    
    
    
    loginInput.addEventListener("keyup", (event)=>{
        loginRequirements.forEach(item => {
            let isValid = item.regex.test(event.target.value);
    
            if(isValid){
    
            } else {
                
            }
        })
    })
    
    
    loginInput.addEventListener("focus", ()=>{
        listOfReqLogin.hidden = false;
    })
    
    
    loginInput.addEventListener("blur", ()=>{
        listOfReqLogin.hidden = true;
    })
    
    
    
    passwordInput.addEventListener("keyup", (event)=>{
        passwordRequirements.forEach(item => {
            let isValid = item.regex.test(event.target.value);
    
            if(isValid){
    
            } else {
                
            }
        })
    })
    
    
    passwordInput.addEventListener("focus", ()=>{
        listOfReqPassword.hidden = false;
    
    })
    
    
    passwordInput.addEventListener("blur", ()=>{
        listOfReqPassword.hidden = true;
    
    })
    })