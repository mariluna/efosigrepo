<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2015-02-09 16:20:27 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 100
ERROR - 2015-02-09 16:20:39 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 100
ERROR - 2015-02-09 16:32:23 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 100
ERROR - 2015-02-09 16:33:01 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 100
ERROR - 2015-02-09 16:36:02 --> 404 Page Not Found: Cursos/agregarcxcxcx
ERROR - 2015-02-09 16:37:03 --> 404 Page Not Found: Cursos/agregarcxcxcx
ERROR - 2015-02-09 16:37:03 --> Severity: Notice --> Undefined property: CI_Exceptions::$ion_auth C:\wamp\www\efosig\application\views\errors\html\error_404.php 30
ERROR - 2015-02-09 16:37:03 --> Severity: Error --> Call to a member function get_users_groups() on a non-object C:\wamp\www\efosig\application\views\errors\html\error_404.php 30
ERROR - 2015-02-09 16:37:57 --> 404 Page Not Found: Cursos/agregarcxcxcx
ERROR - 2015-02-09 16:37:57 --> Severity: Error --> Call to undefined function base_url() C:\wamp\www\efosig\application\views\errors\html\error_404.php 44
ERROR - 2015-02-09 16:38:19 --> 404 Page Not Found: Cursos/agregarcxcxcx
ERROR - 2015-02-09 16:38:19 --> Severity: Error --> Call to undefined function base_url() C:\wamp\www\efosig\application\views\errors\html\error_404.php 46
ERROR - 2015-02-09 16:38:20 --> 404 Page Not Found: Cursos/agregarcxcxcx
ERROR - 2015-02-09 16:38:21 --> Severity: Error --> Call to undefined function base_url() C:\wamp\www\efosig\application\views\errors\html\error_404.php 46
ERROR - 2015-02-09 16:38:21 --> 404 Page Not Found: Cursos/agregarcxcxcx
ERROR - 2015-02-09 16:38:21 --> Severity: Error --> Call to undefined function base_url() C:\wamp\www\efosig\application\views\errors\html\error_404.php 46
ERROR - 2015-02-09 16:38:22 --> 404 Page Not Found: Cursos/agregarcxcxcx
ERROR - 2015-02-09 16:38:22 --> Severity: Error --> Call to undefined function base_url() C:\wamp\www\efosig\application\views\errors\html\error_404.php 46
ERROR - 2015-02-09 16:38:23 --> 404 Page Not Found: Cursos/agregarcxcxcx
ERROR - 2015-02-09 16:38:23 --> Severity: Error --> Call to undefined function base_url() C:\wamp\www\efosig\application\views\errors\html\error_404.php 46
ERROR - 2015-02-09 16:38:23 --> 404 Page Not Found: Cursos/agregarcxcxcx
ERROR - 2015-02-09 16:38:23 --> Severity: Error --> Call to undefined function base_url() C:\wamp\www\efosig\application\views\errors\html\error_404.php 46
ERROR - 2015-02-09 16:38:24 --> 404 Page Not Found: Cursos/agregarcxcxcx
ERROR - 2015-02-09 16:38:24 --> Severity: Error --> Call to undefined function base_url() C:\wamp\www\efosig\application\views\errors\html\error_404.php 46
ERROR - 2015-02-09 16:38:25 --> 404 Page Not Found: Cursos/agregarcxcxcx
ERROR - 2015-02-09 16:38:25 --> Severity: Error --> Call to undefined function base_url() C:\wamp\www\efosig\application\views\errors\html\error_404.php 46
ERROR - 2015-02-09 16:38:25 --> 404 Page Not Found: Cursos/agregarcxcxcx
ERROR - 2015-02-09 16:38:25 --> Severity: Error --> Call to undefined function base_url() C:\wamp\www\efosig\application\views\errors\html\error_404.php 46
ERROR - 2015-02-09 16:38:26 --> 404 Page Not Found: Cursos/agregarcxcxcx
ERROR - 2015-02-09 16:38:26 --> Severity: Error --> Call to undefined function base_url() C:\wamp\www\efosig\application\views\errors\html\error_404.php 46
ERROR - 2015-02-09 17:15:58 --> Severity: Warning --> pg_query(): Query failed: ERROR:  no existe la columna «id»
LINE 1: SELECT id FROM tb_curso WHERE nombre = 'efosig' AND duracion...
               ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-09 17:15:58 --> Query error: ERROR:  no existe la columna «id»
