<?php /* Template Name: Work Archive (Columns) */


get_header(); ?>

<section id=""><!-- page-content -->
	<div class="work-grid in-column"><!-- container -->
		<div class="row">
	<?php
		$args = array(
					'post_type'      => 'work',
					//'meta_key'       => 'featured',
					//'meta_value'     => true,
					//'meta_compare'   => '!=',
					'order' => 'DESC',
					'order_by' => 'date',
					'posts_per_page' => -1
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

		 			$len = wp_count_posts();

		 			//var_dump($len);
					?>
		 <div class="work-block "><!-- columns-4 -->
		 	<div class="column-gutter"></div>
		 	<div class="work-container <?php echo $position; ?>">


		 		<?php 

		 		//var_dump(get_the_post_thumbnail());

		 		if (get_the_post_thumbnail() != '') { 
		 			echo get_the_post_thumbnail($post->ID, 'large'); 
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
		 				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?><?php echo '('.$wk_ctr.')'; ?></a></h2>
		 			<!-- 	<span class="tags"> -->
	 					<?php echo get_the_term_list($post->ID, 'Industry','<span class="tags">',', ','</span>') ?>
	 					<!-- </span> -->
	 					<!-- <ul> -->
	 					<footer>
	 						<?php echo get_the_term_list($post->ID,'medium','<ul><li>',',</li><li>', '</li></ul>') ?>
 						</footer>
	 					<!-- </ul> -->
 					</div>
	 			</div>
	 		</div>
		</div>
	<?php } } wp_reset_query(); ?>
	<?php //if ( have_posts() ) { while ( have_posts() ) { the_post(); ?>
		<!-- <h1><?php the_title(); ?></h1>
		<div class="gutter">
			<?php the_content(); ?>
		</div> -->
	<?php //} } ?>
	</div>
</div>
</section>

<?php get_footer(); ?>