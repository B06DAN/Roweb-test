<div class="modal fade" id="edit<?php echo $urow['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <?php
    $n=mysqli_query($conn,"select * from `user` where id='".$urow['id']."'");
    $nrow=mysqli_fetch_array($n);
    ?>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class = "modal-header">

                <center><h3 class = "text-success modal-title">Update Member</h3></center>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form class="form-inline">
                <div class="modal-body">
                    title: <input type="text" value="<?php echo $nrow['title']; ?>" id="utitle<?php echo $urow['id']; ?>" class="form-control">
                    text: <input type="text" value="<?php echo $nrow['text']; ?>" id="utext<?php echo $urow['id']; ?>" class="form-control">
                    category: <input type="text" value="<?php echo $nrow['category']; ?>" id="ucategory<?php echo $urow['id']; ?>" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="updateuser btn btn-success" value="<?php echo $urow['id']; ?>"><span class = "glyphicon glyphicon-floppy-disk"></span> Save</button> | <button type="button" class="btn btn-default" data-dismiss="modal"><span class = "glyphicon glyphicon-remove"></span> Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>