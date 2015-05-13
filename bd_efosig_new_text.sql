--
-- PostgreSQL database dump
--

-- Dumped from database version 9.1.14
-- Dumped by pg_dump version 9.1.14
-- Started on 2015-05-11 15:21:36

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 222 (class 3079 OID 11639)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2235 (class 0 OID 0)
-- Dependencies: 222
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

--
-- TOC entry 234 (class 1255 OID 17445)
-- Dependencies: 682 6
-- Name: act_participantes_curso(); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION act_participantes_curso() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
declare
curso integer := new.id_curso;
est integer := new.id_estado;
begin

update tr_curso_participantes set nro_participantes = (select count(id_persona) from tr_persona_curso where id_curso = curso and id_estado = est ) where id_curso = curso and id_estado = est;

return new;
end;
$$;


ALTER FUNCTION public.act_participantes_curso() OWNER TO postgres;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 161 (class 1259 OID 16394)
-- Dependencies: 1942 6
-- Name: groups; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE groups (
    id integer NOT NULL,
    name character varying(20) NOT NULL,
    description character varying(100) NOT NULL,
    CONSTRAINT check_id CHECK ((id >= 0))
);


ALTER TABLE public.groups OWNER TO postgres;

--
-- TOC entry 162 (class 1259 OID 16398)
-- Dependencies: 6 161
-- Name: groups_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE groups_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.groups_id_seq OWNER TO postgres;

--
-- TOC entry 2236 (class 0 OID 0)
-- Dependencies: 162
-- Name: groups_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE groups_id_seq OWNED BY groups.id;


--
-- TOC entry 163 (class 1259 OID 16400)
-- Dependencies: 1944 6
-- Name: login_attempts; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE login_attempts (
    id integer NOT NULL,
    ip_address character varying(15),
    login character varying(100) NOT NULL,
    "time" integer,
    CONSTRAINT check_id CHECK ((id >= 0))
);


ALTER TABLE public.login_attempts OWNER TO postgres;

--
-- TOC entry 164 (class 1259 OID 16404)
-- Dependencies: 163 6
-- Name: login_attempts_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE login_attempts_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.login_attempts_id_seq OWNER TO postgres;

--
-- TOC entry 2237 (class 0 OID 0)
-- Dependencies: 164
-- Name: login_attempts_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE login_attempts_id_seq OWNED BY login_attempts.id;


--
-- TOC entry 165 (class 1259 OID 16406)
-- Dependencies: 6
-- Name: tb_actividad; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tb_actividad (
    id_actividad integer NOT NULL,
    id_usuario integer,
    titulo character varying(200),
    descripcion character varying(200),
    fecha date
);


ALTER TABLE public.tb_actividad OWNER TO postgres;

--
-- TOC entry 166 (class 1259 OID 16409)
-- Dependencies: 165 6
-- Name: tb_actividad_id_actividad_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tb_actividad_id_actividad_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tb_actividad_id_actividad_seq OWNER TO postgres;

--
-- TOC entry 2238 (class 0 OID 0)
-- Dependencies: 166
-- Name: tb_actividad_id_actividad_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tb_actividad_id_actividad_seq OWNED BY tb_actividad.id_actividad;


--
-- TOC entry 219 (class 1259 OID 17515)
-- Dependencies: 6
-- Name: tb_asistencia; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tb_asistencia (
    id integer NOT NULL,
    horas_impartidas character varying,
    fecha_asistencia date,
    curso_id integer,
    estado_id integer,
    facilitador_id integer
);


ALTER TABLE public.tb_asistencia OWNER TO postgres;

--
-- TOC entry 218 (class 1259 OID 17513)
-- Dependencies: 6 219
-- Name: tb_asistencia_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tb_asistencia_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tb_asistencia_id_seq OWNER TO postgres;

--
-- TOC entry 2239 (class 0 OID 0)
-- Dependencies: 218
-- Name: tb_asistencia_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tb_asistencia_id_seq OWNED BY tb_asistencia.id;


--
-- TOC entry 167 (class 1259 OID 16411)
-- Dependencies: 6
-- Name: tb_auditoria; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tb_auditoria (
    id_auditoria integer NOT NULL,
    id_usuario integer,
    accion character varying(200),
    fecha date,
    tabla_afectada character varying,
    campo_afectado character varying,
    informacion_campo character varying
);


ALTER TABLE public.tb_auditoria OWNER TO postgres;

--
-- TOC entry 168 (class 1259 OID 16414)
-- Dependencies: 167 6
-- Name: tb_auditoria_id_auditoria_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tb_auditoria_id_auditoria_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tb_auditoria_id_auditoria_seq OWNER TO postgres;

--
-- TOC entry 2240 (class 0 OID 0)
-- Dependencies: 168
-- Name: tb_auditoria_id_auditoria_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tb_auditoria_id_auditoria_seq OWNED BY tb_auditoria.id_auditoria;


--
-- TOC entry 208 (class 1259 OID 17392)
-- Dependencies: 6
-- Name: tb_biblioteca; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tb_biblioteca (
    id_biblioteca integer NOT NULL,
    descripcion character varying,
    ruta character varying,
    tipo_multimedia character varying,
    titulo character varying
);


ALTER TABLE public.tb_biblioteca OWNER TO postgres;

--
-- TOC entry 207 (class 1259 OID 17390)
-- Dependencies: 6 208
-- Name: tb_biblioteca_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tb_biblioteca_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tb_biblioteca_id_seq OWNER TO postgres;

--
-- TOC entry 2241 (class 0 OID 0)
-- Dependencies: 207
-- Name: tb_biblioteca_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tb_biblioteca_id_seq OWNED BY tb_biblioteca.id_biblioteca;


--
-- TOC entry 213 (class 1259 OID 17449)
-- Dependencies: 6
-- Name: tb_cargo; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tb_cargo (
    id_cargo integer NOT NULL,
    cargo character varying
);


ALTER TABLE public.tb_cargo OWNER TO postgres;

--
-- TOC entry 212 (class 1259 OID 17447)
-- Dependencies: 213 6
-- Name: tb_carro_id_cargo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tb_carro_id_cargo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tb_carro_id_cargo_seq OWNER TO postgres;

--
-- TOC entry 2242 (class 0 OID 0)
-- Dependencies: 212
-- Name: tb_carro_id_cargo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tb_carro_id_cargo_seq OWNED BY tb_cargo.id_cargo;


--
-- TOC entry 169 (class 1259 OID 16416)
-- Dependencies: 6
-- Name: tb_curso; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tb_curso (
    id_curso integer NOT NULL,
    nombre character varying(50),
    duracion character varying(20),
    nro_participantes integer,
    status smallint,
    fecha_inicio date,
    fecha_fin date
);


ALTER TABLE public.tb_curso OWNER TO postgres;

--
-- TOC entry 170 (class 1259 OID 16419)
-- Dependencies: 169 6
-- Name: tb_curso_id_curso_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tb_curso_id_curso_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tb_curso_id_curso_seq OWNER TO postgres;

--
-- TOC entry 2243 (class 0 OID 0)
-- Dependencies: 170
-- Name: tb_curso_id_curso_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tb_curso_id_curso_seq OWNED BY tb_curso.id_curso;


--
-- TOC entry 171 (class 1259 OID 16421)
-- Dependencies: 6
-- Name: tb_divulgacion; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tb_divulgacion (
    id_divulgacion integer NOT NULL,
    id_curso integer,
    fecha_actual character varying,
    tipo_divulgacion_radio integer,
    tipo_divulgacion_tv integer,
    tipo_divulgacion_prensa integer
);


ALTER TABLE public.tb_divulgacion OWNER TO postgres;

--
-- TOC entry 172 (class 1259 OID 16424)
-- Dependencies: 6 171
-- Name: tb_divulgacion_id_divulgacion_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tb_divulgacion_id_divulgacion_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tb_divulgacion_id_divulgacion_seq OWNER TO postgres;

--
-- TOC entry 2244 (class 0 OID 0)
-- Dependencies: 172
-- Name: tb_divulgacion_id_divulgacion_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tb_divulgacion_id_divulgacion_seq OWNED BY tb_divulgacion.id_divulgacion;


--
-- TOC entry 198 (class 1259 OID 17254)
-- Dependencies: 6
-- Name: tb_divulgacion_prensa; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tb_divulgacion_prensa (
    id_divulgacion_prensa integer NOT NULL,
    nombre_prensa character varying(100),
    fecha_prensa date,
    tipo_divulgacion_prensa integer
);


ALTER TABLE public.tb_divulgacion_prensa OWNER TO postgres;

--
-- TOC entry 199 (class 1259 OID 17257)
-- Dependencies: 198 6
-- Name: tb_divulgacion_prensa_id_divulgacion_prensa_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tb_divulgacion_prensa_id_divulgacion_prensa_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tb_divulgacion_prensa_id_divulgacion_prensa_seq OWNER TO postgres;

--
-- TOC entry 2245 (class 0 OID 0)
-- Dependencies: 199
-- Name: tb_divulgacion_prensa_id_divulgacion_prensa_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tb_divulgacion_prensa_id_divulgacion_prensa_seq OWNED BY tb_divulgacion_prensa.id_divulgacion_prensa;


--
-- TOC entry 200 (class 1259 OID 17259)
-- Dependencies: 6
-- Name: tb_divulgacion_radio; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tb_divulgacion_radio (
    id_divulgacion_radio integer NOT NULL,
    tipo_divulgacion_radio integer,
    emisora character varying(100),
    hora character varying,
    dial character varying
);


ALTER TABLE public.tb_divulgacion_radio OWNER TO postgres;

--
-- TOC entry 201 (class 1259 OID 17262)
-- Dependencies: 6 200
-- Name: tb_divulgacion_radio_id_divulgacion_radio_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tb_divulgacion_radio_id_divulgacion_radio_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tb_divulgacion_radio_id_divulgacion_radio_seq OWNER TO postgres;

--
-- TOC entry 2246 (class 0 OID 0)
-- Dependencies: 201
-- Name: tb_divulgacion_radio_id_divulgacion_radio_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tb_divulgacion_radio_id_divulgacion_radio_seq OWNED BY tb_divulgacion_radio.id_divulgacion_radio;


--
-- TOC entry 202 (class 1259 OID 17264)
-- Dependencies: 6
-- Name: tb_divulgacion_tv; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tb_divulgacion_tv (
    id_divulgacion_tv integer NOT NULL,
    nombre_programa character varying(100),
    canal character varying(50),
    tipo_divulgacion_tv integer NOT NULL,
    hora_emision character varying
);


ALTER TABLE public.tb_divulgacion_tv OWNER TO postgres;

--
-- TOC entry 203 (class 1259 OID 17267)
-- Dependencies: 6 202
-- Name: tb_divulgacion_tv_id_divulgacion_tv_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tb_divulgacion_tv_id_divulgacion_tv_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tb_divulgacion_tv_id_divulgacion_tv_seq OWNER TO postgres;

--
-- TOC entry 2247 (class 0 OID 0)
-- Dependencies: 203
-- Name: tb_divulgacion_tv_id_divulgacion_tv_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tb_divulgacion_tv_id_divulgacion_tv_seq OWNED BY tb_divulgacion_tv.id_divulgacion_tv;


--
-- TOC entry 173 (class 1259 OID 16426)
-- Dependencies: 6
-- Name: tb_escalas; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tb_escalas (
    id_escala integer NOT NULL,
    descripcion character varying(50),
    status integer
);


ALTER TABLE public.tb_escalas OWNER TO postgres;

--
-- TOC entry 174 (class 1259 OID 16429)
-- Dependencies: 173 6
-- Name: tb_escalas_id_escala_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tb_escalas_id_escala_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tb_escalas_id_escala_seq OWNER TO postgres;

--
-- TOC entry 2248 (class 0 OID 0)
-- Dependencies: 174
-- Name: tb_escalas_id_escala_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tb_escalas_id_escala_seq OWNED BY tb_escalas.id_escala;


--
-- TOC entry 175 (class 1259 OID 16431)
-- Dependencies: 6
-- Name: tb_estado; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tb_estado (
    id_estado integer NOT NULL,
    id_redi integer,
    nombre character varying(50)
);


ALTER TABLE public.tb_estado OWNER TO postgres;

--
-- TOC entry 176 (class 1259 OID 16434)
-- Dependencies: 6 175
-- Name: tb_estado_id_estado_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tb_estado_id_estado_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tb_estado_id_estado_seq OWNER TO postgres;

--
-- TOC entry 2249 (class 0 OID 0)
-- Dependencies: 176
-- Name: tb_estado_id_estado_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tb_estado_id_estado_seq OWNED BY tb_estado.id_estado;


--
-- TOC entry 177 (class 1259 OID 16436)
-- Dependencies: 6
-- Name: tb_evaluacion; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tb_evaluacion (
    id_pregunta integer NOT NULL,
    descripcion character varying(200),
    status integer
);


ALTER TABLE public.tb_evaluacion OWNER TO postgres;

--
-- TOC entry 178 (class 1259 OID 16439)
-- Dependencies: 177 6
-- Name: tb_evaluacion_id_pregunta_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tb_evaluacion_id_pregunta_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tb_evaluacion_id_pregunta_seq OWNER TO postgres;

--
-- TOC entry 2250 (class 0 OID 0)
-- Dependencies: 178
-- Name: tb_evaluacion_id_pregunta_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tb_evaluacion_id_pregunta_seq OWNED BY tb_evaluacion.id_pregunta;


--
-- TOC entry 179 (class 1259 OID 16441)
-- Dependencies: 6
-- Name: tb_general; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tb_general (
    id_persona integer NOT NULL,
    institucion_labora character varying(30),
    cargo character varying,
    telefono character varying(11),
    email character varying(50)
);


ALTER TABLE public.tb_general OWNER TO postgres;

--
-- TOC entry 221 (class 1259 OID 17979)
-- Dependencies: 6
-- Name: tb_informe; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tb_informe (
    id_informe integer NOT NULL,
    id_redi integer,
    id_estado integer,
    id_municipio integer,
    id_parroquia integer,
    id_usuario integer,
    id_curso integer,
    tipo_actividad_for character varying,
    act_nombre_for character varying,
    tot_asistentes_for integer,
    tot_femeninos_for integer,
    tot_masculinos_for integer,
    tot_div_sexual_for integer,
    tot_mujeres_indigenas_for integer,
    tot_mujeres_discapacidad_for integer,
    tot_mujeres_afrodecendientes_for integer,
    tot_movimientos_mujeres_for integer,
    nombre_movimiento_for character varying,
    fec_inicio_for date,
    hora_inicio_for time(6) without time zone,
    fec_final_for date,
    hora_final_for time(6) without time zone,
    tipo_actividad_div character varying,
    act_nombre_div character varying,
    tot_asistentes_div integer,
    tot_femeninos_div integer,
    tot_masculinos_div integer,
    tot_div_sexual_div integer,
    tot_mujeres_indigenas_div integer,
    tot_mujeres_discapacidad_div integer,
    tot_mujeres_afrodecendientes_div integer,
    tipo_material_div character varying,
    cantidad_div integer,
    convocacion_medios_div character varying,
    medios_radio_div character varying,
    medios_prensa_div character varying,
    medios_tv_div character varying,
    medios_comunitarios_div character varying,
    medios_otros_div character varying,
    fecha_creacion date,
    fecha_actualizacion date
);


ALTER TABLE public.tb_informe OWNER TO postgres;

--
-- TOC entry 220 (class 1259 OID 17977)
-- Dependencies: 6 221
-- Name: tb_informe_id_informe_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tb_informe_id_informe_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tb_informe_id_informe_seq OWNER TO postgres;

--
-- TOC entry 2251 (class 0 OID 0)
-- Dependencies: 220
-- Name: tb_informe_id_informe_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tb_informe_id_informe_seq OWNED BY tb_informe.id_informe;


--
-- TOC entry 180 (class 1259 OID 16449)
-- Dependencies: 6
-- Name: tb_mmdb; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tb_mmdb (
    id_persona integer NOT NULL,
    beneficiaria character varying(2),
    comite character varying(20),
    responsabilidad character varying(15),
    proy_socio_productivo character varying(2),
    frente_comites character varying(2)
);


ALTER TABLE public.tb_mmdb OWNER TO postgres;

--
-- TOC entry 181 (class 1259 OID 16452)
-- Dependencies: 6
-- Name: tb_municipio; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tb_municipio (
    id_municipio integer NOT NULL,
    id_estado integer,
    nombre character varying(50)
);


ALTER TABLE public.tb_municipio OWNER TO postgres;

--
-- TOC entry 182 (class 1259 OID 16455)
-- Dependencies: 6 181
-- Name: tb_municipio_id_municipio_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tb_municipio_id_municipio_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tb_municipio_id_municipio_seq OWNER TO postgres;

--
-- TOC entry 2252 (class 0 OID 0)
-- Dependencies: 182
-- Name: tb_municipio_id_municipio_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tb_municipio_id_municipio_seq OWNED BY tb_municipio.id_municipio;


--
-- TOC entry 183 (class 1259 OID 16457)
-- Dependencies: 6
-- Name: tb_parroquia; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tb_parroquia (
    id_parroquia integer NOT NULL,
    id_municipio integer,
    nombre character varying(60)
);


ALTER TABLE public.tb_parroquia OWNER TO postgres;

--
-- TOC entry 184 (class 1259 OID 16460)
-- Dependencies: 6 183
-- Name: tb_parroquia_id_parroquia_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tb_parroquia_id_parroquia_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tb_parroquia_id_parroquia_seq OWNER TO postgres;

--
-- TOC entry 2253 (class 0 OID 0)
-- Dependencies: 184
-- Name: tb_parroquia_id_parroquia_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tb_parroquia_id_parroquia_seq OWNED BY tb_parroquia.id_parroquia;


--
-- TOC entry 185 (class 1259 OID 16462)
-- Dependencies: 6
-- Name: tb_persona; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tb_persona (
    id_persona integer NOT NULL,
    id_redi integer,
    id_estado integer,
    id_municipio integer,
    id_parroquia integer,
    direccion character varying(250),
    nombre_apellido character varying(100),
    cedula integer,
    nacionalidad character(1),
    edad integer,
    sexo character(1),
    fecha_nacimiento date,
    num_hijos integer,
    etnia character varying(50),
    domina_idioma character varying(2),
    discapacidad character varying(25),
    estado_civil character varying,
    tel_local character varying(11),
    tel_celular character varying(11),
    email character varying(50),
    nivel_instruccion character varying(50),
    estudia_act character varying(2),
    nombre_inst character varying(50),
    grado character varying(50),
    tipo_inst character varying(10),
    estudia_mision character varying(50),
    gustaria_estudiar character varying(50),
    participa_org_mujeres character varying(20),
    anios_militancia integer,
    responsabilidad character varying(30),
    participa_part_politico character varying(20),
    anios_militancia_pp integer,
    responsabilidad_pp character varying(30),
    concejo_comunal character varying(20),
    voceria_cc character varying(20),
    comuna_cc character varying(20),
    status character varying(15)
);


ALTER TABLE public.tb_persona OWNER TO postgres;

--
-- TOC entry 186 (class 1259 OID 16468)
-- Dependencies: 185 6
-- Name: tb_persona_id_persona_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tb_persona_id_persona_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tb_persona_id_persona_seq OWNER TO postgres;

--
-- TOC entry 2254 (class 0 OID 0)
-- Dependencies: 186
-- Name: tb_persona_id_persona_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tb_persona_id_persona_seq OWNED BY tb_persona.id_persona;


--
-- TOC entry 187 (class 1259 OID 16470)
-- Dependencies: 6
-- Name: tb_redi; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tb_redi (
    id_redi integer NOT NULL,
    nombre character varying(100)
);


ALTER TABLE public.tb_redi OWNER TO postgres;

--
-- TOC entry 188 (class 1259 OID 16473)
-- Dependencies: 6 187
-- Name: tb_redi_id_redi_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tb_redi_id_redi_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tb_redi_id_redi_seq OWNER TO postgres;

--
-- TOC entry 2255 (class 0 OID 0)
-- Dependencies: 188
-- Name: tb_redi_id_redi_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tb_redi_id_redi_seq OWNED BY tb_redi.id_redi;


--
-- TOC entry 204 (class 1259 OID 17290)
-- Dependencies: 6
-- Name: tb_tipo_divulgacion; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tb_tipo_divulgacion (
    id_tipo_divulgacion integer NOT NULL,
    nombre character varying(100),
    medio character varying
);


ALTER TABLE public.tb_tipo_divulgacion OWNER TO postgres;

--
-- TOC entry 189 (class 1259 OID 16475)
-- Dependencies: 6
-- Name: tb_usuario; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tb_usuario (
    id_usuario integer NOT NULL,
    id_persona integer,
    cargo character varying(50),
    username character varying(25),
    password character varying(200),
    pregunta character varying(200),
    respuesta character varying(200),
    permisologia integer
);


ALTER TABLE public.tb_usuario OWNER TO postgres;

--
-- TOC entry 190 (class 1259 OID 16481)
-- Dependencies: 6 189
-- Name: tb_usuario_id_usuario_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tb_usuario_id_usuario_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tb_usuario_id_usuario_seq OWNER TO postgres;

--
-- TOC entry 2256 (class 0 OID 0)
-- Dependencies: 190
-- Name: tb_usuario_id_usuario_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tb_usuario_id_usuario_seq OWNED BY tb_usuario.id_usuario;


--
-- TOC entry 205 (class 1259 OID 17293)
-- Dependencies: 6 204
-- Name: tipo_divulgacion_id_tipo_divulgacion_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tipo_divulgacion_id_tipo_divulgacion_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tipo_divulgacion_id_tipo_divulgacion_seq OWNER TO postgres;

--
-- TOC entry 2257 (class 0 OID 0)
-- Dependencies: 205
-- Name: tipo_divulgacion_id_tipo_divulgacion_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tipo_divulgacion_id_tipo_divulgacion_seq OWNED BY tb_tipo_divulgacion.id_tipo_divulgacion;


--
-- TOC entry 217 (class 1259 OID 17504)
-- Dependencies: 6
-- Name: tr_persona_asistencia; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tr_persona_asistencia (
    id integer NOT NULL,
    persona_id integer,
    asistencia_id integer
);


ALTER TABLE public.tr_persona_asistencia OWNER TO postgres;

--
-- TOC entry 216 (class 1259 OID 17502)
-- Dependencies: 6 217
-- Name: tr_curso_asistencia_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tr_curso_asistencia_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tr_curso_asistencia_id_seq OWNER TO postgres;

--
-- TOC entry 2258 (class 0 OID 0)
-- Dependencies: 216
-- Name: tr_curso_asistencia_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tr_curso_asistencia_id_seq OWNED BY tr_persona_asistencia.id;


--
-- TOC entry 215 (class 1259 OID 17460)
-- Dependencies: 6
-- Name: tr_curso_estado; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tr_curso_estado (
    id integer NOT NULL,
    curso_id integer,
    estado_id integer,
    facilitador integer
);


ALTER TABLE public.tr_curso_estado OWNER TO postgres;

--
-- TOC entry 214 (class 1259 OID 17458)
-- Dependencies: 6 215
-- Name: tr_curso_estado_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tr_curso_estado_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tr_curso_estado_id_seq OWNER TO postgres;

