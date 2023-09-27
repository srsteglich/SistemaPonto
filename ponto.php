<?php
session_start();
if (empty($_SESSION)) {
    print "<script>alert('Usúario e/ou Senha incorreto(s)');</script>";
    print "<script>location.href='index.php';</script>";
}

include('config.php');
// Definir um fuso horario padrao
date_default_timezone_set('America/Sao_Paulo');
?>

<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ponto</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand">Sistema Registro de Ponto</a>
            <?php
            print "Olá, " . $_SESSION["nome"];
            print "  - CPF: " . $_SESSION["cpf"];
            print "<a href='logout.php' class='btn btn-danger'>Sair</a>";
            ?>
        </div>
    </nav>

    <?php
    $id = $_GET['id'];
    print $id;
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    // $sql = "SELECT * FROM pontos WHERE data_entrada = CURDATE() AND usuario_id = " . $_REQUEST["id"];
    // $sql = "SELECT * FROM pontos WHERE data_entrada = CURDATE() AND usuario_id = 3";
    $sql = "SELECT * FROM pontos WHERE data_entrada = CURDATE() AND usuario_id = '$id'";
    $query = mysqli_query($conn, $sql);
    while ($result = mysqli_fetch_array($query)) {
        $data_entrada  = $result['data_entrada'];
        $entrada  = $result['entrada'];
        $saida_intervalo = $result['saida_intervalo'];
        $retorno_intervalo = $result['retorno_intervalo'];
        $saida = $result['saida'];
    }

    ?>
    <div class="container">
        <div class="row">
            <div class="col mt-5">
                <br />
                <h3>Registrar Ponto</h3><br />
                <h3 id="horario"><?php print date("d/m/Y H:i:s"); ?></h3>
                <?php
                if (!empty($data_entrada)) {
                    print "<table class='table caption-top table-bordered'>";
                    print "<tr>";
                    print "<thead>";
                    print "<th>Primeira Entrada</th>";
                    print "<th>Primeira Saída</th>";
                    print "<th>Segunda Entrada</th>";
                    print "<th>Segunda Saída</th>";
                    print "</thead>";
                    print "</tr>";

                    print "<tr class='table-success'>";
                    print "<td>" . $entrada .  "</td>";
                    print "<td>" . $saida_intervalo . "</td>";
                    print "<td>" . $retorno_intervalo . "</td>";
                    print "<td>" . $saida . "</td>";
                }
                // verificar depois, no intervalo não pode menos que um hora
                /*  if (empty($saida_intervalo) and ($retorno_intervalo == NULL)) {
                    $tempo = gmdate('H:i:s', strtotime($retorno_intervalo) - strtotime($saida_intervalo));

                    print " TESTE - Hora mais 60 minutos: ";
                    print $tempo;
                    print " - ";

                    if ($tempo <= '01:00:00') {
                    print " O Intervalo do retorno foi $tempo. Ideal esperar mais um pouco!!!";
                    //sleep(3);
                    header("Location: index.php");
                    } else {
                    print " A hora foi mais de uma hora:";
                    }
                    }  */

                //  Esse está OK - não mexer
                if (empty($data_entrada) or ($saida == NULL)) {
                ?>
                    <div class="col-lg-12" style="text-align: right;">
                        <a href=" registrar_ponto.php" class='btn btn-primary'>Registrar</a>
                    </div>
                    <br />
                <?php
                } else {
                    print "Já foram regitrado o seu Ponto de Horário de Saída";
                }
                ?>
            </div>
        </div>
    </div>
    <!-- <a href="registrar_ponto.php">Registrar</a><br> -->

    <script>
        function atualizarHorario() {
            var data = new Date().toLocaleString("pt-br", {
                timeZone: "America/Sao_Paulo"
            });
            document.getElementById("horario").innerHTML = data.replace(", ", " - ");
        }
        setInterval(atualizarHorario, 1000);
    </script>

</body>

</html>