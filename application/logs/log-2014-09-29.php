<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2014-09-29 09:48:45 --> Severity: Warning --> pg_connect(): Unable to connect to PostgreSQL server: fe_sendauth: no password supplied /var/www/efosig_2/system/database/drivers/postgre/postgre_driver.php 151
ERROR - 2014-09-29 09:48:45 --> Unable to connect to the database
ERROR - 2014-09-29 11:07:38 --> Severity: Warning --> pg_connect(): Unable to connect to PostgreSQL server: fe_sendauth: no password supplied /var/www/efosig_2/system/database/drivers/postgre/postgre_driver.php 151
ERROR - 2014-09-29 11:07:38 --> Unable to connect to the database
ERROR - 2014-09-29 11:10:03 --> 404 Page Not Found: Cursos/index
ERROR - 2014-09-29 11:23:13 --> Severity: Notice --> Undefined property: Cursos_api::$bancos_model /var/www/efosig_2/application/controllers/api/Cursos_api.php 40
ERROR - 2014-09-29 11:23:13 --> Severity: Error --> Call to a member function delete() on a non-object /var/www/efosig_2/application/controllers/api/Cursos_api.php 40
ERROR - 2014-09-29 11:23:19 --> Severity: Notice --> Undefined property: Cursos_api::$bancos_model /var/www/efosig_2/application/controllers/api/Cursos_api.php 40
ERROR - 2014-09-29 11:23:19 --> Severity: Error --> Call to a member function delete() on a non-object /var/www/efosig_2/application/controllers/api/Cursos_api.php 40
ERROR - 2014-09-29 11:23:48 --> Severity: Warning --> pg_query(): Query failed: ERROR:  invalid input syntax for integer: &quot;undefined&quot;
LINE 2: WHERE &quot;id_curso&quot; = 'undefined'
                           ^ /var/www/efosig_2/system/database/drivers/postgre/postgre_driver.php 236
ERROR - 2014-09-29 11:23:48 --> Query error: ERROR:  invalid input syntax for integer: "undefined"
LINE 2: WHERE "id_curso" = 'undefined'
                           ^ - Invalid query: DELETE FROM "tb_curso"
WHERE "id_curso" = 'undefined'
ERROR - 2014-09-29 11:25:33 --> Could not find the language line "edit_user_validation_phone_label"
ERROR - 2014-09-29 11:25:33 --> Could not find the language line "create_user_validation_cedula_label"
ERROR - 2014-09-29 11:25:33 --> Could not find the language line "create_user_validation_rif_label"
ERROR - 2014-09-29 12:06:19 --> Severity: Notice --> Undefined property: Cursos_api::$bancos_model /var/www/efosig_2/application/controllers/api/Cursos_api.php 60
ERROR - 2014-09-29 12:06:19 --> Severity: Error --> Call to a member function add() on a non-object /var/www/efosig_2/application/controllers/api/Cursos_api.php 60
ERROR - 2014-09-29 12:07:06 --> Severity: Warning --> pg_query(): Query failed: ERROR:  column &quot;status&quot; is of type smallint but expression is of type boolean
LINE 1: ...id_estado&quot;, &quot;status&quot;) VALUES ('re', '12', '12', '19', FALSE)
                                                                 ^
HINT:  You will need to rewrite or cast the expression. /var/www/efosig_2/system/database/drivers/postgre/postgre_driver.php 236
ERROR - 2014-09-29 12:07:06 --> Query error: ERROR:  column "status" is of type smallint but expression is of type boolean
LINE 1: ...id_estado", "status") VALUES ('re', '12', '12', '19', FALSE)
                                                                 ^
