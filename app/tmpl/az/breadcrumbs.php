<?
if($section == 'news'){
	?>
    <div class="breadcrumbs">
                	<ul>
                    	<li><a href="/az/">Ana səhifə</a></li>
                    	<li>Xəbərlər</li> 
 						                       
                    </ul>
                </div>
    <?
	}elseif($section == 'newsread'){
	?>
    <div class="breadcrumbs">
                	<ul>
                    	<li><a href="/az/">Ana səhifə</a></li>
                    	<li>Xəbərlər</li>
                    	<li><?=$nrw['news_hdr']?></li>
 						                       
                    </ul>
                </div>
    <?
	}else{
		
$sqlbc = mysql_query("select * from `breadc` where `section` = '".$section."'");
$bcs = mysql_fetch_array($sqlbc);
	if(isset($bcs['linkname']) && ($bcs['linkname'] != '')){
?>
<div class="breadcrumbs">
                	<ul>
                    	<li><a href="/az/">Ana səhifə</a></li>
                    	<li><?=$bcs['linkname']?></li>
                    	<li><?=$rw['pageheader']?></li>
 						                       
                    </ul>
                </div>
<?		
	}else{
?>
<div class="breadcrumbs">
                	<ul>
                    	<li><a href="/az/">Ana səhifə</a></li> 
                    	<li><?=$rw['pageheader']?></li>
 						                       
                    </ul>
                </div>
<?		
	}

		}
?>
