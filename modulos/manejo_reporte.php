<?php
check_admin();
// 0 recien comprada
// 1 preparando compra
// 2 en camino
// 3 entregado
$s = $mysqli->query("SELECT * FROM Venta WHERE estado != 3");
if(isset($eliminar)){
	$eliminar = clear($eliminar);
	$mysqli->query("DELETE FROM producto_venta WHERE id_venta = '$eliminar'");
	$mysqli->query("DELETE FROM Venta WHERE id_venta = '$eliminar'");
	redir("?p=manejo_reporte");
}
?>

<h1>Reporte de ventas</h1>

<table class="table table-stripe">
	<tr>
		<th>Cliente</th>
		<th>Fecha</th>
		<th>Monto</th>
		<th>Status</th>
		<th>Acciones</th>
	</tr>
<?php
	while($r=mysqli_fetch_array($s)){
		$sc = $mysqli->query("SELECT * FROM Clientes WHERE id_cliente = '".$r['id_cliente']."'");
		$rc = mysqli_fetch_array($sc);
		$cliente = $rc['nombre'];
		if($r['estado'] == 0){
			$status = "Iniciando";
		}elseif($r['estado']==1){
			$status = "Preparando";
		}elseif($r['estado'] == 2){
			$status = "Despachando";
		}elseif($r['estado'] == 3){
			$status = "Finalizado";
		}else{
			$status = "Indefinido";
		}
		$fecha = fecha($r['fecha']);
		?>
		<tr>
			<td><?=$cliente?></td>
			<td><?=$fecha?></td>
			<td><?=$r['monto']?> <?=$divisa?></td>
			<td><?=$status?></td>
			<td>
				<a href="?p=manejo_reporte&eliminar=<?=$r['id_venta']?>">
					<i class="material-icons">
							delete
							</i>
				</a>
				&nbsp; &nbsp;
				<a href="?p=manejar_status&id=<?=$r['id_venta']?>">
					<i class="material-icons">
build
</i>
				</a>
				&nbsp; &nbsp;
				<a href="?p=ver_compra&id=<?=$r['id_venta']?>">
				<i class="material-icons">
visibility
</i>
				</a>
			</td>
		</tr>
		<?php
	}
?>
</table>