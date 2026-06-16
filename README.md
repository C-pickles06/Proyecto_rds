Claro. Con base en la foto y en lo que vi de tu proyecto, tu README podría quedar así:

```md
# Proyecto RDS - API de Empleados, Cargos y Funciones

Este proyecto es una API desarrollada con Laravel para administrar empleados, cargos y funciones asociadas a cada cargo. La API usa autenticación con Laravel Sanctum, por lo que las rutas principales deben consumirse enviando un token Bearer.

## Verificación Rápida de Herramientas

Antes de comenzar, verifica que tengas instaladas las herramientas necesarias:

```bash
php -v
```

```bash
composer -v
```

```bash
node -v
```

```bash
mysql --version
```

<<<<<<< HEAD
## Clonación y Configuración del Proyecto

Clonar el repositorio:
=======
## 👥 Clonación y Configuración del Proyecto

Despues de hacer el pequeño paréntesis de las herramientas se debe de clonar el repositorio con el comando:
>>>>>>> b8d7515b8fcb463ae0fc0f463cffb34405ac4bb0

```bash
git clone git@github.com:C-pickles06/Proyecto_rds.git
```

Entrar a la carpeta del proyecto:

```bash
cd "C:\Users\cesar\Desktop\Proyecto_rds"
```

Instalar dependencias de Laravel:

```bash
composer install
```

Instalar dependencias de Node:

```bash
npm install
```

Crear el archivo de entorno:

```bash
cp .env.example .env
```

Configurar la base de datos en `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_3066552
DB_USERNAME=root
DB_PASSWORD=1234
```

Importante: estos datos dependen de cómo tengas configurado MySQL en tu equipo.

Generar la llave de la aplicación:

```bash
php artisan key:generate
```

Crear la base de datos:

```sql
CREATE DATABASE db_3066552;
```

Ejecutar migraciones:

```bash
php artisan migrate
```

Poblar la base de datos:

```bash
php artisan db:seed
```

## Datos de Prueba

Al ejecutar los seeders, el proyecto crea datos iniciales para probar la API:

- 30 empleados
- 40 cargos
- 5 funciones de cargo
- 1 usuario administrador para generar token

Credenciales del usuario administrador:

```text
email: admin@example.com
password: 123456
```

Nota: en la evidencia se menciona “5 funciones por cargo”. Actualmente el proyecto crea 5 funciones en total. Si se necesita cumplir exactamente ese punto, el seeder de funciones debe generar 5 funciones para cada cargo.

## Ejecutar Pruebas Automáticas

```bash
php artisan test
```

## Levantar el Servidor

```bash
php artisan serve
```

<<<<<<< HEAD
La API quedará disponible en:
=======
1. debemos de estar en la terminal de git bash usando el cliente url (cURL) pasamos a loguearnos para obtener el token:

```bash
curl -X POST http://localhost:8000/api/login -H "Accept: application/json" -H "Content-Type: application/json" -d '{"email":"admin@example.com","password":"123456"}'

