<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2015-02-04 16:27:29 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 100
ERROR - 2015-02-04 16:27:38 --> 404 Page Not Found: Pnfhtml/index
ERROR - 2015-02-04 16:27:54 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 100
ERROR - 2015-02-04 16:27:59 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 100
ERROR - 2015-02-04 16:28:07 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 100
ERROR - 2015-02-04 16:28:10 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 100
ERROR - 2015-02-04 16:54:41 --> Severity: Notice --> Undefined property: Personas_api::$post C:\wamp\www\efosig\application\controllers\api\Personas_api.php 198
ERROR - 2015-02-04 16:54:41 --> Severity: Warning --> pg_query(): Query failed: ERROR:  el valor es demasiado largo para el tipo character varying(15) C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-04 16:54:41 --> Query error: ERROR:  el valor es demasiado largo para el tipo character varying(15) - Invalid query: INSERT INTO "tb_general" ("id_persona", "institucion_labora", "cargo", "telefono", "email") VALUES ('2', 'ast', 'analista programador', FALSE, 'ast@ast.com.ve')
ERROR - 2015-02-04 16:56:56 --> Severity: Notice --> Undefined property: Personas_api::$post C:\wamp\www\efosig\application\controllers\api\Personas_api.php 198
ERROR - 2015-02-04 16:56:56 --> Severity: Warning --> pg_query(): Query failed: ERROR:  el valor es demasiado largo para el tipo character varying(15) C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-04 16:56:56 --> Query error: ERROR:  el valor es demasiado largo para el tipo character varying(15) - Invalid query: INSERT INTO "tb_general" ("id_persona", "institucion_labora", "cargo", "telefono", "email") VALUES ('2', 'ast', 'analista programador', FALSE, 'ast@ast.com.ve')
ERROR - 2015-02-04 16:58:56 --> Severity: Notice --> Undefined property: Personas_api::$post C:\wamp\www\efosig\application\controllers\api\Personas_api.php 198
ERROR - 2015-02-04 16:58:56 --> Severity: Warning --> pg_query(): Query failed: ERROR:  llave duplicada viola restricción de unicidad «tb_general_pkey»
DETAIL:  Ya existe la llave (id_persona)=(2). C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-04 16:58:56 --> Query error: ERROR:  llave duplicada viola restricción de unicidad «tb_general_pkey»
DETAIL:  Ya existe la llave (id_persona)=(2). - Invalid query: INSERT INTO "tb_general" ("id_persona", "institucion_labora", "cargo", "telefono", "email") VALUES ('2', 'ast', 'analista programador', FALSE, 'ast@ast.com.ve')
ERROR - 2015-02-04 17:02:14 --> Severity: Notice --> Undefined property: Personas_api::$post C:\wamp\www\efosig\application\controllers\api\Personas_api.php 198
ERROR - 2015-02-04 17:02:14 --> Severity: Warning --> pg_query(): Query failed: ERROR:  llave duplicada viola restricción de unicidad «users_pkey»
DETAIL:  Ya existe la llave (id)=(5). C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-04 17:02:14 --> Query error: ERROR:  llave duplicada viola restricción de unicidad «users_pkey»
DETAIL:  Ya existe la llave (id)=(5). - Invalid query: INSERT INTO "users" ("persona_id", "username", "password", "email", "ip_address", "created_on", "last_login", "active") VALUES ('2', 'joynert garcia', '$2y$08$0l5tRZ0bBIS1Th5O920Z3OVoGY/eTpUJ4VoLsmkmsklaLf75C1ue.', 'joynertagf@gmail.com', '127.0.0.1', 1423069334, 1423069334, 1)
ERROR - 2015-02-04 17:04:36 --> Severity: Notice --> Undefined property: Personas_api::$post C:\wamp\www\efosig\application\controllers\api\Personas_api.php 198
ERROR - 2015-02-04 17:04:36 --> Severity: Warning --> pg_query(): Query failed: ERROR:  llave duplicada viola restricción de unicidad «tb_general_pkey»
DETAIL:  Ya existe la llave (id_persona)=(2). C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-04 17:04:36 --> Query error: ERROR:  llave duplicada viola restricción de unicidad «tb_general_pkey»
DETAIL:  Ya existe la llave (id_persona)=(2). - Invalid query: INSERT INTO "tb_general" ("id_persona", "institucion_labora", "cargo", "telefono", "email") VALUES ('2', 'ast', 'analista programador', FALSE, 'ast@ast.com.ve')
ERROR - 2015-02-04 17:11:35 --> Severity: Notice --> Undefined property: Personas_api::$post C:\wamp\www\efosig\application\controllers\api\Personas_api.php 200
ERROR - 2015-02-04 17:11:36 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 100
ERROR - 2015-02-04 17:11:38 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\models\Persona_model.php 10
ERROR - 2015-02-04 17:11:38 --> Severity: Warning --> pg_query(): Query failed: ERROR:  error de sintaxis al final de la entrada
LINE 1: SELECT id_estado FROM tb_persona WHERE id_persona=
                                                          ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-04 17:11:38 --> Query error: ERROR:  error de sintaxis al final de la entrada
