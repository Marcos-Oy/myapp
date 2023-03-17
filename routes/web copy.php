<?php
/**
 * @author Marcos Oyarzo
 * 
 * Se importan los controladores DashboardController y UserController en la parte superior del archivo.
 * 
 * Luego se definen las rutas correspondientes a cada una de las acciones del controlador de usuarios (UserController):
 * La primera ruta es para mostrar la lista de usuarios y se llama users.index.
 * 
 * La segunda ruta es para mostrar el formulario de creación de usuarios y se llama users.create.
 * 
 * La tercera ruta es para almacenar los datos del nuevo usuario creado y se llama users.store. 
 * Es un post porque se utiliza para enviar información al servidor.
 * 
 * La cuarta ruta es para mostrar el formulario de edición de un usuario específico, el cual se identifica por el id. 
 * Se llama users.edit.
 * 
 * La quinta ruta es para actualizar los datos de un usuario específico, el cual también se identifica por el id. 
 * Se llama users.update y es un put porque se utiliza para actualizar información en el servidor.
 * 
 * La sexta ruta es para eliminar un usuario específico y se llama users.delete. 
 * Es un delete porque se utiliza para eliminar información del servidor.
 * 
 * También se define una ruta principal (/) que llama al método index del controlador DashboardController. 
 * Esta ruta se llama home.
 * 
 * En las rutas de la sección de usuarios se utiliza el método name para asignar un nombre a cada ruta. Esto es útil para referirse a la ruta en otras partes del código, como en las vistas.
 * En resumen, este controlador de rutas define las rutas necesarias para crear, leer, actualizar y eliminar usuarios y también define una ruta principal para la página de inicio. Además, se asignan nombres a cada ruta para facilitar su referencia en otras partes del código.
 */
use App\Controllers\DashboardController;
use App\Controllers\UserController;
use App\Controllers\LoginController;

$router->name('Dashboard')->get('/App/', [DashboardController::class, 'dash']);
$router->name('users.index')->get('/users', [UserController::class, 'index']);
$router->name('users.create')->get('/users/create', [UserController::class, 'create']);
$router->name('users.store')->post('/users', [UserController::class, 'store']);
$router->name('users.edit')->get('/users/{id}/edit', [UserController::class, 'edit']);
$router->name('users.update')->put('/users/{id}', [UserController::class, 'update']);
$router->name('users.delete')->delete('/users/{id}', [UserController::class, 'delete']);
$router->name('login')->get('/login', [LoginController::class, 'login']);



/**
 * @author Marcos Oyarzo
 * En este ejemplo, hemos asignado un alias a cada una de las rutas utilizando el método name() 
 * después de la definición de la ruta. Ahora, en lugar de tener que escribir la URL completa 
 * en los enlaces de nuestra aplicación, podemos simplemente utilizar el alias, por ejemplo:
 * 
 * <a href="{{ route('users.index') }}">Ver usuarios</a>
 * <a href="{{ route('users.create') }}">Crear usuario</a>
 * <a href="{{ route('users.edit', ['id' => $user->id]) }}">Editar usuario</a>
 * 
 * De esta manera, si en algún momento cambiamos la URL de alguna de estas rutas, no tendremos 
 * que cambiar todas las referencias a ella en nuestra aplicación, ya que simplemente tendremos 
 * que actualizar el alias correspondiente.
 */


?>