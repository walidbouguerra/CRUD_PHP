<?php
include_once "header.php";
include_once "./includes/database-inc.php"
?>
<div class="container my-5">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0">Modifier un livre
                        <a href="../index.php" class="btn btn-danger float-end">Retour</a>
                    </h3>
                </div>
                <div class="card-body">
                    <?php 
                        if(isset($_GET['livreid'])){
                        $id = $_GET['livreid'];
                        $query = "SELECT * FROM livre WHERE id_livre = ?";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt, $query)) {
                            header('location: ../index.php?error=stmtfailed');
                            exit();
                        }
                        mysqli_stmt_bind_param($stmt, "i", $id);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        $row = mysqli_fetch_assoc($result);
                        mysqli_stmt_close($stmt);
                        } 
                    ?>
                    <form action="./includes/update-inc.php?livreid=<?= $id ?? null?>" method="POST">
                        <div class="mb-3">
                            <label for="titre">Titre</label>
                            <input type="text" name="titre" value="<?= $row['titre'] ?? null?>" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="auteur">Auteur</label>
                            <input type="text" name="auteur" value="<?= $row['auteur'] ?? null?>" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="nbPage">Pages</label>
                            <input type="text" name="pages" value="<?= $row['pages'] ?? null?>" class="form-control">
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="submit" class="btn btn-primary">Modifier</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once "footer.php";
?>