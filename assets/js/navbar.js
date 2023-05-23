let navbarScroll = document.querySelector("#navbar1");
console.log(window.scrollY);
console.log("Manoj Bastola jajfkasd nfadfkad");
window.onscroll = function (){
    if(window.scrollY > 100){
    navbarScroll.style.position = 'fixed';
    navbarScroll.style.color = 'black'
    navbarScroll.style.backgroundColor = 'white';
    navbarScroll.style.top = '0px';
    navbarScroll.style.left= '0px';
    navbarScroll.style.width = '100%';
    navbarScroll.style.zIndex = '1000';
    navbarScroll.style.maxWidth = '100%';
    // navbarScroll.style.paddingLeft = '10%';
    // navbarScroll.style.paddingRight = '10%';
    
}else{
    navbarScroll.style.position = 'relative';
    navbarScroll.style.backgroundColor = 'transparent';

}
}