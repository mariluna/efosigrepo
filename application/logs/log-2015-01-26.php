<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2015-01-26 02:10:57 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\models\Persona_model.php 10
ERROR - 2015-01-26 02:10:57 --> Severity: Warning --> pg_query() [<a href='function.pg-query'>function.pg-query</a>]: Query failed: ERROR:  error de sintaxis al final de la entrada
LINE 1: SELECT id_estado FROM tb_persona WHERE id_persona=
                                                          ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-01-26 02:10:57 --> Query error: ERROR:  error de sintaxis al final de la entrada
LINE 1: SELECT id_estado FROM tb_persona WHERE id_persona=
                                                          ^ - Invalid query: SELECT id_estado FROM tb_persona WHERE id_persona=
