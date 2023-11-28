import getParameters from './params'

function showResult(){
    let p = ["insert", "updated", "deleted", "error"]
    let result = {"insert": "Inserido com sucesso", "updated":"Atualizado com sucesso", "deleted":"Deletado com sucesso"}
    let error = {0: "ID não existente", 1: "Você não colocou todas as informações",
     2: "Nenhuma categoria foi selecionada", 
    3: "URLs inválidas", 4: "Número de episódios/capítulos não pode ser 0 ou menos", 5: "Senha inválida", 6: "Data não inserida", 7:"Valores menores que 10 são inválidos"}
    for (const param of p){
        let value = getParameters(param)
        if (value === 'true'){
            document.querySelector("h1#result").innerHTML = `<h1 class='text-success'>${result[param]}</h1>`
            break
        } else if (value === 'false'){
            document.querySelector("h1#result").innerHTML = `<h1 class='text-danger'>Não foi possível realizar a operação</h1>`
        } else if (param == 'error' && value != null){
            document.querySelector("h1#result").innerHTML = `<h1 class='text-danger'>${error[value]}</h1>`
            break
        }
    }
}
window.onload = showResult;