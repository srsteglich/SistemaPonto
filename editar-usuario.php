<h1>Alterar Usuário</h1>
<?php
$sql = "SELECT * FROM usuarios WHERE id=" . $_REQUEST["id"];
$res = $conn->query($sql);
$row = $res->fetch_object();
?>

<form action="?page=salvar" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id" value="<?php print $row->id; ?>">
    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="nome" value="<?php print $row->nome; ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label>E-mail</label>
        <input type="email" name="email" value="<?php print $row->email; ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label>CPF</label>
        <input type="text" name="cpf" value="<?php print $row->cpf; ?>" class="form-control">
    </div>

    <div class="mb-3">
        <label>Usuario</label>
        <input type="text" name="usuario" value="<?php print $row->usuario; ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label>Senha</label>
        <input type="password" name="senha" value="<?php print $row->senha; ?>" class="form-control">
    </div>

    <div class="mb-3">
        <label>Tipo</label>
        <input type="text" name="tipo" value="<?php print $row->tipo; ?>" class="form-control">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Enviar</button>
        <a class="btn btn-success" href="?page=listar">Voltar</a>
    </div>
</form>