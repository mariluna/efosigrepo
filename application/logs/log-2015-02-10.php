<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2015-02-10 00:43:07 --> Severity: Notice --> Undefined property: stdClass::$id_estado C:\wamp\www\efosig\application\views\cursos\asistencia.php 40
ERROR - 2015-02-10 00:43:07 --> Severity: Notice --> Undefined property: stdClass::$id_estado C:\wamp\www\efosig\application\views\cursos\asistencia.php 40
ERROR - 2015-02-10 00:43:07 --> Severity: Notice --> Undefined property: stdClass::$id_estado C:\wamp\www\efosig\application\views\cursos\asistencia.php 40
ERROR - 2015-02-10 00:43:07 --> Severity: Notice --> Undefined property: stdClass::$id_estado C:\wamp\www\efosig\application\views\cursos\asistencia.php 40
ERROR - 2015-02-10 00:43:07 --> Severity: Notice --> Undefined property: stdClass::$id_estado C:\wamp\www\efosig\application\views\cursos\asistencia.php 40
ERROR - 2015-02-10 00:43:07 --> Severity: Notice --> Undefined property: stdClass::$id_estado C:\wamp\www\efosig\application\views\cursos\asistencia.php 40
ERROR - 2015-02-10 00:43:07 --> Severity: Notice --> Undefined property: stdClass::$id_estado C:\wamp\www\efosig\application\views\cursos\asistencia.php 40
ERROR - 2015-02-10 00:43:07 --> Severity: Notice --> Undefined property: stdClass::$id_estado C:\wamp\www\efosig\application\views\cursos\asistencia.php 40
ERROR - 2015-02-10 00:43:07 --> Severity: Notice --> Undefined property: stdClass::$id_estado C:\wamp\www\efosig\application\views\cursos\asistencia.php 40
ERROR - 2015-02-10 00:43:07 --> Severity: Notice --> Undefined property: stdClass::$id_estado C:\wamp\www\efosig\application\views\cursos\asistencia.php 40
ERROR - 2015-02-10 00:43:07 --> Severity: Notice --> Undefined property: stdClass::$id_estado C:\wamp\www\efosig\application\views\cursos\asistencia.php 40
ERROR - 2015-02-10 00:43:07 --> Severity: Notice --> Undefined property: stdClass::$id_estado C:\wamp\www\efosig\application\views\cursos\asistencia.php 40
ERROR - 2015-02-10 00:43:07 --> Severity: Notice --> Undefined property: stdClass::$id_estado C:\wamp\www\efosig\application\views\cursos\asistencia.php 40
ERROR - 2015-02-10 00:43:07 --> Severity: Notice --> Undefined property: stdClass::$id_estado C:\wamp\www\efosig\application\views\cursos\asistencia.php 40
ERROR - 2015-02-10 00:43:11 --> Severity: Warning --> pg_query(): Query failed: ERROR:  error de sintaxis en o cerca de «_»
LINE 3:         where pc.id_curso = 22_
                                      ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-10 00:43:11 --> Query error: ERROR:  error de sintaxis en o cerca de «_»
LINE 3:         where pc.id_curso = 22_
                                      ^ - Invalid query: select * from tb_persona p
								inner join tr_persona_curso pc on p.id_persona = pc.id_persona
								where pc.id_curso = 22_
ERROR - 2015-02-10 00:43:15 --> Severity: Warning --> pg_query(): Query failed: ERROR:  error de sintaxis en o cerca de «_»
LINE 3:         where pc.id_curso = 2_
                                     ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-10 00:43:15 --> Query error: ERROR:  error de sintaxis en o cerca de «_»
LINE 3:         where pc.id_curso = 2_
                                     ^ - Invalid query: select * from tb_persona p
								inner join tr_persona_curso pc on p.id_persona = pc.id_persona
								where pc.id_curso = 2_
ERROR - 2015-02-10 00:43:29 --> Severity: Warning --> pg_query(): Query failed: ERROR:  error de sintaxis en o cerca de «_»
LINE 3:         where pc.id_curso = 22_
                                      ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-10 00:43:29 --> Query error: ERROR:  error de sintaxis en o cerca de «_»
