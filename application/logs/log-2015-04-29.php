<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2015-04-29 19:02:18 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 123
ERROR - 2015-04-29 19:02:18 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 123
ERROR - 2015-04-29 19:02:25 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 123
ERROR - 2015-04-29 19:02:25 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 123
ERROR - 2015-04-29 19:04:19 --> Severity: Runtime Notice --> Only variables should be assigned by reference C:\wamp\www\efosig\application\controllers\Persona.php 158
ERROR - 2015-04-29 19:04:47 --> Severity: Notice --> Undefined property: stdClass::$id_facilitador C:\wamp\www\efosig\application\controllers\Cursos.php 88
ERROR - 2015-04-29 19:04:47 --> Severity: Warning --> pg_query(): Query failed: ERROR:  el operador no existe: integer &lt;&gt;
LINE 8:         AND b.id_persona != 
                                 ^
HINT:  Ningún operador coincide con el nombre y el tipo de los argumentos. Puede ser necesario agregar conversiones explícitas de tipos. C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-04-29 19:04:47 --> Query error: ERROR:  el operador no existe: integer <>
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
ERROR - 2015-04-29 19:07:25 --> Severity: Notice --> Undefined property: stdClass::$id_facilitador C:\wamp\www\efosig\application\controllers\Cursos.php 89
ERROR - 2015-04-29 19:07:25 --> Severity: Warning --> pg_query(): Query failed: ERROR:  error de sintaxis al final de la entrada
LINE 8:         AND b.id_persona = 
                                   ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-04-29 19:07:25 --> Query error: ERROR:  error de sintaxis al final de la entrada
LINE 8:         AND b.id_persona = 
                                   ^ - Invalid query: SELECT  nombre_apellido,
										 id_persona 
							    FROM users a
								INNER JOIN tb_persona b ON a.persona_id = b.id_persona
								INNER JOIN users_groups c ON c.user_id = a.id
								INNER JOIN groups d ON d.id = c.group_id
								WHERE d.id = 3
								AND b.id_persona = 
ERROR - 2015-04-29 19:07:28 --> Severity: Notice --> Undefined property: stdClass::$id_facilitador C:\wamp\www\efosig\application\controllers\Cursos.php 89
ERROR - 2015-04-29 19:07:28 --> Severity: Warning --> pg_query(): Query failed: ERROR:  error de sintaxis al final de la entrada
LINE 8:         AND b.id_persona = 
                                   ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-04-29 19:07:28 --> Query error: ERROR:  error de sintaxis al final de la entrada
LINE 8:         AND b.id_persona = 
                                   ^ - Invalid query: SELECT  nombre_apellido,
										 id_persona 
							    FROM users a
								INNER JOIN tb_persona b ON a.persona_id = b.id_persona
								INNER JOIN users_groups c ON c.user_id = a.id
								INNER JOIN groups d ON d.id = c.group_id
								WHERE d.id = 3
								AND b.id_persona = 
ERROR - 2015-04-29 19:07:40 --> Severity: Notice --> Undefined variable: facilitador C:\wamp\www\efosig\application\views\cursos\editar.php 158
ERROR - 2015-04-29 19:07:40 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\cursos\editar.php 158
ERROR - 2015-04-29 19:07:40 --> Severity: Notice --> Undefined variable: facilitador C:\wamp\www\efosig\application\views\cursos\editar.php 158
ERROR - 2015-04-29 19:07:40 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\cursos\editar.php 158
ERROR - 2015-04-29 19:07:40 --> Severity: Notice --> Undefined variable: facilitadores C:\wamp\www\efosig\application\views\cursos\editar.php 160
ERROR - 2015-04-29 19:07:40 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp\www\efosig\application\views\cursos\editar.php 160
ERROR - 2015-04-29 19:09:16 --> Severity: Notice --> Undefined variable: facilitador C:\wamp\www\efosig\application\views\cursos\editar.php 158
ERROR - 2015-04-29 19:09:16 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\cursos\editar.php 158
ERROR - 2015-04-29 19:09:16 --> Severity: Notice --> Undefined variable: facilitador C:\wamp\www\efosig\application\views\cursos\editar.php 158
ERROR - 2015-04-29 19:09:16 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\cursos\editar.php 158
ERROR - 2015-04-29 19:09:32 --> Severity: Notice --> Undefined variable: facilitador C:\wamp\www\efosig\application\views\cursos\editar.php 158
ERROR - 2015-04-29 19:09:32 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\cursos\editar.php 158
ERROR - 2015-04-29 19:09:32 --> Severity: Notice --> Undefined variable: facilitador C:\wamp\www\efosig\application\views\cursos\editar.php 158
ERROR - 2015-04-29 19:09:32 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\cursos\editar.php 158
ERROR - 2015-04-29 19:10:02 --> Severity: Notice --> Undefined variable: facilitador C:\wamp\www\efosig\application\views\cursos\editar.php 158
ERROR - 2015-04-29 19:10:02 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\cursos\editar.php 158
ERROR - 2015-04-29 19:10:02 --> Severity: Notice --> Undefined variable: facilitador C:\wamp\www\efosig\application\views\cursos\editar.php 158
ERROR - 2015-04-29 19:10:02 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\cursos\editar.php 158
ERROR - 2015-04-29 19:10:09 --> Severity: Warning --> pg_query(): Query failed: ERROR:  la columna «status» es de tipo smallint pero la expresión es de tipo boolean
LINE 1: ...n&quot; = '45', &quot;nro_participantes&quot; = '90', &quot;status&quot; = FALSE, &quot;fe...
                                                             ^
