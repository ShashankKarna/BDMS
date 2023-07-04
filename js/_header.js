const activePages = window.location.pathname;
        const navLink = document.querySelectorAll('nav a').
        forEach(link =>{
            if(link.href.includes(`${activePages}`)){
               link.classList.add('is-active');
            }
            else{
                console.log("unsuccess")
            }
        } )