<?php
	include('conn.php');
	if(isset($_POST['edit'])){
		$id=$_POST['id'];
		$title=$_POST['title'];
		$text=$_POST['text'];
                $category=$_POST['category'];
 
		mysqli_query($conn,"update `crud` set title='$title', text='$text', category='$category' where id='$id'");
	}
?>