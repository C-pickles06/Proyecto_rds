# Sistema de Gestión - Proyecto RDS

Este es un proyecto desarrollado con Laravel que implementa un sistema para la gestión de **Empleados**, **Cargos** y las **Funciones** asociadas a dichos cargos. Todo el flujo de comunicación se realiza mediante una API REST protegida bajo estándares de seguridad modernos.

---

## 🛠️ Dependencias Principales

El proyecto utiliza las siguientes dependencias clave para asegurar su correcto funcionamiento y mantenimiento:

1. **Laravel Sanctum**:
   * **Propósito**: Gestión de autenticación basada en tokens API de forma simple y segura.
   * **Uso**: Emite tokens de acceso de texto plano (`API Tokens`) tras un inicio de sesión exitoso. Estos tokens se utilizan posteriormente para autorizar solicitudes HTTP a las rutas protegidas.
2. **Pest PHP / PHPUnit**:
   * **Propósito**: Framework de pruebas centrado en la legibilidad y simplicidad.
   * **Uso**: Automatiza la validación de los endpoints del sistema (CRUDs de empleados, cargos y funciones) garantizando que los cambios de código no rompan la funcionalidad existente.

---

## 🚀 Instalación y Configuración del Entorno Seguro

Sigue estos pasos para levantar el entorno de desarrollo local y asegurar su correcto aislamiento:

### 1. Clonar el repositorio e Instalar dependencias
Instala los paquetes necesarios definidos en el archivo `composer.json`:
```bash
composer install
