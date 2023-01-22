<!DOCTYPE html>
<html>
<head>
	<?php include_once 'header.php'; ?>
</head>
<body onload="viewItems();">

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
	<div class="container" style="margin-top: 2%;">
		<h2 style="text-align: center;">View All Items</h2>
		<hr style="width: 25%; margin-left: 38%">
	</div>

	<div id="myid" style="width: 80%; margin-left: 10%;">

	</div>

	<div class="container" id="return_back_home" style="border: none;">
		<button class="btn btn-outline-danger" id="return_back" onclick='location.href="inventory.php"'>
			Return Back
		</button><br>
	</div>
	
	<?php include_once 'footer.php'; ?>
	<script type="text/javascript">
      var user = JSON.parse(sessionStorage.getItem('user'));
      document.getElementById('userName').innerHTML += user['name'];
    </script>
</body>
</html>