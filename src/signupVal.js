function formVal(){
    var email = document.forms.signUpForm.email.value;
    var uemail = document.getElementById("uemail");
    var password = document.forms.signUpForm.password.value;
    var upass = document.getElementById("upass");
    var repass = document.forms.signUpForm.repass.value;
    var urepass = document.getElementById("urepass");

    if(emailVal(email, uemail)){
     if(passVal(password, upass)){
           if(confirmPass(repass, urepass, password)){

           }
    }
}
    else
    return false;
}

function emailVal(email, uemail){
   var reg= /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
   if(reg.test(email) == false){
       uemail.innerHTML = "<p style=\"color:red; font-size=14px;\"> Invalid Email </p>";
       return false;
   }
   else
    return true;
}

function passVal(password, upass){
    var reg=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{4,15}$/;
    if(reg.test(password) == false){
        upass.innerHTML = "<p style=\"color:red; font-size=14px;\"> Password should be between 8 to 15 with atleast one special, one upper, one lower and one numeric</p>";
        return false;
    }
    else
     return true;
}

function confirmPass(repass, urepass, password){
    if(repass != password){
        urepass.innerHTML = "<p style=\"color:red; font-size=14px;\"> Passwords don't match </p>";
        return false;
    }
    else
    return true;
}