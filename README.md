<h1 align="center">
     Birdie
</h1>

## Sobre Birdie

Es una pequeña red social hecha en laravel para probrar la potencia del dicho framework.
Birdie cuenta con registro/inicio de sesión, crear publicaciones, dar likes, comentarios, perfil de usuario, buscador de usuarios, editar información de usuarios.

## Ejecutar Birdie

### 1. Posicionarte en la carpeta donde se clonará el proyecto
Abre la consola de comandos de Git (Windows) o la Terminal en sistemas basados en Unix (Mac o Linux) y posiciónate en la carpeta que clonarás tu repositorio con el comando:

```bash
cd
```

### 2. Clonar repositorio  
Una vez posicionado en la carpeta ejecutar el sig comando desde la terminal:

```bash
git clone https://github.com/FacuBnz/Birdie.git
```


### 3. Instalar paquetes o dependencias
Ahora entra en la carpeta del proyecto que acabas de clonar desde la Terminal o consola de Git con el comando cd y el nombre del proyecto justo como el paso 1. Ya adentro del proyecto ejecuta los sig comandos (uno a la vez):

```bash
composer install
```

```bash
npm install 
```


### 4. Clonar contenido del archivo .env.example
Dentro de la carpeta de tu proyecto ejecuta el siguiente comando:

```bash
cp .env.example .env
```


### 5. Generar APP_KEY y prueba

La APP_KEY es una cadena de carácteres generada aleatoriamente por Laravel que utiliza para todas las cookies cifradas, como las cookies de sesión. Para generar la APP_KEY del proyecto ejecuta el siguiente comando:

```bash
php artisan key:generate
```


### 6. Migraciones con laravel
Es necesario crear la base de datos en el gestor de base de datos que usas y cambiar los parámetros de conexión (host, base de datos, usuario, contraseña, etc) en el archivo .env. y por ultimo desde la terminal (dentro de la carpeta de tu proyecto) ejecuta el siguiente comando:

```bash
php artisan migrate
```


### 7. Arrancar la aplicacion
por ultimo desde la terminal (dentro de la carpeta de tu proyecto) ejecuta el servidor con el comando comando:

```bash
php artisan serve
```
