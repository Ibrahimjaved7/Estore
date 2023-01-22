<?php

include ('model.php');

if (isset($_REQUEST['action'])) {
	if ($_REQUEST['action'] == 'addUser') {
		$addobj = new ModalOperations();
		$id = $addobj -> addUserData($_REQUEST['name'], $_REQUEST['email'], $_REQUEST['password']);
		
		echo json_encode($id);
	}

	if ($_REQUEST['action'] == 'LoginUser') {
		$addobj = new ModalOperations();
		$id = $addobj -> AuthUser($_REQUEST['email'], $_REQUEST['password']);
		$itemsarr = array();

		if ($id -> num_rows > 0) {

		while ($row = $id -> fetch_assoc()) {
			$itemsarr['userID'][] = $row['userID'];
			$itemsarr['userName'][] = $row['userName'];
			$itemsarr['userEmail'][] = $row['userEmail'];
			$itemsarr['isAdmin'][] = $row['is_admin'];
		}

		} 
		echo json_encode($itemsarr);
	}	

	if ($_REQUEST['action'] == 'getUsers') {
		$addobj = new ModalOperations();
		$id = $addobj -> GetAllUsers();
		$itemsarr = array();
		if ($id -> num_rows > 0) {

		while ($row = $id -> fetch_assoc()) {
			$itemsarr['userID'][] = $row['userID'];
			$itemsarr['userName'][] = $row['userName'];
			$itemsarr['userEmail'][] = $row['userEmail'];
		}

		}
		
		echo json_encode($itemsarr);
	}	

	if ($_REQUEST['action'] == 'getItems') {
		$addobj = new ModalOperations();
		$id = $addobj -> GetAllItems($_REQUEST['user']);
		$itemsarr = array();
		if ($id -> num_rows > 0) {

		while ($row = $id -> fetch_assoc()) {
			$itemsarr['productID'][] = $row['productID'];
			$itemsarr['productName'][] = $row['productName'];
			$itemsarr['productQTY'][] = $row['productQTY'];
			$itemsarr['productPrice'][] = $row['productPrice'];
		}

		}
		
		echo json_encode($itemsarr);
	}	

	if ($_REQUEST['action'] == 'addItems') {
		$addobj = new ModalOperations();
		$id = $addobj -> addItems($_REQUEST['pName'], $_REQUEST['pDesc'], $_REQUEST['pQty'], $_REQUEST['price'], $_REQUEST['user']);
		
		echo json_encode($id);
	}

	if ($_REQUEST['action'] == 'getUserCount') {
		$addobj = new ModalOperations();
		$id = $addobj -> getUserCount();
		$itemsarr = array();
		if ($id -> num_rows > 0) {

		while ($row = $id -> fetch_assoc()) {
			$itemsarr['Count'][] = $row['Count'];
		}

		}
		
		echo json_encode($itemsarr);
	}

	if ($_REQUEST['action'] == 'getUserName') {
		$addobj = new ModalOperations();
		$id = $addobj -> GetAllUsers();
		$itemsarr = array();
		if ($id -> num_rows > 0) {

		while ($row = $id -> fetch_assoc()) {
			$itemsarr['userName'][] = $row['userName'];
		}

		}
		
		echo json_encode($itemsarr);
	}	

	if ($_REQUEST['action'] == 'deleteUser') {
		$addobj = new ModalOperations();
		$addobj -> deleteUser($_REQUEST['userName']);
	}	

	if ($_REQUEST['action'] == 'updateUserInfo') {
		$addobj = new ModalOperations();
		$addobj -> updateUserInfo($_REQUEST['userName'], $_REQUEST['role']);
	}	

	if ($_REQUEST['action'] == 'invoice') {
		$addobj = new ModalOperations();
		$addobj -> updateProductQTY($_REQUEST['product'], $_REQUEST['qty'], $_REQUEST['user']);
	}	

	if ($_REQUEST['action'] == 'delItem') {
		$addobj = new ModalOperations();
		$addobj -> deleteProduct($_REQUEST['product'], $_REQUEST['user']);
	}	
}
?>