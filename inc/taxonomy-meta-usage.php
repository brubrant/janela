<?php
/**
 * Registering meta sections for taxonomies
 *
 * All the definitions of meta sections are listed below with comments, please read them carefully.
 * Note that each validation method of the Validation Class MUST return value.
 *
 * You also should read the changelog to know what has been changed
 *
 */

/********************* BEGIN DEFINITION OF META SECTIONS ***********************/

$meta_sections = array();

// first meta section
$meta_sections[] = array(
	'title' => 'Extras',			// section title
	'taxonomies' => array('group'),			// list of taxonomies. Default is array('category', 'post_tag'). Optional
	'id' => 'first_section',					// ID of each section, will be the option name
	
	'fields' => array(							// list of meta fields
		array(
			'name' => 'Membros',					// field name
			'desc' => 'Nomes de usuários separados por vírgula',	// field description, optional
			'id' => 'group_members',						// field id, i.e. the meta key
			'type' => 'text',						// text box
		),
		array(
			'name' => 'Link',					// field name
			'desc' => 'Endereço do site do grupo (opcional)',	// field description, optional
			'id' => 'group_url',						// field id, i.e. the meta key
			'type' => 'text',						// text box
		),
		array(
			'name' => 'Logo',
			'desc' => 'A logo do grupo',
			'id' => 'group_logo',
			'type' => 'image'						// image upload
		)
	)
);

foreach ($meta_sections as $meta_section) {
	$my_section = new RW_Taxonomy_Meta($meta_section);
}

/********************* END DEFINITION OF META SECTIONS ***********************/
?>
