<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Editar</title>
</head>
<body>
	<h1>Producto: Editar</h1>

	<hr>
	<?php
		//Incluir el modelo Producto
		require_once('../../models/producto.php');

		//Instanciar la clase Producto
		$objProducto = new Producto();

		//Verificar si se ha enviado el idBuscar
		if(isset($_GET['idBuscar']))
		{
			//Recoger el ID a buscar
			$idBuscar = $_GET['idBuscar'];
			//Ejecutar la busqueda y recoger el producto
			$objProducto = $objProducto->getBuscarPorId($idBuscar);

		}
		//Verificar si se ha enviado el formulario (clic en guardar)
		else if(isset($_GET['txtId']))
		{
			//Recoger los valores del formulario
			$objProducto->id = $_GET['txtId'];
			$objProducto->descripcion = $_GET['txtDescripcion'];
			$objProducto->categoria = $_GET['txtCategoria'];
			$objProducto->precio = $_GET['txtPrecio'];

			//Ejecutar el metodo de la actualizacion
			$objProducto->setActualizar($objProducto);
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