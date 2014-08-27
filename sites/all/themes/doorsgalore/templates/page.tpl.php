<?php
/**
 * @file
 * Returns the HTML for a single Drupal page.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728148
 */
 
?>
<div id="page-wrap">
<div id="page" class="width">

  <header class="header clearfix" id="header" role="banner">

      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" class="header__logo" id="logo"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" class="header__logo-image" /></a>

    <div id="header-blocks">
    	<div class="info-block get-a-quote"><?php print doorsgalore_block_render('block', 1); ?></div>
		<div class="info-block visit-showroom"><?php print doorsgalore_block_render('block', 2); ?></div>
    </div>
    
    <div id="mobile-nav-btn">
		<a href="#" class="open_nav"></a>
	</div>
    <div id="nav">
    	<div id="main-nav">
			<?php print doorsgalore_block_render('menu_block', 1); ?>
        </div>
        <div id="header-nav"><?php print doorsgalore_block_render('menu_block', 3); ?></div>
    </div>

  </header>

  <div id="main" class="clearfix">

    <div id="content" class="column clearfix" role="main">
      <a id="main-content"></a>
      <?php print $messages; ?>
      <?php if(!$is_front) print render($tabs); ?>
      <?php print render($page['help']); ?>
      <?php if ($title && !$is_front): ?>
        <h1 class="page__title title" id="page-title"><?php print $title; ?></h1>
      <?php endif; ?>
      <?php if ($action_links): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>
      <?php print render($page['content']); ?>
      
      <?php
	  	if(isset($node)){
			switch($node->nid){
				
				// Home Page
				case 1:
					print '<div class="clearfix">';
						print doorsgalore_block_render('views', 'homepage_banner-block');
						print '<div id="homepage-right" class="clearfix">';
							include 'include/include--find-a-door.php';
							include 'include/include--need-help.php';
						print '</div>';
					print '</div>';
					print doorsgalore_block_render('views', 'homepage_promos-block');
					print doorsgalore_block_render('views', 'homepage_promos-order');
					print doorsgalore_block_render('block', 11);
					include 'include/include--testimonial.php';
				break;
				
				// Exterior Doors Taxonomy
				case 7:
					print doorsgalore_block_render('views', 'taxonomy_exterior_doors-block');
				break;
				
				// Exterior Doors List
				case 17:
					print doorsgalore_block_render('views', 'exterior_doors-block');
					print doorsgalore_block_render('views', 'exterior_doors-order');
					// Configurations
					print doorsgalore_block_render('block', 3);
					print doorsgalore_block_render('block', 4);
					print doorsgalore_block_render('block', 5);
					print doorsgalore_block_render('block', 6);
					print doorsgalore_block_render('block', 7);
				break;
				
				// Interior Doors List
				case 8:
					print doorsgalore_block_render('views', 'interior_doors-block');
					print doorsgalore_block_render('views', 'interior_doors-order');
				break;
				
				// Hardware List
				case 37:		
					print '<div class="views-door-hardware">';
					$hardware = taxonomy_terms_by_name('door_hardware');
					foreach( $hardware as &$t){
						$term = taxonomy_term_load($t->tid);
						$id = strtolower(str_replace(' ','-',$term->name));
						print '<h2>'.$term->name.'</h2>';
						print '<div id="'.$id.'" class="views-row">';
						// pritn term description
						if($term->description != '') print '<div class="description inline-list">'.$term->description.'</div>';
						// print term price label
						if(isset($term->field_price['und'])) doorsgalore_price_label($term->field_price['und'][0]['value']);
						print views_embed_view('door_hardware', 'block' , $t->tid);
						print '</div>';
					}
					print '</div>';
				break;
				
				// Service Areas
				case 55:
					print doorsgalore_block_render('block', 13);
				break;
				
				// Clearance
				case 56:
					print doorsgalore_block_render('views', 'clearance_items-block');
					print doorsgalore_block_render('views', 'clearance_items-order');
				break;
				
				// Promotions
				case 60:
					print doorsgalore_block_render('views', 'promotions-block');
				break;
				
				// Gallery
				case 63:
					$gallery = node_view(node_load(64));
					print drupal_render($gallery);
				break;
				
			}
		}
	  ?>
      
    </div>
	
	<?php if(!$is_front): ?>
	<aside class="sidebars">
      
		<div id="sidebar-left" class="sidebar">
        
        <!-- if(arg(0) == 'faqs' || request_uri() == '/node/add/faq')-->
        
        	<?php include 'include/include--find-a-door.php'; ?>
            <?php include 'include/include--need-help.php'; ?>
            <?php include 'include/include--view-gallery.php'; ?>
            
            <?php
			
			if(isset($node)){
				switch($node->nid){
					case 54:
						include 'include/include--testimonial.php';
					break;
				}
			}
			
			?>
            
		</div>
        
		<div id="sidebar-right" class="sidebar">
			<?php 
			
			if(isset($node) && $node->nid != 54){
				include 'include/include--page-image.php';
				include 'include/include--testimonial.php'; 
			}
			
            if(isset($node)){
				switch($node->nid){
					case 54:
						print doorsgalore_block_render('block', 12);
					break;
				}
			}
			
			?>
            
		</div>
        
	</aside>
    <?php endif; ?>


  </div>

</div>

</div> <!-- /#page-wrap -->

<?php include_once 'include/include--footer.php'; ?>