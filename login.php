<?php
session_start();
if (isset($_SESSION["users"])) {
   header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css"
      rel="stylesheet"
    />


</head>
<body>





    <div class="box">
  <h1>Login</h1>

        <?php
        if (isset($_POST["login"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];
             require_once "database.php";
             $sql = "SELECT * FROM user WHERE email = '$email'";
             $result = mysqli_query($conn, $sql);
             $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
             if ($user) {
                 if (password_verify($password, $user["password"])) {
                     session_start();
                     $_SESSION["user"] = "yes";
                     header("Location: index.php");
                     die();
                 }else{
                     echo "<div class='alert alert-danger'>Password does not match</div>";
                 }
             }else{
                 echo "<div class='alert alert-danger'>Email does not match</div>";
             }
         }
        ?>
      <form name="loginform" action="login.php" method="post">
        <div class="group">
            <input type="email" placeholder="Email" name="email" class="form-control">
        </div>
        <div class="group">
            <input type="password" placeholder="Password:" name="password" class="form-control">
        </div>
        <div class="group">
        <input class="button" type="submit" value="Login" name="login">
        </div>
      </form>
     <div><p>Not registered yet <a href="registration.php">Register Here</a></p></div>
     <div><p>Go back to <a href="home.php">Home Page</a></p></div>
     </div>
    </div>



    <script> 
    
function login(loginForm){
if(loginForm.email.value && loginForm.password.value)
{
var email=document.getElementById("email").value;
document.write('<html><body><h1><center>');
document.write("Welcome" + " ");
document.write (username);
document.write('</center></h1></body></html>');
} else
alert("Please Enter your Username & Password");
}
</script>


</body>
</html>