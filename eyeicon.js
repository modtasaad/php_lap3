
// show hide password
const pwshowhide = document.querySelectorAll(".eye-icon");
pwshowhide.forEach(eyeicon =>{
   eyeicon.addEventListener("click",()=>{
       let pwfiled = eyeicon.parentElement.parentElement.querySelectorAll(".password");
       pwfiled.forEach(password =>{
           if(password.type==="password"){
               password.type="text";
               eyeicon.classList.replace("bx-hide" , "bx-show");
               return;
           }
           password.type="password";
           eyeicon.classList.replace( "bx-show",  "bx-hide");
       })
   })

})
