<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2015-02-18 00:52:56 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-18 00:53:01 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-18 01:17:52 --> Severity: Warning --> pg_query(): Query failed: ERROR:  no existe la columna a.tipo_divulgacion_prensa
LINE 3: ... tb_tipo_divulgacion b on b.id_tipo_divulgacion = a.tipo_div...
                                                             ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-18 01:17:52 --> Query error: ERROR:  no existe la columna a.tipo_divulgacion_prensa
LINE 3: ... tb_tipo_divulgacion b on b.id_tipo_divulgacion = a.tipo_div...
                                                             ^ - Invalid query: SELECT  a.*, b.nombre, b.medio
									FROM tb_divulgacion_tv a 
									INNER JOIN tb_tipo_divulgacion b on b.id_tipo_divulgacion = a.tipo_divulgacion_prensa
									WHERE id_divulgacion_tv = 6
ERROR - 2015-02-18 01:21:44 --> Severity: Warning --> pg_query(): Query failed: ERROR:  la columna «tipo_divulgacion_tv» es de tipo integer pero la expresión es de tipo boolean
LINE 1: ...= FALSE, &quot;canal&quot; = FALSE, &quot;tipo_divulgacion_tv&quot; = FALSE, &quot;ho...
                                                             ^
HINT:  Necesitará reescribir la expresión o aplicarle una conversión de tipo. C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-18 01:21:44 --> Query error: ERROR:  la columna «tipo_divulgacion_tv» es de tipo integer pero la expresión es de tipo boolean
LINE 1: ...= FALSE, "canal" = FALSE, "tipo_divulgacion_tv" = FALSE, "ho...
                                                             ^
HINT:  Necesitará reescribir la expresión o aplicarle una conversión de tipo. - Invalid query: UPDATE "tb_divulgacion_tv" SET "nombre_programa" = FALSE, "canal" = FALSE, "tipo_divulgacion_tv" = FALSE, "hora_emision" = '2015-02-18 01:21:44'
WHERE "id_divulgacion_tv" = '6'
