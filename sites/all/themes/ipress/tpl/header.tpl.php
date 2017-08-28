<header id="header">
	<div class="a_head">
		<div class="row clearfix">
			
			<?php
				if ($page['left_bar']):
			?>
			<div class="breaking_news lefter">
				<div class="freq_out">
					<div class="freq">
						<div class="inner_f"></div>
						<div id="layerBall"></div>
					</div>
				</div>
				<?php
					print render($page['left_bar']);
				?>
			</div>
			<?php
				endif;
			?>
			<!-- /breaking news -->
			<div class="right_bar">
				<?php
					if ($page['right_bar']):
						print render($page['right_bar']);
					endif;
				?>
				<!-- /social -->
				<span id="date_time"></span>
				<!-- /date -->
			</div>
			<!-- /right bar -->
		</div>
		<!-- /row -->
	</div>
	<!-- /a head -->
	<div class="b_head">
		<div class="row clearfix">
			<div class="logo">
				<?php
					if($logo){
				?>
				<a href="<?php print check_url($front_page); ?>" title="<?php print $site_name; ?>"><img src="<?php print $logo; ?>" alt="<?php print $site_name; ?>" /></a>
				<?php }?>
				<?php if ($site_slogan){ ?>
				<div id="site-slogan"><?php print $site_slogan; ?></div>
				<?php } ?>
			</div>
			<!-- /logo -->
			<?php
				if ($page['ads_banner_right']):
					print '<div class="ads">';
						print render($page['ads_banner_right']);
					print '</div>';
				endif;
			?>
			
			<!-- /ads -->
		</div>
		<!-- /row -->
	</div>
	<!-- /b head -->
	<div class="row clearfix">
		<div class="sticky_true">
			<div class="c_head clearfix">
				<nav>
					<?php 
						if ($page['main_menu']): 
							//$menu_name = variable_get('menu_main_links_source', 'main-menu'); 
							//$tree = menu_tree($menu_name); 
							print render($page['main_menu']);
							//print drupal_render($tree, array('links' => $main_menu, 'attributes' => array('id' => 'secondary-menu', 'class' => array('links', 'inline', 'clearfix', 'sf-menu sf-js-enabled sf-shadow')))); 
						endif;
					?>
				</nav>
				<!-- /nav -->
				<div class="right_icons">
					<!-- /random post -->
					<div class="search">
						<div class="search_icon"><i class="fa-search"></i></div>
						<div class="s_form">
							<?php
								if ($page['search_form']):
									print render($page['search_form']);
								endif;
							?>
							
						</div>
						<!-- /s form -->
					</div>
					<!-- /search -->
				</div>
				<!-- /right icons -->
			</div>
			<!-- /c head -->
		</div>
		<!-- /sticky -->
	</div>
	<!-- /row -->
</header>