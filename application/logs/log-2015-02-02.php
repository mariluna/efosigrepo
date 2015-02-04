<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2015-02-02 16:04:46 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\cursos\index.php 58
ERROR - 2015-02-02 16:22:56 --> Severity: Parsing Error --> syntax error, unexpected '<' C:\wamp\www\efosig\application\views\cursos\index.php 66
ERROR - 2015-02-02 16:27:46 --> 404 Page Not Found: Persona/agregarGeneral
ERROR - 2015-02-02 16:46:23 --> Severity: Notice --> Undefined property: stdClass::$id_estado C:\wamp\www\efosig\application\controllers\Cursos.php 32
ERROR - 2015-02-02 16:46:23 --> Severity: Warning --> pg_query(): Query failed: ERROR:  error de sintaxis al final de la entrada
LINE 1: select nombre from tb_estado where id_estado = 
                                                       ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-02 16:46:23 --> Query error: ERROR:  error de sintaxis al final de la entrada
LINE 1: select nombre from tb_estado where id_estado = 
                                                       ^ - Invalid query: select nombre from tb_estado where id_estado = 
ERROR - 2015-02-02 16:50:38 --> Severity: Notice --> Undefined property: stdClass::$id_estado C:\wamp\www\efosig\application\controllers\Cursos.php 51
ERROR - 2015-02-02 16:50:38 --> Severity: Warning --> pg_query(): Query failed: ERROR:  el operador no existe: integer &lt;&gt;
LINE 1: select * from tb_estado where id_estado != 
                                                ^
HINT:  Ningún operador coincide con el nombre y el tipo de los argumentos. Puede ser necesario agregar conversiones explícitas de tipos. C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-02 16:50:38 --> Query error: ERROR:  el operador no existe: integer <>
LINE 1: select * from tb_estado where id_estado != 
                                                ^
HINT:  Ningún operador coincide con el nombre y el tipo de los argumentos. Puede ser necesario agregar conversiones explícitas de tipos. - Invalid query: select * from tb_estado where id_estado != 
ERROR - 2015-02-02 17:03:46 --> Severity: Notice --> Undefined offset: 2 C:\wamp\www\efosig\application\views\header.php 229
ERROR - 2015-02-02 17:03:46 --> Severity: Notice --> Undefined offset: 1 C:\wamp\www\efosig\application\views\header.php 229
ERROR - 2015-02-02 17:03:46 --> Severity: Notice --> Undefined offset: 2 C:\wamp\www\efosig\application\views\header.php 229
ERROR - 2015-02-02 17:03:46 --> Severity: Notice --> Undefined offset: 1 C:\wamp\www\efosig\application\views\header.php 229
ERROR - 2015-02-02 17:03:46 --> Severity: Notice --> Undefined offset: 2 C:\wamp\www\efosig\application\views\header.php 229
ERROR - 2015-02-02 17:03:46 --> Severity: Notice --> Undefined offset: 1 C:\wamp\www\efosig\application\views\header.php 229
ERROR - 2015-02-02 17:03:46 --> Severity: Notice --> Undefined offset: 2 C:\wamp\www\efosig\application\views\header.php 229
ERROR - 2015-02-02 17:03:46 --> Severity: Notice --> Undefined offset: 1 C:\wamp\www\efosig\application\views\header.php 229
ERROR - 2015-02-02 17:30:55 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 100
ERROR - 2015-02-02 17:30:55 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\informe\agregar.php 174
ERROR - 2015-02-02 17:30:55 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\informe\agregar.php 174
ERROR - 2015-02-02 17:30:55 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\informe\agregar.php 174
ERROR - 2015-02-02 17:30:55 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\informe\agregar.php 174
ERROR - 2015-02-02 17:30:55 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\informe\agregar.php 179
ERROR - 2015-02-02 17:30:55 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\informe\agregar.php 179
ERROR - 2015-02-02 18:07:04 --> Severity: Warning --> pg_query(): Query failed: ERROR:  no existe la relación «tb_curso_estado»
LINE 3:         INNER JOIN tb_curso_estado c ON a.id_curso = c.curso...
                           ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-02 18:07:04 --> Query error: ERROR:  no existe la relación «tb_curso_estado»
LINE 3:         INNER JOIN tb_curso_estado c ON a.id_curso = c.curso...
                           ^ - Invalid query: SELECT a.*, b.* 
								FROM tb_curso a 
								INNER JOIN tb_curso_estado c ON a.id_curso = c.curso_id
								INNER JOIN tb_estado b on  b.id_estado = c.estado_id
								WHERE a.curso_id = 20
