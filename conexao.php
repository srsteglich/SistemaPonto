<?php
$HOST = "localhost";
$USER = "root";
$PASS = "";
$BASE = "ponto";

try {
    $conn = new PDO("mysql:host=$HOST;dbname=" . $BASE, $USER, $PASS);
} catch (PDOException $err) {
    echo "Erro: Conexão com banco de dados não realizado com sucesso. Erro gerado " . $err->getMessage();
}