HINT:  Necesitará reescribir la expresión o aplicarle una conversión de tipo. C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-04-29 19:10:09 --> Query error: ERROR:  la columna «status» es de tipo smallint pero la expresión es de tipo boolean
LINE 1: ...n" = '45', "nro_participantes" = '90', "status" = FALSE, "fe...
                                                             ^
HINT:  Necesitará reescribir la expresión o aplicarle una conversión de tipo. - Invalid query: UPDATE "tb_curso" SET "nombre" = 'hola', "duracion" = '45', "nro_participantes" = '90', "status" = FALSE, "fecha_inicio" = '16-04-2015', "fecha_fin" = '23-05-2015'
WHERE "id_curso" = '39'
ERROR - 2015-04-29 19:13:01 --> Severity: Warning --> pg_query(): Query failed: ERROR:  la columna «status» es de tipo smallint pero la expresión es de tipo boolean
LINE 1: ...n&quot; = '45', &quot;nro_participantes&quot; = '90', &quot;status&quot; = FALSE, &quot;fe...
                                                             ^
HINT:  Necesitará reescribir la expresión o aplicarle una conversión de tipo. C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-04-29 19:13:01 --> Query error: ERROR:  la columna «status» es de tipo smallint pero la expresión es de tipo boolean
LINE 1: ...n" = '45', "nro_participantes" = '90', "status" = FALSE, "fe...
                                                             ^
HINT:  Necesitará reescribir la expresión o aplicarle una conversión de tipo. - Invalid query: UPDATE "tb_curso" SET "nombre" = 'hola', "duracion" = '45', "nro_participantes" = '90', "status" = FALSE, "fecha_inicio" = '16-04-2015', "fecha_fin" = '23-05-2015'
WHERE "id_curso" = '39'
ERROR - 2015-04-29 19:13:05 --> Severity: Notice --> Undefined variable: facilitador C:\wamp\www\efosig\application\views\cursos\editar.php 158
ERROR - 2015-04-29 19:13:05 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\cursos\editar.php 158
ERROR - 2015-04-29 19:13:05 --> Severity: Notice --> Undefined variable: facilitador C:\wamp\www\efosig\application\views\cursos\editar.php 158
ERROR - 2015-04-29 19:13:05 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\cursos\editar.php 158
ERROR - 2015-04-29 19:13:40 --> Severity: Notice --> Undefined variable: facilitador C:\wamp\www\efosig\application\views\cursos\editar.php 158
ERROR - 2015-04-29 19:13:40 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\cursos\editar.php 158
ERROR - 2015-04-29 19:13:40 --> Severity: Notice --> Undefined variable: facilitador C:\wamp\www\efosig\application\views\cursos\editar.php 158
ERROR - 2015-04-29 19:13:40 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\cursos\editar.php 158
ERROR - 2015-04-29 19:15:35 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 123
ERROR - 2015-04-29 19:15:35 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 123
ERROR - 2015-04-29 19:42:02 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 124
ERROR - 2015-04-29 19:42:02 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 124
ERROR - 2015-04-29 19:42:08 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 124
ERROR - 2015-04-29 19:42:08 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 124
ERROR - 2015-04-29 23:04:56 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 124
ERROR - 2015-04-29 23:04:56 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 124
ERROR - 2015-04-29 23:07:16 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 124
ERROR - 2015-04-29 23:07:16 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 124
ERROR - 2015-04-29 23:07:33 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 124
ERROR - 2015-04-29 23:07:33 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 124
ERROR - 2015-04-29 23:07:41 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 124
ERROR - 2015-04-29 23:07:41 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 124
ERROR - 2015-04-29 23:26:12 --> Severity: Notice --> Undefined variable: facilitador C:\wamp\www\efosig\application\views\cursos\editar.php 158
ERROR - 2015-04-29 23:26:12 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\cursos\editar.php 158
ERROR - 2015-04-29 23:26:12 --> Severity: Notice --> Undefined variable: facilitador C:\wamp\www\efosig\application\views\cursos\editar.php 158
ERROR - 2015-04-29 23:26:12 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\cursos\editar.php 158
ERROR - 2015-04-29 23:26:40 --> Severity: Notice --> Undefined variable: facilitador C:\wamp\www\efosig\application\views\cursos\editar.php 158
ERROR - 2015-04-29 23:26:40 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\cursos\editar.php 158
ERROR - 2015-04-29 23:26:40 --> Severity: Notice --> Undefined variable: facilitador C:\wamp\www\efosig\application\views\cursos\editar.php 158
ERROR - 2015-04-29 23:26:40 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\cursos\editar.php 158
ERROR - 2015-04-29 23:27:35 --> Severity: Notice --> Undefined variable: facilitador C:\wamp\www\efosig\application\views\cursos\editar.php 158
ERROR - 2015-04-29 23:27:35 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\cursos\editar.php 158
ERROR - 2015-04-29 23:27:35 --> Severity: Notice --> Undefined variable: facilitador C:\wamp\www\efosig\application\views\cursos\editar.php 158
ERROR - 2015-04-29 23:27:35 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\cursos\editar.php 158
ERROR - 2015-04-29 23:33:18 --> 404 Page Not Found: Agenda/index
ERROR - 2015-04-29 23:33:24 --> 404 Page Not Found: Agenda/index
ERROR - 2015-04-29 23:35:22 --> Severity: Warning --> pg_query(): Query failed: ERROR:  la columna «fecha» es de tipo date pero la expresión es de tipo boolean
LINE 1: ... adjhflajk asdjf lasdjf asfhladjfhlskdjclc', &quot;fecha&quot; = FALSE
                                                                  ^