--
-- TOC entry 2259 (class 0 OID 0)
-- Dependencies: 214
-- Name: tr_curso_estado_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tr_curso_estado_id_seq OWNED BY tr_curso_estado.id;


--
-- TOC entry 211 (class 1259 OID 17431)
-- Dependencies: 6
-- Name: tr_curso_participantes; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tr_curso_participantes (
    id integer NOT NULL,
    id_curso integer,
    nro_participantes integer,
    id_estado integer
);


ALTER TABLE public.tr_curso_participantes OWNER TO postgres;

--
-- TOC entry 210 (class 1259 OID 17429)
-- Dependencies: 6 211
-- Name: tr_curso_participantes_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tr_curso_participantes_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tr_curso_participantes_id_seq OWNER TO postgres;

--
-- TOC entry 2260 (class 0 OID 0)
-- Dependencies: 210
-- Name: tr_curso_participantes_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tr_curso_participantes_id_seq OWNED BY tr_curso_participantes.id;


--
-- TOC entry 191 (class 1259 OID 16483)
-- Dependencies: 6
-- Name: tr_escalas_evaluacion; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tr_escalas_evaluacion (
    id_escala integer,
    id_pregunta integer,
    id_persona integer,
    id_curso integer,
    descripcion character varying(500),
    id_escala_evaluacion integer NOT NULL
);


ALTER TABLE public.tr_escalas_evaluacion OWNER TO postgres;

--
-- TOC entry 192 (class 1259 OID 16489)
-- Dependencies: 191 6
-- Name: tr_escalas_evaluacion_id_escala_evaluacion_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tr_escalas_evaluacion_id_escala_evaluacion_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tr_escalas_evaluacion_id_escala_evaluacion_seq OWNER TO postgres;

--
-- TOC entry 2261 (class 0 OID 0)
-- Dependencies: 192
-- Name: tr_escalas_evaluacion_id_escala_evaluacion_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tr_escalas_evaluacion_id_escala_evaluacion_seq OWNED BY tr_escalas_evaluacion.id_escala_evaluacion;


--
-- TOC entry 193 (class 1259 OID 16491)
-- Dependencies: 6
-- Name: tr_persona_curso; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tr_persona_curso (
    id_persona integer NOT NULL,
    id_curso smallint,
    id integer NOT NULL,
    id_estado integer
);


ALTER TABLE public.tr_persona_curso OWNER TO postgres;

--
-- TOC entry 206 (class 1259 OID 17295)
-- Dependencies: 6
-- Name: tr_persona_curso_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tr_persona_curso_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tr_persona_curso_id_seq OWNER TO postgres;

--
-- TOC entry 209 (class 1259 OID 17410)
-- Dependencies: 193 6
-- Name: tr_persona_curso_id_seq1; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tr_persona_curso_id_seq1
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tr_persona_curso_id_seq1 OWNER TO postgres;

--
-- TOC entry 2262 (class 0 OID 0)
-- Dependencies: 209
-- Name: tr_persona_curso_id_seq1; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tr_persona_curso_id_seq1 OWNED BY tr_persona_curso.id;


--
-- TOC entry 194 (class 1259 OID 16494)
-- Dependencies: 1960 1961 6
-- Name: users; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE users (
    id integer NOT NULL,
    ip_address character varying(15),
    username character varying(100) NOT NULL,
    password character varying(255) NOT NULL,
    salt character varying(255),
    email character varying(100) NOT NULL,
    activation_code character varying(40),
    forgotten_password_code character varying(40),
    forgotten_password_time integer,
    remember_code character varying(40),
    created_on integer NOT NULL,
    last_login integer,
    active integer,
    first_name character varying(50),
    last_name character varying(50),
    cargo character varying(100),
    phone character varying(20),
    persona_id integer,
    pregunta character varying,
    respuesta character varying,
    CONSTRAINT check_active CHECK ((active >= 0)),
    CONSTRAINT check_id CHECK ((id >= 0))
);


ALTER TABLE public.users OWNER TO postgres;

--
-- TOC entry 195 (class 1259 OID 16502)
-- Dependencies: 1963 1964 1965 6
-- Name: users_groups; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE users_groups (
    id integer NOT NULL,
    user_id integer NOT NULL,
    group_id integer NOT NULL,
    CONSTRAINT users_groups_check_group_id CHECK ((group_id >= 0)),
    CONSTRAINT users_groups_check_id CHECK ((id >= 0)),
    CONSTRAINT users_groups_check_user_id CHECK ((user_id >= 0))
);


ALTER TABLE public.users_groups OWNER TO postgres;

--
-- TOC entry 196 (class 1259 OID 16508)
-- Dependencies: 6 195
-- Name: users_groups_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE users_groups_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_groups_id_seq OWNER TO postgres;

--
-- TOC entry 2263 (class 0 OID 0)
-- Dependencies: 196
-- Name: users_groups_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE users_groups_id_seq OWNED BY users_groups.id;


--
-- TOC entry 197 (class 1259 OID 16510)
-- Dependencies: 194 6
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO postgres;

--
-- TOC entry 2264 (class 0 OID 0)
-- Dependencies: 197
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE users_id_seq OWNED BY users.id;


--
-- TOC entry 1941 (class 2604 OID 17297)
-- Dependencies: 162 161
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY groups ALTER COLUMN id SET DEFAULT nextval('groups_id_seq'::regclass);


--
-- TOC entry 1943 (class 2604 OID 17298)
-- Dependencies: 164 163
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY login_attempts ALTER COLUMN id SET DEFAULT nextval('login_attempts_id_seq'::regclass);


--
-- TOC entry 1945 (class 2604 OID 17299)
-- Dependencies: 166 165
-- Name: id_actividad; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_actividad ALTER COLUMN id_actividad SET DEFAULT nextval('tb_actividad_id_actividad_seq'::regclass);


--
-- TOC entry 1975 (class 2604 OID 17518)
-- Dependencies: 218 219 219
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_asistencia ALTER COLUMN id SET DEFAULT nextval('tb_asistencia_id_seq'::regclass);


--
-- TOC entry 1946 (class 2604 OID 17300)
-- Dependencies: 168 167
-- Name: id_auditoria; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_auditoria ALTER COLUMN id_auditoria SET DEFAULT nextval('tb_auditoria_id_auditoria_seq'::regclass);


--
-- TOC entry 1970 (class 2604 OID 17395)
-- Dependencies: 207 208 208
-- Name: id_biblioteca; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_biblioteca ALTER COLUMN id_biblioteca SET DEFAULT nextval('tb_biblioteca_id_seq'::regclass);


--
-- TOC entry 1972 (class 2604 OID 17452)
-- Dependencies: 212 213 213
-- Name: id_cargo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_cargo ALTER COLUMN id_cargo SET DEFAULT nextval('tb_carro_id_cargo_seq'::regclass);


--
-- TOC entry 1947 (class 2604 OID 17301)
-- Dependencies: 170 169
-- Name: id_curso; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_curso ALTER COLUMN id_curso SET DEFAULT nextval('tb_curso_id_curso_seq'::regclass);


--
-- TOC entry 1948 (class 2604 OID 17302)
-- Dependencies: 172 171
-- Name: id_divulgacion; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_divulgacion ALTER COLUMN id_divulgacion SET DEFAULT nextval('tb_divulgacion_id_divulgacion_seq'::regclass);


--
-- TOC entry 1966 (class 2604 OID 17303)
-- Dependencies: 199 198
-- Name: id_divulgacion_prensa; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_divulgacion_prensa ALTER COLUMN id_divulgacion_prensa SET DEFAULT nextval('tb_divulgacion_prensa_id_divulgacion_prensa_seq'::regclass);


--
-- TOC entry 1967 (class 2604 OID 17304)
-- Dependencies: 201 200
-- Name: id_divulgacion_radio; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_divulgacion_radio ALTER COLUMN id_divulgacion_radio SET DEFAULT nextval('tb_divulgacion_radio_id_divulgacion_radio_seq'::regclass);


--
-- TOC entry 1968 (class 2604 OID 17305)
-- Dependencies: 203 202
-- Name: id_divulgacion_tv; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_divulgacion_tv ALTER COLUMN id_divulgacion_tv SET DEFAULT nextval('tb_divulgacion_tv_id_divulgacion_tv_seq'::regclass);


--
-- TOC entry 1949 (class 2604 OID 17306)
-- Dependencies: 174 173
-- Name: id_escala; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_escalas ALTER COLUMN id_escala SET DEFAULT nextval('tb_escalas_id_escala_seq'::regclass);


--
-- TOC entry 1950 (class 2604 OID 17307)
-- Dependencies: 176 175
-- Name: id_estado; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_estado ALTER COLUMN id_estado SET DEFAULT nextval('tb_estado_id_estado_seq'::regclass);


--
-- TOC entry 1951 (class 2604 OID 17308)
-- Dependencies: 178 177
-- Name: id_pregunta; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_evaluacion ALTER COLUMN id_pregunta SET DEFAULT nextval('tb_evaluacion_id_pregunta_seq'::regclass);


--
-- TOC entry 1976 (class 2604 OID 17982)
-- Dependencies: 221 220 221
-- Name: id_informe; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_informe ALTER COLUMN id_informe SET DEFAULT nextval('tb_informe_id_informe_seq'::regclass);


--
-- TOC entry 1952 (class 2604 OID 17313)
-- Dependencies: 182 181
-- Name: id_municipio; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_municipio ALTER COLUMN id_municipio SET DEFAULT nextval('tb_municipio_id_municipio_seq'::regclass);


--
-- TOC entry 1953 (class 2604 OID 17314)
-- Dependencies: 184 183
-- Name: id_parroquia; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_parroquia ALTER COLUMN id_parroquia SET DEFAULT nextval('tb_parroquia_id_parroquia_seq'::regclass);


--
-- TOC entry 1954 (class 2604 OID 17315)
-- Dependencies: 186 185
-- Name: id_persona; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_persona ALTER COLUMN id_persona SET DEFAULT nextval('tb_persona_id_persona_seq'::regclass);


--
-- TOC entry 1955 (class 2604 OID 17316)
-- Dependencies: 188 187
-- Name: id_redi; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_redi ALTER COLUMN id_redi SET DEFAULT nextval('tb_redi_id_redi_seq'::regclass);


--
-- TOC entry 1969 (class 2604 OID 17317)
-- Dependencies: 205 204
-- Name: id_tipo_divulgacion; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_tipo_divulgacion ALTER COLUMN id_tipo_divulgacion SET DEFAULT nextval('tipo_divulgacion_id_tipo_divulgacion_seq'::regclass);


--
-- TOC entry 1956 (class 2604 OID 16526)
-- Dependencies: 190 189
-- Name: id_usuario; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_usuario ALTER COLUMN id_usuario SET DEFAULT nextval('tb_usuario_id_usuario_seq'::regclass);


--
-- TOC entry 1973 (class 2604 OID 17463)
-- Dependencies: 215 214 215
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tr_curso_estado ALTER COLUMN id SET DEFAULT nextval('tr_curso_estado_id_seq'::regclass);


--
-- TOC entry 1971 (class 2604 OID 17434)
-- Dependencies: 210 211 211
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tr_curso_participantes ALTER COLUMN id SET DEFAULT nextval('tr_curso_participantes_id_seq'::regclass);


--
-- TOC entry 1957 (class 2604 OID 17318)
-- Dependencies: 192 191
-- Name: id_escala_evaluacion; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tr_escalas_evaluacion ALTER COLUMN id_escala_evaluacion SET DEFAULT nextval('tr_escalas_evaluacion_id_escala_evaluacion_seq'::regclass);


--
-- TOC entry 1974 (class 2604 OID 17507)
-- Dependencies: 217 216 217
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tr_persona_asistencia ALTER COLUMN id SET DEFAULT nextval('tr_curso_asistencia_id_seq'::regclass);


--
-- TOC entry 1958 (class 2604 OID 17412)
-- Dependencies: 209 193
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tr_persona_curso ALTER COLUMN id SET DEFAULT nextval('tr_persona_curso_id_seq1'::regclass);


--
-- TOC entry 1959 (class 2604 OID 17319)
-- Dependencies: 197 194
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY users ALTER COLUMN id SET DEFAULT nextval('users_id_seq'::regclass);


--
-- TOC entry 1962 (class 2604 OID 17320)
-- Dependencies: 196 195
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY users_groups ALTER COLUMN id SET DEFAULT nextval('users_groups_id_seq'::regclass);


--
-- TOC entry 2167 (class 0 OID 16394)
-- Dependencies: 161 2228
-- Data for Name: groups; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO groups (id, name, description) VALUES (3, 'Facilitador', 'Facilitador de los cursos');
INSERT INTO groups (id, name, description) VALUES (2, 'Persona', 'Usuario general');
INSERT INTO groups (id, name, description) VALUES (1, 'admin', 'Administrador');


--
-- TOC entry 2265 (class 0 OID 0)
-- Dependencies: 162
-- Name: groups_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('groups_id_seq', 3, true);


--
-- TOC entry 2169 (class 0 OID 16400)
-- Dependencies: 163 2228
-- Data for Name: login_attempts; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2266 (class 0 OID 0)
-- Dependencies: 164
-- Name: login_attempts_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('login_attempts_id_seq', 1, false);


--
-- TOC entry 2171 (class 0 OID 16406)
-- Dependencies: 165 2228
-- Data for Name: tb_actividad; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO tb_actividad (id_actividad, id_usuario, titulo, descripcion, fecha) VALUES (3, 1, 'Charla introductoria', 'Charla introductoria', '2015-06-09');
INSERT INTO tb_actividad (id_actividad, id_usuario, titulo, descripcion, fecha) VALUES (2, 1, 'Cena Especial', 'Cena para los participantes', '2015-06-16');
INSERT INTO tb_actividad (id_actividad, id_usuario, titulo, descripcion, fecha) VALUES (4, 1, 'Seminario 22', 'Seminario opcional', '2015-10-09');
INSERT INTO tb_actividad (id_actividad, id_usuario, titulo, descripcion, fecha) VALUES (6, 1, 'Defensoria Publica', 'aspectos principales', '2015-05-06');


--
-- TOC entry 2267 (class 0 OID 0)
-- Dependencies: 166
-- Name: tb_actividad_id_actividad_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tb_actividad_id_actividad_seq', 6, true);


--
-- TOC entry 2225 (class 0 OID 17515)
-- Dependencies: 219 2228
-- Data for Name: tb_asistencia; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO tb_asistencia (id, horas_impartidas, fecha_asistencia, curso_id, estado_id, facilitador_id) VALUES (1, '2', '2015-02-10', 27, 24, 20);
INSERT INTO tb_asistencia (id, horas_impartidas, fecha_asistencia, curso_id, estado_id, facilitador_id) VALUES (2, '2', '2015-02-10', 27, 14, 20);
INSERT INTO tb_asistencia (id, horas_impartidas, fecha_asistencia, curso_id, estado_id, facilitador_id) VALUES (3, '3', '2015-02-09', 27, 14, 20);
INSERT INTO tb_asistencia (id, horas_impartidas, fecha_asistencia, curso_id, estado_id, facilitador_id) VALUES (4, '3', '2015-02-11', 27, 14, 20);
INSERT INTO tb_asistencia (id, horas_impartidas, fecha_asistencia, curso_id, estado_id, facilitador_id) VALUES (5, '8', '2015-03-04', 36, 7, NULL);


--
-- TOC entry 2268 (class 0 OID 0)
-- Dependencies: 218
-- Name: tb_asistencia_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tb_asistencia_id_seq', 5, true);


