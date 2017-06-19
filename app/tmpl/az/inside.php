<? session_start();
if(isset($_COOKIE['mailsent']) && $_COOKIE['mailsent'] == true){
					$ffffff_no = '1';
					$echo_text = 'Ərizəniz qəbul olundu. "MİDA" MMC-yə müraciət etdiyiniz üçün təşəkkür edirik!'; 
 }elseif($_POST['s'] == '1'){
	// проверяем капчу
	  
	$recaptcha=$_POST['g-recaptcha-response'];
    if(!empty($recaptcha)){ 
        $google_url="https://www.google.com/recaptcha/api/siteverify";
        $secret='6LdfQQwUAAAAAMiq3vCv0gSrHpbvEtpX39PHnunM';
        $ip=$_SERVER['REMOTE_ADDR'];
        $url=$google_url."?secret=".$secret."&response=".$recaptcha."&remoteip=".$ip;
	     
        $res=file_get_contents($url); 
        $res= json_decode($res, true);  
		 
        //reCaptcha введена
        if($res['success']){
			 
            foreach($_POST as $name => $value){
				$tomail .= trim(htmlspecialchars($name))." - ".trim(htmlspecialchars($value))."\r\n";
			}
		$tomail .= 'IP:'.$_SERVER['REMOTE_ADDR'];
		
		if( mail($agencymail, 'mail from MIDA.az', ''.$tomail.'')){
			$ffffff_no = '1';
			$echo_text = 'Ərizəniz qəbul olundu. "MİDA" MMC-yə müraciət etdiyiniz üçün təşəkkür edirik!'; 
setcookie("mailsent", '1', time()+1200);
        }else{
		 
            
        }

    }
    else
    {
			 
            $ffffff_no = '1';
			$echo_text = 'reenter captcha'; 
    }  }else{
			  // nothing to show
				
				}
	 

	
	 }

$page = $pageC;
if($section == 'news'){  
switch ($file) {
    case 'our':
        $pageheader = 'Bizim xəbərlər'; 
		$location = 'our';
		break;
    case 'media':
        $pageheader = 'Bizdən yazanlar';
		$location =  'media';
		break;
    case 'interview':
        $pageheader = 'Çıxışlar və müsahibələr';
		$location =  'interview';
		break;
	case 'announcement':
        $pageheader = 'Elanlar';
		$location =  'ann';
		break;
    default:
        $pageheader = 'Bizim xəbərlər'; 
		$location = 'our';
}
 
	$query = "select * from `news` where `location` = '".$location."' order by `dt` desc";
	 
	$sql = mysql_query($query) or die(mysql_error()); 
	 
	$bodytmpl = '';
	if(($location == 'our') || ($location == 'interview') || ($location == 'ann')){
		 $v = '2';
		}else{
			$v = '1';
			} 
	while($nrw = mysql_fetch_array($sql)){
			
			$bodytmpl = $bodytmpl.show_news_list($nrw['id'], $v);
				
		}

	$body = $bodytmpl;

	}elseif($section == 'newsread'){
	$sql = mysql_query("select * from `news` where `id` = '".mysql_real_escape_string($file)."' limit 0,1") or die(mysql_error()); 
	$nrw = mysql_fetch_array($sql);
	
	$pageheader = $nrw['news_hdr'].'<span class="ndate">'.date('d/m/Y', strtotime($nrw['dt'])).'</span>'; 
	$body = $nrw['news_txt'];
	}elseif($section == 'search'){
	
			$pageheader = 'Axtarış'; 
		
	$srch = trim(strip_tags($_GET['srch']));
	
	if(strlen($srch) < 3){
			$body = 'Min 3 symbols';
		}else{
			
			$sql_srch_news = mysql_query("select * from `news` where `news_hdr` LIKE '%".mysql_real_escape_string($srch)."%' or `news_txt` like '%".mysql_real_escape_string($srch)."%'");
			
			$sql_srch_stat = mysql_query("select * from `stat` where `pageheader` LIKE '%".mysql_real_escape_string($srch)."%' or `body` like '%".mysql_real_escape_string($srch)."%' and `site` like '%mida%'");
		
		
			
			if((mysql_num_rows($sql_srch_news) !='0') && (mysql_num_rows($sql_srch_stat) !='0')){
				$bd = '';
				$i = '1';
				while($rw_nw = mysql_fetch_array($sql_srch_news)){
					if(strlen($rw_nw['extralink']) > 3){
						$bd .= $i.') <a href="'.$rw_nw['extralink'].'" target="_blank">'.$rw_nw['news_hdr'].'</a><br>';
					}else{
						$bd .= $i.') <a href="/az/newsread/'.$rw_nw['id'].'">'.$rw_nw['news_hdr'].'</a><br>';
					}
					$i++;
				} 
				while($rw_st = mysql_fetch_array($sql_srch_stat)){
					$bd .= $i.') <a href="/az/'.$rw_st['section'].'/'.$rw_st['href'].'">'.$rw_st['pageheader'].'</a><br>';
					$i++;
				} 

				$body = $bd;
			}else{
				$body = 'məlumat tapılmadı...';
			}
			
		}
	
	}else{
$sql = mysql_query("select * from `stat` where `section` = '".mysql_real_escape_string($section)."' and `lang` = 'az' and `href` = '".mysql_real_escape_string($file)."' and `site` like '%mida%' limit 0,1") or die(mysql_error());
$rw = mysql_fetch_array($sql);
if(strlen($rw['includefile']) != 0){
		$include = '1';
	}else{
		$include = '0';
		}
$body = $rw['body'];
$pageheader = $rw['pageheader'];
	}
