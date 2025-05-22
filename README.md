
# API REST - Usuarios y Mascotas Examen Alberto

---

## Tecnologías usadas

- Laravel 11
- PHP 8+
- JWT Auth (`tymon/jwt-auth`)
- MySQL
- Railway (despliegue)
- Postman (pruebas)

---

##  Instalación

1. Acceder al proyecto:
   

2. Instalar dependencias:
   
   composer install
   ```

3. Crear archivo `.env` y configurar conexión a base de datos.

4. Generar clave de aplicación:
   ```bash
   php artisan key:generate
   ```

5. Ejecutar migraciones y seeders:
   ```bash
   php artisan migrate --seed
   ```

6. Generar clave JWT:
   ```bash
   php artisan jwt:secret
   ```

---

##  Autenticación (JWT)

La API utiliza autenticación con JWT. Para acceder a rutas protegidas:

1. Registrar usuario:  
   `POST /api/register`

2. Login (devuelve token):  
   `POST /api/login`

3. Usar token en el header:  
   ```
   Authorization: Bearer <token>
   Accept: application/json
   ```

---

##  Middlewares personalizados

- `IsUserAuth`: Verifica que el token sea válido.
- `IsAdmin`: Solo permite acceso a usuarios con `role = 'admin'`.

---

##  Rutas disponibles

###  Rutas públicas

| Método | Ruta           | Descripción             |
|--------|----------------|-------------------------|
| POST   | /api/register  | Registro de usuario     |
| POST   | /api/login     | Login (devuelve token)  |

---

###  Rutas protegidas por token (`IsUserAuth`)


| Método | Ruta           | Descripción             |


| GET    | /api/pets   | Ver mascota  |
| POST    | /api/pets   | Crear mascota  |
| PUT    | /api/pets/id   | Modificar mascota  |
| PATCH    | /api/pets/id   | Modificar mascota parcialmente  |
| DELETE    | /api/pets/id   | Eliminar mascota |

---

###  Rutas solo para admin (`IsUserAuth` + `IsAdmin`)

| Método | Ruta                    | Descripción                      |
|--------|-------------------------|----------------------------------|
| GET    | /api/users              | Ver todos los usuarios           |
| GET    | /api/users/{id}         | Ver un usuario                   |
| PUT    | /api/users/{id}         | Editar un usuario                |
| DELETE | /api/users/{id}         | Eliminar un usuario              |
| GET    | /api/users/{id}/pets    | Ver mascotas del usuario         |

---



##  Estructura destacada

- `routes/api.php`: Define todas las rutas
- `app/Http/Middleware/IsUserAuth.php`: Middleware de autenticación
- `app/Http/Middleware/IsAdmin.php`: Middleware de rol admin
- `app/Http/Controllers/UserController.php`: Lógica de usuarios y mascotas

---



##  Credencials de prova

Per fer proves amb rutes protegides per rol `admin`, pots usar aquest usuari:

```
Email: raul@example.com
Password: password123
Rol: admin
```

---

##  Com funciona JWT a la API

1. El client fa una petició POST a `/api/login` amb email i contrasenya.
2. Si són correctes, es retorna un token JWT.
3. Aquest token s’ha d’enviar en les peticions protegides, afegint el header:
   ```
   Authorization: Bearer <token>
   Accept: application/json
   ```
4. El middleware `auth:api` valida el token i carrega l’usuari.
5. El middleware `IsAdmin` comprova que `auth()->user()->role === 'admin'`.

---

##  Llistat de rutes

### Rutes públiques

| Mètode | Ruta           | Descripció              |
|--------|----------------|--------------------------|
| POST   | /api/register  | Registre d’usuari        |
| POST   | /api/login     | Login i generació token  |

### Rutes amb autenticació (`auth:api`)

| Mètode | Ruta           | Descripció              |
|--------|----------------|--------------------------|
| GET    | /api/profile   | Perfil de l’usuari loguejat |

### Rutes només per administradors (`IsAdmin`)

| Mètode | Ruta                    | Descripció                     |
|--------|-------------------------|---------------------------------|
| GET    | /api/users              | Llistar tots els usuaris        |
| GET    | /api/users/{id}         | Mostrar usuari concret          |
| PUT    | /api/users/{id}         | Editar usuari                   |
| DELETE | /api/users/{id}         | Eliminar usuari                 |
| GET    | /api/users/{id}/pets    | Llistar mascotes d’un usuari    |
