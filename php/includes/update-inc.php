<?php
if(isset($_GET['livreid'])){
    if(isset($_POST['submit'])){
        require 'database-inc.php';
        $titre = htmlspecialchars($_POST['titre']);
        $auteur = htmlspecialchars($_POST['auteur']);
        $pages = htmlspecialchars($_POST['pages']);
        $query = "UPDATE livre SET titre = ?, auteur = ?, pages = ? WHERE id_livre = ?;";
        $stmt = mysqli_stmt_init($conn);
    
        if (!mysqli_stmt_prepare($stmt, $query)) {
            header('location: ../../index.php?error=stmtfailed');
            exit();
        }
        mysqli_stmt_bind_param($stmt, "sssi", $titre, $auteur, $pages, $_GET['livreid']);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header('location: ../../index.php?error=modifie');
        exit();
    } else{
        header('location: ../../index.php?error=stmtfailed');
        exit();
    }
}else{
    header('location: ../../index.php?error=stmtfailed');
    exit();
}


