<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2014-09-28 13:59:32 --> Severity: Warning --> pg_connect() [<a href='function.pg-connect'>function.pg-connect</a>]: Unable to connect to PostgreSQL server: FATAL:  no existe la base de datos �bd_efosig� C:\wamp\www\efosig_2\system\database\drivers\postgre\postgre_driver.php 151
ERROR - 2014-09-28 13:59:32 --> Unable to connect to the database
ERROR - 2014-09-28 14:11:03 --> Severity: Warning --> pg_query() [<a href='function.pg-query'>function.pg-query</a>]: Query failed: ERROR:  no existe la relación «ente»
LINE 2: FROM &quot;ente&quot;
             ^ C:\wamp\www\efosig_2\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2014-09-28 14:11:03 --> Query error: ERROR:  no existe la relación «ente»
LINE 2: FROM "ente"
             ^ - Invalid query: SELECT *
FROM "ente"
ERROR - 2014-09-28 14:11:08 --> Severity: Warning --> pg_query() [<a href='function.pg-query'>function.pg-query</a>]: Query failed: ERROR:  no existe la relación «unidad_tributaria»
LINE 2: FROM &quot;unidad_tributaria&quot;
             ^ C:\wamp\www\efosig_2\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2014-09-28 14:11:08 --> Query error: ERROR:  no existe la relación «unidad_tributaria»
LINE 2: FROM "unidad_tributaria"
             ^ - Invalid query: SELECT *
FROM "unidad_tributaria"
ERROR - 2014-09-28 14:11:52 --> Could not find the language line "create_user_validation_phone_label"
ERROR - 2014-09-28 14:11:52 --> Could not find the language line "create_user_validation_cedula_label"
ERROR - 2014-09-28 14:11:52 --> Could not find the language line "create_user_validation_rif_label"
ERROR - 2014-09-28 14:24:06 --> Could not find the language line "edit_user_validation_phone_label"
ERROR - 2014-09-28 14:24:06 --> Could not find the language line "create_user_validation_cedula_label"
ERROR - 2014-09-28 14:24:06 --> Could not find the language line "create_user_validation_rif_label"
ERROR - 2014-09-28 14:24:06 --> Severity: Warning --> pg_query() [<a href='function.pg-query'>function.pg-query</a>]: Query failed: ERROR:  no existe la columna «cedula»
LINE 1: select cedula, rif from users where id=1;
               ^ C:\wamp\www\efosig_2\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2014-09-28 14:24:06 --> Query error: ERROR:  no existe la columna «cedula»
LINE 1: select cedula, rif from users where id=1;
               ^ - Invalid query: select cedula, rif from users where id=1;
ERROR - 2014-09-28 14:24:07 --> Severity: Warning --> include(C:\wamp\www\efosig_2\application\views\errors\html\error_db.php) [<a href='function.include'>function.include</a>]: failed to open stream: No such file or directory C:\wamp\www\efosig_2\system\core\Exceptions.php 169
ERROR - 2014-09-28 14:24:07 --> Severity: Warning --> include() [<a href='function.include'>function.include</a>]: Failed opening 'C:\wamp\www\efosig_2\application\views\errors\html\error_db.php' for inclusion (include_path='.;C:\php5\pear') C:\wamp\www\efosig_2\system\core\Exceptions.php 169
ERROR - 2014-09-28 14:25:15 --> Could not find the language line "edit_user_validation_phone_label"
ERROR - 2014-09-28 14:25:15 --> Could not find the language line "create_user_validation_cedula_label"
ERROR - 2014-09-28 14:25:15 --> Could not find the language line "create_user_validation_rif_label"
ERROR - 2014-09-28 14:25:15 --> Severity: Warning --> pg_query() [<a href='function.pg-query'>function.pg-query</a>]: Query failed: ERROR:  no existe la columna «cedula»
LINE 1: select cedula, rif from users where id=1;
               ^ C:\wamp\www\efosig_2\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2014-09-28 14:25:15 --> Query error: ERROR:  no existe la columna «cedula»
LINE 1: select cedula, rif from users where id=1;
               ^ - Invalid query: select cedula, rif from users where id=1;
ERROR - 2014-09-28 14:28:25 --> Could not find the language line "edit_user_validation_phone_label"
ERROR - 2014-09-28 14:28:25 --> Could not find the language line "create_user_validation_cedula_label"
ERROR - 2014-09-28 14:28:25 --> Could not find the language line "create_user_validation_rif_label"
ERROR - 2014-09-28 14:32:03 --> Could not find the language line "edit_user_validation_phone_label"
ERROR - 2014-09-28 14:32:03 --> Could not find the language line "create_user_validation_cedula_label"
ERROR - 2014-09-28 14:32:03 --> Could not find the language line "create_user_validation_rif_label"
ERROR - 2014-09-28 14:32:19 --> Could not find the language line "edit_user_validation_phone_label"
ERROR - 2014-09-28 14:32:20 --> Could not find the language line "create_user_validation_cedula_label"
ERROR - 2014-09-28 14:32:20 --> Could not find the language line "create_user_validation_rif_label"
ERROR - 2014-09-28 14:33:49 --> Could not find the language line "edit_user_validation_phone_label"
ERROR - 2014-09-28 14:33:49 --> Could not find the language line "create_user_validation_cedula_label"
ERROR - 2014-09-28 14:33:49 --> Could not find the language line "create_user_validation_rif_label"
ERROR - 2014-09-28 15:09:32 --> Severity: Parsing Error --> parse error C:\wamp\www\efosig_2\application\views\header.php 339
ERROR - 2014-09-28 15:10:31 --> Severity: Parsing Error --> parse error C:\wamp\www\efosig_2\application\views\header.php 249
ERROR - 2014-09-28 15:10:58 --> Severity: Parsing Error --> parse error C:\wamp\www\efosig_2\application\views\header.php 244
