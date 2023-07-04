function validate(){
    const email = document.forms["myForm"]["email"].value;
    const password = document.forms["myForm"]["password"].value;
    if(email == "" && password == ""){
        let errEmail = document.getElementById("errEmail");
        let errPassword = document.getElementById("errPassword");

        errEmail.style.display = "block";
        errPassword.style.display = "block";
        return false;
    }
    else if(email == ""){
        errEmail.style.display = "block";
        errPassword.style.display = "none";
        return false;

    }
    else if(password == ""){
        errEmail.style.display = "none";
        errPassword.style.display = "block";
        return false;
    }
}