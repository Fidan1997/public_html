<?

error_reporting(0);

if((isset($_GET['logout'])) && ($_GET['logout'] == '1')){
	unset($_SESSION['start']);
	unset($_SESSION['token']);
	session_destroy();
	header("Location: /admin/");
	exit;
}
if(empty($_SESSION['start'])){
		include 'login.php';
		exit;
	}
$tk = $_REQUEST['token'];
if($tk != $_SESSION['token']){
	unset($_SESSION['start']);
	unset($_SESSION['token']);
	session_destroy();
	header("Location: /");
	exit;
	
}else{
	include 'db.php';
}
?>