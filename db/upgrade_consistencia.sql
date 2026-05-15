-- CONSISTENCIA DE DATOS - NETADMIN WEB
-- PostgreSQL / NeonDB

-- EQUIPOS

ALTER TABLE equipos
ALTER COLUMN nombre SET NOT NULL,
ALTER COLUMN ip SET NOT NULL,
ALTER COLUMN tipo SET NOT NULL;

DO $$
BEGIN
    IF NOT EXISTS (
        SELECT 1 FROM pg_constraint WHERE conname = 'equipos_ip_unique'
    ) THEN
        ALTER TABLE equipos ADD CONSTRAINT equipos_ip_unique UNIQUE (ip);
    END IF;
END $$;

DO $$
BEGIN
    IF NOT EXISTS (
        SELECT 1 FROM pg_constraint WHERE conname = 'equipos_estado_check'
    ) THEN
        ALTER TABLE equipos
        ADD CONSTRAINT equipos_estado_check
        CHECK (estado IN ('Activo', 'Mantenimiento', 'Inactivo'));
    END IF;
END $$;

-- SERVICIOS

ALTER TABLE servicios
ALTER COLUMN nombre SET NOT NULL,
ALTER COLUMN puerto SET NOT NULL,
ALTER COLUMN protocolo SET NOT NULL;

DO $$
BEGIN
    IF NOT EXISTS (
        SELECT 1 FROM pg_constraint WHERE conname = 'servicios_puerto_check'
    ) THEN
        ALTER TABLE servicios
        ADD CONSTRAINT servicios_puerto_check
        CHECK (puerto BETWEEN 1 AND 65535);
    END IF;
END $$;

DO $$
BEGIN
    IF NOT EXISTS (
        SELECT 1 FROM pg_constraint WHERE conname = 'servicios_protocolo_check'
    ) THEN
        ALTER TABLE servicios
        ADD CONSTRAINT servicios_protocolo_check
        CHECK (protocolo IN ('TCP', 'UDP'));
    END IF;
END $$;

DO $$
BEGIN
    IF NOT EXISTS (
        SELECT 1 FROM pg_constraint WHERE conname = 'servicios_estado_check'
    ) THEN
        ALTER TABLE servicios
        ADD CONSTRAINT servicios_estado_check
        CHECK (estado IN ('Activo', 'Inactivo'));
    END IF;
END $$;

-- INCIDENCIAS

ALTER TABLE incidencias
ALTER COLUMN titulo SET NOT NULL;

DO $$
BEGIN
    IF NOT EXISTS (
        SELECT 1 FROM pg_constraint WHERE conname = 'incidencias_prioridad_check'
    ) THEN
        ALTER TABLE incidencias
        ADD CONSTRAINT incidencias_prioridad_check
        CHECK (prioridad IN ('Baja', 'Media', 'Alta', 'Crítica'));
    END IF;
END $$;

DO $$
BEGIN
    IF NOT EXISTS (
        SELECT 1 FROM pg_constraint WHERE conname = 'incidencias_estado_check'
    ) THEN
        ALTER TABLE incidencias
        ADD CONSTRAINT incidencias_estado_check
        CHECK (estado IN ('Abierta', 'En proceso', 'Cerrada'));
    END IF;
END $$;

-- USUARIOS

ALTER TABLE usuarios
ALTER COLUMN username SET NOT NULL,
ALTER COLUMN password SET NOT NULL,
ALTER COLUMN rol SET NOT NULL;

DO $$
BEGIN
    IF NOT EXISTS (
        SELECT 1 FROM pg_constraint WHERE conname = 'usuarios_username_unique'
    ) THEN
        ALTER TABLE usuarios ADD CONSTRAINT usuarios_username_unique UNIQUE (username);
    END IF;
END $$;

DO $$
BEGIN
    IF NOT EXISTS (
        SELECT 1 FROM pg_constraint WHERE conname = 'usuarios_rol_check'
    ) THEN
        ALTER TABLE usuarios
        ADD CONSTRAINT usuarios_rol_check
        CHECK (rol IN ('admin', 'tecnico', 'auditor'));
    END IF;
END $$;