ERROR - 2015-02-02 18:07:27 --> Severity: Warning --> pg_query(): Query failed: ERROR:  no existe la relación «tb_curso_estado»
LINE 3:         INNER JOIN tb_curso_estado c ON a.id_curso = c.curso...
                           ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-02 18:07:27 --> Query error: ERROR:  no existe la relación «tb_curso_estado»
LINE 3:         INNER JOIN tb_curso_estado c ON a.id_curso = c.curso...
                           ^ - Invalid query: SELECT a.*, b.* 
								FROM tb_curso a 
								INNER JOIN tb_curso_estado c ON a.id_curso = c.curso_id
								INNER JOIN tb_estado b on  b.id_estado = c.estado_id
								WHERE a.curso_id = 2
ERROR - 2015-02-02 18:08:41 --> Severity: Warning --> pg_query(): Query failed: ERROR:  no existe la relación «tb_curso_estado»
LINE 3:         INNER JOIN tb_curso_estado c ON a.id_curso = c.curso...
                           ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-02 18:08:41 --> Query error: ERROR:  no existe la relación «tb_curso_estado»
LINE 3:         INNER JOIN tb_curso_estado c ON a.id_curso = c.curso...
                           ^ - Invalid query: SELECT a.*, b.* 
								FROM tb_curso a 
								INNER JOIN tb_curso_estado c ON a.id_curso = c.curso_id
								INNER JOIN tb_estado b on  b.id_estado = c.estado_id
								WHERE a.curso_id = 2
ERROR - 2015-02-02 19:03:47 --> Severity: Notice --> Undefined variable: est C:\wamp\www\efosig\application\models\Cursos_model.php 18
ERROR - 2015-02-02 19:03:47 --> Severity: Warning --> pg_query(): Query failed: ERROR:  error de sintaxis al final de la entrada
LINE 5:         WHERE curso_id = 20 AND estado_id = 
                                                    ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-02 19:03:47 --> Query error: ERROR:  error de sintaxis al final de la entrada
LINE 5:         WHERE curso_id = 20 AND estado_id = 
                                                    ^ - Invalid query: SELECT DISTINCT a.*, b.nombre as estado 
								FROM tb_curso a 
								INNER JOIN tr_curso_estado c ON a.id_curso = c.curso_id
								INNER JOIN tb_estado b on  b.id_estado = c.estado_id
								WHERE curso_id = 20 AND estado_id = 
ERROR - 2015-02-02 19:03:56 --> Severity: Warning --> pg_query(): Query failed: ERROR:  error de sintaxis en o cerca de «Esparta»
LINE 5:         WHERE curso_id = 20 AND estado_id = Nueva Esparta
                                                          ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-02 19:03:56 --> Query error: ERROR:  error de sintaxis en o cerca de «Esparta»
LINE 5:         WHERE curso_id = 20 AND estado_id = Nueva Esparta
                                                          ^ - Invalid query: SELECT DISTINCT a.*, b.nombre as estado 
								FROM tb_curso a 
								INNER JOIN tr_curso_estado c ON a.id_curso = c.curso_id
								INNER JOIN tb_estado b on  b.id_estado = c.estado_id
								WHERE curso_id = 20 AND estado_id = Nueva Esparta
ERROR - 2015-02-02 19:04:22 --> Severity: Warning --> pg_query(): Query failed: ERROR:  error de sintaxis en o cerca de «Esparta»
LINE 5:         WHERE curso_id = 20 AND estado = Nueva Esparta
                                                       ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-02 19:04:22 --> Query error: ERROR:  error de sintaxis en o cerca de «Esparta»
LINE 5:         WHERE curso_id = 20 AND estado = Nueva Esparta
                                                       ^ - Invalid query: SELECT DISTINCT a.*, b.nombre as estado 
								FROM tb_curso a 
								INNER JOIN tr_curso_estado c ON a.id_curso = c.curso_id
								INNER JOIN tb_estado b on  b.id_estado = c.estado_id
								WHERE curso_id = 20 AND estado = Nueva Esparta
ERROR - 2015-02-02 19:04:37 --> Severity: Warning --> pg_query(): Query failed: ERROR:  no existe la columna «estado»
LINE 5:         WHERE curso_id = 20 AND estado = 'Nueva Esparta'
                                        ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-02 19:04:37 --> Query error: ERROR:  no existe la columna «estado»