LINE 1: SELECT id FROM tb_curso WHERE nombre = 'efosig' AND duracion...
               ^ - Invalid query: SELECT id FROM tb_curso WHERE nombre = 'efosig' AND duracion = '20' AND nro_participantes = '20'
ERROR - 2015-02-09 17:17:32 --> Severity: 4096 --> Object of class CI_DB_postgre_result could not be converted to string C:\wamp\www\efosig\system\database\DB_query_builder.php 1520
ERROR - 2015-02-09 17:17:32 --> Severity: Warning --> pg_query(): Query failed: ERROR:  error de sintaxis en o cerca de «,»
LINE 1: ...O &quot;tr_curso_estado&quot; (&quot;curso_id&quot;, &quot;estado_id&quot;) VALUES (,'24')
                                                                 ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-09 17:17:32 --> Query error: ERROR:  error de sintaxis en o cerca de «,»
LINE 1: ...O "tr_curso_estado" ("curso_id", "estado_id") VALUES (,'24')
                                                                 ^ - Invalid query: INSERT INTO "tr_curso_estado" ("curso_id", "estado_id") VALUES (,'24')
ERROR - 2015-02-09 17:19:38 --> Severity: Warning --> Missing argument 2 for Cursos_model::get(), called in C:\wamp\www\efosig\application\controllers\Cursos.php on line 55 and defined C:\wamp\www\efosig\application\models\Cursos_model.php 54
ERROR - 2015-02-09 17:19:38 --> Severity: Notice --> Undefined variable: est C:\wamp\www\efosig\application\models\Cursos_model.php 60
ERROR - 2015-02-09 17:19:38 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\controllers\Cursos.php 56
ERROR - 2015-02-09 17:19:39 --> Severity: Warning --> pg_query(): Query failed: ERROR:  el operador no existe: integer &lt;&gt;
LINE 1: select * from tb_estado where id_estado != 
                                                ^
HINT:  Ningún operador coincide con el nombre y el tipo de los argumentos. Puede ser necesario agregar conversiones explícitas de tipos. C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-09 17:19:39 --> Query error: ERROR:  el operador no existe: integer <>
LINE 1: select * from tb_estado where id_estado != 
                                                ^
HINT:  Ningún operador coincide con el nombre y el tipo de los argumentos. Puede ser necesario agregar conversiones explícitas de tipos. - Invalid query: select * from tb_estado where id_estado != 
ERROR - 2015-02-09 20:04:18 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 100
ERROR - 2015-02-09 20:04:30 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 100
ERROR - 2015-02-09 20:18:17 --> Severity: Notice --> Undefined variable: row C:\wamp\www\efosig\application\views\cursos\ver.php 7
ERROR - 2015-02-09 20:18:17 --> Severity: Notice --> Undefined variable: row C:\wamp\www\efosig\application\views\cursos\ver.php 8
ERROR - 2015-02-09 20:18:17 --> Severity: Notice --> Undefined offset: 2 C:\wamp\www\efosig\application\views\cursos\ver.php 11
ERROR - 2015-02-09 20:18:17 --> Severity: Notice --> Undefined offset: 1 C:\wamp\www\efosig\application\views\cursos\ver.php 11
ERROR - 2015-02-09 20:18:17 --> Severity: Notice --> Undefined offset: 2 C:\wamp\www\efosig\application\views\cursos\ver.php 12
ERROR - 2015-02-09 20:18:17 --> Severity: Notice --> Undefined offset: 1 C:\wamp\www\efosig\application\views\cursos\ver.php 12
ERROR - 2015-02-09 20:19:07 --> Severity: Warning --> Missing argument 2 for Cursos_model::get(), called in C:\wamp\www\efosig\application\controllers\Cursos.php on line 55 and defined C:\wamp\www\efosig\application\models\Cursos_model.php 54
ERROR - 2015-02-09 20:19:07 --> Severity: Notice --> Undefined variable: est C:\wamp\www\efosig\application\models\Cursos_model.php 60
ERROR - 2015-02-09 20:19:07 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\controllers\Cursos.php 56
ERROR - 2015-02-09 20:19:07 --> Severity: Warning --> pg_query(): Query failed: ERROR:  el operador no existe: integer &lt;&gt;
LINE 1: select * from tb_estado where id_estado != 
                                                ^
