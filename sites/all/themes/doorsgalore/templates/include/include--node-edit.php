<?php
// Roles that can edit
global $user;
$roles = array('administrator');

// If current user has edit role
if (array_intersect($roles, $user->roles)): ?>

	<div class="views-field-edit-node"><a href="/node/<?php print $nid ?>/edit">Edit</a></div>
    
<?php endif; ?>

