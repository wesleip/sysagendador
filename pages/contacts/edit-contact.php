<?php
$idContato = $_GET["idContato"];

$sql = "SELECT * FROM tbcontatos WHERE idContato= {$idContato}";
$rs = mysqli_query($conexao, $sql) or die("Erro ao recuperar os dados do registro." . mysqli_error($conexao));
$dados = mysqli_fetch_assoc($rs);
?>
<header class="mt-2">
    <h3><i class="bi bi-pencil-square"></i> Editar Contato</h3>
</header>
<div class="row">
    <div class="col-6">
        <form action="index.php?menuop=atualizar-contact" method="post">
            <label class="form-label" for="idContato">ID</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-key-fill"></i></span>
                <input class=form-control type="text" name="idContato" value="<?= $dados["idContato"] ?>" readonly>
            </div>
            <label class="form-label" for="nomeContato">Nome</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                <input class=form-control type="text" name="nomeContato" value="<?= $dados["nomeContato"] ?>">
            </div>
            <div class="mb-2">
                <label class="form-label" for="emailContato">E-mail</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope-at-fill"></i></span>
                    <input class=form-control type="email" name="emailContato" value="<?= $dados["emailContato"] ?>">
                </div>
            </div>
            <div class="mb-2">
                <label class="form-label" for="telefoneContato">Telefone</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                    <input class=form-control type="text" name="telefoneContato" value="<?= $dados["telefoneContato"] ?>">
                </div>
            </div>
            <div class="mb-2">
                <label class="form-label" for="enderecoContato">Endereço</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-mailbox2"></i></span>
                    <input class=form-control type="text" name="enderecoContato" value="<?= $dados["enderecoContato"] ?>">
                </div>
            </div>
            <label class="form-label" for="sexoContato">Sexo</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-gender-ambiguous"></i></span>
                <select class="form-select custom-select" name="sexoContato" id="sexoContato">
                    <option <?php echo ($dados['sexoContato'] == '') ? 'selected' : '' ?> value="">Selecione o sexo</option>
                    <option <?php echo ($dados['sexoContato'] == 'M') ? 'selected' : '' ?> value="M">Masculino</option>
                    <option <?php echo ($dados['sexoContato'] == 'F') ? 'selected' : '' ?> value="F">Feminino</option>
                </select>
            </div>
            <div class="mb-2">
                <label class="form-label" for="dataNascContato">Data de Nascimento</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-calendar-heart-fill"></i></span>
                    <input class=form-control type="date" name="dataNascContato" value="<?= $dados["dataNascContato"] ?>">
                </div>
            </div>
            <div class="mb-2">
                <input class="btn btn-success mt-2 mb-5" type="submit" value="Atualizar" name="btnAtualizar">
            </div>
        </form>
    </div>

    <div class="col-6">
        <?php
        if ($dados["nomeFotoContato"] == "" || !file_exists('./pages/contacts/fotos-contatos/' . $dados["nomeFotoContato "])) {
            $nomeFoto = "SemFoto.jpg";
        } else {
            $nomeFoto = $dados["nomeFotoContato"];
        }
        ?>
        <div class="mb-3">
            <img id="foto-contato" class="img-fluid img-thumbnail" src="./pages/contacts/fotos-contatos/<?= $nomeFoto ?>$nomeFoto" alt="Foto do Contato" width="200">
        </div>
        <div class="mb-3">
            <button class="btn btn-info" id="btn-editar-foto">
                <i class="bi bi-camera-fill"></i> Editar foto
            </button>
        </div>
        <div id="editar-foto">
            <form id="form-upload-foto" class="mb-3" action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="idContato" value="<?= $idContato ?>">
                <label class="form-label" for="arquivo">Selecionar um arquivo de imagem</label>
                <div class="input-group">
                    <input class="form-control" type="file" name="arquivo" id="arquivo">
                    <input id="btn-enviar-foto" class="btn btn-secondary" type="submit" value="Enviar">
                </div>
            </form>
            <div id="mensagem" class="mb-3 alert alert-success">
                Upload realizado com sucesso!
            </div>
            <div id="preloader" class="progress">
                <div id="barra" class="progress-bar bg-danger" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%
                </div>
            </div>
        </div>
    </div>
</div>