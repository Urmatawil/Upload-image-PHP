# Upload-image-PHP
Formulario para subir fotos a BD - PHP - postgreSQL

Este formulario se encarga de conectar a la base de datos
y traer un objeto PDO
Se deben cambiar las credenciales en la variables correspondientes del archivo conex.php

## Estructura de la BD de pruebas

```
CREATE TABLE IF NOT EXISTS public.imgulpd
(
    cst_key character varying(30) COLLATE pg_catalog."default" NOT NULL,
    line integer NOT NULL,
    crc character varying(32) COLLATE pg_catalog."default",
    foto bytea,
    stat boolean,
    ipuser character varying(12) COLLATE pg_catalog."default",
    fcre timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT imgulpd_pkey PRIMARY KEY (cst_key,line)
)
```
