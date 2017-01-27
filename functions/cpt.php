<?php 

//Add Custom Post Types and Custom Taxonomies
//Work CPT
	add_action( 'init', 'work_init' );
	function work_init() {
		$labels = array(
			'name'               => __('Work'),
			'singular_name'      => __('Work'),
			'menu_name'          => __('Work'),
			'name_admin_bar'     => __('Work'),
			'add_new'            => __('Add New'),
			'add_new_item'       => __('Add New Work'),
			'new_item'           => __('New Work'),
			'edit_item'          => __('Edit Work'),
			'view_item'          => __('View Works'),
			'all_items'          => __('All Works'),
			'search_items'       => __('Search Works'),
			'parent_item_colon'  => __('Parent Works:'),
			'not_found'          => __('No works found.'),
			'not_found_in_trash' => __('No works found in Trash.'),
		);
		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'works' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => true,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
		); register_post_type( 'work', $args );
	}
	//Work-Medium Tax
	add_action( 'init', 'medium_tax', 3 );
	function medium_tax() {
		register_taxonomy(
			'medium',
			'work',
			array(
				'label' => __( 'Medium' ),
				'rewrite' => array( 'slug' => 'medium' ),
				'hierarchical' => true,
			)
		);
	}

	// Register Industry Taxonomy
	function industry_tax() {

		$labels = array(
			'name'                       => _x( 'Industries', 'Taxonomy General Name', 'text_domain' ),
			'singular_name'              => _x( 'Industry', 'Taxonomy Singular Name', 'text_domain' ),
			'menu_name'                  => __( 'Industry', 'text_domain' ),
			'all_items'                  => __( 'All Industries', 'text_domain' ),
			'parent_item'                => __( 'Parent Item', 'text_domain' ),
			'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
			'new_item_name'              => __( 'New Industry', 'text_domain' ),
			'add_new_item'               => __( 'Add Industry', 'text_domain' ),
			'edit_item'                  => __( 'Edit Industry', 'text_domain' ),
			'update_item'                => __( 'Update Industry', 'text_domain' ),
			'view_item'                  => __( 'View Industry', 'text_domain' ),
			'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
			'add_or_remove_items'        => __( 'Add or remove Industry', 'text_domain' ),
			'choose_from_most_used'      => __( 'Choose from the most used Industries', 'text_domain' ),
			'popular_items'              => __( 'Popular Items', 'text_domain' ),
			'search_items'               => __( 'Search Items', 'text_domain' ),
			'not_found'                  => __( 'Not Found', 'text_domain' ),
			'no_terms'                   => __( 'No items', 'text_domain' ),
			'items_list'                 => __( 'Items list', 'text_domain' ),
			'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'show_in_rest'               => true,
		);
		register_taxonomy( 'Industry', array( 'work' ), $args );

	}
	add_action( 'init', 'industry_tax', 2 );

	// Register Industry Taxonomy
	function display_tax() {

		$labels = array(
			'name'                       => _x( 'Display State', 'Taxonomy General Name', 'text_domain' ),
			'singular_name'              => _x( 'Display State', 'Taxonomy Singular Name', 'text_domain' ),
			'menu_name'                  => __( 'Display State', 'text_domain' ),
			'all_items'                  => __( 'All Display States', 'text_domain' ),
			'parent_item'                => __( 'Parent Item', 'text_domain' ),
			'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
			'new_item_name'              => __( 'New Display State', 'text_domain' ),
			'add_new_item'               => __( 'Add Display State', 'text_domain' ),
			'edit_item'                  => __( 'Edit Display State', 'text_domain' ),
			'update_item'                => __( 'Update Display State', 'text_domain' ),
			'view_item'                  => __( 'View Display State', 'text_domain' ),
			'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
			'add_or_remove_items'        => __( 'Add or remove Display State', 'text_domain' ),
			'choose_from_most_used'      => __( 'Choose from the most used Display States', 'text_domain' ),
			'popular_items'              => __( 'Popular Items', 'text_domain' ),
			'search_items'               => __( 'Search Items', 'text_domain' ),
			'not_found'                  => __( 'Not Found', 'text_domain' ),
			'no_terms'                   => __( 'No items', 'text_domain' ),
			'items_list'                 => __( 'Items list', 'text_domain' ),
			'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'show_in_rest'               => true,
		);
		register_taxonomy( 'display_state', array( 'work' ), $args );

	}
	add_action( 'init', 'display_tax', 1 );

	//People CPT
	add_action( 'init', 'people_init' );
	function people_init() {
		$labels = array(
			'name'               => __('People'),
			'singular_name'      => __('Person'),
			'menu_name'          => __('People'),
			'name_admin_bar'     => __('Person'),
			'add_new'            => __('Add New'),
			'add_new_item'       => __('Add New Person'),
			'new_item'           => __('New Person'),
			'edit_item'          => __('Edit Person'),
			'view_item'          => __('View People'),
			'all_items'          => __('All People'),
			'search_items'       => __('Search People'),
			'parent_item_colon'  => __('Parent People:'),
			'not_found'          => __('No people found.'),
			'not_found_in_trash' => __('No people found in Trash.'),
		);
		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => false,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'peoples' ),
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
		); register_post_type( 'people', $args );
	}

	//Advocates CPT
	add_action( 'init', 'advocates_init' );
	function advocates_init() {
		$labels = array(
			'name'               => __('Advocates'),
			'singular_name'      => __('Advocate'),
			'menu_name'          => __('Advocates'),
			'name_admin_bar'     => __('Advocate'),
			'add_new'            => __('Add New'),
			'add_new_item'       => __('Add New Advocate'),
			'new_item'           => __('New Advocate'),
			'edit_item'          => __('Edit Advocate'),
			'view_item'          => __('View Advocates'),
			'all_items'          => __('All Advocates'),
			'search_items'       => __('Search Advocates'),
			'parent_item_colon'  => __('Parent Advocates:'),
			'not_found'          => __('No advocates found.'),
			'not_found_in_trash' => __('No advocates found in Trash.'),
		);
		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'advocates' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => true,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
		); register_post_type( 'advocate', $args );
	}
?>