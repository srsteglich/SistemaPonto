<h1>Consultar Horários</h1>
<div class=" col-lg-12" style="text-align: right;">
    <a class="btn btn-success" href="?page=listar">Voltar</a>
</div>
<!DOCTYPE html>
<html>

<head>
    <style>
        table,
        td,
        th {
            border: 1px solid black;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            text-align: center;
        }
    </style>
</head>

<body>


</body>

</html>

<?php

// Definir um fuso horario padrao
date_default_timezone_set('America/Sao_Paulo');

$usuario_id = $_GET["id"];
//print $usuario_id;
$sql = "SELECT *, DATE_FORMAT(data_entrada,'%d/%m/%Y') AS dataBR_entrada  
        FROM pontos
        WHERE usuario_id = '$usuario_id'
        ORDER BY data_entrada ASC";
$res = $conn->query($sql);
$qtd = $res->num_rows;


if ($qtd > 0) {
    print "<table class='table table-striped table-bordered'>";
    print "<tr>";
    print "<thead>";
    print "<th '>Data</th>";
    print "<th scope='col'>Entrada</th>";
    print "<th scope='col'>Saída Intervalo</th>";
    print "<th scope='col'>Retorno do Intervalo</th>";
    print "<th scope='col'>Saída</th>";
    print "</thead>";
    print "</tr>";

    while ($row = $res->fetch_object()) {
        print "<tr>";
        print "<td scope='row'>" . $row->dataBR_entrada . "</td>";
        print "<td scope='row'>" . $row->entrada . "</td>";
        print "<td scope='row'>" . $row->saida_intervalo . "</td>";
        print "<td scope='row'>" . $row->retorno_intervalo . "</td>";
        print "<td scope='row'>" . $row->saida . "</td>";
        print "</tr>";
    }
    print "</table>";
} else {
    print "<p classe='alert alert-danger'> Não encontrou usuário!!!</p>";
}


?>
<script>
    function atualizarHorario() {
        var data = new Date().toLocaleString("pt-br", {
            timeZone: "America/Sao_Paulo"
        });
        document.getElementById("horario").innerHTML = data.replace(", ", " - ");
    }
    setInterval(atualizarHorario, 1000);
</script>