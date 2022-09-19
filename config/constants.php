<?php

#REGION SETTING
if (!defined('TIMEZONE')) define('TIMEZONE','America/Lima');

#CURRENCIES
if (!defined('CURRENCY_DOLLAR')) define('CURRENCY_DOLLAR','USD');
if (!defined('CURRENCY_SOLES')) define('CURRENCY_SOLES','PEN');
if (!defined('TYPE_CURRENCY')) define('TYPE_CURRENCY',[
	CURRENCY_DOLLAR => ['name'=>'Dolar','symbol'=>'$','value'=>'USD'],
	CURRENCY_SOLES => ['name'=>'Soles','symbol'=>'S/','value'=>'PEN']
]);

#STATUS LOGIC
if (!defined('STATUS_OK')) define('STATUS_OK', 2);
if (!defined('STATUS_FAIL')) define('STATUS_FAIL', 1);
if (!defined('WS_STATUS_FAIL')) define('WS_STATUS_FAIL', 0);
if (!defined('WS_STATUS_OK')) define('WS_STATUS_OK', 99);
if (!defined('DB_TRUE')) define('DB_TRUE', 1);
if (!defined('DB_FALSE')) define('DB_FALSE', 0);

#REGISTER'S STATES
if (!defined('ST_DELETE')) define('ST_DELETE', -1);
if (!defined('ST_DEFAULT')) define('ST_DEFAULT', 0);
if (!defined('ST_NEW')) define('ST_NEW', 1);
if (!defined('ST_ACTIVE')) define('ST_ACTIVE', 2);
if (!defined('ST_INACTIVE')) define('ST_INACTIVE', 3);
if (!defined('ST_APPROVE')) define('ST_APPROVE',4);
if (!defined('ST_REPROBATE')) define('ST_REPROBATE',5);

#DATE AND TIME'S FORMATS
if (!defined('FORMAT_DATETIME_DATABASE')) define('FORMAT_DATETIME_DATABASE','Y-m-d H:i:s');
if (!defined('FORMAT_DATE_DATABASE')) define('FORMAT_DATE_DATABASE','Y-m-d');
if (!defined('FORMAT_TIME_DATABASE')) define('FORMAT_TIME_DATABASE','H:i:s');

#TYPE PERSONAL DOCUMENTS
if (!defined('DNI')) define('DNI','dni');
if (!defined('IMMIGRATION')) define('IMMIGRATION','immigration');
if (!defined('PASSPORT')) define('PASSPORT','passport');
if (!defined('FOREIGN')) define('FOREIGN','foreign');
if (!defined('IMMIGRATION_TEMPORAL')) define('IMMIGRATION_TEMPORAL','immigration_temporal');
if (!defined('TYPE_DOCUMENT')) define('TYPE_DOCUMENT',[
	DNI => 'Documento nacional de identidad',
	IMMIGRATION => 'Carnet de extranjeria',
    IMMIGRATION_TEMPORAL => 'Permiso Temporal de Permanencia',
	PASSPORT => 'Pasaporte',
	FOREIGN => 'Documento de identidad extranjero'
]);
if (!defined('TYPE_DOCUMENT_ABBREVIATION')) define('TYPE_DOCUMENT_ABBREVIATION',[
	DNI => 'D.N.I',
	IMMIGRATION => 'C.E',
	PASSPORT => 'P',
	FOREIGN => 'DIE'
]);
