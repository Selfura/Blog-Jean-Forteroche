<?php $title = "Administration" ?>

<?php ob_start(); ?>


<div class="container">
    <div class="row justify-content-center align-items-center" style="height:100vh">
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <form action="" autocomplete="off">
                        <div class="form-group">
                            <input type="text" class="form-control" name="username">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password">
                        </div>
                        <a href="index.php?action=admin"><button type="button" id="sendlogin" class="btn btn-primary">Connexion</button></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('views/template.php'); ?>
