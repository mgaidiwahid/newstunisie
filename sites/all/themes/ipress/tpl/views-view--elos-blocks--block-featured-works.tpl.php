
  <?php print render($title_prefix); ?>
<?php if ($header): ?>
      <?php print $header; ?>
  <?php endif; ?>
<?php if ($rows): ?>

<div id="grid-container" class="cbp-l-grid-fullScreen cbp-caption-zoom">

      <?php print $rows; ?>
	  </div>
  <?php endif; ?>