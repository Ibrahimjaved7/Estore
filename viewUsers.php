<!DOCTYPE html>
<html>
<head>
	<?php include_once 'header.php'; ?>
</head>
<body onload="viewUsers();">

    <a href="Admin.php" style="text-decoration: none; color: black">
      <h1 class="LogoHeading">Estore</h1>
    </a>
    <hr />
	<div class="container" style="margin-top: 2%;">
		<h2 style="text-align: center;">View All Users</h2>
		<hr style="width: 25%; margin-left: 38%">
	</div>

	<div id="myid" style="width: 80%; margin-left: 10%;">

	</div>

	<div class="container" id="return_back_home" style="border: none;">
		<button class="btn btn-outline-danger" id="return_back" onclick='location.href="Admin.php"'>
			Return Back
		</button><br>
	</div>
	
	<?php include_once 'footer.php'; ?>

</body>
</html>