--
-- TOC entry 2173 (class 0 OID 16411)
-- Dependencies: 167 2228
-- Data for Name: tb_auditoria; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO tb_auditoria (id_auditoria, id_usuario, accion, fecha, tabla_afectada, campo_afectado, informacion_campo) VALUES (1, 1, 'Modificar', '2015-03-17', 'Tb_Curso', 'nombre, duracion, nro_participantes, status, fecha_inicio, fecha_fin date', 'joynert testing 3232,15,50,1,2015-02-09,2015-03-19');
INSERT INTO tb_auditoria (id_auditoria, id_usuario, accion, fecha, tabla_afectada, campo_afectado, informacion_campo) VALUES (2, 1, 'Modificar', '2015-03-17', 'Tb_Curso', 'nombre, duracion, nro_participantes, status, fecha_inicio, fecha_fin date', 'joynert testing 3232,15,50,1,2015-02-09,2015-03-19');
INSERT INTO tb_auditoria (id_auditoria, id_usuario, accion, fecha, tabla_afectada, campo_afectado, informacion_campo) VALUES (3, 1, 'INSERTAR', '2015-03-17', 'Tb_Curso', 'nombre, duracion, nro_participantes,status, fecha_inicio, fecha_fin', 'e,3,3,1,17-03-2015,18-03-2015');
INSERT INTO tb_auditoria (id_auditoria, id_usuario, accion, fecha, tabla_afectada, campo_afectado, informacion_campo) VALUES (4, 1, 'INSERTAR', '2015-03-17', 'Tb_Curso', 'nombre, duracion, nro_participantes,status, fecha_inicio, fecha_fin', 're,12,12,1,18-03-2015,18-03-2015');
INSERT INTO tb_auditoria (id_auditoria, id_usuario, accion, fecha, tabla_afectada, campo_afectado, informacion_campo) VALUES (5, 1, 'INSERTAR', '2015-04-14', 'Tb_Curso', 'nombre, duracion, nro_participantes,status, fecha_inicio, fecha_fin', 'hola,50,90,1,16-04-2015,23-05-2015');
INSERT INTO tb_auditoria (id_auditoria, id_usuario, accion, fecha, tabla_afectada, campo_afectado, informacion_campo) VALUES (6, 1, 'INSERTAR', '2015-04-14', 'Tb_Curso', 'nombre, duracion, nro_participantes,status, fecha_inicio, fecha_fin', 'formacion nacional sexual,2,12,1,14-04-2015,18-04-2015');
INSERT INTO tb_auditoria (id_auditoria, id_usuario, accion, fecha, tabla_afectada, campo_afectado, informacion_campo) VALUES (7, 1, 'Modificar', '2015-04-29', 'Tb_Curso', 'nombre, duracion, nro_participantes, status, fecha_inicio, fecha_fin date', 'hola,50,90,0,2015-04-16,2015-05-23');
INSERT INTO tb_auditoria (id_auditoria, id_usuario, accion, fecha, tabla_afectada, campo_afectado, informacion_campo) VALUES (8, 1, 'Modificar', '2015-04-29', 'Tb_Curso', 'nombre, duracion, nro_participantes, status, fecha_inicio, fecha_fin date', 'hola,45,90,1,2015-04-16,2015-05-23');
INSERT INTO tb_auditoria (id_auditoria, id_usuario, accion, fecha, tabla_afectada, campo_afectado, informacion_campo) VALUES (9, 1, 'Modificar', '2015-04-29', 'Tb_Curso', 'nombre, duracion, nro_participantes, status, fecha_inicio, fecha_fin date', 'Capitalismo vs Socialismo,45,90,1,2015-04-16,2015-05-23');
INSERT INTO tb_auditoria (id_auditoria, id_usuario, accion, fecha, tabla_afectada, campo_afectado, informacion_campo) VALUES (10, 1, 'Modificar', '2015-04-29', 'Tb_Curso', 'nombre, duracion, nro_participantes, status, fecha_inicio, fecha_fin date', 'Influencia de la mujer en la sociedad moderna,15,50,0,2015-02-09,2015-03-19');
INSERT INTO tb_auditoria (id_auditoria, id_usuario, accion, fecha, tabla_afectada, campo_afectado, informacion_campo) VALUES (11, 1, 'Modificar', '2015-04-29', 'Tb_Curso', 'nombre, duracion, nro_participantes, status, fecha_inicio, fecha_fin date', 'La mujer en la sociedad,15,50,0,2015-02-09,2015-03-19');
INSERT INTO tb_auditoria (id_auditoria, id_usuario, accion, fecha, tabla_afectada, campo_afectado, informacion_campo) VALUES (12, 1, 'Modificar', '2015-04-30', 'Tb_Curso', 'nombre, duracion, nro_participantes, status, fecha_inicio, fecha_fin date', 'Historia Carabobo,10,10,0,2015-03-17,2015-03-18');
INSERT INTO tb_auditoria (id_auditoria, id_usuario, accion, fecha, tabla_afectada, campo_afectado, informacion_campo) VALUES (13, 1, 'Modificar', '2015-04-30', 'Tb_Curso', 'nombre, duracion, nro_participantes, status, fecha_inicio, fecha_fin date', 'Puertos e importancia,10,12,0,2015-03-07,2015-03-12');
INSERT INTO tb_auditoria (id_auditoria, id_usuario, accion, fecha, tabla_afectada, campo_afectado, informacion_campo) VALUES (14, 1, 'Modificar', '2015-04-30', 'Tb_Curso', 'nombre, duracion, nro_participantes, status, fecha_inicio, fecha_fin date', 'Deporte y Cultura,12,12,0,2015-03-18,2015-03-18');
INSERT INTO tb_auditoria (id_auditoria, id_usuario, accion, fecha, tabla_afectada, campo_afectado, informacion_campo) VALUES (15, NULL, 'Insertar', '2015-04-30', 'tb_persona', 'nombre_apellido, cedula, nacionalidad, sexo, fecha_nacimiento,email,', 'Miguel Terrami,21310256,V,M,07-10-1992,miguel@gmail.com');
INSERT INTO tb_auditoria (id_auditoria, id_usuario, accion, fecha, tabla_afectada, campo_afectado, informacion_campo) VALUES (16, 1, 'Modificar', '2015-05-10', 'Tb_Curso', 'nombre, duracion, nro_participantes, status, fecha_inicio, fecha_fin date', 'Capitalismo vs Socialismo,1,90,1,2015-05-09,2015-05-23');
INSERT INTO tb_auditoria (id_auditoria, id_usuario, accion, fecha, tabla_afectada, campo_afectado, informacion_campo) VALUES (17, 1, 'Modificar', '2015-05-10', 'Tb_Curso', 'nombre, duracion, nro_participantes, status, fecha_inicio, fecha_fin date', 'Capitalismo vs Socialismo,1,90,1,2015-05-21,2015-05-12');
INSERT INTO tb_auditoria (id_auditoria, id_usuario, accion, fecha, tabla_afectada, campo_afectado, informacion_campo) VALUES (18, 1, 'Modificar', '2015-05-10', 'Tb_Curso', 'nombre, duracion, nro_participantes, status, fecha_inicio, fecha_fin date', 'Capitalismo vs Socialismo,1,90,1,2015-05-21,2015-05-12');
INSERT INTO tb_auditoria (id_auditoria, id_usuario, accion, fecha, tabla_afectada, campo_afectado, informacion_campo) VALUES (19, 1, 'Modificar', '2015-05-10', 'Tb_Curso', 'nombre, duracion, nro_participantes, status, fecha_inicio, fecha_fin date', 'Capitalismo vs Socialismo,1,90,1,2015-05-21,2015-05-12');
INSERT INTO tb_auditoria (id_auditoria, id_usuario, accion, fecha, tabla_afectada, campo_afectado, informacion_campo) VALUES (20, 1, 'Modificar', '2015-05-10', 'Tb_Curso', 'nombre, duracion, nro_participantes, status, fecha_inicio, fecha_fin date', 'Capitalismo vs Socialismo,1,90,1,2015-05-21,2015-05-12');
INSERT INTO tb_auditoria (id_auditoria, id_usuario, accion, fecha, tabla_afectada, campo_afectado, informacion_campo) VALUES (21, 1, 'Modificar', '2015-05-10', 'Tb_Curso', 'nombre, duracion, nro_participantes, status, fecha_inicio, fecha_fin date', 'Capitalismo vs Socialismo,1,90,1,2015-05-21,2015-05-12');
INSERT INTO tb_auditoria (id_auditoria, id_usuario, accion, fecha, tabla_afectada, campo_afectado, informacion_campo) VALUES (22, 1, 'Modificar', '2015-05-10', 'Tb_Curso', 'nombre, duracion, nro_participantes, status, fecha_inicio, fecha_fin date', 'La mujer en la sociedad,15,50,0,2015-05-27,2015-03-19');
INSERT INTO tb_auditoria (id_auditoria, id_usuario, accion, fecha, tabla_afectada, campo_afectado, informacion_campo) VALUES (23, 1, 'Modificar', '2015-05-10', 'Tb_Curso', 'nombre, duracion, nro_participantes, status, fecha_inicio, fecha_fin date', 'Capitalismo vs Socialismo,1,90,1,2015-05-21,2015-05-11');
INSERT INTO tb_auditoria (id_auditoria, id_usuario, accion, fecha, tabla_afectada, campo_afectado, informacion_campo) VALUES (24, 1, 'Modificar', '2015-05-10', 'Tb_Curso', 'nombre, duracion, nro_participantes, status, fecha_inicio, fecha_fin date', 'Capitalismo vs Socialismo,1,90,1,2015-05-21,2015-05-11');
INSERT INTO tb_auditoria (id_auditoria, id_usuario, accion, fecha, tabla_afectada, campo_afectado, informacion_campo) VALUES (25, 1, 'Modificar', '2015-05-10', 'Tb_Curso', 'nombre, duracion, nro_participantes, status, fecha_inicio, fecha_fin date', 'Capitalismo vs Socialismo,1,90,1,2015-05-28,2015-05-21');
INSERT INTO tb_auditoria (id_auditoria, id_usuario, accion, fecha, tabla_afectada, campo_afectado, informacion_campo) VALUES (26, 1, 'Modificar', '2015-05-10', 'Tb_Curso', 'nombre, duracion, nro_participantes, status, fecha_inicio, fecha_fin date', 'Capitalismo vs Socialismo,1,90,1,2015-05-28,2015-05-21');
INSERT INTO tb_auditoria (id_auditoria, id_usuario, accion, fecha, tabla_afectada, campo_afectado, informacion_campo) VALUES (27, 1, 'Modificar', '2015-05-10', 'Tb_Curso', 'nombre, duracion, nro_participantes, status, fecha_inicio, fecha_fin date', 'Capitalismo vs Socialismo,1,90,1,2015-05-28,2015-05-21');
INSERT INTO tb_auditoria (id_auditoria, id_usuario, accion, fecha, tabla_afectada, campo_afectado, informacion_campo) VALUES (28, 1, 'Modificar', '2015-05-10', 'Tb_Curso', 'nombre, duracion, nro_participantes, status, fecha_inicio, fecha_fin date', 'Capitalismo vs Socialismo,1,90,1,2015-05-11,2015-05-21');
INSERT INTO tb_auditoria (id_auditoria, id_usuario, accion, fecha, tabla_afectada, campo_afectado, informacion_campo) VALUES (29, 1, 'Modificar', '2015-05-10', 'Tb_Curso', 'nombre, duracion, nro_participantes, status, fecha_inicio, fecha_fin date', 'Capitalismo vs Socialismo,1,90,1,2015-05-25,2015-05-20');
INSERT INTO tb_auditoria (id_auditoria, id_usuario, accion, fecha, tabla_afectada, campo_afectado, informacion_campo) VALUES (30, 1, 'Modificar', '2015-05-10', 'Tb_Curso', 'nombre, duracion, nro_participantes, status, fecha_inicio, fecha_fin date', 'Capitalismo vs Socialismo,1,90,1,2015-05-11,2015-05-20');
INSERT INTO tb_auditoria (id_auditoria, id_usuario, accion, fecha, tabla_afectada, campo_afectado, informacion_campo) VALUES (31, 1, 'Modificar', '2015-05-10', 'Tb_Curso', 'nombre, duracion, nro_participantes, status, fecha_inicio, fecha_fin date', 'Capitalismo vs Socialismo,1,90,1,2015-05-11,2015-05-20');
INSERT INTO tb_auditoria (id_auditoria, id_usuario, accion, fecha, tabla_afectada, campo_afectado, informacion_campo) VALUES (32, 1, 'Modificar', '2015-05-10', 'Tb_Curso', 'nombre, duracion, nro_participantes, status, fecha_inicio, fecha_fin date', 'Capitalismo vs Socialismo,1,90,1,2015-05-29,2015-05-31');
INSERT INTO tb_auditoria (id_auditoria, id_usuario, accion, fecha, tabla_afectada, campo_afectado, informacion_campo) VALUES (33, 1, 'Modificar', '2015-05-10', 'Tb_Curso', 'nombre, duracion, nro_participantes, status, fecha_inicio, fecha_fin date', 'Capitalismo vs Socialismo,1,90,1,2015-05-29,2015-05-27');
INSERT INTO tb_auditoria (id_auditoria, id_usuario, accion, fecha, tabla_afectada, campo_afectado, informacion_campo) VALUES (34, 1, 'Modificar', '2015-05-10', 'Tb_Curso', 'nombre, duracion, nro_participantes, status, fecha_inicio, fecha_fin date', 'Capitalismo vs Socialismo,1,90,1,2015-05-29,2015-09-30');
INSERT INTO tb_auditoria (id_auditoria, id_usuario, accion, fecha, tabla_afectada, campo_afectado, informacion_campo) VALUES (35, 1, 'Eliminar', '2015-05-10', 'Tb_Curso', 'nombre, duracion, nro_participantes,status, fecha_inicio, fecha_fin date', 'Deporte y Cultura,12,12,0,2015-03-18,2015-03-18');
INSERT INTO tb_auditoria (id_auditoria, id_usuario, accion, fecha, tabla_afectada, campo_afectado, informacion_campo) VALUES (36, 1, 'Eliminar', '2015-05-10', 'Tb_Curso', 'nombre, duracion, nro_participantes,status, fecha_inicio, fecha_fin date', 'Capitalismo vs Socialismo,1,90,1,2015-05-29,2015-09-30');
INSERT INTO tb_auditoria (id_auditoria, id_usuario, accion, fecha, tabla_afectada, campo_afectado, informacion_campo) VALUES (37, 1, 'Eliminar', '2015-05-10', 'Tb_Curso', 'nombre, duracion, nro_participantes,status, fecha_inicio, fecha_fin date', 'formacion nacional sexual,2,12,0,2015-04-14,2015-04-18');
INSERT INTO tb_auditoria (id_auditoria, id_usuario, accion, fecha, tabla_afectada, campo_afectado, informacion_campo) VALUES (38, 1, 'Eliminar', '2015-05-10', 'Tb_Curso', 'nombre, duracion, nro_participantes,status, fecha_inicio, fecha_fin date', 'formacion nacional sexual,2,12,0,2015-04-14,2015-04-18');
INSERT INTO tb_auditoria (id_auditoria, id_usuario, accion, fecha, tabla_afectada, campo_afectado, informacion_campo) VALUES (39, 1, 'Eliminar', '2015-05-10', 'Tb_Curso', 'nombre, duracion, nro_participantes,status, fecha_inicio, fecha_fin date', 'formacion nacional sexual,2,12,0,2015-04-14,2015-04-18');
INSERT INTO tb_auditoria (id_auditoria, id_usuario, accion, fecha, tabla_afectada, campo_afectado, informacion_campo) VALUES (40, 1, 'Eliminar', '2015-05-10', 'Tb_Curso', 'nombre, duracion, nro_participantes,status, fecha_inicio, fecha_fin date', 'formacion nacional sexual,2,12,0,2015-04-14,2015-04-18');
INSERT INTO tb_auditoria (id_auditoria, id_usuario, accion, fecha, tabla_afectada, campo_afectado, informacion_campo) VALUES (41, 1, 'Eliminar', '2015-05-10', 'Tb_Curso', 'nombre, duracion, nro_participantes,status, fecha_inicio, fecha_fin date', 'Puertos e importancia,10,12,0,2015-03-07,2015-03-12');
INSERT INTO tb_auditoria (id_auditoria, id_usuario, accion, fecha, tabla_afectada, campo_afectado, informacion_campo) VALUES (42, 1, 'Modificar', '2015-05-10', 'Tb_Curso', 'nombre, duracion, nro_participantes, status, fecha_inicio, fecha_fin date', 'Capitalismo vs Socialismo,1,90,1,2015-05-10,2015-05-10');
INSERT INTO tb_auditoria (id_auditoria, id_usuario, accion, fecha, tabla_afectada, campo_afectado, informacion_campo) VALUES (43, 1, 'INSERTAR', '2015-05-10', 'Tb_Curso', 'nombre, duracion, nro_participantes,status, fecha_inicio, fecha_fin', 'testing,12,45,1,14-05-2015,22-05-2015');
INSERT INTO tb_auditoria (id_auditoria, id_usuario, accion, fecha, tabla_afectada, campo_afectado, informacion_campo) VALUES (44, NULL, 'Insertar', '2015-05-11', 'tb_persona', 'nombre_apellido, cedula, nacionalidad, sexo, fecha_nacimiento,email,', 'jose ramirez,18765904,V,F,02-05-1991,joynertagf@gmail.com');
INSERT INTO tb_auditoria (id_auditoria, id_usuario, accion, fecha, tabla_afectada, campo_afectado, informacion_campo) VALUES (45, 1, 'Eliminar', '2015-05-11', 'tb_persona', 'nombre_apellido, cedula, nacionalidad, sexo, fecha_nacimiento,email,', '1,1,V,F,2015-02-11,1');
INSERT INTO tb_auditoria (id_auditoria, id_usuario, accion, fecha, tabla_afectada, campo_afectado, informacion_campo) VALUES (46, 1, 'Eliminar', '2015-05-11', 'tb_persona', 'nombre_apellido, cedula, nacionalidad, sexo, fecha_nacimiento,email,', 'jj lole,12345678,V,M,1991-03-23,jjlole@gmail.com');
INSERT INTO tb_auditoria (id_auditoria, id_usuario, accion, fecha, tabla_afectada, campo_afectado, informacion_campo) VALUES (47, 1, 'Modificar', '2015-05-11', 'Tb_Curso', 'nombre, duracion, nro_participantes, status, fecha_inicio, fecha_fin date', 'historia de la humanidad,12,45,1,2015-05-14,2015-05-22');
INSERT INTO tb_auditoria (id_auditoria, id_usuario, accion, fecha, tabla_afectada, campo_afectado, informacion_campo) VALUES (48, 1, 'Modificar', '2015-05-11', 'Tb_Curso', 'nombre, duracion, nro_participantes, status, fecha_inicio, fecha_fin date', 'historia de la humanidad,12,45,1,2015-05-14,2015-05-22');
INSERT INTO tb_auditoria (id_auditoria, id_usuario, accion, fecha, tabla_afectada, campo_afectado, informacion_campo) VALUES (49, 1, 'Eliminar', '2015-05-11', 'Tb_Curso', 'nombre, duracion, nro_participantes,status, fecha_inicio, fecha_fin date', 'historia de la humanidad,12,45,1,2015-05-14,2015-05-22');
INSERT INTO tb_auditoria (id_auditoria, id_usuario, accion, fecha, tabla_afectada, campo_afectado, informacion_campo) VALUES (50, 1, 'Modificar', '2015-05-11', 'Tb_Curso', 'nombre, duracion, nro_participantes, status, fecha_inicio, fecha_fin date', 'formacion nacional,2,12,0,2015-04-14,2015-04-18');
INSERT INTO tb_auditoria (id_auditoria, id_usuario, accion, fecha, tabla_afectada, campo_afectado, informacion_campo) VALUES (51, 1, 'Modificar', '2015-05-11', 'Tb_Curso', 'nombre, duracion, nro_participantes, status, fecha_inicio, fecha_fin date', 'historia de la humanidad 2,12,45,1,2015-05-14,2015-05-22');


--
-- TOC entry 2269 (class 0 OID 0)
-- Dependencies: 168
-- Name: tb_auditoria_id_auditoria_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tb_auditoria_id_auditoria_seq', 51, true);


--
-- TOC entry 2214 (class 0 OID 17392)
-- Dependencies: 208 2228
-- Data for Name: tb_biblioteca; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO tb_biblioteca (id_biblioteca, descripcion, ruta, tipo_multimedia, titulo) VALUES (6, 'Antecedentes', './uploads/Antecedentes pst.docx', 'Archivo', 'Antecedentes pst.docx');
INSERT INTO tb_biblioteca (id_biblioteca, descripcion, ruta, tipo_multimedia, titulo) VALUES (7, 'Libro java', './uploads/Wrox.Professional.Java.for.Web.Applications.Feb.2014.pdf', 'Archivo', 'Wrox.Professional.Java.for.Web.Applications.Feb.2014.pdf');
INSERT INTO tb_biblioteca (id_biblioteca, descripcion, ruta, tipo_multimedia, titulo) VALUES (2, 'Planilla 1243', './uploads/RD 967-2014 solicitud equivalencia.docx', 'Archivo', 'RD 967-2014 solicitud equivalencia.docx');
INSERT INTO tb_biblioteca (id_biblioteca, descripcion, ruta, tipo_multimedia, titulo) VALUES (1, 'img 2', './uploads/fondo.png', 'Archivo', 'fondo.png');
INSERT INTO tb_biblioteca (id_biblioteca, descripcion, ruta, tipo_multimedia, titulo) VALUES (10, 'fondo', './uploads/fondo_comandante.jpg', 'Archivo', 'fondo_comandante.jpg');
INSERT INTO tb_biblioteca (id_biblioteca, descripcion, ruta, tipo_multimedia, titulo) VALUES (11, 'historia mujer', './uploads/historia de la mujer.pdf', 'Archivo', 'historia de la mujer.pdf');
INSERT INTO tb_biblioteca (id_biblioteca, descripcion, ruta, tipo_multimedia, titulo) VALUES (13, 'P. simon bolivar', './uploads/Proyecto-Nacional-Simon-Bolivar.pdf', 'Archivo', 'Proyecto-Nacional-Simon-Bolivar.pdf');


--
-- TOC entry 2270 (class 0 OID 0)
-- Dependencies: 207
-- Name: tb_biblioteca_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tb_biblioteca_id_seq', 13, true);


--
-- TOC entry 2219 (class 0 OID 17449)
-- Dependencies: 213 2228
-- Data for Name: tb_cargo; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO tb_cargo (id_cargo, cargo) VALUES (1, 'Facilitador');
INSERT INTO tb_cargo (id_cargo, cargo) VALUES (2, 'Asistente');
INSERT INTO tb_cargo (id_cargo, cargo) VALUES (4, 'Coordinador');
INSERT INTO tb_cargo (id_cargo, cargo) VALUES (3, 'Instructor de Formacion');
INSERT INTO tb_cargo (id_cargo, cargo) VALUES (5, 'Administrador');


--
-- TOC entry 2271 (class 0 OID 0)
-- Dependencies: 212
-- Name: tb_carro_id_cargo_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tb_carro_id_cargo_seq', 5, true);


--
-- TOC entry 2175 (class 0 OID 16416)
-- Dependencies: 169 2228
-- Data for Name: tb_curso; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO tb_curso (id_curso, nombre, duracion, nro_participantes, status, fecha_inicio, fecha_fin) VALUES (28, 'manualidades', '20', 10, 0, '2015-02-10', '2015-02-20');
INSERT INTO tb_curso (id_curso, nombre, duracion, nro_participantes, status, fecha_inicio, fecha_fin) VALUES (36, 'Historia Carabobo', '10', 10, 0, '2015-03-17', '2015-03-18');
INSERT INTO tb_curso (id_curso, nombre, duracion, nro_participantes, status, fecha_inicio, fecha_fin) VALUES (38, 'Deporte y Cultura', '12', 12, 0, '2015-03-18', '2015-03-18');
INSERT INTO tb_curso (id_curso, nombre, duracion, nro_participantes, status, fecha_inicio, fecha_fin) VALUES (27, 'La mujer en la sociedad', '15', 50, 0, '2015-05-27', '2015-03-19');
INSERT INTO tb_curso (id_curso, nombre, duracion, nro_participantes, status, fecha_inicio, fecha_fin) VALUES (39, 'Capitalismo vs Socialismo', '1', 90, 0, '2015-05-10', '2015-05-10');
INSERT INTO tb_curso (id_curso, nombre, duracion, nro_participantes, status, fecha_inicio, fecha_fin) VALUES (40, 'formacion nacional', '2', 12, 0, '2015-04-14', '2015-04-18');
INSERT INTO tb_curso (id_curso, nombre, duracion, nro_participantes, status, fecha_inicio, fecha_fin) VALUES (41, 'historia de la humanidad 2', '12', 45, 1, '2015-05-14', '2015-05-22');


--
-- TOC entry 2272 (class 0 OID 0)
-- Dependencies: 170
-- Name: tb_curso_id_curso_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tb_curso_id_curso_seq', 41, true);


--
-- TOC entry 2177 (class 0 OID 16421)
-- Dependencies: 171 2228
-- Data for Name: tb_divulgacion; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO tb_divulgacion (id_divulgacion, id_curso, fecha_actual, tipo_divulgacion_radio, tipo_divulgacion_tv, tipo_divulgacion_prensa) VALUES (7, 27, '2015-02-16 13:06:38', 14, 6, NULL);
INSERT INTO tb_divulgacion (id_divulgacion, id_curso, fecha_actual, tipo_divulgacion_radio, tipo_divulgacion_tv, tipo_divulgacion_prensa) VALUES (10, 28, '2015-02-25 15:22:26', 17, 8, 11);
INSERT INTO tb_divulgacion (id_divulgacion, id_curso, fecha_actual, tipo_divulgacion_radio, tipo_divulgacion_tv, tipo_divulgacion_prensa) VALUES (12, 39, '2015-04-14 22:27:42', 18, NULL, NULL);
INSERT INTO tb_divulgacion (id_divulgacion, id_curso, fecha_actual, tipo_divulgacion_radio, tipo_divulgacion_tv, tipo_divulgacion_prensa) VALUES (13, 39, '2015-04-14 22:27:42', 19, NULL, NULL);
INSERT INTO tb_divulgacion (id_divulgacion, id_curso, fecha_actual, tipo_divulgacion_radio, tipo_divulgacion_tv, tipo_divulgacion_prensa) VALUES (14, 39, '2015-04-14 22:27:42', 20, NULL, NULL);
INSERT INTO tb_divulgacion (id_divulgacion, id_curso, fecha_actual, tipo_divulgacion_radio, tipo_divulgacion_tv, tipo_divulgacion_prensa) VALUES (15, 27, '2015-04-29 23:31:51', NULL, 9, NULL);


--
-- TOC entry 2273 (class 0 OID 0)
-- Dependencies: 172
-- Name: tb_divulgacion_id_divulgacion_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tb_divulgacion_id_divulgacion_seq', 15, true);


--
-- TOC entry 2204 (class 0 OID 17254)
-- Dependencies: 198 2228
-- Data for Name: tb_divulgacion_prensa; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO tb_divulgacion_prensa (id_divulgacion_prensa, nombre_prensa, fecha_prensa, tipo_divulgacion_prensa) VALUES (11, 'kk', '2015-02-26', 5);


--
-- TOC entry 2274 (class 0 OID 0)
-- Dependencies: 199
-- Name: tb_divulgacion_prensa_id_divulgacion_prensa_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tb_divulgacion_prensa_id_divulgacion_prensa_seq', 11, true);


--
-- TOC entry 2206 (class 0 OID 17259)
-- Dependencies: 200 2228
-- Data for Name: tb_divulgacion_radio; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO tb_divulgacion_radio (id_divulgacion_radio, tipo_divulgacion_radio, emisora, hora, dial) VALUES (14, 3, 'hola', '4 pm', '99.1 fm');
INSERT INTO tb_divulgacion_radio (id_divulgacion_radio, tipo_divulgacion_radio, emisora, hora, dial) VALUES (16, 3, 'jhkh', '8', '778');
INSERT INTO tb_divulgacion_radio (id_divulgacion_radio, tipo_divulgacion_radio, emisora, hora, dial) VALUES (17, 3, 'yuu', '787', '7878');
INSERT INTO tb_divulgacion_radio (id_divulgacion_radio, tipo_divulgacion_radio, emisora, hora, dial) VALUES (18, 3, 'La Mega', '06:00', '103.7 FM');
INSERT INTO tb_divulgacion_radio (id_divulgacion_radio, tipo_divulgacion_radio, emisora, hora, dial) VALUES (19, 3, 'La Mega', '06:35', '103.7 ');
INSERT INTO tb_divulgacion_radio (id_divulgacion_radio, tipo_divulgacion_radio, emisora, hora, dial) VALUES (20, 3, 'La Mega', '08:35', '103.7');


--
-- TOC entry 2275 (class 0 OID 0)
-- Dependencies: 201
-- Name: tb_divulgacion_radio_id_divulgacion_radio_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tb_divulgacion_radio_id_divulgacion_radio_seq', 20, true);


--
-- TOC entry 2208 (class 0 OID 17264)
-- Dependencies: 202 2228
-- Data for Name: tb_divulgacion_tv; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO tb_divulgacion_tv (id_divulgacion_tv, nombre_programa, canal, tipo_divulgacion_tv, hora_emision) VALUES (7, 'kjb', '8', 2, '8');
INSERT INTO tb_divulgacion_tv (id_divulgacion_tv, nombre_programa, canal, tipo_divulgacion_tv, hora_emision) VALUES (8, 'j', '9', 1, '9');
INSERT INTO tb_divulgacion_tv (id_divulgacion_tv, nombre_programa, canal, tipo_divulgacion_tv, hora_emision) VALUES (9, 'Primer Contacto', 'A que te r�es', 2, '22:00');


--
-- TOC entry 2276 (class 0 OID 0)
-- Dependencies: 203
-- Name: tb_divulgacion_tv_id_divulgacion_tv_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tb_divulgacion_tv_id_divulgacion_tv_seq', 9, true);


--
-- TOC entry 2179 (class 0 OID 16426)
-- Dependencies: 173 2228
-- Data for Name: tb_escalas; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO tb_escalas (id_escala, descripcion, status) VALUES (1, 'Excelente', 1);
INSERT INTO tb_escalas (id_escala, descripcion, status) VALUES (2, 'Muy bueno', 1);
INSERT INTO tb_escalas (id_escala, descripcion, status) VALUES (3, 'Bueno', 1);
INSERT INTO tb_escalas (id_escala, descripcion, status) VALUES (4, 'Regular', 1);
INSERT INTO tb_escalas (id_escala, descripcion, status) VALUES (5, 'Deficiente', 1);


