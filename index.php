<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sistema de Ponto</title>
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<style> </style>
<body>
	<div class="container topo">
		<h3>Buscar por Nome dos Colaboradores</h3>
		<div class="form-group">
			<div class="input-group">				
				<input type="text" name="buscar" id="buscar" placeholder="Digite o seu nome" class="form-control" />
			</div>
		</div>
		<div>
			<div id="resultado"></div>
		</div>
	</div>
</body>
</html>

<script type="text/javascript">

	function buscarNome(nome) {		
			$.ajax({
			url: "./search.php",
			method: "POST",
			data: {nome:nome},
			success: function(data){
				$('#resultado').html(data);
			}
		});		
	}  

	$(document).ready(function(){
		buscarNome();

		$('#buscar').keyup(function(){
			var nome = $(this).val();
														
				if (nome != '') {										
					buscarNome(nome);
				}
				else
				{
					buscarNome();
				}			
		});
	});

</script>