# Catalogo Turismo

Un catalogo web de lugares turisticos de El Salvador hecho con Laravel. La idea era mostrar una lista de destinos (volcanes, playas, pueblos coloniales, rutas de cafe, etc.) con su precio, horario, ubicacion y descripcion, y dar un formulario de contacto por si alguien quiere preguntar algo. 
<br>⚠️ ¡Importante!, las imagenes estan en la carpeta `imagenes_aplicacion/` 

## Que tiene

- Pagina principal con el listado de lugares turisticos
- Pagina de detalle de cada lugar
- Formulario de contacto que guarda los mensajes
- Login y registro de usuarios (con dashboard) por si quieres la parte de auth

## Sobre la base de datos

Una aclaracion importante: no habia leido bien que los datos debian ir en un JSON, asi que termine guardando todo en una base de datos PostgreSQL. Los lugares y los mensajes de contacto viven en tablas normales de la base (la tabla `lugares` y la tabla `contactos`). Funciona igual de bien, solo que con base de datos de verdad en vez de un archivo JSON.

## Requisitos

- PHP 8.3 o superior
- Composer
- Node.js y npm
- PostgreSQL

## Como usarlo

1. Clona el repositorio y entra a la carpeta.

2. Instala las dependencias:

   ```bash
   composer install
   npm install
   ```

3. Copia el archivo de variables de entorno y genera la clave de la app:

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. Configura la base de datos. En tu `.env`, pon el driver y los datos de tu PostgreSQL:

   ```
   DB_CONNECTION=pgsql
   DB_HOST=127.0.0.1
   DB_PORT=5432
   DB_DATABASE=catalogo_turismo
   DB_USERNAME=tu_usuario
   DB_PASSWORD=tu_password
   ```

5. Crea la base de datos si no existe y corre las migraciones con los datos de ejemplo:

   ```bash
   php artisan migrate
   php artisan db:seed
   ```

   El seed carga unos lugares de ejemplo (Volcan de Santa Ana, Ruta de las Flores, Playa El Tunco, etc.) y crea un usuario de prueba con correo `test@example.com` y contrasena `password`.

6. Levanta el servidor:

   ```bash
   php artisan serve
   ```

   Y en otra terminal, si vas a tocar estilos o scripts:

   ```bash
   npm run dev
   ```

7. Abre http://localhost:8000 en el navegador y listo.

## Rutas

- `/` : catalogo de lugares
- `/lugares/{id}` : detalle de un lugar
- `/contacto` : formulario de contacto
- `/login` y `/register` : autenticacion

## Nota final

Es un proyecto sencillo hecho como practica de patron MVC. Si en algun momento hace falta que los datos si o si vayan en JSON, se puede adaptar, pero por ahora todo sale de la base de datos.
