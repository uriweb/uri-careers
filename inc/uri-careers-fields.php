<?php
/**
 * Define the custom post type, its taxonomy, and its fields.
 *
 * @package uri-careers
 */

// Block direct requests
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Declare the custom post type
 */
function uri_careers_create_program_post_type() {
	register_post_type(
		 'majors',
		array(
			'labels' => array(
				'name' => 'Majors',
				'singular_name' => 'Major',
				'menu_name' => 'Majors',
				'all_items' => 'All Majors',
				'edit_item' => 'Edit Major',
				'view_item' => 'View Major',
				'view_items' => 'View Majors',
				'add_new_item' => 'Add New Major',
				'new_item' => 'New Major',
				'parent_item_colon' => 'Parent Major:',
				'search_items' => 'Search Majors',
				'not_found' => 'No majors found',
				'not_found_in_trash' => 'No majors found in Trash',
				'archives' => 'Major Archives',
				'attributes' => 'Major Attributes',
				'insert_into_item' => 'Insert into major',
				'uploaded_to_this_item' => 'Uploaded to this major',
				'filter_items_list' => 'Filter majors list',
				'filter_by_date' => 'Filter majors by date',
				'items_list_navigation' => 'Majors list navigation',
				'items_list' => 'Majors list',
				'item_published' => 'Major published.',
				'item_published_privately' => 'Major published privately.',
				'item_reverted_to_draft' => 'Major reverted to draft.',
				'item_scheduled' => 'Major scheduled.',
				'item_updated' => 'Major updated.',
				'item_link' => 'Major Link',
				'item_link_description' => 'A link to a major.',
			),
			'public' => true,
			'exclude_from_search' => false,
			'show_in_rest' => true,
			'menu_icon' => 'dashicons-businesswoman',
			'supports' => array(
				0 => 'title',
				1 => 'editor',
				2 => 'thumbnail',
			),
			'delete_with_user' => false,
		)
	)
}
