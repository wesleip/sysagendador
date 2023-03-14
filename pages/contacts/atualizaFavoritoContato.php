<?php
include("../../db/connection.php");
    $idContato = $_GET["idContato"];
    $flagFavoritoContato = $_GET["flagFavoritoContato"];

    $sql = "UPDATE tbcontatos SET flagFavoritoContato = {$flavFavoritoContato} WHERE idContato = {idContato}";

    mysqli_query($conexao,$sql);
?>