LINE 1: SELECT id_estado FROM tb_persona WHERE id_persona=
                                                          ^ - Invalid query: SELECT id_estado FROM tb_persona WHERE id_persona=
ERROR - 2015-02-04 17:11:44 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 100
ERROR - 2015-02-04 17:11:46 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\models\Persona_model.php 10
ERROR - 2015-02-04 17:11:46 --> Severity: Warning --> pg_query(): Query failed: ERROR:  error de sintaxis al final de la entrada
LINE 1: SELECT id_estado FROM tb_persona WHERE id_persona=
                                                          ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-04 17:11:46 --> Query error: ERROR:  error de sintaxis al final de la entrada
LINE 1: SELECT id_estado FROM tb_persona WHERE id_persona=
                                                          ^ - Invalid query: SELECT id_estado FROM tb_persona WHERE id_persona=
ERROR - 2015-02-04 17:12:07 --> Severity: Parsing Error --> syntax error, unexpected '}' C:\wamp\www\efosig\application\controllers\Auth.php 766
ERROR - 2015-02-04 17:12:33 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 100
ERROR - 2015-02-04 17:12:54 --> Could not find the language line "create_user_validation_pregunta_label"
ERROR - 2015-02-04 17:12:54 --> Could not find the language line "create_user_validation_respuesta_label"
ERROR - 2015-02-04 17:13:16 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 100
ERROR - 2015-02-04 17:13:20 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 100
ERROR - 2015-02-04 17:17:32 --> Severity: Notice --> Undefined property: Personas_api::$post C:\wamp\www\efosig\application\controllers\api\Personas_api.php 200
ERROR - 2015-02-04 17:17:32 --> Severity: 4096 --> Object of class stdClass could not be converted to string C:\wamp\www\efosig\application\controllers\api\Personas_api.php 202
ERROR - 2015-02-04 17:19:24 --> Severity: Notice --> Undefined property: Personas_api::$post C:\wamp\www\efosig\application\controllers\api\Personas_api.php 200
ERROR - 2015-02-04 17:24:16 --> Severity: Notice --> Undefined variable: cedula C:\wamp\www\efosig\application\controllers\api\Personas_api.php 202
ERROR - 2015-02-04 17:24:16 --> Severity: Warning --> pg_query(): Query failed: ERROR:  error de sintaxis al final de la entrada
LINE 1: select id_persona from tb_persona where cedula= 
                                                        ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-04 17:24:16 --> Query error: ERROR:  error de sintaxis al final de la entrada
LINE 1: select id_persona from tb_persona where cedula= 
                                                        ^ - Invalid query: select id_persona from tb_persona where cedula= 
ERROR - 2015-02-04 17:31:40 --> Severity: Notice --> Undefined variable: cedula C:\wamp\www\efosig\application\controllers\api\Personas_api.php 203
ERROR - 2015-02-04 17:31:40 --> Severity: Warning --> pg_query(): Query failed: ERROR:  error de sintaxis al final de la entrada
LINE 1: select id_persona from tb_persona where cedula= 
                                                        ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-04 17:31:40 --> Query error: ERROR:  error de sintaxis al final de la entrada
