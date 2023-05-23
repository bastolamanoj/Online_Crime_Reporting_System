
let sidebar = document.querySelector("#sidebar");
function navbar(){
    if(sidebar.style.width == "300px"){
        sidebar.style.width="0%";
    }else{
        sidebar.style.width="40%";
        sidebar.style.position= "fixed";
        sidebar.style.overflowY = "scroll";
        sidebar.style.display="block";
        sidebar.style.backgroundColor="white";
        sidebar.style.color="black";
        sidebar.style.width="300pximportant";
        sidebar.style.zIndex="300!important";
        sidebar.style.transition="width 0.5s";  

    }

}
