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
		);

		register_taxonomy(
			'careersfrommajors',
			array(
				0 => 'careers',
			),
			array(
				'hierarchical' => true,
				'label' => 'Major to Career',
				'show_admin_column' => true,
				'show_ui' => true,
				'show_in_rest' => true,
				'query_var' => true,
				'rewrite' => array( 'slug' => 'careers' ),
				'singular_label' => 'Career',
			)
		);
}
add_action( 'init', 'uri_careers_create_program_post_type' );



/**
 * Define the custom fields
 */
if ( function_exists( 'register_field_group' ) ) {
	register_field_group(
		array(
			'key' => 'group_64dcf3d914d5d',
			'title' => 'Major Fields',
			'fields' => array(
				array(
					'key' => 'field_64dcf64afd993',
					'label' => 'Advising Link',
					'name' => 'careers_advising_link',
					'aria-label' => '',
					'type' => 'text',
					'instructions' => 'Link to Advising page',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
				),
				array(
					'key' => 'field_64dd06dcfd999',
					'label' => 'Industry A Name',
					'name' => 'industry_a_name',
					'aria-label' => '',
					'type' => 'text',
					'instructions' => 'Industry A Name',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'maxlength' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
				),
				array(
					'key' => 'field_64dd06ecfd99a',
					'label' => 'Industry A Entry Jobs',
					'name' => 'industry_a_entry_jobs',
					'aria-label' => '',
					'type' => 'text',
					'instructions' => 'Industry A Entry Level Job Title (a)',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'maxlength' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
				),
				array(
					'key' => 'field_64dd07f2fd9a4',
					'label' => 'Industry A Experienced Jobs',
					'name' => 'industry_a_experienced_jobs',
					'aria-label' => '',
					'type' => 'text',
					'instructions' => 'Industry A Experienced job title (a)',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'maxlength' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
				),
				array(
					'key' => 'field_64dd1659fd9ae',
					'label' => 'Industry B Name',
					'name' => 'industry_b_name',
					'aria-label' => '',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'maxlength' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
				),
				array(
					'key' => 'field_64dd1665fd9af',
					'label' => 'Industry B Entry Jobs',
					'name' => 'industry_b_entry_jobs',
					'aria-label' => '',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'maxlength' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
				),
				array(
					'key' => 'field_64dd1675fd9b0',
					'label' => 'Industry B Experienced Jobs',
					'name' => 'industry_b_experienced_jobs',
					'aria-label' => '',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'maxlength' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
				),
				array(
					'key' => 'field_64e4f80faf52e',
					'label' => 'Industry C Name',
					'name' => 'industry_c_name',
					'aria-label' => '',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'maxlength' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
				),
				array(
					'key' => 'field_64e4f81aaf52f',
					'label' => 'Industry C Entry Jobs',
					'name' => 'industry_c_entry_jobs',
					'aria-label' => '',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'maxlength' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
				),
				array(
					'key' => 'field_651ef472f691c',
					'label' => 'Industry C Experienced Jobs',
					'name' => 'industry_c_experienced_jobs',
					'aria-label' => '',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'maxlength' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
				),
				array(
					'key' => 'field_64e4fa903b09f',
					'label' => 'Employers hiring our grads',
					'name' => 'employers',
					'aria-label' => '',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'maxlength' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
				),
				array(
					'key' => 'field_64e4fab93b0a0',
					'label' => 'Grad Schools enrolling our students',
					'name' => 'grad_schools',
					'aria-label' => '',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'maxlength' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
				),
				array(
					'key' => 'field_64e4fad53b0a1',
					'label' => 'Skills',
					'name' => 'skills',
					'aria-label' => '',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'maxlength' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
				),
				/*
				 Disable featured story field
				array(
					'key' => 'field_64e4fae53b0a2',
					'label' => 'Featured Story',
					'name' => 'featured_story',
					'aria-label' => '',
					'type' => 'wysiwyg',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'maxlength' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
				),
				*/
			),
			'location' => array(
				array(
					array(
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'majors',
					),
				),
			),
			'menu_order' => 0,
			'position' => 'normal',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => '',
			'active' => true,
			'description' => '',
			'show_in_rest' => 0,
		)
		);
}
