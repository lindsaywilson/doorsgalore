

<?php 
	$exterior = taxonomy_terms_by_name('exterior_doors');
	$interior = taxonomy_terms_by_name('interior_doors');
?>

<div id="find-a-door" class="block">
	<h2>Find a Door:</h2>
    <div class="cell">
    <p><strong><a href="/exterior-doors">Exterior Doors</a></strong></p>
        <ul>
        <?php
            foreach( $exterior as &$t){
                $term = taxonomy_term_load($t->tid);
                $path = taxonomy_term_uri($term);
                $url = str_replace('taxonomy', '', drupal_get_path_alias($path['path']));
                print '<li><a href="'.$url.'">'.$term->name.'</a></li>';
            }
        ?>
        </ul>
    </div>
    <div class="cell">
        <p><strong><a href="/interior-doors">Interior Doors</a></strong></p>
        <ul>
        <?php
            foreach( $interior as &$t){
                $term = taxonomy_term_load($t->tid);
                $path = taxonomy_term_uri($term);
                $url = str_replace('taxonomy', '', drupal_get_path_alias($path['path']));
                $hash = str_replace('doors/','doors#',$url);
                print '<li><a href="'.$hash.'">'.$term->name.'</a></li>';
            }
        ?>
        </ul>
    </div>
</div>
