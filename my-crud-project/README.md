# My CRUD Project

Este proyecto consiste en un sistema CRUD en PHP que permite dar de alta conferencistas, salas y participantes de conferencias. Además, cuenta con un sistema de login con validaciones de usuario y contraseña.

## Estructura del proyecto

El proyecto está organizado de la siguiente manera:

```
my-crud-project
├── app
│   ├── controllers
│   │   ├── AuthController.php
│   │   ├── ConferencistaController.php
│   │   ├── SalaController.php
│   │   └── ParticipanteController.php
│   ├── models
│   │   ├── User.php
│   │   ├── Conferencista.php
│   │   ├── Sala.php
│   │   └── Participante.php
│   ├── views
│   │   ├── auth
│   │   │   ├── login.php
│   │   │   └── register.php
│   │   ├── conferencistas
│   │   │   ├── create.php
│   │   │   ├── edit.php
│   │   │   ├── index.php
│   │   │   └── show.php
│   │   ├── salas
│   │   │   ├── create.php
│   │   │   ├── edit.php
│   │   │   ├── index.php
│   │   │   └── show.php
│   │   └── participantes
│   │       ├── create.php
│   │       ├── edit.php
│   │       ├── index.php
│   │       └── show.php
│   └── helpers
│       └── auth.php
├── config
│   ├── app.php
│   ├── auth.php
│   └── database.php
├── public
│   ├── index.php
│   ├── css
│   │   └── style.css
│   └── js
│       └── script.js
├── vendor
│   ├── autoload.php
│   └── ...
├── .vscode
│   ├── settings.json
│   └── launch.json
├── composer.json
├── composer.lock
├── README.md
└── import.php
```

## Funcionalidades

El sistema permite:

- Dar de alta conferencistas, salas y participantes de conferencias.
- Seleccionar automáticamente la sala en la que estarán dando la conferencia.
- Dar de alta participantes de la conferencia (público).
- Iniciar sesión con validaciones de usuario y contraseña.

## Tecnologías utilizadas

El proyecto está desarrollado en PHP y utiliza una base de datos MySQL. Además, se utiliza el framework Composer para la gestión de dependencias.

## Instalación

Para instalar el proyecto, se deben seguir los siguientes pasos:

1. Clonar el repositorio en la carpeta deseada.
2. Ejecutar `composer install` para instalar las dependencias.
3. Configurar la base de datos en el archivo `config/database.php`.
4. Ejecutar el archivo `import.php` para importar la estructura de la base de datos.
5. Acceder al proyecto desde un servidor web.

## Contribuciones

Las contribuciones al proyecto son bienvenidas. Si desea contribuir, por favor abra un issue o envíe un pull request.