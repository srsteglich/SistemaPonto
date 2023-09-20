<?php
session_start();
if (empty($_POST) or (empty($_POST["nome"]) or (empty($_POST["senha"])))) {
    print "<script>alert('Usúario e/ou Senha incorreto(s)');</script>";
    //print "<script>location.href='index.php';</script>";
}
include('config.php');
$nome = $_POST["nome"];
$senha = $_POST["senha"];

$sql = "SELECT * FROM usuarios 
        WHERE nome = '$nome' AND senha = '$senha'";

$res = $conn->query($sql) or die($conn->error);
$row = $res->fetch_object();
$qtd = $res->num_rows;

if ($qtd > 0) {
    $_SESSION["nome"] = $nome;
    $_SESSION["usuario"] = $row->$usuario;
    $_SESSION["tipo"] = $row->tipo;

    // Tipo 1 -> é pra Usuario e Tipo-> 2 é pra Administrador
    if ($_SESSION["tipo"] == 1) {
        print "<script>location.href='./ponto.php';</script>";
    } else {
        print "<script>location.href='./cadastro.php';</script>";
    }
} else {
    print "<script>alert('Usúario e/ou Senha incorreto(s)');</script>";
    print "<script>location.href='index.php';</script>";
}
