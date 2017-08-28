<?php
	$col_setting = theme_get_setting('footer_columns', 'ipress');
	if($col_setting==3){
		$col = 'grid_4';
	}else{
		$col = 'grid_3';
	}
?>
<footer id="footer">
	<div class="row clearfix">
		<?php
			if($page["footer_col_one"]):
		?>
		<div class="<?php echo $col;?>">
			<?php
				print render($page["footer_col_one"]);
			?>
		</div>
		<?php
			endif;
		?>
		
		<?php
			if($page["footer_col_two"]):
		?>
		<div class="<?php echo $col;?>">
			<?php
				print render($page["footer_col_two"]);
			?>
		</div>
		<?php
			endif;
		?>
		<?php
			if($page["footer_col_three"]):
		?>
		<div class="<?php echo $col;?>">
			<?php
				print render($page["footer_col_three"]);
			?>
		</div>
		<?php
			endif;
		?>
		<?php
			if($col_setting==4){
				if($page["footer_col_four"]):
			?>
			<div class="<?php echo $col;?>">
				<?php
					print render($page["footer_col_four"]);
				?>
			</div>
			<?php
				endif;
			}
		?>
	</div>
	<!-- /row -->
	<div class="row clearfix">
		<div class="footer_last"><span class="copyright"><?php print theme_get_setting('footer_copyright_message', 'ipress'); ?></span>
			<div id="toTop" class="toptip" title="Back to Top"><i class="icon-arrow-thin-up"></i></div>
		</div>
		<!-- /last footer -->
	</div>
	<!-- /row -->
</footer>