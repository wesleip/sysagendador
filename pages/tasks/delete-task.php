<header class="mt-2">
    <h3>Excluir Tarefa</h3>
</header>

<?php
    $idTarefa = mysqli_real_escape_string($conexao,$_GET["idTarefa"]);
    $sql = "DELETE FROM tbtarefas WHERE idTarefa = '{$idTarefa}'";

   $rs = mysqli_query($conexao,$sql) or die("Erro ao excluir o registro. " . mysqli_error($conexao));
    if ($rs) {
        ?>
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Sucesso!</h4>
                <p>Tarefa Removida com êxito.</p>
                <hr>
                <p class="mb-0">
                    <a href="?menuop=tasks">Voltar para lista de tarefas</a>
                </p>
            </div>
        <?php
        } else {
            ?>
            <div class="alert alert-danger" role="alert">
          <h4 class="alert-heading">Atenção!</h4>
          <p>Não foi possível remover a tarefa. Tente novamente.</p>
          <hr>
          <p class="mb-0">
            <a href="?menuop=tasks">Voltar a lista de tarefas</a>
          </p>
        </div>
            <?php
        }
?>