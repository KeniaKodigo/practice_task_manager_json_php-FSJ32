# 📘 Gestion de Tareas y Empleados PHP

## 📌 Descripción del proyecto

Este proyecto es una aplicación de gestión de empleados y tareas
desarrollada en PHP bajo los principios de Programación Orientada a
Objetos (POO) y SOLID.

El sistema permite:

-   Registrar empleados.
-   Crear, editar y listar tareas.
-   Asociar tareas a empleados.
-   Gestionar credenciales y salarios de empleados.

Los datos no se almacenarán en una base de datos tradicional, sino en
archivos JSON, para facilitar la práctica con estructuras de datos y
manipulación de ficheros en PHP.

Además, se sigue una arquitectura MVC (Modelo - Vista - Controlador)
para mantener la organización del código.

## 📂 Estructura del proyecto

    .
    ├── controllers/       # Controladores (manejan la lógica de la aplicación)
    │   └── TaskController.php
    │   └── EmployeeController.php
    │
    ├── models/            # Modelos (clases que representan entidades: Employee, Task, Manager)
    │   └── Employee.php
    │   └── Task.php
    │   └── Manager.php
    │
    ├── views/             # Vistas (interfaces básicas para mostrar información al usuario)
    │   └── employees/
    │   └── tasks/
    │
    ├── interfaces/        # Interfaces para definir contratos (ej: ICRUDTask.php)
    │   └── ICRUDTask.php
    │
    ├── data/              # Archivos JSON (simulan la base de datos)
    │   └── employees.json
    │   └── tasks.json
    │
    ├── index.php          # Punto de entrada de la aplicación
    └── README.md
