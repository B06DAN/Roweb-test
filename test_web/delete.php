<?php
	include('conn.php');
//echo "Are you sure?";
	if(isset($_POST['del'])){

		$id=$_POST['id'];
		mysqli_query($conn,"delete from `user` where id='$id'");
	}
?>