<h1>Alterar os Horários</h1>
<?php 
$sql = "SELECT *, DATE_FORMAT(data_entrada,'%d/%m/%Y') AS dataBR_entrada 
        FROM pontos WHERE id=" . $_REQUEST["id"];
$res = $conn->query($sql);
$row = $res->fetch_object();
?>

<form action="?page=salvar" method="POST">
    <input type="hidden" name="acao" value="editarHorario">
    <input type="hidden" name="id" value="<?php print $row->id; ?>">

    <div class="mb-3">
        <label>Data Inicial:</label>
        <input type="date" name="data_entrada" value="<?php print $row->data_entrada; ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label>Entrada</label>
        <input type="time" name="entrada" value="<?php print $row->entrada; ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label>Saida Intervalo</label>
        <input type="time" name="saida_intervalo" value="<?php print $row->saida_intervalo; ?>" class="form-control">
    </div>

    <div class="mb-3">
        <label>Retorno Intervalo</label>
        <input type="time" name="retorno_intervalo" value="<?php print $row->retorno_intervalo; ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label>Saida</label>
        <input type="time" name="saida" value="<?php print $row->saida; ?>" class="form-control">
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Enviar</button>
        <a class="btn btn-success" href="?page=listar">Voltar</a>
    </div>
</form>