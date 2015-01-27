<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2015-01-22 01:41:13 --> 404 Page Not Found: Pnf/argelia
ERROR - 2015-01-22 01:42:27 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\models\Persona_model.php 10
ERROR - 2015-01-22 01:42:27 --> Severity: Warning --> pg_query() [<a href='function.pg-query'>function.pg-query</a>]: Query failed: ERROR:  error de sintaxis al final de la entrada
LINE 1: SELECT id_estado FROM tb_persona WHERE id_persona=
                                                          ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-01-22 01:42:27 --> Query error: ERROR:  error de sintaxis al final de la entrada
LINE 1: SELECT id_estado FROM tb_persona WHERE id_persona=
                                                          ^ - Invalid query: SELECT id_estado FROM tb_persona WHERE id_persona=
ERROR - 2015-01-22 19:16:50 --> Severity: Warning --> pg_query() [<a href='function.pg-query'>function.pg-query</a>]: Query failed: ERROR:  llave duplicada viola restricción de unicidad «groups_pkey»
DETAIL:  Ya existe la llave (id)=(1). C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-01-22 19:16:50 --> Query error: ERROR:  llave duplicada viola restricción de unicidad «groups_pkey»
DETAIL:  Ya existe la llave (id)=(1). - Invalid query: INSERT INTO "groups" ("name", "description") VALUES ('Prueba', 'aaaaa')
ERROR - 2015-01-22 19:39:13 --> Could not find the language line "create_user_validation_pregunta_label"
ERROR - 2015-01-22 19:39:13 --> Could not find the language line "create_user_validation_respuesta_label"
