<?php
$conn = mysqli_connect("localhost","t63301280024","26122543","db6424")or die("die");
$id = $_GET['id'];
if(isset($_GET['id'])){
	
	$sql = "DELETE FROM products where product_id = $id";

	if(mysqli_query($conn,$sql)){
		echo '<script>alert("delete success")</script>';
		header("location: cartmanage2.php");
		
	}
	else{
		echo '<script>alert("delete not complete")</script>';
		header("location: cartmanage2.php");
	}
}
else{
	die("not delete");
	header("location: cartmanage2.php");
}




	

?>