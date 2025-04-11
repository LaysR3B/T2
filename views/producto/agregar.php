<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Nuevo</title>
</head>
<body>
	<h1>Producto: Agregar</h1>
	<hr>
	<a href="agregar.php">Nuevo</a>
	<hr>
	<?php
		//Incluir el modelo Producto
		require_once('../../models/producto.php');

		//Instanciar la clase Producto
		$objProducto = new Producto();

		//Verificar el envio del Formulario
		if(isset($_GET['txtId']))
		{
			//Recoger los valores
			$objProducto->id = $_GET['txtId'];
			$objProducto->descripcion = $_GET['txtDescripcion'];
			$objProducto->categoria = $_GET['txtCategoria'];
			$objProducto->precio = $_GET['txtPrecio'];

			if($objProducto->id==0)
			{
				//Insertar el NUEVO producto
				$nuevoId = $objProducto->setInsertar($objProducto);
				//Nuevo ID asignar al producto
				$objProducto->id = $nuevoId;
			}
		}
		else
		{
			//Valores predeterminados
			$objProducto->id = 0;
			$objProducto->descripcion = "";
			$objProducto->categoria = "";
			$objProducto->precio = 0;
		}

	?>

	<form>
		<table>
		<tr>
			<td>ID</td>
			<td><input type="text" name="txtId" size="5" readonly value="<?php echo $objProducto->id ?>" ></td>
		</tr>
		<tr>
			<td>DESCRIPCION</td>
			<td><input type="text" name="txtDescripcion" size="50" value="<?php echo $objProducto->descripcion ?>"></td>
		</tr>
		<tr>
			<td>CATEGORIA</td>
			<td><input type="text" name="txtCategoria" size="25" value="<?php echo $objProducto->categoria ?>"></td>
		</tr>
		<tr>
			<td>PRECIO S/.</td>
			<td><input type="text" name="txtPrecio" size="10" value="<?php echo $objProducto->precio ?>"></td>
		</tr>	
		<tr>
			<td><a href="index.php">Retornar</a></td>
			<td><input type="submit" value="Guardar"></td>
		</tr>
		</table>				
	</form>

</body>
</html>