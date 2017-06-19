<? session_start();


include 'header.php';

$getid = intval($_GET['id']);

if($_GET['del'] == '1'){
		mysql_query("delete from `stat` where `id` = '".$getid."'") or die(mysql_error());
		header("Location:  pages_list.php?token=".$_SESSION['token']);
	}

if($_POST['edit'] == '1'){
		
		$pageheader = trim($_POST['pageheader']);
		$body = trim($_POST['body']);
		$lang = trim($_POST['lang']);
		$site = 'mida';
		$onmenu = trim($_POST['onmenu']);
		$linkname = trim($_POST['linkname']);
		$id = $getid;
		
		
		$query = "update `stat` set `pageheader` = '".mysql_real_escape_string($pageheader)."', `body` = '".mysql_real_escape_string($body)."', `lang` = '".mysql_real_escape_string($lang)."', `site` = '".mysql_real_escape_string($site)."', `linkname` = '".mysql_real_escape_string($linkname)."', `onmenu` = '".mysql_real_escape_string($onmenu)."' where `id` = '".$getid."'";
	
	if(mysql_query($query)){
		$ok = '1';
	}else{
		echo mysql_error();
		}
	
	}

$sel = mysql_query("select * from `stat` where `id` = '".$getid."'");
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
        <td width="25%"  style="background:#F2F2F2 !important"><a href="pages_list.php?token=<?=$_SESSION['token'];?>">Səhifələr siyahı</a></td>
        <td width="25%"><a href="addnews.php?token=<?=$_SESSION['token'];?>">Yeni həbər əlavə et</a></td>
        <td width="25%"><a href="news_list.php?token=<?=$_SESSION['token'];?>">Həbərlər siyahı</a></td>
      </tr>
      <tr>
        <td colspan="4">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="4"><h1>Səhifəni dəyiş</h1></td>
      </tr>
      <tr>
        <td>başlıq
        <br>          <input type="text" name="pageheader" id="pageheader" style="font-size:120%; background:rgba(218,218,218,1.00);" value="<?=$rw['pageheader']?>"></td>
        <td>Linkin adı  <br>
        <input type="text" name="linkname" id="linkname" value="<?=$rw['linkname'];?>"></td>
        <td colspan="2" nowrap>link <br>
          <input name="lang" type="text" id="lang" value="<?=$rw['lang'];?>" size="10">
          /
          <input name="section" type="text" id="section" value="<?=$rw['section'];?>" size="10" readonly>
          /
        <input name="file2" type="text" id="file2" value="<?=$rw['href'];?>" size="10" readonly>
        &nbsp;&nbsp;<strong><a href="http://mida.az/<?=$rw['lang']?>/<?=$rw['section'];?>/<?=$rw['href'];?>/" target="_blank">view page</a></strong></td>
      </tr>
      <tr>
        <td colspan="4"><textarea name="body" id="body" class="moxiecut"><?=$rw['body']?></textarea></td>
      </tr>
      <tr>
        <td><input type="submit" name="submit" id="submit" value="Submit" style="background:rgba(212,0,3,1.00); color:rgba(255,255,255,1.00); font-size:120%;">
        <input name="edit" type="hidden" id="edit" value="1">
        <input name="token" type="hidden" id="token" value="<?=$_SESSION['token'];?>"></td>
        <td><input name="onmenu" type="checkbox" id="onmenu" value="1" <? if($rw['onmenu']=='1'){ echo 'checked';}?>>
        <label for="onmenu">add to menu? </label></td>
        
        <td style="background:#D60003; color:rgba(255,255,255,1.00);"><br>
        <a href="?del=1&id=<?=$getid?>&token=<?=$_SESSION['token'];?>" style="color:rgba(255,255,255,1.00); padding-left:20px;" onclick="return confirm('are u shure?')">DELETE PAGE</a></td>
      </tr>
      <tr>
        <td colspan="4">&nbsp;</td>
      </tr>
    </tbody>
  </table>
</form>
</body>
</html>
