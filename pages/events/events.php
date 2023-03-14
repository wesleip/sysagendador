<?php
    $txt_pesquisa = (isset($_POST["txt_pesquisa"])) ? $_POST["txt_pesquisa"] : "";

    $idEvento = (isset($_GET['idEvento']))?$_GET['idEvento'] :"";
    $statusEvento = (isset($_GET['statusEvento']) and $_GET['statusEvento']=='0')?'1':'0';

    $sql = "UPDATE tbeventos SET statusEvento = {$statusEvento} WHERE idEvento = {$idEvento}";
    $rs = mysqli_query($conexao, $sql);

?>

<header class="mt-2">
    <h3><i class="bi bi-calendar-check"></i> Eventos</h3>
</header>

<div>
    <a class="btn btn-secondary btn-sm mb-2" href="index.php?menuop=cad-event"><i class="bi bi-calendar-check"></i> 
    Novo Evento</a>
</div>
<div>
    <form action="index.php?menuop=events" method="post">
        <div class="input-group">
        <input class="form-control" type="text" name="txt_pesquisa" value="<?=$txt_pesquisa?>">
        <button class="btn btn-success btn-sm" type="submit"><i class="bi bi-search"></i> Pesquisar</button>
        </div>
    </form>
</div>
<div class=mt-3>
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>Status</th>
                <th>Titulo</th>
                <th>Descrição</th>
                <th>Data de inicio</th>
                <th>Hora de inicio</th>
                <th>Data de fim</th>
                <th>Hora de fim</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody class="">
            <?php

            $quantidade = 10;

            $pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;

            $inicio = ($quantidade * $pagina) - $quantidade;

            $sql = "SELECT
            idEvento, 
            statusEvento,
            tituloEvento,
            descricaoEvento,
            DATE_FORMAT(dataInicioEvento, '%d/%m/%Y') AS dataInicioEvento,
            horaInicioEvento,
            DATE_FORMAT(dataFimEvento, '%d/%m/%Y') AS dataFimEvento,
            horaFimEvento
            FROM tbeventos
            WHERE 
            tituloEvento LIKE '%{$txt_pesquisa}%' OR
            descricaoEvento LIKE '%{txt_pesquisa}%' OR
            DATE_FORMAT(dataFimEvento, '%d/%m/%Y') LIKE '%{txt_pesquisa}%'
            ORDER BY statusEvento , dataFimEvento
        LIMIT $inicio , $quantidade
        ";
            $rs = mysqli_query($conexao, $sql) or die("Erro ao executar a consulta!" . mysqli_error($conexao));
            while ($dados = mysqli_fetch_assoc($rs)) {

            ?>
                <tr>
                    <td>
                        <a class="btn btn-secondary btn-sm" href="index.php?menuop=events&pagina=<?=$pagina?>&idEvento=<?=$dados['idEvento']?>&statusEvento=<?=$dados['statusEvento']?>" >
                            <?php
                                if($dados['statusEvento']==0){
                                    echo '<i class="bi bi-square"></i>';
                                }else{
                                    echo '<i class="bi bi-check-square"></i>';
                                }
                            ?>
                        </a>
                    </td>
                    <td class="text-nowrap"><?= $dados["tituloEvento"] ?></td>
                    <td class="text-nowrap"><?= $dados["descricaoEvento"] ?></td>
                    <td class="text-nowrap"><?= $dados["dataInicioEvento"] ?></td>
                    <td class="text-nowrap"><?= $dados["horaInicioEvento"] ?></td>
                    <td class="text-nowrap"><?= $dados["dataFimEvento"] ?></td>
                    <td class="text-nowrap"><?= $dados["horaFimEvento"] ?></td>

                    <td class="text-center"><a class="btn btn-warning btn-sm" href="index.php?menuop=edit-event&idEvento=<?= $dados["idEvento"] ?>"><i class="bi bi-pencil-square"></i></a></td>
                    <td class="text-center"><a class="btn btn-danger btn-sm" href="index.php?menuop=delete-event&idEvento=<?= $dados["idEvento"] ?>"><i class="bi bi-trash-fill"></i></a></td>

                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<ul class="pagination justify-content-center">
    <?php

    $sqlTotal = "SELECT idEvento FROM tbeventos";
    $qrTotal = mysqli_query($conexao, $sqlTotal) or die(mysqli_error($conexao));
    $numTotal = mysqli_num_rows($qrTotal);
    
    $totalPagina = ceil($numTotal / $quantidade);

    echo "<li class='page-item'><span class='page-link'>Total de Registros: $numTotal </span></li> &nbsp";

    echo '<li class="page-item"><a class="page-link" href="menuop=eventss&pagina=1">Primeira Página</a></li>';

    if ($pagina > 6) {
    ?>
        <li class="page-item"><a class="page-link" href="?menuop=events&pagina=<?php echo $pagina - 1 ?>">
            << </a></li>
            <?php
        }

        for ($i = 1; $i <= $totalPagina; $i++) {

            if ($i >= ($pagina - 5) && $i <= ($pagina + 5)) {
                if ($i == $pagina) {
                    echo "<li class='page-item active'><span class='page-link' href='#'>$i</span></li>";
                } else {
                    echo "<li class='page-item'><a class='page-link' href=\"?menuop=events&pagina=$i\">$i</a></li> ";
                }
            }
        }

        if ($pagina < ($totalPagina - 5)) {
            ?>
                <li class="page-item"><a class="page-link" href="?menuop=events&pagina=<?php echo $pagina + 1 ?>"> >> </a></li>
            <?php
        }

        echo "<li class='page-item'><a class='page-link' href=\"menuop=events&pagina=$totalPagina\">Ultima Pagina</a></li>";

            ?>
</ul>