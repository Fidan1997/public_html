<?
include $_SERVER['DOCUMENT_ROOT'].'/checkphp.php';
include $_SERVER['DOCUMENT_ROOT'].'/app/tmpl/az/menu.class.php';
?><div class="menu">
            	<ul class="menulist">
                	<li class="main_menu_item"><a href="#">HAQQIMIZDA </a>
                    	<ul class="submenu color2 <?
                    if($section == 'about'){
							echo 'opened';
						}
					?>">
                        	<?
							$menu = new menu;
							$menu->DrawMenu('about');
							?> 
                        </ul>
                    </li>
                    <li class="main_menu_item"><a href="#">Layihələr</a>
                    <ul class="submenu color2 <?
                    if($section == 'projects'){
							echo 'opened';
						}
					?>">
                        	<?
							$menu = new menu;
							$menu->DrawMenu('projects');
							?> 
                         </ul>
                    </li>
                    <li class="main_menu_item"><a href="#">Xəbərlər və media</a><ul class="submenu color2 <?
                    if(($section == 'news') || ($section == 'newsread')){
							echo 'opened';
						}
					?>">
                        	<li><a href="/az/news/our/">Bizim xəbərlər</a></li>
                        	<li><a href="/az/news/interview/">Çıxışlar və müsahibələr</a></li> 
                        	<li><a href="/az/news/media/">Bizdən yazanlar</a></li>
                        	<li><a href="/az/news/announcement/">Elanlar</a></li>
                        	<li><a href="/az/gallery/video/">Video qalereya</a></li> </ul></li>
                        	<li class="main_menu_item"><a href="#">HESABATLAR</a><ul class="submenu color2 <?
                    if($section == 'report'){
							echo 'opened';
						}
					?>">
                        	 <?
							$menu = new menu;
							$menu->DrawMenu('report');
							?> 
                        </ul></li>
                    <li class="main_menu_item"><a href="#">Qanunvericilik</a>
                    <ul class="submenu color2 <?
                    if($section == 'legislation'){
							echo 'opened';
						}
					?>">
                        	 <?
							$menu = new menu;
							$menu->DrawMenu('legislation');
							?> 
                        </ul></li>
                      <li class="main_menu_item"><a href="#">Bizimlə əlaqə</a>
                    <ul class="submenu color2 <?
                    if($section == 'contacts'){
							echo 'opened';
						}
					?>">
                        	 <?
							$menu = new menu;
							$menu->DrawMenu('contacts');
							?> 
                        </ul></li>
                </ul>
            </div>