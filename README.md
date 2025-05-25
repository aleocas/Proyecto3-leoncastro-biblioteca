# 📚 Proyecto: Biblioteca Virtual con PHP y MySQL

## 📌 Descripción del proyecto

Este proyecto consiste en el desarrollo de una **biblioteca virtual** implementada con tecnologías web como **HTML, Bootstrap, PHP y MariaDB**. La aplicación permite a los usuarios **registrarse, iniciar sesión, buscar libros, realizar reservas** y consultar búsquedas recientes mediante cookies. Además, los administradores pueden **gestionar el catálogo de libros y autores**, controlar los préstamos y generar informes con estadísticas útiles.

Se ha hecho especial énfasis en la **seguridad de contraseñas**, el manejo de **sesiones y cookies**, y la diferenciación de roles entre **clientes y administradores (bibliotecarios)**.

---

## 🎯 Funcionalidades principales

### 🧑‍💼 Invitado
- Buscar libros sin necesidad de registrarse
- Visualizar credenciales de prueba para cliente y administrador
- Consultar libros recientemente buscados mediante cookies

### 👤 Cliente
- Registro seguro de cuenta con contraseña hasheada
- Inicio de sesión y cierre de sesión
- Búsqueda de libros
- Reserva de libros (hasta **5 en total** y **3 copias por libro**)
- Visualización del estado de sus préstamos

### 🔐 Administrador (bibliotecario)
- Registro con código especial (visible en la página para pruebas)
- Gestión completa del catálogo de libros (alta, baja, modificación)
- Gestión de autores (crear, editar y eliminar autores)
- Supervisión de préstamos
- Generación de informes estadísticos:
  - Libros más solicitados
  - Tasa de préstamos y devoluciones
  - Patrones de uso de la biblioteca

---

## 🧩 Entidades principales

- **Usuario**: Cliente o administrador. Autenticación segura con roles diferenciados.
- **Libro**: Título, autor, cantidad de ejemplares disponibles, etc.
- **Autor**: Gestión de autores asociados a libros.
- **Préstamo**: Relación entre usuarios y libros, con control de copias y fechas.

---

## 🛡️ Seguridad

- Contraseñas almacenadas con hashing (usando `password_hash`)
- Validación de formularios en servidor y cliente
- Protección contra inyecciones y XSS
- Manejo seguro de sesiones (uso de `session_regenerate_id`)
- Cookies con datos recientes limitadas y protegidas

---

## 🖥️ Tecnologías utilizadas

- **PHP 8.x**
- **MariaDB / MySQL**
- **Bootstrap 5**
- **HTML5 y CSS3**
- **Sesiones y Cookies**
- **SQL (con script de base de datos incluido)**

---
