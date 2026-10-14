# Infraestructura — Manager Library

Este componente gestiona el aprovisionamiento de infraestructura mediante contenedores Docker para la base de datos y servicios.

## Cumplimiento de Principios Innegociables

- **Artículo V de la Constitución & ADR-001:** Este repositorio levanta un **motor de base de datos vacío**.
  - No contiene ninguna sentencia `CREATE TABLE`.
  - El DDL, restricciones y tablas pertenecen 100% a las migraciones de la API (`api/`).

## Requisitos

- Docker Desktop con soporte para Docker Compose v2+.

## Instrucciones de Ejecución

1. Copiar las variables de entorno si se desean personalizar:
   ```bash
   cp .env.example .env
   ```

2. Levantar el motor de base de datos PostgreSQL 16:
   ```bash
   docker compose up -d
   ```

3. Verificar que el motor está activo y escuchando en el puerto configurado (5434 en host, 5432 interno):
   ```bash
   docker compose ps
   ```

4. Detener el servicio:
   ```bash
   docker compose down
   ```
