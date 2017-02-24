<?php /* Template Name: Work Archive NEW */


get_header();
 

?>
<!-- <div class="projects-loader"></div> -->


<section id="grid" class="has-emoticon"><!-- page-content -->
	<div id="gallery_cover"></div>
	<div class="work-grid" id="macy"><!-- container -->
		<!-- <div class="row"> -->
	<?php
		$args = array(
					'post_type'      => 'work',
					'order' => 'DESC',
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

		 			$award = get_field('award_winning', $post->ID);
		 			//$permalink = get_permalink($post->ID);
		 			$slug = get_post_field( 'post_name', $post->ID);




		 			$permalink = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" . "?p=" . $slug;



		 			if(!empty($industries)){
		 				foreach ($industries as $industry){
		 					//var_dump($industry->name);
		 					$output_industry .= $industry->name . $separator;
		 					//var_dump($output_industry);
		 				}
		 			}
		 			$output_industry = rtrim($output_industry,', '); 


		 			//Let's start a count for those $m
		 			$cnt_m = 0;
		 			if(!empty($mediums)){
		 				foreach ($mediums as $medium){
		 					//var_dump($industry->name);

		 					$m_count = (count($mediums));
		 					$cnt_m++;
		 					if($m_count > $cnt_m){
		 					$output_medium .= '<li>' . $medium->name . $separator . '</li>';
		 				
		 					}else{
		 						$output_medium .= '<li>' . $medium->name . '</li>';

		 					//var_dump(rtrim($output_medium, $separator));
		 					//var_dump($output_industry);
		 				}
		 			}
		 			$output_medium = rtrim($output_medium,', '); 

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
				$rgba = hex2rgba($color, 0.85);
				
			
				?>
		 <div class="work-block columns-4" data-id="<?php echo $slug;?>" data-post-id="<?php echo $post->ID;?>" data-color="<?php echo $color;?>"><!-- columns-4 -->
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
	 									<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $permalink; ?> target="_blank"">
	 										<img src="<?php echo get_template_directory_uri(); ?>/assets/img/facebook-share.png">
 										</a>
 									</li>
 									<!--<li class="insta-share"><span class="sr-only">Share this project on instagram</span>
	 									<img src="<?php echo get_template_directory_uri(); ?>/assets/img/instagram-share.png">
 									</li>-->
 									<li class="pin-share"><span class="sr-only">Share this project on Pintrest</span>
	 									<a href="https://pinterest.com/pin/create/button/?url=<?php echo $permalink; ?>&amp;media=<?php echo $tile_image_url; //image name?>&amp;description=<?php echo the_title(); ?>" target="_blank">
	 										<img src="<?php echo get_template_directory_uri(); ?>/assets/img/pintrest-share.png">
 										</a>
 									</li>
 									<li class="tw-share"><span class="sr-only">Share this project on Twitter</span>
	 									<a href="https://twitter.com/home?status=<?php echo the_title(); ?> <?php echo $permalink; ?>" target="_blank">
	 										<img src="<?php echo get_template_directory_uri(); ?>/assets/img/twitter-share.png">
 										</a>
 									</li>
								</ul>
							</div>

 						</footer>
	 					<!-- </ul> -->
 					</div><!-- end content -->
	 			</div><!-- end hover -->
		 	<div class="work-container <?php echo $position; ?> <?php echo $award; ?>">
		 		<div class="work-img">
		 		<?php if ($award == true){ ?>
						<div class="award-winning">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/img/award-winning.png">
						</div>
						<?php }?>
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

	 			</div>
	 		</div><!-- end work-container -->
		</div><!-- end work-block -->
	<?php } } }wp_reset_query(); wp_reset_postdata();?>
	
	<!-- </div> -->
</div><!-- end work-grid -->
</section>



