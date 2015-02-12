--
-- PostgreSQL database dump
--

-- Dumped from database version 9.1.14
-- Dumped by pg_dump version 9.1.14
-- Started on 2015-02-11 08:32:14

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
-- TOC entry 2228 (class 0 OID 0)
-- Dependencies: 222
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

--
-- TOC entry 234 (class 1255 OID 17445)
-- Dependencies: 6 678
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
-- Dependencies: 1938 6
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
-- Dependencies: 161 6
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
-- TOC entry 2229 (class 0 OID 0)
-- Dependencies: 162
-- Name: groups_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE groups_id_seq OWNED BY groups.id;


--
-- TOC entry 163 (class 1259 OID 16400)
-- Dependencies: 1940 6
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
-- TOC entry 2230 (class 0 OID 0)
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
-- TOC entry 2231 (class 0 OID 0)
-- Dependencies: 166
-- Name: tb_actividad_id_actividad_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tb_actividad_id_actividad_seq OWNED BY tb_actividad.id_actividad;


--
-- TOC entry 221 (class 1259 OID 17515)
-- Dependencies: 6
-- Name: tb_asistencia; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tb_asistencia (
    id integer NOT NULL,
    horas_impartidas character varying,
    fecha_asistencia date,
    curso_id integer,
    estado_id integer
);


ALTER TABLE public.tb_asistencia OWNER TO postgres;

--
-- TOC entry 220 (class 1259 OID 17513)
-- Dependencies: 221 6
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
-- TOC entry 2232 (class 0 OID 0)
-- Dependencies: 220
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
    fecha date
);


ALTER TABLE public.tb_auditoria OWNER TO postgres;

--
-- TOC entry 168 (class 1259 OID 16414)
-- Dependencies: 6 167
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
-- TOC entry 2233 (class 0 OID 0)
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
-- TOC entry 2234 (class 0 OID 0)
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
-- Dependencies: 6 213
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
-- TOC entry 2235 (class 0 OID 0)
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
    fecha_fin date,
    id_facilitador integer
);


ALTER TABLE public.tb_curso OWNER TO postgres;

--
-- TOC entry 170 (class 1259 OID 16419)
-- Dependencies: 6 169
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
-- TOC entry 2236 (class 0 OID 0)
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
    tipo_divulgacion_radio character varying(20),
    emisora character varying(25),
    dial character varying(10),
    canal character varying(25),
    tipo_divulgacion_tv character varying(25),
    nombre_tv character varying(50),
    prensa character varying(25),
    tipo_divulgacion_prensa character varying(25),
    hora_radio character varying,
    hora_tv character varying,
    fecha_actual character varying,
    fecha_prensa character varying
);


ALTER TABLE public.tb_divulgacion OWNER TO postgres;

--
-- TOC entry 172 (class 1259 OID 16424)
-- Dependencies: 171 6
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
-- TOC entry 2237 (class 0 OID 0)
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
    nombre character varying(100),
    fecha_prensa timestamp without time zone,
    tipo_divulgacion integer
);


ALTER TABLE public.tb_divulgacion_prensa OWNER TO postgres;

--
-- TOC entry 199 (class 1259 OID 17257)
-- Dependencies: 6 198
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
-- TOC entry 2238 (class 0 OID 0)
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
    id_tipo_divulgacion integer,
    nombre character varying(100),
    emisora character varying(100),
    dial bit(1),
    fecha_emision timestamp without time zone
);


ALTER TABLE public.tb_divulgacion_radio OWNER TO postgres;

--
-- TOC entry 201 (class 1259 OID 17262)
-- Dependencies: 200 6
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
-- TOC entry 2239 (class 0 OID 0)
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
    "nombre_ programa" character varying(100),
    canal character varying(50),
    hora_emision timestamp without time zone,
    tipo_divulgacion integer NOT NULL
);


ALTER TABLE public.tb_divulgacion_tv OWNER TO postgres;

--
-- TOC entry 203 (class 1259 OID 17267)
-- Dependencies: 202 6
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
-- TOC entry 2240 (class 0 OID 0)
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
-- TOC entry 2241 (class 0 OID 0)
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
-- TOC entry 2242 (class 0 OID 0)
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
-- Dependencies: 6 177
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
-- TOC entry 2243 (class 0 OID 0)
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
-- TOC entry 217 (class 1259 OID 17493)
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
    medios_otros_div character varying
);


ALTER TABLE public.tb_informe OWNER TO postgres;

--
-- TOC entry 216 (class 1259 OID 17491)
-- Dependencies: 6 217
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
-- TOC entry 2244 (class 0 OID 0)
-- Dependencies: 216
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
-- TOC entry 2245 (class 0 OID 0)
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
-- TOC entry 2246 (class 0 OID 0)
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
-- TOC entry 2247 (class 0 OID 0)
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
-- Dependencies: 187 6
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
-- TOC entry 2248 (class 0 OID 0)
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
    nombre character varying(100)
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
-- Dependencies: 189 6
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
-- TOC entry 2249 (class 0 OID 0)
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
-- TOC entry 2250 (class 0 OID 0)
-- Dependencies: 205
-- Name: tipo_divulgacion_id_tipo_divulgacion_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tipo_divulgacion_id_tipo_divulgacion_seq OWNED BY tb_tipo_divulgacion.id_tipo_divulgacion;


--
-- TOC entry 219 (class 1259 OID 17504)
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
-- TOC entry 218 (class 1259 OID 17502)
-- Dependencies: 6 219
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
-- TOC entry 2251 (class 0 OID 0)
-- Dependencies: 218
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
    estado_id integer
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
-- TOC entry 2252 (class 0 OID 0)
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
-- TOC entry 2253 (class 0 OID 0)
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
-- TOC entry 2254 (class 0 OID 0)
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
-- Dependencies: 6 193
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
-- TOC entry 2255 (class 0 OID 0)
-- Dependencies: 209
-- Name: tr_persona_curso_id_seq1; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tr_persona_curso_id_seq1 OWNED BY tr_persona_curso.id;


--
-- TOC entry 194 (class 1259 OID 16494)
-- Dependencies: 1956 1957 6
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
-- Dependencies: 1959 1960 1961 6
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
-- Dependencies: 195 6
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
-- TOC entry 2256 (class 0 OID 0)
-- Dependencies: 196
-- Name: users_groups_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE users_groups_id_seq OWNED BY users_groups.id;


--
-- TOC entry 197 (class 1259 OID 16510)
-- Dependencies: 6 194
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
-- TOC entry 2257 (class 0 OID 0)
-- Dependencies: 197
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE users_id_seq OWNED BY users.id;


--
-- TOC entry 1937 (class 2604 OID 17297)
-- Dependencies: 162 161
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY groups ALTER COLUMN id SET DEFAULT nextval('groups_id_seq'::regclass);


--
-- TOC entry 1939 (class 2604 OID 17298)
-- Dependencies: 164 163
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY login_attempts ALTER COLUMN id SET DEFAULT nextval('login_attempts_id_seq'::regclass);


--
-- TOC entry 1941 (class 2604 OID 17299)
-- Dependencies: 166 165
-- Name: id_actividad; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_actividad ALTER COLUMN id_actividad SET DEFAULT nextval('tb_actividad_id_actividad_seq'::regclass);


--
-- TOC entry 1972 (class 2604 OID 17518)
-- Dependencies: 220 221 221
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_asistencia ALTER COLUMN id SET DEFAULT nextval('tb_asistencia_id_seq'::regclass);


--
-- TOC entry 1942 (class 2604 OID 17300)
-- Dependencies: 168 167
-- Name: id_auditoria; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_auditoria ALTER COLUMN id_auditoria SET DEFAULT nextval('tb_auditoria_id_auditoria_seq'::regclass);


--
-- TOC entry 1966 (class 2604 OID 17395)
-- Dependencies: 207 208 208
-- Name: id_biblioteca; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_biblioteca ALTER COLUMN id_biblioteca SET DEFAULT nextval('tb_biblioteca_id_seq'::regclass);


--
-- TOC entry 1968 (class 2604 OID 17452)
-- Dependencies: 213 212 213
-- Name: id_cargo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_cargo ALTER COLUMN id_cargo SET DEFAULT nextval('tb_carro_id_cargo_seq'::regclass);


--
-- TOC entry 1943 (class 2604 OID 17301)
-- Dependencies: 170 169
-- Name: id_curso; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_curso ALTER COLUMN id_curso SET DEFAULT nextval('tb_curso_id_curso_seq'::regclass);


--
-- TOC entry 1944 (class 2604 OID 17302)
-- Dependencies: 172 171
-- Name: id_divulgacion; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_divulgacion ALTER COLUMN id_divulgacion SET DEFAULT nextval('tb_divulgacion_id_divulgacion_seq'::regclass);


--
-- TOC entry 1962 (class 2604 OID 17303)
-- Dependencies: 199 198
-- Name: id_divulgacion_prensa; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_divulgacion_prensa ALTER COLUMN id_divulgacion_prensa SET DEFAULT nextval('tb_divulgacion_prensa_id_divulgacion_prensa_seq'::regclass);


--
-- TOC entry 1963 (class 2604 OID 17304)
-- Dependencies: 201 200
-- Name: id_divulgacion_radio; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_divulgacion_radio ALTER COLUMN id_divulgacion_radio SET DEFAULT nextval('tb_divulgacion_radio_id_divulgacion_radio_seq'::regclass);


--
-- TOC entry 1964 (class 2604 OID 17305)
-- Dependencies: 203 202
-- Name: id_divulgacion_tv; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_divulgacion_tv ALTER COLUMN id_divulgacion_tv SET DEFAULT nextval('tb_divulgacion_tv_id_divulgacion_tv_seq'::regclass);


--
-- TOC entry 1945 (class 2604 OID 17306)
-- Dependencies: 174 173
-- Name: id_escala; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_escalas ALTER COLUMN id_escala SET DEFAULT nextval('tb_escalas_id_escala_seq'::regclass);


--
-- TOC entry 1946 (class 2604 OID 17307)
-- Dependencies: 176 175
-- Name: id_estado; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_estado ALTER COLUMN id_estado SET DEFAULT nextval('tb_estado_id_estado_seq'::regclass);


--
-- TOC entry 1947 (class 2604 OID 17308)
-- Dependencies: 178 177
-- Name: id_pregunta; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_evaluacion ALTER COLUMN id_pregunta SET DEFAULT nextval('tb_evaluacion_id_pregunta_seq'::regclass);


--
-- TOC entry 1970 (class 2604 OID 17496)
-- Dependencies: 217 216 217
-- Name: id_informe; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_informe ALTER COLUMN id_informe SET DEFAULT nextval('tb_informe_id_informe_seq'::regclass);


--
-- TOC entry 1948 (class 2604 OID 17313)
-- Dependencies: 182 181
-- Name: id_municipio; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_municipio ALTER COLUMN id_municipio SET DEFAULT nextval('tb_municipio_id_municipio_seq'::regclass);


--
-- TOC entry 1949 (class 2604 OID 17314)
-- Dependencies: 184 183
-- Name: id_parroquia; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_parroquia ALTER COLUMN id_parroquia SET DEFAULT nextval('tb_parroquia_id_parroquia_seq'::regclass);


--
-- TOC entry 1950 (class 2604 OID 17315)
-- Dependencies: 186 185
-- Name: id_persona; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_persona ALTER COLUMN id_persona SET DEFAULT nextval('tb_persona_id_persona_seq'::regclass);


--
-- TOC entry 1951 (class 2604 OID 17316)
-- Dependencies: 188 187
-- Name: id_redi; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_redi ALTER COLUMN id_redi SET DEFAULT nextval('tb_redi_id_redi_seq'::regclass);