HINT:  Ningún operador coincide con el nombre y el tipo de los argumentos. Puede ser necesario agregar conversiones explícitas de tipos. C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-09 20:19:07 --> Query error: ERROR:  el operador no existe: integer <>
LINE 1: select * from tb_estado where id_estado != 
                                                ^
HINT:  Ningún operador coincide con el nombre y el tipo de los argumentos. Puede ser necesario agregar conversiones explícitas de tipos. - Invalid query: select * from tb_estado where id_estado != 
ERROR - 2015-02-09 20:23:07 --> Severity: Notice --> Undefined variable: est C:\wamp\www\efosig\application\controllers\Cursos.php 55
ERROR - 2015-02-09 20:23:41 --> Severity: Warning --> Missing argument 2 for Cursos::editar() C:\wamp\www\efosig\application\controllers\Cursos.php 50
ERROR - 2015-02-09 20:23:41 --> Severity: Notice --> Undefined variable: est C:\wamp\www\efosig\application\controllers\Cursos.php 55
ERROR - 2015-02-09 20:24:52 --> Severity: Notice --> Undefined property: stdClass::$id_estado C:\wamp\www\efosig\application\views\cursos\editar.php 69
ERROR - 2015-02-09 20:25:44 --> Severity: Warning --> pg_query(): Query failed: ERROR:  no existe la columna «id_estado» en la relación «tb_curso»
LINE 1: ...', &quot;duracion&quot; = '10', &quot;nro_participantes&quot; = '20', &quot;id_estado...
                                                             ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-09 20:25:44 --> Query error: ERROR:  no existe la columna «id_estado» en la relación «tb_curso»
LINE 1: ...', "duracion" = '10', "nro_participantes" = '20', "id_estado...
                                                             ^ - Invalid query: UPDATE "tb_curso" SET "nombre" = 'manualidades', "duracion" = '10', "nro_participantes" = '20', "id_estado" = ' <div ', "status" = '0'
WHERE "id_curso" = '2'
ERROR - 2015-02-09 20:26:13 --> Severity: Notice --> Undefined property: stdClass::$id_estado C:\wamp\www\efosig\application\views\cursos\editar.php 69
ERROR - 2015-02-09 20:26:29 --> Severity: Notice --> Undefined property: stdClass::$id_estado C:\wamp\www\efosig\application\views\cursos\editar.php 69
ERROR - 2015-02-09 20:26:45 --> Severity: Notice --> Undefined property: stdClass::$id_estado C:\wamp\www\efosig\application\views\cursos\editar.php 69
ERROR - 2015-02-09 20:26:49 --> Severity: Notice --> Undefined property: stdClass::$id_estado C:\wamp\www\efosig\application\views\cursos\editar.php 69
ERROR - 2015-02-09 20:27:05 --> Severity: Notice --> Undefined property: stdClass::$id_estado C:\wamp\www\efosig\application\views\cursos\editar.php 69
ERROR - 2015-02-09 20:27:34 --> Severity: Notice --> Undefined property: stdClass::$id_estado C:\wamp\www\efosig\application\views\cursos\editar.php 69
ERROR - 2015-02-09 20:28:25 --> Severity: Notice --> Undefined property: stdClass::$id_estado C:\wamp\www\efosig\application\views\cursos\editar.php 69
ERROR - 2015-02-09 20:28:28 --> Severity: Notice --> Undefined property: stdClass::$id_estado C:\wamp\www\efosig\application\views\cursos\editar.php 69
ERROR - 2015-02-09 20:29:47 --> Severity: Notice --> Undefined property: stdClass::$id_estado C:\wamp\www\efosig\application\views\cursos\editar.php 69
ERROR - 2015-02-09 20:29:52 --> Severity: Warning --> pg_query(): Query failed: ERROR:  no existe la columna «id_estado» en la relación «tb_curso»
LINE 1: ... &quot;duracion&quot; = '10mn', &quot;nro_participantes&quot; = '20', &quot;id_estado...
                                                             ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-09 20:29:52 --> Query error: ERROR:  no existe la columna «id_estado» en la relación «tb_curso»
