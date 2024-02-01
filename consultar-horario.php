<h3>Consulta os Horários</h3>
<div class=" col-lg-12" style="text-align: right;">
    <a class="btn btn-success" href="?page=listar">Voltar</a>
</div>

<!DOCTYPE html>
<html>

<head>
    <style>
        table, td, th { border: 1px solid black; }
        table { 
            border-collapse: collapse;
            width: 100%;  }
        td, th { text-align: center; }
    </style>
</head>

<body>
    <?php
        $dados= filter_input_array(INPUT_POST, FILTER_DEFAULT)
    ?> 
    <h4>Pesquisar as datas</h4>
    <form method="POST" action="">
        <?php
            $data1 = "";
            if (isset($dados['data1'])) {
                $data1 = $dados['data1'];
            }
        ?>
        <div class="mb-3">        
            <label class="form-label">Data Inicial:</label>
            <input type="date" name="data1" value="<?php print $data1; ?>" required> &emsp;        
        <?php
            $data2 = "";
            if (isset($dados['data2'])) {
                $data2 = $dados['data2'];
            }
        ?>
            <label class="form-label">Data Final:</label>
            <input type="date" name="data2" value="<?php print $data2; ?>" required> &emsp;

            <input type="submit" value="Pesquisar" class='btn btn-dark' name="PesqData">
        </div>
               
    </form>
</body>

</html>

<?php

if(!empty($dados['PesqData'])){
    //var_dump($dados);
    //print "$data1";
    
    // Definir um fuso horario padrao
    date_default_timezone_set('America/Sao_Paulo');

    $usuario_id = $_GET["id"];
    $sql ="SELECT pon.*, usr.nome, 
            DATE_FORMAT(pon.data_entrada,'%d/%m/%Y') AS dataBR_entrada, 
            TIMEDIFF(pon.saida_intervalo, pon.entrada) AS prijornada,
            TIMEDIFF(pon.saida, pon.retorno_intervalo) AS segjornada, 
            ADDTIME (timediff(pon.saida_intervalo, pon.entrada),timediff(pon.saida, pon.retorno_intervalo)) AS horacerto
            FROM pontos AS pon 
            LEFT JOIN usuarios AS usr ON usr.id = '$usuario_id'  
            WHERE pon.usuario_id = '$usuario_id' AND pon.data_entrada BETWEEN '$data1' AND '$data2'
            GROUP BY pon.id 
            ORDER BY pon.data_entrada ASC";                                                                                
    $res = $conn->query($sql);
    $res2 = $conn->query($sql);    
    $qtd = $res->num_rows;
    
    if ($qtd > 0) {  
        if ($rows = $res2->fetch_object()) {   
            print "<h4>Nome do Funcionário: " . $rows->nome . "</h3>";
        }
        print " ";  
        print "<table class='table table-striped table-bordered table-hover'>";
        print "<tr>";
        print "<thead>";
        print "<th '>Data</th>";
        print "<th scope='col'>Entrada</th>";
        print "<th scope='col'>Saída Intervalo</th>";
        print "<th scope='col' class='table-info'>Tempo </th>";       
        print "<th scope='col'>Retorno</th>";
        print "<th scope='col'>Saída</th>";
        print "<th scope='col' class='table-info'>Tempo </th>";   
        print "<th scope='col'>Horas Trabalhadas</th>";
        print "<th scope='col'>Ação</th>";
        print "</thead>";
        print "</tr>";

        while ($row = $res->fetch_object()) {            
            print "<tr>";            
            print "<td scope='row'>" . $row->dataBR_entrada . "</td>";
            print "<td scope='row'>" . $row->entrada . "</td>";
            print "<td scope='row'>" . $row->saida_intervalo . "</td>";
            print "<td scope='row' class='table-info'>" . $row->prijornada . "</td>";
            print "<td scope='row'>" . $row->retorno_intervalo . "</td>";
            print "<td scope='row'>" . $row->saida . "</td>";
            print "<td scope='row' class='table-info'>" . $row->segjornada . "</td>";  
            if ($row->horacerto >= "08:00:00"){
                print "<td scope='row' class='table-success'>"  . $row->horacerto .  "</td>";
            }else {
                print "<td scope='row' class='table-danger'>"  . $row->horacerto .  "</td>";
            }          
            print "<td>              
            
                    <button onclick=\"location.href='?page=editar-horario&id=" . $row->id . "';\" class='btn-primary'> Alterar </button>
                    
                    <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar&acao=excluirHorario&id=" . $row->id . "';
                                    }else{false;}\" class='btn-danger'>Excluir </button>                               
                </td>";
            print "</tr>";
        }
        print "</table>";
    } else {
        print "<p classe='alert alert-danger'> Não encontrou Horários ou Data Inicial não pode ser maior que Data Final!!!</p>";
    }
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