LINE 1: select id_persona from tb_persona where cedula= 
                                                        ^ - Invalid query: select id_persona from tb_persona where cedula= 
ERROR - 2015-02-04 17:51:59 --> Severity: Warning --> Missing argument 2 for Cursos_model::get(), called in C:\wamp\www\efosig\application\controllers\Persona.php on line 40 and defined C:\wamp\www\efosig\application\models\Cursos_model.php 12
ERROR - 2015-02-04 17:51:59 --> Severity: Notice --> Undefined variable: est C:\wamp\www\efosig\application\models\Cursos_model.php 18
ERROR - 2015-02-04 17:52:14 --> Could not find the language line "create_user_validation_pregunta_label"
ERROR - 2015-02-04 17:52:14 --> Could not find the language line "create_user_validation_respuesta_label"
ERROR - 2015-02-04 17:52:33 --> Severity: Warning --> pg_query(): Query failed: ERROR:  no existe la columna «id_general»
LINE 2: WHERE &quot;id_general&quot; = '6'
              ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-04 17:52:33 --> Query error: ERROR:  no existe la columna «id_general»
LINE 2: WHERE "id_general" = '6'
              ^ - Invalid query: DELETE FROM "tb_general"
WHERE "id_general" = '6'
ERROR - 2015-02-04 17:52:41 --> Severity: Warning --> pg_query(): Query failed: ERROR:  update o delete en «tb_persona» viola la llave foránea «tr_persona_curso_id_persona_fkey» en la tabla «tr_persona_curso»
DETAIL:  La llave (id_persona)=(4) todavía es referida desde la tabla «tr_persona_curso». C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-04 17:52:41 --> Query error: ERROR:  update o delete en «tb_persona» viola la llave foránea «tr_persona_curso_id_persona_fkey» en la tabla «tr_persona_curso»
DETAIL:  La llave (id_persona)=(4) todavía es referida desde la tabla «tr_persona_curso». - Invalid query: DELETE FROM "tb_persona"
WHERE "id_persona" = '4'
ERROR - 2015-02-04 17:52:49 --> Severity: Warning --> pg_query(): Query failed: ERROR:  update o delete en «tb_persona» viola la llave foránea «tr_persona_curso_id_persona_fkey» en la tabla «tr_persona_curso»
DETAIL:  La llave (id_persona)=(4) todavía es referida desde la tabla «tr_persona_curso». C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-04 17:52:49 --> Query error: ERROR:  update o delete en «tb_persona» viola la llave foránea «tr_persona_curso_id_persona_fkey» en la tabla «tr_persona_curso»
DETAIL:  La llave (id_persona)=(4) todavía es referida desde la tabla «tr_persona_curso». - Invalid query: DELETE FROM "tb_persona"
WHERE "id_persona" = '4'
ERROR - 2015-02-04 17:54:31 --> Severity: Warning --> pg_query(): Query failed: ERROR:  no existe la columna «id_general»
LINE 2: WHERE &quot;id_general&quot; = '4'
              ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-04 17:54:31 --> Query error: ERROR:  no existe la columna «id_general»
LINE 2: WHERE "id_general" = '4'
              ^ - Invalid query: DELETE FROM "tb_general"
WHERE "id_general" = '4'
ERROR - 2015-02-04 17:54:35 --> Severity: Warning --> pg_query(): Query failed: ERROR:  no existe la columna «id_general»
LINE 2: WHERE &quot;id_general&quot; = '5'
              ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-04 17:54:35 --> Query error: ERROR:  no existe la columna «id_general»
LINE 2: WHERE "id_general" = '5'
              ^ - Invalid query: DELETE FROM "tb_general"
