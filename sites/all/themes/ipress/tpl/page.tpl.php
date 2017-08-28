<?php
	//Tracking code
	$layout_settings = theme_get_setting('layout_settings', 'ipress');
	
	if(empty($layout_settings) || !$layout_settings)
		$layout = 'boxed';
	$layout = $layout_settings;
?>
<div id="layout" class="<?php print $layout;?>">
		<?php include_once('header.tpl.php');?>
		<!-- /header -->

		<div class="page-content">
			<div class="row clearfix">
				<div class="grid_9 alpha">
					<?php
						if ($page['top_news']):
					?>
					<div class="ipress_slider mbf">
						<div class="slider_a owl-carouseltheme">
							
							<div class="item clearfix">
							
							<?php 
								print render($page['top_news']);
							?>
							</div><!-- /slide -->

							<!-- /slide -->

						</div><!-- /slider -->
					</div>
							
					<?php
						endif;
					?>
					

					<div class="grid_8 alpha posts">
						<?php
							if ($breadcrumb):
								print $breadcrumb;
							endif; 
							if(drupal_get_title())
								print '<div class="title colordefault" style="clear: both;"><h4>'.drupal_get_title().'</h4></div>';
							if ($page['content'] || isset($messages)):
							if(drupal_is_front_page()) {
								unset($page['content']['system_main']['default_message']);
							}
							if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):
								print render($tabs);
							endif;
							
							print $messages;
							print render($page['content']); 
						endif; 
						
						?>
	
	
					</div><!-- end grid9 -->
					<div class="grid_4 omega sidebar sidebar_b">
					<?php
						if ($page['sidebar_first']):
							print render($page['sidebar_first']);
						endif;
					?>
					
					</div><!-- end grid9 -->
				</div><!-- end grid9 -->

				<div class="grid_3 omega sidebar sidebar_a">
					<?php
						if ($page['sidebar_second']):
							print render($page['sidebar_second']);
						endif;
					?>
					
					
				</div><!-- /grid3 sidebar A -->
			</div><!-- /row -->
		</div><!-- /end page content -->

		<?php
			include_once('footer.tpl.php');
		?><!-- /footer -->

</div>