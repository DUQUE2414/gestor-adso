# 📋 Gestor ADSO

Sistema web desarrollado con **Laravel y PHP** para la gestión de información relacionada con el programa de formación **Análisis y Desarrollo de Software (ADSO)**.

Este documento explica paso a paso cómo instalar las herramientas necesarias en Linux (CachyOS), crear y configurar el proyecto, conectar la base de datos MariaDB (XAMPP), ejecutar las migraciones y poner en funcionamiento el servidor local mediante Fish Shell.

##  1. Información general del proyecto

**Nombre:** Gestor ADSO

**Tipo de aplicación:** Aplicación web

**Framework:** Laravel

**Lenguaje de programación:** PHP

**Base de datos:** MariaDB / MySQL (XAMPP)

**Entorno de desarrollo:** Visual Studio Code y XAMPP

**Sistema operativo:** Linux (CachyOS)

**Shell:** Fish Shell

**Control de versiones:** Git

### 🎯 Propósito

Gestor ADSO tiene como propósito servir como una aplicación web para organizar y administrar información mediante una base de datos relacional.

El proyecto utiliza Laravel para estructurar el código, gestionar las rutas y facilitar las operaciones con la base de datos. Las migraciones permiten definir y crear las tablas de manera organizada, facilitando el mantenimiento y la evolución del sistema.

> **Nota:** Las funcionalidades específicas del gestor dependerán de los módulos, modelos, controladores y migraciones que se desarrollen durante el proyecto.

##  2. Herramientas y versiones verificadas

Las siguientes versiones fueron verificadas directamente en el equipo mediante los comandos correspondientes.

| Herramienta | Versión verificada | Comando | 
| ----- | ----- | ----- | 
| PHP | 8.2.12 (CLI) (`/opt/lampp/bin/php`) | `php -v` | 
| Composer | 2.10.3 (`~/.local/bin/composer`) | `composer -V` | 
| Laravel Framework | 12.69.3 | `php artisan --version` | 
| Git | 2.56.0 | `git --version` | 
| Visual Studio Code | Editor de código | `code --version` | 
| XAMPP / MariaDB | 10.4.32-MariaDB | `xstatus` / `mysql` | 

**¿Para qué sirve cada herramienta?**

* **PHP:** lenguaje de programación utilizado para desarrollar la lógica del sistema.

* **Composer:** administrador de dependencias de PHP; permite instalar las bibliotecas que necesita Laravel.

* **Laravel:** framework que proporciona una estructura para desarrollar aplicaciones web.

* **Git:** herramienta para registrar cambios y controlar las versiones del código.

* **Visual Studio Code:** editor utilizado para escribir y modificar los archivos del proyecto.

* **XAMPP:** entorno local que proporciona servicios como Apache y MariaDB.

**Importante:** Las versiones indicadas corresponden a las verificadas en el equipo. Al crear un proyecto nuevo, la versión de Laravel instalada puede variar según las versiones disponibles y las restricciones de Composer.

## 📋 3. Requisitos previos

Antes de comenzar, se debe comprobar que las herramientas estén instaladas y funcionen correctamente en tu terminal Fish.

### Paso 1. Abrir la terminal Fish

Abre tu terminal favorita (por ejemplo, Kitty, Alacritty o Konsole) configurada con **Fish Shell**.

### Paso 2. Verificar PHP

Ejecutar:

```
php -v

```

La salida debe indicar PHP 8.2.12 (XAMPP CLI).

### Paso 3. Verificar Composer

Ejecutar:

```
composer -V

```

Debe aparecer la versión `2.10.3` de Composer instalada localmente.

### Paso 4. Verificar Git

Ejecutar:

```
git --version

```

Este comando permite comprobar que Git está disponible para el control de versiones.

### Paso 5. Verificar Laravel

Este comando debe ejecutarse dentro de la carpeta de un proyecto Laravel:

```
php artisan --version

```

##  4. Crear el proyecto Laravel

### Paso 1. Ir a la carpeta Documentos

En tu terminal Fish, ejecutar:

```
cd ~/Documentos

```

### Paso 2. Crear el proyecto

Ejecutar:

```
composer create-project laravel/laravel gestor-adso

```

Composer descargará Laravel e instalará sus dependencias dentro de una nueva carpeta llamada `gestor-adso`.

### Paso 3. Ingresar a la carpeta del proyecto

```
cd gestor-adso

```

### Paso 4. Comprobar la versión de Laravel

```
php artisan --version

```

La versión registrada durante la verificación del equipo fue Laravel Framework `12.69.3`.

### Paso 5. Abrir el proyecto en Visual Studio Code

Desde la carpeta del proyecto, ejecutar:

