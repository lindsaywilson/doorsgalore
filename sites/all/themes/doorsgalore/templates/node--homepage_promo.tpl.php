<?php
/**
 * @file
 * Returns the HTML for a node.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728164
 */ 
 //dpm($node);
 
 if(isset($node->field_link['und'])) $url = $node->field_link['und'][0]['url'];
 
?>
<article class="node-<?php print $node->nid; ?> <?php print $classes; ?> clearfix"<?php print $attributes; ?> >
<?php include 'include/include--node-edit.php'; ?>
	
    
    <div class="text">
		<?php  
		print '<h2>';
			if(isset($url)) print '<a href="'.$url.'">';
			print $title; 
			if(isset($url)) print '</a>';
		print '</h2>';
		?>
		<?php
		print render($content['body']);
		if(isset($node->field_link['und']) && $node->field_link['und'][0]['title'] != $node->field_link['und'][0]['url']) print render($content['field_link']);
		?>
    </div>
    
    <?php
		if(isset($url)) print '<a href="'.$url.'">';
			print render($content['field_image']);
		if(isset($url)) print '</a>';
		
		if(isset($node->field_price['und'])) doorsgalore_price_label($node->field_price['und'][0]['value'],'Installed From');
		if(isset($node->field_price['und'])) doorsgalore_price_footnote();
	?>


</article>
