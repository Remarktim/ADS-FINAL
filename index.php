<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Landing Page</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous" />

    <style>
      body {
        scroll-behavior: smooth;
        background-color: #011533;
        padding: 0;
        margin: 0;
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
        transform: scale(1.2);
      }

      #left div {
        position: absolute;
        top: 40%;
        left: 25%;
        transform: translate(-50%, -50%);
        color: white;
      }
      #left {
        background-color: antiquewhite;
        height: 100%;
        width: 50%;
      }

      #login {
        position: absolute;
        top: 38%;
        left: 65%;
        color: white;
        background-color: #5e62a1;
        transition: transform 0.4s;
        padding: 13px 50px;
      }

      #signup {
        position: absolute;
        top: 38%;
        left: 75%;
        color: white;
        background-color: #5e62a1;
        transition: transform 0.4s;
        padding: 13px 50px;
      }

      #signup:hover,
      #login:hover {
        cursor: pointer;
        transform: scale(1.2);
      }
      h1 {
        font-size: 3em;
        color: white;
      }
      .container {
        background-color: antiquewhite;
      }
      main .container {
        height: 100%;
        width: 50%;
        margin: 0 auto;
      }
    </style>
  </head>
  <body>
    <header>
      <h1 class="text-center mt-5 text-uppercase">Employee Indicator Data</h1>
    </header>
    <main class="container d-flex">
      <section class="container bg-light" id="left">
        <div>
          <h2>Hi, <span class="element"></span></h2>
        </div>
      </section>

      <section>
        <a id="login" class="btn mx-5 btn-lg" href="login_form.php">Log In</a>
        <a id="signup" class="btn mx-5 btn-lg" href="register_form.php"
          >Sign Up</a
        >
      </section>
    </main>
    <script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>
    <script>
      history.pushState(null, null, null);
      window.addEventListener("popstate", function () {
        history.pushState(null, null, null);
      });

      var typed = new Typed(".element", {
        strings: ["Welcome", "Thank You For Visiting"],
        typeSpeed: 50,
        backSpeed: 50,
        backDelay: 1000,
        loop: true,
      });
    </script>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"></script>
  </body>
</html>
