<?php
	//API includes
	//include_once('assets/api/tumblr.php');
	//include_once('assets/api/instagram.php');
	
	include('functions/start.php');
	include('functions/cpt.php');
	include('functions/clean.php');


	//Stop autop courtesy https://davidwalsh.name/disable-autop

	remove_filter('the_content', 'wpautop');

	// Convert hexdec color string to rgb(a) string 
	// Courtesy https://support.advancedcustomfields.com/forums/topic/color-picker-values/#post-37335
	function hex2rgba($color, $opacity = false) {
				 
			$default = 'rgb(0,0,0)';
		 
			//Return default if no color provided
			if(empty($color))
				  return $default; 
		 
			//Sanitize $color if "#" is provided 
				if ($color[0] == '#' ) {
					$color = substr( $color, 1 );
				}
		 
				//Check if color has 6 or 3 characters and get values
				if (strlen($color) == 6) {
						$hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
				} elseif ( strlen( $color ) == 3 ) {
						$hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
				} else {
						return $default;
				}
		 
				//Convert hexadec to rgb
				$rgb =  array_map('hexdec', $hex);
		 
				//Check if opacity is set(rgba or rgb)
				if($opacity){
					if(abs($opacity) > 1)
						$opacity = .7;
					$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
				} else {
					$output = 'rgb('.implode(",",$rgb).')';
				}
		 
				//Return rgb(a) color string
				return $output;
		}

	// Callback function to insert 'styleselect' into the $buttons array
	function my_mce_buttons_2( $buttons ) {
		array_unshift( $buttons, 'styleselect' );
		return $buttons;
	}
	// Register our callback to the appropriate filter
	add_filter( 'mce_buttons_2', 'my_mce_buttons_2' );

	// Callback function to filter the MCE settings