--
-- TOC entry 2277 (class 0 OID 0)
-- Dependencies: 174
-- Name: tb_escalas_id_escala_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tb_escalas_id_escala_seq', 1, false);


--
-- TOC entry 2181 (class 0 OID 16431)
-- Dependencies: 175 2228
-- Data for Name: tb_estado; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO tb_estado (id_estado, id_redi, nombre) VALUES (1, 5, 'Amazonas');
INSERT INTO tb_estado (id_estado, id_redi, nombre) VALUES (2, 4, 'Anzoátegui');
INSERT INTO tb_estado (id_estado, id_redi, nombre) VALUES (3, 3, 'Apure');
INSERT INTO tb_estado (id_estado, id_redi, nombre) VALUES (4, 1, 'Aragua');
INSERT INTO tb_estado (id_estado, id_redi, nombre) VALUES (5, 3, 'Barinas');
INSERT INTO tb_estado (id_estado, id_redi, nombre) VALUES (6, 5, 'Bolívar');
INSERT INTO tb_estado (id_estado, id_redi, nombre) VALUES (7, 1, 'Carabobo');
INSERT INTO tb_estado (id_estado, id_redi, nombre) VALUES (8, 3, 'Cojedes');
INSERT INTO tb_estado (id_estado, id_redi, nombre) VALUES (9, 5, 'Delta Amacuro');
INSERT INTO tb_estado (id_estado, id_redi, nombre) VALUES (10, 2, 'Falcón');
INSERT INTO tb_estado (id_estado, id_redi, nombre) VALUES (11, 3, 'Guárico');
INSERT INTO tb_estado (id_estado, id_redi, nombre) VALUES (12, 2, 'Lara');
INSERT INTO tb_estado (id_estado, id_redi, nombre) VALUES (13, 6, 'Mérida');
INSERT INTO tb_estado (id_estado, id_redi, nombre) VALUES (14, 1, 'Miranda');
INSERT INTO tb_estado (id_estado, id_redi, nombre) VALUES (15, 4, 'Monagas');
INSERT INTO tb_estado (id_estado, id_redi, nombre) VALUES (16, 7, 'Nueva Esparta');
INSERT INTO tb_estado (id_estado, id_redi, nombre) VALUES (17, 3, 'Portuguesa');
INSERT INTO tb_estado (id_estado, id_redi, nombre) VALUES (18, 4, 'Sucre');
INSERT INTO tb_estado (id_estado, id_redi, nombre) VALUES (19, 6, 'Táchira');
INSERT INTO tb_estado (id_estado, id_redi, nombre) VALUES (20, 6, 'Trujillo');
INSERT INTO tb_estado (id_estado, id_redi, nombre) VALUES (21, 1, 'Vargas');
INSERT INTO tb_estado (id_estado, id_redi, nombre) VALUES (22, 2, 'Yaracuy');
INSERT INTO tb_estado (id_estado, id_redi, nombre) VALUES (23, 2, 'Zulia');
INSERT INTO tb_estado (id_estado, id_redi, nombre) VALUES (24, 1, 'Distrito Capital');
INSERT INTO tb_estado (id_estado, id_redi, nombre) VALUES (25, 7, 'Dependencias Federales');


--
-- TOC entry 2278 (class 0 OID 0)
-- Dependencies: 176
-- Name: tb_estado_id_estado_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tb_estado_id_estado_seq', 1, false);


--
-- TOC entry 2183 (class 0 OID 16436)
-- Dependencies: 177 2228
-- Data for Name: tb_evaluacion; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO tb_evaluacion (id_pregunta, descripcion, status) VALUES (1, '¿Qué le pareció la calidad de los contenidos impartidos en la actividad?', 1);
INSERT INTO tb_evaluacion (id_pregunta, descripcion, status) VALUES (2, '¿Cuál es su evaluación del desempeño de los facilitadoras/es?', 1);
INSERT INTO tb_evaluacion (id_pregunta, descripcion, status) VALUES (3, '¿El cumplimiento del programa establecido para la actividad fue?', 1);
INSERT INTO tb_evaluacion (id_pregunta, descripcion, status) VALUES (4, '¿Cuál es su opinión sobre la calidad de la bibliografía suministrada?', 1);
INSERT INTO tb_evaluacion (id_pregunta, descripcion, status) VALUES (5, '¿Cómo le pareció el tiempo dedicado a la actividad?', 1);
INSERT INTO tb_evaluacion (id_pregunta, descripcion, status) VALUES (6, '¿Qué le pareció la participación de las y los asistentes?', 1);
INSERT INTO tb_evaluacion (id_pregunta, descripcion, status) VALUES (7, '¿Cuál es su opinión del local donde se realizó la actividad?', 1);
INSERT INTO tb_evaluacion (id_pregunta, descripcion, status) VALUES (8, '¿Cuál es su opinión de los recursos de apoyo para la actividad?', 1);
INSERT INTO tb_evaluacion (id_pregunta, descripcion, status) VALUES (9, '¿Cuál es su evaluación general de la actividad?', 1);
INSERT INTO tb_evaluacion (id_pregunta, descripcion, status) VALUES (10, 'Escriba alguna sugerencia de aspectos que podrían mejorar', 1);


--
-- TOC entry 2279 (class 0 OID 0)
-- Dependencies: 178
-- Name: tb_evaluacion_id_pregunta_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tb_evaluacion_id_pregunta_seq', 1, false);


--
-- TOC entry 2185 (class 0 OID 16441)
-- Dependencies: 179 2228
-- Data for Name: tb_general; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO tb_general (id_persona, institucion_labora, cargo, telefono, email) VALUES (2, 'ast', 'analista programador', 'false', 'ast@ast.com.ve');
INSERT INTO tb_general (id_persona, institucion_labora, cargo, telefono, email) VALUES (3, '', '', 'false', '');
INSERT INTO tb_general (id_persona, institucion_labora, cargo, telefono, email) VALUES (20, '', '', '', '');
INSERT INTO tb_general (id_persona, institucion_labora, cargo, telefono, email) VALUES (12, 't', 't', 't', 't');
INSERT INTO tb_general (id_persona, institucion_labora, cargo, telefono, email) VALUES (37, '', '', '', '');
INSERT INTO tb_general (id_persona, institucion_labora, cargo, telefono, email) VALUES (39, '', '', '', '');
INSERT INTO tb_general (id_persona, institucion_labora, cargo, telefono, email) VALUES (47, '', '', '', '');
INSERT INTO tb_general (id_persona, institucion_labora, cargo, telefono, email) VALUES (49, '', '', '', '');


--
-- TOC entry 2227 (class 0 OID 17979)
-- Dependencies: 221 2228
-- Data for Name: tb_informe; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO tb_informe (id_informe, id_redi, id_estado, id_municipio, id_parroquia, id_usuario, id_curso, tipo_actividad_for, act_nombre_for, tot_asistentes_for, tot_femeninos_for, tot_masculinos_for, tot_div_sexual_for, tot_mujeres_indigenas_for, tot_mujeres_discapacidad_for, tot_mujeres_afrodecendientes_for, tot_movimientos_mujeres_for, nombre_movimiento_for, fec_inicio_for, hora_inicio_for, fec_final_for, hora_final_for, tipo_actividad_div, act_nombre_div, tot_asistentes_div, tot_femeninos_div, tot_masculinos_div, tot_div_sexual_div, tot_mujeres_indigenas_div, tot_mujeres_discapacidad_div, tot_mujeres_afrodecendientes_div, tipo_material_div, cantidad_div, convocacion_medios_div, medios_radio_div, medios_prensa_div, medios_tv_div, medios_comunitarios_div, medios_otros_div, fecha_creacion, fecha_actualizacion) VALUES (1, 3, 3, 29, 85, 1, 27, 'Taller', 'prueba', 24, 20, 4, 0, 0, 0, 0, 0, 'somos juventud', '2015-02-01', '19:06:25', '2015-02-03', '19:06:25', 'Lanzamiento', 'lanzamiento nuevo proyecto', 34, 24, 10, 1, 0, 0, 0, 'Folletos', 300, 'No', 'false', 'false', 'false', 'false', 'false', '2015-02-08', '2015-02-02');
INSERT INTO tb_informe (id_informe, id_redi, id_estado, id_municipio, id_parroquia, id_usuario, id_curso, tipo_actividad_for, act_nombre_for, tot_asistentes_for, tot_femeninos_for, tot_masculinos_for, tot_div_sexual_for, tot_mujeres_indigenas_for, tot_mujeres_discapacidad_for, tot_mujeres_afrodecendientes_for, tot_movimientos_mujeres_for, nombre_movimiento_for, fec_inicio_for, hora_inicio_for, fec_final_for, hora_final_for, tipo_actividad_div, act_nombre_div, tot_asistentes_div, tot_femeninos_div, tot_masculinos_div, tot_div_sexual_div, tot_mujeres_indigenas_div, tot_mujeres_discapacidad_div, tot_mujeres_afrodecendientes_div, tipo_material_div, cantidad_div, convocacion_medios_div, medios_radio_div, medios_prensa_div, medios_tv_div, medios_comunitarios_div, medios_otros_div, fecha_creacion, fecha_actualizacion) VALUES (2, 1, 4, 52, 148, 1, 27, 'Taller', 'taller social', 24, 11, 12, 1, 2, 3, 4, 5, 'varios', '2015-02-01', '19:06:25', '2015-02-02', '19:06:25', 'Toma comunitaria', 'toma comunitaria', 25, 13, 12, 6, 7, 8, 9, 'Folletos', 23, 'Si', 'radio', 'prensa', 'T.V.', 'Medios Comunitarios', 'false', '2015-01-27', '2015-02-02');


--
-- TOC entry 2280 (class 0 OID 0)
-- Dependencies: 220
-- Name: tb_informe_id_informe_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tb_informe_id_informe_seq', 1, false);


--
-- TOC entry 2186 (class 0 OID 16449)
-- Dependencies: 180 2228
-- Data for Name: tb_mmdb; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO tb_mmdb (id_persona, beneficiaria, comite, responsabilidad, proy_socio_productivo, frente_comites) VALUES (21, 'No', 'No', 'No', 'No', 'Si');
INSERT INTO tb_mmdb (id_persona, beneficiaria, comite, responsabilidad, proy_socio_productivo, frente_comites) VALUES (43, 'No', 'No', 'No', 'No', 'No');
INSERT INTO tb_mmdb (id_persona, beneficiaria, comite, responsabilidad, proy_socio_productivo, frente_comites) VALUES (46, 'No', 'No', 'No', 'No', 'No');


--
-- TOC entry 2187 (class 0 OID 16452)
-- Dependencies: 181 2228
-- Data for Name: tb_municipio; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (1, 1, 'Alto Orinoco');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (2, 1, 'Atabapo');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (3, 1, 'Atures');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (4, 1, 'Autana');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (5, 1, 'Manapiare');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (6, 1, 'Maroa');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (7, 1, 'Río Negro');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (8, 2, 'Anaco');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (9, 2, 'Aragua');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (10, 2, 'Manuel Ezequiel Bruzual');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (11, 2, 'Diego Bautista Urbaneja');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (12, 2, 'Fernando Peñalver');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (13, 2, 'Francisco Del Carmen Carvajal');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (14, 2, 'General Sir Arthur McGregor');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (15, 2, 'Guanta');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (16, 2, 'Independencia');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (17, 2, 'José Gregorio Monagas');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (18, 2, 'Juan Antonio Sotillo');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (19, 2, 'Juan Manuel Cajigal');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (20, 2, 'Libertad');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (21, 2, 'Francisco de Miranda');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (22, 2, 'Pedro María Freites');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (23, 2, 'Píritu');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (24, 2, 'San José de Guanipa');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (25, 2, 'San Juan de Capistrano');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (26, 2, 'Santa Ana');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (27, 2, 'Simón Bolívar');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (28, 2, 'Simón Rodríguez');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (29, 3, 'Achaguas');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (30, 3, 'Biruaca');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (31, 3, 'Muñóz');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (32, 3, 'Páez');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (33, 3, 'Pedro Camejo');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (34, 3, 'Rómulo Gallegos');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (35, 3, 'San Fernando');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (36, 4, 'Atanasio Girardot');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (37, 4, 'Bolívar');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (38, 4, 'Camatagua');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (39, 4, 'Francisco Linares Alcántara');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (40, 4, 'José Ángel Lamas');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (41, 4, 'José Félix Ribas');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (42, 4, 'José Rafael Revenga');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (43, 4, 'Libertador');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (44, 4, 'Mario Briceño Iragorry');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (45, 4, 'Ocumare de la Costa de Oro');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (46, 4, 'San Casimiro');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (47, 4, 'San Sebastián');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (48, 4, 'Santiago Mariño');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (49, 4, 'Santos Michelena');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (50, 4, 'Sucre');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (51, 4, 'Tovar');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (52, 4, 'Urdaneta');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (53, 4, 'Zamora');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (54, 5, 'Alberto Arvelo Torrealba');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (55, 5, 'Andrés Eloy Blanco');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (56, 5, 'Antonio José de Sucre');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (57, 5, 'Arismendi');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (58, 5, 'Barinas');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (59, 5, 'Bolívar');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (60, 5, 'Cruz Paredes');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (61, 5, 'Ezequiel Zamora');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (62, 5, 'Obispos');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (63, 5, 'Pedraza');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (64, 5, 'Rojas');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (65, 5, 'Sosa');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (66, 6, 'Caroní');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (67, 6, 'Cedeño');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (68, 6, 'El Callao');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (69, 6, 'Gran Sabana');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (70, 6, 'Heres');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (71, 6, 'Piar');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (72, 6, 'Angostura (Raúl Leoni)');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (73, 6, 'Roscio');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (74, 6, 'Sifontes');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (75, 6, 'Sucre');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (76, 6, 'Padre Pedro Chien');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (77, 7, 'Bejuma');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (78, 7, 'Carlos Arvelo');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (79, 7, 'Diego Ibarra');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (80, 7, 'Guacara');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (81, 7, 'Juan José Mora');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (82, 7, 'Libertador');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (83, 7, 'Los Guayos');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (84, 7, 'Miranda');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (85, 7, 'Montalbán');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (86, 7, 'Naguanagua');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (87, 7, 'Puerto Cabello');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (88, 7, 'San Diego');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (89, 7, 'San Joaquín');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (90, 7, 'Valencia');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (91, 8, 'Anzoátegui');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (92, 8, 'Tinaquillo');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (93, 8, 'Girardot');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (94, 8, 'Lima Blanco');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (95, 8, 'Pao de San Juan Bautista');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (96, 8, 'Ricaurte');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (97, 8, 'Rómulo Gallegos');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (98, 8, 'San Carlos');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (99, 8, 'Tinaco');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (100, 9, 'Antonio Díaz');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (101, 9, 'Casacoima');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (102, 9, 'Pedernales');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (103, 9, 'Tucupita');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (104, 10, 'Acosta');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (105, 10, 'Bolívar');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (106, 10, 'Buchivacoa');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (107, 10, 'Cacique Manaure');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (108, 10, 'Carirubana');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (109, 10, 'Colina');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (110, 10, 'Dabajuro');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (111, 10, 'Democracia');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (112, 10, 'Falcón');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (113, 10, 'Federación');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (114, 10, 'Jacura');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (115, 10, 'José Laurencio Silva');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (116, 10, 'Los Taques');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (117, 10, 'Mauroa');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (118, 10, 'Miranda');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (119, 10, 'Monseñor Iturriza');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (120, 10, 'Palmasola');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (121, 10, 'Petit');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (122, 10, 'Píritu');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (123, 10, 'San Francisco');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (124, 10, 'Sucre');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (125, 10, 'Tocópero');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (126, 10, 'Unión');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (127, 10, 'Urumaco');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (128, 10, 'Zamora');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (129, 11, 'Camaguán');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (130, 11, 'Chaguaramas');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (131, 11, 'El Socorro');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (132, 11, 'José Félix Ribas');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (133, 11, 'José Tadeo Monagas');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (134, 11, 'Juan Germán Roscio');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (135, 11, 'Julián Mellado');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (136, 11, 'Las Mercedes');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (137, 11, 'Leonardo Infante');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (138, 11, 'Pedro Zaraza');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (139, 11, 'Ortíz');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (140, 11, 'San Gerónimo de Guayabal');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (141, 11, 'San José de Guaribe');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (142, 11, 'Santa María de Ipire');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (143, 11, 'Sebastián Francisco de Miranda');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (144, 12, 'Andrés Eloy Blanco');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (145, 12, 'Crespo');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (146, 12, 'Iribarren');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (147, 12, 'Jiménez');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (148, 12, 'Morán');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (149, 12, 'Palavecino');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (150, 12, 'Simón Planas');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (151, 12, 'Torres');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (152, 12, 'Urdaneta');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (179, 13, 'Alberto Adriani');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (180, 13, 'Andrés Bello');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (181, 13, 'Antonio Pinto Salinas');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (182, 13, 'Aricagua');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (183, 13, 'Arzobispo Chacón');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (184, 13, 'Campo Elías');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (185, 13, 'Caracciolo Parra Olmedo');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (186, 13, 'Cardenal Quintero');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (187, 13, 'Guaraque');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (188, 13, 'Julio César Salas');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (189, 13, 'Justo Briceño');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (190, 13, 'Libertador');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (191, 13, 'Miranda');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (192, 13, 'Obispo Ramos de Lora');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (193, 13, 'Padre Noguera');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (194, 13, 'Pueblo Llano');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (195, 13, 'Rangel');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (196, 13, 'Rivas Dávila');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (197, 13, 'Santos Marquina');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (198, 13, 'Sucre');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (199, 13, 'Tovar');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (200, 13, 'Tulio Febres Cordero');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (201, 13, 'Zea');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (223, 14, 'Acevedo');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (224, 14, 'Andrés Bello');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (225, 14, 'Baruta');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (226, 14, 'Brión');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (227, 14, 'Buroz');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (228, 14, 'Carrizal');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (229, 14, 'Chacao');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (230, 14, 'Cristóbal Rojas');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (231, 14, 'El Hatillo');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (232, 14, 'Guaicaipuro');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (233, 14, 'Independencia');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (234, 14, 'Lander');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (235, 14, 'Los Salias');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (236, 14, 'Páez');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (237, 14, 'Paz Castillo');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (238, 14, 'Pedro Gual');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (239, 14, 'Plaza');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (240, 14, 'Simón Bolívar');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (241, 14, 'Sucre');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (242, 14, 'Urdaneta');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (243, 14, 'Zamora');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (258, 15, 'Acosta');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (259, 15, 'Aguasay');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (260, 15, 'Bolívar');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (261, 15, 'Caripe');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (262, 15, 'Cedeño');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (263, 15, 'Ezequiel Zamora');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (264, 15, 'Libertador');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (265, 15, 'Maturín');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (266, 15, 'Piar');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (267, 15, 'Punceres');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (268, 15, 'Santa Bárbara');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (269, 15, 'Sotillo');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (270, 15, 'Uracoa');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (271, 16, 'Antolín del Campo');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (272, 16, 'Arismendi');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (273, 16, 'García');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (274, 16, 'Gómez');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (275, 16, 'Maneiro');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (276, 16, 'Marcano');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (277, 16, 'Mariño');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (278, 16, 'Península de Macanao');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (279, 16, 'Tubores');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (280, 16, 'Villalba');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (281, 16, 'Díaz');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (282, 17, 'Agua Blanca');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (283, 17, 'Araure');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (284, 17, 'Esteller');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (285, 17, 'Guanare');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (286, 17, 'Guanarito');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (287, 17, 'Monseñor José Vicente de Unda');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (288, 17, 'Ospino');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (289, 17, 'Páez');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (290, 17, 'Papelón');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (291, 17, 'San Genaro de Boconoíto');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (292, 17, 'San Rafael de Onoto');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (293, 17, 'Santa Rosalía');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (294, 17, 'Sucre');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (295, 17, 'Turén');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (296, 18, 'Andrés Eloy Blanco');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (297, 18, 'Andrés Mata');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (298, 18, 'Arismendi');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (299, 18, 'Benítez');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (300, 18, 'Bermúdez');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (301, 18, 'Bolívar');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (302, 18, 'Cajigal');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (303, 18, 'Cruz Salmerón Acosta');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (304, 18, 'Libertador');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (305, 18, 'Mariño');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (306, 18, 'Mejía');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (307, 18, 'Montes');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (308, 18, 'Ribero');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (309, 18, 'Sucre');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (310, 18, 'Valdéz');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (341, 19, 'Andrés Bello');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (342, 19, 'Antonio Rómulo Costa');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (343, 19, 'Ayacucho');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (344, 19, 'Bolívar');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (345, 19, 'Cárdenas');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (346, 19, 'Córdoba');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (347, 19, 'Fernández Feo');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (348, 19, 'Francisco de Miranda');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (349, 19, 'García de Hevia');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (350, 19, 'Guásimos');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (351, 19, 'Independencia');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (352, 19, 'Jáuregui');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (353, 19, 'José María Vargas');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (354, 19, 'Junín');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (355, 19, 'Libertad');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (356, 19, 'Libertador');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (357, 19, 'Lobatera');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (358, 19, 'Michelena');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (359, 19, 'Panamericano');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (360, 19, 'Pedro María Ureña');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (361, 19, 'Rafael Urdaneta');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (362, 19, 'Samuel Darío Maldonado');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (363, 19, 'San Cristóbal');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (364, 19, 'Seboruco');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (365, 19, 'Simón Rodríguez');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (366, 19, 'Sucre');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (367, 19, 'Torbes');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (368, 19, 'Uribante');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (369, 19, 'San Judas Tadeo');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (370, 20, 'Andrés Bello');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (371, 20, 'Boconó');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (372, 20, 'Bolívar');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (373, 20, 'Candelaria');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (374, 20, 'Carache');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (375, 20, 'Escuque');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (376, 20, 'José Felipe Márquez Cañizalez');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (377, 20, 'Juan Vicente Campos Elías');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (378, 20, 'La Ceiba');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (379, 20, 'Miranda');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (380, 20, 'Monte Carmelo');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (381, 20, 'Motatán');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (382, 20, 'Pampán');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (383, 20, 'Pampanito');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (384, 20, 'Rafael Rangel');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (385, 20, 'San Rafael de Carvajal');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (386, 20, 'Sucre');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (387, 20, 'Trujillo');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (388, 20, 'Urdaneta');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (389, 20, 'Valera');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (390, 21, 'Vargas');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (391, 22, 'Arístides Bastidas');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (392, 22, 'Bolívar');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (407, 22, 'Bruzual');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (408, 22, 'Cocorote');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (409, 22, 'Independencia');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (410, 22, 'José Antonio Páez');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (411, 22, 'La Trinidad');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (412, 22, 'Manuel Monge');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (413, 22, 'Nirgua');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (414, 22, 'Peña');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (415, 22, 'San Felipe');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (416, 22, 'Sucre');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (417, 22, 'Urachiche');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (418, 22, 'José Joaquín Veroes');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (441, 23, 'Almirante Padilla');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (442, 23, 'Baralt');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (443, 23, 'Cabimas');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (444, 23, 'Catatumbo');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (445, 23, 'Colón');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (446, 23, 'Francisco Javier Pulgar');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (447, 23, 'Páez');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (448, 23, 'Jesús Enrique Losada');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (449, 23, 'Jesús María Semprún');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (450, 23, 'La Cañada de Urdaneta');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (451, 23, 'Lagunillas');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (452, 23, 'Machiques de Perijá');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (453, 23, 'Mara');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (454, 23, 'Maracaibo');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (455, 23, 'Miranda');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (456, 23, 'Rosario de Perijá');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (457, 23, 'San Francisco');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (458, 23, 'Santa Rita');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (459, 23, 'Simón Bolívar');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (460, 23, 'Sucre');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (461, 23, 'Valmore Rodríguez');
INSERT INTO tb_municipio (id_municipio, id_estado, nombre) VALUES (462, 24, 'Libertador');


