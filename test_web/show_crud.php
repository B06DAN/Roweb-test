<?php
include('conn.php');
if (isset($_POST['show'])) {
    ?>
    <table class = "table table-bordered alert-warning table-hover">
        <thead>
        <th>Title</th>
        <th>Text</th>
        <th>Category</th>
        <!--<th>Image</th>-->
        <th>Action</th>
    </thead>
    <tbody>
        <?php
        $qcrud = mysqli_query($conn, "select * from `crud`");
        while ($urow = mysqli_fetch_array($qucrud)) {
            ?>
            <tr>
                <td><?php echo $urow['title']; ?></td>
                <td><?php echo $urow['text']; ?></td>
                <td><?php echo $urow['category']; ?></td>
                <td><button class="btn btn-success" data-toggle="modal" data-target="#edit<?php echo $urow['id']; ?>"><span class = "glyphicon glyphicon-pencil"></span> Edit</button> | <button class="btn btn-danger delete" value="<?php echo $urow['id']; ?>"><span class = "glyphicon glyphicon-trash"></span> Delete</button>
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