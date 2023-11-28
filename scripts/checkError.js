import getParameters from "./getParameter";

function showError(){
    let params = getParameters("error");
    let text;
    switch (params){
        case "1":
            text = "Preencha todos os campos";
            break;
        case "2":
            break;
    }
    if (params != null) document.querySelector("p#error").innerHTML = `<p class='text-danger'>${text}</p>`;
}

window.onload = showError