--
-- TOC entry 2281 (class 0 OID 0)
-- Dependencies: 182
-- Name: tb_municipio_id_municipio_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tb_municipio_id_municipio_seq', 1, false);


--
-- TOC entry 2189 (class 0 OID 16457)
-- Dependencies: 183 2228
-- Data for Name: tb_parroquia; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1, 1, 'Alto Orinoco');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (2, 1, 'Huachamacare Acanaña');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (3, 1, 'Marawaka Toky Shamanaña');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (4, 1, 'Mavaka Mavaka');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (5, 1, 'Sierra Parima Parimabé');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (6, 2, 'Ucata Laja Lisa');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (7, 2, 'Yapacana Macuruco');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (8, 2, 'Caname Guarinuma');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (9, 3, 'Fernando Girón Tovar');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (10, 3, 'Luis Alberto Gómez');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (11, 3, 'Pahueña Limón de Parhueña');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (12, 3, 'Platanillal Platanillal');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (13, 4, 'Samariapo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (14, 4, 'Sipapo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (15, 4, 'Munduapo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (16, 4, 'Guayapo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (17, 5, 'Alto Ventuari');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (18, 5, 'Medio Ventuari');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (19, 5, 'Bajo Ventuari');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (20, 6, 'Victorino');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (21, 6, 'Comunidad');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (22, 7, 'Casiquiare');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (23, 7, 'Cocuy');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (24, 7, 'San Carlos de Río Negro');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (25, 7, 'Solano');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (26, 8, 'Anaco');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (27, 8, 'San Joaquín');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (28, 9, 'Cachipo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (29, 9, 'Aragua de Barcelona');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (30, 11, 'Lechería');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (31, 11, 'El Morro');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (32, 12, 'Puerto Píritu');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (33, 12, 'San Miguel');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (34, 12, 'Sucre');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (35, 13, 'Valle de Guanape');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (36, 13, 'Santa Bárbara');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (37, 14, 'El Chaparro');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (38, 14, 'Tomás Alfaro');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (39, 14, 'Calatrava');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (40, 15, 'Guanta');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (41, 15, 'Chorrerón');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (42, 16, 'Mamo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (43, 16, 'Soledad');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (44, 17, 'Mapire');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (45, 17, 'Piar');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (46, 17, 'Santa Clara');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (47, 17, 'San Diego de Cabrutica');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (48, 17, 'Uverito');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (49, 17, 'Zuata');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (50, 18, 'Puerto La Cruz');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (51, 18, 'Pozuelos');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (52, 19, 'Onoto');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (53, 19, 'San Pablo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (54, 20, 'San Mateo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (55, 20, 'El Carito');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (56, 20, 'Santa Inés');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (57, 20, 'La Romereña');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (58, 21, 'Atapirire');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (59, 21, 'Boca del Pao');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (60, 21, 'El Pao');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (61, 21, 'Pariaguán');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (62, 22, 'Cantaura');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (63, 22, 'Libertador');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (64, 22, 'Santa Rosa');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (65, 22, 'Urica');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (66, 23, 'Píritu');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (67, 23, 'San Francisco');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (68, 24, 'San José de Guanipa');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (69, 25, 'Boca de Uchire');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (70, 25, 'Boca de Chávez');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (71, 26, 'Pueblo Nuevo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (72, 26, 'Santa Ana');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (73, 27, 'Bergatín');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (74, 27, 'Caigua');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (75, 27, 'El Carmen');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (76, 27, 'El Pilar');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (77, 27, 'Naricual');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (78, 27, 'San Crsitóbal');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (79, 28, 'Edmundo Barrios');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (80, 28, 'Miguel Otero Silva');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (81, 29, 'Achaguas');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (82, 29, 'Apurito');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (83, 29, 'El Yagual');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (84, 29, 'Guachara');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (85, 29, 'Mucuritas');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (86, 29, 'Queseras del medio');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (87, 30, 'Biruaca');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (88, 31, 'Bruzual');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (89, 31, 'Mantecal');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (90, 31, 'Quintero');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (91, 31, 'Rincón Hondo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (92, 31, 'San Vicente');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (93, 32, 'Guasdualito');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (94, 32, 'Aramendi');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (95, 32, 'El Amparo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (96, 32, 'San Camilo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (97, 32, 'Urdaneta');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (98, 33, 'San Juan de Payara');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (99, 33, 'Codazzi');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (100, 33, 'Cunaviche');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (101, 34, 'Elorza');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (102, 34, 'La Trinidad');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (103, 35, 'San Fernando');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (104, 35, 'El Recreo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (105, 35, 'Peñalver');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (106, 35, 'San Rafael de Atamaica');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (107, 36, 'Pedro José Ovalles');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (108, 36, 'Joaquín Crespo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (109, 36, 'José Casanova Godoy');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (110, 36, 'Madre María de San José');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (111, 36, 'Andrés Eloy Blanco');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (112, 36, 'Los Tacarigua');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (113, 36, 'Las Delicias');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (114, 36, 'Choroní');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (115, 37, 'Bolívar');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (116, 38, 'Camatagua');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (117, 38, 'Carmen de Cura');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (118, 39, 'Santa Rita');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (119, 39, 'Francisco de Miranda');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (120, 39, 'Moseñor Feliciano González');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (121, 40, 'Santa Cruz');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (122, 41, 'José Félix Ribas');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (123, 41, 'Castor Nieves Ríos');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (124, 41, 'Las Guacamayas');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (125, 41, 'Pao de Zárate');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (126, 41, 'Zuata');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (127, 42, 'José Rafael Revenga');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (128, 43, 'Palo Negro');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (129, 43, 'San Martín de Porres');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (130, 44, 'El Limón');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (131, 44, 'Caña de Azúcar');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (132, 45, 'Ocumare de la Costa');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (133, 46, 'San Casimiro');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (134, 46, 'Güiripa');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (135, 46, 'Ollas de Caramacate');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (136, 46, 'Valle Morín');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (137, 47, 'San Sebastían');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (138, 48, 'Turmero');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (139, 48, 'Arevalo Aponte');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (140, 48, 'Chuao');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (141, 48, 'Samán de Güere');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (142, 48, 'Alfredo Pacheco Miranda');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (143, 49, 'Santos Michelena');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (144, 49, 'Tiara');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (145, 50, 'Cagua');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (146, 50, 'Bella Vista');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (147, 51, 'Tovar');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (148, 52, 'Urdaneta');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (149, 52, 'Las Peñitas');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (150, 52, 'San Francisco de Cara');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (151, 52, 'Taguay');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (152, 53, 'Zamora');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (153, 53, 'Magdaleno');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (154, 53, 'San Francisco de Asís');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (155, 53, 'Valles de Tucutunemo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (156, 53, 'Augusto Mijares');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (157, 54, 'Sabaneta');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (158, 54, 'Juan Antonio Rodríguez Domínguez');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (159, 55, 'El Cantón');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (160, 55, 'Santa Cruz de Guacas');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (161, 55, 'Puerto Vivas');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (162, 56, 'Ticoporo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (163, 56, 'Nicolás Pulido');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (164, 56, 'Andrés Bello');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (165, 57, 'Arismendi');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (166, 57, 'Guadarrama');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (167, 57, 'La Unión');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (168, 57, 'San Antonio');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (169, 58, 'Barinas');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (170, 58, 'Alberto Arvelo Larriva');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (171, 58, 'San Silvestre');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (172, 58, 'Santa Inés');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (173, 58, 'Santa Lucía');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (174, 58, 'Torumos');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (175, 58, 'El Carmen');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (176, 58, 'Rómulo Betancourt');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (177, 58, 'Corazón de Jesús');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (178, 58, 'Ramón Ignacio Méndez');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (179, 58, 'Alto Barinas');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (180, 58, 'Manuel Palacio Fajardo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (181, 58, 'Juan Antonio Rodríguez Domínguez');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (182, 58, 'Dominga Ortiz de Páez');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (183, 59, 'Barinitas');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (184, 59, 'Altamira de Cáceres');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (185, 59, 'Calderas');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (186, 60, 'Barrancas');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (187, 60, 'El Socorro');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (188, 60, 'Mazparrito');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (189, 61, 'Santa Bárbara');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (190, 61, 'Pedro Briceño Méndez');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (191, 61, 'Ramón Ignacio Méndez');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (192, 61, 'José Ignacio del Pumar');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (193, 62, 'Obispos');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (194, 62, 'Guasimitos');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (195, 62, 'El Real');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (196, 62, 'La Luz');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (197, 63, 'Ciudad Bolívia');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (198, 63, 'José Ignacio Briceño');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (199, 63, 'José Félix Ribas');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (200, 63, 'Páez');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (201, 64, 'Libertad');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (202, 64, 'Dolores');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (203, 64, 'Santa Rosa');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (204, 64, 'Palacio Fajardo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (205, 65, 'Ciudad de Nutrias');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (206, 65, 'El Regalo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (207, 65, 'Puerto Nutrias');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (208, 65, 'Santa Catalina');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (209, 66, 'Cachamay');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (210, 66, 'Chirica');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (211, 66, 'Dalla Costa');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (212, 66, 'Once de Abril');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (213, 66, 'Simón Bolívar');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (214, 66, 'Unare');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (215, 66, 'Universidad');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (216, 66, 'Vista al Sol');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (217, 66, 'Pozo Verde');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (218, 66, 'Yocoima');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (219, 66, '5 de Julio');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (220, 67, 'Cedeño');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (221, 67, 'Altagracia');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (222, 67, 'Ascensión Farreras');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (223, 67, 'Guaniamo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (224, 67, 'La Urbana');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (225, 67, 'Pijiguaos');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (226, 68, 'El Callao');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (227, 69, 'Gran Sabana');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (228, 69, 'Ikabarú');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (229, 70, 'Catedral');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (230, 70, 'Zea');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (231, 70, 'Orinoco');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (232, 70, 'José Antonio Páez');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (233, 70, 'Marhuanta');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (234, 70, 'Agua Salada');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (235, 70, 'Vista Hermosa');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (236, 70, 'La Sabanita');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (237, 70, 'Panapana');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (238, 71, 'Andrés Eloy Blanco');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (239, 71, 'Pedro Cova');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (240, 72, 'Raúl Leoni');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (241, 72, 'Barceloneta');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (242, 72, 'Santa Bárbara');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (243, 72, 'San Francisco');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (244, 73, 'Roscio');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (245, 73, 'Salóm');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (246, 74, 'Sifontes');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (247, 74, 'Dalla Costa');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (248, 74, 'San Isidro');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (249, 75, 'Sucre');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (250, 75, 'Aripao');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (251, 75, 'Guarataro');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (252, 75, 'Las Majadas');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (253, 75, 'Moitaco');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (254, 76, 'Padre Pedro Chien');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (255, 76, 'Río Grande');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (256, 77, 'Bejuma');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (257, 77, 'Canoabo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (258, 77, 'Simón Bolívar');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (259, 78, 'Güigüe');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (260, 78, 'Carabobo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (261, 78, 'Tacarigua');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (262, 79, 'Mariara');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (263, 79, 'Aguas Calientes');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (264, 80, 'Ciudad Alianza');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (265, 80, 'Guacara');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (266, 80, 'Yagua');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (267, 81, 'Morón');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (268, 81, 'Yagua');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (269, 82, 'Tocuyito');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (270, 82, 'Independencia');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (271, 83, 'Los Guayos');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (272, 84, 'Miranda');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (273, 85, 'Montalbán');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (274, 86, 'Naguanagua');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (275, 87, 'Bartolomé Salóm');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (276, 87, 'Democracia');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (277, 87, 'Fraternidad');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (278, 87, 'Goaigoaza');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (279, 87, 'Juan José Flores');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (280, 87, 'Unión');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (281, 87, 'Borburata');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (282, 87, 'Patanemo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (283, 88, 'San Diego');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (284, 89, 'San Joaquín');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (285, 90, 'Candelaria');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (286, 90, 'Catedral');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (287, 90, 'El Socorro');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (288, 90, 'Miguel Peña');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (289, 90, 'Rafael Urdaneta');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (290, 90, 'San Blas');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (291, 90, 'San José');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (292, 90, 'Santa Rosa');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (293, 90, 'Negro Primero');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (294, 91, 'Cojedes');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (295, 91, 'Juan de Mata Suárez');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (296, 92, 'Tinaquillo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (297, 93, 'El Baúl');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (298, 93, 'Sucre');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (299, 94, 'La Aguadita');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (300, 94, 'Macapo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (301, 95, 'El Pao');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (302, 96, 'El Amparo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (303, 96, 'Libertad de Cojedes');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (304, 97, 'Rómulo Gallegos');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (305, 98, 'San Carlos de Austria');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (306, 98, 'Juan Ángel Bravo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (307, 98, 'Manuel Manrique');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (308, 99, 'General en Jefe José Laurencio Silva');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (309, 100, 'Curiapo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (310, 100, 'Almirante Luis Brión');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (311, 100, 'Francisco Aniceto Lugo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (312, 100, 'Manuel Renaud');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (313, 100, 'Padre Barral');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (314, 100, 'Santos de Abelgas');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (315, 101, 'Imataca');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (316, 101, 'Cinco de Julio');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (317, 101, 'Juan Bautista Arismendi');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (318, 101, 'Manuel Piar');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (319, 101, 'Rómulo Gallegos');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (320, 102, 'Pedernales');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (321, 102, 'Luis Beltrán Prieto Figueroa');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (322, 103, 'San José (Delta Amacuro)');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (323, 103, 'José Vidal Marcano');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (324, 103, 'Juan Millán');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (325, 103, 'Leonardo Ruíz Pineda');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (326, 103, 'Mariscal Antonio José de Sucre');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (327, 103, 'Monseñor Argimiro García');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (328, 103, 'San Rafael (Delta Amacuro)');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (329, 103, 'Virgen del Valle');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (330, 10, 'Clarines');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (331, 10, 'Guanape');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (332, 10, 'Sabana de Uchire');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (333, 104, 'Capadare');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (334, 104, 'La Pastora');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (335, 104, 'Libertador');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (336, 104, 'San Juan de los Cayos');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (337, 105, 'Aracua');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (338, 105, 'La Peña');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (339, 105, 'San Luis');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (340, 106, 'Bariro');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (341, 106, 'Borojó');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (342, 106, 'Capatárida');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (343, 106, 'Guajiro');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (344, 106, 'Seque');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (345, 106, 'Zazárida');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (346, 106, 'Valle de Eroa');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (347, 107, 'Cacique Manaure');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (348, 108, 'Norte');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (349, 108, 'Carirubana');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (350, 108, 'Santa Ana');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (351, 108, 'Urbana Punta Cardón');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (352, 109, 'La Vela de Coro');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (353, 109, 'Acurigua');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (354, 109, 'Guaibacoa');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (355, 109, 'Las Calderas');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (356, 109, 'Macoruca');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (357, 110, 'Dabajuro');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (358, 111, 'Agua Clara');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (359, 111, 'Avaria');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (360, 111, 'Pedregal');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (361, 111, 'Piedra Grande');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (362, 111, 'Purureche');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (363, 112, 'Adaure');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (364, 112, 'Adícora');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (365, 112, 'Baraived');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (366, 112, 'Buena Vista');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (367, 112, 'Jadacaquiva');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (368, 112, 'El Vínculo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (369, 112, 'El Hato');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (370, 112, 'Moruy');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (371, 112, 'Pueblo Nuevo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (372, 113, 'Agua Larga');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (373, 113, 'El Paují');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (374, 113, 'Independencia');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (375, 113, 'Mapararí');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (376, 114, 'Agua Linda');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (377, 114, 'Araurima');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (378, 114, 'Jacura');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (379, 115, 'Tucacas');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (380, 115, 'Boca de Aroa');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (381, 116, 'Los Taques');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (382, 116, 'Judibana');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (383, 117, 'Mene de Mauroa');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (384, 117, 'San Félix');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (385, 117, 'Casigua');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (386, 118, 'Guzmán Guillermo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (387, 118, 'Mitare');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (388, 118, 'Río Seco');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (389, 118, 'Sabaneta');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (390, 118, 'San Antonio');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (391, 118, 'San Gabriel');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (392, 118, 'Santa Ana');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (393, 119, 'Boca del Tocuyo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (394, 119, 'Chichiriviche');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (395, 119, 'Tocuyo de la Costa');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (396, 120, 'Palmasola');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (397, 121, 'Cabure');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (398, 121, 'Colina');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (399, 121, 'Curimagua');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (400, 122, 'San José de la Costa');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (401, 122, 'Píritu');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (402, 123, 'San Francisco');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (403, 124, 'Sucre');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (404, 124, 'Pecaya');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (405, 125, 'Tocópero');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (406, 126, 'El Charal');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (407, 126, 'Las Vegas del Tuy');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (408, 126, 'Santa Cruz de Bucaral');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (409, 127, 'Bruzual');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (410, 127, 'Urumaco');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (411, 128, 'Puerto Cumarebo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (412, 128, 'La Ciénaga');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (413, 128, 'La Soledad');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (414, 128, 'Pueblo Cumarebo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (415, 128, 'Zazárida');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (416, 113, 'Churuguara');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (417, 129, 'Camaguán');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (418, 129, 'Puerto Miranda');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (419, 129, 'Uverito');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (420, 130, 'Chaguaramas');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (421, 131, 'El Socorro');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (422, 132, 'Tucupido');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (423, 132, 'San Rafael de Laya');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (424, 133, 'Altagracia de Orituco');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (425, 133, 'San Rafael de Orituco');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (426, 133, 'San Francisco Javier de Lezama');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (427, 133, 'Paso Real de Macaira');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (428, 133, 'Carlos Soublette');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (429, 133, 'San Francisco de Macaira');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (430, 133, 'Libertad de Orituco');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (431, 134, 'Cantaclaro');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (432, 134, 'San Juan de los Morros');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (433, 134, 'Parapara');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (434, 135, 'El Sombrero');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (435, 135, 'Sosa');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (436, 136, 'Las Mercedes');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (437, 136, 'Cabruta');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (438, 136, 'Santa Rita de Manapire');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (439, 137, 'Valle de la Pascua');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (440, 137, 'Espino');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (441, 138, 'San José de Unare');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (442, 138, 'Zaraza');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (443, 139, 'San José de Tiznados');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (444, 139, 'San Francisco de Tiznados');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (445, 139, 'San Lorenzo de Tiznados');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (446, 139, 'Ortiz');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (447, 140, 'Guayabal');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (448, 140, 'Cazorla');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (449, 141, 'San José de Guaribe');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (450, 141, 'Uveral');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (451, 142, 'Santa María de Ipire');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (452, 142, 'Altamira');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (453, 143, 'El Calvario');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (454, 143, 'El Rastro');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (455, 143, 'Guardatinajas');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (456, 143, 'Capital Urbana Calabozo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (457, 144, 'Quebrada Honda de Guache');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (458, 144, 'Pío Tamayo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (459, 144, 'Yacambú');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (460, 145, 'Fréitez');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (461, 145, 'José María Blanco');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (462, 146, 'Catedral');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (463, 146, 'Concepción');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (464, 146, 'El Cují');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (465, 146, 'Juan de Villegas');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (466, 146, 'Santa Rosa');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (467, 146, 'Tamaca');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (468, 146, 'Unión');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (469, 146, 'Aguedo Felipe Alvarado');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (470, 146, 'Buena Vista');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (471, 146, 'Juárez');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (472, 147, 'Juan Bautista Rodríguez');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (473, 147, 'Cuara');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (474, 147, 'Diego de Lozada');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (475, 147, 'Paraíso de San José');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (476, 147, 'San Miguel');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (477, 147, 'Tintorero');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (478, 147, 'José Bernardo Dorante');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (479, 147, 'Coronel Mariano Peraza ');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (480, 148, 'Bolívar');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (481, 148, 'Anzoátegui');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (482, 148, 'Guarico');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (483, 148, 'Hilario Luna y Luna');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (484, 148, 'Humocaro Alto');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (485, 148, 'Humocaro Bajo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (486, 148, 'La Candelaria');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (487, 148, 'Morán');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (488, 149, 'Cabudare');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (489, 149, 'José Gregorio Bastidas');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (490, 149, 'Agua Viva');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (491, 150, 'Sarare');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (492, 150, 'Buría');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (493, 150, 'Gustavo Vegas León');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (494, 151, 'Trinidad Samuel');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (495, 151, 'Antonio Díaz');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (496, 151, 'Camacaro');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (497, 151, 'Castañeda');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (498, 151, 'Cecilio Zubillaga');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (499, 151, 'Chiquinquirá');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (500, 151, 'El Blanco');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (501, 151, 'Espinoza de los Monteros');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (502, 151, 'Lara');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (503, 151, 'Las Mercedes');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (504, 151, 'Manuel Morillo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (505, 151, 'Montaña Verde');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (506, 151, 'Montes de Oca');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (507, 151, 'Torres');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (508, 151, 'Heriberto Arroyo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (509, 151, 'Reyes Vargas');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (510, 151, 'Altagracia');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (511, 152, 'Siquisique');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (512, 152, 'Moroturo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (513, 152, 'San Miguel');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (514, 152, 'Xaguas');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (515, 179, 'Presidente Betancourt');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (516, 179, 'Presidente Páez');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (517, 179, 'Presidente Rómulo Gallegos');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (518, 179, 'Gabriel Picón González');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (519, 179, 'Héctor Amable Mora');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (520, 179, 'José Nucete Sardi');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (521, 179, 'Pulido Méndez');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (522, 180, 'La Azulita');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (523, 181, 'Santa Cruz de Mora');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (524, 181, 'Mesa Bolívar');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (525, 181, 'Mesa de Las Palmas');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (526, 182, 'Aricagua');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (527, 182, 'San Antonio');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (528, 183, 'Canagua');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (529, 183, 'Capurí');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (530, 183, 'Chacantá');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (531, 183, 'El Molino');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (532, 183, 'Guaimaral');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (533, 183, 'Mucutuy');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (534, 183, 'Mucuchachí');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (535, 184, 'Fernández Peña');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (536, 184, 'Matriz');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (537, 184, 'Montalbán');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (538, 184, 'Acequias');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (539, 184, 'Jají');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (540, 184, 'La Mesa');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (541, 184, 'San José del Sur');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (542, 185, 'Tucaní');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (543, 185, 'Florencio Ramírez');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (544, 186, 'Santo Domingo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (545, 186, 'Las Piedras');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (546, 187, 'Guaraque');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (547, 187, 'Mesa de Quintero');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (548, 187, 'Río Negro');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (549, 188, 'Arapuey');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (550, 188, 'Palmira');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (551, 189, 'San Cristóbal de Torondoy');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (552, 189, 'Torondoy');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (553, 190, 'Antonio Spinetti Dini');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (554, 190, 'Arias');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (555, 190, 'Caracciolo Parra Pérez');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (556, 190, 'Domingo Peña');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (557, 190, 'El Llano');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (558, 190, 'Gonzalo Picón Febres');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (559, 190, 'Jacinto Plaza');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (560, 190, 'Juan Rodríguez Suárez');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (561, 190, 'Lasso de la Vega');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (562, 190, 'Mariano Picón Salas');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (563, 190, 'Milla');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (564, 190, 'Osuna Rodríguez');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (565, 190, 'Sagrario');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (566, 190, 'El Morro');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (567, 190, 'Los Nevados');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (568, 191, 'Andrés Eloy Blanco');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (569, 191, 'La Venta');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (570, 191, 'Piñango');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (571, 191, 'Timotes');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (572, 192, 'Eloy Paredes');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (573, 192, 'San Rafael de Alcázar');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (574, 192, 'Santa Elena de Arenales');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (575, 193, 'Santa María de Caparo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (576, 194, 'Pueblo Llano');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (577, 195, 'Cacute');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (578, 195, 'La Toma');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (579, 195, 'Mucuchíes');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (580, 195, 'Mucurubá');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (581, 195, 'San Rafael');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (582, 196, 'Gerónimo Maldonado');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (583, 196, 'Bailadores');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (584, 197, 'Tabay');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (585, 198, 'Chiguará');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (586, 198, 'Estánquez');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (587, 198, 'Lagunillas');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (588, 198, 'La Trampa');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (589, 198, 'Pueblo Nuevo del Sur');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (590, 198, 'San Juan');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (591, 199, 'El Amparo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (592, 199, 'El Llano');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (593, 199, 'San Francisco');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (594, 199, 'Tovar');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (595, 200, 'Independencia');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (596, 200, 'María de la Concepción Palacios Blanco');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (597, 200, 'Nueva Bolivia');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (598, 200, 'Santa Apolonia');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (599, 201, 'Caño El Tigre');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (600, 201, 'Zea');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (601, 223, 'Aragüita');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (602, 223, 'Arévalo González');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (603, 223, 'Capaya');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (604, 223, 'Caucagua');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (605, 223, 'Panaquire');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (606, 223, 'Ribas');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (607, 223, 'El Café');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (608, 223, 'Marizapa');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (609, 224, 'Cumbo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (610, 224, 'San José de Barlovento');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (611, 225, 'El Cafetal');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (612, 225, 'Las Minas');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (613, 225, 'Nuestra Señora del Rosario');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (614, 226, 'Higuerote');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (615, 226, 'Curiepe');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (616, 226, 'Tacarigua de Brión');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (617, 227, 'Mamporal');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (618, 228, 'Carrizal');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (619, 229, 'Chacao');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (620, 230, 'Charallave');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (621, 230, 'Las Brisas');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (622, 231, 'El Hatillo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (623, 232, 'Altagracia de la Montaña');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (624, 232, 'Cecilio Acosta');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (625, 232, 'Los Teques');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (626, 232, 'El Jarillo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (627, 232, 'San Pedro');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (628, 232, 'Tácata');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (629, 232, 'Paracotos');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (630, 233, 'Cartanal');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (631, 233, 'Santa Teresa del Tuy');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (632, 234, 'La Democracia');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (633, 234, 'Ocumare del Tuy');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (634, 234, 'Santa Bárbara');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (635, 235, 'San Antonio de los Altos');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (636, 236, 'Río Chico');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (637, 236, 'El Guapo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (638, 236, 'Tacarigua de la Laguna');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (639, 236, 'Paparo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (640, 236, 'San Fernando del Guapo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (641, 237, 'Santa Lucía del Tuy');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (642, 238, 'Cúpira');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (643, 238, 'Machurucuto');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (644, 239, 'Guarenas');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (645, 240, 'San Antonio de Yare');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (646, 240, 'San Francisco de Yare');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (647, 241, 'Leoncio Martínez');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (648, 241, 'Petare');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (649, 241, 'Caucagüita');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (650, 241, 'Filas de Mariche');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (651, 241, 'La Dolorita');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (652, 242, 'Cúa');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (653, 242, 'Nueva Cúa');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (654, 243, 'Guatire');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (655, 243, 'Bolívar');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (656, 258, 'San Antonio de Maturín');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (657, 258, 'San Francisco de Maturín');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (658, 259, 'Aguasay');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (659, 260, 'Caripito');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (660, 261, 'El Guácharo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (661, 261, 'La Guanota');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (662, 261, 'Sabana de Piedra');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (663, 261, 'San Agustín');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (664, 261, 'Teresen');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (665, 261, 'Caripe');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (666, 262, 'Areo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (667, 262, 'Capital Cedeño');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (668, 262, 'San Félix de Cantalicio');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (669, 262, 'Viento Fresco');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (670, 263, 'El Tejero');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (671, 263, 'Punta de Mata');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (672, 264, 'Chaguaramas');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (673, 264, 'Las Alhuacas');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (674, 264, 'Tabasca');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (675, 264, 'Temblador');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (676, 265, 'Alto de los Godos');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (677, 265, 'Boquerón');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (678, 265, 'Las Cocuizas');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (679, 265, 'La Cruz');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (680, 265, 'San Simón');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (681, 265, 'El Corozo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (682, 265, 'El Furrial');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (683, 265, 'Jusepín');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (684, 265, 'La Pica');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (685, 265, 'San Vicente');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (686, 266, 'Aparicio');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (687, 266, 'Aragua de Maturín');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (688, 266, 'Chaguamal');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (689, 266, 'El Pinto');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (690, 266, 'Guanaguana');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (691, 266, 'La Toscana');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (692, 266, 'Taguaya');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (693, 267, 'Cachipo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (694, 267, 'Quiriquire');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (695, 268, 'Santa Bárbara');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (696, 269, 'Barrancas');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (697, 269, 'Los Barrancos de Fajardo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (698, 270, 'Uracoa');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (699, 271, 'Antolín del Campo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (700, 272, 'Arismendi');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (701, 273, 'García');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (702, 273, 'Francisco Fajardo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (703, 274, 'Bolívar');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (704, 274, 'Guevara');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (705, 274, 'Matasiete');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (706, 274, 'Santa Ana');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (707, 274, 'Sucre');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (708, 275, 'Aguirre');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (709, 275, 'Maneiro');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (710, 276, 'Adrián');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (711, 276, 'Juan Griego');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (712, 276, 'Yaguaraparo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (713, 277, 'Porlamar');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (714, 278, 'San Francisco de Macanao');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (715, 278, 'Boca de Río');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (716, 279, 'Tubores');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (717, 279, 'Los Baleales');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (718, 280, 'Vicente Fuentes');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (719, 280, 'Villalba');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (720, 281, 'San Juan Bautista');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (721, 281, 'Zabala');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (722, 283, 'Capital Araure');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (723, 283, 'Río Acarigua');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (724, 284, 'Capital Esteller');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (725, 284, 'Uveral');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (726, 285, 'Guanare');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (727, 285, 'Córdoba');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (728, 285, 'San José de la Montaña');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (729, 285, 'San Juan de Guanaguanare');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (730, 285, 'Virgen de la Coromoto');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (731, 286, 'Guanarito');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (732, 286, 'Trinidad de la Capilla');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (733, 286, 'Divina Pastora');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (734, 287, 'Monseñor José Vicente de Unda');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (735, 287, 'Peña Blanca');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (736, 288, 'Capital Ospino');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (737, 288, 'Aparición');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (738, 288, 'La Estación');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (739, 289, 'Páez');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (740, 289, 'Payara');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (741, 289, 'Pimpinela');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (742, 289, 'Ramón Peraza');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (743, 290, 'Papelón');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (744, 290, 'Caño Delgadito');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (745, 291, 'San Genaro de Boconoito');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (746, 291, 'Antolín Tovar');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (747, 292, 'San Rafael de Onoto');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (748, 292, 'Santa Fe');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (749, 292, 'Thermo Morles');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (750, 293, 'Santa Rosalía');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (751, 293, 'Florida');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (752, 294, 'Sucre');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (753, 294, 'Concepción');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (754, 294, 'San Rafael de Palo Alzado');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (755, 294, 'Uvencio Antonio Velásquez');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (756, 294, 'San José de Saguaz');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (757, 294, 'Villa Rosa');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (758, 295, 'Turén');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (759, 295, 'Canelones');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (760, 295, 'Santa Cruz');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (761, 295, 'San Isidro Labrador');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (762, 296, 'Mariño');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (763, 296, 'Rómulo Gallegos');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (764, 297, 'San José de Aerocuar');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (765, 297, 'Tavera Acosta');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (766, 298, 'Río Caribe');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (767, 298, 'Antonio José de Sucre');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (768, 298, 'El Morro de Puerto Santo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (769, 298, 'Puerto Santo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (770, 298, 'San Juan de las Galdonas');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (771, 299, 'El Pilar');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (772, 299, 'El Rincón');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (773, 299, 'General Francisco Antonio Váquez');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (774, 299, 'Guaraúnos');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (775, 299, 'Tunapuicito');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (776, 299, 'Unión');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (777, 300, 'Santa Catalina');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (778, 300, 'Santa Rosa');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (779, 300, 'Santa Teresa');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (780, 300, 'Bolívar');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (781, 300, 'Maracapana');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (782, 302, 'Libertad');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (783, 302, 'El Paujil');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (784, 302, 'Yaguaraparo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (785, 303, 'Cruz Salmerón Acosta');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (786, 303, 'Chacopata');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (787, 303, 'Manicuare');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (788, 304, 'Tunapuy');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (789, 304, 'Campo Elías');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (790, 305, 'Irapa');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (791, 305, 'Campo Claro');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (792, 305, 'Maraval');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (793, 305, 'San Antonio de Irapa');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (794, 305, 'Soro');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (795, 306, 'Mejía');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (796, 307, 'Cumanacoa');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (797, 307, 'Arenas');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (798, 307, 'Aricagua');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (799, 307, 'Cogollar');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (800, 307, 'San Fernando');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (801, 307, 'San Lorenzo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (802, 308, 'Villa Frontado (Muelle de Cariaco)');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (803, 308, 'Catuaro');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (804, 308, 'Rendón');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (805, 308, 'San Cruz');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (806, 308, 'Santa María');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (807, 309, 'Altagracia');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (808, 309, 'Santa Inés');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (809, 309, 'Valentín Valiente');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (810, 309, 'Ayacucho');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (811, 309, 'San Juan');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (812, 309, 'Raúl Leoni');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (813, 309, 'Gran Mariscal');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (814, 310, 'Cristóbal Colón');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (815, 310, 'Bideau');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (816, 310, 'Punta de Piedras');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (817, 310, 'Güiria');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (818, 341, 'Andrés Bello');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (819, 342, 'Antonio Rómulo Costa');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (820, 343, 'Ayacucho');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (821, 343, 'Rivas Berti');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (822, 343, 'San Pedro del Río');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (823, 344, 'Bolívar');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (824, 344, 'Palotal');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (825, 344, 'General Juan Vicente Gómez');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (826, 344, 'Isaías Medina Angarita');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (827, 345, 'Cárdenas');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (828, 345, 'Amenodoro Ángel Lamus');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (829, 345, 'La Florida');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (830, 346, 'Córdoba');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (831, 347, 'Fernández Feo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (832, 347, 'Alberto Adriani');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (833, 347, 'Santo Domingo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (834, 348, 'Francisco de Miranda');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (835, 349, 'García de Hevia');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (836, 349, 'Boca de Grita');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (837, 349, 'José Antonio Páez');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (838, 350, 'Guásimos');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (839, 351, 'Independencia');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (840, 351, 'Juan Germán Roscio');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (841, 351, 'Román Cárdenas');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (842, 352, 'Jáuregui');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (843, 352, 'Emilio Constantino Guerrero');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (844, 352, 'Monseñor Miguel Antonio Salas');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (845, 353, 'José María Vargas');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (846, 354, 'Junín');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (847, 354, 'La Petrólea');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (848, 354, 'Quinimarí');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (849, 354, 'Bramón');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (850, 355, 'Libertad');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (851, 355, 'Cipriano Castro');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (852, 355, 'Manuel Felipe Rugeles');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (853, 356, 'Libertador');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (854, 356, 'Doradas');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (855, 356, 'Emeterio Ochoa');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (856, 356, 'San Joaquín de Navay');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (857, 357, 'Lobatera');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (858, 357, 'Constitución');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (859, 358, 'Michelena');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (860, 359, 'Panamericano');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (861, 359, 'La Palmita');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (862, 360, 'Pedro María Ureña');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (863, 360, 'Nueva Arcadia');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (864, 361, 'Delicias');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (865, 361, 'Pecaya');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (866, 362, 'Samuel Darío Maldonado');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (867, 362, 'Boconó');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (868, 362, 'Hernández');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (869, 363, 'La Concordia');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (870, 363, 'San Juan Bautista');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (871, 363, 'Pedro María Morantes');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (872, 363, 'San Sebastián');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (873, 363, 'Dr. Francisco Romero Lobo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (874, 364, 'Seboruco');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (875, 365, 'Simón Rodríguez');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (876, 366, 'Sucre');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (877, 366, 'Eleazar López Contreras');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (878, 366, 'San Pablo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (879, 367, 'Torbes');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (880, 368, 'Uribante');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (881, 368, 'Cárdenas');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (882, 368, 'Juan Pablo Peñalosa');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (883, 368, 'Potosí');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (884, 369, 'San Judas Tadeo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (885, 370, 'Araguaney');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (886, 370, 'El Jaguito');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (887, 370, 'La Esperanza');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (888, 370, 'Santa Isabel');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (889, 371, 'Boconó');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (890, 371, 'El Carmen');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (891, 371, 'Mosquey');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (892, 371, 'Ayacucho');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (893, 371, 'Burbusay');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (894, 371, 'General Ribas');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (895, 371, 'Guaramacal');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (896, 371, 'Vega de Guaramacal');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (897, 371, 'Monseñor Jáuregui');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (898, 371, 'Rafael Rangel');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (899, 371, 'San Miguel');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (900, 371, 'San José');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (901, 372, 'Sabana Grande');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (902, 372, 'Cheregüé');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (903, 372, 'Granados');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (904, 373, 'Arnoldo Gabaldón');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (905, 373, 'Bolivia');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (906, 373, 'Carrillo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (907, 373, 'Cegarra');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (908, 373, 'Chejendé');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (909, 373, 'Manuel Salvador Ulloa');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (910, 373, 'San José');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (911, 374, 'Carache');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (912, 374, 'La Concepción');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (913, 374, 'Cuicas');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (914, 374, 'Panamericana');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (915, 374, 'Santa Cruz');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (916, 375, 'Escuque');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (917, 375, 'La Unión');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (918, 375, 'Santa Rita');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (919, 375, 'Sabana Libre');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (920, 376, 'El Socorro');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (921, 376, 'Los Caprichos');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (922, 376, 'Antonio José de Sucre');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (923, 377, 'Campo Elías');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (924, 377, 'Arnoldo Gabaldón');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (925, 378, 'Santa Apolonia');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (926, 378, 'El Progreso');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (927, 378, 'La Ceiba');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (928, 378, 'Tres de Febrero');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (929, 379, 'El Dividive');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (930, 379, 'Agua Santa');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (931, 379, 'Agua Caliente');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (932, 379, 'El Cenizo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (933, 379, 'Valerita');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (934, 380, 'Monte Carmelo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (935, 380, 'Buena Vista');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (936, 380, 'Santa María del Horcón');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (937, 381, 'Motatán');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (938, 381, 'El Baño');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (939, 381, 'Jalisco');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (940, 382, 'Pampán');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (941, 382, 'Flor de Patria');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (942, 382, 'La Paz');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (943, 382, 'Santa Ana');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (944, 383, 'Pampanito');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (945, 383, 'La Concepción');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (946, 383, 'Pampanito II');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (947, 384, 'Betijoque');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (948, 384, 'José Gregorio Hernández');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (949, 384, 'La Pueblita');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (950, 384, 'Los Cedros');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (951, 385, 'Carvajal');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (952, 385, 'Campo Alegre');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (953, 385, 'Antonio Nicolás Briceño');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (954, 385, 'José Leonardo Suárez');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (955, 386, 'Sabana de Mendoza');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (956, 386, 'Junín');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (957, 386, 'Valmore Rodríguez');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (958, 386, 'El Paraíso');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (959, 387, 'Andrés Linares');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (960, 387, 'Chiquinquirá');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (961, 387, 'Cristóbal Mendoza');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (962, 387, 'Cruz Carrillo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (963, 387, 'Matriz');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (964, 387, 'Monseñor Carrillo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (965, 387, 'Tres Esquinas');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (966, 388, 'Cabimbú');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (967, 388, 'Jajó');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (968, 388, 'La Mesa de Esnujaque');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (969, 388, 'Santiago');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (970, 388, 'Tuñame');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (971, 388, 'La Quebrada');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (972, 389, 'Juan Ignacio Montilla');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (973, 389, 'La Beatriz');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (974, 389, 'La Puerta');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (975, 389, 'Mendoza del Valle de Momboy');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (976, 389, 'Mercedes Díaz');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (977, 389, 'San Luis');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (978, 390, 'Caraballeda');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (979, 390, 'Carayaca');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (980, 390, 'Carlos Soublette');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (981, 390, 'Caruao Chuspa');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (982, 390, 'Catia La Mar');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (983, 390, 'El Junko');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (984, 390, 'La Guaira');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (985, 390, 'Macuto');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (986, 390, 'Maiquetía');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (987, 390, 'Naiguatá');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (988, 390, 'Urimare');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (989, 391, 'Arístides Bastidas');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (990, 392, 'Bolívar');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (991, 407, 'Chivacoa');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (992, 407, 'Campo Elías');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (993, 408, 'Cocorote');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (994, 409, 'Independencia');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (995, 410, 'José Antonio Páez');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (996, 411, 'La Trinidad');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (997, 412, 'Manuel Monge');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (998, 413, 'Salóm');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (999, 413, 'Temerla');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1000, 413, 'Nirgua');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1001, 414, 'San Andrés');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1002, 414, 'Yaritagua');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1003, 415, 'San Javier');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1004, 415, 'Albarico');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1005, 415, 'San Felipe');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1006, 416, 'Sucre');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1007, 417, 'Urachiche');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1008, 418, 'El Guayabo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1009, 418, 'Farriar');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1010, 441, 'Isla de Toas');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1011, 441, 'Monagas');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1012, 442, 'San Timoteo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1013, 442, 'General Urdaneta');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1014, 442, 'Libertador');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1015, 442, 'Marcelino Briceño');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1016, 442, 'Pueblo Nuevo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1017, 442, 'Manuel Guanipa Matos');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1018, 443, 'Ambrosio');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1019, 443, 'Carmen Herrera');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1020, 443, 'La Rosa');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1021, 443, 'Germán Ríos Linares');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1022, 443, 'San Benito');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1023, 443, 'Rómulo Betancourt');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1024, 443, 'Jorge Hernández');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1025, 443, 'Punta Gorda');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1026, 443, 'Arístides Calvani');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1027, 444, 'Encontrados');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1028, 444, 'Udón Pérez');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1029, 445, 'Moralito');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1030, 445, 'San Carlos del Zulia');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1031, 445, 'Santa Cruz del Zulia');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1032, 445, 'Santa Bárbara');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1033, 445, 'Urribarrí');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1034, 446, 'Carlos Quevedo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1035, 446, 'Francisco Javier Pulgar');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1036, 446, 'Simón Rodríguez');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1037, 446, 'Guamo-Gavilanes');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1038, 448, 'La Concepción');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1039, 448, 'San José');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1040, 448, 'Mariano Parra León');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1041, 448, 'José Ramón Yépez');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1042, 449, 'Jesús María Semprún');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1043, 449, 'Barí');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1044, 450, 'Concepción');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1045, 450, 'Andrés Bello');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1046, 450, 'Chiquinquirá');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1047, 450, 'El Carmelo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1048, 450, 'Potreritos');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1049, 451, 'Libertad');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1050, 451, 'Alonso de Ojeda');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1051, 451, 'Venezuela');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1052, 451, 'Eleazar López Contreras');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1053, 451, 'Campo Lara');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1054, 452, 'Bartolomé de las Casas');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1055, 452, 'Libertad');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1056, 452, 'Río Negro');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1057, 452, 'San José de Perijá');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1058, 453, 'San Rafael');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1059, 453, 'La Sierrita');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1060, 453, 'Las Parcelas');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1061, 453, 'Luis de Vicente');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1062, 453, 'Monseñor Marcos Sergio Godoy');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1063, 453, 'Ricaurte');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1064, 453, 'Tamare');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1065, 454, 'Antonio Borjas Romero');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1066, 454, 'Bolívar');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1067, 454, 'Cacique Mara');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1068, 454, 'Carracciolo Parra Pérez');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1069, 454, 'Cecilio Acosta');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1070, 454, 'Cristo de Aranza');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1071, 454, 'Coquivacoa');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1072, 454, 'Chiquinquirá');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1073, 454, 'Francisco Eugenio Bustamante');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1074, 454, 'Idelfonzo Vásquez');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1075, 454, 'Juana de Ávila');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1076, 454, 'Luis Hurtado Higuera');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1077, 454, 'Manuel Dagnino');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1078, 454, 'Olegario Villalobos');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1079, 454, 'Raúl Leoni');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1080, 454, 'Santa Lucía');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1081, 454, 'Venancio Pulgar');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1082, 454, 'San Isidro');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1083, 455, 'Altagracia');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1084, 455, 'Faría');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1085, 455, 'Ana María Campos');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1086, 455, 'San Antonio');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1087, 455, 'San José');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1088, 456, 'Donaldo García');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1089, 456, 'El Rosario');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1090, 456, 'Sixto Zambrano');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1091, 457, 'San Francisco');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1092, 457, 'El Bajo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1093, 457, 'Domitila Flores');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1094, 457, 'Francisco Ochoa');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1095, 457, 'Los Cortijos');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1096, 457, 'Marcial Hernández');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1097, 458, 'Santa Rita');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1098, 458, 'El Mene');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1099, 458, 'Pedro Lucas Urribarrí');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1100, 458, 'José Cenobio Urribarrí');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1101, 459, 'Rafael Maria Baralt');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1102, 459, 'Manuel Manrique');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1103, 459, 'Rafael Urdaneta');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1104, 460, 'Bobures');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1105, 460, 'Gibraltar');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1106, 460, 'Heras');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1107, 460, 'Monseñor Arturo Álvarez');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1108, 460, 'Rómulo Gallegos');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1109, 460, 'El Batey');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1110, 461, 'Rafael Urdaneta');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1111, 461, 'La Victoria');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1112, 461, 'Raúl Cuenca');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1113, 447, 'Sinamaica');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1114, 447, 'Alta Guajira');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1115, 447, 'Elías Sánchez Rubio');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1116, 447, 'Guajira');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1117, 462, 'Altagracia');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1118, 462, 'Antímano');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1119, 462, 'Caricuao');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1120, 462, 'Catedral');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1121, 462, 'Coche');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1122, 462, 'El Junquito');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1123, 462, 'El Paraíso');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1124, 462, 'El Recreo');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1125, 462, 'El Valle');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1126, 462, 'La Candelaria');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1127, 462, 'La Pastora');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1128, 462, 'La Vega');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1129, 462, 'Macarao');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1130, 462, 'San Agustín');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1131, 462, 'San Bernardino');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1132, 462, 'San José');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1133, 462, 'San Juan');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1134, 462, 'San Pedro');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1135, 462, 'Santa Rosalía');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1136, 462, 'Santa Teresa');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1137, 462, 'Sucre (Catia)');
INSERT INTO tb_parroquia (id_parroquia, id_municipio, nombre) VALUES (1138, 462, '23 de enero');


