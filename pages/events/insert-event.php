<header class="mt-2">
    <h3><i class="bi bi-calendar-check"></i> Inserir novo evento</h3>
</header>

<?php
$tituloEvento = strip_tags(mysqli_real_escape_string($conexao, $_POST['tituloEvento']));
$descricaoEvento = strip_tags(mysqli_real_escape_string($conexao, $_POST['descricaoEvento']));
$dataInicioEvento = strip_tags(mysqli_real_escape_string($conexao, $_POST['dataInicioEvento']));
$dataFimEvento = strip_tags(mysqli_real_escape_string($conexao, $_POST['dataFimEvento']));
$horaInicioEvento = strip_tags(mysqli_real_escape_string($conexao, $_POST['horaInicioEvento']));
$horaFimEvento = strip_tags(mysqli_real_escape_string($conexao, $_POST['horaFimEvento']));

$sql = "INSERT INTO tbeventos 
(
    tituloEvento,
    descricaoEvento,
    dataInicioEvento,
    dataFimEvento,
    horaInicioEvento,
    horaFimEvento
)
VALUES
(
    '{$tituloEvento}',
    '{$descricaoEvento}',
    '{$dataInicioEvento}',
    '{$dataFimEvento}',
    '{$horaInicioEvento}',
    '{$horaFimEvento}'
)
";

$rs = mysqli_query($conexao, $sql);

if ($rs) {
?>
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Sucesso!</h4>
        <p>Evento Inserido com êxito.</p>
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
  <p>Não foi possível inserir o Evento. Tente novamente.</p>
  <hr>
  <p class="mb-0">
    <a href="?menuop=events">Voltar a lista de Eventos</a>
  </p>
</div>
    <?php
}

?>