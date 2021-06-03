 $.validate({
    lang: 'en',
     modules : 'security'
});

  
// document.getElementById("buttonLogin").addEventListener("click", function(){
//   document.querySelector(".popup").style.display = "flex";
// })

// document.querySelector(".close").addEventListener("click", function(){
//   document.querySelector(".popup").style.display = "none";
// })

// document.getElementById("buttonRegister").addEventListener("click", function(){
//   document.querySelector(".popup-register").style.display = "flex";
// })

// document.querySelector(".closeIcon").addEventListener("click", function(){
//   document.querySelector(".popup-register").style.display = "none";
// })


/*
function myBars() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }

}*/

function validate(){
    if (document.myForm.username.value === "") {
     alert("Sheno username");
      document.myForm.focus();
      return false;
    }

    if (document.myForm.password.value === "") {
      console.log("Sheno");
      alert("Sheno passwordin");
      document.myForm.focus();
      return false;
    }

    return true;
  }