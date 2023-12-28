<?php
@include 'connect.php';

session_start();

if (isset($_POST['submit'])) {
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $password = md5($_POST['password']);

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$password' ";

   $result = mysqli_query($conn, $select);

   if (mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_array($result);
      $_SESSION['name'] = $row['first_name'];
      header('location:home_page.php');
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login Form</title>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
   <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous" />
      <style>
         body {
            scroll-behavior: smooth;
            background-color: #011533;
            height: 100vh;
            padding: 0;
            margin: 0;
            }

            h2 {
            text-align: center;
            }

            #form {
            background: transparent;
            color: white;
            border: 1px solid   ;
            border-radius: 2em;
            position: absolute;
            top: 50%;
            left: 50%;
            height: auto;
            max-width: 25%;
            transform: translate(-50%, -50%);
            padding: 20px;
            transition: 0.6s;
            border: 0;
            }

            #form:hover {
            box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.3);
            }

            #form input {
            margin-bottom: 10px;
            }

            input {
            cursor: pointer;
            }

            #submit {
            background-color: #ffffff;
            
            }

            #submit:hover {
                background: transparent;
            }
            .cols {
            color: white;
            text-decoration: none;
            }

            #button-addon2 {
            color: black;
            background-color: rgb(255, 255, 255);
            height: 3em;
            border: 0;
            }

            #password, #email{
               border: 0;
            }


      </style>
</head>
<body>
<div class="d-flex flex-column min-vh-100">
   <div class="row justify-content-center">
      <div class="form-control " id="form">
         <form action="" method="post" id="login">
            <h3 class="text-center mb-4">Login Now</h3>
            <?php
            if(isset($error)){
               foreach($error as $error){
                  echo '<div class="alert alert-danger form-label" id="error">'.$error.'</div>';
               }
            }
            ?>

         <div class="mb-3 position-relative">
            <div>
               <label for="email" class="form-label">Username/Email</label>
            <input
               type="text"
               name="email"
               id="email"
               required
               maxlength="43"
               class="form-control form-control-lg" />
            </div>
          <div class="valid-feedback">
        </div>

        <div class="mb-3 ">
          <label for="password" class="form-label">Password</label>
          <div class="input-group mb-3">
            <input
            type="password"
            name="password"
            id="password"
            required
            class="form-control form-control-lg"
            aria-describedby="button-addon2" />
            <button class="bi bi-eye-slash btn btn-outline-secondary form-control-lg" id="button-addon2" type="button"></button>
          </div>
          
        </div>
        <div class="d-flex justify-content-center">
          <input
            type="submit"
            value="Login"
            name="submit"
            class="btn btn-lg"
            id="submit" 
            />
         </div >
            <p class=" text-center mb-1 mt-3" id="cols">Don't have an account? <a href="register_form.php" class="cols">Register Now</a></p>
         </form>
      </div>
   </div>
</div>

<script>
        const togglePassword = document.querySelector("#button-addon2");
        const password = document.querySelector("#password");

        togglePassword.addEventListener("click", function () {
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            
            this.classList.toggle("bi-eye");
        });
    </script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>
