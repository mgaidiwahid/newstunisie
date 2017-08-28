<?php

/**
 * @file
 * Default theme implementation to display a node.
 */
global $base_root;
$style = 'blog'; //image style
if($node->field_image){
$imageone = $node->field_image['und'][0]['uri']; 
}else{
$imageone = '';
}
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> single_post mbf clearfix"<?php print $attributes; ?>>
	<?php
		if(!$page){
	?>
	<h3 class="single_title"><i class="icon-document-edit mi"></i><a href="<?php print $node_url; ?>" title="<?php print $title; ?>"><?php print $title; ?></a></h3>
	<?php }?>
	
	<div class="meta mb"> <?php  if ($display_submitted):?>by <?php print $node->name?> / <?php endif;?><?php print format_date($node->created, 'custom', 'M d, Y');?>    / <a href=""><?php print $comment_count?> comments</a></div>
	<?php print theme('image', array('path' => $imageone, 'attributes'=>array('class'=>'mbt', 'style'=>'margin:0 auto')));?>
	<?php
		hide($content['comments']); 
		hide($content['links']); 
		hide($content['field_tags']); 
		hide($content['field_image']); 
		hide($content['field_categories']); 
		
		print render($content);
	?>
	<footer class="entry-footer">
		<div class="entry-meta"><span class="entry-tags"><?php print render($content['field_tags']);?></span></div>
	</footer>
</div>
<?php
if($page){
	$nids = db_query("SELECT n.nid FROM {node} n WHERE n.status = 1 AND n.type = :type AND n.nid <> :nid ORDER BY RAND() LIMIT 0,4", array(':type' => 'blog', ':nid' => $node->nid))->fetchCol();
	$nodes = node_load_multiple($nids);
	if (!empty($nodes)): 
?>
	<div class="related_posts mbf clearfix related_posts_detail">
		<div class="title">
			<h4><?php print t('Related Posts');?></h4>
			<a href="#" class="feed toptip" title="More Posts"><i class="icon-forward"></i></a>
		</div>
	
		<div class="carousel_related">
			<?php foreach ($nodes as $node) : ?>
			<?php $field_image = field_get_items('node', $node, 'field_image'); ?>
			<div class="item float-shadow"><a href="<?php print url('node/' . $node->nid);?>"><?php print theme('image_style', array('style_name' => 'blog', 'path' => $field_image[0]['uri'])); ?></a></div>
			<?php
				endforeach;
			?>
		</div>
	</div>
<?php
	endif;
}
?>

<?php print render($content['comments']); ?>