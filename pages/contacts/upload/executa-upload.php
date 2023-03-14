<?php
set_time_limit(0);
include_once('../../../db/connection.php');

$extensoes_validas = array(".jpg",".png",".bmp");
$caminho_absoluto = "../fotos-contatos";
$tamanho_bites = 5000000;

if(isset($_FILES['arquivo']['name'])):
    $idContato = $_POST['idContato'];
    $nome_arquivo = $_FILES['arquivo']['name'];
    $extensao = strrchr($nome_arquivo,'.');
    $tamanho_arquivo = $_FILES['arquivo']['size'];
    $arquivo_temporario = $_FILES['arquivo']['tmp_name'];
    $nome_arquivo_novo = $idContato . $extensao;
    if($tamanho_arquivo > $tamanho_bites):
        die("Arquivo máximo permitido {$tamnho_bytes} bytes.;aviso");
    endif;

    if(!in_array($extensao,$extensoes_validas)):
        die("Extensão inválida para o upload;aviso");
    endif;

    if(move_uploaded_file($arquivo_temporario,"$caminho_absoluto/$nome_arquivo_novo")):
        $sql = "UPDATE tbcontatos SET nomeFotoContato= '{$nome_arquivo_novo}' WHERE idContato = '{$idContato}'";
        mysqli_query($conexao,$sql);
        echo "./pages/contacts/foto-contatos/{$nome_arquivo_novo};concluido";
    else:
        die("O arquivo não pode ser enviado ao servidor.;erro");
    endif;
else:
    die("Selecione um arquivo para fazer upload.;aviso");
endif;