--
-- TOC entry 1965 (class 2604 OID 17317)
-- Dependencies: 205 204
-- Name: id_tipo_divulgacion; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_tipo_divulgacion ALTER COLUMN id_tipo_divulgacion SET DEFAULT nextval('tipo_divulgacion_id_tipo_divulgacion_seq'::regclass);


--
-- TOC entry 1952 (class 2604 OID 16526)
-- Dependencies: 190 189
-- Name: id_usuario; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_usuario ALTER COLUMN id_usuario SET DEFAULT nextval('tb_usuario_id_usuario_seq'::regclass);


--
-- TOC entry 1969 (class 2604 OID 17463)
-- Dependencies: 215 214 215
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tr_curso_estado ALTER COLUMN id SET DEFAULT nextval('tr_curso_estado_id_seq'::regclass);


--
-- TOC entry 1967 (class 2604 OID 17434)
-- Dependencies: 211 210 211
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tr_curso_participantes ALTER COLUMN id SET DEFAULT nextval('tr_curso_participantes_id_seq'::regclass);


--
-- TOC entry 1953 (class 2604 OID 17318)
-- Dependencies: 192 191
-- Name: id_escala_evaluacion; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tr_escalas_evaluacion ALTER COLUMN id_escala_evaluacion SET DEFAULT nextval('tr_escalas_evaluacion_id_escala_evaluacion_seq'::regclass);


--
-- TOC entry 1971 (class 2604 OID 17507)
-- Dependencies: 219 218 219
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tr_persona_asistencia ALTER COLUMN id SET DEFAULT nextval('tr_curso_asistencia_id_seq'::regclass);


--
-- TOC entry 1954 (class 2604 OID 17412)
-- Dependencies: 209 193
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tr_persona_curso ALTER COLUMN id SET DEFAULT nextval('tr_persona_curso_id_seq1'::regclass);


--
-- TOC entry 1955 (class 2604 OID 17319)
-- Dependencies: 197 194
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY users ALTER COLUMN id SET DEFAULT nextval('users_id_seq'::regclass);


--
-- TOC entry 1958 (class 2604 OID 17320)
-- Dependencies: 196 195
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY users_groups ALTER COLUMN id SET DEFAULT nextval('users_groups_id_seq'::regclass);


--
-- TOC entry 2160 (class 0 OID 16394)
-- Dependencies: 161 2221
-- Data for Name: groups; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY groups (id, name, description) FROM stdin;
3	Facilitador	Facilitador de los cursos
2	Persona	Usuario general
1	admin	Administrador
\.


--
-- TOC entry 2258 (class 0 OID 0)
-- Dependencies: 162
-- Name: groups_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('groups_id_seq', 3, true);


--
-- TOC entry 2162 (class 0 OID 16400)
-- Dependencies: 163 2221
-- Data for Name: login_attempts; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY login_attempts (id, ip_address, login, "time") FROM stdin;
\.


--
-- TOC entry 2259 (class 0 OID 0)
-- Dependencies: 164
-- Name: login_attempts_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('login_attempts_id_seq', 1, false);


--
-- TOC entry 2164 (class 0 OID 16406)
-- Dependencies: 165 2221
-- Data for Name: tb_actividad; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY tb_actividad (id_actividad, id_usuario, titulo, descripcion, fecha) FROM stdin;
3	1	pra	kajhdlfjka adjhflajk asdjf lasdjf asfhladjfhlskdjclc	2015-06-10
4	1	Seminario22	Abuso sexual, diferentes posiciones eroticas para mayores de 75 años, con diversas difiultades cardiovasculares y padecimiento de osteoporosis	2015-10-09
2	1	Pro	proyectdfjksnk	2015-06-16
\.


--
-- TOC entry 2260 (class 0 OID 0)
-- Dependencies: 166
-- Name: tb_actividad_id_actividad_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tb_actividad_id_actividad_seq', 5, true);


--
-- TOC entry 2220 (class 0 OID 17515)
-- Dependencies: 221 2221
-- Data for Name: tb_asistencia; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY tb_asistencia (id, horas_impartidas, fecha_asistencia, curso_id, estado_id) FROM stdin;
1	2	2015-02-10	27	24
2	2	2015-02-10	27	14
3	3	2015-02-09	27	14
4	3	2015-02-11	27	14
\.


--
-- TOC entry 2261 (class 0 OID 0)
-- Dependencies: 220
-- Name: tb_asistencia_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tb_asistencia_id_seq', 4, true);


--
-- TOC entry 2166 (class 0 OID 16411)
-- Dependencies: 167 2221
-- Data for Name: tb_auditoria; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY tb_auditoria (id_auditoria, id_usuario, accion, fecha) FROM stdin;
\.


--
-- TOC entry 2262 (class 0 OID 0)
-- Dependencies: 168
-- Name: tb_auditoria_id_auditoria_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tb_auditoria_id_auditoria_seq', 1, false);


--
-- TOC entry 2207 (class 0 OID 17392)
-- Dependencies: 208 2221
-- Data for Name: tb_biblioteca; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY tb_biblioteca (id_biblioteca, descripcion, ruta, tipo_multimedia, titulo) FROM stdin;
1	\N	./uploads/fondo.png	Archivo	fondo.png
2	ksdjkdsjk	./uploads/RD 967-2014 solicitud equivalencia.docx	Archivo	RD 967-2014 solicitud equivalencia.docx
4	planilla	./uploads/planilla.pdf	Archivo	planilla.pdf
5	gay	./uploads/jp.JPG	Archivo	jp.JPG
6	jjjk	./uploads/Antecedentes pst.docx	Archivo	Antecedentes pst.docx
7	fefe	./uploads/Wrox.Professional.Java.for.Web.Applications.Feb.2014.pdf	Archivo	Wrox.Professional.Java.for.Web.Applications.Feb.2014.pdf
8	\N	./uploads/	\N	\N
\.


--
-- TOC entry 2263 (class 0 OID 0)
-- Dependencies: 207
-- Name: tb_biblioteca_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tb_biblioteca_id_seq', 8, true);


--
-- TOC entry 2212 (class 0 OID 17449)
-- Dependencies: 213 2221
-- Data for Name: tb_cargo; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY tb_cargo (id_cargo, cargo) FROM stdin;
1	Facilitador
2	Asistente
4	Coordinador
3	Instructor de Formacion
5	Administrador
\.


--
-- TOC entry 2264 (class 0 OID 0)
-- Dependencies: 212
-- Name: tb_carro_id_cargo_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tb_carro_id_cargo_seq', 5, true);


--
-- TOC entry 2168 (class 0 OID 16416)
-- Dependencies: 169 2221
-- Data for Name: tb_curso; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY tb_curso (id_curso, nombre, duracion, nro_participantes, status, fecha_inicio, fecha_fin, id_facilitador) FROM stdin;
27	joy	20	20	1	2015-02-09	2015-02-19	\N
28	manualidades	20	10	1	2015-02-10	2015-02-20	\N
\.


--
-- TOC entry 2265 (class 0 OID 0)
-- Dependencies: 170
-- Name: tb_curso_id_curso_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tb_curso_id_curso_seq', 29, true);


--
-- TOC entry 2170 (class 0 OID 16421)
-- Dependencies: 171 2221
-- Data for Name: tb_divulgacion; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY tb_divulgacion (id_divulgacion, id_curso, tipo_divulgacion_radio, emisora, dial, canal, tipo_divulgacion_tv, nombre_tv, prensa, tipo_divulgacion_prensa, hora_radio, hora_tv, fecha_actual, fecha_prensa) FROM stdin;
1	27	0	test	09	venevision	0	noticiero	lider	0	12	11	2015-02-11	12-02-2015
2	27	0	2	2						2		2015-02-11	
\.


--
-- TOC entry 2266 (class 0 OID 0)
-- Dependencies: 172
-- Name: tb_divulgacion_id_divulgacion_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tb_divulgacion_id_divulgacion_seq', 2, true);


--
-- TOC entry 2197 (class 0 OID 17254)
-- Dependencies: 198 2221
-- Data for Name: tb_divulgacion_prensa; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY tb_divulgacion_prensa (id_divulgacion_prensa, nombre, fecha_prensa, tipo_divulgacion) FROM stdin;
\.


--
-- TOC entry 2267 (class 0 OID 0)
-- Dependencies: 199
-- Name: tb_divulgacion_prensa_id_divulgacion_prensa_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tb_divulgacion_prensa_id_divulgacion_prensa_seq', 1, false);


--
-- TOC entry 2199 (class 0 OID 17259)
-- Dependencies: 200 2221
-- Data for Name: tb_divulgacion_radio; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY tb_divulgacion_radio (id_divulgacion_radio, id_tipo_divulgacion, nombre, emisora, dial, fecha_emision) FROM stdin;
\.


--
-- TOC entry 2268 (class 0 OID 0)
-- Dependencies: 201
-- Name: tb_divulgacion_radio_id_divulgacion_radio_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tb_divulgacion_radio_id_divulgacion_radio_seq', 1, false);


--
-- TOC entry 2201 (class 0 OID 17264)
-- Dependencies: 202 2221
-- Data for Name: tb_divulgacion_tv; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY tb_divulgacion_tv (id_divulgacion_tv, "nombre_ programa", canal, hora_emision, tipo_divulgacion) FROM stdin;
1	Quien quiere ser millonario	televen	2015-01-25 00:00:00	1
\.


--
-- TOC entry 2269 (class 0 OID 0)
-- Dependencies: 203
-- Name: tb_divulgacion_tv_id_divulgacion_tv_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tb_divulgacion_tv_id_divulgacion_tv_seq', 1, true);


--
-- TOC entry 2172 (class 0 OID 16426)
-- Dependencies: 173 2221
-- Data for Name: tb_escalas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY tb_escalas (id_escala, descripcion, status) FROM stdin;
1	Excelente	1
2	Muy bueno	1
3	Bueno	1
4	Regular	1
5	Deficiente	1
\.


--
-- TOC entry 2270 (class 0 OID 0)
-- Dependencies: 174
-- Name: tb_escalas_id_escala_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tb_escalas_id_escala_seq', 1, false);


--
-- TOC entry 2174 (class 0 OID 16431)
-- Dependencies: 175 2221
-- Data for Name: tb_estado; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY tb_estado (id_estado, id_redi, nombre) FROM stdin;
1	5	Amazonas
2	4	Anzoátegui
3	3	Apure
4	1	Aragua
5	3	Barinas
6	5	Bolívar
7	1	Carabobo
8	3	Cojedes
9	5	Delta Amacuro
10	2	Falcón
11	3	Guárico
12	2	Lara
13	6	Mérida
14	1	Miranda
15	4	Monagas
16	7	Nueva Esparta
17	3	Portuguesa
18	4	Sucre
19	6	Táchira
20	6	Trujillo
21	1	Vargas
22	2	Yaracuy
23	2	Zulia
24	1	Distrito Capital
25	7	Dependencias Federales
\.


--
-- TOC entry 2271 (class 0 OID 0)
-- Dependencies: 176
-- Name: tb_estado_id_estado_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tb_estado_id_estado_seq', 1, false);


--
-- TOC entry 2176 (class 0 OID 16436)
-- Dependencies: 177 2221
-- Data for Name: tb_evaluacion; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY tb_evaluacion (id_pregunta, descripcion, status) FROM stdin;
1	¿Qué le pareció la calidad de los contenidos impartidos en la actividad?	1
2	¿Cuál es su evaluación del desempeño de los facilitadoras/es?	1
3	¿El cumplimiento del programa establecido para la actividad fue?	1
4	¿Cuál es su opinión sobre la calidad de la bibliografía suministrada?	1
5	¿Cómo le pareció el tiempo dedicado a la actividad?	1
6	¿Qué le pareció la participación de las y los asistentes?	1
7	¿Cuál es su opinión del local donde se realizó la actividad?	1
8	¿Cuál es su opinión de los recursos de apoyo para la actividad?	1
9	¿Cuál es su evaluación general de la actividad?	1
10	Escriba alguna sugerencia de aspectos que podrían mejorar	1
\.


