-- Database: prueba_tecnica_seis

-- DROP DATABASE prueba_tecnica_seis;

CREATE DATABASE prueba_tecnica_seis
  WITH OWNER = postgres
       ENCODING = 'UTF8'
       TABLESPACE = pg_default
       LC_COLLATE = 'Spanish_Chile.1252'
       LC_CTYPE = 'Spanish_Chile.1252'
       CONNECTION LIMIT = -1;

-- CREACION DE TABLAS

-- Table: public.encargados

-- DROP TABLE public.encargados;

CREATE TABLE public.encargados
(
  enc_id integer NOT NULL DEFAULT nextval('encargados_enc_id_seq'::regclass),
  enc_run text NOT NULL,
  enc_nom text NOT NULL,
  enc_apellido1 text NOT NULL,
  enc_apellido2 text,
  enc_direccion text,
  enc_telefono integer,
  CONSTRAINT encargados_pkey PRIMARY KEY (enc_id)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.encargados
  OWNER TO postgres;


-- Table: public.bodegas

-- DROP TABLE public.bodegas;

CREATE TABLE public.bodegas
(
  bod_id integer NOT NULL DEFAULT nextval('bodegas_bod_id_seq'::regclass),
  bod_cod text NOT NULL,
  bod_direccion text NOT NULL,
  bod_personal integer NOT NULL,
  bod_estado integer DEFAULT 0,
  bod_fecha_registro timestamp without time zone DEFAULT now(),
  enc_id integer,
  CONSTRAINT bodegas_pkey PRIMARY KEY (bod_id),
  CONSTRAINT bodegas_enc_id_fkey FOREIGN KEY (enc_id)
      REFERENCES public.encargados (enc_id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.bodegas
  OWNER TO postgres;

  -- INSERT TABLA ENCARGADOS --

  INSERT INTO public.encargados(
            enc_id, enc_run, enc_nom, enc_apellido1, enc_apellido2, enc_direccion, 
            enc_telefono)
    VALUES (DEFAULT, '1870648-1', 'Bastian', 'Mutis', 'Coroseo', 'Calle 2 Viña del Mar', 
            948504717);
  INSERT INTO public.encargados(
            enc_id, enc_run, enc_nom, enc_apellido1, enc_apellido2, enc_direccion, 
            enc_telefono)
    VALUES (DEFAULT, '17115971-7', 'Maria', 'Gomez', 'Martinez', 'Pasaje 3 Quilpue', 
            958506789);
INSERT INTO public.encargados(
            enc_id, enc_run, enc_nom, enc_apellido1, enc_apellido2, enc_direccion, 
            enc_telefono)
    VALUES (DEFAULT, '16351542-3', 'Isabel', 'Poblete', 'Nuñez', 'Pasaje 23 Recreo', 
            968505718);

-- INSERT TABLA BODEGAS, LAS DEMÁS POR SISTEMA -- 

INSERT INTO public.bodegas(
            bod_id, bod_cod, bod_direccion, bod_personal, bod_estado, bod_fecha_registro, 
            enc_id)
    VALUES (DEFAULT, 'BOD3', 'Pudahuel sector industrial', 100, 1, NOW(), 
            1);

