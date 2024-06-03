function resetSearch(){ 
    document.querySelector('form#search').reset();
    
    document.querySelector('input#year').disabled = true
    document.querySelector('input#year').value = document.querySelector('input#year').min
    document.querySelector('p#year').innerText = "Ano"
}

function setRangeVisible(radio){
    const range = document.querySelector("input#year")
    const labelYear = document.querySelector("p#year")
    lastChecked = radio
    range.disabled = false
    range.max = new Date().getFullYear()
    labelYear.innerText = range.value
}