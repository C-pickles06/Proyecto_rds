## 🚀 Verificación Rápida de Herramientas

Antes de comenzar, asegúrate de tener listo tu entorno de desarrollo. Copia y pega el siguiente bloque completo en tu terminal para verificar todas las versiones de un solo golpe:

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

## 👥 Clonación y Configuración del Proyecto

Despues de hacer el pequeño paréntesis de las herramientas se debe de clonar el repositorio con el comando:

```bash
git clone git@github.com:C-pickles06/Proyecto_rds.git

```

Despues de haber clonado nuestro repositorio con exito debemos de acceder a la ruta de donde clonamos el repositorio:
ejmeplo:

```bash
cd "C:\Users\cesar\Desktop\Proyecto_rds"

```

Ejecutar el comando del instalador de dependencias:

```bash
composer install

```

Ejecutar el comando de instalacion del manejador del instalador de paquetes:

```bash
npm install

```

Ahora nuestro siguiente paso es configurar nuestras credenciales de acceso y nuestra base de datos ejecutando el siguiente comando:

```bash
cp .env.example .env

```

Dentro del IDE(entorno de desarrollo) debemos de abrir el repositorio que clonamos y ir al archivo .env.example y editar la configuración de la base de datos

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_3066552
DB_USERNAME=root
DB_PASSWORD=1234

```

> 💡 **Importante:** La configuracion de la base de datos va de acuerdo a como tengas configurado tus credenciales en mysql, yo solo te estoy proporcionando un ejemplo de cuales podrían ser las credenciales

Luego debemos de ejecutar el comando:

```bash
php artisan key:generate

```

Ahora debemos de crear la base de datos en nuestro motor de base de datos:

```sql
CREATE DATABASE db_3066552;

```

Enviar las migraciones ejecutando el comando:

```bash
php artisan migrate

```

Poblar la base de datos ejecutando el comando:

```bash
php artisan db:seed

```

---

## 🧪 Pruebas

Primera prueba (ejecutar los test):

```bash
php artisan test

```

Generar los tokens, primero debemos de levantar el servidor:

```bash
php artisan serve

```

1. debemos de estar en la terminal de git bash usando el cliente url (cURL) pasamos a loguearnos para obtener el token:

```bash
curl -X POST http://localhost:8000/api/login -H "Accept: application/json" -H "Content-Type: application/json" -d '{"email":"admin@example.com","password":"123456"}'

```

Esta petición nos genera el un token:

```text
2|rcQgYGXkcXdb2TepG7e76zpZvBToGnbazuEy99Id4f62a6c1

```
2. corremos el siguiente comando para crear un nuevo cargo:

```bash
curl -X POST -H 'Content-Type: application/json' -H 'Authorization: Bearer 2|rcQgYGXkcXdb2TepG7e76zpZvBToGnbazuEy99Id4f62a6c1' -d '{"nombre_cargo":"Desarrollador Junior","descripcion":"Desarrollo de APIs con Laravel"}' http://127.0.0.1:8000/api/cargos
```
3. creamos una funcion para el ID #1:
```bash
curl -X POST -H 'Content-Type: application/json' -H 'Authorization: Bearer 2|rcQgYGXkcXdb2TepG7e76zpZvBToGnbazuEy99Id4f62a6c1' -d '{"descripcion_funcion":"Programar endpoints de la API","estado":"Activo","id_cargo":1}' http://127.0.0.1:8000/api/funcionesCargo
```
4. Crear un empleado asociado al cargo ID #1:
```bash
curl -X POST -H 'Content-Type: application/json' -H 'Authorization: Bearer 2|rcQgYGXkcXdb2TepG7e76zpZvBToGnbazuEy99Id4f62a6c1' -d '{"id_cargo":1,"nombres":"Carlos","apellidos":"Mendoza","fecha_nacimiento":"1995-04-12","fecha_ingreso":"2026-06-01","salario":28000,"estado":"activo"}' http://127.0.0.1:8000/api/empleados
```
5. Eliminar un empleado
```bash
curl -X DELETE -H 'Accept: application/json' -H 'Authorization: Bearer 2|rcQgYGXkcXdb2TepG7e76zpZvBToGnbazuEy99Id4f62a6c1' http://127.0.0.1:8000/api/empleados/2
```

6. Sin que este validado el token:
```bash
curl -H 'Accept: application/json' http://127.0.0.1:8000/api/cargos
```
Nos lanza este error:
```text
{
    "message": "Unauthenticated."
}
```
7. Sin las validaciones de backend:
```bash
curl -X POST -H 'Accept: application/json' -H 'Authorization: Bearer 2|rcQgYGXkcXdb2TepG7e76zpZvBToGnbazuEy99Id4f62a6c1' -d '{"nombres":"Juan"}' http://127.0.0.1:8000/api/empleados
```
Nos lanza el siguiente error:
```bash
{"message":"error en la validacion de los datos","errors":{"id_cargo":["The id cargo field is required."],"nombres":["The nombres field is required."],"apellidos":["The apellidos field is required."],"fecha_nacimiento":["The fecha nacimiento field is required."],"fecha_ingreso":["The fecha ingreso field is required."],"salario":["The salario field is required."],"estado":["The estado field is required."]},"status":"400"}
```

## Endpoints

## Resumen de endpoints

| Modulo | Metodo | Ruta | Protegida | Descripcion |
| --- | --- | --- | --- | --- |
| Auth | POST | `/api/register` | No | Registrar usuario y generar token |
| Auth | POST | `/api/login` | No | Iniciar sesion y generar token |
| Auth | POST | `/api/logout` | Si | Cerrar sesion y eliminar token actual |
| Empleados | GET | `/api/empleados` | Si | Listar empleados |
| Empleados | POST | `/api/empleados` | Si | Crear empleado |
| Empleados | GET | `/api/empleados/{id}` | Si | detalle empleado |
| Empleados | PUT/PATCH | `/api/empleados/{id}` | Si | Actualizar empleado |
| Empleados | DELETE | `/api/empleados/{id}` | Si | Eliminar empleado |
| Cargos | GET | `/api/cargos` | Si | Listar cargos |
| Cargos | POST | `/api/cargos` | Si | Crear cargo |
| Cargos | GET | `/api/cargos/{id}` | Si | Buscar cargo por ID y muestra las funciones |
| Cargos | PUT/PATCH | `/api/cargos/{id}` | Si | Actualizar cargo |
| Cargos | DELETE | `/api/cargos/{id}` | Si | Eliminar cargo |
| Funciones cargo | GET | `/api/funcionCargos` | Si | Listar funciones cargo |
| Funciones cargo | POST | `/api/funcionCargos` | Si | Crear funcion cargo |
| Funciones cargo | GET | `/api/funcionCargos/{id}` | Si | Buscar funcion cargo por ID |
| Funciones cargo | PUT/PATCH | `/api/funcionCargos/{id}` | Si | Actualizar funcion cargo |
| Funciones cargo | DELETE | `/api/funcionCargos/{id}` | Si | Eliminar funcion cargo |
| Cerrar sesion | POST | `/api/logout` | Si | Cerrar sesion |
---