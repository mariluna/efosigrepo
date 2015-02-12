<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2015-02-12 00:52:24 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-12 14:14:10 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-12 14:14:18 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
ERROR - 2015-02-12 14:26:02 --> Severity: Warning --> pg_query() [<a href='function.pg-query'>function.pg-query</a>]: Query failed: ERROR:  update o delete en «tb_curso» viola la llave foránea «tb_divulgacion_id_curso_fkey» en la tabla «tb_divulgacion»
DETAIL:  La llave (id_curso)=(27) todavía es referida desde la tabla «tb_divulgacion». C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-12 14:26:02 --> Query error: ERROR:  update o delete en «tb_curso» viola la llave foránea «tb_divulgacion_id_curso_fkey» en la tabla «tb_divulgacion»
DETAIL:  La llave (id_curso)=(27) todavía es referida desde la tabla «tb_divulgacion». - Invalid query: DELETE FROM "tb_curso"
WHERE "id_curso" = '27'
ERROR - 2015-02-12 14:29:43 --> Could not find the language line "create_user_validation_cargo_label"
ERROR - 2015-02-12 14:29:43 --> Could not find the language line "create_user_validation_persona_label"
ERROR - 2015-02-12 14:29:44 --> Could not find the language line "create_user_validation_pregunta_label"
ERROR - 2015-02-12 14:29:44 --> Could not find the language line "create_user_validation_respuesta_label"
ERROR - 2015-02-12 14:32:05 --> Could not find the language line "create_user_validation_cargo_label"
ERROR - 2015-02-12 14:32:05 --> Could not find the language line "create_user_validation_persona_label"
ERROR - 2015-02-12 14:32:05 --> Could not find the language line "create_user_validation_pregunta_label"
ERROR - 2015-02-12 14:32:05 --> Could not find the language line "create_user_validation_respuesta_label"
ERROR - 2015-02-12 14:32:14 --> Could not find the language line "create_user_validation_pregunta_label"
ERROR - 2015-02-12 14:32:14 --> Could not find the language line "create_user_validation_respuesta_label"
ERROR - 2015-02-12 14:33:32 --> 404 Page Not Found: api/Contribuyente_api/vere
ERROR - 2015-02-12 14:33:33 --> Severity: Warning --> pg_query() [<a href='function.pg-query'>function.pg-query</a>]: Query failed: ERROR:  no existe la columna «nombre_radio» en la relación «tb_divulgacion»
LINE 1: ...cha_prensa&quot;, &quot;hora_radio&quot;, &quot;hora_tv&quot;, &quot;id_curso&quot;, &quot;nombre_ra...
                                                             ^ C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-12 14:33:33 --> Query error: ERROR:  no existe la columna «nombre_radio» en la relación «tb_divulgacion»
LINE 1: ...cha_prensa", "hora_radio", "hora_tv", "id_curso", "nombre_ra...
                                                             ^ - Invalid query: INSERT INTO "tb_divulgacion" ("canal", "dial", "emisora", "fecha_actual", "fecha_prensa", "hora_radio", "hora_tv", "id_curso", "nombre_radio", "nombre_tv", "prensa", "tipo_divulgacion_prensa", "tipo_divulgacion_radio", "tipo_divulgacion_tv") VALUES ('8hkjh','','','2015-02-12','','','09:09:09','28',NULL,'hbjkgjkg','','','','0')
ERROR - 2015-02-12 14:35:20 --> Severity: Notice --> Undefined variable: id C:\wamp\www\efosig\application\views\divulgaciones\editar.php 9
ERROR - 2015-02-12 14:35:20 --> Severity: Notice --> Undefined variable: nombre C:\wamp\www\efosig\application\views\divulgaciones\editar.php 12
ERROR - 2015-02-12 14:35:20 --> Severity: Notice --> Undefined variable: nombre C:\wamp\www\efosig\application\views\divulgaciones\editar.php 12
ERROR - 2015-02-12 14:35:20 --> Severity: Notice --> Undefined variable: abrev C:\wamp\www\efosig\application\views\divulgaciones\editar.php 20
ERROR - 2015-02-12 14:35:20 --> Severity: Notice --> Undefined variable: abrev C:\wamp\www\efosig\application\views\divulgaciones\editar.php 20
ERROR - 2015-02-12 14:35:20 --> Severity: Notice --> Undefined variable: observaciones C:\wamp\www\efosig\application\views\divulgaciones\editar.php 66
ERROR - 2015-02-12 14:37:25 --> Severity: Parsing Error --> parse error C:\wamp\www\efosig\application\views\informe\editar.php 470
ERROR - 2015-02-12 14:42:57 --> Severity: Warning --> pg_query() [<a href='function.pg-query'>function.pg-query</a>]: Query failed: ERROR:  llave duplicada viola restricción de unicidad «tb_informe_pkey»
DETAIL:  Ya existe la llave (id_informe)=(1). C:\wamp\www\efosig\system\database\drivers\postgre\postgre_driver.php 236
ERROR - 2015-02-12 14:42:57 --> Query error: ERROR:  llave duplicada viola restricción de unicidad «tb_informe_pkey»
DETAIL:  Ya existe la llave (id_informe)=(1). - Invalid query: INSERT INTO "tb_informe" ("id_redi", "id_estado", "id_municipio", "id_parroquia", "id_usuario", "id_curso", "tipo_actividad_for", "act_nombre_for", "tot_asistentes_for", "tot_femeninos_for", "tot_masculinos_for", "tot_div_sexual_for", "tot_mujeres_indigenas_for", "tot_mujeres_discapacidad_for", "tot_mujeres_afrodecendientes_for", "tot_movimientos_mujeres_for", "nombre_movimiento_for", "fec_inicio_for", "hora_inicio_for", "fec_final_for", "hora_final_for", "tipo_actividad_div", "act_nombre_div", "tot_asistentes_div", "tot_femeninos_div", "tot_masculinos_div", "tot_div_sexual_div", "tot_mujeres_indigenas_div", "tot_mujeres_discapacidad_div", "tot_mujeres_afrodecendientes_div", "tipo_material_div", "cantidad_div", "convocacion_medios_div", "medios_radio_div", "medios_prensa_div", "medios_tv_div", "medios_comunitarios_div", "medios_otros_div", "fecha_creacion") VALUES ('1', '7', '85', '273', '1', '27', 'Encuentro', 'bhmghj', '54', '56', '54', '0', '0', '0', '0', '0', 'gyug', '13-02-2015', '19:06:25', '03-02-2015', '19:06:25', 'Toma comunitaria', 'hjhgj', '65', '6', '66', '0', '0', '0', '0', 'Diptricos', '76', 'No', FALSE, FALSE, FALSE, FALSE, FALSE, '2015-02-12')
ERROR - 2015-02-12 14:47:09 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\efosig\application\views\header.php 102