function my_mce_before_init_insert_formats( $init_array ) {  
	// Define the style_formats array
	$style_formats = array(  
		// Each array child is a format with it's own settings
		array(  
			'title' => '.large-text',  
			'block' => 'div',  
			'classes' => 'large-text',
			'wrapper' => true,
			
		),  
		array(  
			'title' => '.cta',  
			'block' => 'div',  
			'classes' => 'cta',
			//'selector' => 'a',
			'wrapper' => true,
		),
		// array(  
		// 	'title' => '.ltr⇢',  
		// 	'block' => 'blockquote',  
		// 	'classes' => 'ltr',
		// 	'wrapper' => true,
		// ),
	);  
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode( $style_formats );  
	
	return $init_array;  
  
} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );  

	//Readmore excerpts
	function filter_function_name( $excerpt ) {
	  return $excerpt.'<br><a class="readmore" href="'. get_permalink( get_the_ID() ) . '">Read more</a>';
	}
	add_filter( 'get_the_excerpt', 'filter_function_name' );

	//Functions file can't seem to find this function...
	function getInstagram(){
		$json = file_get_contents('https://api.instagram.com/v1/users/1167443738/media/recent?access_token=1167443738.d346c1d.1213de64f26e485e8ffe33eab03e1905');
		$obj = json_decode($json);
		return $obj->data;
	}

	//Get all Posts for Blogroll
		/* =============
			Combines posts from WordPress, Tumblr, and Instagram into one array,
			consolidates that array and then returns it for you to use however you need to.
			Accepts a $returnNum variable that controls how many posts you get back in the
			returned array. If $returnNum isn't passed into the variable then all posts are returned.

			Include tag ID to filter posts by tag before merging with Instagram and Tumblr
		================ */
	function blogrollPosts($include, $tag_id, $returnNum){
		$timestamps = array();
		if(!$include || $include == 'all'){
				$include = array('instagram','wordpress');
			}

			if(in_array('wordpress', $include)){
			$args = array(
				'post_type' => 'post',
				'posts_per_page' => -1,
				'tag_id' => $tag_id
			);
			$posts = get_posts($args);
			//set unix timestamps for WP posts
			foreach($posts as $post){
				$post->unix_timestamp = strtotime($post->post_date);
				$post->post_source = 'wordpress';
				array_push($timestamps, strtotime($post->post_date));
			}
			//var_dump($posts);
			}else{
				$posts = array();
			}


			if(in_array('tumblr', $include)){
				//Get Tumblr
				$tumblr = getTumblr();
				//set unix timestamps for WP posts
				foreach($tumblr as $post){
					$post->unix_timestamp = $post->timestamp;
					$post->post_source = 'tumblr';
					array_push($timestamps, $post->timestamp);
				}
				//var_dump($tumblr);
			}else{
				$tumblr = array();
			}

			if(in_array('instagram', $include)){
				//Get Instagram
				$instagram = getInstagram();
				foreach($instagram as $post){
					$post->unix_timestamp = $post->created_time;
					$post->post_source = 'instagram';
					array_push($timestamps, $post->created_time);
				}
				//var_dump($instagram);
			}else{
				$instagram = array();
			}

			//Merge arrays and sort
			$allposts = array_merge($posts,$tumblr,$instagram);
			$sortArr[0] = $timestamps;
			$sortArr[1] = $allposts;
			array_multisort($sortArr[0], SORT_DESC, SORT_STRING,
							$sortArr[1], SORT_NUMERIC, SORT_DESC);
			$allposts = $sortArr[1];

			if(!$returnNum){
				$returnNum = count($allposts);
			}
			//The "15" below should use $returnNum, this variable isn't being passed, so it's been manually limited to 30
			return array_slice($allposts,0,30);
	}

	//Cycle
	function cycle($first_value, $values = '*') {
	  static $count = array();
	  $values = func_get_args();
	  $name = 'default';
	  $last_item = end($values);
	  if( substr($last_item, 0, 1) === ':' ) {
	    $name = substr($last_item, 1);
	    array_pop($values);
	  }
	  if( !isset($count[$name]) )
	    $count[$name] = 0;
	  $index = $count[$name] % count($values);
	  $count[$name]++;
	  return $values[$index];
	}

	


	//Theme Supports
	add_theme_support( 'automatic-feed-links' );
	$args = array(
		'width'         => 140,
		'height'        => 140,
		'flex-width'	=> true,
		'flex-height'	=> true,
		'default-image' => get_template_directory_uri() . '/assets/img/logo.png',
	);
	add_theme_support( 'custom-header', $args );
	add_theme_support( 'post-thumbnails' );


	// Theme the TinyMCE editor
	add_editor_style(get_bloginfo('template_directory').'/assets/css/editor.css');


	// Custom CSS for the login page
	function wpfme_loginCSS() {
		echo '<link rel="stylesheet" type="text/css" href="'.get_bloginfo('template_directory').'/assets/css/login.css"/>';
	}
	add_action('login_head', 'wpfme_loginCSS');


	// Customise the footer in admin area
	function wpfme_footer_admin () {
		echo 'Theme designed and developed by <a href="#" target="_blank">MESH Design & Development</a>.';
	}
	add_filter('admin_footer_text', 'wpfme_footer_admin');


	// Custom CSS for the whole admin area
	function wpfme_adminCSS() {
		echo '<link rel="stylesheet" type="text/css" href="'.get_bloginfo('template_directory').'/assets/css/admin.css"/>';
	}
	add_action('admin_head', 'wpfme_adminCSS');


	// Remove the version number of WP
	// Warning - this info is also available in the readme.html file in your root directory - delete this file!
	remove_action('wp_head', 'wp_generator');


	// Disable the theme / plugin text editor in Admin
	define('DISALLOW_FILE_EDIT', true);


	//Widget Sections
	register_sidebar(array(
	  'name' => __('Blog Sidebar'),
	  'id' => 'blog-sidebar',
	  'description' => __('Widgets will show in sidebar of the blogroll'),
	  'before_title' => '<h3 class="blog-sidebar">',
	  'after_title' => '</h3>'
	));


	//Menus
	register_nav_menus(array(
		'main-nav'   => 'Primary Navigation structure',
		'social-nav'   => 'Social Menu'
	));


	