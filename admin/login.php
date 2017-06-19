<?
function doHackPrevent($reason){
		// here you can do some action for hacking prevent / for ex - mail('adminMail','mida hack',$reason);
}

include 'db.php';

$sqlatt = mysql_query("select `att`,`ip` from `login` where `id` = '1'");
if((!$sqlatt) || (mysql_num_rows($sqlatt) == '0')){
	echo 'please IMPORT correct DB from SQL file';
	exit;
}else{
	$rwatt = mysql_fetch_array($sqlatt);
}

$userip = $_SERVER['REMOTE_ADDR'];

//check attempts;
if($rwatt['att'] == '5'){
	$msg = '';
}elseif($rwatt['att'] == '0'){
	doHackPrevent('No attempts, IP:'.$userip);
	exit;
}else{
	$msg = 'You have '.$rwatt['att'].' attempts';
}

// check ips
if($rwatt['ip'] != 'all'){
	$ips = explode(',',$ip);
	if(!in_array($userip, $ips)){
		doHackPrevent('wrong IP:'.$userip);
		exit;
	}
}

if($_POST['dologin'] == '1'){
	$login = trim(htmlspecialchars($_POST['login']));
	$pass = trim(htmlspecialchars($_POST['pass']));
	
	$passmd5 = md5($pass);
	
	$sqlLogin = mysql_query("select * from `login` where `login` = '".mysql_real_escape_string($login)."' and `pass` = '".mysql_real_escape_string($passmd5)."' and `id` = '1'");
	if(mysql_num_rows($sqlLogin) == '0'){
		$att = intval($rwatt['att']);
		$att--;
		mysql_query("update `login` set `att` = '".$att."' where `id` = '1'");
		$msg = $msg.'<br>error pass or login';
	}else{
		$_SESSION['start'] = '1';
		mysql_query("update `login` set `att` = '5' where `id` = '1'");
		$_SESSION['token'] = md5(uniqid(mt_rand)); 
		header("Location: index.php?token=".$_SESSION['token']."");
		exit;
	}
}
?><!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>please login</title>
</head>

<body>
<form id="form1" name="form1" method="post">
  <p>
    <input type="text" name="login" id="login">
    <label for="pass"><br>
    </label>
    <input type="password" name="pass" id="pass">
  </p>
  <p>
    <input name="dologin" type="hidden" id="dologin" value="1">
    <input type="submit" name="submit" id="submit" value="Submit">
    <p><?=$msg?></p>
  </p>
</form>
</body>
</html>
