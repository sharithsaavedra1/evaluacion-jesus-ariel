# Evaluación Práctica — Manager Library (Ficha ADSO 3145555)

> **Evaluación SDD (Spec-Driven Development)**
> **Aprendiz:** Sharith Saavedra
> **Horario de Entrega:** Miércoles 14 de octubre de 2026, hasta las 11:00 a. m.
> **Tecnologías Oficiales:** React + PHP (Laravel) + PostgreSQL 16 + Docker Compose
> **Repositorio:** [github.com/sharithsaavedra1/evaluacion-jesus-ariel](https://github.com/sharithsaavedra1/evaluacion-jesus-ariel)

---

## 1. Estrategia de Ambientes y Flujo Gitflow

Se implementó el flujo formal de despliegue y promoción por ambientes solicitado:

| Rama / Ambiente | Propósito | Estado en Repositorio |
|---|---|---|
| `main` | **Producción** (estable, entrega oficial de la evaluación) | Activa y desplegable |
| `qa` | **Pruebas y Calidad** (validación de integración y RNF) | Activa y sincronizada |
| `develop` | **Desarrollo Base** (integración continua de ramas feature) | Activa y sincronizada |
| `feature/*` | **Ramas de Característica** (desarrollo atómico y Pull Requests) | `docs/spec-and-technical-debt`, `feature/infra-docker-setup`, `feature/api-laravel-backend`, `feature/app-react-frontend`, `feature/page-static-presentation`, `feature/tool-demo-seeder` |

---

## 2. Estructura de los Seis Componentes

| Directorio | Propósito | Tecnología | Cumplimiento del Spec |
|---|---|---|---|
| [`docs/`](./docs) | Especificación adaptada a Laravel/React, corrección de inconsistencias y registro de deuda técnica | Markdown / Mermaid | Inconsistencias resueltas en [`docs/technical-debt.md`](./docs/technical-debt.md) y [`docs/quality-pillars-compliance.md`](./docs/quality-pillars-compliance.md) sin alterar el alcance |
| [`infra/`](./infra) | Orquestación Docker, red, volúmenes y motor de base de datos vacío | Docker & Docker Compose | Artículo V y ADR-001: motor PostgreSQL 16 sin `CREATE TABLE` |
| [`api/`](./api) | Backend API REST bajo arquitectura hexagonal estricta | PHP 8.1+ / Laravel 10 | Cumplimiento de `api-contract.md`, cuerpo de error único, control de concurrencia y JWT 8h |
| [`app/`](./app) | Frontend SPA operativo para Administrador y Bibliotecario | React 18 / Vite | Autenticación, catálogo, socios, préstamos de 14 días, vencidos y reportes agregados |
| [`page/`](./page) | Sitio público estático de presentación | HTML5 / CSS3 / Vanilla JS | Tarea T-23: se abre sin API, responsivo en móvil y escritorio |
| [`tool/`](./tool) | Utilidad sembradora de datos de demostración | Node.js | Tarea T-21: consume exclusivamente la API REST (≥40 libros, ≥10 socios, ≥15 préstamos) |

---

## 3. Matriz de Cumplimiento de Inconsistencias (Regla de Oro del Profesor)

1. **Inmutabilidad del Alcance:** No se modificaron nombres de entidades, atributos ni endpoints.
2. **Deuda Técnica de Pluralidad/Singularidad (DT-01):**
   - El modelo físico exige singular (`category`, `book`, `member`, `loan`, `loan_item`, `user`).
   - El contrato HTTP exige plural (`/categories`, `/books`, `/members`, `/loans`, `/users`).
   - Se configuró explícitamente en el backend sin alterar el esquema ni las rutas.
3. **Inconsistencia de Concurrencia Optimista (DT-02):**
   - ADR-002 exigía testigo de versión, pero la tabla `book` no tiene columna `version`.
   - Se resolvió con decremento condicional atómico en base de datos (`UPDATE ... WHERE available_copies > 0`) y la restricción CHECK `ck_book_available_range`, garantizando RNF-2 sin inventar columnas fuera del alcance.
4. **Restricciones del Motor (DT-03):**
   - Se bajaron de inmediato a la base `ck_book_total_positive` y `ck_user_role` para acatar el Artículo VI de la Constitución.

---

## 4. Instrucciones de Ejecución

### Opción A: Despliegue con Docker Compose (Recomendado)
```bash
cd infra
docker compose up -d
```
- API REST: `http://localhost:8000/api/v1`
- Frontend React: `http://localhost:5173`
- PostgreSQL 16: `localhost:5432`

### Opción B: Ejecución Local
1. **Backend (Laravel):**
   ```bash
   cd api
   php artisan migrate
   php artisan seed:admin
   php artisan serve
   ```
2. **Frontend (React):**
   ```bash
   cd app
   npm install
   npm run dev
   ```
3. **Sembrador de Datos (Tool):**
   ```bash
   cd tool
   npm run seed
   ```
4. **Sitio Público Estático (Page):**
   Abrir `page/index.html` en el navegador.
