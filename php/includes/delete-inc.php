<?php
if(isset($_GET['livreid'])){
    require './database-inc.php';
    $query = "DELETE FROM livre WHERE id_livre = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $query)) {
        header('location: ../../index.php?error=stmtfailed');
        exit();
    }
    mysqli_stmt_bind_param($stmt, "i", $_GET['livreid']);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header('location: ../../index.php?error=deletesucceed');

}else{
    header('location: ../../index.php?error=stmtfailed');
    exit();
}