--
-- TOC entry 2272 (class 0 OID 0)
-- Dependencies: 178
-- Name: tb_evaluacion_id_pregunta_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tb_evaluacion_id_pregunta_seq', 1, false);


--
-- TOC entry 2178 (class 0 OID 16441)
-- Dependencies: 179 2221
-- Data for Name: tb_general; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY tb_general (id_persona, institucion_labora, cargo, telefono, email) FROM stdin;
20			false	
12	ast	analista programador	false	ast@ast.com.ve
\.


--
-- TOC entry 2216 (class 0 OID 17493)
-- Dependencies: 217 2221
-- Data for Name: tb_informe; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY tb_informe (id_informe, id_redi, id_estado, id_municipio, id_parroquia, id_usuario, id_curso, tipo_actividad_for, act_nombre_for, tot_asistentes_for, tot_femeninos_for, tot_masculinos_for, tot_div_sexual_for, tot_mujeres_indigenas_for, tot_mujeres_discapacidad_for, tot_mujeres_afrodecendientes_for, tot_movimientos_mujeres_for, nombre_movimiento_for, fec_inicio_for, hora_inicio_for, fec_final_for, hora_final_for, tipo_actividad_div, act_nombre_div, tot_asistentes_div, tot_femeninos_div, tot_masculinos_div, tot_div_sexual_div, tot_mujeres_indigenas_div, tot_mujeres_discapacidad_div, tot_mujeres_afrodecendientes_div, tipo_material_div, cantidad_div, convocacion_medios_div, medios_radio_div, medios_prensa_div, medios_tv_div, medios_comunitarios_div, medios_otros_div) FROM stdin;
2	1	4	52	148	1	2	Taller	taller social	24	11	12	1	2	3	4	5	varios	2015-02-01	19:06:25	2015-02-02	19:06:25	Toma comunitaria	toma comunitaria	25	13	12	6	7	8	9	Folletos	23	Si	radio	prensa	T.V.	Medios Comunitarios	false
3	2	10	121	397	1	2	Foro	prueba	24	12	12	0	1	0	2	3	varios	2015-02-01	19:06:25	2015-02-03	19:06:25	Bautizo	bautizo	24	13	11	2	2	2	2	Tripticos	23	Si	radio	prensa	false	false	false
\.


--
-- TOC entry 2273 (class 0 OID 0)
-- Dependencies: 216
-- Name: tb_informe_id_informe_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tb_informe_id_informe_seq', 1, false);


--
-- TOC entry 2179 (class 0 OID 16449)
-- Dependencies: 180 2221
-- Data for Name: tb_mmdb; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY tb_mmdb (id_persona, beneficiaria, comite, responsabilidad, proy_socio_productivo, frente_comites) FROM stdin;
\.


--
-- TOC entry 2180 (class 0 OID 16452)
-- Dependencies: 181 2221
-- Data for Name: tb_municipio; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY tb_municipio (id_municipio, id_estado, nombre) FROM stdin;
1	1	Alto Orinoco
2	1	Atabapo
3	1	Atures
4	1	Autana
5	1	Manapiare
6	1	Maroa
7	1	Río Negro
8	2	Anaco
9	2	Aragua
10	2	Manuel Ezequiel Bruzual
11	2	Diego Bautista Urbaneja
12	2	Fernando Peñalver
13	2	Francisco Del Carmen Carvajal
14	2	General Sir Arthur McGregor
15	2	Guanta
16	2	Independencia
17	2	José Gregorio Monagas
18	2	Juan Antonio Sotillo
19	2	Juan Manuel Cajigal
20	2	Libertad
21	2	Francisco de Miranda
22	2	Pedro María Freites
23	2	Píritu
24	2	San José de Guanipa
25	2	San Juan de Capistrano
26	2	Santa Ana
27	2	Simón Bolívar
28	2	Simón Rodríguez
29	3	Achaguas
30	3	Biruaca
31	3	Muñóz
32	3	Páez
33	3	Pedro Camejo
34	3	Rómulo Gallegos
35	3	San Fernando
36	4	Atanasio Girardot
37	4	Bolívar
38	4	Camatagua
39	4	Francisco Linares Alcántara
40	4	José Ángel Lamas
41	4	José Félix Ribas
42	4	José Rafael Revenga
43	4	Libertador
44	4	Mario Briceño Iragorry
45	4	Ocumare de la Costa de Oro
46	4	San Casimiro
47	4	San Sebastián
48	4	Santiago Mariño
49	4	Santos Michelena
50	4	Sucre
51	4	Tovar
52	4	Urdaneta
53	4	Zamora
54	5	Alberto Arvelo Torrealba
55	5	Andrés Eloy Blanco
56	5	Antonio José de Sucre
57	5	Arismendi
58	5	Barinas
59	5	Bolívar
60	5	Cruz Paredes
61	5	Ezequiel Zamora
62	5	Obispos
63	5	Pedraza
64	5	Rojas
65	5	Sosa
66	6	Caroní
67	6	Cedeño
68	6	El Callao
69	6	Gran Sabana
70	6	Heres
71	6	Piar
72	6	Angostura (Raúl Leoni)
73	6	Roscio
74	6	Sifontes
75	6	Sucre
76	6	Padre Pedro Chien
77	7	Bejuma
78	7	Carlos Arvelo
79	7	Diego Ibarra
80	7	Guacara
81	7	Juan José Mora
82	7	Libertador
83	7	Los Guayos
84	7	Miranda
85	7	Montalbán
86	7	Naguanagua
87	7	Puerto Cabello
88	7	San Diego
89	7	San Joaquín
90	7	Valencia
91	8	Anzoátegui
92	8	Tinaquillo
93	8	Girardot
94	8	Lima Blanco
95	8	Pao de San Juan Bautista
96	8	Ricaurte
97	8	Rómulo Gallegos
98	8	San Carlos
99	8	Tinaco
100	9	Antonio Díaz
101	9	Casacoima
102	9	Pedernales
103	9	Tucupita
104	10	Acosta
105	10	Bolívar
106	10	Buchivacoa
107	10	Cacique Manaure
108	10	Carirubana
109	10	Colina
110	10	Dabajuro
111	10	Democracia
112	10	Falcón
113	10	Federación
114	10	Jacura
115	10	José Laurencio Silva
116	10	Los Taques
117	10	Mauroa
118	10	Miranda
119	10	Monseñor Iturriza
120	10	Palmasola
121	10	Petit
122	10	Píritu
123	10	San Francisco
124	10	Sucre
125	10	Tocópero
126	10	Unión
127	10	Urumaco
128	10	Zamora
129	11	Camaguán
130	11	Chaguaramas
131	11	El Socorro
132	11	José Félix Ribas
133	11	José Tadeo Monagas
134	11	Juan Germán Roscio
135	11	Julián Mellado
136	11	Las Mercedes
137	11	Leonardo Infante
138	11	Pedro Zaraza
139	11	Ortíz
140	11	San Gerónimo de Guayabal
141	11	San José de Guaribe
142	11	Santa María de Ipire
143	11	Sebastián Francisco de Miranda
144	12	Andrés Eloy Blanco
145	12	Crespo
146	12	Iribarren
147	12	Jiménez
148	12	Morán
149	12	Palavecino
150	12	Simón Planas
151	12	Torres
152	12	Urdaneta
179	13	Alberto Adriani
180	13	Andrés Bello
181	13	Antonio Pinto Salinas
182	13	Aricagua
183	13	Arzobispo Chacón
184	13	Campo Elías
185	13	Caracciolo Parra Olmedo
186	13	Cardenal Quintero
187	13	Guaraque
188	13	Julio César Salas
189	13	Justo Briceño
190	13	Libertador
191	13	Miranda
192	13	Obispo Ramos de Lora
193	13	Padre Noguera
194	13	Pueblo Llano
195	13	Rangel
196	13	Rivas Dávila
197	13	Santos Marquina
198	13	Sucre
199	13	Tovar
200	13	Tulio Febres Cordero
201	13	Zea
223	14	Acevedo
224	14	Andrés Bello
225	14	Baruta
226	14	Brión
227	14	Buroz
228	14	Carrizal
229	14	Chacao
230	14	Cristóbal Rojas
231	14	El Hatillo
232	14	Guaicaipuro
233	14	Independencia
234	14	Lander
235	14	Los Salias
236	14	Páez
237	14	Paz Castillo
238	14	Pedro Gual
239	14	Plaza
240	14	Simón Bolívar
241	14	Sucre
242	14	Urdaneta
243	14	Zamora
258	15	Acosta
259	15	Aguasay
260	15	Bolívar
261	15	Caripe
262	15	Cedeño
263	15	Ezequiel Zamora
264	15	Libertador
265	15	Maturín
266	15	Piar
267	15	Punceres
268	15	Santa Bárbara
269	15	Sotillo
270	15	Uracoa
271	16	Antolín del Campo
272	16	Arismendi
273	16	García
274	16	Gómez
275	16	Maneiro
276	16	Marcano
277	16	Mariño
278	16	Península de Macanao
279	16	Tubores
280	16	Villalba
281	16	Díaz
282	17	Agua Blanca
283	17	Araure
284	17	Esteller
285	17	Guanare
286	17	Guanarito
287	17	Monseñor José Vicente de Unda
288	17	Ospino
289	17	Páez
290	17	Papelón
291	17	San Genaro de Boconoíto
292	17	San Rafael de Onoto
293	17	Santa Rosalía
294	17	Sucre
295	17	Turén
296	18	Andrés Eloy Blanco
297	18	Andrés Mata
298	18	Arismendi
299	18	Benítez
300	18	Bermúdez
301	18	Bolívar
302	18	Cajigal
303	18	Cruz Salmerón Acosta
304	18	Libertador
305	18	Mariño
306	18	Mejía
307	18	Montes
308	18	Ribero
309	18	Sucre
310	18	Valdéz
341	19	Andrés Bello
342	19	Antonio Rómulo Costa
343	19	Ayacucho
344	19	Bolívar
345	19	Cárdenas
346	19	Córdoba
347	19	Fernández Feo
348	19	Francisco de Miranda
349	19	García de Hevia
350	19	Guásimos
351	19	Independencia
352	19	Jáuregui
353	19	José María Vargas
354	19	Junín
355	19	Libertad
356	19	Libertador
357	19	Lobatera
358	19	Michelena
359	19	Panamericano
360	19	Pedro María Ureña
361	19	Rafael Urdaneta
362	19	Samuel Darío Maldonado
363	19	San Cristóbal
364	19	Seboruco
365	19	Simón Rodríguez
366	19	Sucre
367	19	Torbes
368	19	Uribante
369	19	San Judas Tadeo
370	20	Andrés Bello
371	20	Boconó
372	20	Bolívar
373	20	Candelaria
374	20	Carache
375	20	Escuque
376	20	José Felipe Márquez Cañizalez
377	20	Juan Vicente Campos Elías
378	20	La Ceiba
379	20	Miranda
380	20	Monte Carmelo
381	20	Motatán
382	20	Pampán
383	20	Pampanito
384	20	Rafael Rangel
385	20	San Rafael de Carvajal
386	20	Sucre
387	20	Trujillo
388	20	Urdaneta
389	20	Valera
390	21	Vargas
391	22	Arístides Bastidas
392	22	Bolívar
407	22	Bruzual
408	22	Cocorote
409	22	Independencia
410	22	José Antonio Páez
411	22	La Trinidad
412	22	Manuel Monge
413	22	Nirgua
414	22	Peña
415	22	San Felipe
416	22	Sucre
417	22	Urachiche
418	22	José Joaquín Veroes
441	23	Almirante Padilla
442	23	Baralt
443	23	Cabimas
444	23	Catatumbo
445	23	Colón
446	23	Francisco Javier Pulgar
447	23	Páez
448	23	Jesús Enrique Losada
449	23	Jesús María Semprún
450	23	La Cañada de Urdaneta
451	23	Lagunillas
452	23	Machiques de Perijá
453	23	Mara
454	23	Maracaibo
455	23	Miranda
456	23	Rosario de Perijá
457	23	San Francisco
458	23	Santa Rita
459	23	Simón Bolívar
460	23	Sucre
461	23	Valmore Rodríguez
462	24	Libertador
\.


