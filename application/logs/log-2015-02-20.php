<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2015-02-20 14:30:12 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-20 14:36:32 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-20 14:48:30 --> Severity: Warning --> pg_query(): Query failed: ERROR:  la sintaxis de entrada no es válida para integer: «»
LINE 1: ...DATE tb_divulgacion SET tipo_divulgacion_prensa = '' WHERE t...
                                                             ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-20 14:48:30 --> Query error: ERROR:  la sintaxis de entrada no es válida para integer: «»
LINE 1: ...DATE tb_divulgacion SET tipo_divulgacion_prensa = '' WHERE t...
                                                             ^ - Invalid query: UPDATE tb_divulgacion SET tipo_divulgacion_prensa = '' WHERE tipo_divulgacion_prensa = 10
ERROR - 2015-02-20 15:52:51 --> Severity: Notice --> Undefined variable: facilitadores C:\wamp\www\efosig\application\views\cursos\editar.php 108
ERROR - 2015-02-20 15:52:51 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp\www\efosig\application\views\cursos\editar.php 108
ERROR - 2015-02-20 15:53:55 --> Severity: Notice --> Undefined variable: facilitadores C:\wamp\www\efosig\application\views\cursos\editar.php 108
ERROR - 2015-02-20 15:53:55 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp\www\efosig\application\views\cursos\editar.php 108
ERROR - 2015-02-20 15:54:08 --> Severity: Notice --> Undefined variable: facilitadores C:\wamp\www\efosig\application\views\cursos\editar.php 108
ERROR - 2015-02-20 15:54:08 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp\www\efosig\application\views\cursos\editar.php 108
ERROR - 2015-02-20 17:27:08 --> Severity: Notice --> Undefined variable: facilitadores C:\wamp\www\efosig\application\views\cursos\editar.php 108
ERROR - 2015-02-20 17:27:08 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp\www\efosig\application\views\cursos\editar.php 108
ERROR - 2015-02-20 17:42:05 --> Severity: Warning --> pg_query(): Query failed: ERROR:  el operador no existe: integer &lt;&gt;
LINE 8:         AND b.id_persona != 
                                 ^
HINT:  Ningún operador coincide con el nombre y el tipo de los argumentos. Puede ser necesario agregar conversiones explícitas de tipos. C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-20 17:42:05 --> Query error: ERROR:  el operador no existe: integer <>
LINE 8:         AND b.id_persona != 
                                 ^
HINT:  Ningún operador coincide con el nombre y el tipo de los argumentos. Puede ser necesario agregar conversiones explícitas de tipos. - Invalid query: SELECT  nombre_apellido,
										 id_persona 
							    FROM users a
								INNER JOIN tb_persona b ON a.persona_id = b.id_persona
								INNER JOIN users_groups c ON c.user_id = a.id
								INNER JOIN groups d ON d.id = c.group_id
								WHERE d.id = 3
								AND b.id_persona != 
ERROR - 2015-02-20 17:53:10 --> Severity: Warning --> pg_query(): Query failed: ERROR:  no existe la columna «curso_id»
LINE 1: ...TE tr_curso_participantes SET id_estado = 1 WHERE curso_id =...
                                                             ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-20 17:53:10 --> Query error: ERROR:  no existe la columna «curso_id»
LINE 1: ...TE tr_curso_participantes SET id_estado = 1 WHERE curso_id =...
                                                             ^ - Invalid query: UPDATE tr_curso_participantes SET id_estado = 1 WHERE curso_id = 27 AND id_estado = 14
ERROR - 2015-02-20 19:12:04 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-20 19:33:20 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-20 19:33:25 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-20 20:10:47 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-20 20:11:14 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-20 20:11:18 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-20 20:11:22 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-20 20:11:34 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-20 20:12:24 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-20 20:12:28 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-20 20:12:35 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-20 20:14:02 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-20 20:15:05 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-20 20:22:49 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-20 20:22:53 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-20 20:36:00 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-20 20:36:11 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-20 21:41:12 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-20 21:43:40 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-20 21:43:40 --> Severity: Error --> Call to undefined function rand_code() C:\wamp\www\efosig\application\views\persona\agregarGeneral.php 448
ERROR - 2015-02-20 21:43:53 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-20 21:49:01 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-20 21:49:01 --> Severity: Notice --> Undefined variable: qTgO76L7 C:\wamp\www\efosig\application\views\persona\agregarGeneral.php 447
ERROR - 2015-02-20 21:50:01 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-20 21:50:01 --> Severity: Notice --> Undefined variable: wT5VdXxH C:\wamp\www\efosig\application\views\persona\agregarGeneral.php 447
ERROR - 2015-02-20 21:51:11 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-20 21:51:11 --> Severity: Notice --> Undefined variable: hyZpjnLw C:\wamp\www\efosig\application\views\persona\agregarGeneral.php 447
ERROR - 2015-02-20 21:51:41 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-20 21:51:55 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-20 21:52:33 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-20 21:52:35 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-20 21:53:58 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-20 21:54:11 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-20 21:54:12 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-20 21:55:17 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-20 21:55:19 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-20 21:55:26 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-20 21:58:08 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-20 22:02:24 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-20 22:05:22 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-20 22:07:15 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-20 22:08:16 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-20 22:19:43 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-20 22:24:16 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
