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
		'careersbymajor',
	   array(
		   'labels' => array(
			   'name' => 'Career Data',
			   'singular_name' => 'Career Data',
			   'menu_name' => 'Career Data',
			   'all_items' => 'All Career Data',
			   'edit_item' => 'Edit Career Data',
			   'view_item' => 'View Career Data',
			   'view_items' => 'View All Career Data',
			   'add_new_item' => 'Add New Career Data',
			   'new_item' => 'New Career Data',
			   'parent_item_colon' => 'Parent Career Data:',
			   'search_items' => 'Search All Career Data',
			   'not_found' => 'No career data found',
			   'not_found_in_trash' => 'No career data found in Trash',
			   'archives' => 'Career Data Archives',
			   'attributes' => 'Career Data Attributes',
			   'insert_into_item' => 'Insert into Career Data',
			   'uploaded_to_this_item' => 'Uploaded to this career data',
			   'filter_items_list' => 'Filter career data list',
			   'filter_by_date' => 'Filter career data by date',
			   'items_list_navigation' => 'Career Data list navigation',
			   'items_list' => 'Career Data list',
			   'item_published' => 'Career Data published.',
			   'item_published_privately' => 'Career Data published privately.',
			   'item_reverted_to_draft' => 'Career Data reverted to draft.',
			   'item_scheduled' => 'Career Data scheduled.',
			   'item_updated' => 'Career Data updated.',
			   'item_link' => 'Career Data Link',
			   'item_link_description' => 'A link to career data.',
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
			'careersbyajor',
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
					'label' => 'Academic Program Website',
					'name' => 'program_link',
					'aria-label' => '',
					'type' => 'text',
					'instructions' => 'Link to the academic program on the department website',
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
					'key' => 'field_65fdd962ed577',
					'label' => 'Advising Major Page',
					'name' => 'advising_major',
					'type' => 'text',
					'instructions' => 'Link to the major page on the Advising site',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_65ce19c20fb70',
					'label' => 'Career Advisor',
					'name' => 'career_advisor',
					'type' => 'text',
					'instructions' => 'Link to the Career Advisor',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
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
			),
			'location' => array(
				array(
					array(
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'careersbymajor',
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
