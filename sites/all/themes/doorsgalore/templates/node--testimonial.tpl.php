<?php
/**
 * @file
 * Returns the HTML for a node.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728164
 */
?>

<blockquote class="node-<?php print $node->nid; ?> <?php print $classes; ?> clearfix"<?php print $attributes; ?>>
    <p><sup class="quote">&ldquo;</sup><?php print $node->body['und'][0]['value']; ?><sup class="quote">&rdquo;</sup></p>
    <footer>
    — <cite><?php print $title; ?></cite>
    </footer>
</blockquote>