--
-- TOC entry 2274 (class 0 OID 0)
-- Dependencies: 182
-- Name: tb_municipio_id_municipio_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tb_municipio_id_municipio_seq', 1, false);


--
-- TOC entry 2182 (class 0 OID 16457)
-- Dependencies: 183 2221
-- Data for Name: tb_parroquia; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY tb_parroquia (id_parroquia, id_municipio, nombre) FROM stdin;
1	1	Alto Orinoco
2	1	Huachamacare Acanaña
3	1	Marawaka Toky Shamanaña
4	1	Mavaka Mavaka
5	1	Sierra Parima Parimabé
6	2	Ucata Laja Lisa
7	2	Yapacana Macuruco
8	2	Caname Guarinuma
9	3	Fernando Girón Tovar
10	3	Luis Alberto Gómez
11	3	Pahueña Limón de Parhueña
12	3	Platanillal Platanillal
13	4	Samariapo
14	4	Sipapo
15	4	Munduapo
16	4	Guayapo
17	5	Alto Ventuari
18	5	Medio Ventuari
19	5	Bajo Ventuari
20	6	Victorino
21	6	Comunidad
22	7	Casiquiare
23	7	Cocuy
24	7	San Carlos de Río Negro
25	7	Solano
26	8	Anaco
27	8	San Joaquín
28	9	Cachipo
29	9	Aragua de Barcelona
30	11	Lechería
31	11	El Morro
32	12	Puerto Píritu
33	12	San Miguel
34	12	Sucre
35	13	Valle de Guanape
36	13	Santa Bárbara
37	14	El Chaparro
38	14	Tomás Alfaro
39	14	Calatrava
40	15	Guanta
41	15	Chorrerón
42	16	Mamo
43	16	Soledad
44	17	Mapire
45	17	Piar
46	17	Santa Clara
47	17	San Diego de Cabrutica
48	17	Uverito
49	17	Zuata
50	18	Puerto La Cruz
51	18	Pozuelos
52	19	Onoto
53	19	San Pablo
54	20	San Mateo
55	20	El Carito
56	20	Santa Inés
57	20	La Romereña
58	21	Atapirire
59	21	Boca del Pao
60	21	El Pao
61	21	Pariaguán
62	22	Cantaura
63	22	Libertador
64	22	Santa Rosa
65	22	Urica
66	23	Píritu
67	23	San Francisco
68	24	San José de Guanipa
69	25	Boca de Uchire
70	25	Boca de Chávez
71	26	Pueblo Nuevo
72	26	Santa Ana
73	27	Bergatín
74	27	Caigua
75	27	El Carmen
76	27	El Pilar
77	27	Naricual
78	27	San Crsitóbal
79	28	Edmundo Barrios
80	28	Miguel Otero Silva
81	29	Achaguas
82	29	Apurito
83	29	El Yagual
84	29	Guachara
85	29	Mucuritas
86	29	Queseras del medio
87	30	Biruaca
88	31	Bruzual
89	31	Mantecal
90	31	Quintero
91	31	Rincón Hondo
92	31	San Vicente
93	32	Guasdualito
94	32	Aramendi
95	32	El Amparo
96	32	San Camilo
97	32	Urdaneta
98	33	San Juan de Payara
99	33	Codazzi
100	33	Cunaviche
101	34	Elorza
102	34	La Trinidad
103	35	San Fernando
104	35	El Recreo
105	35	Peñalver
106	35	San Rafael de Atamaica
107	36	Pedro José Ovalles
108	36	Joaquín Crespo
109	36	José Casanova Godoy
110	36	Madre María de San José
111	36	Andrés Eloy Blanco
112	36	Los Tacarigua
113	36	Las Delicias
114	36	Choroní
115	37	Bolívar
116	38	Camatagua
117	38	Carmen de Cura
118	39	Santa Rita
119	39	Francisco de Miranda
120	39	Moseñor Feliciano González
121	40	Santa Cruz
122	41	José Félix Ribas
123	41	Castor Nieves Ríos
124	41	Las Guacamayas
125	41	Pao de Zárate
126	41	Zuata
127	42	José Rafael Revenga
128	43	Palo Negro
129	43	San Martín de Porres
130	44	El Limón
131	44	Caña de Azúcar
132	45	Ocumare de la Costa
133	46	San Casimiro
134	46	Güiripa
135	46	Ollas de Caramacate
136	46	Valle Morín
137	47	San Sebastían
138	48	Turmero
139	48	Arevalo Aponte
140	48	Chuao
141	48	Samán de Güere
142	48	Alfredo Pacheco Miranda
143	49	Santos Michelena
144	49	Tiara
145	50	Cagua
146	50	Bella Vista
147	51	Tovar
148	52	Urdaneta
149	52	Las Peñitas
150	52	San Francisco de Cara
151	52	Taguay
152	53	Zamora
153	53	Magdaleno
154	53	San Francisco de Asís
155	53	Valles de Tucutunemo
156	53	Augusto Mijares
157	54	Sabaneta
158	54	Juan Antonio Rodríguez Domínguez
159	55	El Cantón
160	55	Santa Cruz de Guacas
161	55	Puerto Vivas
162	56	Ticoporo
163	56	Nicolás Pulido
164	56	Andrés Bello
165	57	Arismendi
166	57	Guadarrama
167	57	La Unión
168	57	San Antonio
169	58	Barinas
170	58	Alberto Arvelo Larriva
171	58	San Silvestre
172	58	Santa Inés
173	58	Santa Lucía
174	58	Torumos
175	58	El Carmen
176	58	Rómulo Betancourt
177	58	Corazón de Jesús
178	58	Ramón Ignacio Méndez
179	58	Alto Barinas
180	58	Manuel Palacio Fajardo
181	58	Juan Antonio Rodríguez Domínguez
182	58	Dominga Ortiz de Páez
183	59	Barinitas
184	59	Altamira de Cáceres
185	59	Calderas
186	60	Barrancas
187	60	El Socorro
188	60	Mazparrito
189	61	Santa Bárbara
190	61	Pedro Briceño Méndez
191	61	Ramón Ignacio Méndez
192	61	José Ignacio del Pumar
193	62	Obispos
194	62	Guasimitos
195	62	El Real
196	62	La Luz
197	63	Ciudad Bolívia
198	63	José Ignacio Briceño
199	63	José Félix Ribas
200	63	Páez
201	64	Libertad
202	64	Dolores
203	64	Santa Rosa
204	64	Palacio Fajardo
205	65	Ciudad de Nutrias
206	65	El Regalo
207	65	Puerto Nutrias
208	65	Santa Catalina
209	66	Cachamay
210	66	Chirica
211	66	Dalla Costa
212	66	Once de Abril
213	66	Simón Bolívar
214	66	Unare
215	66	Universidad
216	66	Vista al Sol
217	66	Pozo Verde
218	66	Yocoima
219	66	5 de Julio
220	67	Cedeño
221	67	Altagracia
222	67	Ascensión Farreras
223	67	Guaniamo
224	67	La Urbana
225	67	Pijiguaos
226	68	El Callao
227	69	Gran Sabana
228	69	Ikabarú
229	70	Catedral
230	70	Zea
231	70	Orinoco
232	70	José Antonio Páez
233	70	Marhuanta
234	70	Agua Salada
235	70	Vista Hermosa
236	70	La Sabanita
237	70	Panapana
238	71	Andrés Eloy Blanco
239	71	Pedro Cova
240	72	Raúl Leoni
241	72	Barceloneta
242	72	Santa Bárbara
243	72	San Francisco
244	73	Roscio
245	73	Salóm
246	74	Sifontes
247	74	Dalla Costa
248	74	San Isidro
249	75	Sucre
250	75	Aripao
251	75	Guarataro
252	75	Las Majadas
253	75	Moitaco
254	76	Padre Pedro Chien
255	76	Río Grande
256	77	Bejuma
257	77	Canoabo
258	77	Simón Bolívar
259	78	Güigüe
260	78	Carabobo
261	78	Tacarigua
262	79	Mariara
263	79	Aguas Calientes
264	80	Ciudad Alianza
265	80	Guacara
266	80	Yagua
267	81	Morón
268	81	Yagua
269	82	Tocuyito
270	82	Independencia
271	83	Los Guayos
272	84	Miranda
273	85	Montalbán
274	86	Naguanagua
275	87	Bartolomé Salóm
276	87	Democracia
277	87	Fraternidad
278	87	Goaigoaza
279	87	Juan José Flores
280	87	Unión
281	87	Borburata
282	87	Patanemo
283	88	San Diego
284	89	San Joaquín
285	90	Candelaria
286	90	Catedral
287	90	El Socorro
288	90	Miguel Peña
289	90	Rafael Urdaneta
290	90	San Blas
291	90	San José
292	90	Santa Rosa
293	90	Negro Primero
294	91	Cojedes
295	91	Juan de Mata Suárez
296	92	Tinaquillo
297	93	El Baúl
298	93	Sucre
299	94	La Aguadita
300	94	Macapo
301	95	El Pao
302	96	El Amparo
303	96	Libertad de Cojedes
304	97	Rómulo Gallegos
305	98	San Carlos de Austria
306	98	Juan Ángel Bravo
307	98	Manuel Manrique
308	99	General en Jefe José Laurencio Silva
309	100	Curiapo
310	100	Almirante Luis Brión
311	100	Francisco Aniceto Lugo
312	100	Manuel Renaud
313	100	Padre Barral
314	100	Santos de Abelgas
315	101	Imataca
316	101	Cinco de Julio
317	101	Juan Bautista Arismendi
318	101	Manuel Piar
319	101	Rómulo Gallegos
320	102	Pedernales
321	102	Luis Beltrán Prieto Figueroa
322	103	San José (Delta Amacuro)
323	103	José Vidal Marcano
324	103	Juan Millán
325	103	Leonardo Ruíz Pineda
326	103	Mariscal Antonio José de Sucre
327	103	Monseñor Argimiro García
328	103	San Rafael (Delta Amacuro)
329	103	Virgen del Valle
330	10	Clarines
331	10	Guanape
332	10	Sabana de Uchire
333	104	Capadare
334	104	La Pastora
335	104	Libertador
336	104	San Juan de los Cayos
337	105	Aracua
338	105	La Peña
339	105	San Luis
340	106	Bariro
341	106	Borojó
342	106	Capatárida
343	106	Guajiro
344	106	Seque
345	106	Zazárida
346	106	Valle de Eroa
347	107	Cacique Manaure
348	108	Norte
349	108	Carirubana
350	108	Santa Ana
351	108	Urbana Punta Cardón
352	109	La Vela de Coro
353	109	Acurigua
354	109	Guaibacoa
355	109	Las Calderas
356	109	Macoruca
357	110	Dabajuro
358	111	Agua Clara
359	111	Avaria
360	111	Pedregal
361	111	Piedra Grande
362	111	Purureche
363	112	Adaure
364	112	Adícora
365	112	Baraived
366	112	Buena Vista
367	112	Jadacaquiva
368	112	El Vínculo
369	112	El Hato
370	112	Moruy
371	112	Pueblo Nuevo
372	113	Agua Larga
373	113	El Paují
374	113	Independencia
375	113	Mapararí
376	114	Agua Linda
377	114	Araurima
378	114	Jacura
379	115	Tucacas
380	115	Boca de Aroa
381	116	Los Taques
382	116	Judibana
383	117	Mene de Mauroa
384	117	San Félix
385	117	Casigua
386	118	Guzmán Guillermo
387	118	Mitare
388	118	Río Seco
389	118	Sabaneta
390	118	San Antonio
391	118	San Gabriel
392	118	Santa Ana
393	119	Boca del Tocuyo
394	119	Chichiriviche
395	119	Tocuyo de la Costa
396	120	Palmasola
397	121	Cabure
398	121	Colina
399	121	Curimagua
400	122	San José de la Costa
401	122	Píritu
402	123	San Francisco
403	124	Sucre
404	124	Pecaya
405	125	Tocópero
406	126	El Charal
407	126	Las Vegas del Tuy
408	126	Santa Cruz de Bucaral
409	127	Bruzual
410	127	Urumaco
411	128	Puerto Cumarebo
412	128	La Ciénaga
413	128	La Soledad
414	128	Pueblo Cumarebo
415	128	Zazárida
416	113	Churuguara
417	129	Camaguán
418	129	Puerto Miranda
419	129	Uverito
420	130	Chaguaramas
421	131	El Socorro
422	132	Tucupido
423	132	San Rafael de Laya
424	133	Altagracia de Orituco
425	133	San Rafael de Orituco
426	133	San Francisco Javier de Lezama
427	133	Paso Real de Macaira
428	133	Carlos Soublette
429	133	San Francisco de Macaira
430	133	Libertad de Orituco
431	134	Cantaclaro
432	134	San Juan de los Morros
433	134	Parapara
434	135	El Sombrero
435	135	Sosa
436	136	Las Mercedes
437	136	Cabruta
438	136	Santa Rita de Manapire
439	137	Valle de la Pascua
440	137	Espino
441	138	San José de Unare
442	138	Zaraza
443	139	San José de Tiznados
444	139	San Francisco de Tiznados
445	139	San Lorenzo de Tiznados
446	139	Ortiz
447	140	Guayabal
448	140	Cazorla
449	141	San José de Guaribe
450	141	Uveral
451	142	Santa María de Ipire
452	142	Altamira
453	143	El Calvario
454	143	El Rastro
455	143	Guardatinajas
456	143	Capital Urbana Calabozo
457	144	Quebrada Honda de Guache
458	144	Pío Tamayo
459	144	Yacambú
460	145	Fréitez
461	145	José María Blanco
462	146	Catedral
463	146	Concepción
464	146	El Cují
465	146	Juan de Villegas
466	146	Santa Rosa
467	146	Tamaca
468	146	Unión
469	146	Aguedo Felipe Alvarado
470	146	Buena Vista
471	146	Juárez
472	147	Juan Bautista Rodríguez
473	147	Cuara
474	147	Diego de Lozada
475	147	Paraíso de San José
476	147	San Miguel
477	147	Tintorero
478	147	José Bernardo Dorante
479	147	Coronel Mariano Peraza 
480	148	Bolívar
481	148	Anzoátegui
482	148	Guarico
483	148	Hilario Luna y Luna
484	148	Humocaro Alto
485	148	Humocaro Bajo
486	148	La Candelaria
487	148	Morán
488	149	Cabudare
489	149	José Gregorio Bastidas
490	149	Agua Viva
491	150	Sarare
492	150	Buría
493	150	Gustavo Vegas León
494	151	Trinidad Samuel
495	151	Antonio Díaz
496	151	Camacaro
497	151	Castañeda
498	151	Cecilio Zubillaga
499	151	Chiquinquirá
500	151	El Blanco
501	151	Espinoza de los Monteros
502	151	Lara
503	151	Las Mercedes
504	151	Manuel Morillo
505	151	Montaña Verde
506	151	Montes de Oca
507	151	Torres
508	151	Heriberto Arroyo
509	151	Reyes Vargas
510	151	Altagracia
511	152	Siquisique
512	152	Moroturo
513	152	San Miguel
514	152	Xaguas
515	179	Presidente Betancourt
516	179	Presidente Páez
517	179	Presidente Rómulo Gallegos
518	179	Gabriel Picón González
519	179	Héctor Amable Mora
520	179	José Nucete Sardi
521	179	Pulido Méndez
522	180	La Azulita
523	181	Santa Cruz de Mora
524	181	Mesa Bolívar
525	181	Mesa de Las Palmas
526	182	Aricagua
527	182	San Antonio
528	183	Canagua
529	183	Capurí
530	183	Chacantá
531	183	El Molino
532	183	Guaimaral
533	183	Mucutuy
534	183	Mucuchachí
535	184	Fernández Peña
536	184	Matriz
537	184	Montalbán
538	184	Acequias
539	184	Jají
540	184	La Mesa
541	184	San José del Sur
542	185	Tucaní
543	185	Florencio Ramírez
544	186	Santo Domingo
545	186	Las Piedras
546	187	Guaraque
547	187	Mesa de Quintero
548	187	Río Negro
549	188	Arapuey
550	188	Palmira
551	189	San Cristóbal de Torondoy
552	189	Torondoy
553	190	Antonio Spinetti Dini
554	190	Arias
555	190	Caracciolo Parra Pérez
556	190	Domingo Peña
557	190	El Llano
558	190	Gonzalo Picón Febres
559	190	Jacinto Plaza
560	190	Juan Rodríguez Suárez
561	190	Lasso de la Vega
562	190	Mariano Picón Salas
563	190	Milla
564	190	Osuna Rodríguez
565	190	Sagrario
566	190	El Morro
567	190	Los Nevados
568	191	Andrés Eloy Blanco
569	191	La Venta
570	191	Piñango
571	191	Timotes
572	192	Eloy Paredes
573	192	San Rafael de Alcázar
574	192	Santa Elena de Arenales
575	193	Santa María de Caparo
576	194	Pueblo Llano
577	195	Cacute
578	195	La Toma
579	195	Mucuchíes
580	195	Mucurubá
581	195	San Rafael
582	196	Gerónimo Maldonado
583	196	Bailadores
584	197	Tabay
585	198	Chiguará
586	198	Estánquez
587	198	Lagunillas
588	198	La Trampa
589	198	Pueblo Nuevo del Sur
590	198	San Juan
591	199	El Amparo
592	199	El Llano
593	199	San Francisco
594	199	Tovar
595	200	Independencia
596	200	María de la Concepción Palacios Blanco
597	200	Nueva Bolivia
598	200	Santa Apolonia
599	201	Caño El Tigre
600	201	Zea
601	223	Aragüita
602	223	Arévalo González
603	223	Capaya
604	223	Caucagua
605	223	Panaquire
606	223	Ribas
607	223	El Café
608	223	Marizapa
609	224	Cumbo
610	224	San José de Barlovento
611	225	El Cafetal
612	225	Las Minas
613	225	Nuestra Señora del Rosario
614	226	Higuerote
615	226	Curiepe
616	226	Tacarigua de Brión
617	227	Mamporal
618	228	Carrizal
619	229	Chacao
620	230	Charallave
621	230	Las Brisas
622	231	El Hatillo
623	232	Altagracia de la Montaña
624	232	Cecilio Acosta
625	232	Los Teques
626	232	El Jarillo
627	232	San Pedro
628	232	Tácata
629	232	Paracotos
630	233	Cartanal
631	233	Santa Teresa del Tuy
632	234	La Democracia
633	234	Ocumare del Tuy
634	234	Santa Bárbara
635	235	San Antonio de los Altos
636	236	Río Chico
637	236	El Guapo
638	236	Tacarigua de la Laguna
639	236	Paparo
640	236	San Fernando del Guapo
641	237	Santa Lucía del Tuy
642	238	Cúpira
643	238	Machurucuto
644	239	Guarenas
645	240	San Antonio de Yare
646	240	San Francisco de Yare
647	241	Leoncio Martínez
648	241	Petare
649	241	Caucagüita
650	241	Filas de Mariche
651	241	La Dolorita
652	242	Cúa
653	242	Nueva Cúa
654	243	Guatire
655	243	Bolívar
656	258	San Antonio de Maturín
657	258	San Francisco de Maturín
658	259	Aguasay
659	260	Caripito
660	261	El Guácharo
661	261	La Guanota
662	261	Sabana de Piedra
663	261	San Agustín
664	261	Teresen
665	261	Caripe
666	262	Areo
667	262	Capital Cedeño
668	262	San Félix de Cantalicio
669	262	Viento Fresco
670	263	El Tejero
671	263	Punta de Mata
672	264	Chaguaramas
673	264	Las Alhuacas
674	264	Tabasca
675	264	Temblador
676	265	Alto de los Godos
677	265	Boquerón
678	265	Las Cocuizas
679	265	La Cruz
680	265	San Simón
681	265	El Corozo
682	265	El Furrial
683	265	Jusepín
684	265	La Pica
685	265	San Vicente
686	266	Aparicio
687	266	Aragua de Maturín
688	266	Chaguamal
689	266	El Pinto
690	266	Guanaguana
691	266	La Toscana
692	266	Taguaya
693	267	Cachipo
694	267	Quiriquire
695	268	Santa Bárbara
696	269	Barrancas
697	269	Los Barrancos de Fajardo
698	270	Uracoa
699	271	Antolín del Campo
700	272	Arismendi
701	273	García
702	273	Francisco Fajardo
703	274	Bolívar
704	274	Guevara
705	274	Matasiete
706	274	Santa Ana
707	274	Sucre
708	275	Aguirre
709	275	Maneiro
710	276	Adrián
711	276	Juan Griego
712	276	Yaguaraparo
713	277	Porlamar
714	278	San Francisco de Macanao
715	278	Boca de Río
716	279	Tubores
717	279	Los Baleales
718	280	Vicente Fuentes
719	280	Villalba
720	281	San Juan Bautista
721	281	Zabala
722	283	Capital Araure
723	283	Río Acarigua
724	284	Capital Esteller
725	284	Uveral
726	285	Guanare
727	285	Córdoba
728	285	San José de la Montaña
729	285	San Juan de Guanaguanare
730	285	Virgen de la Coromoto
731	286	Guanarito
732	286	Trinidad de la Capilla
733	286	Divina Pastora
734	287	Monseñor José Vicente de Unda
735	287	Peña Blanca
736	288	Capital Ospino
737	288	Aparición
738	288	La Estación
739	289	Páez
740	289	Payara
741	289	Pimpinela
742	289	Ramón Peraza
743	290	Papelón
744	290	Caño Delgadito
745	291	San Genaro de Boconoito
746	291	Antolín Tovar
747	292	San Rafael de Onoto
748	292	Santa Fe
749	292	Thermo Morles
750	293	Santa Rosalía
751	293	Florida
752	294	Sucre
753	294	Concepción
754	294	San Rafael de Palo Alzado
755	294	Uvencio Antonio Velásquez
756	294	San José de Saguaz
757	294	Villa Rosa
758	295	Turén
759	295	Canelones
760	295	Santa Cruz
761	295	San Isidro Labrador
762	296	Mariño
763	296	Rómulo Gallegos
764	297	San José de Aerocuar
765	297	Tavera Acosta
766	298	Río Caribe
767	298	Antonio José de Sucre
768	298	El Morro de Puerto Santo
769	298	Puerto Santo
770	298	San Juan de las Galdonas
771	299	El Pilar
772	299	El Rincón
773	299	General Francisco Antonio Váquez
774	299	Guaraúnos
775	299	Tunapuicito
776	299	Unión
777	300	Santa Catalina
778	300	Santa Rosa
779	300	Santa Teresa
780	300	Bolívar
781	300	Maracapana
782	302	Libertad
783	302	El Paujil
784	302	Yaguaraparo
785	303	Cruz Salmerón Acosta
786	303	Chacopata
787	303	Manicuare
788	304	Tunapuy
789	304	Campo Elías
790	305	Irapa
791	305	Campo Claro
792	305	Maraval
793	305	San Antonio de Irapa
794	305	Soro
795	306	Mejía
796	307	Cumanacoa
797	307	Arenas
798	307	Aricagua
799	307	Cogollar
800	307	San Fernando
801	307	San Lorenzo
802	308	Villa Frontado (Muelle de Cariaco)
803	308	Catuaro
804	308	Rendón
805	308	San Cruz
806	308	Santa María
807	309	Altagracia
808	309	Santa Inés
809	309	Valentín Valiente
810	309	Ayacucho
811	309	San Juan
812	309	Raúl Leoni
813	309	Gran Mariscal
814	310	Cristóbal Colón
815	310	Bideau
816	310	Punta de Piedras
817	310	Güiria
818	341	Andrés Bello
819	342	Antonio Rómulo Costa
820	343	Ayacucho
821	343	Rivas Berti
822	343	San Pedro del Río
823	344	Bolívar
824	344	Palotal
825	344	General Juan Vicente Gómez
826	344	Isaías Medina Angarita
827	345	Cárdenas
828	345	Amenodoro Ángel Lamus
829	345	La Florida
830	346	Córdoba
831	347	Fernández Feo
832	347	Alberto Adriani
833	347	Santo Domingo
834	348	Francisco de Miranda
835	349	García de Hevia
836	349	Boca de Grita
837	349	José Antonio Páez
838	350	Guásimos
839	351	Independencia
840	351	Juan Germán Roscio
841	351	Román Cárdenas
842	352	Jáuregui
843	352	Emilio Constantino Guerrero
844	352	Monseñor Miguel Antonio Salas
845	353	José María Vargas
846	354	Junín
847	354	La Petrólea
848	354	Quinimarí
849	354	Bramón
850	355	Libertad
851	355	Cipriano Castro
852	355	Manuel Felipe Rugeles
853	356	Libertador
854	356	Doradas
855	356	Emeterio Ochoa
856	356	San Joaquín de Navay
857	357	Lobatera
858	357	Constitución
859	358	Michelena
860	359	Panamericano
861	359	La Palmita
862	360	Pedro María Ureña
863	360	Nueva Arcadia
864	361	Delicias
865	361	Pecaya
866	362	Samuel Darío Maldonado
867	362	Boconó
868	362	Hernández
869	363	La Concordia
870	363	San Juan Bautista
871	363	Pedro María Morantes
872	363	San Sebastián
873	363	Dr. Francisco Romero Lobo
874	364	Seboruco
875	365	Simón Rodríguez
876	366	Sucre
877	366	Eleazar López Contreras
878	366	San Pablo
879	367	Torbes
880	368	Uribante
881	368	Cárdenas
882	368	Juan Pablo Peñalosa
883	368	Potosí
884	369	San Judas Tadeo
885	370	Araguaney
886	370	El Jaguito
887	370	La Esperanza
888	370	Santa Isabel
889	371	Boconó
890	371	El Carmen
891	371	Mosquey
892	371	Ayacucho
893	371	Burbusay
894	371	General Ribas
895	371	Guaramacal
896	371	Vega de Guaramacal
897	371	Monseñor Jáuregui
898	371	Rafael Rangel
899	371	San Miguel
900	371	San José
901	372	Sabana Grande
902	372	Cheregüé
903	372	Granados
904	373	Arnoldo Gabaldón
905	373	Bolivia
906	373	Carrillo
907	373	Cegarra
908	373	Chejendé
909	373	Manuel Salvador Ulloa
910	373	San José
911	374	Carache
912	374	La Concepción
913	374	Cuicas
914	374	Panamericana
915	374	Santa Cruz
916	375	Escuque
917	375	La Unión
918	375	Santa Rita
919	375	Sabana Libre
920	376	El Socorro
921	376	Los Caprichos
922	376	Antonio José de Sucre
923	377	Campo Elías
924	377	Arnoldo Gabaldón
925	378	Santa Apolonia
926	378	El Progreso
927	378	La Ceiba
928	378	Tres de Febrero
929	379	El Dividive
930	379	Agua Santa
931	379	Agua Caliente
932	379	El Cenizo
933	379	Valerita
934	380	Monte Carmelo
935	380	Buena Vista
936	380	Santa María del Horcón
937	381	Motatán
938	381	El Baño
939	381	Jalisco
940	382	Pampán
941	382	Flor de Patria
942	382	La Paz
943	382	Santa Ana
944	383	Pampanito
945	383	La Concepción
946	383	Pampanito II
947	384	Betijoque
948	384	José Gregorio Hernández
949	384	La Pueblita
950	384	Los Cedros
951	385	Carvajal
952	385	Campo Alegre
953	385	Antonio Nicolás Briceño
954	385	José Leonardo Suárez
955	386	Sabana de Mendoza
956	386	Junín
957	386	Valmore Rodríguez
958	386	El Paraíso
959	387	Andrés Linares
960	387	Chiquinquirá
961	387	Cristóbal Mendoza
962	387	Cruz Carrillo
963	387	Matriz
964	387	Monseñor Carrillo
965	387	Tres Esquinas
966	388	Cabimbú
967	388	Jajó
968	388	La Mesa de Esnujaque
969	388	Santiago
970	388	Tuñame
971	388	La Quebrada
972	389	Juan Ignacio Montilla
973	389	La Beatriz
974	389	La Puerta
975	389	Mendoza del Valle de Momboy
976	389	Mercedes Díaz
977	389	San Luis
978	390	Caraballeda
979	390	Carayaca
980	390	Carlos Soublette
981	390	Caruao Chuspa
982	390	Catia La Mar
983	390	El Junko
984	390	La Guaira
985	390	Macuto
986	390	Maiquetía
987	390	Naiguatá
988	390	Urimare
989	391	Arístides Bastidas
990	392	Bolívar
991	407	Chivacoa
992	407	Campo Elías
993	408	Cocorote
994	409	Independencia
995	410	José Antonio Páez
996	411	La Trinidad
997	412	Manuel Monge
998	413	Salóm
999	413	Temerla
1000	413	Nirgua
1001	414	San Andrés
1002	414	Yaritagua
1003	415	San Javier
1004	415	Albarico
1005	415	San Felipe
1006	416	Sucre
1007	417	Urachiche
1008	418	El Guayabo
1009	418	Farriar
1010	441	Isla de Toas
1011	441	Monagas
1012	442	San Timoteo
1013	442	General Urdaneta
1014	442	Libertador
1015	442	Marcelino Briceño
1016	442	Pueblo Nuevo
1017	442	Manuel Guanipa Matos
1018	443	Ambrosio
1019	443	Carmen Herrera
1020	443	La Rosa
1021	443	Germán Ríos Linares
1022	443	San Benito
1023	443	Rómulo Betancourt
1024	443	Jorge Hernández
1025	443	Punta Gorda
1026	443	Arístides Calvani
1027	444	Encontrados
1028	444	Udón Pérez
1029	445	Moralito
1030	445	San Carlos del Zulia
1031	445	Santa Cruz del Zulia
1032	445	Santa Bárbara
1033	445	Urribarrí
1034	446	Carlos Quevedo
1035	446	Francisco Javier Pulgar
1036	446	Simón Rodríguez
1037	446	Guamo-Gavilanes
1038	448	La Concepción
1039	448	San José
1040	448	Mariano Parra León
1041	448	José Ramón Yépez
1042	449	Jesús María Semprún
1043	449	Barí
1044	450	Concepción
1045	450	Andrés Bello
1046	450	Chiquinquirá
1047	450	El Carmelo
1048	450	Potreritos
1049	451	Libertad
1050	451	Alonso de Ojeda
1051	451	Venezuela
1052	451	Eleazar López Contreras
1053	451	Campo Lara
1054	452	Bartolomé de las Casas
1055	452	Libertad
1056	452	Río Negro
1057	452	San José de Perijá
1058	453	San Rafael
1059	453	La Sierrita
1060	453	Las Parcelas
1061	453	Luis de Vicente
1062	453	Monseñor Marcos Sergio Godoy
1063	453	Ricaurte
1064	453	Tamare
1065	454	Antonio Borjas Romero
1066	454	Bolívar
1067	454	Cacique Mara
1068	454	Carracciolo Parra Pérez
1069	454	Cecilio Acosta
1070	454	Cristo de Aranza
1071	454	Coquivacoa
1072	454	Chiquinquirá
1073	454	Francisco Eugenio Bustamante
1074	454	Idelfonzo Vásquez
1075	454	Juana de Ávila
1076	454	Luis Hurtado Higuera
1077	454	Manuel Dagnino
1078	454	Olegario Villalobos
1079	454	Raúl Leoni
1080	454	Santa Lucía
1081	454	Venancio Pulgar
1082	454	San Isidro
1083	455	Altagracia
1084	455	Faría
1085	455	Ana María Campos
1086	455	San Antonio
1087	455	San José
1088	456	Donaldo García
1089	456	El Rosario
1090	456	Sixto Zambrano
1091	457	San Francisco
1092	457	El Bajo
1093	457	Domitila Flores
1094	457	Francisco Ochoa
1095	457	Los Cortijos
1096	457	Marcial Hernández
1097	458	Santa Rita
1098	458	El Mene
1099	458	Pedro Lucas Urribarrí
1100	458	José Cenobio Urribarrí
1101	459	Rafael Maria Baralt
1102	459	Manuel Manrique
1103	459	Rafael Urdaneta
1104	460	Bobures
1105	460	Gibraltar
1106	460	Heras
1107	460	Monseñor Arturo Álvarez
1108	460	Rómulo Gallegos
1109	460	El Batey
1110	461	Rafael Urdaneta
1111	461	La Victoria
1112	461	Raúl Cuenca
1113	447	Sinamaica
1114	447	Alta Guajira
1115	447	Elías Sánchez Rubio
1116	447	Guajira
1117	462	Altagracia
1118	462	Antímano
1119	462	Caricuao
1120	462	Catedral
1121	462	Coche
1122	462	El Junquito
1123	462	El Paraíso
1124	462	El Recreo
1125	462	El Valle
1126	462	La Candelaria
1127	462	La Pastora
1128	462	La Vega
1129	462	Macarao
1130	462	San Agustín
1131	462	San Bernardino
1132	462	San José
1133	462	San Juan
1134	462	San Pedro
1135	462	Santa Rosalía
1136	462	Santa Teresa
1137	462	Sucre (Catia)
1138	462	23 de enero
\.


