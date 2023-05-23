// alert("helo");

let siderbar = document.getElementById("mySidebar");
// console.log(siderbar);
function navbar(){
    if(siderbar.style.width == "300px"){
        siderbar.style.width="0%";
    }else{
        siderbar.style.width="40%";
        siderbar.style.position= "fixed";
        siderbar.style.overflowY = "scroll";
        siderbar.style.display="block";
        siderbar.style.backgroundColor="white";
        siderbar.style.color="black";
        siderbar.style.width="300pximportant";
        siderbar.style.zIndex="300!important";
        siderbar.style.transition="width 0.5s";  

    }

}


