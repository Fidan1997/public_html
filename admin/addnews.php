<? session_start();

include 'header.php';

$getid = intval($_GET['id']);

if($_GET['del'] == '1'){
		mysql_query("delete from `news` where `id` = '".$getid."'");
		header("Location: news_list.php?token=".$_SESSION['token']);
	}

if($_POST['addnews'] == '1'){
		
		$news_hdr = trim($_POST['pageheader']);
		$news_txt = trim($_POST['body']);
		$location = trim($_POST['location']);
		$img = trim($_POST['img']);
		$extralink = trim($_POST['extralink']);
		$dt = trim($_POST['dt']);
		$id = $getid;
		
		$query = "
		
		INSERT INTO `news` (
`id` ,
`news_hdr` ,
`news_txt` ,
`dt` ,
`img` ,
`location` ,
`extralink`
)
VALUES (
NULL , '".mysql_real_escape_string($news_hdr)."', '".mysql_real_escape_string($news_txt)."', '".mysql_real_escape_string($dt)."' , '".mysql_real_escape_string($img)."', '".mysql_real_escape_string($location)."', '".mysql_real_escape_string($extralink)."'
);
		
		";
		
		
	
	if(mysql_query($query)){
		$ok = '1';
		header("Location: editnews.php?id=".mysql_insert_id().'&token='.$_SESSION['token']);
	}else{
		echo mysql_error();
		}
	
	}

$sel = mysql_query("select * from `news` where `id` = '".$getid."'");
$rw = mysql_fetch_array($sel);



?><!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>admin panel</title><script type="text/javascript" src="tinymce/all.min.js"></script>
        <link type="text/css" rel="stylesheet" href="tinymce/all.min.css" /> 
<script type="text/javascript" src="tinymce/tinymce.js"></script>
<script type="text/javascript">
tinymce.PluginManager.load('moxiecut', '/admin/tinymce/plugins/moxiecut/plugin.min.js');
tinymce.init({
    selector: ".moxiecut",
    theme: "modern",
    plugins: [
	    "advlist autolink lists link image charmap print preview anchor",
		"searchreplace visualblocks code fullscreen",
		"insertdatetime media table contextmenu paste moxiecut"
	],
	toolbar: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link insertfile image media",
	autosave_ask_before_unload: true,
    height: 500,
    relative_urls: true,
	document_base_url: '//jquery.com/',
	content_css: 'http://mida.az/assets/css/mida_a.css'
});
tinymce.init({
    selector: ".moxiecutsm",
    theme: "modern", 
	toolbar: "undo redo bold italic | alignleft aligncenter alignright alignjustify",
	autosave_ask_before_unload: true,
    height: 100,
    relative_urls: true,
	document_base_url: '//jquery.com/',
	content_css: 'http://mida.az/assets/css/mida_a.css'
});
</script>
<style>
	html,body{width:100%; height:100%; padding:0px; margin:0px; font-family:Helvetica, Arial, sans-serif, Tahoma; }
	a{color:rgba(4,0,0,1.00); font-size:90%; text-decoration:none;}
	input{border:none; border-radius:6px; padding:6px;}
	
</style>
</head>

<body>
<form id="form1" name="form1" method="post">
  <table style="width:90%; max-width:1200px;" align="center" border="0" cellspacing="0" cellpadding="6">
    <tbody>
      <tr>
        <td height="31" colspan="4" bgcolor="#A9A9A9" style="text-align: center">Mənzil İnşaatı Dövlət Agentliyi <span style="font-size: 80%"><a href="?logout=1">(logout)</a></span></td>
      </tr>
      <tr>
        <td width="25%" height="31"><a href="index.php?token=<?=$_SESSION['token'];?>">Yeni səhifə əlavə et</a></td>
        <td width="25%"><a href="pages_list.php?token=<?=$_SESSION['token'];?>">Səhifələr siyahı</a></td>
        <td width="25%"  style="background:#F2F2F2 !important"><a href="addnews.php?token=<?=$_SESSION['token'];?>">Yeni həbər əlavə et</a></td>
        <td width="25%"><a href="news_list.php?token=<?=$_SESSION['token'];?>">Həbərlər siyahı</a></td>
      </tr>
      <tr>
        <td colspan="4">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="4"><h1>Yeni həbər əlavə et</h1></td>
      </tr>
      <tr>
        <td colspan="2">başlıq
          <br>          <input type="text" name="pageheader" id="pageheader" style="font-size:120%; background:rgba(218,218,218,1.00); width:80%;"></td>
        <td><label for="extralink">news image:</label>
          <br>
<input name="img" type="text" id="dt3" placeholder="place image url"></td>
        <td>bolmə <br>
          <select name="location" id="location">
          	<option selected value="our">Bizim xəbərlər</option>
          	<option value="media">Agentlik mediada</option>
          	<option value="interview">Çıxışlar və müsahibələr</option> 
          	<option value="ann">Elanlar</option> 
        </select></td>
      </tr>
      <tr>
        <td colspan="4"><textarea name="body" id="body" class="moxiecut"></textarea></td>
      </tr>
      <tr>
        <td><input type="submit" name="submit" id="submit" value="Submit" style="background:rgba(212,0,3,1.00); color:rgba(255,255,255,1.00); font-size:120%;">
        <input name="addnews" type="hidden" id="addnews" value="1">
        <input name="token" type="hidden" id="token" value="<?=$_SESSION['token'];?>"></td>
        <td><label for="dt4">Extra link:</label>
          <br>
        <input name="extralink" type="text" id="dt4" placeholder="http://" value=""></td>
        <td><label for="dt">Date:</label>
          <br>
<input name="dt" type="text" id="dt" value="<?=date("Y-m-d");?>"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="4">&nbsp;</td>
      </tr>
    </tbody>
  </table>
</form>
</body>
</html>
