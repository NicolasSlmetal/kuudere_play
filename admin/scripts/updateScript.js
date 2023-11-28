function divVisible(visibility){
    document.querySelector("div#updatecat").style.display = visibility
}
function verify(){
    let select = document.querySelector("select#field").value;
    if (select == 'cat'){
        document.querySelector("input.value-update").disabled = true
        divVisible("block")
    } else {
        document.querySelector("input.value-update").disabled = false
        divVisible("none")
    }
    if (select == 'eps' || select == "chps"){
        document.querySelector("input.value-update").type = "number";
    } else {
        document.querySelector("input.value-update").type = "text";
    }
}

window.onload = divVisible("none")