--
-- TOC entry 2282 (class 0 OID 0)
-- Dependencies: 184
-- Name: tb_parroquia_id_parroquia_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tb_parroquia_id_parroquia_seq', 1, false);


--
-- TOC entry 2191 (class 0 OID 16462)
-- Dependencies: 185 2228
-- Data for Name: tb_persona; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO tb_persona (id_persona, id_redi, id_estado, id_municipio, id_parroquia, direccion, nombre_apellido, cedula, nacionalidad, edad, sexo, fecha_nacimiento, num_hijos, etnia, domina_idioma, discapacidad, estado_civil, tel_local, tel_celular, email, nivel_instruccion, estudia_act, nombre_inst, grado, tipo_inst, estudia_mision, gustaria_estudiar, participa_org_mujeres, anios_militancia, responsabilidad, participa_part_politico, anios_militancia_pp, responsabilidad_pp, concejo_comunal, voceria_cc, comuna_cc, status) VALUES (37, 1, 21, 390, 985, 'macuto', 'luiz perez', 21000315, 'V', 43, 'F', '1971-03-11', 0, 'No', '', 'No', 'Casada(o)', '02127659843', '04129299667', 'luizperez@gmail.com', 'Secundaria completa', 'No', '', '', '', 'No', 'No', 'No', 0, '', 'No', 0, '', 'No', 'No', 'No', 'General');
INSERT INTO tb_persona (id_persona, id_redi, id_estado, id_municipio, id_parroquia, direccion, nombre_apellido, cedula, nacionalidad, edad, sexo, fecha_nacimiento, num_hijos, etnia, domina_idioma, discapacidad, estado_civil, tel_local, tel_celular, email, nivel_instruccion, estudia_act, nombre_inst, grado, tipo_inst, estudia_mision, gustaria_estudiar, participa_org_mujeres, anios_militancia, responsabilidad, participa_part_politico, anios_militancia_pp, responsabilidad_pp, concejo_comunal, voceria_cc, comuna_cc, status) VALUES (2, 1, 1, 241, 648, 'La California', 'Maria Jaramillo', 21534616, 'V', 22, 'F', '1992-07-14', 0, 'No', '', 'No', 'Soltera(o)', '02122324158', '04165356310', 'marychina2@gmail.com', 'TSU Informatica', 'Si', 'IUT', 'Ingenieria', 'Publica', 'No', 'No', 'No', 0, '', 'No', 0, '', 'No', 'No', 'No', 'General');
INSERT INTO tb_persona (id_persona, id_redi, id_estado, id_municipio, id_parroquia, direccion, nombre_apellido, cedula, nacionalidad, edad, sexo, fecha_nacimiento, num_hijos, etnia, domina_idioma, discapacidad, estado_civil, tel_local, tel_celular, email, nivel_instruccion, estudia_act, nombre_inst, grado, tipo_inst, estudia_mision, gustaria_estudiar, participa_org_mujeres, anios_militancia, responsabilidad, participa_part_politico, anios_militancia_pp, responsabilidad_pp, concejo_comunal, voceria_cc, comuna_cc, status) VALUES (39, 1, 24, 462, 1119, 'caricuao', 'jose ramirez', 19565828, 'V', 25, 'M', '1989-09-06', 0, 'No', '', 'No', 'Soltera(o)', '22222222222', '22222222228', 'jramirez@gmail.com', 'Sin instruccion', 'No', '', '', '', 'No', 'No', 'No', 0, '', 'No', 0, '', 'No', 'No', 'No', 'General');
INSERT INTO tb_persona (id_persona, id_redi, id_estado, id_municipio, id_parroquia, direccion, nombre_apellido, cedula, nacionalidad, edad, sexo, fecha_nacimiento, num_hijos, etnia, domina_idioma, discapacidad, estado_civil, tel_local, tel_celular, email, nivel_instruccion, estudia_act, nombre_inst, grado, tipo_inst, estudia_mision, gustaria_estudiar, participa_org_mujeres, anios_militancia, responsabilidad, participa_part_politico, anios_militancia_pp, responsabilidad_pp, concejo_comunal, voceria_cc, comuna_cc, status) VALUES (20, 1, 7, 79, 262, 'fdf', 'yohendrixsen perez', 12345678, 'V', 23, 'F', '1991-05-16', 6, 'No', '', 'No', 'Soltera(o)', '0121231232', '21321321321', 'yohendrix@gmail.com', 'Sin instruccion', 'No', '', '', '', 'No', 'No', 'No', 0, '', 'No', 0, '', 'No', 'No', 'No', 'General');
INSERT INTO tb_persona (id_persona, id_redi, id_estado, id_municipio, id_parroquia, direccion, nombre_apellido, cedula, nacionalidad, edad, sexo, fecha_nacimiento, num_hijos, etnia, domina_idioma, discapacidad, estado_civil, tel_local, tel_celular, email, nivel_instruccion, estudia_act, nombre_inst, grado, tipo_inst, estudia_mision, gustaria_estudiar, participa_org_mujeres, anios_militancia, responsabilidad, participa_part_politico, anios_militancia_pp, responsabilidad_pp, concejo_comunal, voceria_cc, comuna_cc, status) VALUES (43, 1, 7, 78, 259, 'guigue', 'lara croft', 12345666, 'V', 44, 'F', '1970-03-18', 0, 'No', '', 'No', 'Soltera(o)', '01213456789', '04167543654', 'larac@sdsderyu.com', 'Sin instruccion', 'No', '', '', '', 'No', 'No', 'No', 0, '', 'No', 0, '', 'No', 'No', 'No', 'MMDB');
INSERT INTO tb_persona (id_persona, id_redi, id_estado, id_municipio, id_parroquia, direccion, nombre_apellido, cedula, nacionalidad, edad, sexo, fecha_nacimiento, num_hijos, etnia, domina_idioma, discapacidad, estado_civil, tel_local, tel_celular, email, nivel_instruccion, estudia_act, nombre_inst, grado, tipo_inst, estudia_mision, gustaria_estudiar, participa_org_mujeres, anios_militancia, responsabilidad, participa_part_politico, anios_militancia_pp, responsabilidad_pp, concejo_comunal, voceria_cc, comuna_cc, status) VALUES (46, 1, 24, 462, 1134, 'san pedro', 'laura perez', 12345667, 'V', 65, 'F', '1950-03-16', 1, 'No', '', 'No', 'Soltera(o)', '04129299694', '04129299694', 'lape@agf.com', 'Sin instruccion', 'No', '', '', '', 'No', 'No', 'No', 0, '', 'No', 0, '', 'No', 'No', 'No', 'MMDB');
INSERT INTO tb_persona (id_persona, id_redi, id_estado, id_municipio, id_parroquia, direccion, nombre_apellido, cedula, nacionalidad, edad, sexo, fecha_nacimiento, num_hijos, etnia, domina_idioma, discapacidad, estado_civil, tel_local, tel_celular, email, nivel_instruccion, estudia_act, nombre_inst, grado, tipo_inst, estudia_mision, gustaria_estudiar, participa_org_mujeres, anios_militancia, responsabilidad, participa_part_politico, anios_militancia_pp, responsabilidad_pp, concejo_comunal, voceria_cc, comuna_cc, status) VALUES (47, 1, 14, 228, 618, 'montaña alta', 'Miguel Terrami', 21310256, 'V', 22, 'M', '1992-10-07', 0, 'No', '', 'No', 'Soltera(o)', '02123334445', '04164568967', 'miguel@gmail.com', 'informatico', 'Si', 'iut rc', 'ing informatica', 'Publica', 'No', 'No', 'No', 0, '', 'No', 0, '', 'No', 'No', 'No', 'General');
INSERT INTO tb_persona (id_persona, id_redi, id_estado, id_municipio, id_parroquia, direccion, nombre_apellido, cedula, nacionalidad, edad, sexo, fecha_nacimiento, num_hijos, etnia, domina_idioma, discapacidad, estado_civil, tel_local, tel_celular, email, nivel_instruccion, estudia_act, nombre_inst, grado, tipo_inst, estudia_mision, gustaria_estudiar, participa_org_mujeres, anios_militancia, responsabilidad, participa_part_politico, anios_militancia_pp, responsabilidad_pp, concejo_comunal, voceria_cc, comuna_cc, status) VALUES (1, 1, 24, 462, 1138, 'everywhere', 'administrador', 11111111, 'v', 23, 'M', '1991-05-02', 2, 'No', NULL, 'No', 'Soltera(o)', '02123229154', '04120127611', 'admin@admin.com', 'Ing Informatica', 'No', NULL, NULL, NULL, 'No', 'No', 'No', 0, NULL, 'No', 0, NULL, 'No', 'No', 'No', 'Usuario');
INSERT INTO tb_persona (id_persona, id_redi, id_estado, id_municipio, id_parroquia, direccion, nombre_apellido, cedula, nacionalidad, edad, sexo, fecha_nacimiento, num_hijos, etnia, domina_idioma, discapacidad, estado_civil, tel_local, tel_celular, email, nivel_instruccion, estudia_act, nombre_inst, grado, tipo_inst, estudia_mision, gustaria_estudiar, participa_org_mujeres, anios_militancia, responsabilidad, participa_part_politico, anios_militancia_pp, responsabilidad_pp, concejo_comunal, voceria_cc, comuna_cc, status) VALUES (3, 1, 14, 241, 648, 'Petare', 'Luisa Perez', 7655677, 'V', 48, 'F', '1956-08-09', 1, 'No', ' ', 'No', 'Soltera(o)', '02123344455', '04123322233', 'algo@gmail.com', 'TSU Educacion', 'No', ' ', ' ', ' ', 'No', 'No', 'No', 0, ' ', 'No', 0, ' ', 'No ', 'No', 'hola', 'MMDB');
INSERT INTO tb_persona (id_persona, id_redi, id_estado, id_municipio, id_parroquia, direccion, nombre_apellido, cedula, nacionalidad, edad, sexo, fecha_nacimiento, num_hijos, etnia, domina_idioma, discapacidad, estado_civil, tel_local, tel_celular, email, nivel_instruccion, estudia_act, nombre_inst, grado, tipo_inst, estudia_mision, gustaria_estudiar, participa_org_mujeres, anios_militancia, responsabilidad, participa_part_politico, anios_militancia_pp, responsabilidad_pp, concejo_comunal, voceria_cc, comuna_cc, status) VALUES (21, 2, 12, 145, 460, 'lara', 'pepita perez', 636822, 'V', 23, 'F', '1991-02-01', 2, 'No', '', 'No', 'Soltera(o)', '73773', '234234', 'josdf@sjj.c', 'Sin instruccion', 'No', '', '', '', 'No', 'No', 'No', 0, '', 'No', 0, '', 'No', 'No', 'adios', 'MMDB');
INSERT INTO tb_persona (id_persona, id_redi, id_estado, id_municipio, id_parroquia, direccion, nombre_apellido, cedula, nacionalidad, edad, sexo, fecha_nacimiento, num_hijos, etnia, domina_idioma, discapacidad, estado_civil, tel_local, tel_celular, email, nivel_instruccion, estudia_act, nombre_inst, grado, tipo_inst, estudia_mision, gustaria_estudiar, participa_org_mujeres, anios_militancia, responsabilidad, participa_part_politico, anios_militancia_pp, responsabilidad_pp, concejo_comunal, voceria_cc, comuna_cc, status) VALUES (12, 1, 14, 232, 625, 'el encanto', 'joynert garcia', 19565827, 'V', 23, 'M', '1991-05-02', 2, 'No', '', 'No', 'Casada(o)', '02123643357', '04129299694', 'joynertagf@gmail.com', 'Sin instruccion', 'Si', 'iut rc', 'ing informatica', 'Publica', 'No', 'No', 'No', 0, '', 'No', 0, '', 'No', 'No', 'No', 'General');
INSERT INTO tb_persona (id_persona, id_redi, id_estado, id_municipio, id_parroquia, direccion, nombre_apellido, cedula, nacionalidad, edad, sexo, fecha_nacimiento, num_hijos, etnia, domina_idioma, discapacidad, estado_civil, tel_local, tel_celular, email, nivel_instruccion, estudia_act, nombre_inst, grado, tipo_inst, estudia_mision, gustaria_estudiar, participa_org_mujeres, anios_militancia, responsabilidad, participa_part_politico, anios_militancia_pp, responsabilidad_pp, concejo_comunal, voceria_cc, comuna_cc, status) VALUES (49, 2, 10, 109, 353, 'safs', 'jose ramirez', 18765904, 'V', 24, 'F', '1991-05-02', 0, 'No', '', 'No', 'Soltera(o)', '02123334445', '04167543654', 'joynertagf@gmail.com', 'Sin instruccion', 'No', '', '', '', 'No', 'No', 'No', 0, '', 'No', 0, '', 'No', 'No', 'No', 'General');


