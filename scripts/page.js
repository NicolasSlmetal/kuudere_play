var animesCards = document.querySelector("ul#anime").children
var mangaCards = document.querySelector("ul#manga").children
var previousAnimeNavLink = document.getElementById("prev-anime")
var nextAnimeNavLink = document.getElementById("next-anime")
var previousMangaNavLink = document.getElementById("prev-manga")
var nextMangaNavLink = document.getElementById("next-manga")
var currentAnimePage = "previous"
var currentMangaPage = "previous"
var itemsPerPage = 3

function pageAnime(page){
    if (page === "next" && currentAnimePage === "previous"){
        currentAnimePage = "next"
        changeEnabledOptions(previousAnimeNavLink, nextAnimeNavLink)
    }else if (page === "previous" && currentAnimePage === "next"){
        currentAnimePage = "previous"
        changeEnabledOptions(nextAnimeNavLink, previousAnimeNavLink)
    }   
    updateAnimeContent()
}

function pageManga(page){
    if (page === "next" && currentMangaPage === "previous"){
         currentMangaPage = "next"
         changeEnabledOptions(previousMangaNavLink, nextMangaNavLink)
    }else if (page === "previous" && currentMangaPage === "next"){
        currentMangaPage = "previous"
        changeEnabledOptions(nextMangaNavLink, previousMangaNavLink)
    }   
    updateMangaContent()
}

function changeEnabledOptions(nowActive, prevDesactive){
    nowActive.classList.remove("disabled")
    prevDesactive.classList.add("disabled")
}

function updateAnimeContent() {
   
    const pageVal = currentAnimePage === "previous"?1:2
    const startIndex = (pageVal - 1) * itemsPerPage;
    const endIndex = startIndex + itemsPerPage;
    
    
    for (let i = 0; i < animesCards.length; i++) {
        if (i >= startIndex && i < endIndex) {
            animesCards[i].style.display = 'block';
        } else {
            animesCards[i].style.display = 'none';
        }
    }
}

function updateMangaContent() {
    
    const pageVal = currentMangaPage === "previous"? 1:2
    const startIndex = (pageVal - 1) * itemsPerPage;
    const endIndex = startIndex + itemsPerPage;
    
    for (let i = 0; i < mangaCards.length; i++) {
        if (i >= startIndex && i < endIndex) {
            mangaCards[i].style.display = 'block';
        } else {
            mangaCards[i].style.display = 'none';
        }
    }
}

updateAnimeContent()
updateMangaContent()