LINE 3:         where pc.id_curso = 22_
                                      ^ - Invalid query: select * from tb_persona p
								inner join tr_persona_curso pc on p.id_persona = pc.id_persona
								where pc.id_curso = 22_
ERROR - 2015-02-10 00:44:29 --> Severity: Warning --> pg_query(): Query failed: ERROR:  no existe la columna b.id_estado
LINE 1: ...o_participantes AS inscritos, d.nombre as estado, b.id_estad...
                                                             ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-10 00:44:29 --> Query error: ERROR:  no existe la columna b.id_estado
LINE 1: ...o_participantes AS inscritos, d.nombre as estado, b.id_estad...
                                                             ^ - Invalid query: SELECT DISTINCT a.*, b.nro_participantes AS inscritos, d.nombre as estado, b.id_estado
											  FROM tb_curso a
											  INNER JOIN tr_curso_participantes b 
											  ON a.id_curso = b.id_curso
											  INNER JOIN tr_curso_estado c
											  ON a.id_curso = c.curso_id
											  INNER JOIN tb_estado d 
											  ON c.estado_id = d.id_estado
ERROR - 2015-02-10 00:45:34 --> Severity: Warning --> pg_query(): Query failed: ERROR:  error de sintaxis en o cerca de «_14»
LINE 3:         where pc.id_curso = 20_14
                                      ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-10 00:45:34 --> Query error: ERROR:  error de sintaxis en o cerca de «_14»
LINE 3:         where pc.id_curso = 20_14
                                      ^ - Invalid query: select * from tb_persona p
								inner join tr_persona_curso pc on p.id_persona = pc.id_persona
								where pc.id_curso = 20_14
ERROR - 2015-02-10 00:50:29 --> Severity: Warning --> pg_query(): Query failed: ERROR:  error de sintaxis en o cerca de «_15»
LINE 3:         where pc.id_curso = 20_15
                                      ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-10 00:50:29 --> Query error: ERROR:  error de sintaxis en o cerca de «_15»
LINE 3:         where pc.id_curso = 20_15
                                      ^ - Invalid query: select * from tb_persona p
								inner join tr_persona_curso pc on p.id_persona = pc.id_persona
								where pc.id_curso = 20_15
