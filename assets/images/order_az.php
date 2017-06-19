<?  session_start();
 


if(!$_SESSION['basket']){
		$_SESSION['basket'] = array();
	}else{
		
		}
		function price($gid){
	
		$sql = mysql_query("select * from `goods` where `id` = '".$gid."' limit 0,1");
		$rw = mysql_fetch_array($sql);
		return $rw['price'];
	}
		function iname($gid){
	
		$sql = mysql_query("select * from `goods` where `id` = '".$gid."' limit 0,1");
		$rw = mysql_fetch_array($sql);
		return $rw['name'];
	}
	foreach($_SESSION['basket'] as $item){
			$price = $price + price($item);
		}
	
	$cart_price = number_format($price, 2, '.', ' ');
	$cart_num = count($_SESSION['basket']);

$pagetitle = "Səbətim";


	if($_POST['ss'] == '1'){
			$name = trim(htmlspecialchars($_POST['name']));
			$num = trim(htmlspecialchars($_POST['num']));
			$where = trim(htmlspecialchars($_POST['where']));
			$ip = $_SERVER['REMOTE_ADDR'];
			$list = '';
			foreach($_SESSION['basket'] as $item){
$list = $list.iname($item).'
';
				}
			$msg = '
			
Пользователь ("'.$name.'","'.$num.'","'.$where.'") с айпи ('.$ip.') заказал '.$cart_num.' товаров на сумму '.$cart_price.'


Список заказанных товаров
---
'.$list.'
---

Время заказа
'.date("Y-m-d H:i:s");	
	
	
		if(mail('entonee@gmail.com, order@slimeal.az','order from SLIMEAL', $msg)){
				unset($_SESSION['basket']);
				header("Location: /index.php?az&msg=1");
			}else{
				//
				}
		
			
	}

?><!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>SliMeal</title>

<link rel="stylesheet" type="text/css" href="css/component.css" /> 
		<script src="js/modernizr.custom.25376.js"></script>


