# Evaluación Práctica - Manager Library (Ficha ADSO 3145555)

> **Evaluación SDD (Spec-Driven Development)**
> **Aprendiz:** Sharith Saavedra
> **Horario:** Miércoles 14 de octubre de 2026, 6:50 a. m. a 11:00 a. m.
> **Stack:** React + PHP (Laravel 10+) + PostgreSQL 16 + Docker

## Estructura del Monorepo

| Directorio | Propósito | Tecnología |
|---|---|---|
| [`docs/`](./docs) | Especificación adaptada a Laravel/React, corrección de inconsistencias y registro de deuda técnica | Markdown / Mermaid |
| [`infra/`](./infra) | Contenedores de infraestructura, motor de base de datos PostgreSQL 16 vacío | Docker & Docker Compose |
| [`api/`](./api) | Backend API REST bajo arquitectura hexagonal respetando el contrato estricto | PHP / Laravel |
| [`app/`](./app) | Frontend SPA operativo para roles Admin y Bibliotecario | React / Vite |
| [`page/`](./page) | Sitio público estático de presentación de la biblioteca | HTML5 / CSS3 / Vanilla JS |
| [`tool/`](./tool) | Utilidad de siembra de datos de demostración consumiendo exclusivamente la API | Node.js |

## Principios y Reglas de Oro

1. **SDD Estricto**: Ninguna línea de código de backend o frontend antes de corregir, adaptar y documentar la especificación e inconsistencias en `docs/`.
2. **Respeto Absoluto al Alcance del Producto**: No se alteran nombres de entidades, atributos ni endpoints.
3. **Registro de Deuda Técnica**: Toda inconsistencia de diseño detectada se documenta formalmente.
4. **Desarrollo Trazable**: Commits atómicos, ramas por característica y flujo de integración continuo.
