<?php /* Template Name: Work Archive - Macy */


get_header();

 
//load_project('single',50);



?>



<section id="grid" class="has-emoticon"><!-- page-content -->
	<div id="gallery_cover"></div>
	<div class="work-grid" id="macy"><!-- container -->
		<!-- <div class="row"> -->
	<?php
		$args = array(
					'post_type'      => 'work',
					//'meta_key'       => 'featured',
					//'meta_value'     => true,
					//'meta_compare'   => '!=',
					'order' => 'ASC',
					'order_by' => 'date',
					'posts_per_page' => -1,
					'tax_query' => array(
						array(
							'taxonomy' => 'display_state',
							'field'    => 'slug',
							'terms'    => 'archive',
							'operator' => 'NOT IN'
						),
					),
				);
				$query = new WP_Query($args);
				if ( $query->have_posts() ) { 
					$wk_ctr=0;
					while ( $query->have_posts() ) { $query->the_post(); 

					$wk_ctr++;
					$tile_image = get_field('featured_cover', $post->ID);
					//var_dump($tile_image);
					$tile_image_url = $tile_image['url'];
					$industries = get_the_terms($post->ID, 'Industry');
					//var_dump($industries);
		 			$mediums = get_the_terms($post->ID, 'medium');
		 			$position = get_field('pt_position');
		 			//var_dump($mediums);
		 			$separator = ', ';
		 			$output_industry = '';
		 			$output_medium = '';
		 			$bg_color=get_field('proj_bg_color');
		 			//var_dump($bg_color);



		 			if(!empty($industries)){
		 				foreach ($industries as $industry){
		 					//var_dump($industry->name);
		 					$output_industry .= $industry->name . $separator;
		 					//var_dump($output_industry);
		 				}
		 			}

		 			if(!empty($mediums)){
		 				foreach ($mediums as $medium){
		 					//var_dump($industry->name);
		 					$output_medium .= '<li>' . $medium->name . $separator . '</li>';
		 					//var_dump(rtrim($output_medium, $separator));
		 					//var_dump($output_industry);
		 				}
		 			}

		 			$rand = mt_rand(1, 3);

		 			// if($rand == 1){
		 			// 	$position = 'left';
		 			// }elseif ($rand == 2){
		 			// 	$position = 'right';
		 			// }else{
		 			// 	$position = 'center';
		 			// }
					
				// Convert hexdec color string to rgb(a) string 
				// Courtesy https://support.advancedcustomfields.com/forums/topic/color-picker-values/#post-37335

				

				/* Here's a usage example how to use this function for dynamicaly created CSS */
				$setColor =  get_field('proj_bg_color', $post->ID);
				$color = $setColor;
				$rgb = hex2rgba($color);
				$rgba = hex2rgba($color, 0.9);
			
				?>
		 <div class="work-block columns-4" data-id="<?php echo $post->ID;?> " data-color="<?php echo $color;?>"><!-- columns-4 -->
		 	<div class="hover"  <?php if($bg_color){ echo 'style="background-color:'. $rgba .'"'; }?> >
	 				<div class="content">
		 				<h2>
		 					<!-- <a href="<?php //the_permalink(); ?>"> -->
		 					<span><?php the_title(); ?> </span>
		 					<!-- </a> -->
		 				</h2>
		 			<span class="industries tags"> 
		 				<?php echo rtrim($output_industry, $separator); ?>
		 			</span>
	 					<?php //We can bring this in again if we decide to create the individual pages to show this
	 						//echo get_the_term_list($post->ID, 'Industry','<span class="tags">',', ','</span>') 
	 					?>
	 					
	 					<footer>
	 						<ul class="mediums tags">
	 							<?php 
	 								//Need to figure out how to strip ", " from last li
	 								echo $output_medium; 
 								?>
 							</ul>
	 						<?php 
	 							//We can bring this in again if we decide to create the individual pages to show this
	 							//echo get_the_term_list($post->ID,'medium','<ul><li>',',</li><li>', '</li></ul>') 
	 						?>

	 						<div class="social-share">
	 							<ul>
	 								<li class="fb-share"><span class="sr-only">Share this project on facebook</span>
	 									<a href="https://www.facebook.com/sharer/sharer.php?u=mesh.com">
	 										<img src="<?php echo get_template_directory_uri(); ?>/assets/img/facebook-share.png">
 										</a>
 									</li>
 									<!--<li class="insta-share"><span class="sr-only">Share this project on instagram</span>
	 									<img src="<?php echo get_template_directory_uri(); ?>/assets/img/instagram-share.png">
 									</li>-->
 									<li class="pin-share"><span class="sr-only">Share this project on Pintrest</span>
	 									<a href="https://pinterest.com/pin/create/button/?url=http://<?php echo bloginfo('url');?>/<?php echo $tile_image_url; ?>&amp;media=<?php echo $tile_image_url; //image name?>&amp;description=<?php echo the_title(); ?>">
	 										<img src="<?php echo get_template_directory_uri(); ?>/assets/img/pintrest-share.png">
 										</a>
 									</li>
 									<li class="tw-share"><span class="sr-only">Share this project on Twitter</span>
	 									<a href="https://twitter.com/home?status=<?php echo the_title(); ?><?php echo bloginfo('url');?>">
	 										<img src="<?php echo get_template_directory_uri(); ?>/assets/img/twitter-share.png">
 										</a>
 									</li>
								</ul>
							</div>

 						</footer>
	 					<!-- </ul> -->
 					</div><!-- end content -->
	 			</div><!-- end hover -->
		 	<div class="work-container <?php echo $position; ?>">

		 		<?php 

		 		//var_dump(get_the_post_thumbnail());

		 		if ($tile_image_url != '') { ?>
		 			<img src="<?php echo $tile_image_url; ?>" >
		 		<?php }else{ ?>

		 		<?php $rand_img = mt_rand(1, 2); 
		 			if($rand_img ==1 ){
	 			?>
		 			<img class="work-img" src="http://placehold.it/700x805"><!-- if(get_the_post_thumbnail() !== '' ){ }else{echo $tile_image_url; } -->
	 			<?php }else{ ?>
	 				<img class="work-img" src="http://placehold.it/700x402">
	 			<?php } ?>
	 			<?php } ?>

	 			
	 		</div><!-- end work-container -->
		</div><!-- end work-block -->
	<?php } } wp_reset_query(); ?>
	
	<!-- </div> -->
