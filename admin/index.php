<? session_start();

include 'header.php';

if($_POST['addpage'] == '1'){
		
		$pageheader = trim($_POST['pageheader']);
		$body = trim($_POST['body']);
		$lang = trim($_POST['lang']);
		$section = trim($_POST['section']);
		$file = trim($_POST['file']);
		$site = 'mida';
		
		
		$query = "INSERT INTO `stat` (
`id` ,
`section` ,
`lang` ,
`linkname` ,
`href` ,
`pageheader` ,
`body` ,
`dt` ,
`includefile` ,
`site`,
`onmenu`
)
VALUES (
NULL , '".mysql_real_escape_string($section)."', '".mysql_real_escape_string($lang)."', '".mysql_real_escape_string($pageheader)."', '".mysql_real_escape_string($file)."', '".mysql_real_escape_string($pageheader)."', '".mysql_real_escape_string($body)."', NOW( ) , '', '".mysql_real_escape_string($site)."','0'
);";
	
	if(mysql_query($query)){
		header("Location: editpage.php?id=".mysql_insert_id()."&token=".$_SESSION['token']);
	}else{
		mysql_error();
		}
	
	}


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
        <td width="25%" height="31" style="background:#F2F2F2 !important"><a href="index.php?token=<?=$_SESSION['token'];?>">Yeni səhifə əlavə et</a></td>
        <td width="25%"><a href="pages_list.php?token=<?=$_SESSION['token'];?>">Səhifələr siyahı</a></td>
        <td width="25%"><a href="addnews.php?token=<?=$_SESSION['token'];?>">Yeni həbər əlavə et</a></td>
        <td width="25%"><a href="news_list.php?token=<?=$_SESSION['token'];?>">Həbərlər siyahı</a></td>
      </tr>
      <tr>
        <td colspan="4">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="4"><h1>Yeni səhifə əlavə et</h1></td>
      </tr>
      <tr>
        <td>başlıq
        <br>          <input type="text" name="pageheader" id="pageheader" style="font-size:120%; background:rgba(218,218,218,1.00);"></td>
        <td>dil (az - en - ru ) <br>
        <input type="text" name="lang" id="lang"></td>
        <td>section <br>
        <input type="text" name="section" id="section"></td>
        <td>page <br>
        <input type="text" name="file" id="file"></td>
      </tr>
      <tr>
        <td colspan="4"><textarea name="body" id="body" class="moxiecut"></textarea></td>
      </tr>
      <tr>
        <td><input type="submit" name="submit" id="submit" value="Submit" style="background:rgba(212,0,3,1.00); color:rgba(255,255,255,1.00); font-size:120%;">
        <input name="addpage" type="hidden" id="addpage" value="1">
        <input name="token" type="hidden" id="token" value="<?=$_SESSION['token'];?>"></td>
        <td>&nbsp;</td> 
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