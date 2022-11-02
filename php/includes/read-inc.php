<?php 
require 'database-inc.php';
$query = "SELECT * FROM livre;";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $query)) {
    header('location: index.php?error=stmtfailed');
    exit();
} else {
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if(mysqli_num_rows($result) > 0){
        foreach($result as $livre){ ?>
            <tr>
                <td><?= $livre['titre'] ?></td>
                <td><?= $livre['auteur'] ?></td>
                <td><?= $livre['pages'] ?></td>
                <td><a href="./php/update.php?livreid=<?= $livre['id_livre']?>" class="btn btn-success btn-sm">Modifier</a>
                <a href="php/includes/delete-inc.php?livreid=<?= $livre['id_livre']?>" class="btn btn-danger btn-sm">Supprimer</a></td>
            </tr>
        <?php }
    }else{
        echo "<h5>No record found </h5>";
    }
    // header('location: ../create.php?error=ajoute');
    // exit();
}

    




