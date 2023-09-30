<?php
switch ($_REQUEST["acao"]) {
    case 'cadastrar':

        $nome = $_POST["nome"];
        $cpf = $_POST["cpf"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $usuario = $_POST["usuario"];
        $tipo = $_POST["tipo"];

        $sql = "SELECT * FROM usuarios WHERE cpf = '$_POST[cpf]'";
        $res = mysqli_query($conn, $sql);
        $data = mysqli_fetch_array($res, MYSQLI_NUM);

        // Se for 0 não tem CPF no registro, e tem 1 na lista o CPF no registro
        if ($data[0] > 0) {
            print "<script>alert(' CPF encontrado com outro usuario, não foi possivel cadastrar!!!');</script>";
            print "<script>location.href='?page=listar';</script>";
        } else {
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
        }




        /*      $sql = "INSERT INTO usuarios (nome, cpf, email, senha, usuario, tipo) 
                VALUES ('{$nome}', '{$cpf}', '{$email}', '{$senha}', '{$usuario}', '{$tipo}')";
        $res = $conn->query($sql);
        if ($res == true) {
            print "<script>alert('Cadastro com sucesso!!!');</script>";
            print "<script>location.href='?page=listar';</script>";
        } else {
            print "<script>alert('Não foi possivel cadastrar!!!');</script>";
            print "<script>location.href='?page=listar';</script>";
        }  */
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
