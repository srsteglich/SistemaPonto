<h1>Listar Usuários</h1>

<?php

$sql = "SELECT * FROM usuarios ORDER BY nome ASC";
$res = $conn->query($sql);
$qtd = $res->num_rows;

if ($qtd > 0) {
    print "<table class='table caption-top table-hover table-striped table-bordered'>";
    print "<tr>";
    print "<thead>";
    print "<th >#</th>";
    print "<th>Nome</th>";
    print "<th>CPF</th>";
    print "<th>E-mail</th>";
    print "<th>Ações</th>";
    print "</thead>";
    print "</tr>";
    while ($row = $res->fetch_object()) {
        print "<tr>";
        print "<td>" . $row->id . "</td>";
        print "<td>" . $row->nome . "</td>";
        print "<td>" . $row->cpf . "</td>";
        print "<td>" . $row->email . "</td>";

        print "<td> 
                <button onclick=\"location.href='?page=editar&id=" . $row->id . "';\" class='btn-success'> Alterar </button>

                <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar&acao=excluir&id=" . $row->id . "';
                                  }else{false;}\" class='btn-danger'>Excluir </button>                


                <button onclick=\"location.href='?page=consultar&id=" . $row->id . "';\" class='btn-warning'> Consultar </button>                                  
                
               </td>";
        print "</tr>";
    }
    print "</table>";
} else {
    print "<p classe='alert alert-danger'> Não encontrou usuário!!!</p>";
}

?>