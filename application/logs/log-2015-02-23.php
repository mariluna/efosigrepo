<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2015-02-23 22:08:41 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-23 22:08:48 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-23 22:21:02 --> Severity: Warning --> pg_query(): Query failed: ERROR:  error de sintaxis en o cerca de «$»
LINE 1: SELECT status FROM tb_persona WHERE id_persona = $id
                                                         ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-23 22:21:02 --> Query error: ERROR:  error de sintaxis en o cerca de «$»
LINE 1: SELECT status FROM tb_persona WHERE id_persona = $id
                                                         ^ - Invalid query: SELECT status FROM tb_persona WHERE id_persona = $id
ERROR - 2015-02-23 22:21:34 --> Severity: Warning --> pg_query(): Query failed: ERROR:  no existe la columna «id»
LINE 3: WHERE &quot;id&quot; = '12'
              ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-23 22:21:34 --> Query error: ERROR:  no existe la columna «id»
LINE 3: WHERE "id" = '12'
              ^ - Invalid query: SELECT *
FROM "tb_persona"
WHERE "id" = '12'
ERROR - 2015-02-23 22:21:52 --> Severity: Notice --> Undefined variable: redi C:\wamp\www\efosig\application\views\persona\ver_general.php 170
ERROR - 2015-02-23 22:21:52 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp\www\efosig\application\views\persona\ver_general.php 170
ERROR - 2015-02-23 22:24:08 --> Severity: Notice --> Undefined variable: redi C:\wamp\www\efosig\application\views\persona\ver_general.php 166
ERROR - 2015-02-23 22:24:08 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp\www\efosig\application\views\persona\ver_general.php 166
