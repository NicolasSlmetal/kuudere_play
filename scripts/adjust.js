

function isMobile(){
    let isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
    if (isMobile){
        addScroll();
    }
}

function addScroll(){
    document.querySelector("div#content").style.overflowX = "scroll"
    document.querySelector("div#search").style.overflowX = "scroll"
}

window.onload = isMobile

