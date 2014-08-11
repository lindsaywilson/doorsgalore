
<?php
if($block->module == 'block'){
	switch($block->delta){
		case 3: case 4: case 5: case 6: case 7:
			$classes .= ' door-specs';
		break;
	}
}
?>

<div id="<?php print $block_html_id; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <?php print render($title_prefix); ?>
  <?php if ($title): ?>
    <h2<?php print $title_attributes; ?>><?php print $title; ?></h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
  <div class="block-content clearfix">
  
  <?php print $content; ?>
  
  <?php
  if($block->module == 'block'){
  	switch($block->delta){
		case 3:
			include 'include/include--door-configurations.php';
		break;
		case 4:
			include 'include/include--door-styles.php';
		break;
		case 5:
			include 'include/include--door-colours.php';
		break;
		case 6:
			include 'include/include--door-materials.php';
		break;
		case 7:
			include 'include/include--door-hardware.php';
		break;
	}
  }
  ?>
  
  </div>

</div>
