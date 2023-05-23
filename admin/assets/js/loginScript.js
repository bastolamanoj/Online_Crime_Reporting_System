let adminForm = document.getElementById("adminForm");
let policeForm = document.getElementById("policeForm");
let indicator =document.getElementById("indicator"); 
function adminlogin(){
    policeForm.style.transform = "translatex(-300px)";
    adminForm.style.transform = "translatex(0px)";
    indicator.style.transform = "translatex(-160px)";
}

function policelogin(){
    policeForm.style.transform = "translatex(0px)";
    adminForm.style.transform = "translatex(300px)";
    indicator.style.transform = "translatex(0px)";
    
}