LINE 1: ... "duracion" = '10mn', "nro_participantes" = '20', "id_estado...
                                                             ^ - Invalid query: UPDATE "tb_curso" SET "nombre" = 'manualidades', "duracion" = '10mn', "nro_participantes" = '20', "id_estado" = ' <div ', "status" = '0'
WHERE "id_curso" = '2'
ERROR - 2015-02-09 20:47:29 --> Severity: Notice --> Undefined property: stdClass::$id_estado C:\wamp\www\efosig\application\views\cursos\editar.php 69
ERROR - 2015-02-09 20:48:18 --> Severity: Notice --> Undefined property: stdClass::$id_estado C:\wamp\www\efosig\application\views\cursos\editar.php 79
ERROR - 2015-02-09 20:48:22 --> Severity: Notice --> Undefined property: stdClass::$id_estado C:\wamp\www\efosig\application\views\cursos\editar.php 79
ERROR - 2015-02-09 20:48:39 --> Severity: Notice --> Undefined property: stdClass::$id_estado C:\wamp\www\efosig\application\views\cursos\editar.php 79
ERROR - 2015-02-09 20:48:48 --> Severity: Notice --> Undefined property: stdClass::$id_estado C:\wamp\www\efosig\application\views\cursos\editar.php 79
ERROR - 2015-02-09 20:49:37 --> Severity: Notice --> Undefined property: stdClass::$id_estado C:\wamp\www\efosig\application\views\cursos\editar.php 79
ERROR - 2015-02-09 20:53:41 --> Severity: Notice --> Undefined property: stdClass::$id_estado C:\wamp\www\efosig\application\views\cursos\editar.php 107
ERROR - 2015-02-09 20:54:13 --> Severity: Notice --> Undefined property: stdClass::$id_estado C:\wamp\www\efosig\application\views\cursos\editar.php 107
ERROR - 2015-02-09 21:11:20 --> Severity: Compile Error --> Cannot redeclare Cursos_model::addCursoEstado() C:\wamp\www\efosig\application\models\Cursos_model.php 167
ERROR - 2015-02-09 21:12:06 --> Severity: Compile Error --> Cannot redeclare Cursos_model::addCursoEstado() C:\wamp\www\efosig\application\models\Cursos_model.php 167
ERROR - 2015-02-09 21:54:36 --> 404 Page Not Found: Curso/getInscritos
ERROR - 2015-02-09 21:54:44 --> 404 Page Not Found: Curso/getInscritos
ERROR - 2015-02-09 22:02:17 --> Severity: Warning --> Missing argument 1 for Cursos_model::get(), called in C:\wamp\www\efosig\application\controllers\Cursos.php on line 55 and defined C:\wamp\www\efosig\application\models\Cursos_model.php 54
ERROR - 2015-02-09 22:02:17 --> Severity: Warning --> Missing argument 2 for Cursos_model::get(), called in C:\wamp\www\efosig\application\controllers\Cursos.php on line 55 and defined C:\wamp\www\efosig\application\models\Cursos_model.php 54
ERROR - 2015-02-09 22:02:17 --> Severity: Notice --> Undefined variable: id C:\wamp\www\efosig\application\models\Cursos_model.php 60
ERROR - 2015-02-09 22:02:17 --> Severity: Notice --> Undefined variable: est C:\wamp\www\efosig\application\models\Cursos_model.php 60
ERROR - 2015-02-09 22:02:17 --> Severity: Warning --> pg_query(): Query failed: ERROR:  error de sintaxis en o cerca de «AND»
LINE 5:         WHERE a.id_curso =  AND b.nombre = ''
                                    ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-09 22:02:17 --> Query error: ERROR:  error de sintaxis en o cerca de «AND»