```

Esta petición nos genera el un token:
>>>>>>> b8d7515b8fcb463ae0fc0f463cffb34405ac4bb0

```text
http://127.0.0.1:8000
```

## Autenticación

Para consumir las rutas protegidas se debe iniciar sesión y obtener un token:

```bash
curl -X POST http://127.0.0.1:8000/api/login -H 'Accept: application/json' -H 'Content-Type: application/json' -d '{"email":"admin@example.com","password":"123456"}'
```

La respuesta será un token similar a este:

```text
2|TOKEN_GENERADO_POR_SANCTUM
```

En los siguientes ejemplos reemplaza `TU_TOKEN` por el token generado.

## Pruebas con cURL

### Listar Empleados

```bash
curl -H 'Accept: application/json' -H 'Authorization: Bearer TU_TOKEN' http://127.0.0.1:8000/api/empleados
```

### Listar Cargos

```bash
curl -H 'Accept: application/json' -H 'Authorization: Bearer TU_TOKEN' http://127.0.0.1:8000/api/cargos
```

### Listar Funciones de Cargo

```bash
curl -H 'Accept: application/json' -H 'Authorization: Bearer TU_TOKEN' http://127.0.0.1:8000/api/funcionesCargo
```

### Crear Cargo

```bash
curl -X POST -H 'Content-Type: application/json' -H 'Accept: application/json' -H 'Authorization: Bearer TU_TOKEN' -d '{"nombre_cargo":"Desarrollador Junior","descripcion":"Desarrollo de APIs con Laravel"}' http://127.0.0.1:8000/api/cargos
```

### Actualizar Cargo

```bash
curl -X PUT -H 'Content-Type: application/json' -H 'Accept: application/json' -H 'Authorization: Bearer TU_TOKEN' -d '{"nombre_cargo":"Desarrollador Senior","descripcion":"Lider técnico de APIs con Laravel"}' http://127.0.0.1:8000/api/cargos/1
```

### Eliminar Cargo

```bash
curl -X DELETE -H 'Accept: application/json' -H 'Authorization: Bearer TU_TOKEN' http://127.0.0.1:8000/api/cargos/2
```

### Crear Función de Cargo

```bash
curl -X POST -H 'Content-Type: application/json' -H 'Accept: application/json' -H 'Authorization: Bearer TU_TOKEN' -d '{"descripcion_funcion":"Programar endpoints de la API","estado":"Activo","id_cargo":1}' http://127.0.0.1:8000/api/funcionesCargo
```

### Actualizar Función de Cargo

```bash
curl -X PUT -H 'Content-Type: application/json' -H 'Accept: application/json' -H 'Authorization: Bearer TU_TOKEN' -d '{"descripcion_funcion":"Diseñar arquitectura del sistema","estado":"Activo"}' http://127.0.0.1:8000/api/funcionesCargo/1
```

### Eliminar Función de Cargo

```bash
curl -X DELETE -H 'Accept: application/json' -H 'Authorization: Bearer TU_TOKEN' http://127.0.0.1:8000/api/funcionesCargo/2
```

### Crear Empleado

```bash
curl -X POST -H 'Content-Type: application/json' -H 'Accept: application/json' -H 'Authorization: Bearer TU_TOKEN' -d '{"id_cargo":1,"nombres":"Carlos","apellidos":"Mendoza","fecha_nacimiento":"1995-04-12","fecha_ingreso":"2026-06-01","salario":28000,"estado":"activo"}' http://127.0.0.1:8000/api/empleados
```

### Detalle de Empleado

Este endpoint muestra el detalle del empleado, incluyendo cargo asignado, salario y funciones del cargo:

```bash
curl -H 'Accept: application/json' -H 'Authorization: Bearer TU_TOKEN' http://127.0.0.1:8000/api/empleados/1
```

### Actualizar Empleado

```bash
curl -X PUT -H 'Content-Type: application/json' -H 'Accept: application/json' -H 'Authorization: Bearer TU_TOKEN' -d '{"id_cargo":1,"nombres":"Carlos Andres","apellidos":"Mendoza Perez","fecha_nacimiento":"1995-04-12","fecha_ingreso":"2026-06-01","salario":35000,"estado":"activo"}' http://127.0.0.1:8000/api/empleados/1
```

### Eliminar Empleado

```bash
curl -X DELETE -H 'Accept: application/json' -H 'Authorization: Bearer TU_TOKEN' http://127.0.0.1:8000/api/empleados/2
```

## Prueba sin Token

Si se intenta consumir una ruta protegida sin enviar token:

```bash
curl -H 'Accept: application/json' http://127.0.0.1:8000/api/cargos
```

La API responde:

```json
{
  "message": "Unauthenticated."
}
```

Esto confirma que no se pueden crear, listar, actualizar o eliminar empleados, cargos o funciones si el usuario no está autenticado.

## Prueba de Validaciones

Ejemplo de intento incorrecto al crear un empleado, enviando solo el nombre:

```bash
curl -X POST -H 'Accept: application/json' -H 'Authorization: Bearer TU_TOKEN' -d '{"nombres":"Juan"}' http://127.0.0.1:8000/api/empleados
```

Respuesta esperada:

```json
{
  "message": "error en la validacion de los datos",
  "errors": {
    "id_cargo": [
      "The id cargo field is required."
    ],
    "apellidos": [
      "The apellidos field is required."
    ],
    "fecha_nacimiento": [
      "The fecha nacimiento field is required."
    ],
    "fecha_ingreso": [
      "The fecha ingreso field is required."
    ],
    "salario": [
      "The salario field is required."
    ],
    "estado": [
      "The estado field is required."
    ]
  },
  "status": "400"
}
```

## Endpoints Principales

```text
POST   /api/login
POST   /api/register

GET    /api/empleados
POST   /api/empleados
GET    /api/empleados/{empleado}
PUT    /api/empleados/{empleado}
DELETE /api/empleados/{empleado}

GET    /api/cargos
POST   /api/cargos
PUT    /api/cargos/{cargo}
DELETE /api/cargos/{cargo}

GET    /api/funcionesCargo
POST   /api/funcionesCargo
PUT    /api/funcionesCargo/{funcionesCargo}
DELETE /api/funcionesCargo/{funcionesCargo}
```

## Recomendación para la Evidencia

Para documentar la evidencia solicitada, se recomienda ejecutar y capturar:

- Login y generación del token.
- Lista de empleados.
- Lista de cargos.
- Lista de funciones de cargo.
- Creación de cargo.
- Creación de función asociada a un cargo.
- Creación de empleado asociado a un cargo.
- Detalle de empleado con cargo, salario y funciones.
- Actualización de empleado.
- Eliminación de empleado.
- Intento de consulta sin token.
- Intento de creación con datos incompletos para mostrar validaciones.
```