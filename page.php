<?php get_header(); ?>

<section id="" class="text"><!-- page-content -->
	<div class="container">

		<?php get_template_part('/partials/page-callout'); ?>

		<div class="the-content row">
			<div class="columns-6">
				<?php 

					//Setup ACF Fields
					$text_callout_title = get_field('text_callout_title');
					$text_callout_content = get_field('text_callout_content');
					$show_quote_field = get_field('show_quote_field');

					//Check to see if the title has information before showing any of this code.
					//All fields should be optional
					if($text_callout_title !=""){
					?>
						<div class="text-callout">
							<h2><?php echo $text_callout_title; ?> </h2>
							<p class="callout"><?php echo $text_callout_content; ?></p>
			
						<?php 

							//ACF Repeater loop
							if(have_rows('callout_cta')):
								while(have_rows('callout_cta')):the_row();
								$cta_text = get_sub_field('cta_text');
								$cta_link = get_sub_field('cta_link');
						?>
							<a class="cta" href="<?php echo $cta_link; ?>"><?php echo $cta_text; ?></a>
						<?php endwhile; endif; //end callout_cta loop?>
						</div> <!-- end text-callout -->
				<?php } ?>

				<?php if (have_rows('page_columns')):
						$txt_ct=0;
							while(have_rows('page_columns')):the_row();
							$txt_ct++;
							$page_container=get_sub_field('page_container');

							//Use modulus to check if this is the second (final), text box
							//if so, end the last box and start a new box
							if ($txt_ct % 2 == 0)
				{?>

				<!-- </div> --><div class="columns-6">

				<?php } //end modulus check ?>

				<?php echo $page_container; ?>


				<?php 
					// Check again to see if we are in the second box, then show the quote
					// and end the container.

					if ($txt_ct % 2 == 0) {
					
					

					// We provided a checkbox on the text (page.php) page to show or hide a randome quote,
					// this logic tests that field value to show (in the case that it is not checked 'false')
					// or hide the quote (in the case that the checkbox is not checked).
					// Checkbox set to checked as a standard.

					if($show_quote_field == false){
						//var_dump($show_quote_field);
				?>
					
						<?php 
								// Query Advocate posts and display them on the page
								$args = array(
									'post_type'      => 'advocate', //Post type, to check the label, check cpt.php
									//'meta_key'       => 'featured',
									//'meta_value'     => true,
									//'meta_compare'   => '!=',
									//'order' => 'ASC',
									'orderby' => 'rand', //Order by random so that a new quote is rendered each load
									'posts_per_page' => 4 // -1 for all posts, we only want one, tho
								);
								$query = new WP_Query($args);
									if ( $query->have_posts() ) { ?>
									<div class="quote slider">
									<?php
						
										while ( $query->have_posts() ) { $query->the_post(); 
							?>
							
								<div class="slide">
								<p class="quote-content"><?php echo get_field('message', $post->ID); ?></p>
								<p class="quote-attr">&mdash; <?php echo get_field('advocate', $post->ID); ?></p>
							</div>
							<?php } } wp_reset_postdata(); //End the query ?></div>
				</div> 
				<?php 	} //End $show_quote_field check ?>

				<?php //}else{ //End modulus check?>
				
				<?php } ?>
			</div> 
		<?php endwhile; endif; ?>
		</div><!-- end the-content -->
	</div>
</section>

<?php get_footer(); ?>