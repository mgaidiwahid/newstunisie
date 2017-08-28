<?php
$flickr_id = $settings['widget_flickr_id'];
$flickr_photos_count = $settings['widget_flickr_photo_count'];
?>
<div class="flickr" id="widget-flickr">
	<ul id="basicuse" class="flickr-feed">
		
	</ul>
</div>


<script language="javascript">
jQuery(document).ready(function(){
	/*----------------------------------------------------*/
	/*	Flickr Feed
	/*----------------------------------------------------*/
	jQuery('#widget-flickr ul#basicuse').jflickrfeed({
		limit: <?php print $flickr_photos_count; ?>,
		qstrings: {
			id: '<?php print $flickr_id; ?>'
		},
		itemTemplate: '<li><a data-rel="prettyPhoto" title="{{title}}" href="{{image}}"><img src="{{image_s}}" alt="{{title}}"></a></li>'
	});
});
</script>