function displayMsg(){
    const contactName = document.forms["contactForm"]["contact-name"].value;
    const contactEmail = document.forms["contactForm"]["contact-email"].value;
    const contactDesc = document.forms["contactForm"]["contact-desc"].value;

    console.log(contactName+contactEmail+contactDesc)
    if(contactName == "" && contactEmail == "" && contactDesc ==""){
        let failure = document.getElementById("failure");
        failure.style.display = "flex";
        failure.style.bottom = "3rem";

        return false;
    }else{
        let success = document.getElementById("success");
        success.style.display = "flex"; 
        return true;

    }



    Email.send({
        Host : "smtp.yourisp.com",
        Username : "sanjaykhadgi9861@gmail.com",
        Password : "123",
        To : 'sanjaykhadgi9861@gmail.com',
        From : "${contactEmail}",
        Subject : "Comments",
        Body : "${contactDesc}"
    }).then(
      message => alert(message)
    );
}
