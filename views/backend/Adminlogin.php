<?php $title = "Administration" ?>

<?php ob_start(); ?>


<div class="container">
    <div class="row justify-content-center align-items-center" style="height:100vh">
            <div class="card">
                <div class="card-body">
                    <form action="index.php?action=admin" method="POST" autocomplete="off">
                        <div class="form-group">
                            <input type="text" class="form-control" name="login">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="pw">
                        </div>
                        <button type="submit" name="connexion" id="sendlogin" class="btn btn-primary">Connexion</button>
                    </form>
                </div>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('views/template.php'); ?>
