<?php
    session_start();
?>

<?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput"){
                echo "<p>Fill in all fields!</p>";
            }
            else if($_GET["error"] == "invaliduid"){
                echo "<p>Choose a proper username</p>";
            }
            else if($_GET["error"] == "invaliduemail"){
                echo "<p>Choose a proper email/p>";
            }
            else if($_GET["error"] == "usernametaken"){
                echo "<p>Passwords don't match!</p>";
            }
            else if($_GET["error"] == "stmtfailed"){
                echo "<p>Something went wrong! Try again!</p>";
            }
            else if($_GET["error"] == "usernametaken"){
                echo "<p>Try another username</p>";
            }
            else if ($_GET["error"] == "none"){
                echo "<p>Successfully Signed Up!</p>";
            }
        }
        ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Dual Login / Signup Form</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css'>
    <link rel="stylesheet" href="../css/login.css" />

</style>
</head>
<body>

  <body>
  <section>
      <div class="container" id="container">
          <div class="form-container sign-up-container">
              <form action="signup-inc.php" method="POST">
                  <h1>Sign Up</h1>
                  <div class="social-container">
                      <a href="https://Github.com/AtharvaKulkarniIT" target="_blank" class="social"><i class="fab fa-github"></i></a>
                  </div>
                <span>Or use your Email for registration</span>
                <label>
                    <input type="email" name="email" placeholder="Email" />
                </label>
                <label>
                    <input type="text" name="uid" placeholder="Username" />
                </label>
                <label>
                    <input type="password" name="pwd" placeholder="Password" />
                </label>
                <label>
                    <input type="password" name="pwdconfirm" placeholder="Confirm Password" />
                </label>
                  <button type="submit" name="submit" style="margin-top: 9px">Sign Up</button>
              </form>
          </div>


          <div class="form-container sign-in-container">
              <form action="login-inc.php" method="POST">
                  <h1>Login</h1>
                  <div class="social-container">
                      <a href="https://Github.com/AtharvaKulkarniIT" target="_blank" class="social"><i class="fab fa-github"></i></a>
                        </div>
                  <label>
                      <input type="text" name="uid" placeholder="Username or Email"/>
                  </label>
                  <label>
                      <input type="password" name="pwd" placeholder="Password"/>
                  </label>
                  <a href="#">Forgot your password?</a>
                  <button name="login">Login</button>
              </form>
          </div>
          <div class="overlay-container">
              <div class="overlay">
                  <div class="overlay-panel overlay-left">
                      <h1>Login</h1>
                      <p>Login here if you already have an account </p>
                      <button class="ghost mt-5" id="signIn">Login</button>
                  </div>
                  <div class="overlay-panel overlay-right">
                      <h1>Create an Account!</h1>
                      <p>Sign up if you still don't have an account ... </p>
                      <button class="ghost" id="signUp">Sign Up</button>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js'></script>
    <script src="../js/login.js"></script>

  </body>
</html>
