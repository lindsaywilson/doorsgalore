<?php
/**
 * @file
 * Returns the HTML for a node.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728164
 */ 
 //dpm($node);
?>
<article class="node-<?php print $node->nid; ?> <?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <?php 
  	include 'include/include--node-edit.php';
	
	foreach($node->field_images['und'] as $img){
		$thumb = image_style_url('gallery-thumb', $img['uri']);
		$full = file_create_url($img['uri']);
		$title = $img['title'];
		print '<a class="grid grid-third" href="'.$full.'" title="'.$title.'"><img src="'.$thumb.'" /></a>';
	}
	
  ?>


</article>
