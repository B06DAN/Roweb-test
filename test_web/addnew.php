<?php
	include('conn.php');
	if(isset($_POST['add'])){
		$title=$_POST['title'];
		$text=$_POST['text'];
		$category=$_POST['category'];
		
		mysqli_query($conn,"insert into `user` (title, text, category,image) values ('$title', '$text', '$category', '$image')");
	}
?>