<? session_start();

//powered by entonee

define('midaload',TRUE);
error_reporting(0);

$url = $_SERVER['REQUEST_URI'];
$url = trim(strip_tags($url));

$page = substr($url,0,110);

$pg_all = explode('?', $page);
$pg = explode('/',$pg_all[0]);

$lang = $pg[1];
$section = $pg[2];
$file = $pg[3];
$param = $pg[4]; 

$pg = array_splice($pg, 0, 5);  
$pg = array_filter($pg);

$page = '/'.implode('/',$pg).'/'; 

$vowels = array("'", "onmouseover", "onclick", "mouse", "prompt", "alert");
$page = str_replace($vowels, "", $page);
$loadpage = substr($page, 3); 
 

include 'app/inc/site_settings.php';
include 'app/inc/db.php';
include 'app/inc/func.php';
 
if((empty($lang)) || ($lang == '')){
		header("Location: /".$lang.'/');
	}else{
	
	if(empty($section)){
			$inc = 'app/tmpl/'.$lang.'/indexpage.php';
		}else{
			$inc = 'app/tmpl/'.$lang.'/inside.php';
		}
	
	include $inc;
}

	
?>