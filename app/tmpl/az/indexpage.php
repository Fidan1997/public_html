<!doctype html>
<html lang="az">
<head>

<meta charset="UTF-8">

<link href="/assets/css/agency.css" rel="stylesheet" type="text/css">
<link href="/assets/css/mida.css" rel="stylesheet" type="text/css">
<link href="/assets/css/media.css" rel="stylesheet" type="text/css">
<link href="/assets/css/banner.css" rel="stylesheet" type="text/css">
<link href="/assets/css/flickerplate.css"  type="text/css" rel="stylesheet">

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

<meta name="viewport" content="width=device-width, initial-scale=0.9, maximum-scale=0.9, user-scalable=0"> 
<title>MIDA</title>
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
        	
        	<div class="logo">
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
            <? include 'app/tmpl/az/main_menu.php'?>
        </div><div class="centerside">
        <div class="mbannerplace">
        <div class="mbanner">
		
		<ul>
			<?
			$sql = mysql_query("select * from `stat` where `section` = 'mybanners' and `lang` = 'ba'") or die(mysql_error());
			while($bn = mysql_fetch_array($sql)){
				$bd = strip_tags($bn['body'],'<br>');
				$bd2 = explode('-', $bd);
				foreach($bd2 as $li){
					$li = str_replace(array("\n", "\t", "\r"), '', $li);
					$line = explode('<br />', $li);
					echo "<li style=\"cursor:pointer\" data-background=\"".$line[0]."\" onClick=\"top.location.href='".$line[2]."'\">
				<div class=\"flick-title\">".$line[1]."</div>
				</li>";
				}
			}
			?> 
			
		</ul>
		
	</div>
        </div>
            <div class="socialline">
            	<div class="social">
                	<ul><li><a class="facebook"  href="https://www.facebook.com/MenzilInshaatiDovletAgentliyi/" target="_blank">facebook</a></li>
                    	<li><a class="instagram" href="https://www.instagram.com/mida.az/?hl=ru" target="_blank">instagram</a></li>
                    	<li><a class="youtube" href="https://www.youtube.com/channel/UC3xOGx3unafEd79Oe_VFpog" target="_blank">youtube</a></li>
                    </ul>
                </div>
               <div class="mailing">	
           		 <form id="mailing" name="mailing" method="post">
                 	<input type="email" id="email" placeholder="xəbərlərə abunə" title="enter your email">
       		     </form>
               </div>
            </div>
            
            <div class="toro_icons">
				<a href="/az/rules/"><div class="t_icon icon4"><span>GÜZƏŞTLİ MƏNZİLİ<br>KİM ALA BİLƏR?</span></div></a>  
            	<a href="/az/rules/2/"><div class="t_icon icon6"><span>TƏLƏB OLUNAN<br>SƏNƏDLƏR</span></div></a> 
				<a href="/az/e-system/" class="a_icon_big"><div class="t_icon_big icon7"><span></span></div></a> 
                <a href="/az/projects/progress/"><div class="t_icon icon3"><span>LAYİHƏLƏRİMİZ</span></div></a>    
            	<a href="/az/contacts/faq/"><div class="t_icon icon2"><span>SUALLARINIZIN<br>CAVABLARI</span></div></a>
            	<!--<a href="/az/contacts/adress/"><div class="t_icon icon5"><span>BİZİMLƏ<br>ƏLAQƏ</span></div></a>-->

            </div>
            
            <div class="newssection">
            	<?=show_last_news(0);?><div class="mobnews"><br><br>
            	<?=show_last_news(1);?><br><br>
            	<?=show_last_news(2);?><br><br>
							<a class="alllink" href="/az/news/"><span class="color">bütün xəbərlər</span></a>
               	</div><div class="othernews">
                	<div class="scrollarea">
                    	<div class="nsec1">
                        	<?=show_news(1,0);?>
                        	<?=show_news(2,0);?>
                        </div>
                        <div class="scrolltonext">
                        	
                            <a href="/az/news/"><div id="arrow-right"></div><span class="color">bütün xəbərlər</span></a>
                            
                        </div>
                        <div class="nsec2">
                        	
                        	<?=show_news(3,0);?>
                        	<?=show_news(4,0);?>
                        </div><div class="nsec3">
                        	
                        	<?=show_news(5,0);?>
                        	<?=show_news(6,0);?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="onetwothree" style="display:none;">
            	<div class="step">
                	Xəritədə evinizi tapın
					və mənzilinizi seçin
                    <span>1</span>
                </div>
            	<div class="step">
                	Evinizin qiymətini oyrənib aylıq ödənişi hesablayın
                    <span>2</span>
                </div>
            	<div class="step">
                	Lazım olan sənədləri doldurub mənzilə sahib olun
                    <span>3</span>
                </div>
            </div>
            <div class="littlebanners">
            		
                    <ul>
               <li><a class="lb_1" href="http://president.az" target="_blank">Azərbaycan Respublikasının Prezidenti</a></li>
               <li><a class="lb_3" href="http://www.mehriban-aliyeva.az" target="_blank">Mehriban Əliyeva</a></li>
               <li class="desc"><a class="lb_2" href="http://www.cabmin.gov.az" target="_blank">Nazirlər Kabineti</a></li>
               <li class="desc"><a class="lb_4" href="http://heydar-aliyev-foundation.org/az" target="_blank">Heydər Əliyev Fondu</a></li>
               <li class="desc"><a class="lb_5" href="http://www.azerbaijan.az" target="_blank">Azərbaycan</a></li>
               <li class="desc"><a class="lb_6" href="http://www.virtualkarabakh.com/" target="_blank">Virtual Qarabağ</a></li>
               <li class="desc"><a class="lb_7" href="http://www.justiceforkhojaly.org/" target="_blank">Xocalıya Ədalət</a></li>
               <li class="desc"><a class="lb_8" href="http://www.amf.az/az" target="_blank">İpoteka Fondu</a></li>
               <li class="desc"><a class="lb_9" href="http://iqtisadiislahat.org/" target="_blank">İqtisadi İslahatların təhlili və kommunikasiya mərkəzi</a></li>
               <li class="desc"><a class="lb_10" href="http://www.asan.gov.az/" target="_blank">ASAN xidmət</a></li>
                    </ul>
                
            </div>
        </div>
        <div class="bottomarea">
        Azərbaycan Respublikasının Prezidenti yanında Mənzil İnşaatı Dövlət Agentliyinin tabeliyində “MİDA” Məhdud Məsuliyyətli Cəmiyyəti<br>
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

</body>
</html>
