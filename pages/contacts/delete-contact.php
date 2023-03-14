<header class="mt-2">
    <h3>Excluir Contato</h3>
</header>

<?php
    $idContato = mysqli_real_escape_string($conexao,$_GET["idContato"]);
    $sql = "DELETE FROM tbcontatos WHERE idContato = '{$idContato}'";

   $rs = mysqli_query($conexao,$sql) or die("Erro ao excluir o registro. " . mysqli_error($conexao));
    if ($rs) {
        ?>
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Sucesso!</h4>
                <p>Contato Removido com êxito.</p>
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
          <p>Não foi possível remover o contato. Tente novamente.</p>
          <hr>
          <p class="mb-0">
            <a href="?menuop=contacts">Voltar a lista de contatos</a>
          </p>
        </div>
            <?php
        }
?>