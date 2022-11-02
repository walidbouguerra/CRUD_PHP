<?php

if(isset($_POST['submit'])){
    if(empty($_POST['titre'])){
        header('location: ../create.php?error=empty');
        exit();
    } else {
        require 'database-inc.php';
        $titre = htmlspecialchars($_POST['titre']);
        $auteur = !empty(htmlspecialchars($_POST['auteur'])) ? htmlspecialchars($_POST['auteur']) : NULL;
        $pages = !empty(htmlspecialchars($_POST['pages'])) ? htmlspecialchars($_POST['pages']) : NULL;
        $query = "INSERT INTO livre (titre, auteur, pages) VALUES (?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
    
        if (!mysqli_stmt_prepare($stmt, $query)) {
            header('location: ../create.php?error=stmtfailed');
            exit();
        }
    
        mysqli_stmt_bind_param($stmt, "sss", $titre, $auteur, $pages);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header('location: ../create.php?error=ajoute');
        exit();
    }
} else{
    header('location: ../create.php?error=stmtfailed');
    exit();
}