HINT:  You will need to rewrite or cast the expression. - Invalid query: INSERT INTO "tb_curso" ("nombre", "duracion", "nro_participantes", "id_estado", "status") VALUES ('re', '12', '12', '19', FALSE)
ERROR - 2014-09-29 12:07:57 --> Severity: Warning --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;tb_curso_pkey&quot;
DETAIL:  Key (id_curso)=(1) already exists. /var/www/efosig_2/system/database/drivers/postgre/postgre_driver.php 236
ERROR - 2014-09-29 12:07:57 --> Query error: ERROR:  duplicate key value violates unique constraint "tb_curso_pkey"
DETAIL:  Key (id_curso)=(1) already exists. - Invalid query: INSERT INTO "tb_curso" ("nombre", "duracion", "nro_participantes", "id_estado", "status") VALUES ('qwety', '12', '12', '24', '1')
ERROR - 2014-09-29 12:09:05 --> Severity: Warning --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;tb_curso_pkey&quot;
DETAIL:  Key (id_curso)=(2) already exists. /var/www/efosig_2/system/database/drivers/postgre/postgre_driver.php 236
ERROR - 2014-09-29 12:09:05 --> Query error: ERROR:  duplicate key value violates unique constraint "tb_curso_pkey"
DETAIL:  Key (id_curso)=(2) already exists. - Invalid query: INSERT INTO "tb_curso" ("nombre", "duracion", "nro_participantes", "id_estado", "status") VALUES ('12', '12', '12', '17', '1')
ERROR - 2014-09-29 12:24:11 --> Severity: Notice --> Undefined variable: estatus /var/www/efosig_2/application/views/cursos/ver.php 28
ERROR - 2014-09-29 12:24:11 --> Severity: Notice --> Undefined variable: id /var/www/efosig_2/application/views/cursos/ver.php 32
ERROR - 2014-09-29 12:24:20 --> Severity: Notice --> Undefined variable: id /var/www/efosig_2/application/views/cursos/ver.php 32
ERROR - 2014-09-29 12:43:48 --> Severity: Warning --> pg_query(): Query failed: ERROR:  update or delete on table &quot;tb_curso&quot; violates foreign key constraint &quot;tb_divulgacion_id_curso_fkey&quot; on table &quot;tb_divulgacion&quot;
DETAIL:  Key (id_curso)=(2) is still referenced from table &quot;tb_divulgacion&quot;. /var/www/efosig_2/system/database/drivers/postgre/postgre_driver.php 236
ERROR - 2014-09-29 12:43:48 --> Query error: ERROR:  update or delete on table "tb_curso" violates foreign key constraint "tb_divulgacion_id_curso_fkey" on table "tb_divulgacion"
DETAIL:  Key (id_curso)=(2) is still referenced from table "tb_divulgacion". - Invalid query: DELETE FROM "tb_curso"
WHERE "id_curso" = '2'
ERROR - 2014-09-29 12:43:53 --> Severity: Warning --> pg_query(): Query failed: ERROR:  update or delete on table &quot;tb_curso&quot; violates foreign key constraint &quot;tb_divulgacion_id_curso_fkey&quot; on table &quot;tb_divulgacion&quot;
DETAIL:  Key (id_curso)=(2) is still referenced from table &quot;tb_divulgacion&quot;. /var/www/efosig_2/system/database/drivers/postgre/postgre_driver.php 236
ERROR - 2014-09-29 12:43:53 --> Query error: ERROR:  update or delete on table "tb_curso" violates foreign key constraint "tb_divulgacion_id_curso_fkey" on table "tb_divulgacion"
DETAIL:  Key (id_curso)=(2) is still referenced from table "tb_divulgacion". - Invalid query: DELETE FROM "tb_curso"
WHERE "id_curso" = '2'
ERROR - 2014-09-29 12:51:56 --> Severity: Warning --> pg_query(): Query failed: ERROR:  update or delete on table &quot;tb_curso&quot; violates foreign key constraint &quot;tb_divulgacion_id_curso_fkey&quot; on table &quot;tb_divulgacion&quot;
DETAIL:  Key (id_curso)=(2) is still referenced from table &quot;tb_divulgacion&quot;. /var/www/efosig_2/system/database/drivers/postgre/postgre_driver.php 236
ERROR - 2014-09-29 12:51:56 --> Query error: ERROR:  update or delete on table "tb_curso" violates foreign key constraint "tb_divulgacion_id_curso_fkey" on table "tb_divulgacion"
DETAIL:  Key (id_curso)=(2) is still referenced from table "tb_divulgacion". - Invalid query: DELETE FROM "tb_curso"
WHERE "id_curso" = '2'
ERROR - 2014-09-29 16:02:28 --> Could not find the language line "create_user_validation_phone_label"
ERROR - 2014-09-29 16:02:28 --> Could not find the language line "create_user_validation_cedula_label"
ERROR - 2014-09-29 16:02:28 --> Could not find the language line "create_user_validation_rif_label"
ERROR - 2014-09-29 16:03:27 --> Could not find the language line "create_user_validation_phone_label"
ERROR - 2014-09-29 16:03:27 --> Could not find the language line "create_user_validation_cedula_label"
ERROR - 2014-09-29 16:03:27 --> Could not find the language line "create_user_validation_rif_label"
