<?php
include_once "../php/header.php";
?>
<div class="container my-5">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0">Ajouter un livre
                        <a href="../index.php" class="btn btn-danger float-end">Retour</a>
                    </h3>
                </div>
                <div class="card-body">
                    <?php
                    if(isset($_GET['error'])){
                        if($_GET['error'] == 'stmtfailed'){
                            echo "
                                <div class=\"alert alert-danger\" role=\"alert\">
                                Une erreur est survenue, veuillez réessayer.
                                </div>
                                ";
                        }elseif ($_GET['error'] == 'ajoute'){
                            echo "
                                <div class=\"alert alert-success\" role=\"alert\">
                                Le livre est bien enregistré.
                                </div>
                                ";
                        }
                        elseif ($_GET['error'] == 'empty'){
                            echo "
                                <div class=\"alert alert-danger\" role=\"alert\">
                                Vous devez ajouter un titre pour ajouter le livre.
                                </div>
                                ";
                        }
                    }
                    ?>
                    <form action="./includes/create-inc.php" method="POST">
                        <div class="mb-3">
                            <label for="titre">Titre</label>
                            <input type="text" name="titre" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="auteur">Auteur</label>
                            <input type="text" name="auteur" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="nbPage">Pages</label>
                            <input type="text" name="pages" class="form-control">
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="submit" class="btn btn-primary">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once "../php/footer.php";
?>