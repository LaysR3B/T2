# Sistema de Gestión de Productos y Clientes

Este es un sistema CRUD (Create, Read, Update, Delete) desarrollado en PHP para la gestión de productos y clientes.

## Estructura del Proyecto

```
├── index.php                 # Página principal con menú de navegación
├── models/                   # Modelos de datos
│   ├── conexion.php          # Clase para la conexión a la base de datos
│   ├── producto.php          # Modelo para la gestión de productos
│   └── cliente.php           # Modelo para la gestión de clientes
├── views/                    # Vistas de la aplicación
│   ├── producto/             # Vistas para la gestión de productos
│   │   ├── index.php         # Lista de productos
│   │   ├── agregar.php       # Formulario para agregar productos
│   │   ├── editar.php        # Formulario para editar productos
│   │   └── eliminar.php      # Proceso de eliminación de productos
│   └── cliente/              # Vistas para la gestión de clientes
│       ├── index.php         # Lista de clientes
│       ├── agregarcli.php    # Formulario para agregar clientes
│       ├── editarcli.php     # Formulario para editar clientes
│       └── eliminarcli.php   # Proceso de eliminación de clientes
└── Script SQL - BD504.txt    # Script SQL para crear la base de datos y tablas
```

## Requisitos del Sistema

- PHP 7.0 o superior
- MySQL 5.6 o superior
- Servidor web (Apache, Nginx, etc.)
- XAMPP (recomendado para desarrollo)

## Configuración

1. Clonar o descargar el proyecto
2. Importar la base de datos:
   - Abrir phpMyAdmin
   - Crear una nueva base de datos llamada "BD504"
   - Seleccionar la base de datos
   - Ir a la pestaña "SQL"
   - Copiar y pegar el contenido del archivo "Script SQL - BD504.txt"
   - Ejecutar el script

3. Configurar la conexión a la base de datos:
   - Abrir el archivo `models/conexion.php`
   - Verificar que los parámetros de conexión sean correctos:
     ```php
     $cadena = "mysql:host=127.0.0.1; dbname=BD504; charset=utf8";
     $usuario = "root";
     $clave = "";
     ```

## Funcionalidades

### Gestión de Productos
- Listar todos los productos
- Buscar productos por descripción
- Agregar nuevos productos
- Editar productos existentes
- Eliminar productos

### Gestión de Clientes
- Listar todos los clientes
- Buscar clientes por nombre
- Agregar nuevos clientes
- Editar clientes existentes
- Eliminar clientes

## Estructura de la Base de Datos

### Tabla: producto
- id (int, auto_increment, primary key)
- descripcion (varchar(100))
- categoria (varchar(100))
- precio (double)

### Tabla: cliente
- id (int, auto_increment, primary key)
- nombre (varchar(100))
- numruc (varchar(11))
- direccion (varchar(100))
- telefono (varchar(20))

## Uso

1. Acceder a la aplicación a través del navegador web
2. Navegar entre las secciones de Productos y Clientes usando el menú principal
3. Realizar las operaciones CRUD según sea necesario

## Características de Seguridad

- Uso de PDO para prevenir inyección SQL
- Escapado de caracteres especiales con htmlspecialchars
- Manejo de errores con try-catch
- Validación de datos en el servidor

## Notas de Desarrollo

- El proyecto utiliza el patrón MVC (Modelo-Vista-Controlador)
- Las conexiones a la base de datos se manejan a través de PDO
- Se implementa el manejo de errores para una mejor experiencia de usuario
- La interfaz es responsiva y compatible con diferentes dispositivos 