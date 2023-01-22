<!DOCTYPE html>
<html>
  <head>
    <?php include_once 'header.php';?>
  </head>
  <body onload="">
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
    <h3 class="center">Add Product</h3>
    <hr style="width: 15%; margin-left: 43%">

    <div class="mb-3">
      <label for="PName" class="form-label">Product Name</label>
      <input
        type="text"
        class="form-control"
        id="PName"
      />
    </div>
    <div class="mb-3">
      <label for="PDesc" class="form-label">Product Descrption</label>
      <input
        type="text"
        class="form-control"
        id="PDesc"
      />
    </div>
    <div class="mb-3">
      <label for="PQty" class="form-label">Product Quantity</label>
      <input
        type="number"
        class="form-control"
        id="PQty"
      />
    </div>
    <div class="mb-3">
      <label for="Price" class="form-label">Product Price</label>
      <input
        type="number"
        class="form-control"
        id="Price"
      />
    </div>
    <div class="center">
      <button type="submit" class="btn btn-primary" onclick="addItems();">
        Submit
      </button>
    </div>
    <div class="container" id="return_back_home" style="border: none;">
		  <button class="btn btn-outline-danger" id="return_back" onclick='location.href="inventory.php"'>
			  Return Back
		  </button><br>
	  </div>
</div>
    
   <?php include_once 'footer.php';?>
   <script type="text/javascript">
      var user = JSON.parse(sessionStorage.getItem('user'));
      document.getElementById('userName').innerHTML += user['name'];
    </script>
  </body>
</html>