WHERE "id_general" = '5'
ERROR - 2015-02-04 17:56:07 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 100
ERROR - 2015-02-04 17:56:10 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 100
ERROR - 2015-02-04 17:56:17 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 100
ERROR - 2015-02-04 18:05:59 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\controllers\Cursos.php 30
ERROR - 2015-02-04 18:05:59 --> Severity: Warning --> pg_query(): Query failed: ERROR:  error de sintaxis al final de la entrada
LINE 3:           where b.estado_id = 
                                      ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-04 18:05:59 --> Query error: ERROR:  error de sintaxis al final de la entrada
LINE 3:           where b.estado_id = 
                                      ^ - Invalid query: select distinct a.*, b.* from tb_curso a
										inner join tr_curso_estado b on a.id_curso = b.curso_id
										where b.estado_id = 
ERROR - 2015-02-04 18:18:55 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 100
ERROR - 2015-02-04 18:18:58 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 100
ERROR - 2015-02-04 18:20:30 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 100
ERROR - 2015-02-04 18:20:33 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 100
ERROR - 2015-02-04 18:25:51 --> Severity: Warning --> pg_query(): Query failed: ERROR:  no existe la columna b.estado_id
LINE 9:             WHERE b.estado_id = 14
                          ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-04 18:25:51 --> Query error: ERROR:  no existe la columna b.estado_id
LINE 9:             WHERE b.estado_id = 14
                          ^ - Invalid query: SELECT DISTINCT a.*, b.nro_participantes AS inscritos, d.nombre as estado
										  FROM tb_curso a
 										  INNER JOIN tr_curso_participantes b 
										  ON a.id_curso = b.id_curso
										  INNER JOIN tr_curso_estado c
										  ON a.id_curso = c.curso_id
										  INNER JOIN tb_estado d 
										  ON c.estado_id = d.id_estado
										  WHERE b.estado_id = 14
ERROR - 2015-02-04 18:26:08 --> Severity: Notice --> Undefined property: Cursos_api::$persona_model C:\wamp\www\efosig\application\controllers\api\Cursos_api.php 24
ERROR - 2015-02-04 18:26:08 --> Severity: Error --> Call to a member function get_all() on a non-object C:\wamp\www\efosig\application\controllers\api\Cursos_api.php 24
ERROR - 2015-02-04 18:36:26 --> Severity: Notice --> Undefined property: Cursos_api::$persona_model C:\wamp\www\efosig\application\controllers\api\Cursos_api.php 24
ERROR - 2015-02-04 18:36:26 --> Severity: Error --> Call to a member function get_all() on a non-object C:\wamp\www\efosig\application\controllers\api\Cursos_api.php 24
ERROR - 2015-02-04 18:36:42 --> Severity: Notice --> Undefined property: Cursos_api::$persona_model C:\wamp\www\efosig\application\controllers\api\Cursos_api.php 24
ERROR - 2015-02-04 18:36:42 --> Severity: Error --> Call to a member function get_all() on a non-object C:\wamp\www\efosig\application\controllers\api\Cursos_api.php 24
ERROR - 2015-02-04 18:36:53 --> Severity: Notice --> Undefined property: Cursos_api::$persona_model C:\wamp\www\efosig\application\controllers\api\Cursos_api.php 24
ERROR - 2015-02-04 18:36:53 --> Severity: Error --> Call to a member function get_all() on a non-object C:\wamp\www\efosig\application\controllers\api\Cursos_api.php 24
ERROR - 2015-02-04 18:37:41 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 100
ERROR - 2015-02-04 18:38:06 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 100
ERROR - 2015-02-04 18:38:23 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 100
ERROR - 2015-02-04 18:38:38 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 100
ERROR - 2015-02-04 18:39:37 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 100
ERROR - 2015-02-04 18:39:42 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 100
ERROR - 2015-02-04 18:39:43 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\models\Cursos_model.php 11
ERROR - 2015-02-04 18:39:43 --> Severity: Warning --> pg_query(): Query failed: ERROR:  error de sintaxis al final de la entrada
LINE 1: SELECT id_estado FROM tb_persona WHERE id_persona = 
                                                            ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-04 18:39:43 --> Query error: ERROR:  error de sintaxis al final de la entrada
