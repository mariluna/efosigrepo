<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2015-01-29 00:22:28 --> Severity: Warning --> pg_connect() [<a href='function.pg-connect'>function.pg-connect</a>]: Unable to connect to PostgreSQL server: FATAL:  la autentificaci�n password fall� para el usuario �postgres� C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 151
ERROR - 2015-01-29 00:22:28 --> Unable to connect to the database
ERROR - 2015-01-29 00:39:00 --> Severity: Notice --> Undefined property: Personas_api::$post C:\wamp\www\efosig\application\controllers\api\Personas_api.php 198
ERROR - 2015-01-29 00:39:00 --> Severity: Warning --> pg_query() [<a href='function.pg-query'>function.pg-query</a>]: Query failed: ERROR:  llave duplicada viola restricción de unicidad «tb_general_pkey»
DETAIL:  Ya existe la llave (id_persona)=(2). C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-01-29 00:39:00 --> Query error: ERROR:  llave duplicada viola restricción de unicidad «tb_general_pkey»
DETAIL:  Ya existe la llave (id_persona)=(2). - Invalid query: INSERT INTO "tb_general" ("id_persona", "institucion_labora", "cargo", "telefono", "email") VALUES ('2', 'dfg', 'fg', FALSE, 'maj@oioioi.com')
ERROR - 2015-01-29 00:42:17 --> Severity: Notice --> Undefined property: Personas_api::$post C:\wamp\www\efosig\application\controllers\api\Personas_api.php 198
ERROR - 2015-01-29 00:42:18 --> Severity: Warning --> pg_query() [<a href='function.pg-query'>function.pg-query</a>]: Query failed: ERROR:  llave duplicada viola restricción de unicidad «tb_general_pkey»
DETAIL:  Ya existe la llave (id_persona)=(2). C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-01-29 00:42:18 --> Query error: ERROR:  llave duplicada viola restricción de unicidad «tb_general_pkey»
DETAIL:  Ya existe la llave (id_persona)=(2). - Invalid query: INSERT INTO "tb_general" ("id_persona", "institucion_labora", "cargo", "telefono", "email") VALUES ('2', 'dfrer', 'retret', FALSE, 'maj@oioioi.com')
ERROR - 2015-01-29 00:56:28 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\controllers\api\Personas_api.php 201
ERROR - 2015-01-29 00:56:28 --> Severity: Warning --> pg_query() [<a href='function.pg-query'>function.pg-query</a>]: Query failed: ERROR:  el valor null para la columna «id_persona» viola la restricción not null C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-01-29 00:56:28 --> Query error: ERROR:  el valor null para la columna «id_persona» viola la restricción not null - Invalid query: INSERT INTO "tb_general" ("id_persona", "institucion_labora", "cargo", "telefono", "email") VALUES (NULL, 'eret', 'ewr', FALSE, 'frrtrt@fdgefr.cct')
ERROR - 2015-01-29 01:03:11 --> Could not find the language line "create_user_validation_cargo_label"
ERROR - 2015-01-29 01:03:11 --> Could not find the language line "create_user_validation_persona_label"
ERROR - 2015-01-29 01:03:11 --> Could not find the language line "create_user_validation_pregunta_label"
ERROR - 2015-01-29 01:03:11 --> Could not find the language line "create_user_validation_respuesta_label"
ERROR - 2015-01-29 01:03:39 --> Could not find the language line "create_user_validation_cargo_label"
ERROR - 2015-01-29 01:03:39 --> Could not find the language line "create_user_validation_persona_label"
ERROR - 2015-01-29 01:03:39 --> Could not find the language line "create_user_validation_pregunta_label"
ERROR - 2015-01-29 01:03:39 --> Could not find the language line "create_user_validation_respuesta_label"