--
-- TOC entry 2275 (class 0 OID 0)
-- Dependencies: 184
-- Name: tb_parroquia_id_parroquia_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tb_parroquia_id_parroquia_seq', 1, false);


--
-- TOC entry 2184 (class 0 OID 16462)
-- Dependencies: 185 2221
-- Data for Name: tb_persona; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY tb_persona (id_persona, id_redi, id_estado, id_municipio, id_parroquia, direccion, nombre_apellido, cedula, nacionalidad, edad, sexo, fecha_nacimiento, num_hijos, etnia, domina_idioma, discapacidad, estado_civil, tel_local, tel_celular, email, nivel_instruccion, estudia_act, nombre_inst, grado, tipo_inst, estudia_mision, gustaria_estudiar, participa_org_mujeres, anios_militancia, responsabilidad, participa_part_politico, anios_militancia_pp, responsabilidad_pp, concejo_comunal, voceria_cc, comuna_cc, status) FROM stdin;
2	1	1	241	648	La California	Maria Jaramillo	21534616	V	22	F	1992-07-14	0	No		No	Soltera(o)	02122324158	04165356310	marychina2@gmail.com	TSU Informatica	Si	IUT	Ingenieria	Publica	No	No	No	0		No	0		No	No	No	General
3	1	14	241	648	Petare	Luisa Perez	7655677	V	48	F	1956-08-09	1	No	 	No	Soltera(o)	02123344455	04123322233	algo@gmail.com	TSU Educacion	No	 	 	 	No	No	No	0	 	No	0	 	No 	No	No	Usuario
12	1	14	232	625	el encanto	joynert garcia	19565827	V	23	M	1991-05-02	0	No		No	Soltera(o)	02123643357	04129299694	joynertagf@gmail.com		Si	iut rc	ing informatica	Publica	No	No	No	0		No	0		No	No	No	General
20	1	7	79	262	fdf	yohendrixsen perez	12345678	V	23	F	1991-05-16	6	No		No	Soltera(o)	0121231232	21321321321	yohendrix@gmail.com	Sin instruccion	No				No	No	No	0		No	0		No	No	No	General
1	1	24	\N	\N	\N	administrador	11111111	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	Usuario
\.