--
-- TOC entry 2283 (class 0 OID 0)
-- Dependencies: 186
-- Name: tb_persona_id_persona_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tb_persona_id_persona_seq', 49, true);


--
-- TOC entry 2193 (class 0 OID 16470)
-- Dependencies: 187 2228
-- Data for Name: tb_redi; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO tb_redi (id_redi, nombre) VALUES (1, 'Central');
INSERT INTO tb_redi (id_redi, nombre) VALUES (2, 'Occidente');
INSERT INTO tb_redi (id_redi, nombre) VALUES (3, 'Los Llanos');
INSERT INTO tb_redi (id_redi, nombre) VALUES (4, 'Oriente');
INSERT INTO tb_redi (id_redi, nombre) VALUES (5, 'Guayana');
INSERT INTO tb_redi (id_redi, nombre) VALUES (6, 'Los Andes');
INSERT INTO tb_redi (id_redi, nombre) VALUES (7, 'Insular');


--
-- TOC entry 2284 (class 0 OID 0)
-- Dependencies: 188
-- Name: tb_redi_id_redi_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tb_redi_id_redi_seq', 1, false);


--
-- TOC entry 2210 (class 0 OID 17290)
-- Dependencies: 204 2228
-- Data for Name: tb_tipo_divulgacion; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO tb_tipo_divulgacion (id_tipo_divulgacion, nombre, medio) VALUES (1, 'Programa', 'tv');
INSERT INTO tb_tipo_divulgacion (id_tipo_divulgacion, nombre, medio) VALUES (2, 'Propaganda Tevisada', 'tv');
INSERT INTO tb_tipo_divulgacion (id_tipo_divulgacion, nombre, medio) VALUES (3, 'Micro', 'radio');
INSERT INTO tb_tipo_divulgacion (id_tipo_divulgacion, nombre, medio) VALUES (4, 'Programa', 'radio');
INSERT INTO tb_tipo_divulgacion (id_tipo_divulgacion, nombre, medio) VALUES (5, 'Periodico', 'fisica');
INSERT INTO tb_tipo_divulgacion (id_tipo_divulgacion, nombre, medio) VALUES (6, 'Revista', 'fisica');
INSERT INTO tb_tipo_divulgacion (id_tipo_divulgacion, nombre, medio) VALUES (7, 'Boletin', 'fisica');
INSERT INTO tb_tipo_divulgacion (id_tipo_divulgacion, nombre, medio) VALUES (8, 'Periodico Web', 'digital');
INSERT INTO tb_tipo_divulgacion (id_tipo_divulgacion, nombre, medio) VALUES (9, 'Facebook', 'digital');
INSERT INTO tb_tipo_divulgacion (id_tipo_divulgacion, nombre, medio) VALUES (10, 'Twitter', 'digital');
INSERT INTO tb_tipo_divulgacion (id_tipo_divulgacion, nombre, medio) VALUES (11, 'Blog', 'digital');


--
-- TOC entry 2195 (class 0 OID 16475)
-- Dependencies: 189 2228
-- Data for Name: tb_usuario; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO tb_usuario (id_usuario, id_persona, cargo, username, password, pregunta, respuesta, permisologia) VALUES (1, 1, 'administrador', 'administrador', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'administrador', 'administrador', 0);
INSERT INTO tb_usuario (id_usuario, id_persona, cargo, username, password, pregunta, respuesta, permisologia) VALUES (4, 2, 'Facilitador(a)', 'mJaramillo', 'fe703d258c7ef5f50b71e06565a65aa07194907f', '', '', 1);
INSERT INTO tb_usuario (id_usuario, id_persona, cargo, username, password, pregunta, respuesta, permisologia) VALUES (2, 3, 'Facilitador(a)', 'lperez', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'perro', 'terry', 1);


--
-- TOC entry 2285 (class 0 OID 0)
-- Dependencies: 190
-- Name: tb_usuario_id_usuario_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tb_usuario_id_usuario_seq', 1, false);


--
-- TOC entry 2286 (class 0 OID 0)
-- Dependencies: 205
-- Name: tipo_divulgacion_id_tipo_divulgacion_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tipo_divulgacion_id_tipo_divulgacion_seq', 11, true);


--
-- TOC entry 2287 (class 0 OID 0)
-- Dependencies: 216
-- Name: tr_curso_asistencia_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tr_curso_asistencia_id_seq', 7, true);


--
-- TOC entry 2221 (class 0 OID 17460)
-- Dependencies: 215 2228
-- Data for Name: tr_curso_estado; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO tr_curso_estado (id, curso_id, estado_id, facilitador) VALUES (19, 28, 11, NULL);
INSERT INTO tr_curso_estado (id, curso_id, estado_id, facilitador) VALUES (18, 27, 2, NULL);
INSERT INTO tr_curso_estado (id, curso_id, estado_id, facilitador) VALUES (37, 36, 7, 20);
INSERT INTO tr_curso_estado (id, curso_id, estado_id, facilitador) VALUES (39, 38, 14, 0);
INSERT INTO tr_curso_estado (id, curso_id, estado_id, facilitador) VALUES (40, 39, 5, 0);
INSERT INTO tr_curso_estado (id, curso_id, estado_id, facilitador) VALUES (42, 40, 1, 0);
INSERT INTO tr_curso_estado (id, curso_id, estado_id, facilitador) VALUES (43, 40, 4, 0);
INSERT INTO tr_curso_estado (id, curso_id, estado_id, facilitador) VALUES (48, 41, 7, 43);


--
-- TOC entry 2288 (class 0 OID 0)
-- Dependencies: 214
-- Name: tr_curso_estado_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tr_curso_estado_id_seq', 49, true);


--
-- TOC entry 2217 (class 0 OID 17431)
-- Dependencies: 211 2228
-- Data for Name: tr_curso_participantes; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO tr_curso_participantes (id, id_curso, nro_participantes, id_estado) VALUES (19, 28, 1, 11);
INSERT INTO tr_curso_participantes (id, id_curso, nro_participantes, id_estado) VALUES (18, 27, 1, 2);
INSERT INTO tr_curso_participantes (id, id_curso, nro_participantes, id_estado) VALUES (37, 36, 1, 7);
INSERT INTO tr_curso_participantes (id, id_curso, nro_participantes, id_estado) VALUES (42, 40, 1, 1);
INSERT INTO tr_curso_participantes (id, id_curso, nro_participantes, id_estado) VALUES (43, 40, 1, 4);
INSERT INTO tr_curso_participantes (id, id_curso, nro_participantes, id_estado) VALUES (40, 39, 1, 5);
INSERT INTO tr_curso_participantes (id, id_curso, nro_participantes, id_estado) VALUES (39, 38, 0, 14);
INSERT INTO tr_curso_participantes (id, id_curso, nro_participantes, id_estado) VALUES (48, 41, 1, 7);


--
-- TOC entry 2289 (class 0 OID 0)
-- Dependencies: 210
-- Name: tr_curso_participantes_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tr_curso_participantes_id_seq', 49, true);


--
-- TOC entry 2197 (class 0 OID 16483)
-- Dependencies: 191 2228
-- Data for Name: tr_escalas_evaluacion; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2290 (class 0 OID 0)
-- Dependencies: 192
-- Name: tr_escalas_evaluacion_id_escala_evaluacion_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tr_escalas_evaluacion_id_escala_evaluacion_seq', 1, false);


--
-- TOC entry 2223 (class 0 OID 17504)
-- Dependencies: 217 2228
-- Data for Name: tr_persona_asistencia; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO tr_persona_asistencia (id, persona_id, asistencia_id) VALUES (1, 1, 1);
INSERT INTO tr_persona_asistencia (id, persona_id, asistencia_id) VALUES (2, 12, 2);
INSERT INTO tr_persona_asistencia (id, persona_id, asistencia_id) VALUES (3, 12, 3);
INSERT INTO tr_persona_asistencia (id, persona_id, asistencia_id) VALUES (4, 1, 3);
INSERT INTO tr_persona_asistencia (id, persona_id, asistencia_id) VALUES (5, 12, 4);
INSERT INTO tr_persona_asistencia (id, persona_id, asistencia_id) VALUES (6, 1, 4);
INSERT INTO tr_persona_asistencia (id, persona_id, asistencia_id) VALUES (7, 20, 5);


--
-- TOC entry 2199 (class 0 OID 16491)
-- Dependencies: 193 2228
-- Data for Name: tr_persona_curso; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO tr_persona_curso (id_persona, id_curso, id, id_estado) VALUES (1, 27, 28, 24);
INSERT INTO tr_persona_curso (id_persona, id_curso, id, id_estado) VALUES (1, 28, 32, 11);
INSERT INTO tr_persona_curso (id_persona, id_curso, id, id_estado) VALUES (1, 27, 39, 2);
INSERT INTO tr_persona_curso (id_persona, id_curso, id, id_estado) VALUES (20, 36, 42, 7);
INSERT INTO tr_persona_curso (id_persona, id_curso, id, id_estado) VALUES (1, 40, 43, 1);
INSERT INTO tr_persona_curso (id_persona, id_curso, id, id_estado) VALUES (1, 40, 44, 4);
INSERT INTO tr_persona_curso (id_persona, id_curso, id, id_estado) VALUES (1, 39, 45, 5);
INSERT INTO tr_persona_curso (id_persona, id_curso, id, id_estado) VALUES (1, 41, 49, 7);


