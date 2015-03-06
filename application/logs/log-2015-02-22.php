<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2015-02-22 16:50:34 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-22 16:50:39 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-22 17:50:37 --> Severity: Warning --> pg_query(): Query failed: ERROR:  no existe la columna «status»
LINE 6:             AND status = 1
                        ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-22 17:50:37 --> Query error: ERROR:  no existe la columna «status»
LINE 6:             AND status = 1
                        ^ - Invalid query: SELECT id_curso, id_persona 
									   FROM tr_persona_curso 
									   WHERE id_curso = 27
									   AND id_persona = 1
									   AND id_estado = 24
									   AND status = 1
ERROR - 2015-02-22 17:55:31 --> Severity: Warning --> Missing argument 2 for Cursos_model::get(), called in C:\wamp\www\efosig\application\controllers\Persona.php on line 48 and defined C:\wamp\www\efosig\application\models\Cursos_model.php 66
ERROR - 2015-02-22 17:55:31 --> Severity: Notice --> Undefined variable: est C:\wamp\www\efosig\application\models\Cursos_model.php 72
ERROR - 2015-02-22 18:01:35 --> Severity: Warning --> Missing argument 2 for Cursos_model::get(), called in C:\wamp\www\efosig\application\controllers\Persona.php on line 48 and defined C:\wamp\www\efosig\application\models\Cursos_model.php 66
ERROR - 2015-02-22 18:01:35 --> Severity: Notice --> Undefined variable: est C:\wamp\www\efosig\application\models\Cursos_model.php 72