--
-- TOC entry 2276 (class 0 OID 0)
-- Dependencies: 186
-- Name: tb_persona_id_persona_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tb_persona_id_persona_seq', 20, true);


--
-- TOC entry 2186 (class 0 OID 16470)
-- Dependencies: 187 2221
-- Data for Name: tb_redi; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY tb_redi (id_redi, nombre) FROM stdin;
1	Central
2	Occidente
3	Los Llanos
4	Oriente
5	Guayana
6	Los Andes
7	Insular
\.


--
-- TOC entry 2277 (class 0 OID 0)
-- Dependencies: 188
-- Name: tb_redi_id_redi_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tb_redi_id_redi_seq', 1, false);


--
-- TOC entry 2203 (class 0 OID 17290)
-- Dependencies: 204 2221
-- Data for Name: tb_tipo_divulgacion; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY tb_tipo_divulgacion (id_tipo_divulgacion, nombre) FROM stdin;
1	Programa
\.


--
-- TOC entry 2188 (class 0 OID 16475)
-- Dependencies: 189 2221
-- Data for Name: tb_usuario; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY tb_usuario (id_usuario, id_persona, cargo, username, password, pregunta, respuesta, permisologia) FROM stdin;
1	1	administrador	administrador	10470c3b4b1fed12c3baac014be15fac67c6e815	administrador	administrador	0
4	2	Facilitador(a)	mJaramillo	fe703d258c7ef5f50b71e06565a65aa07194907f			1
2	3	Facilitador(a)	lperez	10470c3b4b1fed12c3baac014be15fac67c6e815	perro	terry	1
\.


