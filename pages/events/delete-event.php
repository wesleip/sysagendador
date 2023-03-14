<header class="mt-2">
    <h3>Excluir Evento</h3>
</header>

<?php
    $idEvento = mysqli_real_escape_string($conexao,$_GET["idEvento"]);
    $sql = "DELETE FROM tbeventos WHERE idEvento = '{$idEvento}'";

   $rs = mysqli_query($conexao,$sql) or die("Erro ao excluir o registro. " . mysqli_error($conexao));
    if ($rs) {
        ?>
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Sucesso!</h4>
                <p>Evento Removido com êxito.</p>
                <hr>
                <p class="mb-0">
                    <a href="?menuop=events">Voltar para lista de Eventos</a>
                </p>
            </div>
        <?php
        } else {
            ?>
            <div class="alert alert-danger" role="alert">
          <h4 class="alert-heading">Atenção!</h4>
          <p>Não foi possível remover o Evento. Tente novamente.</p>
          <hr>
          <p class="mb-0">
            <a href="?menuop=events">Voltar a lista de Eventos</a>
          </p>
        </div>
            <?php
        }
?>