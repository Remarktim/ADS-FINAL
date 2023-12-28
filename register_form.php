<?php
@include 'connect.php';

if (isset($_POST['submit'])) {
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $number = $_POST['number'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);

    $select = "SELECT * FROM user_form WHERE email = '$email' && password = '$password'";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        $error[] = 'User already exists!';
    } else {
        if ($password != $cpassword) {
            $error[] = 'Password do not match!';
        } else {
            $insert = "INSERT INTO user_form(first_name, last_name, email, phone_number, password) VALUES('$fname','$lname','$email','$number','$password')";
            mysqli_query($conn, $insert);
            header('location: login_form.php');
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register Form</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
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

      header {
        border-bottom: 1px solid;
      }

      #forms div a {
        background-color: #826599;
        color: white;
        border-radius: 2em;
        padding: 10px 20px;
        transition: 0.6s;
        border: 0;
        text-decoration: none;
      }

      #forms div a:hover {
        background-color: #833e6b;
      }
      #left {
        width: 95.5vh;
      }

      #right {
        width: 96.3vh;
      }

      #left div {
        position: absolute;
        top: 40%;
        left: 25%;
        transform: translate(-50%, -50%);
        color: white;
      }

      #right #login {
        position: absolute;
        top: 40%;
        left: 70%;
        transform: translate(-50%, -50%);
        color: white;
      }

      #right #signup {
        position: absolute;
        top: 40%;
        left: 81%;
        transform: translate(-50%, -50%);
        color: white;
      }

      h2 {
        text-align: center;
      }

      #form {
        background: transparent;
        color: white;
        border: 1px solid;
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
      .cols {
        color: white;
        text-decoration: none;
      }

      #togglePassword {
        position: absolute;
        top: 20%;
        left: 50%;
        transform: translate(-50%, -50%);
      }

      #button-addon2,
      #button-addon3 {
        color: black;
        background-color: white;
        height: 3em;
        border: 0;
      }

      #password,
      #email,
      #cpassword,
      #fname,
      #lname,
      #number,
      #email {
        border: 0;
      }
    </style>
  </head>
  <body>
    <div class="d-flex flex-column min-vh-100">
      <div class="row justify-content-center">
        <div class="form-control" id="form">
          <form action="" method="post" id="registrationForm">
            <h3 class="text-center mb-4">Register Now</h3>
            <?php
            if (isset($error)) {
               foreach ($error as $error) {
                  echo '<div class="alert alert-danger form-label" role="alert" >'.$error.'</div>';
               }
            }
            ?>

            <div>
              <label for="fname" class="form-label">First Name</label>
              <input
                type="text"
                name="fname"
                id="fname"
                required
                minlength="3"
                maxlength="50"
                class="form-control form-control-lg" />
            </div>
            <div>
              <label for="lname" class="form-label">Last Name</label>
              <input
                type="text"
                name="lname"
                id="lname"
                required
                minlength="3"
                maxlength="50"
                class="form-control form-control-lg" />
            </div>
            <div class="mb-3 position-relative">
              <label for="email" class="form-label">Email Address</label>
              <input
                type="text"
                name="email"
                id="email"
                required
                class="form-control form-control-lg" />
            </div>
            <div>
              <label for="number" class="form-label">Phone Number</label>
              <input
                type="text"
                name="number"
                id="number"
                required
                minlength="0"
                maxlength="11"
                class="form-control form-control-lg" />
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <div class="input-group mb-3">
                <input
                  type="password"
                  name="password"
                  id="password"
                  required
                  minlength="11"
                  pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{11,}$"
                  title="Password must contain at least one uppercase letter, one number, and be at least 11 characters long."
                  class="form-control form-control-lg"
                  aria-describedby="button-addon2" />
                <button
                  class="bi bi-eye-slash btn btn-outline-secondary form-control-lg"
                  id="button-addon2"
                  type="button"></button>
              </div>
            </div>
            <div class="mb-3">
              <label for="cpassword" class="form-label">Confirm Password</label>
              <div class="input-group mb-3">
                <input
                  type="password"
                  name="cpassword"
                  id="cpassword"
                  required
                  pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{11,}$"
                  class="form-control form-control-lg"
                  aria-describedby="button-addon2" />
                <button
                  class="bi bi-eye-slash btn btn-outline-secondary form-control-lg"
                  id="button-addon3"
                  itemid="toggleCPassword"
                  type="button"></button>
              </div>
              <div class="error-message" id="passwordError"></div>
            </div>
            <div class="d-flex justify-content-center">
              <input
                type="submit"
                value="Register Now"
                name="submit"
                class="btn btn-lg"
                id="submit" />
            </div>
            <p class="text-center mb-1 mt-3" id="cols">
              Don't have an account?
              <a href="login_form.php" class="cols">Login now</a>
            </p>
          </form>
        </div>
      </div>
    </div>
    <script>
      const togglePasswordButton = document.querySelector("#button-addon2");
      const password = document.querySelector("#password");

      const toggleCPasswordButton = document.querySelector("#button-addon3");
      const cpassword = document.querySelector("#cpassword");

      togglePasswordButton.addEventListener("click", function () {
        toggleVisibility(password);
        this.classList.toggle("bi-eye");
      });

      toggleCPasswordButton.addEventListener("click", function () {
        toggleVisibility(cpassword);
        this.classList.toggle("bi-eye");
      });

      function toggleVisibility(field) {
        const type =
          field.getAttribute("type") === "password" ? "text" : "password";
        field.setAttribute("type", type);
      }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
