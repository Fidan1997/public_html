<? session_start();


include 'header.php';

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
	document_base_url: '//jquery.com/'
});
tinymce.init({
    selector: ".moxiecutsm",
    theme: "modern", 
	toolbar: "undo redo bold italic | alignleft aligncenter alignright alignjustify",
	autosave_ask_before_unload: true,
    height: 100,
    relative_urls: true,
	document_base_url: '//jquery.com/'
});
</script>
<style>
	html,body{width:100%; height:100%; padding:0px; margin:0px; font-family:Helvetica, Arial, sans-serif, Tahoma; }
	a{color:rgba(4,0,0,1.00); font-size:90%; text-decoration:none;}
	input{border:none; border-radius:6px; padding:6px;}
	.linkd{background:rgba(0,0,0,0.05); padding:10px; margin-bottom:2px; word-wrap: break-word;}
	.linkd:hover{background:rgba(0,0,0,0.1); padding:10px;}
	.link{display:inline-block; width:400px;}
.link1 {display:inline-block; width:400px;}
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
        <td width="25%"><a href="addnews.php?token=<?=$_SESSION['token'];?>">Yeni həbər əlavə et</a></td>
        <td width="25%"  style="background:#F2F2F2 !important"><a href="news_list.php?token=<?=$_SESSION['token'];?>">Həbərlər siyahı</a></td>
      </tr>
      <tr>
        <td colspan="4">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="4"><h1>Həbərlər</h1></td>
      </tr>
      <tr>
        <td width="25%"><strong>Bizim həbərlər</strong></td>
        <td width="25%"><strong>Bizdən Yazırlar</strong></td>
        <td width="25%"><strong>Çıxışlar</strong></td>
        <td width="25%"><strong>Elanlar</strong></td>
      </tr>
      <tr>
        <td valign="top">  <?
				$sql = mysql_query("select * from `news` where `location` = 'our' order by `dt` desc");
				
				while($rw = mysql_fetch_array($sql)){
					
					?>
                    <div class="linkd">
                    <a class="link" href="editnews.php?id=<?=$rw['id']?>&token=<?=$_SESSION['token'];?>"><?=$rw['news_hdr'];?></a></div>
                    <?
					
					}
				
				
				
				?></td>
        <td valign="top"> <?
				$sql = mysql_query("select * from `news` where `location` = 'media' order by `dt` desc");
				
				while($rw = mysql_fetch_array($sql)){
					
					?>
                    <div class="linkd">
                    <a class="link" href="editnews.php?id=<?=$rw['id']?>&token=<?=$_SESSION['token'];?>"><?=$rw['news_hdr'];?></a></div>
        <?
					
					}
				
				
				
				?></td>
        <td valign="top"> <?
				$sql = mysql_query("select * from `news` where `location` = 'interview' order by `dt` desc");
				
				while($rw = mysql_fetch_array($sql)){
					
					?>
                    <div class="linkd">
                    <a class="link" href="editnews.php?id=<?=$rw['id']?>&token=<?=$_SESSION['token'];?>"><?=$rw['news_hdr'];?></a></div>
        <?
					
					}
				
				
				
				?></td>
        <td valign="top"><?
				$sql = mysql_query("select * from `news` where `location` = 'ann' order by `dt` desc");
				
				while($rw = mysql_fetch_array($sql)){
					
					?>
          <div class="linkd"> <a class="link1" href="editnews.php?id=<?=$rw['id']?>&token=<?=$_SESSION['token'];?>">
            <?=$rw['news_hdr'];?>
          </a></div>
        <?
					
					}
				
				
				
				?></td>
      </tr>
      <tr>
        <td colspan="4">&nbsp;</td>
      </tr>
    </tbody>
  </table>
</form>
</body>
</html>