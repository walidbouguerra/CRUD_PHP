<?php
include_once "php/header.php";
?>
<main>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h3>Bibliothèque
                            <a href="./php/create.php" class="btn btn-primary float-end">Ajouter un livre</a>
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
                        }elseif ($_GET['error'] == 'deletesucceed'){
                            echo "
                                <div class=\"alert alert-success\" role=\"alert\">
                                Le livre est bien supprimé.
                                </div>
                                ";
                        }
                        elseif ($_GET['error'] == 'modifie'){
                            echo "
                                <div class=\"alert alert-success\" role=\"alert\">
                                Le livre est bien modifié.
                                </div>
                                ";
                        }
                    }
                    ?>
                        <table class="table table-bordered table-striped ">
                            <thead>
                                <tr>
                                    <th>Titre</th>
                                    <th>Auteur</th>
                                    <th>Pages</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include_once "php/includes/read-inc.php"
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<?php
include_once "php/footer.php";
?>