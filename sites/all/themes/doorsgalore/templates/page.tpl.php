<?php
/**
 * @file
 * Returns the HTML for a single Drupal page.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728148
 */
?>

<div id="page" class="width">

  <header class="header clearfix" id="header" role="banner">

      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" class="header__logo" id="logo"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" class="header__logo-image" /></a>

    <div id="header-blocks">
    	<div class="info-block get-a-quote"><?php print doorsgalore_block_render('block', 1); ?></div>
		<div class="info-block visit-showroom"><?php print doorsgalore_block_render('block', 2); ?></div>
    </div>
    
    <div id="nav">
		<?php print doorsgalore_block_render('menu_block', 1); ?>
        <div id="header-nav"><?php print doorsgalore_block_render('menu_block', 3); ?></div>
    </div>

  </header>

  <div id="main" class="clearfix">

    <div id="content" class="column" role="main">
      <a id="main-content"></a>
      <?php print $messages; ?>
      <?php print render($tabs); ?>
      <?php print render($page['help']); ?>
      <?php if ($title): ?>
        <h1 class="page__title title" id="page-title"><?php print $title; ?></h1>
      <?php endif; ?>
      <?php if ($action_links): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>
      <?php print render($page['content']); ?>
      
      <?php
	  	if(isset($node)){
			switch($node->nid){
				case 17:
					print doorsgalore_block_render('views', 'exterior_doors-block');
				break;
			}
		}
	  ?>
      
    </div>
	
	<?php if(!$is_front): ?>
	<aside class="sidebars">
      
		<div id="sidebar-left" class="sidebar">
        
        <!-- if(arg(0) == 'faqs' || request_uri() == '/node/add/faq')-->
        
        	<?php include_once 'include/include--find-a-door.php'; ?>
            <?php include_once 'include/include--need-help.php'; ?>
		</div>
        
		<div id="sidebar-right" class="sidebar">
        	<?php include_once 'include/include--page-image.php'; ?>
			<?php include_once 'include/include--testimonial.php'; ?>
		</div>
        
	</aside>
    <?php endif; ?>


  </div>

</div>

<?php include_once 'include/include--footer.php'; ?>