<!-- <section class="josh"> -->
	<div id="infobar" >

		<p id="explore_text"> <span>&#10142;</span>  Explore the Work</p>
		
		<i id="detail_exit" class="material-icons" >keyboard_backspace</i>
		<span id="back_tip" class="tooltip">View All Projects</span>

		<i id="detail_close" class="material-icons" >clear</i>
 
		<div id="sidebar-content" class=" ">

			<!-- PROJECT CONTENT  DYNAMICALLY ADDED HERE -->

						<?php 
						$args_two = array(
							'post_type'      => 'work',
							//'meta_key'       => 'featured',
							//'meta_value'     => true,
							//'meta_compare'   => '!=',
							'order' => 'DESC',
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
 

			$query_two = new WP_Query($args );
			while ( $query_two->have_posts() ) { $query_two->the_post(); 
				
				$post_id = get_the_ID();
				$slug = get_post_field( 'post_name', $post_id );
				$bg_color=get_field('proj_bg_color');
				$setColor =  get_field('proj_bg_color', $post->ID);
				$color = $setColor;
				$rgb = hex2rgba($color);
				$rgba = hex2rgba($color, 0.85);

				//$active_class = '';
				//if($single){$active_class = 'active-project';}


				

				//Get content/metadata
				$mediums = get_the_terms($post_id, 'medium');
				$industries = get_the_terms($post_id, 'Industry');
			 
				$separator = ', ';
				$output_industry = '';
				$output_medium = '';

				$intro_info = get_field('intro_info',$post_id);

				$project_content = get_field('featured_statement',$post_id);

				if(!empty($industries)){
					foreach ($industries as $industry){
 
						$output_industry .= $industry->name . $separator;
 
					}
				}

				$output_industry = rtrim($output_industry,', '); 

				if(!empty($mediums)){
					foreach ($mediums as $medium){
 
						$output_medium .=  $medium->name . $separator;
 
					}
				}

				$output_medium = rtrim($output_medium,', '); 

				$title = get_the_title($post_id);
				$text_str = '';


				$text_str .= '<div id="'. $slug . '" class="detail_copy '.$active_class .'" data-color="'.$rgba.'">';
				$text_str .= '	<h3><span class="underline">'.$title.'</span></h3>';
				$text_str .= '	<span class="industries tags">'.rtrim($output_industry, $separator).'</span>';
				$text_str .= '	<p> '.$intro_info.'</p>';
				$text_str .= '	<footer>';
				$text_str .= '		<ul class="medium tags">'.$output_medium;
				$text_str .= '		</ul>';
				$text_str .= '	</footer>';
				$text_str .= '</div>';

				echo $text_str;



			}
			wp_reset_query(); wp_reset_postdata();
			?>





			<div class="detail-side-title">
				<p>Project Title Here</p>
			</div>
	
		</div>
 
		<div class="detail_nav">
			<div id="prev_proj" class="detail_switch">
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
				<svg id="next_arrow" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 42 25.93">
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
 

		<div id="project-panels" class="work-panels">
			<!-- PROJECTS DYNAMICALLY ADDED HERE -->
			<?php 
			$query_two = new WP_Query($args_two );
			while ( $query_two->have_posts() ) { $query_two->the_post(); 

				$post_id = get_the_ID();
				$slug = get_post_field( 'post_name', $post_id );

				$image_str = '';

				//get images for project
				//if(have_rows('showcase_images', $post_id)): 

					$image_str = '<div id="'.$slug.'-panels" class="project-wrap '.$active_class .'" data-id="'.$post_id.'">';
					while(have_rows('showcase_images', $post_id)) : the_row();
						$image=get_sub_field('image', $post_id);
			 
						$image_url=$image['sizes']['background-fullscreen-sq'];

						$image_type =  substr($image_url, -3);

						if($image_type == "gif"){
							$image_url = $image['url'];
						}
						 
						//$image_str .= "<img id='image-$image[id]' src='". get_template_directory_uri()."/assets/img/blank.png' data-src='$image_url'>";

						$image_str .= "<img class='lazy-load' id='image-$image[id]'  src='data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7' data-src='$image_url' >";

					endwhile; 
					$image_str .="</div>";

					echo $image_str;

				//endif; 






			} wp_reset_query(); wp_reset_postdata();
			?>
		
		</div>	
 
	</div>

<!-- </section> -->
<?php get_footer(); ?>
