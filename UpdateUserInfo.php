<!DOCTYPE html>
<html>
  <head>
    <?php include_once 'header.php';?>
  </head>
  <body onload="getUserName()">
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


    <div class="container-fluid" style="width: 80%; margin-bottom: 9%">
      <h3 class="center">Update User Info</h3>
      <hr style="width: 15%; margin-left: 43%">

      <div class="mb-3">
        <label for="userName" class="form-label">User Name</label>
        <br>
        <select id="Users" name="Users" style="width: 100%; padding: 10px; border-radius: 5px;">
            <option value=""></option>
        </select>
      </div>

      <div class="mb-3">
        <label for="userRole" class="form-label">Role</label>
        <br>
        <select id="userRole" style="width: 100%; padding: 10px; border-radius: 5px;">
            <option value=""></option>
            <option value="0">Normal User</option>
            <option value="1">Admin</option>
        </select>
      </div>

      <div class="center">
        <button type="submit" class="btn btn-danger" onclick="updateUserInfo()">
          Submit
        </button>
      </div>

    </div>
    
    <div class="container" id="return_back_home" style="border: none; margin-top: -8%">
		<button class="btn btn-outline-danger" id="return_back" onclick='location.href="Admin.php"'>
			Return Back
		</button><br>
	</div>


    <?php include_once 'footer.php';?>
    <script type="text/javascript">
      var admin = JSON.parse(sessionStorage.getItem('user'));
      if(admin == null || admin['isAdmin'] == 0)
      {
        location.href="Adminlogin.php";
      }
      document.getElementById('userName').innerHTML += admin['name'];
    </script>
  </body>
</html>
