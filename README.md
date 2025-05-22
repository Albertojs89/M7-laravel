# 📚 API REST - Usuarios y Mascotas 

---

## ✅ Tecnologías usadas

- Laravel 11
- PHP 8+
- JWT Auth (`tymon/jwt-auth`)
- MySQL
- Railway (despliegue)
- Postman (pruebas)

---

## 🔧 Instalación

1. 

composer install
Crear archivo .env y configurar conexión a base de datos.

Generar clave de aplicación:

bash
Copiar
Editar
php artisan key:generate
Ejecutar migraciones y seeders:

bash
Copiar
Editar
php artisan migrate --seed
Generar clave JWT:

bash
Copiar
Editar
php artisan jwt:secret
🔐 Autenticación (JWT)
La API utiliza autenticación con JWT. Para acceder a rutas protegidas:

Registrar usuario:
POST /api/register

Login (devuelve token):
POST /api/login

Usar token en el header:

makefile
Copiar
Editar
Authorization: Bearer <token>
Accept: application/json





🔐 Autenticación (JWT)
La API utiliza autenticación con JWT. Para acceder a rutas protegidas:

Registrar usuario:
POST /api/register

Login (devuelve token):
POST /api/login

Usar token en el header:

makefile
Copiar
Editar
Authorization: Bearer <token>
Accept: application/json
🔒 Middlewares personalizados
IsUserAuth: Verifica que el token sea válido.

IsAdmin: Solo permite acceso a usuarios con role = 'admin'.

📦 Rutas disponibles
✨ Rutas públicas
Método	Ruta	Descripción
POST	/api/register	Registro de usuario
POST	/api/login	Login (devuelve token)

🔐 Rutas protegidas por token (IsUserAuth)
Método	Ruta	Descripción
GET	/api/profile	Ver perfil del usuario

🛡️ Rutas solo para admin (IsUserAuth + IsAdmin)
Método	Ruta	Descripción
GET	/api/users	Ver todos los usuarios
GET	/api/users/{id}	Ver un usuario
PUT	/api/users/{id}	Editar un usuario
DELETE	/api/users/{id}	Eliminar un usuario
GET	/api/users/{id}/pets	Ver mascotas del usuario

🧪 Testing con Postman
Login para obtener token

Añadir token en los headers:

makefile
Copiar
Editar
Authorization: Bearer <token>
Accept: application/json
📁 Estructura destacada
routes/api.php: Define todas las rutas

app/Http/Middleware/IsUserAuth.php: Middleware de autenticación

app/Http/Middleware/IsAdmin.php: Middleware de rol admin

app/Http/Controllers/UserController.php: Lógica de usuarios y mascotas
