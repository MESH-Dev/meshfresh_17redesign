<?php /* Template Name: Work Archive - Macy */


get_header(); ?>

<section id=""><!-- page-content -->
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
					$tile_image_url = $tile_image['sizes']['large'];
					$industries = get_the_terms($post->ID, 'Industry');
					//var_dump($industries);
		 			$mediums = get_the_terms($post->ID, 'medium');
		 			$position = get_field('pt_position');
		 			//var_dump($mediums);
		 			$separator = ', ';
		 			$output_industry = '';
		 			$output_medium = '';

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
					?>
		 <div class="work-block columns-4" ><!-- columns-4 -->
		 	<div class="hover" onclick="infoOpen()">
	 				<div class="content">
		 				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?> (<?php echo $wk_ctr; ?>)</a></h2>
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
	 							//echo get_the_term_list($post->ID,'medium','<ul><li>',',</li><li>', '</li></ul>') 
	 						?>
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
    <div id="detail_copy">
        <h3><span class="underline">Childrens Museum of New York</span></h3>
        <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum.</p>
    </div>
    <div class="detail_nav">
        <div id="prev_proj" class="detail_switch" onclick="prevScroll()">
<!--                    <p>Prev</p>-->
        </div>
        <div id="next_proj" class="detail_switch" onclick="nextScroll()">
<!--                    <p>Next</p>-->
        </div>
    </div>
	</div>

	<div id="detail_scrollarea">
	    <i id="fullscreen" class="material-icons">fullscreen</i>
	    <a name="proj1"></a>
	    <img id="img1" alt="placeholder" src="http://meshfresh.com/wp-content/uploads/2016/01/VesselBrooklyn_Web_Mockup-1.jpg">
	    <img id="img2" alt="placeholder" src="http://meshfresh.com/wp-content/uploads/2016/08/ETarch_Web_MockupFINAL.jpg">
	    <img id="img3" alt="placeholder" src="http://meshfresh.com/wp-content/uploads/2016/01/CSIS_Web_Mockup.jpg">
	    <img id="img4" alt="placeholder" src="http://meshfresh.com/wp-content/uploads/2016/08/tamarack_Web_MockupFINAL.jpg">
	    <a name="proj2"></a>
	    <img id="img5" alt="placeholder" src="http://meshfresh.com/wp-content/uploads/2014/04/nomad01_1600.jpg">
	    <img id="img6" alt="placeholder" src="http://meshfresh.com/wp-content/uploads/2014/03/MissionSavvy2_1600.jpg">
	    <img id="img7" alt="placeholder" src="http://meshfresh.com/wp-content/uploads/2014/03/MissionSavvy1_1600.jpg">
	    <img id="img8" alt="placeholder" src="http://meshfresh.com/wp-content/uploads/2014/03/MissionSavvy3_1600.jpg">
	</div>


<script>

</script>
<!-- </section> -->
<?php get_footer(); ?>