HINT:  Necesitará reescribir la expresión o aplicarle una conversión de tipo. C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-04-29 23:35:22 --> Query error: ERROR:  la columna «fecha» es de tipo date pero la expresión es de tipo boolean
LINE 1: ... adjhflajk asdjf lasdjf asfhladjfhlskdjclc', "fecha" = FALSE
                                                                  ^
HINT:  Necesitará reescribir la expresión o aplicarle una conversión de tipo. - Invalid query: UPDATE "tb_actividad" SET "titulo" = 'Charla introductoria', "descripcion" = 'Charla introductoriakajhdlfjka adjhflajk asdjf lasdjf asfhladjfhlskdjclc', "fecha" = FALSE
WHERE "id_actividad" = '3'
ERROR - 2015-04-29 23:42:13 --> 404 Page Not Found: Auditoria/agregar
ERROR - 2015-04-29 23:43:15 --> Severity: Runtime Notice --> Only variables should be assigned by reference C:\wamp\www\efosig\application\controllers\Persona.php 158
ERROR - 2015-04-29 23:44:16 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 124
ERROR - 2015-04-29 23:44:16 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 124
ERROR - 2015-04-29 23:44:19 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 124
ERROR - 2015-04-29 23:44:19 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 124
ERROR - 2015-04-29 23:44:29 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 124
ERROR - 2015-04-29 23:44:29 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 124
ERROR - 2015-04-29 23:44:44 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 124
ERROR - 2015-04-29 23:44:44 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 124
ERROR - 2015-04-29 23:45:14 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 124
ERROR - 2015-04-29 23:45:14 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 124
ERROR - 2015-04-29 23:48:06 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 124
ERROR - 2015-04-29 23:48:06 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 124
ERROR - 2015-04-29 23:48:10 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 124
ERROR - 2015-04-29 23:48:10 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 124
ERROR - 2015-04-29 23:57:26 --> Severity: Notice --> Undefined offset: 1 C:\wamp\www\efosig\application\controllers\Cursos.php 214
ERROR - 2015-04-29 23:57:26 --> Severity: Warning --> pg_query(): Query failed: ERROR:  error de sintaxis al final de la entrada
LINE 1: select nombre from tb_curso where id_curso = 
                                                     ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-04-29 23:57:26 --> Query error: ERROR:  error de sintaxis al final de la entrada
LINE 1: select nombre from tb_curso where id_curso = 
                                                     ^ - Invalid query: select nombre from tb_curso where id_curso = 