</div><!-- end work-grid -->
</section>

<!-- <section class="josh"> -->
	<div id="infobar" onclick="infoOpen()">

		<p id="explore_text">Explore the Projects</p>
		
		<i id="detail_exit" class="material-icons" onclick="infoClose(event)">keyboard_backspace</i>
		<a href="#" id="loadem" style="margin-top: 200px; position: absolute; z-index: 9999999">LOAD NEXT</a>
		<div id="sidebar-content" class=" ">

			<!-- PROJECT CONTENT  DYNAMICALLY ADDED HERE -->

	
		</div>
 
		<div class="detail_nav">
			<div id="prev_proj" class="detail_switch" onclick="prevScroll()">
				<svg id="prev_arrow" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 42 25.93">
				  <defs>
				    <style>
				      .cls-1 {
				        fill: #fff;
				      }
				    </style>
				  </defs>
				  <path class="cls-1" d="M4.93,33.67,21,17.64l16.07,16L42,28.74l-21-21-21,21Z" transform="translate(0 -7.74)"/>
				</svg>
				<span id="prev_tip" class="tooltip">Previous Project</span>
			</div>
			<div id="next_proj" class="detail_switch">
				<svg id="next_arrow" onclick="nextScroll()" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 42 25.93">
				  <defs>
				    <style>
				      .cls-1 {
				        fill: #fff;
				      }
				    </style>
				  </defs>
				  <path class="cls-1" d="M37.07,7.74,21,23.77,4.93,7.74,0,12.67l21,21,21-21Z" transform="translate(0 -7.74)"/>
				</svg>
				<span id="next_tip" class="tooltip">Next Project</span>
			</div>
		</div>
	</div>


	<div id="detail_scrollarea">
	    <i id="fullscreen" class="material-icons" onclick="fullScreenTrigger()">fullscreen</i>
	    <i id="fullscreen_exit" class="material-icons" onclick="fullScreenExitTrigger()">fullscreen_exit</i>
	    <span id="fs_tip" class="tooltip">Expand the Images</span>
	    <span id="fs_close_tip" class="tooltip">Close Fullscreen</span>

	    <div>
	    </div>

		<div id="project-panels" class="work-panels">
			<!-- PROJECTS DYNAMICALLY ADDED HERE -->
		
		</div>	
 
	</div>

 
<!-- </section> -->
<?php get_footer(); ?>