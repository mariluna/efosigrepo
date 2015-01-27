<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2014-11-18 23:05:18 --> Severity: Notice --> Undefined property: CI_Loader::$divulgacion_model C:\wamp\www\efosig\application\views\divulgaciones\agregar.php 11
ERROR - 2014-11-18 23:05:18 --> Severity: Error --> Call to a member function getCurso() on a non-object C:\wamp\www\efosig\application\views\divulgaciones\agregar.php 11
ERROR - 2014-11-18 23:05:28 --> Severity: Notice --> Undefined property: CI_Loader::$divulgacion_model C:\wamp\www\efosig\application\views\divulgaciones\agregar.php 11
ERROR - 2014-11-18 23:05:28 --> Severity: Error --> Call to a member function getCurso() on a non-object C:\wamp\www\efosig\application\views\divulgaciones\agregar.php 11
ERROR - 2014-11-18 23:11:43 --> Severity: Warning --> pg_query(): Query failed: ERROR:  no existe la relación «curso»
LINE 1: SELECT id_curso, nombre FROM curso WHERE id_curso NOT IN (SE...
                                     ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2014-11-18 23:11:43 --> Query error: ERROR:  no existe la relación «curso»
LINE 1: SELECT id_curso, nombre FROM curso WHERE id_curso NOT IN (SE...
                                     ^ - Invalid query: SELECT id_curso, nombre FROM curso WHERE id_curso NOT IN (SELECT DISTINCT id_curso FROM tb_divulgacion)
ERROR - 2014-11-18 23:12:25 --> Severity: Warning --> pg_query(): Query failed: ERROR:  no existe la relación «curso»
LINE 1: SELECT * FROM curso WHERE id_curso NOT IN (SELECT DISTINCT i...
                      ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2014-11-18 23:12:25 --> Query error: ERROR:  no existe la relación «curso»
LINE 1: SELECT * FROM curso WHERE id_curso NOT IN (SELECT DISTINCT i...
                      ^ - Invalid query: SELECT * FROM curso WHERE id_curso NOT IN (SELECT DISTINCT id_curso FROM tb_divulgacion)
ERROR - 2014-11-18 23:12:41 --> Severity: Notice --> Undefined property: CI_Loader::$divulgacion_model C:\wamp\www\efosig\application\views\divulgaciones\agregar.php 11
ERROR - 2014-11-18 23:12:41 --> Severity: Error --> Call to a member function getCurso() on a non-object C:\wamp\www\efosig\application\views\divulgaciones\agregar.php 11
ERROR - 2014-11-18 23:13:13 --> Severity: Notice --> Undefined property: CI_Loader::$divulgacion_model C:\wamp\www\efosig\application\views\divulgaciones\agregar.php 11
ERROR - 2014-11-18 23:13:13 --> Severity: Error --> Call to a member function getCurso() on a non-object C:\wamp\www\efosig\application\views\divulgaciones\agregar.php 11
ERROR - 2014-11-18 23:14:10 --> Severity: Notice --> Undefined variable: get C:\wamp\www\efosig\application\controllers\Divulgaciones.php 33
ERROR - 2014-11-18 23:14:10 --> Severity: Notice --> Undefined property: CI_Loader::$divulgacion_model C:\wamp\www\efosig\application\views\divulgaciones\agregar.php 11
ERROR - 2014-11-18 23:14:10 --> Severity: Error --> Call to a member function getCurso() on a non-object C:\wamp\www\efosig\application\views\divulgaciones\agregar.php 11
ERROR - 2014-11-18 23:28:38 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\divulgaciones\agregar.php 10
ERROR - 2014-11-18 23:28:51 --> Severity: Notice --> Undefined index: id C:\wamp\www\efosig\application\views\divulgaciones\agregar.php 10
ERROR - 2014-11-18 23:29:40 --> Severity: Notice --> Undefined index: id_curso C:\wamp\www\efosig\application\views\divulgaciones\agregar.php 10
ERROR - 2014-11-18 23:29:53 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\divulgaciones\agregar.php 10
ERROR - 2014-11-18 23:30:13 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\divulgaciones\agregar.php 10