--
-- TOC entry 2278 (class 0 OID 0)
-- Dependencies: 190
-- Name: tb_usuario_id_usuario_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tb_usuario_id_usuario_seq', 1, false);


--
-- TOC entry 2279 (class 0 OID 0)
-- Dependencies: 205
-- Name: tipo_divulgacion_id_tipo_divulgacion_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tipo_divulgacion_id_tipo_divulgacion_seq', 1, true);


--
-- TOC entry 2280 (class 0 OID 0)
-- Dependencies: 218
-- Name: tr_curso_asistencia_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tr_curso_asistencia_id_seq', 6, true);


--
-- TOC entry 2214 (class 0 OID 17460)
-- Dependencies: 215 2221
-- Data for Name: tr_curso_estado; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY tr_curso_estado (id, curso_id, estado_id) FROM stdin;
17	27	14
18	27	24
19	28	11
\.


--
-- TOC entry 2281 (class 0 OID 0)
-- Dependencies: 214
-- Name: tr_curso_estado_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tr_curso_estado_id_seq', 19, true);


--
-- TOC entry 2210 (class 0 OID 17431)
-- Dependencies: 211 2221
-- Data for Name: tr_curso_participantes; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY tr_curso_participantes (id, id_curso, nro_participantes, id_estado) FROM stdin;
18	27	1	24
17	27	2	14
19	28	0	11
\.


--
-- TOC entry 2282 (class 0 OID 0)
-- Dependencies: 210
-- Name: tr_curso_participantes_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tr_curso_participantes_id_seq', 19, true);


--
-- TOC entry 2190 (class 0 OID 16483)
-- Dependencies: 191 2221
-- Data for Name: tr_escalas_evaluacion; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY tr_escalas_evaluacion (id_escala, id_pregunta, id_persona, id_curso, descripcion, id_escala_evaluacion) FROM stdin;
\.


--
-- TOC entry 2283 (class 0 OID 0)
-- Dependencies: 192
-- Name: tr_escalas_evaluacion_id_escala_evaluacion_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tr_escalas_evaluacion_id_escala_evaluacion_seq', 1, false);


--
-- TOC entry 2218 (class 0 OID 17504)
-- Dependencies: 219 2221
-- Data for Name: tr_persona_asistencia; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY tr_persona_asistencia (id, persona_id, asistencia_id) FROM stdin;
1	1	1
2	12	2
3	12	3
4	1	3
5	12	4
6	1	4
\.


--
-- TOC entry 2192 (class 0 OID 16491)
-- Dependencies: 193 2221
-- Data for Name: tr_persona_curso; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY tr_persona_curso (id_persona, id_curso, id, id_estado) FROM stdin;
1	27	28	24
12	27	30	14
1	27	31	14
\.


--
-- TOC entry 2284 (class 0 OID 0)
-- Dependencies: 206
-- Name: tr_persona_curso_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tr_persona_curso_id_seq', 1, false);


--
-- TOC entry 2285 (class 0 OID 0)
-- Dependencies: 209
-- Name: tr_persona_curso_id_seq1; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tr_persona_curso_id_seq1', 31, true);


--
-- TOC entry 2193 (class 0 OID 16494)
-- Dependencies: 194 2221
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY users (id, ip_address, username, password, salt, email, activation_code, forgotten_password_code, forgotten_password_time, remember_code, created_on, last_login, active, first_name, last_name, cargo, phone, persona_id, pregunta, respuesta) FROM stdin;
9	127.0.0.1	yohendrixsen perez	$2y$08$blbfmvgg6vlgUxavWbhIxuPT9qCE1y.0LzzdcElttXKv17tfdB/BK	\N	yohendrix@gmail.com	\N	\N	\N	\N	1423071766	1423072597	1	\N	\N	\N	\N	20	\N	\N
6	127.0.0.1	joynert garcia	$2y$08$UoMgs.JwhFsHXjb9JRnzXu8l5rEieawMoJ2/pBCDVHM8oMxSy19TW	\N	joynertagf@gmail.com	\N	\N	\N	\N	1423069895	1423582281	1	\N	\N	\N	\N	12	\N	\N
1	127.0.0.1	administrator	$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36		admin@admin.com		\N	\N	\N	1268889823	1423651385	1	Admin	istrator	ADMIN	0	1	123456	qw
\.


--
-- TOC entry 2194 (class 0 OID 16502)
-- Dependencies: 195 2221
-- Data for Name: users_groups; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY users_groups (id, user_id, group_id) FROM stdin;
14	1	1
10	6	1
13	9	3
\.


--
-- TOC entry 2286 (class 0 OID 0)
-- Dependencies: 196
-- Name: users_groups_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('users_groups_id_seq', 13, true);


--
-- TOC entry 2287 (class 0 OID 0)
-- Dependencies: 197
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('users_id_seq', 9, true);


--
-- TOC entry 1974 (class 2606 OID 16531)
-- Dependencies: 161 161 2222
-- Name: groups_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY groups
    ADD CONSTRAINT groups_pkey PRIMARY KEY (id);


--
-- TOC entry 1976 (class 2606 OID 16533)
-- Dependencies: 163 163 2222
-- Name: login_attempts_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY login_attempts
    ADD CONSTRAINT login_attempts_pkey PRIMARY KEY (id);


--
-- TOC entry 2036 (class 2606 OID 17523)
-- Dependencies: 221 221 2222
-- Name: pk_asistencia; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tb_asistencia
    ADD CONSTRAINT pk_asistencia PRIMARY KEY (id);


--
-- TOC entry 2028 (class 2606 OID 17457)
-- Dependencies: 213 213 2222
-- Name: pk_cargo; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tb_cargo
    ADD CONSTRAINT pk_cargo PRIMARY KEY (id_cargo);


--
-- TOC entry 2030 (class 2606 OID 17465)
-- Dependencies: 215 215 2222
-- Name: pk_curso_estado; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tr_curso_estado
    ADD CONSTRAINT pk_curso_estado PRIMARY KEY (id);


--
-- TOC entry 2016 (class 2606 OID 17324)
-- Dependencies: 198 198 2222
-- Name: pk_divulgacion_prensa; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tb_divulgacion_prensa
    ADD CONSTRAINT pk_divulgacion_prensa PRIMARY KEY (id_divulgacion_prensa);


--
-- TOC entry 2018 (class 2606 OID 17326)
-- Dependencies: 200 200 2222
-- Name: pk_divulgacion_radio; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tb_divulgacion_radio
    ADD CONSTRAINT pk_divulgacion_radio PRIMARY KEY (id_divulgacion_radio);


--
-- TOC entry 2020 (class 2606 OID 17328)
-- Dependencies: 202 202 2222
-- Name: pk_divulgacion_tv; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tb_divulgacion_tv
    ADD CONSTRAINT pk_divulgacion_tv PRIMARY KEY (id_divulgacion_tv);


--
-- TOC entry 2032 (class 2606 OID 17501)
-- Dependencies: 217 217 2222
-- Name: pk_informe; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tb_informe
    ADD CONSTRAINT pk_informe PRIMARY KEY (id_informe);


--
-- TOC entry 2034 (class 2606 OID 17525)
-- Dependencies: 219 219 2222
-- Name: pk_persona_asistencia; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tr_persona_asistencia
    ADD CONSTRAINT pk_persona_asistencia PRIMARY KEY (id);


--
-- TOC entry 2008 (class 2606 OID 17428)
-- Dependencies: 193 193 2222
-- Name: pk_persona_curso; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tr_persona_curso
    ADD CONSTRAINT pk_persona_curso PRIMARY KEY (id);


--
-- TOC entry 2022 (class 2606 OID 17334)
-- Dependencies: 204 204 2222
-- Name: pk_tipo_divulgacion; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tb_tipo_divulgacion
    ADD CONSTRAINT pk_tipo_divulgacion PRIMARY KEY (id_tipo_divulgacion);


--
-- TOC entry 2026 (class 2606 OID 17436)
-- Dependencies: 211 211 2222
-- Name: pk_tr_curso_part; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tr_curso_participantes
    ADD CONSTRAINT pk_tr_curso_part PRIMARY KEY (id);


--
-- TOC entry 1978 (class 2606 OID 16535)
-- Dependencies: 165 165 2222
-- Name: tb_actividad_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tb_actividad
    ADD CONSTRAINT tb_actividad_pkey PRIMARY KEY (id_actividad);


--
-- TOC entry 1980 (class 2606 OID 16537)
-- Dependencies: 167 167 2222
-- Name: tb_auditoria_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tb_auditoria
    ADD CONSTRAINT tb_auditoria_pkey PRIMARY KEY (id_auditoria);


