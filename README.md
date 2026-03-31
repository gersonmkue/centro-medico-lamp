# 💻 Centro Médico LAMP

Sistema web básico para la gestión de pacientes desarrollado con el stack **LAMP (Linux, Apache, MySQL, PHP)**.

---

## 📌 Descripción

Este proyecto implementa un entorno funcional LAMP que permite:

* Registro de pacientes
* Consulta de registros
* Conexión entre backend (PHP) y base de datos (MySQL)
* Organización del código en una estructura tipo MVC

El objetivo principal es demostrar la integración completa de servicios web en un entorno real.

---

## 🧱 Tecnologías utilizadas

* Linux
* Apache
* MySQL
* PHP
* HTML / CSS / JavaScript

---

## 📁 Estructura del proyecto

```
centro-medico-lamp/
│
├── app/
│   ├── config/
│   ├── controllers/
│   └── models/
│
├── database/
│   ├── schema.sql
│   └── seed.sql
│
├── public/
│   ├── assets/
│   │   ├── css/
│   │   └── js/
│   ├── index.php
│   └── registrar_paciente.php
│
├── README.md
└── .gitignore
```

---

## ⚙️ Instalación

1. Clonar el repositorio:

```
git clone https://github.com/TU_USUARIO/centro-medico-lamp.git
cd centro-medico-lamp
```

2. Configurar la base de datos:

```
mysql -u webuser -p
```

Dentro de MySQL:

```
SOURCE database/schema.sql;
SOURCE database/seed.sql;
```

3. Configurar conexión en:

```
app/config/database.php
```

---

## 🌐 Ejecución

Colocar el proyecto en:

```
/var/www/html/
```

Acceder desde el navegador:

```
http://localhost/centro-medico-lamp/public/
```

---

## 🔐 Notas

* Las credenciales de base de datos están definidas en `database.php`
* Se recomienda cambiarlas antes de usar en producción
* Este proyecto utiliza autenticación básica

---

## 📚 Aprendizajes

* Integración de servicios LAMP
* Conexión PHP - MySQL
* Organización de proyecto tipo MVC
* Manejo básico de rutas y estructura web

---

## ⚠️ Limitaciones

* No incluye validaciones avanzadas
* No utiliza framework
* No implementa seguridad completa (hashing, sesiones robustas, etc.)

---

## 🚀 Mejoras futuras

* Implementar autenticación segura (`password_hash`)
* Uso de PDO en lugar de mysqli
* Arquitectura MVC más estructurada
* Dockerización del entorno
* API REST

---
