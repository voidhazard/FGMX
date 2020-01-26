<select id="categoria" onchange="redir_cat()" class="form-control">
	<option value="">Selecciona una categoria para buscar</option>
	<?php
	$cats=$mysqli->query("SELECT * FROM Categorias ORDER BY categoria ASC");
	while($rcat=mysqli_fetch_array($cats)){
		?>
		<option value="<?=$rcat['id_cat']?>"><?=$rcat['categoria']?></option>
		<?php
		//
	}
	?>
</select>
<?php

check_user("productos");

if(isset($cat)){
	$sc = $mysqli->query("SELECT * FROM Categorias WHERE id_cat = '$cat'");
	$rc = mysqli_fetch_array($sc);
	?>
	<h1>Categoria Filtrada por: <?=$rc['categoria']?></h1>
	<?php
}

if(isset($agregar) && isset($cant)){
	$idp = clear($agregar);
	$cant = clear($cant);
	$id_cliente = clear($_SESSION['id_cliente']);
	$v =0;
	
	$v = $mysqli->query("SELECT * FROM Rack WHERE id_cliente = '$id_cliente' AND id_producto = '$idp'");
	
	if(mysqli_num_rows($v)>0){
		$q =$mysqli->query("UPDATE Rack SET cant = cant + $cant WHERE id_cliente = '$id_cliente' AND id_producto='$idp'");
	}else{ 
		$q =$mysqli->query("INSERT INTO Rack (id_cliente, id_producto, cant) VALUES($id_cliente,$idp,$cant)");	}
	
	alert("Se ha agregado al carro de compras",1,'productos');
	//redir("?p=productos");

}
if(isset($cat)){
	$q = $mysqli->query("SELECT * FROM Producto WHERE id_categoria = '$cat' ORDER BY clave DESC");
}else{
	$q = $mysqli->query("SELECT * FROM Producto ORDER BY clave DESC");}

while($r=mysqli_fetch_array($q)){
	$preciototal = 0;
			if($r['oferta']>0){
				if(strlen($r['oferta'])==1){
					$desc = "0.0".$r['oferta'];
				}else{
					$desc = "0.".$r['oferta'];
				}
				$preciototal = $r['precio'] -($r['precio'] * $desc);
			}else{
				$preciototal = $r['precio'];
			}
	?>
	<div class="producto">
			<div class="name_producto"><?=$r['nombre']?></div>
			<div><img class="img_producto" src="productos/<?=$r['imagen']?>"/></div>
				<?php
			if($r['oferta']>0){
				?>
				<del><?=$r['precio']?> <?=$divisa?></del> <span class="precio"> <?=$preciototal?> <?=$divisa?> </span>
				<?php
			}else{
				?>
				<span class="precio"><br><?=$r['precio']?> <?=$divisa?></span>
				<?php
			}
			?>
			<button class="btn btn-warning pull-right" onclick="agregar_carro('<?=$r['clave']?>');">Agregar a carrito</button>
	</div>
	<?php	
}

?>

<script type="text/javascript">
	
	function agregar_carro(idp){
		var cant = prompt("¿Que cantidad desea agregar?",1);
		if(cant.length>0){
			window.location="?p=productos&agregar="+idp+"&cant="+cant;
		}
	}
	function redir_cat(){
		window.location="?p=productos&cat="+$("#categoria").val();
	}
</script>