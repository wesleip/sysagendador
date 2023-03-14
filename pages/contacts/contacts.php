<?php
$txt_pesquisa = (isset($_POST["txt_pesquisa"])) ? $_POST["txt_pesquisa"] : "";
?>

<header class="mt-2">
    <h3><i class="bi bi-person-square"></i> Contatos</h3>
</header>
<div>
    <a class="btn btn-secondary btn-sm mb-2" href="index.php?menuop=cad-contact"><i class="bi bi-person-plus-fill"></i> Novo Contato</a>
</div>
<div>
    <form action="index.php?menuop=contacts" method="post">
        <div class="input-group">
            <input class="form-control" type="text" name="txt_pesquisa" value="<?= $txt_pesquisa ?>">
            <button class="btn btn-success btn-sm" type="submit"><i class="bi bi-search"></i> Pesquisar</button>
        </div>
    </form>
</div>
<div class=mt-3>
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>
                    <i class="bi bi-star-fill"></i>
                </th>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Endereço</th>
                <th>Sexo</th>
                <th>Data de Nascimento</th>
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
        idContato,
        upper(nomeContato) AS nomeContato,
        lower(emailContato) AS emailContato,
        telefoneContato,
        upper(enderecoContato) AS enderecoContato,
        CASE
        WHEN sexoContato='F' THEN 'FEMININO'
        WHEN sexoContato='M' THEN 'MASCULINO'
        ELSE
        'NÃO ESPECIFICADO'
        END AS sexoContato,
        DATE_FORMAT(dataNascContato,'%d/%m/%Y') AS dataNascContato,
        flagFavoritoContato
        FROM tbcontatos 
        WHERE 
        emailContato='{$txt_pesquisa}' or
        nomeContato LIKE '%{$txt_pesquisa}%' 
        ORDER BY flagFavoritoContato DESC, nomeContato ASC
        LIMIT $inicio , $quantidade
        ";
            $rs = mysqli_query($conexao, $sql) or die("Erro ao executar a consulta!" . mysqli_error($conexao));
            while ($dados = mysqli_fetch_assoc($rs)) {

            ?>
                <tr>
                    <td>
                        <?php
                        if ($dados["flagFavoritoContato"] == 1) {
                            echo "<a href=\"#\" class=\"flagFavoritoContato link-warning\" title=\"Favorito\" id=\"{$dados["idContato"]}\">
                                <i class=\"bi bi-star-fill\"></i>
                                </a>";
                        } else {
                            echo "<a href=\"#\" class=\"flagFavoritoContato link-warning\" title=\"Não Favorito\" id=\"{$dados["idContato"]}\">
                                <i class=\"bi bi-star\"></i>
                                </a>";
                        };
                        ?>
                    </td>
                    <td><?= $dados["idContato"] ?></td>
                    <td class="text-nowrap"><?= $dados["nomeContato"] ?></td>
                    <td class="text-nowrap"><?= $dados["emailContato"] ?></td>
                    <td class="text-nowrap"><?= $dados["telefoneContato"] ?></td>
                    <td class="text-nowrap"><?= $dados["enderecoContato"] ?></td>
                    <td><?= $dados["sexoContato"] ?></td>
                    <td><?= $dados["dataNascContato"] ?></td>
                    <td class="text-center"><a class="btn btn-warning btn-sm" href="index.php?menuop=edit-contact&idContato=<?= $dados["idContato"] ?>"><i class="bi bi-pencil-square"></i></a></td>
                    <td class="text-center"><a class="btn btn-danger btn-sm" href="index.php?menuop=delete-contact&idContato=<?= $dados["idContato"] ?>"><i class="bi bi-trash-fill"></i></a></td>

                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<ul class="pagination justify-content-center">
    <?php

    $sqlTotal = "SELECT idContato FROM tbcontatos";
    $qrTotal = mysqli_query($conexao, $sqlTotal) or die(mysqli_error($conexao));
    $numTotal = mysqli_num_rows($qrTotal);

    $totalPagina = ceil($numTotal / $quantidade);

    echo "<li class='page-item'><span class='page-link'>Total de Registros: $numTotal </span></li> &nbsp";

    echo '<li class="page-item"><a class="page-link" href="menuop=contacts&pagina=1">Primeira Página</a></li>';

    if ($pagina > 6) {
    ?>
        <li class="page-item"><a class="page-link" href="?menuop=contact&pagina=<?php echo $pagina - 1 ?>">
                << </a>
        </li>
    <?php
    }

    for ($i = 1; $i <= $totalPagina; $i++) {

        if ($i >= ($pagina - 5) && $i <= ($pagina + 5)) {
            if ($i == $pagina) {
                echo "<li class='page-item active'><span class='page-link' href='#'>$i</span></li>";
            } else {
                echo "<li class='page-item'><a class='page-link' href=\"?menuop=contacts&pagina=$i\">$i</a></li> ";
            }
        }
    }

    if ($pagina < ($totalPagina - 5)) {
    ?>
        <li class="page-item"><a class="page-link" href="?menuop=contact&pagina=<?php echo $pagina + 1 ?>"> >> </a></li>
    <?php
    }

    echo "<li class='page-item'><a class='page-link' href=\"menuop=contacts&pagina=$totalPagina\">Ultima Pagina</a></li>";

    ?>
</ul>