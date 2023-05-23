// alert("helo");

let siderbar = document.getElementById("mySidebar");
// console.log(siderbar);
function navbar(){
    if(siderbar.style.width == "260px"){
        siderbar.style.width="0%";
    }else{
        // siderbar.style.width="40%";
        siderbar.style.position= "fixed";
        siderbar.style.display="block";
        siderbar.style.backgroundColor="white";
        siderbar.style.color="black";
        siderbar.style.width="260px";
        siderbar.style.transition="width 0.5s";  

    }

}
