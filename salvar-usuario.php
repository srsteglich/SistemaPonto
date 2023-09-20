<?php
switch ($_REQUEST["acao"]) {
    case 'cadastrar':
        $nome = $_POST["nome"];
        $cpf = $_POST["cpf"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $usuario = $_POST["usuario"];
        $tipo = $_POST["tipo"];

        $sql = "INSERT INTO usuarios (nome, cpf, email, senha, usuario, tipo) 
                VALUES ('{$nome}', '{$cpf}', '{$email}', '{$senha}', '{$usuario}', '{$tipo}')";
        $res = $conn->query($sql);
        if ($res == true) {
            print "<script>alert('Cadastro com sucesso!!!');</script>";
            print "<script>location.href='?page=listar';</script>";
        } else {
            print "<script>alert('Não foi possivel cadastrar!!!');</script>";
            print "<script>location.href='?page=listar';</script>";
        }
        break;
    case 'editar':
        $nome = $_POST["nome"];
        $cpf = $_POST["cpf"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $usuario = $_POST["usuario"];
        $tipo = $_POST["tipo"];

        $sql = "UPDATE usuarios SET nome='{$nome}', cpf='{$cpf}', email='{$email}', senha='{$senha}', usuario='{$usuario}', tipo='{$tipo}'
                WHERE id=" . $_REQUEST["id"];

        $res = $conn->query($sql);
        if ($res == true) {
            print "<script>alert('Alterado com sucesso!!!');</script>";
            print "<script>location.href='?page=listar';</script>";
        } else {
            print "<script>alert('Não foi possivel alterar!!!');</script>";
            print "<script>location.href='?page=listar';</script>";
        }
        break;
    case 'excluir':

        $sql = "DELETE FROM usuarios WHERE id=" . $_REQUEST["id"];

        $res = $conn->query($sql);
        if ($res == true) {
            print "<script>alert('Excluido com sucesso!!!');</script>";
            print "<script>location.href='?page=listar';</script>";
        } else {
            print "<script>alert('Não foi possivel excluir!!!');</script>";
            print "<script>location.href='?page=listar';</script>";
        }
        break;
}
