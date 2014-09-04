
<div id="buckets">
	<div class="width clearfix">
    
    	<div class="grid grid-third">
        	<a href="/gallery"><span class="icon-door"></span></a>
        	<?php print doorsgalore_block_render('block', 8); ?>
        </div>
        <div class="grid grid-third">
        	<a href="/contact-us"><span class="icon-calculator"></span></a>
        	<?php print doorsgalore_block_render('block', 9); ?>
        </div>
        <div class="grid grid-third">
        	<a href="/contact-us"><span class="icon-estimate"></span></a>
        	<?php print doorsgalore_block_render('block', 10); ?>
        </div>
    
    </div>
</div>

<footer id="footer">
	<div class="width clearfix">

		<nav class="nav"><?php print doorsgalore_block_render('menu_block', 2); ?></nav>
        
        <div id="footer-right">
        	<div class="info-block get-a-quote"><?php print doorsgalore_block_render('block', 1); ?></div>
			<div class="info-block visit-showroom"><?php print doorsgalore_block_render('block', 2); ?></div>
            <span class="images">
            	<img src="/<?php print path_to_theme() ?>/images/logo_bbb.png" />
                <a href="http://homestars.com/companies/2704057-doors-galore?service_area=1717261" target="_blank"><img src="/<?php print path_to_theme() ?>/images/logo_homestars.png" /></a>
            </span>
        </div>
        
        <div id="copyright">&copy; 2014 Doors Galore. All Rights Reserved.</div>

	</div>
</footer>