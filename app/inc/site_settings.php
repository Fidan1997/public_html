<?
include $_SERVER['DOCUMENT_ROOT'].'/checkphp.php';


$midaurl = 'http://mida.az'; //ex mida.az
$agencyurl = 'http://mida.gov.az'; //ex mida.gov.az

$midamail = 'office@mida.az'; // ex office@mida.az
$agencymail = 'office@mida.gov.az'; // ex office@mida.gov.az

// db access settings

$db_server = '';
$db_login = '';
$db_pass = '';
$db_name = '';



// language settings

switch ($lang) {
    case 'az':
        $lang = 'az';
		break;
    case 'ru':
        $lang = 'ru';
		break;
    case 'en':
        $lang = 'en';
		break;
    default:
        $lang = 'az'; // az = azeri language, ru = russian language, en = english language
}
?>