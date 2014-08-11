<?php
// Roles that can edit
global $user;
$roles = array('administrator', 'client admin');

// If current user has edit role
if (array_intersect($roles, $user->roles)): ?>
	
    <?php drupal_add_js('/misc/tabledrag.js'); ?>
    
	<div class="views-field-edit-node"><a href="/node/<?php print $nid ?>/edit">Edit</a></div>
    
<?php endif; ?>

