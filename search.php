<?php

$connect = new PDO("mysql:host=localhost;dbname=ponto", "root", "");

if (isset($_POST["nome"])) {
	$busca = $_POST["nome"];
	$query = "SELECT * FROM usuarios WHERE nome LIKE '%" . $busca . "%' order by nome";
} else {
	$query = "SELECT * FROM usuarios ORDER BY nome";
}
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$rowCount = $statement->rowCount();

if ($rowCount > 0) {
	$data = '<div class="table-responsive">
		<table class="table table-striped">
		
		<tr> 				
			<th class="text-center">Nome</th>				
			<th class="text-left">CPF</th>						
		</tr>
		
	';
	foreach ($result as $row) {
		$data .= '				
			<tr class="row" data-id='  . $row['id'] .  ' > 	
				
				<td class="col-md-1">'  . '</td>						
				<td class="col-md-6">' . $row["nome"] . '</td>		
				<td class="col-md-1">'  . '</td>			
				<td class="col-md-4">' . $row["cpf"] . '</td>					
			</tr>		
		';
	}
	$data .= '</table></div>';
} else {
	$data = "Nenhum registro localizado.";
}
print $data;
?>

<script>
	$(document).ready(function() {
		$('.row').click(function() {
			var id = $(this).data('id');
			window.location.href = "acesso.php?id=" + id;
		});
	});
</script>