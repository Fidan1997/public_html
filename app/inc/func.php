<?
include $_SERVER['DOCUMENT_ROOT'].'/checkphp.php';
function show_last_news($num){
	global $lang;
	if($num){
		$sql = mysql_query("select * from `news` where `location` != 'media' order by `dt` desc, `id` desc limit ".$num.",1");
	}else{
		$sql = mysql_query("select * from `news` where `location` != 'media' order by `dt` desc, `id` desc");
	}
	$rw = mysql_fetch_array($sql);
	
	$imgfile = substr($rw['img'], 1); 
	 if(file_exists($imgfile)){
		 	
			$img = $rw['img'];
		 
		 }else{
			 
			$img = '/assets/images/news_def.png';
			 
			 }
	 $full_body = $rw['news_txt'];
	 preg_match('/<p>(.*?)<\/p>/i', $full_body, $paragraphs); 
	 $small_body = '<p>'.strip_tags($paragraphs[0]).'</p>';
	echo '<div class="lastnews" onClick="top.location.href=\'/'.$lang.'/newsread/'.$rw['id'].'/\'">
                	<img src="'.$img.'" alt="'.$rw['news_hdr'].'">
                    <span class="color date">'.date('d/m/Y', strtotime($rw['dt'])).'</span>
                    <a href="/'.$lang.'/newsread/'.$rw['id'].'/">'.$rw['news_hdr'].'</a>
					
                                <div class="fade">'.$small_body.'<div class="fadeout"></div></div>
                </div>';
}
 
function show_news($num, $img){
	
	
	global $lang;
	$sql = mysql_query("select * from `news`  where `location` != 'media' order by `dt` desc, `id` desc limit ".$num.",1");
	//echo "select * from `news` order by `dt` desc limit ".$num.",1";
	$rw = mysql_fetch_array($sql);
	
	 $full_body = $rw['news_txt'];
	 preg_match('/<p>(.*?)<\/p>/i', $full_body, $paragraphs); 
     $small_body = strip_tags($paragraphs[0]);
	
	if($img == '1'){
		$imgfile = substr($rw['img'], 1); 
	 if(file_exists($imgfile)){
		 	
			$img = $rw['img'];
		 
		 }else{
			 
			$img = '/assets/images/news_def.png';
			 
			 }
		echo '<div class="newsalone" onClick="top.location.href=\'/'.$lang.'/newsread/'.$rw['id'].'/\'">
		
                            	<a href="/'.$lang.'/newsread/'.$rw['id'].'/"><img src="'.$img.'"></a>
                                <a href="/'.$lang.'/newsread/'.$rw['id'].'/">'.$rw['news_hdr'].'</a>
                                <span class="date">'.date('d/m/Y', strtotime($rw['dt'])).'</span>
                                <div class="fade">
                               '.$small_body.'...<div class="fadeout"></div>
                                </div>
                            </div>';
		
	}else{
		echo '<div class="newsalone" onClick="top.location.href=\'/'.$lang.'/newsread/'.$rw['id'].'/\'">
		
                                <a href="/'.$lang.'/newsread/'.$rw['id'].'/">'.$rw['news_hdr'].'</a>
                                <span class="date">'.date('d/m/Y', strtotime($rw['dt'])).'</span>
                                <div class="fade">
                               '.$small_body.'...<div class="fadeout"></div>
                                </div>
                            </div>';
	}
	
	
		
	}
	
function show_news_list($nid,$v){
	if(empty($v)) {
		$v = '1';	
	}
	global $lang;
	$sql = mysql_query("select * from `news` where `id` = '".intval($nid)."'"); 
	$rw = mysql_fetch_array($sql);
	$imgfile = substr($rw['img'], 1); 
	 $full_body = $rw['news_txt'];
	 preg_match('/<p>(.*?)<\/p>/i', $full_body, $paragraphs); 
     $small_body = strip_tags($paragraphs[0]);
	if(strlen($rw['extralink']) != 0){
			$href = $rw['extralink'];
			$target = '_blank';
		}else{
			$href = '/'.$lang.'/newsread/'.$rw['id'].'/';
			$target = '_self';
			}
	 if(file_exists($imgfile)){
		 	
			$img = $rw['img'];
		 
		 }else{
			 
			$img = '/assets/images/news_def.png';
			 
			 }
			 
			$btl =  '<div class="newsalone_list">';
		$btl .= '<div class="nimg"><img src="'.$img.'" alt="'.str_replace('"','',$rw['news_hdr']).'" ></div>';
		if($v == '1'){
		}else{}
				$btl .= '<div class="nbody">
                            	<a href="'.$href.'" target="'.$target.'">'.$rw['news_hdr'].'</a>
                                <span class="date">'.date('d/m/Y', strtotime($rw['dt'])).'</span>
                                <div class="fade">
                               '.$small_body.'...<div class="fadeout2"></div>
                                </div></div>
		
                            </div>';
				
			return $btl;
	}
function error_404($sect){
	header("HTTP/1.0 404 Not Found");
	$section = $sect;
	include_once("app/tmpl/az/404.php");
	exit();

	}

function insert_news($location){
	
	$query = "select * from `news` where `location` = '".mysql_real_escape_string($location)."' order by `dt` desc, `id` desc";
	 
	$sql = mysql_query($query) or die(mysql_error()); 
	 
	while($nrw = mysql_fetch_array($sql)){
			
			$bodytmpl = $bodytmpl.show_news_list($nrw['id'], 1);
				
		}
	$body = $bodytmpl;
	return $body;
} 

?>