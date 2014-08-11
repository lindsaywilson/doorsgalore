<?php

/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
 //dpm($fields['tid']->content);
 
 $name = $fields['name']->content;
 $description = $fields['description']->content;
 $image = $fields['field_image']->content;
 $term = taxonomy_term_load($fields['tid']->content);
 $path = taxonomy_term_uri($term);
 $url = str_replace('taxonomy', '', drupal_get_path_alias($path['path']));
 
?>

<div class="text">
    <h2><a href="<?php print $url; ?>"><?php print $name ?></a></h2>
    <div class="description"><?php print $description ?></div>
    <p><a class="btn" href="<?php print $url; ?>">Browse <?php print $name ?></a></p>
</div>
<div class="image">
	<a href="<?php print $url; ?>">
	 <?php print $image; ?>
 	</a>
</div>