if(@mysql_num_rows($sql) == '0'){
	 
		error_404($section); 
		
	}else{ 
	}
?>
<!doctype html>
<html lang="az">
<head>

<meta charset="UTF-8">

<link href="/assets/css/agency.css" rel="stylesheet" type="text/css">
<link href="/assets/css/mida.css" rel="stylesheet" type="text/css">
<link href="/assets/css/media.css" rel="stylesheet" type="text/css">
<link href="/assets/css/banner.css" rel="stylesheet" type="text/css"> 
<link href="/assets/css/fancybox/jquery.fancybox-1.3.4.css" rel="stylesheet" type="text/css">
<link href="/assets/css/mystyle.css" rel="stylesheet" type="text/css">

<meta name="author" content="ILHAM Design (c) 2016">

<link rel="apple-touch-icon" sizes="57x57" href="/assets/images/fi/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/assets/images/fi/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/assets/images/fi/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/assets/images/fi/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/assets/images/fi/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/assets/images/fi/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/assets/images/fi/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/assets/images/fi/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/assets/images/fi/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/assets/images/fi/android-icon-192x192.png">

<link rel="icon" type="image/png" sizes="32x32" href="/assets/images/fi/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/assets/images/fi/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/assets/images/fi/favicon-16x16.png">

<link rel="manifest" href="/assets/images/fi/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/assets/images/fi/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">


<style>
.marker {
    display: block;
    border: none;
    border-radius: 50%;
    cursor: pointer;
    padding: 0;
}
</style>

<meta name="viewport" content="width=device-width"> 
<title><?=$pageheader?> | MIDA</title>

<script src='https://www.google.com/recaptcha/api.js'></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-99826512-2', 'auto');
  ga('send', 'pageview');

</script>
</head>

<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/az_AZ/sdk.js#xfbml=1&version=v2.8&appId=444783852534234";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script>window.twttr = (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0],
    t = window.twttr || {};
  if (d.getElementById(id)) return t;
  js = d.createElement(s);
  js.id = id;
  js.src = "https://platform.twitter.com/widgets.js";
  fjs.parentNode.insertBefore(js, fjs);

  t._e = [];
  t.ready = function(f) {
    t._e.push(f);
  };

  return t;
}(document, "script", "twitter-wjs"));</script>

<div class="page">
	<!-- agency top -->
	<div class="agencytop">
    	<a class="agencylogo" href="<?=$agencyurl?>" target="_blank">
        	Azərbaycan Respublikasının Prezidenti yanında 
			Mənzil İnşaatı Dövlət Agentliyi
        </a>
    </div>
    <!-- agency top //-->
	<div class="mwebsite"><div class="designline1 color"></div>
    	<div class="leftside">
        	
        	<div class="logo" onClick="top.location.href='/'" style="cursor:pointer;">
            	MIDA
            </div>
            <div class="openmenu">
            open menu
            </div>
            <div class="searchplace">
            	<form action="/az/search/" method="get">
            		<input name="srch" type="text" id="srch" style="padding-right:40px; box-sizing:border-box;">
            		<input type="image" style="margin-left:-30px;" alt="click to search" id="search" src="/assets/images/ico/search.png">
           	  </form>
            </div>
            <?
            include 'app/tmpl/az/main_menu.php';
			?>
        </div><div class="centerside">
        		
          <? include 'app/tmpl/az/breadcrumbs.php'?>
          <h2 class="bigheader"><?=$pageheader?></h2>
                <div class="txt <?=$section?>">
                  <?=$body?>
                  <?
                  if($include == '1'){
					  	include $rw['includefile'];
					  }
				
		
			if($section == 'newsread'){
				?>
				<div class="fb-share-button" data-href="http://mida.az/<?=$lang?>/<?=$section?>/<?=$file?>" data-layout="button" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fmida.gov.az%2F<?=$lang?>%2F<?=$section?>%2F<?=$file?>&amp;src=sdkpreparse">Share</a></div>
				<div class="twitter"><a class="twitter-share-button" href="https://twitter.com/intent/tweet">Tweet</a></div>
						 
				<?
			}
		
					?>
               
               
                </div>
             
        </div>
        <div class="bottomarea">
        Azərbaycan Prezidenti yanında Mənzil İnşaatı Dövlət Agentliyi<br>
		<br>
		&copy; 2017
		<a href="https://www.netty.az/" target="_blank"><img border="0" src="https://www.netty.az/img/netty2017.jpg" class="netty"></a>
        <a href="http://entonee.net/" target="_blank" class="entonee"></a>
        </div>
    </div>
</div>  
<script src="/assets/js/jquery-1.10.1.min.js"></script> 
<script src="/assets/js/flickerplate.js"></script>
<script src="/assets/js/mida.js"></script>
<script src="https://api.tiles.mapbox.com/mapbox-gl-js/v0.26.0/mapbox-gl.js" type="text/javascript"></script>
<script src="/assets/js/mapboxcoords.js"></script>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script type="text/javascript" src="/assets/css/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<script>
	
	$(document).ready(function(){
		<?
		if($_GET['goto'] == 'yasamal'){
			?>
		$('.region-selector')
    .val('yasamal')
    .trigger('change');
		<?
		}
		?>
	})
	
	</script>
	<script type="text/javascript">
    $(document).ready(function() {
    $("a#inline").fancybox({
      'hideOnContentClick': true
    });
  });
</script>

</body>
</html>
