<header class="mt-2">
    <h3>Atualizar contato</h3>
</header>

<?php
$idContato = mysqli_real_escape_string($conexao, $_POST["idContato"]);
$nomeContato = mysqli_real_escape_string($conexao, $_POST["nomeContato"]);
$emailContato = mysqli_real_escape_string($conexao, $_POST["emailContato"]);
$telefoneContato = mysqli_real_escape_string($conexao, $_POST["telefoneContato"]);
$sexoContato = mysqli_real_escape_string($conexao, $_POST["sexoContato"]);
$enderecoContato = mysqli_real_escape_string($conexao, $_POST["enderecoContato"]);
$dataNascContato = mysqli_real_escape_string($conexao, $_POST["dataNascContato"]);
$sql = "UPDATE tbcontatos SET 
    nomeContato = '{$nomeContato}',
    emailContato = '{$emailContato}',
    telefoneContato = '{$telefoneContato}',
    sexoContato = '{$sexoContato}',
    enderecoContato = '{$enderecoContato}',
    dataNascContato = '{$dataNascContato}'
    WHERE idContato = '{$idContato}'
    ";
$rs = mysqli_query($conexao, $sql) or die("Erro ao atualizar os dados" . mysqli_error($conexao));

if ($rs) {
    ?>
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Sucesso!</h4>
            <p>Contato Atualizado com êxito.</p>
            <hr>
            <p class="mb-0">
                <a href="?menuop=contacts">Voltar para lista de contatos</a>
            </p>
        </div>
    <?php
    } else {
        ?>
        <div class="alert alert-danger" role="alert">
      <h4 class="alert-heading">Atenção!</h4>
      <p>Não foi possível atualizar o contato. Tente novamente.</p>
      <hr>
      <p class="mb-0">
        <a href="?menuop=contacts">Voltar a lista de contatos</a>
      </p>
    </div>
        <?php
    }
?>