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
<article class="node-<?php print $node->nid; ?> <?php print $classes; ?> node-door clearfix"<?php print $attributes; ?>>

  <?php 
  	include 'include/include--node-edit.php';
    print render($content['field_image']);
	print '<h2>'.$title.'</h2>';
	print render($content);
  ?>


</article>
