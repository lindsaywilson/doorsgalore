<?php
/**
 * @file
 * Returns the HTML for a single Drupal page.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728148
 */
?>

<div id="page">

  <header class="header clearfix" id="header" role="banner">

    <?php if ($logo): ?>
      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" class="header__logo" id="logo"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" class="header__logo-image" /></a>
    <?php endif; ?>

    <?php print render($page['header']); ?>
    
    <div id="nav">
		<?php print doorsgalore_block_render('menu_block', 1); ?>
    </div>

  </header>

  <div id="main" class="clearfix">

    <div id="content" class="column" role="main">
      <?php print render($page['highlighted']); ?>
      <a id="main-content"></a>
      <?php if ($title): ?>
        <h1 class="page__title title" id="page-title"><?php print $title; ?></h1>
      <?php endif; ?>
      <?php print $messages; ?>
      <?php print render($tabs); ?>
      <?php print render($page['help']); ?>
      <?php if ($action_links): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>
      <?php print render($page['content']); ?>
      <?php //print $feed_icons; ?>
    </div>
	
	<?php if(!$is_front): ?>
	<aside class="sidebars">
      
		<div id="sidebar-left" class="sidebar">
        
        <!--
        if(arg(0) == 'faqs' || request_uri() == '/node/add/faq'){
            print t('Frequently Asked Questions');
        }
        -->
        
        	<?php include_once 'include/include--find-a-door.php'; ?>
		</div>
        
		<div id="sidebar-right" class="sidebar">
			<?php include_once 'include/include--testimonial.php'; ?>
		</div>
        
	</aside>
    <?php endif; ?>


  </div>

</div>

<?php print render($page['footer']); ?>

<?php print render($page['bottom']); ?>
