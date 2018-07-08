<?php
	include('conn.php');
	if(isset($_POST['show'])){
		?>
		<table class = "table table-bordered alert-warning table-hover">
			<thead>
				<th>title</th>
				<th>text</th>
				<th>category</th>
                <th>image</th>
<!--                <th>Action</th>-->
			</thead>
				<tbody>
					<?php
//                    $imagesDir = 'images/imagesRandom/';
//                    $images = glob($imagesDir . '*.{jpg}', GLOB_BRACE);
//                    $image = $images[array_rand($images)];

//                    $pic=array('240_1.jpg','240_2.jpg','240_3.jpg');
//                    shuffle($pic);

						$quser=mysqli_query($conn,"select * from `user`");
						while($urow=mysqli_fetch_array($quser)){
							?>
								<tr>
                                    <td><?php echo $urow['id']; ?></td>
									<td><?php echo $urow['title']; ?></td>
									<td><?php echo $urow['text']; ?></td>
                                    <td><?php echo $urow['category']; ?></td>
                                    <td><?php
//                                        shuffle($pic);
//                                        echo $pic;
//                                        for($i=0; $i<=2; $i++){
//                                            echo "<img src=\"$pic[$i]\" width=\"80\" height=\"50\">";
//                                        }
                                        $pic=rand(1,3);
                                        if($pic==1){
                                            echo "<img src=\"images/imagesRandom/240_1.jpg\" width=\"80\" height=\"50\">";
                                        }else if($pic==2){
                                            echo "<img src=\"images/imagesRandom/240_2.jpg\" width=\"80\" height=\"50\">";
                                        }else if($pic==3){
                                            echo "<img src=\"images/imagesRandom/240_3.jpg\" width=\"80\" height=\"50\">";
                                        }


                                        ?></td>
									<td><button class="btn btn-success" data-toggle="modal" data-target="#edit<?php echo $urow['id']; ?>"><span class="glyphicon glyphicon-pencil"></span> &nbsp; Edit &nbsp; </button>
                                        <button class="btn btn-danger delete" value="<?php echo $urow['id']; ?>"><span class = "glyphicon glyphicon-trash"></span> Delete</button>
									<?php include('edit_modal.php'); ?>
									</td>
								</tr>
							<?php
						}
					
					?>
				</tbody>
			</table>
		<?php
	}

?>