<?php include "header.php"; ?>
<?php 
	if(isset($_POST)){
		print_r($_POST);
		$_SESSION['cart']['user'] = $_POST;
	}
	if(isset($_SESSION)){
		print_r($_SESSION);
	}
?>
<?php include "footer.php"; ?>