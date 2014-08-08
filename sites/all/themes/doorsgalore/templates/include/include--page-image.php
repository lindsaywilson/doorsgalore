

<?php
	if( isset($node) && $node->type == 'page' && isset($node->field_image['und'][0]['uri'])):
		$url = image_style_url('page-image', $node->field_image['und'][0]['uri']);
		print '<div id="page-image"><img src="'.$url.'" /></div>';
	endif;
?>