<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700&subset=latin,latin-ext,cyrillic-ext,greek-ext,vietnamese' rel='stylesheet' type='text/css'>
<link href="inside.css" rel="stylesheet" type="text/css">
<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js' type='text/javascript'></script>
 
 
<!--  fancy  -->
    <script type="text/javascript" src="f/jquery.fancybox.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="f/jquery.fancybox.css?v=2.1.5" media="screen" />
    
    <script>
		$(document).ready(function(e) {
            $('.fancybox').fancybox();
        });
	</script>
	<style>
		.circle{ width:150px; height:150px; margin:5px; border:1px solid #FDF9F9; border-radius:50%;}
		.ann{font-size:11px !important; color:#FFFFFF; display:block; margin-top:10px;}
		label{font-size:12px; opacity:0.6; display:block; margin-top:20px; margin-bottom:5px;}
		input{padding:10px; border:none; color:#070000; font-size:18px;}
	</style>

</head>

<body>
<body><div id="perspective" class="perspective effect-airbnb">
			<div class="container">
				<div class="wrapper">
<div class="page">

	<div class="logobox">
    	
        <div class="open_menu" id="showMenu">
         
        
        </div>
        <div class="open_shop" onClick="top.location.href='?az/shop'"></div>
        <div class="logoimage" onClick="top.location.href='?az'"></div>
        <a style="display:none;" href="form.php" rel="fancy" class="fancybox"><div class="order_btn"></div></a>
    	
    </div>
    <div class="top_menu hide">
    
    		<ul>
                	<li <? if($page == 'about'){echo ' class="sel"';}?>><a href="?az/about">Haqqımızda</a></li>
                    <li <? if($page == 'howitsworks'){echo ' class="sel"';}?>><a href="?az/howitsworks">Necə işləyir</a></li>
                    <li <? if($page == 'menu'){echo ' class="sel"';}?>><a href="?az/menu">Menyularımız</a></li>
                    <li <? if($page == 'shop'){echo ' class="sel"';}?>><a href="?az/shop">Onlayn Satış</a></li>
                    <li <? if($page == 'discussions'){echo ' class="sel"';}?>><a href="?az/info">Məsləhətlər</a></li>
                    <li <? if($page == 'contacts'){echo ' class="sel"';}?>><a href="?az/contacts">Əlaqə</a></li>
                </ul>
    
    </div>
    <div class="breadcrumbs">
    
    				<? 
                    echo $pagetitle;
					?>
    	
    </div>
	 <div class="main_page2">
    <div class="custom_scroll">
    	
       <div class="order" <? if(empty($_SESSION['basket'])){
		 	echo ' style="display:none;"';  	
		   }?>> Səbətinizdəki sifarişlərin sayı - <?=$cart_num?> , məbləğ - <?=$cart_price;?> AZN
        <br><br>
        <?
        foreach($_SESSION['basket'] as $item){
			
				$sql = mysql_query("select * from `goods` where `id` = '".$item."'");
				$rw = mysql_fetch_array($sql);
				
				
				
			?>
       		<a href="?az/shop/<?=$rw['cid']?>/<?=$item?>"><img src="i/goods/<?=$rw['cid']?>/<?=$item?>.jpg" class="circle"></a>
            <?
		}
		?>
        <br><br>
        <form method="post">
        
        	<p>
        	  <label for="name">Adınız</label>
        	  <input required type="text" name="name" id="name">
        	  <input name="ss" type="hidden" id="ss" value="1">
        	  <br>
        	  <label for="textfield2">Telefon nömrəsi</label>
        	  <input required type="tel" name="num" id="num">
        	  <br>
        	  <label for="textarea">Ünvan</label>
        	  <textarea required name="where" id="where"></textarea>
        	  </p>
        	<p>
        	  <input type="submit" name="submit" id="submit" value="Qöndər">
        	  <br>
              <div class="ann">Bütün xanalar doldurulmalıdır. Maksimal dəqiq məlumat daxil edin (ünvan və telefon)</div>
      	  </p>
        </form>
        </div>
        
    </div>
    </div>
	<div class="right_side hide">
    <?
        $sqls = mysql_query("select * from `goods` order by RAND() limit 0,1");
		$rwsf = mysql_fetch_array($sqls);
		?>
    	<div class="banners" style="background:url(i/bg.png) no-repeat, url(i/goods/<?=$rwsf['cid']?>/<?=$rwsf['id']?>.jpg); background-position:center center; cursor:pointer;" onClick="top.location.href='?az/shop/<?=$rwsf['cid']?>/<?=$rwsf['id']?>'">
        
        <?
		echo '<br><br><br><br><br>';
		echo '<h5>'.$rwsf['name_az'].'</h5>';
		echo "<br>";
		echo $rwsf['price']." AZN";
		echo "<br>";
		echo $rwsf['ccal']." ccal";
		?>
        </div>
        <div class="categories">
        	<ul>	
            	<?
                	$sql = mysql_query("select * from `stats` where `href` = '".$href."'") or die(mysql_error());
					while($rwr = mysql_fetch_array($sql)){
						if(isset($pid)){
							if($rwr['id'] == $pid){
								$act = ' class = "active" ';
							}else{
								$act = ' ';
								}
							}else{
							 
								}
						?>
                  			<li><a <?=$act?> href="?az/<?=$rwr['href']?>/<?=$rwr['id']?>"><?=$rwr['title_az']?></a></li>      
                        <?
						}
				?>
                
            </ul>
        </div>
    
    </div>
    
    <div class="entonee">
    	&copy; 2015 Slimeal.Bütün hüquqlar qorunur.
    </div>
    

    
    
    

</div></div><!-- wrapper -->
			</div><!-- /container -->
			<nav class="outer-nav left vertical">
				<a href="?az/about">О Нас</a>
				<a href="?az/howitsworks">Как работает Slimeal</a>
				<a href="?az/menu">Наши меню</a>
				<a href="?az/shop">Онлайн магазин</a>
				<a href="?az/info">Рекомендации</a>
				<a href="?az/contacts">Наши контакты</a> 
			</nav>
		</div>
		<script src="js/classie.js"></script>
		<script src="js/menu.js"></script>
</body>
</html>
