<?php
/**
 * @file
 * Contains the theme's functions to manipulate Drupal's default markup.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728096
 */


/**
 * Override or insert variables into the maintenance page template.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("maintenance_page" in this case.)
 */
/* -- Delete this line if you want to use this function
function doorsgalore_preprocess_maintenance_page(&$variables, $hook) {
  // When a variable is manipulated or added in preprocess_html or
  // preprocess_page, that same work is probably needed for the maintenance page
  // as well, so we can just re-use those functions to do that work here.
  doorsgalore_preprocess_html($variables, $hook);
  doorsgalore_preprocess_page($variables, $hook);
}
// */

/**
 * Override or insert variables into the html templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("html" in this case.)
 */

function doorsgalore_preprocess_html(&$variables, $hook) {
	
    if (arg(0) == 'node' && is_numeric(arg(1))){

        switch (arg(1)):

            case 63 :
			case 64 : // Gallery page/node
				drupal_add_css(libraries_get_path('jquery.magnific-popup').'/magnific-popup.css');
				drupal_add_js(libraries_get_path('jquery.magnific-popup').'/jquery.magnific-popup.min.js', array('weight' => 10, 'scope' => 'footer')); 
			break; 

        endswitch;

    }
	
	drupal_add_js(path_to_theme().'/js/jquery.easing.min.js', array('weight' => 10, 'scope' => 'footer') );
	drupal_add_js(path_to_theme().'/js/mobile-scroll.js', array('weight' => 10, 'scope' => 'footer') );
	drupal_add_js(path_to_theme().'/js/retina-1.1.0.js', array('weight' => 10, 'scope' => 'footer') );
	drupal_add_js(path_to_theme().'/js/jquery.waitforimages.min.js', array('weight' => 10, 'scope' => 'footer') );
	drupal_add_js(path_to_theme().'/js/jquery.matchHeight-min.js', array('weight' => 10, 'scope' => 'footer') );
	//drupal_add_js(path_to_theme().'/js/imagelightbox.min.js', array('weight' => 10, 'scope' => 'footer') );
    drupal_add_js(path_to_theme().'/js/script.js', array('weight' => 30, 'scope' => 'footer') );

}
// */

/**
 * Override or insert variables into the page templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("page" in this case.)
 */

function doorsgalore_preprocess_page(&$variables, $hook) {
  
	/* FUNCTION TO GET TERMS  */
	function taxonomy_terms_by_name($name) {
		$vocab = taxonomy_vocabulary_machine_name_load($name);
		$query = new EntityFieldQuery();
		$result = $query
		->entityCondition('entity_type', 'taxonomy_term')
		->propertyCondition('vid', $vocab->vid)
		->execute();
		return $result['taxonomy_term'];
	}
  
}
// */

/**
 * Override or insert variables into the node templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 */

function doorsgalore_preprocess_node(&$variables, $hook) {
  if($variables['nid'] == 54 || $variables['nid'] == 55) drupal_add_js('https://maps.googleapis.com/maps/api/js?key=AIzaSyAp7N4odlw30cgO9nO3NSs07SAhkkR53p0');
}
// */

/**
 * Override or insert variables into the comment templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("comment" in this case.)
 */
/* -- Delete this line if you want to use this function
function doorsgalore_preprocess_comment(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the region templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("region" in this case.)
 */
/* -- Delete this line if you want to use this function
function doorsgalore_preprocess_region(&$variables, $hook) {
  // Don't use Zen's region--sidebar.tpl.php template for sidebars.
  //if (strpos($variables['region'], 'sidebar_') === 0) {
  //  $variables['theme_hook_suggestions'] = array_diff($variables['theme_hook_suggestions'], array('region__sidebar'));
  //}
}
// */

/**
 * Override or insert variables into the block templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
/* -- Delete this line if you want to use this function
function doorsgalore_preprocess_block(&$variables, $hook) {
  // Add a count to all the blocks in the region.
  // $variables['classes_array'][] = 'count-' . $variables['block_id'];

  // By default, Zen will use the block--no-wrapper.tpl.php for the main
  // content. This optional bit of code undoes that:
  //if ($variables['block_html_id'] == 'block-system-main') {
  //  $variables['theme_hook_suggestions'] = array_diff($variables['theme_hook_suggestions'], array('block__no_wrapper'));
  //}
}
// */


function doorsgalore_block_render($module, $block_id){

    $block = block_load($module, $block_id);
	$block->region = 'none';
    
    $block_content = _block_render_blocks(array($block));
    
    $build = _block_get_renderable_array($block_content);
    
    $block_rendered = drupal_render($build);
    
    return $block_rendered;
    
}

function doorsgalore_price_label($price, $text = 'Installed for:'){
	print '<div class="price-label">'.$text.' <span>$'.$price.'<sup>*</sup></span></div>';
}

function doorsgalore_price_footnote(){
	print '<span class="price-footnote">*Plus taxes/hardware sold seperately.</span>';
}
