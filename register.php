<!DOCTYPE html>
<html>
  <head>
    <?php include_once 'header.php';?>
  </head>
  <body>
    <a href="index.php" style="text-decoration: none; color: black">
      <h1 class="LogoHeading">Estore</h1>
    </a>
    <hr />
    <div class="container-fluid" style="width: 80%; margin-bottom: 1%">
      <h3 class="center">Register</h3>
      <hr style="width: 15%; margin-left: 43%">

      <div class="mb-3">
        <label for="FullName" class="form-label">Full Name</label>
        <input
          type="text"
          class="form-control"
          id="FullName"
        />
      </div>  
      <div class="mb-3">
        <label for="Email" class="form-label">Email address</label>
        <input
          type="email"
          class="form-control"
          id="Email"
        />
      </div>
      <div class="mb-3">
        <label for="Password" class="form-label">Password</label>
        <input
          type="password"
          class="form-control"
          id="Password"
        />
      </div>
      <div class="center">
        <button type="submit" class="btn btn-primary" onclick="addUser();">
          Submit
        </button>
      </div>

      <div>
        <a href="login.php">Already Have an Account? SignIn</a>
      </div>

    </div>
   <?php include_once 'footer.php';?>
      </body>
</html>