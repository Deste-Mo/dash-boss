const formulaire2 = document.getElementById("formUsers");
const inputs = document.querySelectorAll(".form-control");
const spans = document.querySelectorAll(".erreur");
const btnConst = document.querySelectorAll(".closeModal");
var cin, nom, prenom, telephone, email;

const emailRegex = /^[\w-_.]+@[\w-]+\.[\w]{2,4}$/i;
const nameRegex = /^[a-zA-ZÀ-ÖØ-öø-ÿ\s]*$/;
const phoneRegex = /^(032|033|034|037|038|26132|26133|26134|26137|26138)[0-9]{7}$/

function controlNom(value, controls, span, message){
    if(!value.match(nameRegex) || value.length < 3 && value !="" ){
        controls.classList.add("error"); 
        span.textContent=message;
        nom=null;
    }else{
        controls.classList.remove("error");
        span.textContent="" ; nom=value; 
    }
}
function controlPrenom(value, controls, span, message){
    if(!value.match(/^[a-zA-ZÀ-ÖØ-öø-ÿ\s]*$/) || value.length < 3 && value !="" ){
        controls.classList.add("error");
        span.textContent=message;
        prenom=null;
    }else{
        controls.classList.remove("error");
        span.textContent="";
        prenom=value;
    }
}
function controlCin(value, controls, span, message){
    if((!value.match(/^[0-9]{5}[1-2][0-9]{6}$/) || value.length !=12) && value !="" ){
        controls.classList.add("error");
        span.textContent=message;
        cin=null;
    }else{
        controls.classList.remove("error");
        span.textContent="";
        cin=value;
    }
}
function controlTelephone(value, controls, span, message){
    if(!value.match(phoneRegex) && value !="" ){
        controls.classList.add("error");
        span.textContent=message;
        telephone=null;
    }else{
        controls.classList.remove("error");
        span.textContent="";
        telephone=value;
    }
}
function controlEmail(value, controls, span, message){
    if(!value.match(emailRegex) && value !="" ){
        controls.classList.add("error");
        span.textContent=message;
        email=null;
    }else{ 
        controls.classList.remove("error");
        span.textContent="";
        email=value; 
    } 
}

for(let i=0; i < inputs.length; i++){
    inputs[i].addEventListener("input", (e)=> {
        switch (e.target.name) {
            case "cin":
                controlCin(e.target.value, inputs[i], spans[i], "Le CIN doit etre 12 chiffre uniquement et le sixieme chiffre est soit 1 soit 2");
                console.log(inputs[i]);
                break;

            case "nom":
                controlNom(e.target.value, inputs[i], spans[i], "Le nom doit etre au moins 3 caractere et ne doit pas contenir des chiffres");
                console.log(inputs[i]);
                break;

            case "prenom":
                controlPrenom(e.target.value, inputs[i], spans[i], "Le prenom ne doit pas contenir des chiffre et au moins 3 caractere");
                console.log(inputs[i]);
                break;

            case "telephone":
                controlTelephone(e.target.value, inputs[i], spans[i], "Le numero doit etre 10 chifre uniquement et doit etre valide");
                console.log(inputs[i]);
                break;

            case "email":
                controlEmail(e.target.value, inputs[i], spans[i], "L'email est invalide");
                console.log(inputs[i]);
                break;

            default:
                break;
        }
    });
}

for(let i = 0; i < btnConst.length; i++){
    btnConst[i].addEventListener('click',function(){
        console.log("click");
        for(let i=0; i < spans.length; i++){
            inputs[i].classList.remove('error');
            spans[i].classList.remove('erreur');
            spans[i].textContent="";
            console.log(spans[i]);
    
        }
    })
}


formulaire2.addEventListener("submit", (e) => {
    if(cin == null || nom == null || telephone == null || email == null){
        e.preventDefault();
        alert("Veuillez respecter le consigne du formulaire");
    }
});
