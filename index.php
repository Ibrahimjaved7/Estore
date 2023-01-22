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
    <div class="container-fluid mainBox">
      <div class="row">
        <div class="col-10">
          <p style="text-align: center">
            Estore is an inventory management platform where anyone
            can creatre their <br> store and manages their inventory.
            <br />
            Following are the features are given by Estore
          </p>
          <br />
          <ul>
            <li>User can create their store.</li>
            <li>User can manages their store Inventory.</li>
          </ul>
          <div class="center">
            <button
              type="button"
              class="btn btn-primary"
              style="margin-right: 10px"
            >
              <a href="register.php" style="color: white">Register</a>
            </button>
            <button type="button" class="btn btn-success">
              <a href="login.php" style="color: white">Login</a>
            </button>
          </div>
        </div>
        <div class="col-2">
          <img
            src="./img/Inventory Management.png"
            style="width: 200px; height: 330px; margin-left: 75%;"
          />
        </div>
      </div>
    </div>

   <?php include_once 'footer.php';?>
   </body>
</html>