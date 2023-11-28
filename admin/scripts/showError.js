import getParameters from "./params"

function showError(){
    const error = getParameters('error');
    if (error == 1){
        document.querySelector("p#result").innerHTML = "<p class='text-danger'>Usuário ou senha inválidos</p>"
    }
}
window.onload = showError;