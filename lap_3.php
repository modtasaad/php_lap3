<?php
$error='';
$sucess='';

if(isset($_POST['submit'])){

if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['pass']) || empty($_POST['cpass'])||empty($_POST['corse'])||empty($_POST['input'])||empty($_POST['group'])||empty($_POST['gender'])||empty($_POST['agree'])){
    $error= "<div class='alert   alert_danger'><i class='bx bx-error-circle icon' style='color:red;' ></i><span class='er' >ALL Fileds IS Required</span></div>";  
}
else{

    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $error= "<div class='alert   alert_danger'><i class='bx bx-error-circle icon' style='color:red;' ></i><span class='er' >Enter A Valide Email</span></div>";
        $addinvalid = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    
    }
    else{

        if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/',$_POST['pass'])){
            $error= "<div class='alert   alert_danger '><i class='bx bx-error-circle icon' style='color:red;' ></i><span >Please enter at least 8 characters with number,small and capital</span></div>";
            $addpinvalid = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING);
        }
        else{

            if($_POST['pass'] !== $_POST['cpass']){
                $error= "<div class='alert   alert_danger '><i class='bx bx-error-circle icon' style='color:red;' ></i><span class='er' > Password Don't Match </span></div>";
                $addpcinvalid = filter_input(INPUT_POST, 'cpass', FILTER_SANITIZE_STRING);
            }
            else{

                $sucess= "<div class='alert   alert_sucess '><i class='bx bx-bell  icon' style='color:#43C6DB;'></i><span class='er' > Regestration Sucess </span></div>";
            }
        }
    }
}
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./valid.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Document</title>
</head>
<body>
    <div class="wapper">
        <h2 class="title">Application Name : AABS_BIS Class Rgesteration</h2>
       <?php echo $error; ?>
       <?php echo $sucess; ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>"  name="myform" class="form" method="post" >
            
                <div class="input_filed">
                    <label for="name" class="input_lable">Full Name : </label>
                    <input    name="name" type="text" class="input "  id="name" placeholder= " Enter Your Full Name">
                </div>
                <div class="input_filed">
                    <label for="email" class="input_lable">Email : </label>
                    <input  name="email"   type="text"   id="email" placeholder=" Enter Your Email"    class="input   <?php echo $addinvalid ? 'invalid': '' ;?>" >
                </div>
                <div class="input_filed">
                    <label for="pass" class="input_lable">Password : </label>
                    <input type="password"    name="pass" class=" password input  <?php echo $addpinvalid ? 'invalid': '' ;?> " id="pass" placeholder=" Enter Your Password">
                    <i class='bx bx-hide eye-icon'></i>
                </div>
                <div class="input_filed">
                    <label for="cpass" class="input_lable">Confirm Password : </label>
                    <input type="password"    class="password   input  <?php echo $addpcinvalid ? 'invalid': '' ;?>" id="cpass"  name="cpass" placeholder=" Renter Your  Password">
                </div>
              
                <div class="input_filed cc">
                <label for="class" class="input_lable">Class Detalis : </label> 
                <textarea name="input" id="class" cols="20" rows="5" class=" input class"></textarea>
                </div>
                <div class="input_filed drop">
                <label for="course" class="input_lable">Avalible Coures : </label>
                <select name="corse" id="course"  class="input se" multiple >
                        <option value="PHP">&nbsp; PHP</option>
                        <option value="MYSQL">&nbsp; MYSQL</option>
                        <option value="JAVASCRIPT">&nbsp; JAVASCRIPT</option>
                        <option value="HTML5">&nbsp; HTML5</option>
                </select>
                </div>
                <div class="input_filed gg ">
                    <label for="gp" class="gg">Group :&nbsp;&nbsp; </label>
                    <input type="number" class=" input gp" id="gp"  name="group" placeholder=" Enter Your Group Number" >
                    <label> &nbsp;&nbsp;&nbsp;&nbsp;Gender :&nbsp; </label>
                    <input type="radio" class="gender"name="gender" value="Male"  ><label for="gender">&nbsp;Male</label>
                    <input type="radio" class="gender" name="gender" value="Famle"  ><label for="gender">&nbsp;Famle</label>
                </div>
                <div class="input_filed ag">
                    <label for="check" >Agree : </label>&nbsp;
                    <input type="checkbox"  id="ag"  name="agree"  >
                </div>
                <div class="btn ">
                    <input type="submit" Value="Regester" class="btn_filed"  name="submit"   onclick="emptyvalidation()"  >
                </div>
            </form>
    </div>
    <?php
    if(isset($_POST['submit'])) {

    if($error=="") 
    {  
        echo "<h3 color = #FF0001> <b>You have sucessfully registered.</b> </h3>";  
        echo "<h2>Your Input:</h2>";  
        echo "Name: " .$_POST['name'];  
        echo "<br>";  
        echo "Email: " .$_POST['email'];  
        echo "<br>";  
        echo "Password: " .$_POST['pass'];  
        echo "<br>";  
        echo "Confierm pasword: " .$_POST['cpass'];  
        echo "<br>";  
        echo " Cllass Details: " .$_POST['input'];  
        echo "<br>";  
        echo " Courses: " .$_POST['corse'];  
        echo "<br>";  
        echo " Group Numper: " .$_POST['group'];  
        echo "<br>";  
        echo "Gender: " .$_POST['gender'];
        echo "<br>";  
        echo " Agree: " .$_POST['agree'] ;  
    } 
    else {
          
        echo "<h3> <b>You didn't filled up the form correctly.</b> </h3>";  
    }  
    }  
?>  
    <script src="./eyeicon.js"></script>
</body>
</html>

