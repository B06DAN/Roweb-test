<?php
include('conn.php');
?>
<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8" name = "viewport" content = "width-device=width, initial-scale=1" />
    <link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
    <title>CRUD</title>
</head>
<body>
<div style="height:30px;"></div>
<div class = "row">
    <div class = "col-md-3">
    </div>
    <div class = "col-md-6 well">
        <div class="row">
            <div class="col-lg-3">
                <center><h2 class = "text-primary">CRUD</h2></center>
                <hr>
                <div>
                    <form class = "form-inline">
                        <div class = "form-group">
                            <label>Title: </label>
                            <input type  = "text" id = "title" class = "form-control">
                        </div>
                        <div class = "form-group">
                            <label>Text: </label>
                            <input type  = "text" id = "text" class = "form-control">
                        </div>
                        <div class = "form-group">
                            <label>Category: </label>
                            <input type  = "text" id = "category" class = "form-control">
                        </div>
                        <div class = "form-group">
                            <button type = "button" id="addnew" class = "btn btn-primary"><span class = "glyphicon glyphicon-plus"></span> CREATE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div><br>
        <div class="row">
            <div id="userTable"></div>
        </div>
    </div>
</div>
</body>
<script src = "js/jquery-3.1.1.js"></script>
<script src = "js/bootstrap.js"></script>
<script type = "text/javascript">
    $(document).ready(function(){
        showUser();

        //Add New
        $(document).on('click', '#addnew', function(){
            if ($('#title').val()=="" || $('#text').val()=="" || $('#category').val()==""){
                alert('Please input data first');
            }
            else{
                $title=$('#title').val();
                $text=$('#text').val();
                $category=$('#category').val();
                $.ajax({
                    type: "POST",
                    url: "addnew.php",
                    data: {
                        title: $title,
                        text: $text,
                        category: $category,
                        add: 1,
                    },
                    success: function(){
                        showUser();
                    }
                });
            }
        });

        //Delete
        $(document).on('click', '.delete', function(){
            if(confirm('Are you sure?')){
                $id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "delete.php",
                    data: {
                        id: $id,
                        del: 1,
                    },
                    success: function () {
                        showUser();
                    }
                });
            }
        });

        //Update
        $(document).on('click', '.updateuser', function(){
            $uid=$(this).val();
            $('#edit'+$uid).modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
            $utitle=$('#utitle'+$uid).val();
            $utext=$('#utext'+$uid).val();
            $ucategory=$('#ucategory'+$uid).val();
            $.ajax({
                type: "POST",
                url: "update.php",
                data: {
                    id: $uid,
                    title: $utitle,
                    text: $utext,
                    category: $ucategory,
                    edit: 1,
                },
                success: function(){
                    showUser();
                }
            });
        });

    });

    //Showing our Table
    function showUser(){
        $.ajax({
            url: 'show_user.php',
            type: 'POST',
            async: false,
            data:{
                show: 1
            },
            success: function(response){
                $('#userTable').html(response);
            }
        });
    }

</script>
</html>