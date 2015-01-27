<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2014-12-03 00:07:05 --> Severity: Error --> Uncaught exception 'Exception' with message 'Undefined method Ion_auth::users_group() called' in C:\wamp\www\efosig\application\libraries\Ion_auth.php:109
Stack trace:
#0 C:\wamp\www\efosig\application\views\header.php(179): Ion_auth->__call('users_group', Array)
#1 C:\wamp\www\efosig\application\views\header.php(179): Ion_auth->users_group()
#2 C:\wamp\www\efosig\system\core\Loader.php(910): include('C:\wamp\www\efo...')
#3 C:\wamp\www\efosig\system\core\Loader.php(434): CI_Loader->_ci_load(Array)
#4 C:\wamp\www\efosig\application\controllers\Welcome.php(48): CI_Loader->view('header')
#5 [internal function]: Welcome->index()
#6 C:\wamp\www\efosig\system\core\CodeIgniter.php(496): call_user_func_array(Array, Array)
#7 C:\wamp\www\efosig\index.php(274): require_once('C:\wamp\www\efo...')
#8 {main}
  thrown C:\wamp\www\efosig\application\libraries\Ion_auth.php 109
ERROR - 2014-12-03 00:29:15 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\cursos\index.php 42
ERROR - 2014-12-03 00:31:22 --> Severity: Warning --> pg_query(): Query failed: ERROR:  update o delete en «tb_curso» viola la llave foránea «tb_divulgacion_id_curso_fkey» en la tabla «tb_divulgacion»
DETAIL:  La llave (id_curso)=(2) todavía es referida desde la tabla «tb_divulgacion». C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2014-12-03 00:31:23 --> Query error: ERROR:  update o delete en «tb_curso» viola la llave foránea «tb_divulgacion_id_curso_fkey» en la tabla «tb_divulgacion»
DETAIL:  La llave (id_curso)=(2) todavía es referida desde la tabla «tb_divulgacion». - Invalid query: DELETE FROM "tb_curso"
WHERE "id_curso" = '2'
ERROR - 2014-12-03 00:37:14 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\controllers\Cursos.php 32
ERROR - 2014-12-03 00:37:14 --> Severity: Warning --> pg_query(): Query failed: ERROR:  error de sintaxis al final de la entrada
LINE 1: select nombre from tb_estado where id_estado = 
                                                       ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2014-12-03 00:37:14 --> Query error: ERROR:  error de sintaxis al final de la entrada
LINE 1: select nombre from tb_estado where id_estado = 
                                                       ^ - Invalid query: select nombre from tb_estado where id_estado = 
ERROR - 2014-12-03 01:01:58 --> 404 Page Not Found: Entes/index
ERROR - 2014-12-03 01:02:05 --> 404 Page Not Found: Entes/index
ERROR - 2014-12-03 01:04:49 --> 404 Page Not Found: Entes/index
ERROR - 2014-12-03 01:05:07 --> 404 Page Not Found: Entes/index
