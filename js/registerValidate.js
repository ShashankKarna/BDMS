
const userName = document.getElementById('userName');
const email = document.getElementById('useremail');
const contact= document.getElementById('usercontact');
const password= document.getElementById('userpassword');
const repassword= document.getElementById('repassword');

// for name
userName.addEventListener('blur', ()=>{
    let regex = /^[a-zA-z]*$/;
    let str = userName.value;
    if(regex.test(str)){
        document.getElementById('errName').style.display = "none";
    }
    else{
        document.getElementById('errName').style.display = "block";

    }
});

// for email
email.addEventListener('blur', ()=>{
    let regex = /^([_\-\.0-9a-zA-z]+)@([_\-\.0-9a-zA-z]+)\.([a-zA-Z]){2,7}$/;
    let str = email.value;
    if(regex.test(str)){
        document.getElementById('errEmail').style.display ="none";
    }else{
        document.getElementById('errEmail').style.display ="block";

    }
});

contact.addEventListener('blur', ()=>{
    let regex = /^([0-9]){10}$/;
    let str = contact.value;
    if(regex.test(str)){
        document.getElementById('errPhone').style.display = "none";
    }
    else{
        document.getElementById('errPhone').style.display = "block";

    }
});

//for password 
password.addEventListener('blur', ()=>{
    let passStr = password.value;
    if(passStr.length<8){
        document.getElementById('errPassword').style.display = "block";
    }
    else{
        document.getElementById('errPassword').style.display = "none";

    }
});

// for re password
repassword.addEventListener('blur', ()=>{
    let repasswordStr = repassword.value;
    let passStr = password.value;
    if(repasswordStr == passStr){
        document.getElementById('errRePassword').style.display = "none";
    }
    else{
        document.getElementById('errRePassword').style.display = "block";

    
    }
});


