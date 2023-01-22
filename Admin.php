<!DOCTYPE html>
<html>
  <head>
    <?php include_once 'header.php';?>
  </head>
  <body onload="getUserCount()">
    <div style="display: flex; justify-content: space-around;">
      <div>
        <a href="Admin.php" style="text-decoration: none; color: black">
        <h1 class="LogoHeading">Estore</h1>
        </a>
      </div>
      <div style="display: flex;">
       <div>
          <p style="margin-top: 30%;" id="userName">
            Hello, 
          </p>
        </div>
        <div>
          <button type="submit" class="btn btn-danger" onclick="Logout();" style="margin-top: 30%; margin-left: 15px;">
            Logout
          </button>
        </div>
      </div>
    </div>
    <hr />


    
    <div id="" class="container" style="padding: 25px; margin-bottom: 4%; margin-top:3%;">
      <div class="row">
        <div class="col-md-6">
        <h2 id="">Total Register Users</h2>
        <br>
        <h1 style="margin-left: 30%; font-size: 75px" id="userCount">0</h1>
        </div>
        <div class="col-md-6">
          <h2 id="">Manage Users</h2>
          <button class="btn btn-outline-primary" id="viewUser" onclick='location.href="viewUsers.php"'>
            View Users
          </button><br>
          <button class="btn btn-outline-info" id="UpdateInfoUser" onclick='location.href="UpdateUserInfo.php"'>
            Update Users Role
          </button>
          <br>
          <button class="btn btn-outline-danger" id="delUser" onclick='location.href="DeleteUser.php"'>
            Delete Users
          </button>
          <br>
        </div>
      </div>
    </div>

    <?php include_once 'footer.php';?>
    <script type="text/javascript">
      var admin = JSON.parse(sessionStorage.getItem('user'));
      if(admin == null || admin['isAdmin'] == 0)
      {
        location.href="login.php";
      }
      document.getElementById('userName').innerHTML += admin['name'];
    </script>
  </body>
</html>
