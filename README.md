# 🧾 MigraPass

Gestor de claves desarrollado en **Laravel 11**, completamente **dockerizado**, orientado a tareas de mantenimiento y administración de accesos, permitiendo realizar gestiones sin interrumpir la operación de los usuarios.

---

## 🚀 Tecnologías utilizadas

- **Backend:** Laravel 11  
- **Base de datos:** MySQL  
- **Frontend:** Blade, jQuery, js, css, livewire
- **Gestión de dependencias frontend:** Node.js, pnpm  
- **Contenedores:** Docker(Docker CLI/Docker Desktop)  
- **Servidor web:** Apache

---

## ⚙️ Instalación y configuración

A continuación se detallan todos los pasos necesarios para levantar el entorno completo del proyecto con Docker y preparar la base de datos.

---

### Clonar el repositorio

Primero, clona el repositorio en tu máquina local:

```bash
git clone https://github.com/Cranuk/Proyecto-migraPass.git
cd migraPass
```

### Copiar y configurar el archivo de entorno

```
cp .env.example .env
```

### Copiar y configurar el archivo para levantar los servicios en docker

```
cp docker-compose.example.yml docker-compose.yml
```

### Construir y levantar los contenedores

```
docker-compose up -d --build
docker ps
```

### Instalar las dependencias del proyecto
```
docker exec -it app composer install
docker exec -it app pnpm install
```

### Comandos para ejecutar en el proyecto
```
docker exec -it app php artisan key:generate
docker exec -it app php artisan migrate
```

## 📊 Funcionalidades principales

- ✅ CRUD de empresas, usuarios y aplicaciones

- 🧮 Ver credenciales del usuario seleccionado.

## 👨‍💻 Autor

**Facundo Mato – PHP Developer**  
Proyecto desarrollado para cliente del área de infraestructura IT.