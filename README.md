## 🚀 Verificación Rápida de Herramientas

Antes de comenzar, asegúrate de tener listo tu entorno de desarrollo. Copia y pega el siguiente bloque completo en tu terminal para verificar todas las versiones de un solo golpe:

```bash
php -v && composer -v && node -v && mysql --version

### 🛠️ ¿Te falta alguna herramienta?

Si la terminal te arrojó un error con algún comando, significa que necesitas instalar esa herramienta específica de forma individual. Aquí tienes los enlaces oficiales para ponerte al día:

1. **PHP:** Descárgalo desde el sitio oficial [php.net/downloads](https://www.php.net/downloads) e intégralo a las variables de entorno de tu sistema.
2. **Composer:** Descarga el instalador oficial para gestionar las dependencias de backend desde [getcomposer.org](https://getcomposer.org/).
3. **Node.js & NPM:** Descarga la versión recomendada (LTS) desde [nodejs.org](https://nodejs.org/), la cual ya incluye NPM automáticamente.
4. **MySQL:** Descarga el servidor y las herramientas de consola desde [dev.mysql.com/downloads](https://dev.mysql.com/downloads/).

---

> ⚠️ **Importante:** Después de instalar cualquiera de estas herramientas, asegúrate de **reiniciar tu terminal** o tu editor de código para que el sistema reconozca los nuevos comandos.

```markdown
## 🚀 Verificación Rápida de Herramientas

Antes de comenzar, asegúrate de tener listo tu entorno de desarrollo. Copia y pega el siguiente bloque completo en tu terminal para verificar todas las versiones de un solo golpe:

```bash
php -v && node -v && composer -v && mysql --version

```

### 🛠️ ¿Te falta alguna herramienta?

Si la terminal te arrojó un error con algún comando, significa que necesitas instalar esa herramienta específica de forma individual. Aquí tienes los enlaces oficiales para ponerte al día:

1. **PHP:** Descárgalo desde el sitio oficial [php.net/downloads](https://www.php.net/downloads) e intégralo a las variables de entorno de tu sistema.
2. **Composer:** Descarga el instalador oficial para gestionar las dependencias de backend desde [getcomposer.org](https://getcomposer.org/).
3. **Node.js & NPM:** Descarga la versión recomendada (LTS) desde [nodejs.org](https://nodejs.org/), la cual ya incluye NPM automáticamente.
4. **MySQL:** Descarga el servidor y las herramientas de consola desde [dev.mysql.com/downloads](https://dev.mysql.com/downloads/).

---

> ⚠️ **Importante:** Después de instalar cualquiera de estas herramientas, asegúrate de **reiniciar tu terminal** o tu editor de código para que el sistema reconozca los nuevos comandos.

---

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
curl -X POST http://localhost:8000/api/sesion -H "Accept: application/json" -H "Content-Type: application/json" -d '{"email":"admin@example.com","password":"123456"}'

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