LINE 5:         WHERE curso_id = 20 AND estado = 'Nueva Esparta'
                                        ^ - Invalid query: SELECT DISTINCT a.*, b.nombre as estado 
								FROM tb_curso a 
								INNER JOIN tr_curso_estado c ON a.id_curso = c.curso_id
								INNER JOIN tb_estado b on  b.id_estado = c.estado_id
								WHERE curso_id = 20 AND estado = 'Nueva Esparta'
ERROR - 2015-02-02 19:04:54 --> Severity: Warning --> pg_query(): Query failed: ERROR:  no existe la columna a.curso_id
LINE 5:         WHERE a.curso_id = 20 AND b.nombre = 'Nueva Esparta'
                      ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-02 19:04:54 --> Query error: ERROR:  no existe la columna a.curso_id
LINE 5:         WHERE a.curso_id = 20 AND b.nombre = 'Nueva Esparta'
                      ^ - Invalid query: SELECT DISTINCT a.*, b.nombre as estado 
								FROM tb_curso a 
								INNER JOIN tr_curso_estado c ON a.id_curso = c.curso_id
								INNER JOIN tb_estado b on  b.id_estado = c.estado_id
								WHERE a.curso_id = 20 AND b.nombre = 'Nueva Esparta'
ERROR - 2015-02-02 19:08:19 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\controllers\Cursos.php 32
ERROR - 2015-02-02 19:08:19 --> Severity: Warning --> pg_query(): Query failed: ERROR:  error de sintaxis al final de la entrada
LINE 1: select nombre from tb_estado where id_estado = 
                                                       ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-02 19:08:19 --> Query error: ERROR:  error de sintaxis al final de la entrada
LINE 1: select nombre from tb_estado where id_estado = 
                                                       ^ - Invalid query: select nombre from tb_estado where id_estado = 
ERROR - 2015-02-02 19:12:51 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\controllers\Cursos.php 32
ERROR - 2015-02-02 19:12:51 --> Severity: Warning --> pg_query(): Query failed: ERROR:  error de sintaxis al final de la entrada
LINE 1: select nombre from tb_estado where id_estado = 
                                                       ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-02 19:12:51 --> Query error: ERROR:  error de sintaxis al final de la entrada
LINE 1: select nombre from tb_estado where id_estado = 
                                                       ^ - Invalid query: select nombre from tb_estado where id_estado = 
ERROR - 2015-02-02 19:16:56 --> 404 Page Not Found: Cursos/70
ERROR - 2015-02-02 20:17:30 --> 404 Page Not Found: Pnfhtml/index
ERROR - 2015-02-02 20:36:42 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 100
ERROR - 2015-02-02 20:37:00 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 100
ERROR - 2015-02-02 20:38:00 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 100
ERROR - 2015-02-02 21:58:49 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 100
ERROR - 2015-02-02 22:27:52 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 100
ERROR - 2015-02-02 22:31:59 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 100
ERROR - 2015-02-02 22:38:38 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 100
ERROR - 2015-02-02 22:38:45 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\models\Persona_model.php 10
ERROR - 2015-02-02 22:38:45 --> Severity: Warning --> pg_query(): Query failed: ERROR:  error de sintaxis al final de la entrada
LINE 1: SELECT id_estado FROM tb_persona WHERE id_persona=
                                                          ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-02 22:38:45 --> Query error: ERROR:  error de sintaxis al final de la entrada
LINE 1: SELECT id_estado FROM tb_persona WHERE id_persona=
                                                          ^ - Invalid query: SELECT id_estado FROM tb_persona WHERE id_persona=
ERROR - 2015-02-02 22:38:48 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 100
ERROR - 2015-02-02 22:45:12 --> Severity: Notice --> Undefined property: Personas_api::$post C:\wamp\www\efosig\application\controllers\api\Personas_api.php 198
ERROR - 2015-02-02 22:45:12 --> Severity: Warning --> pg_query(): Query failed: ERROR:  llave duplicada viola restricción de unicidad «tb_general_pkey»
DETAIL:  Ya existe la llave (id_persona)=(2). C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-02 22:45:12 --> Query error: ERROR:  llave duplicada viola restricción de unicidad «tb_general_pkey»
DETAIL:  Ya existe la llave (id_persona)=(2). - Invalid query: INSERT INTO "tb_general" ("id_persona", "institucion_labora", "cargo", "telefono", "email") VALUES ('2', 'iut', 'vhhgh', FALSE, 'shdhd@iut.vo')