```
code .

```

##  5. Configurar las variables de entorno

Laravel utiliza el archivo `.env` para almacenar la configuración local de la aplicación, incluida la conexión con la base de datos.

### Paso 1. Comprobar el archivo `.env`

En la raíz del proyecto, verificar que exista el archivo:

```
gestor-adso/.env

```

Si no existe, en tu terminal Fish ejecutar:

```
cp .env.example .env
php artisan key:generate

```

### Paso 2. Configurar la aplicación

Abrir `.env` en Visual Studio Code y comprobar los siguientes parámetros:

```
APP_NAME="Gestor ADSO"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

```

### Paso 3. Configurar la base de datos

En el mismo archivo `.env`, establecer los parámetros de conexión para XAMPP:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gestor_adso
DB_USERNAME=root
DB_PASSWORD=

```

##  6. Crear la base de datos MariaDB (XAMPP)

### Paso 1. Iniciar XAMPP

Asegúrate de que los servicios de XAMPP estén activos en tu sistema (por ejemplo, ejecutando `xstart` si tienes configurado tu alias).

### Paso 2. Crear la base de datos mediante la terminal

Conéctate al cliente de MariaDB con el puerto predeterminado de XAMPP (`3306`):

```
mysql -h 127.0.0.1 -P 3306 -u root

```

Dentro de la consola de MariaDB, ejecuta la sentencia SQL:

```
CREATE DATABASE gestor_adso
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

```

Para salir de la consola de MariaDB, escribe:

```
EXIT;

```

##  7. Ejecutar las migraciones de Laravel

Las migraciones permiten definir la estructura de las tablas de la base de datos mediante archivos de código.

### Paso 1. Limpiar caché de configuración

```
php artisan config:clear

```

### Paso 2. Ejecutar las migraciones

```
php artisan migrate

```

Laravel ejecutará las migraciones pendientes y creará las tablas definidas en los archivos de `database/migrations` (como `users`, `cache` y `jobs`).

##  8. Ejecutar el servidor local

### Paso 1. Abrir la terminal del proyecto

En Visual Studio Code, abrir una nueva terminal y comprobar que esté ubicada en `~/Documentos/gestor-adso`.

### Paso 2. Iniciar Laravel

Ejecutar:

```
php artisan serve

```

Aparecerá un mensaje indicando que el servidor corre en:

```
INFO  Server running on [http://127.0.0.1:8000].

```

### Paso 3. Abrir la aplicación

Ingresar desde el navegador web a:
 **`http://127.0.0.1:8000`**

### Paso 4. Detener el servidor

Para detener el servidor local, presionar en la terminal:

```
Ctrl + C

```

## 🧹 9. Solución de problemas frecuentes

### Error 1. `php` o `composer` no se reconocen como comandos

* **Solución:** Asegúrate de que las rutas globales de XAMPP (`/opt/lampp/bin/php`) y tu directorio local de binarios (`~/.local/bin/composer`) estén correctamente agregadas a tu variable `$PATH` en Fish Shell (`~/.config/fish/config.fish`).

### Error 2. Error de conexión con MySQL / MariaDB

* **Solución:** Comprueba que el servicio de MySQL de XAMPP esté encendido y que el puerto sea estrictamente `3306` en tu archivo `.env`.

##  10. Evidencias del proceso

| Evidencia | Archivo sugerido | Qué debe mostrar | 
| ----- | ----- | ----- | 
| Versiones instaladas | `versiones.png` | PHP `8.2.12`, Composer `2.10.3`, Laravel `12.69.3`, Git `2.56.0` | 
| Creación de base de datos | `base-datos.png` | Ejecución exitosa de `CREATE DATABASE gestor_adso` en MariaDB | 
| Migraciones completadas | `migraciones.png` | Tablas creadas con estado **DONE** | 
| Servidor en ejecución | `servidor.png` | Servidor Laravel iniciado en `127.0.0.1:8000` | 

## 📁 11. Estructura general del proyecto

```
gestor-adso/
├── app/
├── bootstrap/
├── config/
├── database/
│   └── migrations/
├── public/
├── resources/
├── routes/
├── storage/
├── tests/
├── .env
├── .env.example
├── artisan
├── composer.json
└── README.md

```

## 12. Información del autor

* **Proyecto:** Gestor ADSO

* **Programa de formación:** Análisis y Desarrollo de Software (ADSO)

* **Usuario del equipo:** `duque`

* **Ruta local del proyecto:** `~/Documentos/gestor-adso`

* **Entorno de desarrollo:** Linux (CachyOS), Fish Shell, Visual Studio Code y XAMPP

**Documento técnico de instalación y configuración de Gestor ADSO.**