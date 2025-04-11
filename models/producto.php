<?php

//Incluir el archivo PHP de conexion
require_once("conexion.php");

class Producto
{
	//Propiedades
	public $id;
	public $descripcion;
	public $categoria;
	public $precio;


	//Metodos: CRUD
	public function getBuscarPorId($idBuscar)
	{
		//Establecer la conexion a la BD
		$cnx = Conexion::getConectarMySQL();
		
		//Preparar la sentencia SQL
		$snt = $cnx->prepare("select * from producto where id=:idBuscar");

		//Pasar el valor al parametro de la sentencia
		$snt->bindValue(":idBuscar",$idBuscar);

		//Ejecutar la sentencia SQL
		$snt->execute();

		//Recoger la fila del resultado
		$fila = $snt->fetch();

		//Asignar los valores de la Fila al Producto
		$this->id = $fila['id'];
		$this->descripcion = $fila['descripcion'];
		$this->categoria = $fila['categoria'];
		$this->precio = $fila['precio'];

		//Retornar el producto
		return $this;		
	}
	public function getBuscarPorDescripcion($descripcionBuscar)
	{
		//Establecer la conexion a la BD
		$cnx = Conexion::getConectarMySQL();
		
		//Preparar la sentencia SQL
		$snt = $cnx->prepare("select * from producto where descripcion like concat('%',:desBus,'%');");

		//Pasar el valor al parametro de la sentencia
		$snt->bindValue(":desBus",$descripcionBuscar);

		//Ejecutar la sentencia SQL
		$snt->execute();

		//Recoger las filas del resultado
		$tabla = $snt->fetchAll();

		//Retornar las filas de la tabla de datos
		return $tabla;
	}
	public function setInsertar($objProducto)
	{
		//Establecer la conexion a la BD
		$cnx = Conexion::getConectarMySQL();
		//Preparar la sentencia SQL
		$snt = $cnx->prepare("insert into producto (descripcion, categoria, precio) values (:des,:cat,:pre);");
		//Pasar los valores de los parametros de la sentencia
		$snt->bindValue(":des",$objProducto->descripcion);
		$snt->bindValue(":cat",$objProducto->categoria);
		$snt->bindValue(":pre",$objProducto->precio);

		//Ejecutar la sentencia SQL (insertando un nuevo producto)
		$snt->execute();

		//--RECUPERAR EL NUEVO ID--
		//Preparar la sentencia SQL
		$snt = $cnx->prepare("select max(id) as nuevoId from producto;");
		//Ejecutar la sentencia SQL
		$snt->execute();
		//Recoger la unica fila del resultado
		$fila = $snt->fetch();
		//Leer el valor de la fila
		$nuevoId = $fila['nuevoId'];
		//Retornar el nuevo id
		return $nuevoId;
	}
	public function setActualizar($objProducto)
	{
		//Establecer la conexion a la BD
		$cnx = Conexion::getConectarMySQL();
		//Preparar la sentencia SQL
		$snt = $cnx->prepare("update producto set descripcion=:des, categoria=:cat, precio=:pre where id=:id ;");
		//Pasar los valores de los parametros de la sentencia
		$snt->bindValue(":id",$objProducto->id);
		$snt->bindValue(":des",$objProducto->descripcion);
		$snt->bindValue(":cat",$objProducto->categoria);
		$snt->bindValue(":pre",$objProducto->precio);

		//Ejecutar la sentencia SQL (insertando un nuevo producto)
		$snt->execute();
	}
	public function setEliminar($idEliminar)
	{
		//Establecer la conexion a la BD
		$cnx = Conexion::getConectarMySQL();
		//Preparar la sentencia SQL
		$snt = $cnx->prepare("delete from producto where id=:idEliminar ;");
		//Pasar los valores de los parametros de la sentencia
		$snt->bindValue(":idEliminar",$idEliminar);
		//Ejecutar la sentencia SQL (insertando un nuevo producto)
		$snt->execute();
	}

}

?>