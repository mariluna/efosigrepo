<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2015-02-15 21:21:52 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-15 21:22:01 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-15 21:22:53 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-15 21:23:29 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-15 21:26:51 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-15 21:26:54 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-15 21:27:01 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-15 22:18:53 --> Severity: Error --> Call to undefined method Divulgaciones_model::bancoView() C:\wamp\www\efosig\application\controllers\api\Divulgaciones_api.php 120
ERROR - 2015-02-15 22:19:15 --> Severity: Notice --> Undefined variable: banco C:\wamp\www\efosig\application\controllers\api\Divulgaciones_api.php 122
ERROR - 2015-02-15 22:19:15 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp\www\efosig\application\controllers\api\Divulgaciones_api.php 122
ERROR - 2015-02-15 23:02:30 --> Severity: Warning --> Missing argument 1 for Divulgaciones_model::getPrensa(), called in C:\wamp\www\efosig\application\controllers\api\Divulgaciones_api.php on line 140 and defined C:\wamp\www\efosig\application\models\Divulgaciones_model.php 55
ERROR - 2015-02-15 23:02:30 --> Severity: Notice --> Undefined variable: tipo C:\wamp\www\efosig\application\models\Divulgaciones_model.php 57
ERROR - 2015-02-15 23:03:12 --> Severity: Warning --> Missing argument 1 for Divulgaciones_api::getPrensa_post() C:\wamp\www\efosig\application\controllers\api\Divulgaciones_api.php 138
ERROR - 2015-02-15 23:03:12 --> Severity: Notice --> Undefined variable: tipo C:\wamp\www\efosig\application\controllers\api\Divulgaciones_api.php 140
ERROR - 2015-02-15 23:42:57 --> Severity: Error --> Call to undefined method Divulgaciones_model::addNewRadio() C:\wamp\www\efosig\application\controllers\api\Divulgaciones_api.php 107
ERROR - 2015-02-15 23:45:31 --> Severity: Warning --> pg_query(): Query failed: ERROR:  no existe la columna «tipo_divulgacion_radio» en la relación «tb_divulgacion_radio»
LINE 1: INSERT INTO &quot;tb_divulgacion_radio&quot; (&quot;tipo_divulgacion_radio&quot;...
                                            ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-15 23:45:31 --> Query error: ERROR:  no existe la columna «tipo_divulgacion_radio» en la relación «tb_divulgacion_radio»
LINE 1: INSERT INTO "tb_divulgacion_radio" ("tipo_divulgacion_radio"...
                                            ^ - Invalid query: INSERT INTO "tb_divulgacion_radio" ("tipo_divulgacion_radio", "emisora", "dial", "hora_radio") VALUES ('3', '1', '1', '1')
ERROR - 2015-02-15 23:48:17 --> Severity: Warning --> pg_query(): Query failed: ERROR:  no existe la columna «hora_radio» en la relación «tb_divulgacion_radio»
LINE 1: ...radio&quot; (&quot;id_tipo_divulgacion&quot;, &quot;emisora&quot;, &quot;dial&quot;, &quot;hora_radi...
                                                             ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-15 23:48:17 --> Query error: ERROR:  no existe la columna «hora_radio» en la relación «tb_divulgacion_radio»
LINE 1: ...radio" ("id_tipo_divulgacion", "emisora", "dial", "hora_radi...
                                                             ^ - Invalid query: INSERT INTO "tb_divulgacion_radio" ("id_tipo_divulgacion", "emisora", "dial", "hora_radio") VALUES ('3', '1', '1', '1')
ERROR - 2015-02-15 23:50:57 --> Severity: Warning --> pg_query(): Query failed: ERROR:  no existe la columna «nombre_programa» en la relación «tb_divulgacion_tv»
LINE 1: INSERT INTO &quot;tb_divulgacion_tv&quot; (&quot;nombre_programa&quot;, &quot;canal&quot;,...
                                         ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-15 23:50:57 --> Query error: ERROR:  no existe la columna «nombre_programa» en la relación «tb_divulgacion_tv»
LINE 1: INSERT INTO "tb_divulgacion_tv" ("nombre_programa", "canal",...
                                         ^ - Invalid query: INSERT INTO "tb_divulgacion_tv" ("nombre_programa", "canal", "hora_emision", "tipo_divulgacion") VALUES ('', '', '', '')
ERROR - 2015-02-15 23:53:23 --> Severity: Warning --> pg_query(): Query failed: ERROR:  no existe la columna «nombre_programa» en la relación «tb_divulgacion_tv»
LINE 1: INSERT INTO &quot;tb_divulgacion_tv&quot; (&quot;nombre_programa&quot;, &quot;canal&quot;,...
                                         ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-15 23:53:23 --> Query error: ERROR:  no existe la columna «nombre_programa» en la relación «tb_divulgacion_tv»
LINE 1: INSERT INTO "tb_divulgacion_tv" ("nombre_programa", "canal",...
                                         ^ - Invalid query: INSERT INTO "tb_divulgacion_tv" ("nombre_programa", "canal", "hora_emision", "tipo_divulgacion") VALUES ('', '', '', '')
ERROR - 2015-02-15 23:59:41 --> Severity: Warning --> pg_query(): Query failed: ERROR:  no existe la columna «nombre_programa» en la relación «tb_divulgacion_tv»
LINE 1: INSERT INTO &quot;tb_divulgacion_tv&quot; (&quot;nombre_programa&quot;, &quot;canal&quot;,...
                                         ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-15 23:59:41 --> Query error: ERROR:  no existe la columna «nombre_programa» en la relación «tb_divulgacion_tv»
LINE 1: INSERT INTO "tb_divulgacion_tv" ("nombre_programa", "canal",...
                                         ^ - Invalid query: INSERT INTO "tb_divulgacion_tv" ("nombre_programa", "canal", "hora_emision", "tipo_divulgacion") VALUES ('8', '8', '8', '1')
