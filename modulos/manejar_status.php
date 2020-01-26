<?php
check_admin();

$id = clear($id);
$s = $mysqli->query("SELECT * FROM Venta WHERE id_venta = '$id'");
$r = mysqli_fetch_array($s);

if(isset($modificar)){
	$estado = clear($estado);
	$mysqli->query("UPDATE Venta SET estado = '$estado' WHERE id_venta = '$id'");
	redir("?p=manejo_reporte");
}
?>
<h1>Manejar de Status del pedido</h1>
<br>
<form method="post" action="">
	<div class="form-group">
		<select class="form-control" name="estado">
			<option <?php if($r['estado'] == 0) { echo "selected"; } ?> value="0">Iniciando</option>
			<option <?php if($r['estado'] == 1) { echo "selected"; } ?> value="1">Preparando</option>
			<option <?php if($r['estado'] == 2) { echo "selected"; } ?> value="2">Despachando</option>
			<option <?php if($r['estado'] == 3) { echo "selected"; } ?> vlaue="3">Finalizado</option>
		</select>
	</div>

	<div class="form-group">
		<input class="btn btn-primary" type="submit" value="Cambiar estado" name="modificar"/>
	</div>
</form>