LINE 1: SELECT id_estado FROM tb_persona WHERE id_persona = 
                                                            ^ - Invalid query: SELECT id_estado FROM tb_persona WHERE id_persona = 
ERROR - 2015-02-04 18:40:51 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 100
ERROR - 2015-02-04 18:40:53 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\models\Cursos_model.php 11
ERROR - 2015-02-04 18:40:53 --> Severity: Warning --> pg_query(): Query failed: ERROR:  error de sintaxis al final de la entrada
LINE 1: SELECT id_estado FROM tb_persona WHERE id_persona = 
                                                            ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-04 18:40:53 --> Query error: ERROR:  error de sintaxis al final de la entrada
LINE 1: SELECT id_estado FROM tb_persona WHERE id_persona = 
                                                            ^ - Invalid query: SELECT id_estado FROM tb_persona WHERE id_persona = 
ERROR - 2015-02-04 18:41:00 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 100
ERROR - 2015-02-04 18:41:07 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\models\Cursos_model.php 11
ERROR - 2015-02-04 18:41:07 --> Severity: Warning --> pg_query(): Query failed: ERROR:  error de sintaxis al final de la entrada
LINE 1: SELECT id_estado FROM tb_persona WHERE id_persona = 
                                                            ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-04 18:41:07 --> Query error: ERROR:  error de sintaxis al final de la entrada
LINE 1: SELECT id_estado FROM tb_persona WHERE id_persona = 
                                                            ^ - Invalid query: SELECT id_estado FROM tb_persona WHERE id_persona = 
