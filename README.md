# backend-php
Stack Tech medoo, slim, jwt Pattern RSA

## 🧰 Tecnologías y Arquitectura

El proyecto implementa un backend en PHP con un stack moderno y modular, compuesto por:

* **Slim Framework**: Microframework para construir APIs RESTful de forma ligera y eficiente.
* **Medoo**: Librería de acceso a bases de datos que proporciona una capa de abstracción sencilla para operaciones CRUD.
* **JWT (JSON Web Tokens)**: Mecanismo de autenticación basado en tokens, utilizando el patrón RSA para la firma y verificación de los mismos.
* **Docker**: Contenedorización del entorno de desarrollo y despliegue mediante archivos `Dockerfile` y `docker-compose.yml`.
* **Makefile**: Automatización de tareas comunes como la construcción y ejecución de contenedores.
* **Variables de entorno**: Gestión de configuraciones sensibles a través de un archivo `.env.template`, lo cual es una buena práctica para mantener la seguridad y flexibilidad del entorno.

---

## 📁 Estructura del Proyecto

El repositorio presenta la siguiente organización de archivos y directorios:

* `.vscode/`: Configuraciones específicas del entorno de desarrollo en Visual Studio Code.
* `src/`: Directorio principal que contiene el código fuente de la aplicación.
* `.env.template`: Plantilla para definir variables de entorno necesarias para la configuración del entorno.
* `Dockerfile` y `docker-compose.yml`: Archivos para la construcción y orquestación de contenedores Docker.
* `Makefile`: Archivo para automatizar tareas de desarrollo y despliegue.
* `index.php`: Punto de entrada principal de la aplicación.
* `composer.json`: Archivo de configuración de Composer para la gestión de dependencias PHP.
* `README.md`: Documento que proporciona una visión general del proyecto.

---

## ✅ Puntos Fuertes

* **Modularidad y claridad**: El uso de Slim Framework y Medoo permite una arquitectura limpia y modular, facilitando el mantenimiento y la escalabilidad.
* **Autenticación segura**: La implementación de JWT con firma RSA proporciona un mecanismo robusto para la autenticación y autorización de usuarios.
* **Entorno reproducible**: La integración de Docker y Makefile permite la creación de entornos de desarrollo y producción consistentes y fácilmente replicables.
* **Gestión de configuraciones**: El uso de un archivo `.env.template` promueve buenas prácticas en la gestión de configuraciones sensibles y específicas del entorno.

---