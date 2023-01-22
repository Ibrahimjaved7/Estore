<!DOCTYPE html>
<html>
  <head>
    <?php include_once 'header.php';?>
  </head>
  <body onload="getItemsForDel()">
    <div style="display: flex; justify-content: space-around;">
      <div>
        <a href="inventory.php" style="text-decoration: none; color: black">
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


    <div class="container-fluid" style="width: 80%; margin-bottom: 10%">
      <h3 class="center">Delete Product</h3>
      <hr style="width: 15%; margin-left: 43%">

      <div class="mb-3">
        <label class="form-label">Product Name</label>
        <br>
        <select id="prodName" style="width: 100%; padding: 10px; border-radius: 5px;">
            <option value=""></option>
        </select>
      </div>
      <div class="center">
        <button type="submit" class="btn btn-danger" onclick="deleteItem()">
          Submit
        </button>
      </div>

    </div>
    
    <div class="container" id="return_back_home" style="border: none; margin-top: -5%">
		<button class="btn btn-outline-danger" id="return_back" onclick='location.href="inventory.php"'>
			Return Back
		</button><br>
	</div>


    <?php include_once 'footer.php';?>
    <script type="text/javascript">
     var user = JSON.parse(sessionStorage.getItem('user'));
      if (user == null)
      {
        window.location.href = "login.php"
      }
      document.getElementById('userName').innerHTML += user['name'];

      function deleteItem()
      {
        var product = document.getElementById("prodName").value;
        $.post("controller.php", {
            product : product,
            user : user['id'],
            action : 'delItem',
            
            }, function() {
                location.href='inventory.php';
            });
        }
    </script>
  </body>
</html>
