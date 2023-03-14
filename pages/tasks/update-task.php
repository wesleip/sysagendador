<header class="mt-2">
    <h3><i class="bi bi-list-task"></i> Atualizar Tarefa</h3>
</header>

<?php
$idTarefa = strip_tags(mysqli_real_escape_string($conexao, $_POST['idTarefa']));
$tituloTarefa = strip_tags(mysqli_real_escape_string($conexao, $_POST['tituloTarefa']));
$descricaoTarefa = strip_tags(mysqli_real_escape_string($conexao, $_POST['descricaoTarefa']));
$dataConclusaoTarefa = strip_tags(mysqli_real_escape_string($conexao, $_POST['dataConclusaoTarefa']));
$horaConclusaoTarefa = strip_tags(mysqli_real_escape_string($conexao, $_POST['horaConclusaoTarefa']));
$dataLembreteTarefa = strip_tags(mysqli_real_escape_string($conexao, $_POST['dataLembreteTarefa']));
$horaLembreteTarefa = strip_tags(mysqli_real_escape_string($conexao, $_POST['horaLembreteTarefa']));
$recorrenciaTarefa = strip_tags(mysqli_real_escape_string($conexao, $_POST['recorrenciaTarefa']));

$sql = "UPDATE tbtarefas SET
tituloTarefa = '{$tituloTarefa}',
descricaoTarefa = '{$descricaoTarefa}',
dataConclusaoTarefa = '{$dataConclusaoTarefa}',
horaConclusaoTarefa = '{$horaConclusaoTarefa}',
dataLembreteTarefa = '{$dataLembreteTarefa}',
horaLembreteTarefa = '{$horaLembreteTarefa}',
recorrenciaTarefa = '{$recorrenciaTarefa}'
WHERE idTarefa = '{$idTarefa}'
";
$rs = mysqli_query($conexao,$sql) or die("Erro ao executar a consulta" . mysqli_error($conexao));
if ($rs) {
    ?>
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Sucesso!</h4>
            <p>Tarefa Atualizada com êxito.</p>
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
      <p>Não foi possível atualizar a tarefa. Tente novamente.</p>
      <hr>
      <p class="mb-0">
        <a href="?menuop=tasks">Voltar a lista de tarefas</a>
      </p>
    </div>
        <?php
    }
?>