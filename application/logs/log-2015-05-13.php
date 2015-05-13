<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2015-05-13 00:10:45 --> Severity: Warning --> fsockopen() [<a href='function.fsockopen'>function.fsockopen</a>]: unable to connect to ssl://smtp.gmail.com:465 (Unable to find the socket transport &quot;ssl&quot; - did you forget to enable it when you configured PHP?) C:\wamp\www\efosig\system\libraries\Email.php 1932
ERROR - 2015-05-13 00:11:39 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 124
ERROR - 2015-05-13 00:11:39 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 162
ERROR - 2015-05-13 00:12:25 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 124
ERROR - 2015-05-13 00:12:25 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 162
ERROR - 2015-05-13 00:14:50 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 124
ERROR - 2015-05-13 00:14:50 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 162
ERROR - 2015-05-13 00:14:56 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 124
ERROR - 2015-05-13 00:14:56 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 162
ERROR - 2015-05-13 00:30:19 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 124
ERROR - 2015-05-13 00:30:19 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 162
ERROR - 2015-05-13 00:31:36 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 124
ERROR - 2015-05-13 00:31:36 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 162
ERROR - 2015-05-13 00:31:40 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 124
ERROR - 2015-05-13 00:31:40 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 162
ERROR - 2015-05-13 00:33:39 --> Severity: Warning --> fsockopen() [<a href='function.fsockopen'>function.fsockopen</a>]: unable to connect to ssl://smtp.gmail.com:465 (Unable to find the socket transport &quot;ssl&quot; - did you forget to enable it when you configured PHP?) C:\wamp\www\efosig\system\libraries\Email.php 1932
ERROR - 2015-05-13 00:33:40 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 124
ERROR - 2015-05-13 00:33:40 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 162
ERROR - 2015-05-13 00:36:25 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 124
ERROR - 2015-05-13 00:36:25 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 162
ERROR - 2015-05-13 00:36:29 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 124
ERROR - 2015-05-13 00:36:29 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 162
ERROR - 2015-05-13 00:37:53 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 124
ERROR - 2015-05-13 00:37:54 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 162
ERROR - 2015-05-13 00:39:56 --> Severity: Warning --> pg_query() [<a href='function.pg-query'>function.pg-query</a>]: Query failed: ERROR:  la columna «edad» es de tipo integer pero la expresión es de tipo boolean
LINE 1: ...ula&quot; = '19575638', &quot;nacionalidad&quot; = 'V', &quot;edad&quot; = FALSE, &quot;se...
                                                             ^
HINT:  Necesitará reescribir la expresión o aplicarle una conversión de tipo. C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-05-13 00:39:56 --> Query error: ERROR:  la columna «edad» es de tipo integer pero la expresión es de tipo boolean
LINE 1: ...ula" = '19575638', "nacionalidad" = 'V', "edad" = FALSE, "se...
                                                             ^
HINT:  Necesitará reescribir la expresión o aplicarle una conversión de tipo. - Invalid query: UPDATE "tb_persona" SET "id_redi" = '2', "id_estado" = '22', "id_municipio" = '410', "id_parroquia" = '995', "direccion" = 'Las minas', "nombre_apellido" = 'Eduardo Salas', "cedula" = '19575638', "nacionalidad" = 'V', "edad" = FALSE, "sexo" = 'F', "fecha_nacimiento" = '08-07-1992', "num_hijos" = '0', "etnia" = 'No', "domina_idioma" = '', "discapacidad" = 'No', "estado_civil" = 'Soltera(o)', "tel_local" = '02122344345', "tel_celular" = '04123232142', "email" = 'mchina@gmail.com', "nivel_instruccion" = 'Sin instruccion', "estudia_act" = 'No', "nombre_inst" = '', "grado" = '', "tipo_inst" = '', "estudia_mision" = 'No', "gustaria_estudiar" = 'No', "participa_org_mujeres" = 'No', "anios_militancia" = 0, "responsabilidad" = '', "participa_part_politico" = 'No', "anios_militancia_pp" = 0, "responsabilidad_pp" = '', "concejo_comunal" = 'No', "voceria_cc" = 'No', "comuna_cc" = 'No', "status" = 'General'
WHERE "id_persona" = '50'
ERROR - 2015-05-13 01:05:29 --> Severity: Warning --> pg_query() [<a href='function.pg-query'>function.pg-query</a>]: Query failed: ERROR:  el operador no existe: character varying &lt;&gt; integer
LINE 1: ...estado FROM tb_persona WHERE id_persona = 1 and status &lt;&gt; 0 
                                                                  ^
HINT:  Ningún operador coincide con el nombre y el tipo de los argumentos. Puede ser necesario agregar conversiones explícitas de tipos. C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-05-13 01:05:29 --> Query error: ERROR:  el operador no existe: character varying <> integer
LINE 1: ...estado FROM tb_persona WHERE id_persona = 1 and status <> 0 
                                                                  ^
HINT:  Ningún operador coincide con el nombre y el tipo de los argumentos. Puede ser necesario agregar conversiones explícitas de tipos. - Invalid query: SELECT id_estado FROM tb_persona WHERE id_persona = 1 and status <> 0 
ERROR - 2015-05-13 01:06:08 --> Severity: Warning --> pg_query() [<a href='function.pg-query'>function.pg-query</a>]: Query failed: ERROR:  el operador no existe: character varying &lt;&gt; integer
LINE 1: ...estado FROM tb_persona WHERE id_persona = 1 and status != 0 
                                                                  ^
HINT:  Ningún operador coincide con el nombre y el tipo de los argumentos. Puede ser necesario agregar conversiones explícitas de tipos. C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-05-13 01:06:08 --> Query error: ERROR:  el operador no existe: character varying <> integer
LINE 1: ...estado FROM tb_persona WHERE id_persona = 1 and status != 0 
                                                                  ^
HINT:  Ningún operador coincide con el nombre y el tipo de los argumentos. Puede ser necesario agregar conversiones explícitas de tipos. - Invalid query: SELECT id_estado FROM tb_persona WHERE id_persona = 1 and status != 0 
ERROR - 2015-05-13 01:16:52 --> Severity: Warning --> pg_query() [<a href='function.pg-query'>function.pg-query</a>]: Query failed: ERROR:  no existe la relación «status»
LINE 1: UPDATE &quot;status&quot; SET &quot;INACTIVO&quot; = ''
               ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-05-13 01:16:52 --> Query error: ERROR:  no existe la relación «status»
LINE 1: UPDATE "status" SET "INACTIVO" = ''
               ^ - Invalid query: UPDATE "status" SET "INACTIVO" = ''
WHERE "id_persona" = '39'
ERROR - 2015-05-13 01:19:54 --> Severity: Warning --> pg_query() [<a href='function.pg-query'>function.pg-query</a>]: Query failed: ERROR:  no existe la relación «status»
LINE 1: UPDATE &quot;status&quot; SET &quot;INACTIVO&quot; = ''
               ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-05-13 01:19:54 --> Query error: ERROR:  no existe la relación «status»
LINE 1: UPDATE "status" SET "INACTIVO" = ''
               ^ - Invalid query: UPDATE "status" SET "INACTIVO" = ''
WHERE "id_persona" = '39'