--
-- TOC entry 2291 (class 0 OID 0)
-- Dependencies: 206
-- Name: tr_persona_curso_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tr_persona_curso_id_seq', 1, false);


--
-- TOC entry 2292 (class 0 OID 0)
-- Dependencies: 209
-- Name: tr_persona_curso_id_seq1; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tr_persona_curso_id_seq1', 49, true);


--
-- TOC entry 2200 (class 0 OID 16494)
-- Dependencies: 194 2228
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO users (id, ip_address, username, password, salt, email, activation_code, forgotten_password_code, forgotten_password_time, remember_code, created_on, last_login, active, first_name, last_name, cargo, phone, persona_id, pregunta, respuesta) VALUES (1, '127.0.0.1', 'Admin Istrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1431373596, 1, 'Admin', 'istrator', 'Admin', '0', 1, 'favorite food', 'ichiraku ramen');
INSERT INTO users (id, ip_address, username, password, salt, email, activation_code, forgotten_password_code, forgotten_password_time, remember_code, created_on, last_login, active, first_name, last_name, cargo, phone, persona_id, pregunta, respuesta) VALUES (17, '127.0.0.1', 'lara croft', '$2y$08$67Pz7cnXfVAaA/WEN.ibuOfEqIFGkk6busCC5oOcF3JzoiTV14vwS', NULL, 'larac@sdsderyu.com', NULL, NULL, NULL, NULL, 1426591081, 1426591185, 1, 'lara croft', NULL, NULL, NULL, 43, 'Cuantos hijos tengo?', '0');
INSERT INTO users (id, ip_address, username, password, salt, email, activation_code, forgotten_password_code, forgotten_password_time, remember_code, created_on, last_login, active, first_name, last_name, cargo, phone, persona_id, pregunta, respuesta) VALUES (9, '127.0.0.1', 'yohendrixsen perez', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', NULL, 'yohendrix@gmail.com', NULL, NULL, NULL, NULL, 1423071766, 1430352517, 1, NULL, NULL, NULL, NULL, 20, 'nombre real', 'carlos');
INSERT INTO users (id, ip_address, username, password, salt, email, activation_code, forgotten_password_code, forgotten_password_time, remember_code, created_on, last_login, active, first_name, last_name, cargo, phone, persona_id, pregunta, respuesta) VALUES (18, '127.0.0.1', 'lorena padron', '$2y$08$m7irPPFqTYzXZRCBGAU2AeAeABBRxXnLpRzsNyLM5H1t45dVen7uS', NULL, 'lape@agf.com', NULL, NULL, NULL, NULL, 1426591643, 1426591798, 1, 'laura perez', NULL, NULL, NULL, 46, 'Cuantos hijos tengo?', '13');
INSERT INTO users (id, ip_address, username, password, salt, email, activation_code, forgotten_password_code, forgotten_password_time, remember_code, created_on, last_login, active, first_name, last_name, cargo, phone, persona_id, pregunta, respuesta) VALUES (19, '127.0.0.1', 'Miguel Terrami', '$2y$08$y93Rk1oY1vYkRuwZeP2MzuSNZa7Pa7RSrE9FtJ.1bZvgZBczf2hYK', NULL, 'miguel@gmail.com', NULL, NULL, NULL, NULL, 1430352753, 1430352777, 1, 'Miguel Terrami', NULL, NULL, NULL, 47, 'Cuantos hijos tengo?', '0');
INSERT INTO users (id, ip_address, username, password, salt, email, activation_code, forgotten_password_code, forgotten_password_time, remember_code, created_on, last_login, active, first_name, last_name, cargo, phone, persona_id, pregunta, respuesta) VALUES (20, '127.0.0.1', 'jole jolele', '$2y$08$3r1BPt92cqRJfqoLUWzTzuU0XfxMRSDsKDvgeqvB4DIjRDeXexY4W', NULL, 'jole@ret.gf', NULL, NULL, NULL, NULL, 1431246968, 1431246994, 1, NULL, NULL, NULL, NULL, 40, 'hola', 'adios');
INSERT INTO users (id, ip_address, username, password, salt, email, activation_code, forgotten_password_code, forgotten_password_time, remember_code, created_on, last_login, active, first_name, last_name, cargo, phone, persona_id, pregunta, respuesta) VALUES (21, '127.0.0.1', 'ml', '$2y$08$g5ZzQ0mNeS6cWz2uvTIGweChlB5C1DJntcS0.PNIvHehV.nTn2b9q', NULL, 'ml@ml.ml', NULL, NULL, NULL, NULL, 1431247750, 1431247750, 1, NULL, NULL, 'ml', NULL, 2, 'ml', 'ml');
INSERT INTO users (id, ip_address, username, password, salt, email, activation_code, forgotten_password_code, forgotten_password_time, remember_code, created_on, last_login, active, first_name, last_name, cargo, phone, persona_id, pregunta, respuesta) VALUES (6, '127.0.0.1', 'josbert garcia', '$2y$08$cojc3jCWSOfv2eRCEwTPQOw6YqhgZc24pXC7ha/q.L4DB1dROZtKe', NULL, 'joysertagf@gmail.com', NULL, NULL, NULL, NULL, 1423069895, 1431222085, 1, NULL, NULL, NULL, NULL, 12, 'hola', 'adios');
INSERT INTO users (id, ip_address, username, password, salt, email, activation_code, forgotten_password_code, forgotten_password_time, remember_code, created_on, last_login, active, first_name, last_name, cargo, phone, persona_id, pregunta, respuesta) VALUES (22, '127.0.0.1', 'jose ramirez', '$2y$08$vVkBt/ajuqqUcOylnV0TkOA2sAcPjfgNCZ.3XZLdBU7wY1dgV.1eW', NULL, 'joynertagf@gmail.com', NULL, NULL, NULL, NULL, 1431366456, 1431366456, 1, 'jose ramirez', NULL, NULL, NULL, 49, 'Cuantos hijos tengo?', '0');


--
-- TOC entry 2201 (class 0 OID 16502)
-- Dependencies: 195 2228
-- Data for Name: users_groups; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO users_groups (id, user_id, group_id) VALUES (13, 9, 3);
INSERT INTO users_groups (id, user_id, group_id) VALUES (24, 17, 3);
INSERT INTO users_groups (id, user_id, group_id) VALUES (25, 18, 3);
INSERT INTO users_groups (id, user_id, group_id) VALUES (19, 6, 2);
INSERT INTO users_groups (id, user_id, group_id) VALUES (29, 19, 2);
INSERT INTO users_groups (id, user_id, group_id) VALUES (12, 20, 2);
INSERT INTO users_groups (id, user_id, group_id) VALUES (30, 21, 2);
INSERT INTO users_groups (id, user_id, group_id) VALUES (32, 22, 2);
INSERT INTO users_groups (id, user_id, group_id) VALUES (33, 1, 1);


--
-- TOC entry 2293 (class 0 OID 0)
-- Dependencies: 196
-- Name: users_groups_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('users_groups_id_seq', 33, true);


--
-- TOC entry 2294 (class 0 OID 0)
-- Dependencies: 197
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('users_id_seq', 22, true);


--
-- TOC entry 1978 (class 2606 OID 16531)
-- Dependencies: 161 161 2229
-- Name: groups_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY groups
    ADD CONSTRAINT groups_pkey PRIMARY KEY (id);


--
-- TOC entry 1980 (class 2606 OID 16533)
-- Dependencies: 163 163 2229
-- Name: login_attempts_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY login_attempts
    ADD CONSTRAINT login_attempts_pkey PRIMARY KEY (id);


--
-- TOC entry 2038 (class 2606 OID 17523)
-- Dependencies: 219 219 2229
-- Name: pk_asistencia; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tb_asistencia
    ADD CONSTRAINT pk_asistencia PRIMARY KEY (id);


--
-- TOC entry 2032 (class 2606 OID 17457)
-- Dependencies: 213 213 2229
-- Name: pk_cargo; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tb_cargo
    ADD CONSTRAINT pk_cargo PRIMARY KEY (id_cargo);


--
-- TOC entry 2034 (class 2606 OID 17465)
-- Dependencies: 215 215 2229
-- Name: pk_curso_estado; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tr_curso_estado
    ADD CONSTRAINT pk_curso_estado PRIMARY KEY (id);


--
-- TOC entry 2020 (class 2606 OID 17324)
-- Dependencies: 198 198 2229
-- Name: pk_divulgacion_prensa; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tb_divulgacion_prensa
    ADD CONSTRAINT pk_divulgacion_prensa PRIMARY KEY (id_divulgacion_prensa);


--
-- TOC entry 2022 (class 2606 OID 17326)
-- Dependencies: 200 200 2229
-- Name: pk_divulgacion_radio; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tb_divulgacion_radio
    ADD CONSTRAINT pk_divulgacion_radio PRIMARY KEY (id_divulgacion_radio);


--
-- TOC entry 2024 (class 2606 OID 17328)
-- Dependencies: 202 202 2229
-- Name: pk_divulgacion_tv; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tb_divulgacion_tv
    ADD CONSTRAINT pk_divulgacion_tv PRIMARY KEY (id_divulgacion_tv);


--
-- TOC entry 2036 (class 2606 OID 17525)
-- Dependencies: 217 217 2229
-- Name: pk_persona_asistencia; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tr_persona_asistencia
    ADD CONSTRAINT pk_persona_asistencia PRIMARY KEY (id);


--
-- TOC entry 2012 (class 2606 OID 17428)
-- Dependencies: 193 193 2229
-- Name: pk_persona_curso; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tr_persona_curso
    ADD CONSTRAINT pk_persona_curso PRIMARY KEY (id);


--
-- TOC entry 2026 (class 2606 OID 17334)
-- Dependencies: 204 204 2229
-- Name: pk_tipo_divulgacion; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tb_tipo_divulgacion
    ADD CONSTRAINT pk_tipo_divulgacion PRIMARY KEY (id_tipo_divulgacion);


--
-- TOC entry 2030 (class 2606 OID 17436)
-- Dependencies: 211 211 2229
-- Name: pk_tr_curso_part; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tr_curso_participantes
    ADD CONSTRAINT pk_tr_curso_part PRIMARY KEY (id);


--
-- TOC entry 1982 (class 2606 OID 16535)
-- Dependencies: 165 165 2229
-- Name: tb_actividad_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tb_actividad
    ADD CONSTRAINT tb_actividad_pkey PRIMARY KEY (id_actividad);


--
-- TOC entry 1984 (class 2606 OID 16537)
-- Dependencies: 167 167 2229
-- Name: tb_auditoria_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tb_auditoria
    ADD CONSTRAINT tb_auditoria_pkey PRIMARY KEY (id_auditoria);


--
-- TOC entry 2028 (class 2606 OID 17400)
-- Dependencies: 208 208 2229
-- Name: tb_biblioteca_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tb_biblioteca
    ADD CONSTRAINT tb_biblioteca_pkey PRIMARY KEY (id_biblioteca);


--
-- TOC entry 1986 (class 2606 OID 16539)
-- Dependencies: 169 169 2229
-- Name: tb_curso_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tb_curso
    ADD CONSTRAINT tb_curso_pkey PRIMARY KEY (id_curso);


--
-- TOC entry 1988 (class 2606 OID 16541)
-- Dependencies: 171 171 2229
-- Name: tb_divulgacion_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tb_divulgacion
    ADD CONSTRAINT tb_divulgacion_pkey PRIMARY KEY (id_divulgacion);


--
-- TOC entry 1990 (class 2606 OID 16543)
-- Dependencies: 173 173 2229
-- Name: tb_escalas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tb_escalas
    ADD CONSTRAINT tb_escalas_pkey PRIMARY KEY (id_escala);


--
-- TOC entry 1992 (class 2606 OID 16545)
-- Dependencies: 175 175 2229
-- Name: tb_estado_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tb_estado
    ADD CONSTRAINT tb_estado_pkey PRIMARY KEY (id_estado);


--
-- TOC entry 1994 (class 2606 OID 16547)
-- Dependencies: 177 177 2229
-- Name: tb_evaluacion_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tb_evaluacion
    ADD CONSTRAINT tb_evaluacion_pkey PRIMARY KEY (id_pregunta);


--
-- TOC entry 1996 (class 2606 OID 16549)
-- Dependencies: 179 179 2229
-- Name: tb_general_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tb_general
    ADD CONSTRAINT tb_general_pkey PRIMARY KEY (id_persona);


--
-- TOC entry 2040 (class 2606 OID 17987)
-- Dependencies: 221 221 2229
-- Name: tb_informe_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tb_informe
    ADD CONSTRAINT tb_informe_pkey PRIMARY KEY (id_informe);


--
-- TOC entry 1998 (class 2606 OID 16553)
-- Dependencies: 180 180 2229
-- Name: tb_mmdb_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tb_mmdb
    ADD CONSTRAINT tb_mmdb_pkey PRIMARY KEY (id_persona);


--
-- TOC entry 2000 (class 2606 OID 16555)
-- Dependencies: 181 181 2229
-- Name: tb_municipio_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tb_municipio
    ADD CONSTRAINT tb_municipio_pkey PRIMARY KEY (id_municipio);


--
-- TOC entry 2002 (class 2606 OID 16557)
-- Dependencies: 183 183 2229
-- Name: tb_parroquia_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tb_parroquia
    ADD CONSTRAINT tb_parroquia_pkey PRIMARY KEY (id_parroquia);


--
-- TOC entry 2004 (class 2606 OID 16559)
-- Dependencies: 185 185 2229
-- Name: tb_persona_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tb_persona
    ADD CONSTRAINT tb_persona_pkey PRIMARY KEY (id_persona);


--
-- TOC entry 2006 (class 2606 OID 16561)
-- Dependencies: 187 187 2229
-- Name: tb_redi_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tb_redi
    ADD CONSTRAINT tb_redi_pkey PRIMARY KEY (id_redi);


--
-- TOC entry 2008 (class 2606 OID 16563)
-- Dependencies: 189 189 2229
-- Name: tb_usuario_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tb_usuario
    ADD CONSTRAINT tb_usuario_pkey PRIMARY KEY (id_usuario);


--
-- TOC entry 2010 (class 2606 OID 16565)
-- Dependencies: 191 191 2229
-- Name: tr_escalas_evaluacion_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tr_escalas_evaluacion
    ADD CONSTRAINT tr_escalas_evaluacion_pkey PRIMARY KEY (id_escala_evaluacion);


--
-- TOC entry 2016 (class 2606 OID 16569)
-- Dependencies: 195 195 195 2229
-- Name: uc_users_groups; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY users_groups
    ADD CONSTRAINT uc_users_groups UNIQUE (user_id, group_id);


--
-- TOC entry 2018 (class 2606 OID 16571)
-- Dependencies: 195 195 2229
-- Name: users_groups_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY users_groups
    ADD CONSTRAINT users_groups_pkey PRIMARY KEY (id);


--
-- TOC entry 2014 (class 2606 OID 16573)
-- Dependencies: 194 194 2229
-- Name: users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- TOC entry 2065 (class 2620 OID 17446)
-- Dependencies: 234 193 2229
-- Name: act_participantes_curso; Type: TRIGGER; Schema: public; Owner: postgres
--

CREATE TRIGGER act_participantes_curso AFTER INSERT ON tr_persona_curso FOR EACH ROW EXECUTE PROCEDURE act_participantes_curso();


--
-- TOC entry 2041 (class 2606 OID 17405)
-- Dependencies: 165 2007 189 2229
-- Name: tb_actividad_id_usuario_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_actividad
    ADD CONSTRAINT tb_actividad_id_usuario_fkey FOREIGN KEY (id_usuario) REFERENCES tb_usuario(id_usuario);


--
-- TOC entry 2042 (class 2606 OID 26227)
-- Dependencies: 2007 167 189 2229
-- Name: tb_auditoria_id_usuario_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_auditoria
    ADD CONSTRAINT tb_auditoria_id_usuario_fkey FOREIGN KEY (id_usuario) REFERENCES tb_usuario(id_usuario);


--
-- TOC entry 2043 (class 2606 OID 18039)
-- Dependencies: 1985 171 169 2229
-- Name: tb_divulgacion_id_curso_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_divulgacion
    ADD CONSTRAINT tb_divulgacion_id_curso_fkey FOREIGN KEY (id_curso) REFERENCES tb_curso(id_curso);


--
-- TOC entry 2044 (class 2606 OID 16594)
-- Dependencies: 2005 175 187 2229
-- Name: tb_estado_id_redi_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_estado
    ADD CONSTRAINT tb_estado_id_redi_fkey FOREIGN KEY (id_redi) REFERENCES tb_redi(id_redi) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2045 (class 2606 OID 26219)
-- Dependencies: 185 179 2003 2229
-- Name: tb_general_id_persona_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_general
    ADD CONSTRAINT tb_general_id_persona_fkey FOREIGN KEY (id_persona) REFERENCES tb_persona(id_persona) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2059 (class 2606 OID 17988)
-- Dependencies: 221 169 1985 2229
-- Name: tb_informe_id_curso_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_informe
    ADD CONSTRAINT tb_informe_id_curso_fkey FOREIGN KEY (id_curso) REFERENCES tb_curso(id_curso);


--
-- TOC entry 2060 (class 2606 OID 17993)
-- Dependencies: 1991 175 221 2229
-- Name: tb_informe_id_estado_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_informe
    ADD CONSTRAINT tb_informe_id_estado_fkey FOREIGN KEY (id_estado) REFERENCES tb_estado(id_estado);


--
-- TOC entry 2061 (class 2606 OID 17998)
-- Dependencies: 1999 181 221 2229
-- Name: tb_informe_id_municipio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_informe
    ADD CONSTRAINT tb_informe_id_municipio_fkey FOREIGN KEY (id_municipio) REFERENCES tb_municipio(id_municipio);


--
-- TOC entry 2062 (class 2606 OID 18003)
-- Dependencies: 221 2001 183 2229
-- Name: tb_informe_id_parroquia_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_informe
    ADD CONSTRAINT tb_informe_id_parroquia_fkey FOREIGN KEY (id_parroquia) REFERENCES tb_parroquia(id_parroquia);


--
-- TOC entry 2063 (class 2606 OID 18008)
-- Dependencies: 221 187 2005 2229
-- Name: tb_informe_id_redi_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_informe
    ADD CONSTRAINT tb_informe_id_redi_fkey FOREIGN KEY (id_redi) REFERENCES tb_redi(id_redi);


--
-- TOC entry 2064 (class 2606 OID 18013)
-- Dependencies: 221 2013 194 2229
-- Name: tb_informe_id_usuario_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_informe
    ADD CONSTRAINT tb_informe_id_usuario_fkey FOREIGN KEY (id_usuario) REFERENCES users(id);


--
-- TOC entry 2046 (class 2606 OID 16634)
-- Dependencies: 180 2003 185 2229
-- Name: tb_mmdb_id_persona_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_mmdb
    ADD CONSTRAINT tb_mmdb_id_persona_fkey FOREIGN KEY (id_persona) REFERENCES tb_persona(id_persona) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2047 (class 2606 OID 16639)
-- Dependencies: 175 181 1991 2229
-- Name: tb_municipio_id_estado_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_municipio
    ADD CONSTRAINT tb_municipio_id_estado_fkey FOREIGN KEY (id_estado) REFERENCES tb_estado(id_estado) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2048 (class 2606 OID 16644)
-- Dependencies: 1999 183 181 2229
-- Name: tb_parroquia_id_municipio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_parroquia
    ADD CONSTRAINT tb_parroquia_id_municipio_fkey FOREIGN KEY (id_municipio) REFERENCES tb_municipio(id_municipio) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2049 (class 2606 OID 16649)
-- Dependencies: 1991 175 185 2229
-- Name: tb_persona_id_estado_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_persona
    ADD CONSTRAINT tb_persona_id_estado_fkey FOREIGN KEY (id_estado) REFERENCES tb_estado(id_estado);


--
-- TOC entry 2050 (class 2606 OID 16654)
-- Dependencies: 1999 181 185 2229
-- Name: tb_persona_id_municipio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_persona
    ADD CONSTRAINT tb_persona_id_municipio_fkey FOREIGN KEY (id_municipio) REFERENCES tb_municipio(id_municipio);


--
-- TOC entry 2051 (class 2606 OID 16659)
-- Dependencies: 2001 185 183 2229
-- Name: tb_persona_id_parroquia_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_persona
    ADD CONSTRAINT tb_persona_id_parroquia_fkey FOREIGN KEY (id_parroquia) REFERENCES tb_parroquia(id_parroquia);


--
-- TOC entry 2052 (class 2606 OID 16664)
-- Dependencies: 185 187 2005 2229
-- Name: tb_persona_id_redi_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_persona
    ADD CONSTRAINT tb_persona_id_redi_fkey FOREIGN KEY (id_redi) REFERENCES tb_redi(id_redi);


--
-- TOC entry 2053 (class 2606 OID 16669)
-- Dependencies: 2003 189 185 2229
-- Name: tb_usuario_id_persona_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_usuario
    ADD CONSTRAINT tb_usuario_id_persona_fkey FOREIGN KEY (id_persona) REFERENCES tb_persona(id_persona) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2054 (class 2606 OID 16674)
-- Dependencies: 1989 191 173 2229
-- Name: tr_escalas_evaluacion_id_escala_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tr_escalas_evaluacion
    ADD CONSTRAINT tr_escalas_evaluacion_id_escala_fkey FOREIGN KEY (id_escala) REFERENCES tb_escalas(id_escala);


--
-- TOC entry 2055 (class 2606 OID 16679)
-- Dependencies: 191 185 2003 2229
-- Name: tr_escalas_evaluacion_id_persona_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tr_escalas_evaluacion
    ADD CONSTRAINT tr_escalas_evaluacion_id_persona_fkey FOREIGN KEY (id_persona) REFERENCES tb_persona(id_persona);


--
-- TOC entry 2056 (class 2606 OID 16684)
-- Dependencies: 1993 191 177 2229
-- Name: tr_escalas_evaluacion_id_pregunta_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tr_escalas_evaluacion
    ADD CONSTRAINT tr_escalas_evaluacion_id_pregunta_fkey FOREIGN KEY (id_pregunta) REFERENCES tb_evaluacion(id_pregunta);


--
-- TOC entry 2057 (class 2606 OID 17526)
-- Dependencies: 193 1985 169 2229
-- Name: tr_persona_curso_id_curso_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tr_persona_curso
    ADD CONSTRAINT tr_persona_curso_id_curso_fkey FOREIGN KEY (id_curso) REFERENCES tb_curso(id_curso);


--
-- TOC entry 2058 (class 2606 OID 17531)
-- Dependencies: 185 193 2003 2229
-- Name: tr_persona_curso_id_persona_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tr_persona_curso
    ADD CONSTRAINT tr_persona_curso_id_persona_fkey FOREIGN KEY (id_persona) REFERENCES tb_persona(id_persona);


--
-- TOC entry 2234 (class 0 OID 0)
-- Dependencies: 6
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2015-05-11 15:21:37

--
-- PostgreSQL database dump complete
--

