 <?php /* Template Name: People */ get_header(); ?>

<section id="people" class="has-emoticon">
	<div class=""><!-- container -->
		<div class="people-grid" id="macy">
		<?php
		$args = array(
					'post_type'      => 'people',
					//'meta_key'       => 'featured',
					//'meta_value'     => true,
					//'meta_compare'   => '!=',
					'order' => 'ASC',
					'order_by' => 'date',
					'posts_per_page' => -1,
					// 'tax_query' => array(
					// 	array(
					// 		'taxonomy' => 'display_state',
					// 		'field'    => 'slug',
					// 		'terms'    => 'archive',
					// 		'operator' => 'NOT IN'
					// 	),
					// ),
				);
				$query = new WP_Query($args);
				if ( $query->have_posts() ) { 
					$wk_ctr=0;
					while ( $query->have_posts() ) { $query->the_post(); 

						$bg_color=get_field('background_color');

						$setColor =  get_field('background_color', $post->ID);
						$color = $setColor;
						$rgb = hex2rgba($color);
						$rgba = hex2rgba($color, 0.9);
						
					?>

		<!-- <div class="gutter">
		<div id="contentPrimary">
			<?php
				// if ( have_posts() ) { while ( have_posts() ) { the_post();
				// 		the_content();
				// 	}
				// }

				//endwhile; endif;
			?>
		</div> -->
		<!-- <div id=""> --><!-- contentSecondary -->
			<!-- <section > --><!-- id="macy" -->
				<?php //$people = get_field('people_order');
				//foreach($people as $post){
					//setup_postdata($post); ?>
					<div class="people-entry columns-4 <?php //echo cycle('right','right','left','left'); ?>">

						<div class="hover" <?php if($bg_color){ echo 'style="background-color:'. $rgba .'"'; }?>>
							<div class="container">
								<div class="people-entry-data" ><!-- style="background:<?php the_field('background_color'); ?>;" -->
									<div class="people-entry-data-vis" >
										<div class=""><!-- gutter -->
											<span class="people-entry-title"><?php the_title(); ?></span>
											<span class="people-entry-posit"><?php the_field('people_title'); ?></span>

											<div class="people-entry-content">
												<?php the_field('people_about'); ?>
											</div>
										</div>
									</div>
									<div class="people-entry-data-add">
										<div class="gutter">
											<span class="people-entry-statement"><?php the_field('people_intro'); ?></span>
										</div>
									</div>
							</div>
						</div>
						</div>
						<div class="people-container" ><!-- style="background:url(<?php //the_field('people_cover'); ?>) #6dc4b1 center center no-repeat;background-size:cover;" -->
							<!-- <div class="people-entry-img-active" > --><!--style="background:url(<?php //the_field('active_portrait'); ?>) center center no-repeat;background-size:cover;"-->
								<img src="<?php the_field('people_cover'); ?>"><?php //the_field('active_portrait'); ?>
							<!-- </div> -->

						</div>
						
					</div>
				<?php //} ?>
			<!-- </section> -->
		<!-- </div> --><!-- end contentSecondary -->
	<!-- 	</div>
	</div> -->
	
<?php } } wp_reset_query(); ?>
</div> <!-- end container -->
</section>

<?php get_footer(); ?>
