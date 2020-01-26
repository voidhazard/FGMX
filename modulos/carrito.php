<?php

check_user("productos");

?>
<?php
	if(isset($finalizar)){
		
	$monto = clear($monto_total);
	$id_cliente = clear($_SESSION['id_cliente']);
	
	$q = $mysqli->query("INSERT INTO Venta (id_cliente,fecha,monto,estado) VALUES ('$id_cliente',NOW(),'$monto',0)");

	$sc = $mysqli->query("SELECT * FROM Venta WHERE id_cliente = '$id_cliente' ORDER BY id_venta DESC LIMIT 1");
	$rc = mysqli_fetch_array($sc);
	$ultima_compra = $rc['id_venta'];
	$q2 = $mysqli->query("SELECT * FROM Rack WHERE id_cliente = '$id_cliente'");
	
	while($r2=mysqli_fetch_array($q2)){
		$sp = $mysqli->query("SELECT * FROM Producto WHERE clave = '".$r2['id_producto']."'");
		$rp = mysqli_fetch_array($sp);
		
		$monto = $rp['precio'];
		$mysqli->query("INSERT INTO producto_venta (id_venta,id_producto,cantidad,monto) VALUES ('$ultima_compra','".$r2['id_producto']."','".$r2['cant']."','$monto')");
	}
	$mysqli->query("DELETE FROM Rack WHERE id_cliente = '$id_cliente'");
	alert("Se ha finalizado la compra");
	redir("./");

}
?>
<h1>Carrito de compras</h1>
<br>

<table class="table table-striped">
	<tr>
		<th>Imagen</th>
		<th>Nombre producto</th>
		<th>Cantidad</th>
		<th>Precio unitario</th>
		<th>Oferta</th>
		<th>Precio final</th>
		
	</tr>
	
	
<?php
$id_cliente = clear($_SESSION['id_cliente']);
$q = $mysqli->query("SELECT * FROM Rack WHERE id_cliente = '$id_cliente'");
$monto_total = 0;
	

while($r = mysqli_fetch_array($q)){
	$q2 = $mysqli->query("SELECT * FROM Producto WHERE clave = '".$r['id_producto']."'");
	$r2 = mysqli_fetch_array($q2);$preciototal = 0;
			if($r2['oferta']>0){
				if(strlen($r2['oferta'])==1){
					$desc = "0.0".$r2['oferta'];
				}else{
					$desc = "0.".$r2['oferta'];
				}
				$preciototal = $r2['precio'] -($r2['precio'] * $desc);
			}else{
				$preciototal = $r2['precio'];
			}
	
	
	$nombre_producto = $r2['nombre'];
	$cantidad = $r['cant'];
	$precio_unidad = $r2['precio'];
	$imagen_producto = $r2['imagen'];
	$monto_total = $monto_total + $preciototal;
	$preciototal = $r['cant'] * $preciototal;
	
	
	?>
		<tr>
			<td><img src="productos/<?=$imagen_producto?>" class="imagen_carro"/></td>
			<td><?=$nombre_producto?></td>
			<td><?=$cantidad?></td>
			<td><?=$precio_unidad?> <?=$divisa?></td>
			<td> <?php
					if($r2['oferta']>0){
						echo $r2['oferta']."% de Descuento";
					}else{
						echo "Sin descuento";
					}
				?></td>
				<td><?=$preciototal?> <?=$divisa?></td>
		</tr>
	<?php
}
?>
</table>
<br>

<h3>Monto Total: <b class="text-green"><?=$monto_total?> <?=$divisa?></b></h3>
<br><br>
<form method="post" action="">
	<input type="hidden" name="monto_total" value="<?=$monto_total?>"/>
	<button class="btn btn-primary" type="submit" name="finalizar"><i class="fa fa-check"></i> Finalizar Compra</button>
</form>