LINE 5:         WHERE a.id_curso =  AND b.nombre = ''
                                    ^ - Invalid query: SELECT DISTINCT a.*, b.nombre as estado, b.id_estado, c.id as rel
								FROM tb_curso a 
								INNER JOIN tr_curso_estado c ON a.id_curso = c.curso_id
								INNER JOIN tb_estado b on  b.id_estado = c.estado_id
								WHERE a.id_curso =  AND b.nombre = ''
ERROR - 2015-02-09 22:03:11 --> Severity: Notice --> Undefined variable: curso C:\wamp\www\efosig\application\views\cursos\asistencia.php 36
ERROR - 2015-02-09 22:03:11 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp\www\efosig\application\views\cursos\asistencia.php 36
ERROR - 2015-02-09 22:04:11 --> Severity: Compile Error --> Cannot redeclare Cursos_model::get() C:\wamp\www\efosig\application\models\Cursos_model.php 62
ERROR - 2015-02-09 22:04:40 --> Severity: Notice --> Undefined variable: curso C:\wamp\www\efosig\application\views\cursos\asistencia.php 36
ERROR - 2015-02-09 22:04:40 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp\www\efosig\application\views\cursos\asistencia.php 36
ERROR - 2015-02-09 22:05:19 --> Severity: Notice --> Undefined variable: curso C:\wamp\www\efosig\application\views\cursos\asistencia.php 31
ERROR - 2015-02-09 22:05:19 --> Severity: Notice --> Undefined variable: curso C:\wamp\www\efosig\application\views\cursos\asistencia.php 38
ERROR - 2015-02-09 22:05:19 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp\www\efosig\application\views\cursos\asistencia.php 38
ERROR - 2015-02-09 22:11:40 --> Severity: Notice --> Undefined property: Cursos::$cursos_model C:\wamp\www\efosig\application\controllers\Cursos.php 117
ERROR - 2015-02-09 22:11:40 --> Severity: Error --> Call to a member function get_inscritos() on a non-object C:\wamp\www\efosig\application\controllers\Cursos.php 117
ERROR - 2015-02-09 22:13:43 --> Severity: Notice --> Undefined property: Cursos::$cursos_model C:\wamp\www\efosig\application\controllers\Cursos.php 117
ERROR - 2015-02-09 22:13:43 --> Severity: Error --> Call to a member function get_inscritos() on a non-object C:\wamp\www\efosig\application\controllers\Cursos.php 117
ERROR - 2015-02-09 22:14:24 --> Severity: Notice --> Array to string conversion C:\wamp\www\efosig\application\controllers\Cursos.php 119
ERROR - 2015-02-09 22:42:26 --> Severity: Parsing Error --> syntax error, unexpected 'chao' (T_STRING), expecting ',' or ';' C:\wamp\www\efosig\application\controllers\Cursos.php 129
ERROR - 2015-02-09 22:43:31 --> Severity: Parsing Error --> syntax error, unexpected 'checked' (T_STRING), expecting ',' or ';' C:\wamp\www\efosig\application\controllers\Cursos.php 132