ERROR - 2015-02-10 01:09:52 --> Severity: Parsing Error --> syntax error, unexpected '=', expecting ')' C:\wamp\www\efosig\application\controllers\api\Cursos_api.php 80
ERROR - 2015-02-10 01:10:24 --> Severity: Parsing Error --> syntax error, unexpected '=', expecting ')' C:\wamp\www\efosig\application\controllers\api\Cursos_api.php 80
ERROR - 2015-02-10 01:10:58 --> Severity: Parsing Error --> syntax error, unexpected '*' C:\wamp\www\efosig\application\controllers\api\Cursos_api.php 139
ERROR - 2015-02-10 01:11:27 --> Severity: Warning --> pg_query(): Query failed: ERROR:  no existe la columna «curso_id» en la relación «tr_curso_participantes»
LINE 1: INSERT INTO &quot;tr_curso_participantes&quot; (&quot;curso_id&quot;, &quot;estado_id...
                                              ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-10 01:11:27 --> Query error: ERROR:  no existe la columna «curso_id» en la relación «tr_curso_participantes»
LINE 1: INSERT INTO "tr_curso_participantes" ("curso_id", "estado_id...
                                              ^ - Invalid query: INSERT INTO "tr_curso_participantes" ("curso_id", "estado_id", "nro_participantes") VALUES ('26','14',0), ('26','24',0)
ERROR - 2015-02-10 14:55:29 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-10 14:55:35 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-10 15:31:09 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-10 15:31:12 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-10 15:31:37 --> Severity: Warning --> Missing argument 1 for Cursos::registrar_curso() C:\wamp\www\efosig\application\controllers\Cursos.php 82
ERROR - 2015-02-10 15:31:37 --> Severity: Warning --> Missing argument 2 for Cursos::registrar_curso() C:\wamp\www\efosig\application\controllers\Cursos.php 82
ERROR - 2015-02-10 15:31:37 --> Severity: Warning --> Missing argument 3 for Cursos::registrar_curso() C:\wamp\www\efosig\application\controllers\Cursos.php 82
ERROR - 2015-02-10 15:31:37 --> Severity: Warning --> Missing argument 4 for Cursos::registrar_curso() C:\wamp\www\efosig\application\controllers\Cursos.php 82
ERROR - 2015-02-10 15:31:37 --> Severity: Warning --> Missing argument 5 for Cursos::registrar_curso() C:\wamp\www\efosig\application\controllers\Cursos.php 82
ERROR - 2015-02-10 15:31:37 --> Severity: Notice --> Undefined variable: part C:\wamp\www\efosig\application\controllers\Cursos.php 86
ERROR - 2015-02-10 15:31:45 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-10 15:31:47 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-10 15:31:56 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-10 15:32:37 --> Severity: Warning --> pg_query(): Query failed: ERROR:  error de sintaxis en o cerca de «_14»
LINE 3:         where pc.id_curso = 27_14
                                      ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-10 15:32:37 --> Query error: ERROR:  error de sintaxis en o cerca de «_14»
LINE 3:         where pc.id_curso = 27_14
                                      ^ - Invalid query: select * from tb_persona p
								inner join tr_persona_curso pc on p.id_persona = pc.id_persona
								where pc.id_curso = 27_14
ERROR - 2015-02-10 15:33:07 --> Severity: Warning --> pg_query(): Query failed: ERROR:  error de sintaxis en o cerca de «_24»
LINE 3:         where pc.id_curso = 27_24
                                      ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-10 15:33:07 --> Query error: ERROR:  error de sintaxis en o cerca de «_24»
LINE 3:         where pc.id_curso = 27_24
                                      ^ - Invalid query: select * from tb_persona p
								inner join tr_persona_curso pc on p.id_persona = pc.id_persona
								where pc.id_curso = 27_24
ERROR - 2015-02-10 15:37:23 --> Severity: Notice --> Undefined variable: cursos C:\wamp\www\efosig\application\controllers\Cursos.php 120
ERROR - 2015-02-10 15:37:23 --> Severity: Notice --> Undefined offset: 1 C:\wamp\www\efosig\application\controllers\Cursos.php 122
ERROR - 2015-02-10 15:40:00 --> Severity: Warning --> pg_query(): Query failed: ERROR:  la columna «nro_participantes» es de tipo integer pero la expresión es de tipo boolean
LINE 1: ... &quot;fecha_inicio&quot;, &quot;fecha_fin&quot;) VALUES (FALSE, '5', FALSE, 1, ...
                                                             ^
HINT:  Necesitará reescribir la expresión o aplicarle una conversión de tipo. C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-10 15:40:00 --> Query error: ERROR:  la columna «nro_participantes» es de tipo integer pero la expresión es de tipo boolean
LINE 1: ... "fecha_inicio", "fecha_fin") VALUES (FALSE, '5', FALSE, 1, ...
                                                             ^
HINT:  Necesitará reescribir la expresión o aplicarle una conversión de tipo. - Invalid query: INSERT INTO "tb_curso" ("nombre", "duracion", "nro_participantes", "status", "fecha_inicio", "fecha_fin") VALUES (FALSE, '5', FALSE, 1, FALSE, FALSE)
ERROR - 2015-02-10 15:49:40 --> Severity: Warning --> Missing argument 1 for Cursos::getInscritos() C:\wamp\www\efosig\application\controllers\Cursos.php 115
ERROR - 2015-02-10 15:49:40 --> Severity: Notice --> Undefined variable: curso C:\wamp\www\efosig\application\controllers\Cursos.php 119
ERROR - 2015-02-10 15:49:40 --> Severity: Notice --> Undefined variable: curso C:\wamp\www\efosig\application\controllers\Cursos.php 120
ERROR - 2015-02-10 15:49:40 --> Severity: Notice --> Undefined offset: 1 C:\wamp\www\efosig\application\controllers\Cursos.php 122
ERROR - 2015-02-10 15:49:40 --> Severity: Warning --> pg_query(): Query failed: ERROR:  error de sintaxis en o cerca de «and»
LINE 4:         and pc.id_estado = 
                ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-10 15:49:41 --> Query error: ERROR:  error de sintaxis en o cerca de «and»
LINE 4:         and pc.id_estado = 
                ^ - Invalid query: select * from tb_persona p
								inner join tr_persona_curso pc on p.id_persona = pc.id_persona
								where pc.id_curso = 
								and pc.id_estado = 
ERROR - 2015-02-10 16:26:57 --> Severity: Parsing Error --> syntax error, unexpected '"tb_asistencia"' (T_CONSTANT_ENCAPSED_STRING), expecting variable (T_VARIABLE) or '$' C:\wamp\www\efosig\application\models\Cursos_model.php 85
ERROR - 2015-02-10 16:39:14 --> Severity: Compile Error --> Cannot redeclare Cursos::agregarAsistencia() C:\wamp\www\efosig\application\controllers\Cursos.php 59
ERROR - 2015-02-10 16:40:58 --> Severity: Notice --> Undefined variable: cursos C:\wamp\www\efosig\application\views\cursos\descargar_asistencia.php 63
ERROR - 2015-02-10 16:40:58 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp\www\efosig\application\views\cursos\descargar_asistencia.php 63
ERROR - 2015-02-10 17:07:30 --> Severity: Warning --> pg_query(): Query failed: ERROR:  llave duplicada viola restricción de unicidad «groups_pkey»
DETAIL:  Ya existe la llave (id)=(1). C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-10 17:07:30 --> Query error: ERROR:  llave duplicada viola restricción de unicidad «groups_pkey»
DETAIL:  Ya existe la llave (id)=(1). - Invalid query: INSERT INTO "groups" ("name", "description") VALUES ('Facilitador', 'Facilitador de los cursos')
ERROR - 2015-02-10 17:07:37 --> Severity: Warning --> pg_query(): Query failed: ERROR:  llave duplicada viola restricción de unicidad «groups_pkey»
DETAIL:  Ya existe la llave (id)=(2). C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-10 17:07:37 --> Query error: ERROR:  llave duplicada viola restricción de unicidad «groups_pkey»
DETAIL:  Ya existe la llave (id)=(2). - Invalid query: INSERT INTO "groups" ("name", "description") VALUES ('Facilitador', 'Facilitador de los cursos')
ERROR - 2015-02-10 17:07:40 --> Could not find the language line "group_creation_successful"
ERROR - 2015-02-10 17:07:47 --> Could not find the language line "create_user_validation_pregunta_label"
ERROR - 2015-02-10 17:07:47 --> Could not find the language line "create_user_validation_respuesta_label"
ERROR - 2015-02-10 17:12:13 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-10 17:12:15 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-10 18:09:56 --> Severity: Notice --> Undefined variable: cursos C:\wamp\www\efosig\application\views\cursos\descargar_asistencia.php 59
ERROR - 2015-02-10 18:09:56 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp\www\efosig\application\views\cursos\descargar_asistencia.php 59
ERROR - 2015-02-10 18:13:16 --> Severity: Notice --> Undefined variable: cursos C:\wamp\www\efosig\application\views\cursos\descargar_asistencia.php 60
ERROR - 2015-02-10 18:13:16 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp\www\efosig\application\views\cursos\descargar_asistencia.php 60
ERROR - 2015-02-10 18:17:52 --> Severity: Notice --> Undefined property: Cursos::$cursos_model C:\wamp\www\efosig\application\controllers\Cursos.php 63
ERROR - 2015-02-10 18:17:52 --> Severity: Error --> Call to a member function get_all() on a non-object C:\wamp\www\efosig\application\controllers\Cursos.php 63
ERROR - 2015-02-10 18:49:39 --> 404 Page Not Found: Curso/generarExcel
ERROR - 2015-02-10 18:50:18 --> 404 Page Not Found: Curso/generarExcel
ERROR - 2015-02-10 19:05:29 --> Severity: Error --> Call to undefined method Cursos_model::getEstados() C:\wamp\www\efosig\application\controllers\Cursos.php 65
ERROR - 2015-02-10 19:05:40 --> Severity: Notice --> Undefined variable: estado C:\wamp\www\efosig\application\views\cursos\descargar_asistencia.php 156
ERROR - 2015-02-10 19:05:40 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp\www\efosig\application\views\cursos\descargar_asistencia.php 156
ERROR - 2015-02-10 19:06:18 --> Severity: Notice --> Undefined variable: estado C:\wamp\www\efosig\application\views\cursos\descargar_asistencia.php 156
ERROR - 2015-02-10 19:06:18 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp\www\efosig\application\views\cursos\descargar_asistencia.php 156
ERROR - 2015-02-10 19:07:02 --> Severity: Notice --> Undefined variable: estado C:\wamp\www\efosig\application\views\cursos\descargar_asistencia.php 156
ERROR - 2015-02-10 19:07:02 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp\www\efosig\application\views\cursos\descargar_asistencia.php 156
ERROR - 2015-02-10 19:07:29 --> Severity: Notice --> Undefined variable: estado C:\wamp\www\efosig\application\views\cursos\descargar_asistencia.php 156
ERROR - 2015-02-10 19:07:29 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp\www\efosig\application\views\cursos\descargar_asistencia.php 156
ERROR - 2015-02-10 19:09:27 --> Severity: Notice --> Undefined variable: estado C:\wamp\www\efosig\application\views\cursos\descargar_asistencia.php 160
ERROR - 2015-02-10 19:09:27 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp\www\efosig\application\views\cursos\descargar_asistencia.php 160
ERROR - 2015-02-10 19:10:19 --> Severity: Notice --> Undefined variable: estado C:\wamp\www\efosig\application\views\cursos\descargar_asistencia.php 160
ERROR - 2015-02-10 19:10:19 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp\www\efosig\application\views\cursos\descargar_asistencia.php 160
ERROR - 2015-02-10 19:10:22 --> Severity: Notice --> Undefined variable: estado C:\wamp\www\efosig\application\views\cursos\descargar_asistencia.php 160
ERROR - 2015-02-10 19:10:22 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp\www\efosig\application\views\cursos\descargar_asistencia.php 160
ERROR - 2015-02-10 19:10:44 --> Severity: Notice --> Undefined variable: estado C:\wamp\www\efosig\application\views\cursos\descargar_asistencia.php 160
ERROR - 2015-02-10 19:10:44 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp\www\efosig\application\views\cursos\descargar_asistencia.php 160
ERROR - 2015-02-10 19:23:12 --> 404 Page Not Found: Curso/getCurso
ERROR - 2015-02-10 19:23:28 --> 404 Page Not Found: Curso/getCurso
ERROR - 2015-02-10 19:24:10 --> Severity: Notice --> Undefined variable: id C:\wamp\www\efosig\application\models\Cursos_model.php 109
ERROR - 2015-02-10 19:24:10 --> Severity: Warning --> pg_query(): Query failed: ERROR:  error de sintaxis al final de la entrada
LINE 4:         where ce.estado_id =  
                                      ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-10 19:24:10 --> Query error: ERROR:  error de sintaxis al final de la entrada
LINE 4:         where ce.estado_id =  
                                      ^ - Invalid query: select c.* from tb_curso c 
								inner join tr_curso_estado ce
								on ce.curso_id = c.id_curso
								where ce.estado_id =  
ERROR - 2015-02-10 19:53:54 --> Severity: Parsing Error --> syntax error, unexpected '*' C:\wamp\www\efosig\application\controllers\Cursos.php 199
ERROR - 2015-02-10 19:53:54 --> Severity: Parsing Error --> syntax error, unexpected '*' C:\wamp\www\efosig\application\controllers\Cursos.php 199
ERROR - 2015-02-10 19:53:55 --> Severity: Parsing Error --> syntax error, unexpected '*' C:\wamp\www\efosig\application\controllers\Cursos.php 199
ERROR - 2015-02-10 19:54:13 --> Severity: Parsing Error --> syntax error, unexpected '}' C:\wamp\www\efosig\application\controllers\Cursos.php 207
ERROR - 2015-02-10 19:54:25 --> Severity: Error --> Call to undefined method Cursos::post() C:\wamp\www\efosig\application\controllers\Cursos.php 175
ERROR - 2015-02-10 20:12:35 --> Severity: Parsing Error --> syntax error, unexpected ',' C:\wamp\www\efosig\application\controllers\Cursos.php 215
