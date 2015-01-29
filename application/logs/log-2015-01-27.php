<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2015-01-27 00:30:56 --> Severity: Notice --> Array to string conversion C:\wamp\www\efosig\system\database\DB_driver.php 1376
ERROR - 2015-01-27 00:30:56 --> Severity: Warning --> pg_query(): Query failed: ERROR:  error de sintaxis en o cerca de «0»
LINE 1: INSERT INTO &quot;tb_divulgacion&quot; (0) VALUES (Array)
                                      ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-01-27 00:30:56 --> Query error: ERROR:  error de sintaxis en o cerca de «0»
LINE 1: INSERT INTO "tb_divulgacion" (0) VALUES (Array)
                                      ^ - Invalid query: INSERT INTO "tb_divulgacion" (0) VALUES (Array)
ERROR - 2015-01-27 00:36:27 --> Severity: Warning --> pg_query(): Query failed: ERROR:  la sintaxis de entrada no es válida para integer: «»
LINE 1: ...uario&quot;, &quot;titulo&quot;, &quot;descripcion&quot;, &quot;fecha&quot;) VALUES ('', 'ajajk...
                                                             ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-01-27 00:36:27 --> Query error: ERROR:  la sintaxis de entrada no es válida para integer: «»
LINE 1: ...uario", "titulo", "descripcion", "fecha") VALUES ('', 'ajajk...
                                                             ^ - Invalid query: INSERT INTO "tb_actividad" ("id_usuario", "titulo", "descripcion", "fecha") VALUES ('', 'ajajksd', 'kasksaksa', '26-01-2015')
ERROR - 2015-01-27 00:47:54 --> Severity: Warning --> pg_query(): Query failed: ERROR:  la sintaxis de entrada no es válida para integer: «»
LINE 1: ...uario&quot;, &quot;titulo&quot;, &quot;descripcion&quot;, &quot;fecha&quot;) VALUES ('', 'PRUEB...
                                                             ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-01-27 00:47:54 --> Query error: ERROR:  la sintaxis de entrada no es válida para integer: «»
LINE 1: ...uario", "titulo", "descripcion", "fecha") VALUES ('', 'PRUEB...
                                                             ^ - Invalid query: INSERT INTO "tb_actividad" ("id_usuario", "titulo", "descripcion", "fecha") VALUES ('', 'PRUEBA', 'JAVAJAVA ', '14-01-2015')
ERROR - 2015-01-27 00:54:22 --> Severity: Warning --> pg_query(): Query failed: ERROR:  la sintaxis de entrada no es válida para integer: «»
LINE 1: ...uario&quot;, &quot;titulo&quot;, &quot;descripcion&quot;, &quot;fecha&quot;) VALUES ('', 'PRUEB...
                                                             ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-01-27 00:54:22 --> Query error: ERROR:  la sintaxis de entrada no es válida para integer: «»
LINE 1: ...uario", "titulo", "descripcion", "fecha") VALUES ('', 'PRUEB...
                                                             ^ - Invalid query: INSERT INTO "tb_actividad" ("id_usuario", "titulo", "descripcion", "fecha") VALUES ('', 'PRUEBA', 'JAVA JAVA JAVA JAVA', '2015-01-16')
ERROR - 2015-01-27 01:03:26 --> Severity: Warning --> pg_query(): Query failed: ERROR:  el valor es demasiado largo para el tipo character varying(20) C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-01-27 01:03:26 --> Query error: ERROR:  el valor es demasiado largo para el tipo character varying(20) - Invalid query: INSERT INTO "tb_actividad" ("id_usuario", "titulo", "descripcion", "fecha") VALUES ('1', 'administracion de avtividades', 'Se planea poner un orden y filtro para las diversas actividades', '2015-05-12')
ERROR - 2015-01-27 01:11:48 --> Severity: Warning --> pg_query(): Query failed: ERROR:  no existe la columna «nombre» en la relación «tb_actividad»
LINE 1: UPDATE &quot;tb_actividad&quot; SET &quot;nombre&quot; = FALSE, &quot;cuenta&quot; = FALSE...
                                  ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-01-27 01:11:48 --> Query error: ERROR:  no existe la columna «nombre» en la relación «tb_actividad»
LINE 1: UPDATE "tb_actividad" SET "nombre" = FALSE, "cuenta" = FALSE...
                                  ^ - Invalid query: UPDATE "tb_actividad" SET "nombre" = FALSE, "cuenta" = FALSE, "observaciones" = FALSE, "fecha_actualizacion" = '2015-01-27 01:11:48'
WHERE "id_actividad" = '4'
ERROR - 2015-01-27 01:14:17 --> Severity: Warning --> pg_query(): Query failed: ERROR:  no existe la columna «nombre» en la relación «tb_actividad»
LINE 1: UPDATE &quot;tb_actividad&quot; SET &quot;nombre&quot; = FALSE, &quot;cuenta&quot; = FALSE...
                                  ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-01-27 01:14:17 --> Query error: ERROR:  no existe la columna «nombre» en la relación «tb_actividad»
LINE 1: UPDATE "tb_actividad" SET "nombre" = FALSE, "cuenta" = FALSE...
                                  ^ - Invalid query: UPDATE "tb_actividad" SET "nombre" = FALSE, "cuenta" = FALSE, "observaciones" = FALSE, "fecha_actualizacion" = '2015-01-27 01:14:17'
WHERE "id_actividad" = '4'
