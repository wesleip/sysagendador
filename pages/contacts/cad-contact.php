<header class="mt-2">
    <h3><i class="bi bi-person-plus-fill"></i> Cadastro novo contato</h3>
</header>
<div>
    <form class="needs-validation" action="index.php?menuop=insert-contact" method="post" novalidate>
        <div class="mb-2">
            <label class="form-label" for="nomeContato">Nome</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                <input class="form-control" type="text" name="nomeContato" required>
                <div class="valid-feedback">
                    Nome inserido corretamente
                </div>
                <div class="invalid-feedback">
                    Campo de preenchimento obrigatório
                </div>
            </div>
        </div>
        <div class="mb-2">
            <label class="form-label" for="emailContato">E-mail</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-envelope-at-fill"></i></span>
                <input class="form-control" type="email" name="emailContato" required>
            </div>
        </div>
        <div class="mb-2">
            <label class="form-label" for="telefoneContato">Telefone</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                <input class="form-control" type="text" name="telefoneContato" required>
            </div>
        </div>
        <div class="mb-2">
            <label class="form-label" for="enderecoContato">Endereço</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-mailbox2"></i></span>
                <input class="form-control" type="text" name="enderecoContato" required>
            </div>
        </div>
        <div class="row">
        <div class="mb-2 col-4">
            <label class="form-label" for="sexoContato">Sexo</label>
            <div class="input-group">
            <span class="input-group-text"><i class="bi bi-gender-ambiguous"></i></span>
            <select class="form-select custom-select" name="sexoContato" id="sexoContato" required>
                <option selected>Selecione o sexo</option>
                <option value="M">Masculino</option>
                <option value="F">Feminino</option>
            </select>
            </div>
        </div>
        <div class="mb-2 col-4">
            <label class="form-label" for="dataNascContato">Data de Nascimento</label>
            <div class="input-group">
            <span class="input-group-text"><i class="bi bi-calendar-heart-fill"></i></span>
            <input class="form-control" type="date" name="dataNascContato" required>
            </div>
        </div>
        </div>
        <div>
            <input class="btn btn-success mt-2" type="submit" value="Adicionar" name="btnAdicionar">
        </div>
    </form>
</div>