
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

// const form = document.querySelector(".formt"),

 
function emptyvalidation(){
    const input =document.getElementById("name");
    if(input.values===""){
        return input.classList.add("invalid");//inputField.style.border="1px solid red";
        
    }
    return input.classList.remove("invalid");//inputField.style.border="none";
}

// form.addEventListener("submit" , (e)=>{
//     e.preventDefault();    
//     emptyvalidation();
//     // calling fun in key up
//     input.addEventListener("keyup",emptyvalidation()); 
// })

// function validateForm() {
//     var x = document.forms["myform"]["name"].value;
//     if (x == "") {
//       alert("Name must be filled out");
//       return false;
//     }
//   }