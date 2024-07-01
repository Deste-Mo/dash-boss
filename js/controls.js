const formulaire2 = document.getElementById("modal-body");
const inputs = document.querySelectorAll(".form-control");
const spans = document.querySelectorAll(".erreur");
var cin, nom, prenom, telephone, email;

function controlNom(value, controls, span, message){
    if(!value.match(/^[a-zA-Z]*$/) || value.length < 3 && value !="" ){
        controls.classList.add("error"); 
        span.textContent=message;
        nom=null;
    }else{
        controls.classList.remove("error");
        span.textContent="" ; nom=value; 
    }
}
function controlPrenom(value, controls, span, message){
    if(!value.match(/^[a-zA-Z\s]*$/) || value.length < 3 && value !="" ){
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
    if(!value.match(/^[0-9]*$/) || value.length !=12 && value !="" ){
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
    if(!value.match(/^[0-9]*$/) || value.length !=10 && value !="" ){
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
    if(!value.match(/^[\w_-]+@[\w-]+\.[a-z]{2,4}$/i) && value !="" ){
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
                controlCin(e.target.value, inputs[i], spans[i], "Le CIN doit etre 12 chiffre uniquement");
                break;

            case "nom":
                controlNom(e.target.value, inputs[i], spans[i], "Le nom doit etre au moins 3 caractere et ne doit pas contenir des chiffres");
                break;

            case "prenom":
                controlPrenom(e.target.value, inputs[i], spans[i], "Le prenom ne doit pas contenir des chiffre et au mois 3 caractere");
                break;

            case "telephone":
                controlTelephone(e.target.value, inputs[i], spans[i], "Le numero doit etre 10 chifre uniquement");
                break;

            case "email":
                controlEmail(e.target.value, inputs[i], spans[i], "L'email est invalide");
                break;

            default:
                break;
        }
    });
}

formulaire2.addEventListener("submit", (e) => {
    if(cin == null || nom == null || telephone == null || email == null){
        e.preventDefault();
        alert("Veuillez respecter le consigne du formulaire");
    }
});
