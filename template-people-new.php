<?php /* Template Name: People Archive NEW */


get_header();
 

?>



<section id="grid" class="has-emoticon"><!-- page-content -->
	<div id="gallery_cover"></div>
	<div class="work-grid" id="macy"><!-- container -->
		<!-- <div class="row"> -->
	<?php
		$args = array(
					'post_type'      => 'people',
					'order' => 'ASC',
					'order_by' => 'date',
					'posts_per_page' => -1,
				);
				$query = new WP_Query($args);
				if ( $query->have_posts() ) { 
					$wk_ctr=0;
					while ( $query->have_posts() ) { $query->the_post(); 

					$wk_ctr++;
					 
		 			$bg_color=get_field('proj_bg_color');
 
					
				// Convert hexdec color string to rgb(a) string 
				// Courtesy https://support.advancedcustomfields.com/forums/topic/color-picker-values/#post-37335
 

				/* Here's a usage example how to use this function for dynamicaly created CSS */
				$setColor =  get_field('proj_bg_color', $post->ID);
				$color = $setColor;
				$rgb = hex2rgba($color);
				$rgba = hex2rgba($color, 0.9);
				$slug = get_post_field( 'post_name', $post->ID);
			
				?>
		 <div class="work-block columns-4" data-id="<?php echo $slug;?>" data-post-id="<?php echo $post->ID;?>" data-color="<?php echo $color;?>"><!-- columns-4 -->
		 	<div class="hover"  <?php if($bg_color){ echo 'style="background-color:'. $rgba .'"'; }?> >
	 				<div class="content">
		 				<h2>
		 					<span><?php the_title(); ?> </span>
		 				</h2>
		 			<span class="industries tags"> 
		 				<?php the_field('people_title'); ?>
		 			</span>
 
	 					<!-- </ul> -->
 					</div><!-- end content -->
	 			</div><!-- end hover -->
		 	<div class="work-container <?php //echo $position; ?>  ">
		 		<div class="work-img">
 
 					<img src="<?php the_field('people_cover'); ?>">

	 			</div>
	 		</div><!-- end work-container -->
		</div><!-- end work-block -->
	<?php  } }wp_reset_query(); wp_reset_postdata();?>
	
	<!-- </div> -->
</div><!-- end work-grid -->
</section>



<!-- <section class="josh"> -->
	<div id="infobar" >

		<p id="explore_text"><span>&#10142;</span> Explore our Team</p>
		
		<i id="detail_exit" class="material-icons" >keyboard_backspace</i>
		<span id="back_tip" class="tooltip">View All People</span>
		
 		<i id="detail_close" class="material-icons" >clear</i>
		<div id="sidebar-content" class=" ">

			<!-- PROJECT CONTENT  DYNAMICALLY ADDED HERE -->

						<?php 
 
			$query_two = new WP_Query($args );
			while ( $query_two->have_posts() ) { $query_two->the_post(); 
				
				$post_id = get_the_ID();
				$slug = get_post_field( 'post_name', $post_id );
				$bg_color=get_field('proj_bg_color');
 
				$intro_info = get_field('people_about',$post_id);

				$project_content = get_field('featured_statement',$post_id);

				$people_title = get_field('people_title',$post_id);



 

				$title = get_the_title($post_id);
				$text_str = '';


				$text_str .= '<div id="'. $slug . '" class="detail_copy '.$active_class .'" data-color="'.$bg_color.'">';
				$text_str .= '	<h3><span class="underline">'.$title.'</span></h3>';
				$text_str .= '	<span class="industries tags">'.$people_title.'</span>';
				$text_str .= '	<p> '.$intro_info.'</p>';
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
				<span id="prev_tip" class="tooltip">Previous Person</span>
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
				<span id="next_tip" class="tooltip">Next Person</span>
			</div>
		</div>
	</div>


	<div id="detail_scrollarea">
 

	    <div>
	    </div>

		<div id="project-panels" class="work-panels">
			<!-- PROJECTS DYNAMICALLY ADDED HERE -->
			<?php 
			$query_two = new WP_Query($args);
			while ( $query_two->have_posts() ) { $query_two->the_post(); 

				$post_id = get_the_ID();
				$slug = get_post_field( 'post_name', $post_id );

				$image_str = '';

				//get images for project
				 

					$image_str = '<div id="'.$slug.'-panels" class="project-wrap '.$active_class .'" data-id="'.$post_id.'">';
					 
						$image_url = get_field('people_cover', $post_id);
			 
					 
 
						$image_str .= "<img src='$image_url'>";

 
					$image_str .="</div>";

					echo $image_str;

		 






			} wp_reset_query(); wp_reset_postdata();
			?>
		
		</div>	
 
	</div>

<!-- </section> -->
<?php get_footer(); ?>