ERROR - 2015-02-04 18:42:28 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 100
ERROR - 2015-02-04 18:42:35 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 100
ERROR - 2015-02-04 19:01:51 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 100
ERROR - 2015-02-04 19:02:09 --> Severity: Notice --> Undefined variable: nombre C:\wamp\www\efosig\application\views\informe\ver.php 7
ERROR - 2015-02-04 20:08:40 --> Severity: Notice --> Undefined variable: pago C:\wamp\www\efosig\application\views\pdf_informe_output.php 26
ERROR - 2015-02-04 20:08:40 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\pdf_informe_output.php 26
ERROR - 2015-02-04 20:08:40 --> Severity: Notice --> Undefined variable: pago C:\wamp\www\efosig\application\views\pdf_informe_output.php 27
ERROR - 2015-02-04 20:08:40 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\pdf_informe_output.php 27
ERROR - 2015-02-04 20:08:40 --> Severity: Notice --> Undefined variable: pago C:\wamp\www\efosig\application\views\pdf_informe_output.php 27
ERROR - 2015-02-04 20:08:40 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\pdf_informe_output.php 27
ERROR - 2015-02-04 20:08:40 --> Severity: Notice --> Undefined variable: pago C:\wamp\www\efosig\application\views\pdf_informe_output.php 27
ERROR - 2015-02-04 20:08:40 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\pdf_informe_output.php 27
ERROR - 2015-02-04 20:08:40 --> Severity: Notice --> Undefined variable: pago C:\wamp\www\efosig\application\views\pdf_informe_output.php 46
ERROR - 2015-02-04 20:08:40 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\pdf_informe_output.php 46
ERROR - 2015-02-04 20:08:40 --> Severity: Notice --> Undefined property: stdClass::$banco C:\wamp\www\efosig\application\views\pdf_informe_output.php 49
ERROR - 2015-02-04 20:08:40 --> Severity: Notice --> Undefined property: stdClass::$forma C:\wamp\www\efosig\application\views\pdf_informe_output.php 51
ERROR - 2015-02-04 20:08:40 --> Severity: Notice --> Undefined property: stdClass::$transaccion C:\wamp\www\efosig\application\views\pdf_informe_output.php 52
ERROR - 2015-02-04 20:08:40 --> Severity: Notice --> Undefined property: stdClass::$monto C:\wamp\www\efosig\application\views\pdf_informe_output.php 53
ERROR - 2015-02-04 20:08:40 --> Severity: Notice --> Undefined property: stdClass::$monto C:\wamp\www\efosig\application\views\pdf_informe_output.php 56
ERROR - 2015-02-04 20:08:40 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\controllers\Informe.php 89
ERROR - 2015-02-04 20:08:40 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\controllers\Informe.php 89
ERROR - 2015-02-04 20:08:40 --> Unable to load the requested class: M_pdf
ERROR - 2015-02-04 20:09:02 --> Severity: Notice --> Undefined variable: pago C:\wamp\www\efosig\application\views\pdf_informe_output.php 26
ERROR - 2015-02-04 20:09:02 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\pdf_informe_output.php 26
ERROR - 2015-02-04 20:09:02 --> Severity: Notice --> Undefined variable: pago C:\wamp\www\efosig\application\views\pdf_informe_output.php 27
ERROR - 2015-02-04 20:09:02 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\pdf_informe_output.php 27
ERROR - 2015-02-04 20:09:02 --> Severity: Notice --> Undefined variable: pago C:\wamp\www\efosig\application\views\pdf_informe_output.php 27
ERROR - 2015-02-04 20:09:02 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\pdf_informe_output.php 27
ERROR - 2015-02-04 20:09:02 --> Severity: Notice --> Undefined variable: pago C:\wamp\www\efosig\application\views\pdf_informe_output.php 27
ERROR - 2015-02-04 20:09:02 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\pdf_informe_output.php 27
ERROR - 2015-02-04 20:09:02 --> Severity: Notice --> Undefined variable: pago C:\wamp\www\efosig\application\views\pdf_informe_output.php 46
ERROR - 2015-02-04 20:09:02 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\pdf_informe_output.php 46
ERROR - 2015-02-04 20:09:02 --> Severity: Notice --> Undefined property: stdClass::$banco C:\wamp\www\efosig\application\views\pdf_informe_output.php 49
ERROR - 2015-02-04 20:09:02 --> Severity: Notice --> Undefined property: stdClass::$forma C:\wamp\www\efosig\application\views\pdf_informe_output.php 51
ERROR - 2015-02-04 20:09:02 --> Severity: Notice --> Undefined property: stdClass::$transaccion C:\wamp\www\efosig\application\views\pdf_informe_output.php 52
ERROR - 2015-02-04 20:09:02 --> Severity: Notice --> Undefined property: stdClass::$monto C:\wamp\www\efosig\application\views\pdf_informe_output.php 53
ERROR - 2015-02-04 20:09:02 --> Severity: Notice --> Undefined property: stdClass::$monto C:\wamp\www\efosig\application\views\pdf_informe_output.php 56
ERROR - 2015-02-04 20:09:02 --> Severity: Notice --> Undefined property: stdClass::$curso C:\wamp\www\efosig\application\controllers\Informe.php 89
ERROR - 2015-02-04 20:09:02 --> Severity: Notice --> Undefined property: stdClass::$estado C:\wamp\www\efosig\application\controllers\Informe.php 89
ERROR - 2015-02-04 20:09:02 --> Unable to load the requested class: M_pdf
ERROR - 2015-02-04 20:10:26 --> Severity: Notice --> Undefined variable: pago C:\wamp\www\efosig\application\views\pdf_informe_output.php 26
ERROR - 2015-02-04 20:10:26 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\pdf_informe_output.php 26
ERROR - 2015-02-04 20:10:26 --> Severity: Notice --> Undefined variable: pago C:\wamp\www\efosig\application\views\pdf_informe_output.php 27
ERROR - 2015-02-04 20:10:26 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\pdf_informe_output.php 27
ERROR - 2015-02-04 20:10:26 --> Severity: Notice --> Undefined variable: pago C:\wamp\www\efosig\application\views\pdf_informe_output.php 27
ERROR - 2015-02-04 20:10:26 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\pdf_informe_output.php 27
ERROR - 2015-02-04 20:10:26 --> Severity: Notice --> Undefined variable: pago C:\wamp\www\efosig\application\views\pdf_informe_output.php 27
ERROR - 2015-02-04 20:10:26 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\pdf_informe_output.php 27
ERROR - 2015-02-04 20:10:26 --> Severity: Notice --> Undefined variable: pago C:\wamp\www\efosig\application\views\pdf_informe_output.php 46
ERROR - 2015-02-04 20:10:26 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\pdf_informe_output.php 46
ERROR - 2015-02-04 20:10:26 --> Severity: Notice --> Undefined property: stdClass::$banco C:\wamp\www\efosig\application\views\pdf_informe_output.php 49
ERROR - 2015-02-04 20:10:26 --> Severity: Notice --> Undefined property: stdClass::$forma C:\wamp\www\efosig\application\views\pdf_informe_output.php 51
ERROR - 2015-02-04 20:10:26 --> Severity: Notice --> Undefined property: stdClass::$transaccion C:\wamp\www\efosig\application\views\pdf_informe_output.php 52
ERROR - 2015-02-04 20:10:26 --> Severity: Notice --> Undefined property: stdClass::$monto C:\wamp\www\efosig\application\views\pdf_informe_output.php 53
ERROR - 2015-02-04 20:10:26 --> Severity: Notice --> Undefined property: stdClass::$monto C:\wamp\www\efosig\application\views\pdf_informe_output.php 56
ERROR - 2015-02-04 20:10:26 --> Unable to load the requested class: M_pdf
ERROR - 2015-02-04 20:11:30 --> Severity: Notice --> Undefined variable: pago C:\wamp\www\efosig\application\views\pdf_informe_output.php 26
ERROR - 2015-02-04 20:11:30 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\pdf_informe_output.php 26
ERROR - 2015-02-04 20:11:30 --> Severity: Notice --> Undefined variable: pago C:\wamp\www\efosig\application\views\pdf_informe_output.php 27
ERROR - 2015-02-04 20:11:30 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\pdf_informe_output.php 27
ERROR - 2015-02-04 20:11:30 --> Severity: Notice --> Undefined variable: pago C:\wamp\www\efosig\application\views\pdf_informe_output.php 27
ERROR - 2015-02-04 20:11:30 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\pdf_informe_output.php 27
ERROR - 2015-02-04 20:11:30 --> Severity: Notice --> Undefined variable: pago C:\wamp\www\efosig\application\views\pdf_informe_output.php 27
ERROR - 2015-02-04 20:11:30 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\pdf_informe_output.php 27
ERROR - 2015-02-04 20:11:30 --> Severity: Notice --> Undefined variable: pago C:\wamp\www\efosig\application\views\pdf_informe_output.php 46
ERROR - 2015-02-04 20:11:31 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\pdf_informe_output.php 46
ERROR - 2015-02-04 20:11:31 --> Severity: Notice --> Undefined property: stdClass::$banco C:\wamp\www\efosig\application\views\pdf_informe_output.php 49
ERROR - 2015-02-04 20:11:31 --> Severity: Notice --> Undefined property: stdClass::$forma C:\wamp\www\efosig\application\views\pdf_informe_output.php 51
ERROR - 2015-02-04 20:11:31 --> Severity: Notice --> Undefined property: stdClass::$transaccion C:\wamp\www\efosig\application\views\pdf_informe_output.php 52
ERROR - 2015-02-04 20:11:31 --> Severity: Notice --> Undefined property: stdClass::$monto C:\wamp\www\efosig\application\views\pdf_informe_output.php 53
ERROR - 2015-02-04 20:11:31 --> Severity: Notice --> Undefined property: stdClass::$monto C:\wamp\www\efosig\application\views\pdf_informe_output.php 56
ERROR - 2015-02-04 20:12:46 --> Severity: Parsing Error --> syntax error, unexpected end of file C:\wamp\www\efosig\application\views\pdf_informe_output.php 51
ERROR - 2015-02-04 20:13:02 --> Severity: Notice --> Undefined variable: pago C:\wamp\www\efosig\application\views\pdf_informe_output.php 26
ERROR - 2015-02-04 20:13:02 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\pdf_informe_output.php 26
ERROR - 2015-02-04 20:13:02 --> Severity: Notice --> Undefined variable: pago C:\wamp\www\efosig\application\views\pdf_informe_output.php 27
ERROR - 2015-02-04 20:13:02 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\pdf_informe_output.php 27
ERROR - 2015-02-04 20:13:02 --> Severity: Notice --> Undefined variable: pago C:\wamp\www\efosig\application\views\pdf_informe_output.php 27
ERROR - 2015-02-04 20:13:02 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\pdf_informe_output.php 27
ERROR - 2015-02-04 20:13:02 --> Severity: Notice --> Undefined variable: pago C:\wamp\www\efosig\application\views\pdf_informe_output.php 27
ERROR - 2015-02-04 20:13:02 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\pdf_informe_output.php 27
ERROR - 2015-02-04 23:28:07 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 100
ERROR - 2015-02-04 23:28:10 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 100
ERROR - 2015-02-04 23:28:30 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 100
ERROR - 2015-02-04 23:35:16 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 100
ERROR - 2015-02-04 23:35:23 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 100
ERROR - 2015-02-04 23:35:26 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 100
ERROR - 2015-02-04 23:35:41 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 100
ERROR - 2015-02-04 23:35:50 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 100
ERROR - 2015-02-04 23:43:18 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 100
ERROR - 2015-02-04 23:47:55 --> Severity: Warning --> pg_query(): Query failed: ERROR:  no existe la columna tb_informe.tipo_actividad_for
LINE 3:    tb_informe.tipo_actividad_for,
           ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-04 23:47:55 --> Query error: ERROR:  no existe la columna tb_informe.tipo_actividad_for
