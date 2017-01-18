<?php /* Template Name: Work Archive */


get_header(); ?>

<section id=""><!-- page-content -->
	<div class="work-grid" id="grid" data-columns><!-- container -->
		<!-- <div class="row"> -->
	<?php
		$args = array(
					'post_type'      => 'work',
					//'meta_key'       => 'featured',
					//'meta_value'     => true,
					//'meta_compare'   => '!=',
					'order' => 'ASC',
					'orderby' => 'menu_order',
					'posts_per_page' => -1
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
		 			//var_dump($mediums);
		 			$separator = ', ';
		 			$output_industry = '';
		 			$output_medium = '';

		 			$rand = mt_rand(1, 3);

		 			if($rand == 1){
		 				$position = 'left';
		 			}elseif ($rand == 2){
		 				$position = 'right';
		 			}else{
		 				$position = 'center';
		 			}
					?>
		 <div class="work-block shaun"><!-- columns-4 -->
		 	
		 	<div class="work-container <?php echo $position; ?>">

		 		<?php 

		 		//var_dump(get_the_post_thumbnail());

		 		if ($tile_image_url != '') { 
		 			echo $tile_image_url; 
		 		}else {?>

		 		<?php $rand_img = mt_rand(1, 2); 
		 			if($rand_img ==1 ){
	 			?>
		 			<img class="work-img" src="http://placehold.it/700x805"><!-- if(get_the_post_thumbnail() !== '' ){ }else{echo $tile_image_url; } -->
	 			<?php }else{ ?>
	 				<img class="work-img" src="http://placehold.it/700x402">
	 			<?php } ?>
	 			<?php } ?>

	 			<div class="hover">
	 				<div class="content">
		 				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?> (<?php echo $wk_ctr; ?>)</a></h2>
		 			<!-- 	<span class="tags"> -->
	 					<?php echo get_the_term_list($post->ID, 'Industry','<span class="tags">',', ','</span>') ?>
	 					<!-- </span> -->
	 					<!-- <ul> -->
	 					<footer>
	 						<?php echo get_the_term_list($post->ID,'medium','<ul><li>',',</li><li>', '</li></ul>') ?>
 						</footer>
	 					<!-- </ul> -->
 					</div><!-- end content -->
	 			</div><!-- end hover -->
	 		</div><!-- end work-container -->
		</div><!-- end work-block -->
	<?php } } wp_reset_query(); ?>
	
	<!-- </div> -->
</div><!-- end work-grid -->
</section>

<?php get_footer(); ?>