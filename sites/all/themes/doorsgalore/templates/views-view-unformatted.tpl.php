<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<div class="clearfix">
<?php if (!empty($title)): ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>
<div class="rows">

<?php
// Get interior door price
if($view->name == 'interior_doors' && $view->current_display == 'block'){
	$term = taxonomy_get_term_by_name($title);
	foreach( $term as &$tid){
		if(isset($tid->field_price['und'])) $price = $tid->field_price['und'][0]['value'];
	}
}
?>

<?php foreach ($rows as $id => $row): ?>
  <div<?php if ($classes_array[$id]) { print ' class="clearfix ' . $classes_array[$id] .'"';  } ?>>
  
    <?php 
		// Interior door price
		if($view->name == 'interior_doors' && $view->current_display == 'block' && isset($price)) print '<div class="price-label">Installed for: <span>$'.$price.'</span></div>';
	?>
    
    <?php print $row;  ?>
    
  </div>
<?php endforeach; ?>
</div>
</div>