LINE 3:    tb_informe.tipo_actividad_for,
           ^ - Invalid query: SELECT
			tb_informe.id_informe,
			tb_informe.tipo_actividad_for,
			tb_informe.act_nombre_for,
			tb_redi.nombre AS region,
			users.first_name || ' ' || users.last_name as usuario,
			tb_curso.nombre as curso
			FROM
			tb_informe
			INNER JOIN tb_redi ON tb_informe.id_redi = tb_redi.id_redi
			INNER JOIN users ON tb_informe.id_usuario = users.id
			INNER JOIN tb_curso ON tb_curso.id_curso = tb_informe.id_curso
ERROR - 2015-02-04 23:55:23 --> Severity: Notice --> Undefined property: Informe_api::$informe_model C:\wamp\www\efosig\application\controllers\api\Informe_api.php 50
ERROR - 2015-02-04 23:55:24 --> Severity: Error --> Call to a member function delete() on a non-object C:\wamp\www\efosig\application\controllers\api\Informe_api.php 50
ERROR - 2015-02-04 23:56:06 --> Severity: Warning --> pg_query(): Query failed: ERROR:  update o delete en «tb_curso» viola la llave foránea «tr_persona_curso_id_curso_fkey» en la tabla «tr_persona_curso»
DETAIL:  La llave (id_curso)=(10) todavía es referida desde la tabla «tr_persona_curso». C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-04 23:56:07 --> Query error: ERROR:  update o delete en «tb_curso» viola la llave foránea «tr_persona_curso_id_curso_fkey» en la tabla «tr_persona_curso»
DETAIL:  La llave (id_curso)=(10) todavía es referida desde la tabla «tr_persona_curso». - Invalid query: DELETE FROM "tb_curso"
WHERE "id_curso" = '10'
ERROR - 2015-02-04 23:56:14 --> Severity: Warning --> pg_query(): Query failed: ERROR:  update o delete en «tb_curso» viola la llave foránea «tr_persona_curso_id_curso_fkey» en la tabla «tr_persona_curso»
DETAIL:  La llave (id_curso)=(10) todavía es referida desde la tabla «tr_persona_curso». C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-04 23:56:15 --> Query error: ERROR:  update o delete en «tb_curso» viola la llave foránea «tr_persona_curso_id_curso_fkey» en la tabla «tr_persona_curso»
DETAIL:  La llave (id_curso)=(10) todavía es referida desde la tabla «tr_persona_curso». - Invalid query: DELETE FROM "tb_curso"
WHERE "id_curso" = '10'
