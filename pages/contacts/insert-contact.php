<header class="mt-2">
    <h3>Inserir contato</h3>
</header>

<?php
    $nomeContato = strip_tags(mysqli_real_escape_string($conexao,$_POST["nomeContato"]));
    $emailContato = strip_tags(mysqli_real_escape_string($conexao,$_POST["emailContato"]));
    $telefoneContato = strip_tags(mysqli_real_escape_string($conexao,$_POST["telefoneContato"]));
    $enderecoContato = strip_tags(mysqli_real_escape_string($conexao,$_POST["enderecoContato"]));
    $sexoContato = strip_tags(mysqli_real_escape_string($conexao,$_POST["sexoContato"]));
    $dataNascContato = strip_tags(mysqli_real_escape_string($conexao,$_POST["dataNascContato"]));
    $sql = "INSERT INTO tbcontatos (
        nomeContato,
        emailContato,
        telefoneContato,
        enderecoContato,
        sexoContato,
        dataNascContato)
    VALUES(
            '{$nomeContato}',
            '{$emailContato}',
            '{$telefoneContato}',
            '{$enderecoContato}',
            '{$sexoContato}',
            '{$dataNascContato}'
        )
        ";
        $rs = mysqli_query($conexao,$sql) or die("Erro ao executar a consulta" . mysqli_error($conexao));

        if ($rs) {
            ?>
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Sucesso!</h4>
                    <p>Contato Inserido com êxito.</p>
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
              <p>Não foi possível inserir o contato. Tente novamente.</p>
              <hr>
              <p class="mb-0">
                <a href="?menuop=contacts">Voltar a lista de contatos</a>
              </p>
            </div>
                <?php
            }
        echo "Contato adicionado com sucesso!";
?>