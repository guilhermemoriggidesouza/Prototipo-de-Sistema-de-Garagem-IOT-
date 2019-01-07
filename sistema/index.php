<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Sistema Garagem</title>
        <script src="javascript/jquery.js"></script>
        <script src="javascript/funcoes.js?id=<?php echo date('h:m');?>"></script>
        <link rel="stylesheet" href="style.css?id=<?php echo date('h');?>">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    </head>   
    <body>
        <div>
            <?php
            
            $temp = date('h');
            
            $date = date('d:m:y');
            
            ?>
                <span id="sistema"></span>
                <div class="row">
                    <button type="button" class="btn btn-primary col-md-5 col-sm-5 col-lg-5 ml-auto" onclick="addButton();"><h1 class="display-1">liga</h1></button>
                    <button type="button" class="btn btn-primary col-md-5 col-sm-5 col-lg-5 ml-5 mr-auto" onclick="removeButton();"><h1 class="display-1">desliga</h1></button>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <span id="dados"></span>
                    </div>
                </div>
        </div>
        <span id = "gif"></span>
        <!-- Bootstrap Javascript-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js?id=2"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    </body>
</html>