--
-- TOC entry 2024 (class 2606 OID 17400)
-- Dependencies: 208 208 2222
-- Name: tb_biblioteca_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tb_biblioteca
    ADD CONSTRAINT tb_biblioteca_pkey PRIMARY KEY (id_biblioteca);


--
-- TOC entry 1982 (class 2606 OID 16539)
-- Dependencies: 169 169 2222
-- Name: tb_curso_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tb_curso
    ADD CONSTRAINT tb_curso_pkey PRIMARY KEY (id_curso);


--
-- TOC entry 1984 (class 2606 OID 16541)
-- Dependencies: 171 171 2222
-- Name: tb_divulgacion_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tb_divulgacion
    ADD CONSTRAINT tb_divulgacion_pkey PRIMARY KEY (id_divulgacion);


--
-- TOC entry 1986 (class 2606 OID 16543)
-- Dependencies: 173 173 2222
-- Name: tb_escalas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tb_escalas
    ADD CONSTRAINT tb_escalas_pkey PRIMARY KEY (id_escala);


--
-- TOC entry 1988 (class 2606 OID 16545)
-- Dependencies: 175 175 2222
-- Name: tb_estado_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tb_estado
    ADD CONSTRAINT tb_estado_pkey PRIMARY KEY (id_estado);


--
-- TOC entry 1990 (class 2606 OID 16547)
-- Dependencies: 177 177 2222
-- Name: tb_evaluacion_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tb_evaluacion
    ADD CONSTRAINT tb_evaluacion_pkey PRIMARY KEY (id_pregunta);


--
-- TOC entry 1992 (class 2606 OID 16549)
-- Dependencies: 179 179 2222
-- Name: tb_general_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tb_general
    ADD CONSTRAINT tb_general_pkey PRIMARY KEY (id_persona);


--
-- TOC entry 1994 (class 2606 OID 16553)
-- Dependencies: 180 180 2222
-- Name: tb_mmdb_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tb_mmdb
    ADD CONSTRAINT tb_mmdb_pkey PRIMARY KEY (id_persona);


--
-- TOC entry 1996 (class 2606 OID 16555)
-- Dependencies: 181 181 2222
-- Name: tb_municipio_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tb_municipio
    ADD CONSTRAINT tb_municipio_pkey PRIMARY KEY (id_municipio);


--
-- TOC entry 1998 (class 2606 OID 16557)
-- Dependencies: 183 183 2222
-- Name: tb_parroquia_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tb_parroquia
    ADD CONSTRAINT tb_parroquia_pkey PRIMARY KEY (id_parroquia);


--
-- TOC entry 2000 (class 2606 OID 16559)
-- Dependencies: 185 185 2222
-- Name: tb_persona_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tb_persona
    ADD CONSTRAINT tb_persona_pkey PRIMARY KEY (id_persona);


--
-- TOC entry 2002 (class 2606 OID 16561)
-- Dependencies: 187 187 2222
-- Name: tb_redi_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tb_redi
    ADD CONSTRAINT tb_redi_pkey PRIMARY KEY (id_redi);


--
-- TOC entry 2004 (class 2606 OID 16563)
-- Dependencies: 189 189 2222
-- Name: tb_usuario_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tb_usuario
    ADD CONSTRAINT tb_usuario_pkey PRIMARY KEY (id_usuario);


--
-- TOC entry 2006 (class 2606 OID 16565)
-- Dependencies: 191 191 2222
-- Name: tr_escalas_evaluacion_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tr_escalas_evaluacion
    ADD CONSTRAINT tr_escalas_evaluacion_pkey PRIMARY KEY (id_escala_evaluacion);


--
-- TOC entry 2012 (class 2606 OID 16569)
-- Dependencies: 195 195 195 2222
-- Name: uc_users_groups; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY users_groups
    ADD CONSTRAINT uc_users_groups UNIQUE (user_id, group_id);


--
-- TOC entry 2014 (class 2606 OID 16571)
-- Dependencies: 195 195 2222
-- Name: users_groups_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY users_groups
    ADD CONSTRAINT users_groups_pkey PRIMARY KEY (id);


--
-- TOC entry 2010 (class 2606 OID 16573)
-- Dependencies: 194 194 2222
-- Name: users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- TOC entry 2058 (class 2620 OID 17446)
-- Dependencies: 193 234 2222
-- Name: act_participantes_curso; Type: TRIGGER; Schema: public; Owner: postgres
--

CREATE TRIGGER act_participantes_curso AFTER INSERT ON tr_persona_curso FOR EACH ROW EXECUTE PROCEDURE act_participantes_curso();


--
-- TOC entry 2055 (class 2606 OID 17340)
-- Dependencies: 2021 204 198 2222
-- Name: fk_divulgacion_prensa; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_divulgacion_prensa
    ADD CONSTRAINT fk_divulgacion_prensa FOREIGN KEY (tipo_divulgacion) REFERENCES tb_tipo_divulgacion(id_tipo_divulgacion);


--
-- TOC entry 2056 (class 2606 OID 17345)
-- Dependencies: 200 2021 204 2222
-- Name: fk_divulgacion_radio; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_divulgacion_radio
    ADD CONSTRAINT fk_divulgacion_radio FOREIGN KEY (id_tipo_divulgacion) REFERENCES tb_tipo_divulgacion(id_tipo_divulgacion);


--
-- TOC entry 2057 (class 2606 OID 17350)
-- Dependencies: 202 2021 204 2222
-- Name: fk_divulgacion_tv; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_divulgacion_tv
    ADD CONSTRAINT fk_divulgacion_tv FOREIGN KEY (tipo_divulgacion) REFERENCES tb_tipo_divulgacion(id_tipo_divulgacion);


--
-- TOC entry 2037 (class 2606 OID 17405)
-- Dependencies: 189 2003 165 2222
-- Name: tb_actividad_id_usuario_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_actividad
    ADD CONSTRAINT tb_actividad_id_usuario_fkey FOREIGN KEY (id_usuario) REFERENCES tb_usuario(id_usuario);


--
-- TOC entry 2038 (class 2606 OID 16579)
-- Dependencies: 2003 167 189 2222
-- Name: tb_auditoria_id_usuario_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_auditoria
    ADD CONSTRAINT tb_auditoria_id_usuario_fkey FOREIGN KEY (id_usuario) REFERENCES tb_usuario(id_usuario);


--
-- TOC entry 2039 (class 2606 OID 17549)
-- Dependencies: 169 171 1981 2222
-- Name: tb_divulgacion_id_curso_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_divulgacion
    ADD CONSTRAINT tb_divulgacion_id_curso_fkey FOREIGN KEY (id_curso) REFERENCES tb_curso(id_curso);


--
-- TOC entry 2040 (class 2606 OID 16594)
-- Dependencies: 187 2001 175 2222
-- Name: tb_estado_id_redi_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_estado
    ADD CONSTRAINT tb_estado_id_redi_fkey FOREIGN KEY (id_redi) REFERENCES tb_redi(id_redi) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2041 (class 2606 OID 16599)
-- Dependencies: 1999 179 185 2222
-- Name: tb_general_id_persona_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_general
    ADD CONSTRAINT tb_general_id_persona_fkey FOREIGN KEY (id_persona) REFERENCES tb_persona(id_persona) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2042 (class 2606 OID 16634)
-- Dependencies: 185 180 1999 2222
-- Name: tb_mmdb_id_persona_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_mmdb
    ADD CONSTRAINT tb_mmdb_id_persona_fkey FOREIGN KEY (id_persona) REFERENCES tb_persona(id_persona) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2043 (class 2606 OID 16639)
-- Dependencies: 181 1987 175 2222
-- Name: tb_municipio_id_estado_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_municipio
    ADD CONSTRAINT tb_municipio_id_estado_fkey FOREIGN KEY (id_estado) REFERENCES tb_estado(id_estado) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2044 (class 2606 OID 16644)
-- Dependencies: 183 1995 181 2222
-- Name: tb_parroquia_id_municipio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_parroquia
    ADD CONSTRAINT tb_parroquia_id_municipio_fkey FOREIGN KEY (id_municipio) REFERENCES tb_municipio(id_municipio) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2045 (class 2606 OID 16649)
-- Dependencies: 185 175 1987 2222
-- Name: tb_persona_id_estado_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_persona
    ADD CONSTRAINT tb_persona_id_estado_fkey FOREIGN KEY (id_estado) REFERENCES tb_estado(id_estado);


--
-- TOC entry 2046 (class 2606 OID 16654)
-- Dependencies: 1995 185 181 2222
-- Name: tb_persona_id_municipio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_persona
    ADD CONSTRAINT tb_persona_id_municipio_fkey FOREIGN KEY (id_municipio) REFERENCES tb_municipio(id_municipio);


--
-- TOC entry 2047 (class 2606 OID 16659)
-- Dependencies: 183 185 1997 2222
-- Name: tb_persona_id_parroquia_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_persona
    ADD CONSTRAINT tb_persona_id_parroquia_fkey FOREIGN KEY (id_parroquia) REFERENCES tb_parroquia(id_parroquia);


--
-- TOC entry 2048 (class 2606 OID 16664)
-- Dependencies: 187 185 2001 2222
-- Name: tb_persona_id_redi_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_persona
    ADD CONSTRAINT tb_persona_id_redi_fkey FOREIGN KEY (id_redi) REFERENCES tb_redi(id_redi);


--
-- TOC entry 2049 (class 2606 OID 16669)
-- Dependencies: 185 189 1999 2222
-- Name: tb_usuario_id_persona_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_usuario
    ADD CONSTRAINT tb_usuario_id_persona_fkey FOREIGN KEY (id_persona) REFERENCES tb_persona(id_persona) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2050 (class 2606 OID 16674)
-- Dependencies: 1985 191 173 2222
-- Name: tr_escalas_evaluacion_id_escala_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tr_escalas_evaluacion
    ADD CONSTRAINT tr_escalas_evaluacion_id_escala_fkey FOREIGN KEY (id_escala) REFERENCES tb_escalas(id_escala);


--
-- TOC entry 2051 (class 2606 OID 16679)
-- Dependencies: 185 1999 191 2222
-- Name: tr_escalas_evaluacion_id_persona_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tr_escalas_evaluacion
    ADD CONSTRAINT tr_escalas_evaluacion_id_persona_fkey FOREIGN KEY (id_persona) REFERENCES tb_persona(id_persona);


--
-- TOC entry 2052 (class 2606 OID 16684)
-- Dependencies: 1989 191 177 2222
-- Name: tr_escalas_evaluacion_id_pregunta_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tr_escalas_evaluacion
    ADD CONSTRAINT tr_escalas_evaluacion_id_pregunta_fkey FOREIGN KEY (id_pregunta) REFERENCES tb_evaluacion(id_pregunta);


--
-- TOC entry 2053 (class 2606 OID 17526)
-- Dependencies: 193 1981 169 2222
-- Name: tr_persona_curso_id_curso_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tr_persona_curso
    ADD CONSTRAINT tr_persona_curso_id_curso_fkey FOREIGN KEY (id_curso) REFERENCES tb_curso(id_curso);


--
-- TOC entry 2054 (class 2606 OID 17531)
-- Dependencies: 193 1999 185 2222
-- Name: tr_persona_curso_id_persona_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tr_persona_curso
    ADD CONSTRAINT tr_persona_curso_id_persona_fkey FOREIGN KEY (id_persona) REFERENCES tb_persona(id_persona);


--
-- TOC entry 2227 (class 0 OID 0)
-- Dependencies: 6
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2015-02-11 08:32:15

--
-- PostgreSQL database dump complete
--

