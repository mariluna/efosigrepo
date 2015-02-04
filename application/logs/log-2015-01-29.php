<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2015-01-29 00:07:22 --> 404 Page Not Found: Cinco/index
ERROR - 2015-01-29 00:53:53 --> Severity: Warning --> pg_query(): Query failed: ERROR:  llave duplicada viola restricción de unicidad «pk_curso_estado»
DETAIL:  Ya existe la llave (id)=(1). C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-01-29 00:53:53 --> Query error: ERROR:  llave duplicada viola restricción de unicidad «pk_curso_estado»
DETAIL:  Ya existe la llave (id)=(1). - Invalid query: INSERT INTO "tr_curso_estado" ("curso_id", "estado_id") VALUES (7,'1'), (7,'2'), (7,'3'), (7,'4'), (7,'5')
ERROR - 2015-01-29 00:54:47 --> Severity: Warning --> pg_query(): Query failed: ERROR:  llave duplicada viola restricción de unicidad «pk_curso_estado»
DETAIL:  Ya existe la llave (id)=(2). C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-01-29 00:54:47 --> Query error: ERROR:  llave duplicada viola restricción de unicidad «pk_curso_estado»
DETAIL:  Ya existe la llave (id)=(2). - Invalid query: INSERT INTO "tr_curso_estado" ("curso_id", "estado_id") VALUES (8,'1'), (8,'2'), (8,'3')
ERROR - 2015-01-29 00:55:54 --> Severity: Notice --> Undefined property: stdClass::$id_estado C:\wamp\www\efosig\application\controllers\Cursos.php 32
ERROR - 2015-01-29 00:55:54 --> Severity: Warning --> pg_query(): Query failed: ERROR:  error de sintaxis al final de la entrada
LINE 1: select nombre from tb_estado where id_estado = 
                                                       ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-01-29 00:55:54 --> Query error: ERROR:  error de sintaxis al final de la entrada
LINE 1: select nombre from tb_estado where id_estado = 
                                                       ^ - Invalid query: select nombre from tb_estado where id_estado = 
ERROR - 2015-01-29 00:58:39 --> Severity: Warning --> pg_query(): Query failed: ERROR:  no existe la columna c.estado
LINE 1: ...ECT DISTINCT a.*, b.nro_participantes AS inscritos, c.estado
                                                               ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-01-29 00:58:39 --> Query error: ERROR:  no existe la columna c.estado
LINE 1: ...ECT DISTINCT a.*, b.nro_participantes AS inscritos, c.estado
                                                               ^ - Invalid query: SELECT DISTINCT a.*, b.nro_participantes AS inscritos, c.estado
										  FROM tb_curso a
 										  INNER JOIN tr_curso_participantes b 
										  ON a.id_curso = b.id_curso
										  INNER JOIN tr_curso_estado c
										  ON a.id_curso = c.curso_id
ERROR - 2015-01-29 00:59:29 --> Severity: Warning --> pg_query(): Query failed: ERROR:  no existe la columna c.estado
LINE 1: ...ECT DISTINCT a.*, b.nro_participantes AS inscritos, c.estado
                                                               ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-01-29 00:59:29 --> Query error: ERROR:  no existe la columna c.estado
LINE 1: ...ECT DISTINCT a.*, b.nro_participantes AS inscritos, c.estado
                                                               ^ - Invalid query: SELECT DISTINCT a.*, b.nro_participantes AS inscritos, c.estado
										  FROM tb_curso a
 										  INNER JOIN tr_curso_participantes b 
										  ON a.id_curso = b.id_curso
										  INNER JOIN tr_curso_estado c
										  ON a.id_curso = c.curso_id
ERROR - 2015-01-29 01:01:33 --> Severity: Warning --> pg_query(): Query failed: ERROR:  no existe la columna d.estado
LINE 1: ...ECT DISTINCT a.*, b.nro_participantes AS inscritos, d.estado
                                                               ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-01-29 01:01:33 --> Query error: ERROR:  no existe la columna d.estado
LINE 1: ...ECT DISTINCT a.*, b.nro_participantes AS inscritos, d.estado
                                                               ^ - Invalid query: SELECT DISTINCT a.*, b.nro_participantes AS inscritos, d.estado
										  FROM tb_curso a
 										  INNER JOIN tr_curso_participantes b 
										  ON a.id_curso = b.id_curso
										  INNER JOIN tr_curso_estado c
										  ON a.id_curso = c.curso_id
										  INNER JOIN tb_estado d 
										  ON c.estado_id = d.id_estado
ERROR - 2015-01-29 01:01:47 --> Severity: Warning --> pg_query(): Query failed: ERROR:  no existe la columna d.estado
LINE 1: ...ECT DISTINCT a.*, b.nro_participantes AS inscritos, d.estado
                                                               ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-01-29 01:01:47 --> Query error: ERROR:  no existe la columna d.estado
LINE 1: ...ECT DISTINCT a.*, b.nro_participantes AS inscritos, d.estado
                                                               ^ - Invalid query: SELECT DISTINCT a.*, b.nro_participantes AS inscritos, d.estado
										  FROM tb_curso a
 										  INNER JOIN tr_curso_participantes b 
										  ON a.id_curso = b.id_curso
										  INNER JOIN tr_curso_estado c
										  ON a.id_curso = c.curso_id
										  INNER JOIN tb_estado d 
										  ON c.estado_id = d.id_estado
ERROR - 2015-01-29 01:03:15 --> Severity: Notice --> Undefined property: stdClass::$id_estado C:\wamp\www\efosig\application\controllers\Cursos.php 32
ERROR - 2015-01-29 01:03:15 --> Severity: Warning --> pg_query(): Query failed: ERROR:  error de sintaxis al final de la entrada
LINE 1: select nombre from tb_estado where id_estado = 
                                                       ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-01-29 01:03:15 --> Query error: ERROR:  error de sintaxis al final de la entrada
LINE 1: select nombre from tb_estado where id_estado = 
                                                       ^ - Invalid query: select nombre from tb_estado where id_estado = 
