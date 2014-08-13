<?php
/**
 * @file
 * Returns the HTML for a node.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728164
 */ 
 //dpm($node);
 
 $img_url = image_style_url('homepage-banner', $node->field_image['und'][0]['uri']);
 
?>
<article class="node-<?php print $node->nid; ?> <?php print $classes; ?> clearfix"<?php print $attributes; ?> style="background-image:url(<?php print $img_url ?>)">
<?php include 'include/include--node-edit.php'; ?>

    <div class="text">
		<?php  print '<h2>'.$title.'</h2>'; ?>
        <div class="inner">
			<?php
            if(isset($node->body['und'])) print '<div class="inline-list">'.$node->body['und'][0]['value'].'</div>';
            if(isset($content['field_link'])) print render($content['field_link']);
            if(isset($node->field_price['und'])) doorsgalore_price_label($node->field_price['und'][0]['value'],'From');
            ?>
        </div>
	</div>


</article>
