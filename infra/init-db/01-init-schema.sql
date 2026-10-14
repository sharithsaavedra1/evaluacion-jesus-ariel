-- Inicialización del motor de base de datos vacío
-- Cumple con Artículo V de la Constitución y ADR-001:
-- Este script NO contiene ningún CREATE TABLE. El DDL pertenece exclusivamente a las migraciones de la aplicación.
CREATE SCHEMA IF NOT EXISTS library;
GRANT ALL PRIVILEGES ON SCHEMA library TO library;
ALTER USER library SET search_path TO library, public;
