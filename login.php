
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <link rel="stylesheet" href="style_form.css" />
    <title>EpicBlinkz | Login</title>
   <link rel="icon" href="img/favicon.png">
  </head>
  <body>
    <!----------------------- Main Container -------------------------->

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
      <!----------------------- Login Container -------------------------->

      <div class="row border rounded-5 p-3 bg-white shadow box-area">
        <!--------------------------- Left Box ----------------------------->

        <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #212121">
          <div class="featured-image mb-3">
            <img src="img/favicon.png" class="img-fluid" style="width: 250px" />
          </div>
          <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600">Be Verified</p>
          <small class="text-white text-wrap text-center mb-3" style="width: 17rem; font-family: 'Courier New', Courier, monospace"> Welcome back! Please enter your login information to proceed.</small>
        </div>

        <!-------------------- ------ Right Box ---------------------------->

        <div class="col-md-6 right-box">
          <div class="row align-items-center">
            <div class="header-text mb-4">
              <h2 style="text-align: center;">Hello,Again</h2>
              <p  style="text-align: center;">We are happy to have you back.</p>
            </div>
            <form method="post" class="form" action="ceklogin.php">
            <div class="input-group mb-3">
             <input id="user-username" class="form-control form-control-lg bg-light fs-6" type="username" name="username" autocomplete="on" placeholder="username" required>
            </div>
            <div class="input-group mb-1">
               <input id="user-password" class="form-control form-control-lg bg-light fs-6" type="password" name="password" placeholder="password"required>
            </div>
            <div class="input-group mb-5 d-flex justify-content-between">
              <div class="forgot">
                <small><a href="#">Forgot Password?</a></small>
              </div>
            </div>
            <div class="input-group mb-3">
            <input class="btn btn-lg btn-primary w-100 fs-6"type="submit" name="submit" value="Login now" class="btn">
            </div>
            </form>
            <div class="row">
              <small>Don't have account? <a href="register.php">Register New</a></small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
