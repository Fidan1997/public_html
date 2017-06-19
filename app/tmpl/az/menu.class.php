<?
class menu{
	public function DrawMenu($section_name){
		$sql = mysql_query("select * from `stat` where `section` = '".$section_name."' and `lang` = 'az' and `onmenu` = '1' order by `linkname` asc") or die(mysql_error());
		while($rw = mysql_fetch_array($sql)){
			$link_ex = explode('#',$rw['linkname']);
			if(isset($link_ex[1])){
				$lnk = $link_ex[1];
			}else{
				$lnk = $link_ex[0]; 
			}
			$link = '/'.$rw['lang'].'/'.$rw['section'].'/'.$rw['href'].'/';
			echo '<li><a href="'.$link.'">'.$lnk.' </a></li>';
		}
	}
}
?>


